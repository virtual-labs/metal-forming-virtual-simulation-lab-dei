
/* 	
  	Odin - RTL Verilog synthesis back-end to FPGAs
	Copyright (C) 2005  Peter Jamieson

	This program is free software; you can redistribute it and/or modify
	it under the terms of the GNU General Public License as published by
	the Free Software Foundation; either version 2 of the License, or
	(at your option) any later version.

	This program is distributed in the hope that it will be useful,
	but WITHOUT ANY WARRANTY; without even the implied warranty of
	MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
	GNU General Public License for more details.

	You should have received a copy of the GNU General Public License
	along with this program; if not, write to the Free Software
	Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA

	Contact: jamieson.peter@gmail.com
*/

/* This file performs the re-encoding of FSM so that they are one-hot encoded.  All of the case structures that have been defined are first
 * checked to see if they are a part of a FSM.  If they are, then we reencode the FSM so it is one-hot encoded */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>
#include <math.h>

#include "debug.h"

#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

#include "odin_ds1_graph_utils.h"
#include "odin_cell_define_utils.h"
#include "odin_hetero_utils.h"
#include "odin_node_utils.h"
#include "odin_FLAT_netlist.h"
#include "odin_expression_optimizations.h"
#include "odin_node_and_cell_utils.h"
#include "odin_soft_mapping.h"
#include "odin_finite_state_machine.h"

#define fsm_node_t struct fsm_node_t_t
fsm_node_t
{
	node_t *case_node;
	node_t *new_node;
	int *state_output_indexes;
	int num_state_output_indexes;
};

node_t** fsm_list = NULL;
int num_fsm_list = 0;
short found_feedback;

fsm_node_t** fsm_case_node_list;
int num_fsm_case_node_list;
int case_traversal_index;

node_t **equal_nodes;
int num_equal_nodes;

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_hot_encode)
 * 	High-level point where we go through all the case structures that have been previously 
 * 	defined, and we check if they are finite state machines.  If they are, we then convert 
 * 	the finitie state machine into a one-hot encoded instance of the state machine.
 *-------------------------------------------------------------------------------------------*/
void ofsm_hot_encode () 
{
	int i, j;
	node_t *node_case_base_condition;
	node_t *case_node;
	node_t *register_node;
	node_t *new_register_node;
	short state_is_register = TRUE;
	short is_fsm_loop;
	short is_fsm;
	int new_hot_encode_width;
	int *point_indexes = NULL;

	for (i = 0; i < num_fsm_list; i++)
	{
		/* get the current case node */
		case_node = fsm_list[i];
		register_node = NULL;

		/* get the equal node that holds the switch variable */
		assert((case_node->input_pins[0]->input_node != NULL) && 
				(case_node->input_pins[0]->input_node->node_type == MACRO_NODE) && 
				(case_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_EQ))
		node_case_base_condition = case_node->input_pins[0]->input_node;
		
		if (point_indexes != NULL)
		{
			ou_free(point_indexes);
		}

		point_indexes = (int*)ou_malloc(sizeof(int)*node_case_base_condition->n_t.hetero_node.width_a, HETS_FINITE_STATE_MACHINE);

		/* check that register values of the equal statement that hooks up to the 
		 * case statement is from a register.  The first port of node_case_base_condition is where the STATE will be held */
		for (j = 0; j < node_case_base_condition->n_t.hetero_node.width_a; j++)
		{
			if (
				!((node_case_base_condition->input_pins[j]->input_node->node_type == MACRO_NODE) &&
                 ((node_case_base_condition->input_pins[j]->input_node->n_t.hetero_node.hetero_node_type == MN_REGISTER) ||
                  (node_case_base_condition->input_pins[j]->input_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)))
			   )	
			{
				/* IF - this input is not from a register then this is not a state machine case statement */
				state_is_register = FALSE;
				break;
			}

			if (register_node == NULL)
			{
				/* On the first pass record the register node */
				register_node = node_case_base_condition->input_pins[j]->input_node;
			}
			else if (register_node != node_case_base_condition->input_pins[j]->input_node)
			{
				state_is_register = FALSE;
				break;
			}

			point_indexes[j] = node_case_base_condition->input_pins[j]->input_pins_related_output_port;
		}

		if (state_is_register == FALSE)
		{
			/* do the next possible state machine, because this isn't one */
			continue;
		}

		/* initialize the list that records each of the case/if nodes that control the potential state variable */	
		fsm_case_node_list = NULL;
		num_fsm_case_node_list = 0;

		/* Now that we know that this is a register we need to check for the feedback loop. */
		for (j = 0; j < node_case_base_condition->n_t.hetero_node.width_a; j++)
		{
			case_traversal_index = -1;

			is_fsm_loop = ofsm_loop_check(node_case_base_condition->input_pins[j]->input_node, j, case_node);
			if (is_fsm_loop == TRUE)
			{
				is_fsm = TRUE;
			}
			else
			{
				is_fsm = FALSE;
			}
		}

		if (is_fsm == FALSE)
		{
			/* Didn't find desired feedback loop so exit */
			continue;
		}

		/* At this stage we have matched both the state register and the feedback loop that only has constants attached, so 
		 * we can assume that this case structure is part of a state machine */

		/* new width of the hot encoding is 2 to the exponent of the old width */
		new_hot_encode_width = pow(2 ,node_case_base_condition->n_t.hetero_node.width_a);

		/* remap the state register and the comparison coding for the top case node */
		new_register_node = ofsm_hot_encode_register(register_node, new_hot_encode_width, node_case_base_condition->n_t.hetero_node.width_a, point_indexes, case_node);

		/* remap each of the conditions so it is a direct connection with the variable */
		ofsm_hot_encode_case(case_node, new_register_node, new_hot_encode_width, node_case_base_condition->n_t.hetero_node.width_a);

		/* create remapped case nodes with sizes that can fit the to be rencoded state variables */
		ofsm_create_new_case_if_nodes_for_state_variable(node_case_base_condition->n_t.hetero_node.width_a, new_hot_encode_width);	

		/* join all the newly widened structures */
		ofsm_join_new_case_if_nodes_for_state_variable(node_case_base_condition->n_t.hetero_node.width_a, new_hot_encode_width, case_node);

		/* rencode the state variable by going through each case structure and joining up the constants with a new reencoded
		 * variable. */
		ofsm_hot_encode_constants(node_case_base_condition->n_t.hetero_node.width_a, new_hot_encode_width);	

		/* free the nodes and list stuff that is no longer useful */
		ofsm_free_old_nodes();
		onu_free_node(register_node);
	}

	if (point_indexes != NULL)
	{
		ou_free(point_indexes);
	}

	/* clean up the list afterwards */
	if (fsm_list != NULL)
	{
		ou_free(fsm_list);
		fsm_list = NULL;
		num_fsm_list = 0;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_loop_check)
 * 		This function starts a breadth first search of the inputs making sure that each 
 * 		Found node is either a constant or a if/case node.  We only traverse the datapath
 *		of the MUXES, which are in the if/case nodes. 
 *-------------------------------------------------------------------------------------------*/
short ofsm_loop_check (node_t *register_node, int output_pin_index, node_t *original_case_node) 
{
	int start_port_index;
	short is_loop_fsm = TRUE;
	short register_type = register_node->n_t.hetero_node.hetero_node_type;

	if (register_type == MN_REGISTER)
	{
		start_port_index = 1;
	}
	else if (register_type == MN_REGISTER_RESET)
	{
		start_port_index = 2;
	}
	
	/* We start with one of the input pins on the breadth first search. */
	if ((register_node->input_pins[start_port_index+output_pin_index]->input_node->node_type == MACRO_NODE) &&
        ((register_node->input_pins[start_port_index+output_pin_index]->input_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
         (register_node->input_pins[start_port_index+output_pin_index]->input_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
         (register_node->input_pins[start_port_index+output_pin_index]->input_node->n_t.hetero_node.hetero_node_type == MN_IF)))
	{
		/* IF - this is a CASE or IF node then good, and we need to traverse it on the input edges of the data path */
		found_feedback = FALSE;
		is_loop_fsm = ofsm_breadth_first_traverse_backwards(register_node->input_pins[start_port_index+output_pin_index]->input_node, 
													register_node->input_pins[start_port_index+output_pin_index]->input_pins_related_output_port,
													register_node, 
													original_case_node, 
													FSM_TRAVERSE+output_pin_index);
	}
	else if ((register_node->input_pins[start_port_index+output_pin_index]->input_node->node_type == MACRO_NODE) &&
	        (register_node->input_pins[start_port_index+output_pin_index]->input_node->n_t.hetero_node.hetero_node_type == MN_BUF) &&
			(register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_node->node_type == MACRO_NODE) &&
			((register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
			 (register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
			 (register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_IF)))
	{
		/* ELSE IF - it is highly likely there is a buffer inbetween the register and the case node.  This is due to the 
		 * assignment statements I have in my op_assign... functions */
		found_feedback = FALSE;
		is_loop_fsm = ofsm_breadth_first_traverse_backwards(register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_node, 
													register_node->input_pins[start_port_index+output_pin_index]->input_node->input_pins[0]->input_pins_related_output_port,
													register_node, 
													original_case_node, 
													FSM_TRAVERSE+output_pin_index);
	}
	else
	{
		/* ELSE - the inputs to the register are not a CASE or IF node, then this structure is not a FSM */
		is_loop_fsm = FALSE;
	}

	if (found_feedback == FALSE)
	{
		is_loop_fsm = FALSE;
	}

	return is_loop_fsm;
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_breadth_first_traverse_backwards)
 *-------------------------------------------------------------------------------------------*/
short ofsm_breadth_first_traverse_backwards(node_t *case_if_node, int output_index, node_t *start_node, node_t *original_case_node, short traverse_value)
{
	int num_cases = case_if_node->n_t.hetero_node.num_cases;
	int width = case_if_node->num_output_pins;
	int i;
	int input_port_index = case_if_node->n_t.hetero_node.muxed_input_start_index + output_index*num_cases;
	short is_fsm_loop = TRUE;
	short local_fsm_loop;

	if (case_if_node->mark_number == traverse_value)
	{
		/* IF - this case has already been searched for the loop back then exit */
		return TRUE;
	}

	case_if_node->mark_number = traverse_value; 
	
	if (case_if_node == original_case_node)
	{
		found_feedback = TRUE;
	}

	if (traverse_value - FSM_TRAVERSE == 0)
	{
		/* IF - this is the first pass through then record this case node in the list */
		fsm_case_node_list = (fsm_node_t**)ou_realloc(fsm_case_node_list, sizeof(fsm_node_t*)*(num_fsm_case_node_list+1), HETS_FINITE_STATE_MACHINE); 
		fsm_case_node_list[num_fsm_case_node_list] = (fsm_node_t*)ou_malloc(sizeof(fsm_node_t), HETS_FINITE_STATE_MACHINE); 

		fsm_case_node_list[num_fsm_case_node_list]->case_node = case_if_node;
		fsm_case_node_list[num_fsm_case_node_list]->new_node =  NULL;
		fsm_case_node_list[num_fsm_case_node_list]->state_output_indexes = NULL;
		fsm_case_node_list[num_fsm_case_node_list]->num_state_output_indexes = 0;

		assert(case_traversal_index == num_fsm_case_node_list - 1);

		num_fsm_case_node_list++;
	}

	case_traversal_index ++;

	/* also check that the case node we are at matches the node in the list.  This should be the same for state variables
	 * since they all go through the same processing */
	if ((case_traversal_index >= num_fsm_case_node_list) || (fsm_case_node_list[case_traversal_index]->case_node != case_if_node))
	{
		/* IF - they don't match exit on FALSE */
		return FALSE;
	}

	/* record in the case node list the index of importance.  This is so that later we can figure out which ones to change. */
	fsm_case_node_list[case_traversal_index]->state_output_indexes = (int*)ou_realloc(fsm_case_node_list[case_traversal_index]->state_output_indexes,
																						sizeof(int)*(fsm_case_node_list[case_traversal_index]->num_state_output_indexes+1),
																						HETS_FINITE_STATE_MACHINE);
	fsm_case_node_list[case_traversal_index]->state_output_indexes[fsm_case_node_list[case_traversal_index]->num_state_output_indexes] = output_index;
    fsm_case_node_list[case_traversal_index]->num_state_output_indexes ++;

	/* assumption that state variables get added in increasing order */
	assert ((fsm_case_node_list[case_traversal_index]->num_state_output_indexes == 1) || 
			(fsm_case_node_list[case_traversal_index]->state_output_indexes[fsm_case_node_list[case_traversal_index]->num_state_output_indexes - 1] >
			fsm_case_node_list[case_traversal_index]->state_output_indexes[fsm_case_node_list[case_traversal_index]->num_state_output_indexes - 2]));


	/* go through each of the case nodes input pins checking if they are legal state machine assignments */
	for (i = 0; i < num_cases; i++)
	{
		assert(input_port_index <= case_if_node->num_input_pins);

		if ((case_if_node->input_pins[input_port_index]->input_node != null_node) &&
			(case_if_node->input_pins[input_port_index]->input_node->node_type == MACRO_NODE) &&
            ((case_if_node->input_pins[input_port_index]->input_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
             (case_if_node->input_pins[input_port_index]->input_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
             (case_if_node->input_pins[input_port_index]->input_node->n_t.hetero_node.hetero_node_type == MN_IF)))
		{
			/* IF - this is a case/if node then breadth first traverse it */
			local_fsm_loop = ofsm_breadth_first_traverse_backwards(case_if_node->input_pins[input_port_index]->input_node, 
															case_if_node->input_pins[input_port_index]->input_pins_related_output_port,
															start_node, 
															original_case_node, 
															traverse_value);
		}
		else if ((case_if_node->input_pins[input_port_index]->input_node != null_node) &&
			(case_if_node->input_pins[input_port_index]->input_node->node_type == MACRO_NODE) &&
            (case_if_node->input_pins[input_port_index]->input_node->n_t.hetero_node.hetero_node_type == MN_BUF) &&
			(case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_node->node_type == MACRO_NODE) &&
			((case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
			 (case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
			 (case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_node->n_t.hetero_node.hetero_node_type == MN_IF)))
		{
			/* ELSE IF - this is a buffer than pass through */
			local_fsm_loop = ofsm_breadth_first_traverse_backwards(case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_node, 
															case_if_node->input_pins[input_port_index]->input_node->input_pins[0]->input_pins_related_output_port,
															start_node, 
															original_case_node, 
															traverse_value);
		}
		else if ((case_if_node->input_pins[input_port_index]->input_node != null_node) &&
					((case_if_node->input_pins[input_port_index]->input_node == gnd_node) ||
					(case_if_node->input_pins[input_port_index]->input_node == vcc_node)))
		{
			/* ELSE IF - this is a constant/state assignment */
			local_fsm_loop = TRUE;
		}
		else if (case_if_node->input_pins[input_port_index]->input_node == start_node)
		{
			/* ELSE IF - we've found the feedback point */
			local_fsm_loop = TRUE;
		}
		else
		{
			/* ELSE - this means this is not a FSM loop */
			local_fsm_loop = FALSE;
		}
		
		if (local_fsm_loop == FALSE)
		{
			is_fsm_loop = FALSE;
			i = width;
			break;
		}

		input_port_index ++;
	}

	return is_fsm_loop;
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_create_new_case_if_nodes_for_state_variable)
 * 		This function creates a new case node with the unnafected stuff at the top, and a new
 *		sized bottom muxes for the new sized hot encoded state variables.
 *-------------------------------------------------------------------------------------------*/
void ofsm_create_new_case_if_nodes_for_state_variable(int old_hot_encode_width, int oot_encode_width)
{
	int i, j, k;
	int num_cases;
	int width;
	int input_port_index;
	int current_spot_in_index_list;
	node_t *created_node;
	int new_width;
	int current_input_index;
	int current_output_index;
	int current_input_state_variable_index;
	int	current_output_state_variable_index;

	/* go through each of the found case nodes */
	for (i = 0; i < num_fsm_case_node_list; i++)
	{
		num_cases = fsm_case_node_list[i]->case_node->n_t.hetero_node.num_cases;
		width = fsm_case_node_list[i]->case_node->num_output_pins;
		input_port_index = fsm_case_node_list[i]->case_node->n_t.hetero_node.muxed_input_start_index;
		current_spot_in_index_list = 0;

		/* create a new case node that has room for the new hot encoded state variable */
		new_width = width + (oot_encode_width - old_hot_encode_width);

		/* create a new if/case node lets call it MN_CASE */ 
		created_node = onacu_create_case_node("STATE_RESIZE", 
												new_width,
												num_cases + (new_width * num_cases),
												num_cases + new_width,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_STATE_CASE;
		created_node->n_t.hetero_node.num_port_widths = num_cases + new_width;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_FINITE_STATE_MACHINE);
		created_node->n_t.hetero_node.num_cases = num_cases;
		/* record the mux start index */
		created_node->n_t.hetero_node.muxed_input_start_index = num_cases;
		
		/* record this newly created node */
		fsm_case_node_list[i]->new_node = created_node;

		current_input_index = num_cases;
		current_output_index = 0;
		current_input_state_variable_index = (new_width - oot_encode_width) * num_cases + num_cases;
		current_output_state_variable_index = new_width - oot_encode_width;

		/* remap all the original condition structures over */
		for (j = 0; j < num_cases; j++)
		{
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(fsm_case_node_list[i]->case_node->input_pins[j]), 
													onu_get_input_pins_related_output_port(fsm_case_node_list[i]->case_node->input_pins[j]),
													fsm_case_node_list[i]->case_node, 
													j,
													created_node, 
													j);
		}

		/* go through each of the width points and check if this output index is part of the state variable. We remap all the original inputs
		 * to the top of the new case_node if they aren't a state variable, and we remap state variables to the bottom. */
		for (j = 0; j < width; j++)
		{
			if ((current_spot_in_index_list < fsm_case_node_list[i]->num_state_output_indexes) && 
				(fsm_case_node_list[i]->state_output_indexes[current_spot_in_index_list] == j))
			{
				/* IF - this is recorded in the list, then it is a state variable output, and we need to resize this variable, so add 
				 * it to the bottom of the new case node */
				for (k = 0; k < num_cases; k++)
				{
					/* remap port from the case node inputs to its new spot in the new case node */
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(fsm_case_node_list[i]->case_node->input_pins[input_port_index+j*num_cases+k]), 
															onu_get_input_pins_related_output_port(fsm_case_node_list[i]->case_node->input_pins[input_port_index+j*num_cases+k]),
															fsm_case_node_list[i]->case_node, 
															input_port_index+j*num_cases+k,
															created_node, 
															current_input_state_variable_index);
					current_input_state_variable_index ++;
				}
	
				/* join the outputs to new node from old_next */
				onu_copy_output_port(created_node, fsm_case_node_list[i]->case_node, current_output_state_variable_index, j);
				current_output_state_variable_index++;

				current_spot_in_index_list++;
			}
			else
			{
				/* ELSE - this output index is probably for an output, so we map it to the top of the new case node */
	
				for (k = 0; k < num_cases; k++)
				{
					assert(current_input_index < (new_width - oot_encode_width) * num_cases + num_cases);
					/* remap port from the case node inputs to its new spot in the new case node */
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(fsm_case_node_list[i]->case_node->input_pins[input_port_index+j*num_cases+k]), 
															onu_get_input_pins_related_output_port(fsm_case_node_list[i]->case_node->input_pins[input_port_index+j*num_cases+k]),
															fsm_case_node_list[i]->case_node, 
															input_port_index+j*num_cases+k,
															created_node, 
															current_input_index);
					current_input_index ++;
				}
	
				assert(current_output_index < new_width - oot_encode_width);

				/* join the outputs to new node from old_next */
				onu_copy_output_port(created_node, fsm_case_node_list[i]->case_node, current_output_index, j);
				current_output_index++;
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_join_new_case_if_nodes_for_state_variable)
 *		This function joins the newly enlarged case nodes, and also adds registers and a 
 *		feed back loop for the larger bits.
 *-------------------------------------------------------------------------------------------*/
void ofsm_join_new_case_if_nodes_for_state_variable(int old_hot_encode_width, int oot_encode_width, node_t *top_hierarchy_node)
{
	int i, j, k;
	int new_width;
	int width;
	int input_port_index;
	int num_cases;
	int new_output_pin;
	int new_input_pin;
	int index;
	int old_state_variable_start_index;

	/* go through each of the found case nodes */
	for (i = 0; i < num_fsm_case_node_list; i++)
	{
		num_cases = fsm_case_node_list[i]->case_node->n_t.hetero_node.num_cases;
		width = fsm_case_node_list[i]->case_node->num_output_pins;
		new_width = width + (oot_encode_width - old_hot_encode_width);
		input_port_index = fsm_case_node_list[i]->case_node->n_t.hetero_node.muxed_input_start_index;
		old_state_variable_start_index = new_width - oot_encode_width;

		/* go through the newly expanded bits and add what is neccessary.  This can include joining to other case nodes,
		 * connecting to a register, or connecting to the condition spot of the case. */
		for (j = width; j < new_width; j++)
		{
			node_t *post_node;
			node_t *pointed_node;

			/* hookup the inputs for each of the cases.  We do this by looking how the other cases were attached. */
			for (k = 0; k < num_cases; k++)
			{
				node_t *previous_node = fsm_case_node_list[i]->new_node->input_pins[input_port_index+(old_state_variable_start_index)*num_cases+k]->input_node;
				node_t *pointing_node = fsm_case_node_list[i]->new_node;
				index = input_port_index+(old_state_variable_start_index)*num_cases+k;

				if ((previous_node->node_type == MACRO_NODE) &&
                        (previous_node->n_t.hetero_node.hetero_node_type == MN_BUF))
				{
					/* IF - there is a buffer, then hop over it */
					pointing_node = previous_node;
					previous_node = previous_node->input_pins[0]->input_node;
					index = 0;
				}

				if ((previous_node->node_type == MACRO_NODE) &&
		            ((previous_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
		             (previous_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
             		 (previous_node->n_t.hetero_node.hetero_node_type == MN_IF)))
				{
					/* IF - the previous state variable had input from a CASE/IF node then this state variable needs to hookup
					 * to the same node. */ 
					
					/* determine the port we are going to be hooked up to */
					new_output_pin = (pointing_node->input_pins[index]->input_pins_related_output_port) + (j - old_state_variable_start_index);

					/* verify that the there are actually enough output pins */
					assert(previous_node->num_output_pins > new_output_pin);
					/* verify that there are no outputs already on this node */
					assert(previous_node->output_pins[new_output_pin]->num_output_pins_level_2 == 0);

					/* hook up this output to the created nodes input */
					osm_join_gate_nodes(previous_node, new_output_pin, fsm_case_node_list[i]->new_node, input_port_index+j*num_cases+k);
				}
				else if ((previous_node == gnd_node) ||
    	         		 (previous_node == vcc_node))
				{
					/* ELSE IF - the previous state is hooked up to a constant, then hook this state variable to a constant.  This
					 * will eventually get re-encoded */
					osm_join_gate_nodes(gnd_node, 0, fsm_case_node_list[i]->new_node, input_port_index+j*num_cases+k);
				}
				else if ((previous_node->node_type == MACRO_NODE) &&
						((previous_node->n_t.hetero_node.hetero_node_type == MN_REGISTER) ||
						 (previous_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)))
				{
					/* ELSE IF - the previous state (through a buffer) is hooked up to the state register.  Assume this register
					 * has been expanded and all the state variables are on the bottom. */

					/* determine the port we are going to be hooked up to */
					new_output_pin = (pointing_node->input_pins[index]->input_pins_related_output_port) + (j - old_state_variable_start_index);

					/* verify that the there are actually enough output pins */
					assert(previous_node->num_output_pins > new_output_pin);
					/* verify that there are no outputs already on this node */
					assert(previous_node->output_pins[new_output_pin]->num_output_pins_level_2 == 0);

					/* hook up this output to the created nodes input */
					osm_join_gate_nodes(previous_node, new_output_pin, fsm_case_node_list[i]->new_node, input_port_index+j*num_cases+k);
				}
				else if (previous_node == null_node)
				{
					fsm_case_node_list[i]->new_node->input_pins[input_port_index+j*num_cases+k]->input_node = null_node;
				}
				else
				{
					/* ELSE - UNSUPPORTED CASE??? */
					assert(FALSE);
					printf("ERROR\n");
				}
			}
	
			post_node = fsm_case_node_list[i]->new_node->output_pins[old_state_variable_start_index]->output_nodes[0];
			pointed_node = fsm_case_node_list[i]->new_node;

			/* assign index to j which is the output spot unless the buffer overides */
			index = old_state_variable_start_index;
	 
			if ((post_node->node_type == MACRO_NODE) &&
		            (post_node->n_t.hetero_node.hetero_node_type == MN_BUF) &&
					(post_node->output_pins[0]->num_output_pins_level_2 == 1)) 
			{
				pointed_node = post_node;
				post_node = post_node->output_pins[0]->output_nodes[0];
				index = 0;
			}

			if ((post_node->node_type == MACRO_NODE) &&
		           ((post_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
		            (post_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
            		 (post_node->n_t.hetero_node.hetero_node_type == MN_IF)))
			{
				/* IF - the post node points to a case node, then we need to attach this ouput to a case node */

				/* the new input pin is based on the (original input spot [already joined]) + (the width spot of the
				 * node we're adding) * (the number of cases int the connecting case node) */ 
				new_input_pin = pointed_node->output_pins[index]->output_pin_related_input_index[0] + ((j - old_state_variable_start_index) * post_node->n_t.hetero_node.num_cases);

				/* verify that the there are enough input pins */
				assert(post_node->num_input_pins > new_input_pin);
				/* verify that there is no input already on this node spot */
				if(post_node->input_pins[new_input_pin]->input_node != NULL)
				{
					/* IF - there is an output already, it is possible that this is another case that did the output
					 * stage of its joining */
					assert((post_node->input_pins[new_input_pin]->input_node->n_t.hetero_node.hetero_node_type == MN_CASE) ||
							(post_node->input_pins[new_input_pin]->input_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) ||
                      		(post_node->input_pins[new_input_pin]->input_node->n_t.hetero_node.hetero_node_type == MN_IF));
					assert(post_node->input_pins[new_input_pin]->input_node->output_pins[j]->output_nodes[0] == post_node);
				}
				else
				{
					/* hook up the created node to its output target */
					osm_join_gate_nodes(fsm_case_node_list[i]->new_node, j, post_node, new_input_pin);
				}
			}
			else if 
					((post_node->node_type == MACRO_NODE) &&
					((post_node->n_t.hetero_node.hetero_node_type == MN_REGISTER) ||
					 (post_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)))
			{
				/* ELSE IF - the post state (through a buffer) is hooked up to the state register, then we need to hookup to the flip
				 * flop we just built for the input. */
				new_input_pin = pointed_node->output_pins[index]->output_pin_related_input_index[0] + (j - old_state_variable_start_index);

				/* verify that the there are enough input pins */
				assert(post_node->num_input_pins > new_input_pin);
				/* verify that there is no input already on this node spot */
				assert(post_node->input_pins[new_input_pin]->input_node == NULL);

				/* hook up the created node to its output target */
				osm_join_gate_nodes(fsm_case_node_list[i]->new_node, j, post_node, new_input_pin);
			}
#if 0
			else if ((post_node->node_type == MACRO_NODE) &&
		           (post_node->n_t.hetero_node.hetero_node_type == MN_EQ))
			{
				/* ELSE IF - this is hooked up to compare statement that is hooked up to the top level cases comparison.  This
				 * has been expanded, so just hook this output directly to the condition spot. */
				assert(post_node->output_pins[0]->num_output_pins_level_2 == 1);
				assert(post_node->output_pins[0]->output_nodes[0] == top_hierarchy_node);

				/* we actually want to remap all the condition signals to the EQ node directly to the top case node */
				for (k = 0; k < num_cases; k++)
				{

				}
			}
#endif
			else
			{
				/* ELSE - UNSUPPORTED CASE??? */
				assert(FALSE);
				printf("ERROR\n");
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_hot_encode_register_and_top_case)
 * 		Change the size of state variable register to fit the new encoding size.  
 *-------------------------------------------------------------------------------------------*/
node_t *ofsm_hot_encode_register(node_t *register_node, int new_hot_encode_size, int old_hot_encode_size, int *state_index, node_t *case_node)
{
	int i;
	int start_index;
	int new_reg_size = register_node->num_output_pins + (new_hot_encode_size - old_hot_encode_size);
	int index_state_variables = new_reg_size - new_hot_encode_size;
	int index_non_state_variables = 0;
	int state_index_traversal = 0;
	node_t *created_node;

	/* build register node and attach all these outputs */
	if (register_node->n_t.hetero_node.hetero_node_type == MN_REGISTER)
	{
		created_node = onacu_create_3inport_1outport_macro_node ("STATE_REGISTER", 1, 0, new_reg_size, new_reg_size, MN_REGISTER);
		start_index = 1;
	}
	else if (register_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)
	{
		created_node = onacu_create_3inport_1outport_macro_node ("STATE_REGISTER", 1, 1, new_reg_size, new_reg_size, MN_REGISTER_RESET);

		/* remap the reset */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[1]), 
														onu_get_input_pins_related_output_port(register_node->input_pins[1]),
														register_node, 
														1, 
														created_node, 
														1);
		start_index = 2;
	}

	/* remap the clock */
	osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[0]), 
													onu_get_input_pins_related_output_port(register_node->input_pins[0]),
													register_node, 
													0, 
													created_node, 
													0);

	/* allocate room for the reset signals */
	created_node->n_t.hetero_node.register_ports_or_mux_choice = (short*)ou_malloc(sizeof(short)*new_reg_size, HETS_FINITE_STATE_MACHINE);

	/* remap the old inputs and outputs */
	for (i = 0; i < register_node->num_output_pins; i++)
	{
		if ((state_index_traversal < old_hot_encode_size) && 
			(i == state_index[state_index_traversal]))
		{
			/* IF - this is one of the state variable indexes, then move it down to the bottom of the register */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[start_index + i]), 
														onu_get_input_pins_related_output_port(register_node->input_pins[start_index + i]),
														register_node, 
														start_index + i, 
														created_node, 
														start_index + index_state_variables);

			onu_copy_output_port(created_node, register_node, index_state_variables, i);

			/* copy the register reset flags */
			if (register_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)
			{	
				created_node->n_t.hetero_node.register_ports_or_mux_choice[index_state_variables] = register_node->n_t.hetero_node.register_ports_or_mux_choice[i];
			}
	
			index_state_variables++;
			state_index_traversal++;
		}
		else
		{
			/* ELSE - this is not a state variable, so it needs to be remapped to the top */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[start_index + i]), 
														onu_get_input_pins_related_output_port(register_node->input_pins[start_index + i]),
														register_node, 
														start_index + i, 
														created_node, 
														start_index + index_non_state_variables);

			onu_copy_output_port(created_node, register_node, index_non_state_variables, i);
			
			/* copy the register reset flags */
			if (register_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)
			{	
				created_node->n_t.hetero_node.register_ports_or_mux_choice[index_non_state_variables] = register_node->n_t.hetero_node.register_ports_or_mux_choice[i];
			}

			index_non_state_variables ++;
		}
	}

	/* copy the register reset value based on the state variable value */
	if (register_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)
	{	
		for (i =  register_node->num_output_pins; i < new_reg_size; i++)
		{
			created_node->n_t.hetero_node.register_ports_or_mux_choice[i] = register_node->n_t.hetero_node.register_ports_or_mux_choice[register_node->num_output_pins-1];
		}
	}

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_hot_encode_case)
 *		This function remaps all the condition inputs of case node.  In the form MN_EQ, to
 *		direct inputs to the case node.  This includes hooking up the new state bits in the
 *		newly expanded register node.
 *-------------------------------------------------------------------------------------------*/
void ofsm_hot_encode_case(node_t *case_node, node_t *new_register_node, int new_hot_encode_width, int old_hot_encode_width)
{
	int i, j;
	int num_cases = case_node->n_t.hetero_node.num_cases;
	node_t *current_node;
	int num_cases_without_default = num_cases;
	
	equal_nodes = (node_t**)ou_malloc(sizeof(node_t*)*num_cases, HETS_FINITE_STATE_MACHINE);
	
	assert(num_cases <= new_hot_encode_width+1);

	/* Record all the equal nodes */
	for (i = 0; i < num_cases; i++)
	{
		equal_nodes[i] = case_node->input_pins[i]->input_node;
	}

	if ((num_cases == new_hot_encode_width+1) ||
		((equal_nodes[num_cases-1]->node_type == MACRO_NODE) &&
		 (equal_nodes[num_cases-1]->n_t.hetero_node.hetero_node_type == MN_NOT)))
	{
		/* IF - this means that there is a power of two number of states and there is a Default case, which we can eliminate.  
		 * Assume that all the inputs are 0. */

		int index;

		/* make sure something is attached to the default.  Let's make it 0 so it gets eliminated */
		osm_join_gate_nodes(gnd_node, 0, case_node, num_cases-1);

		for (i = 0; i < case_node->num_output_pins; i++)
		{
			index = num_cases + (num_cases*i) + (num_cases-1);

			assert(case_node->input_pins[index]->input_node == gnd_node);
			onu_remove_output_pointer_to_node(
					onu_get_input_pins_node(case_node->input_pins[index]),
					onu_get_input_pins_related_output_port(case_node->input_pins[index]),
					onu_get_input_pins_related_output_port_array_index(case_node->input_pins[index]));

			/* replace with NULL */
			case_node->input_pins[index]->input_node = null_node;
		}	

		num_cases_without_default = num_cases - 1;
	}

	for (i = 0; i < num_cases_without_default; i++)
	{
		if (i < num_cases)
		{
			/* map the outputs of the registers directly to the input pins of the case node */
			osm_join_gate_nodes(new_register_node, i, case_node, i);
		}
	}

	for (i = 0; i < num_cases; i++)
	{
		current_node = equal_nodes[i];

		/* remove all the output pins that hookup to this equal node */
		for (j = 0; j < current_node->num_input_pins; j++)
		{
			onu_remove_output_pointer_to_node(
					onu_get_input_pins_node(current_node->input_pins[j]),
					onu_get_input_pins_related_output_port(current_node->input_pins[j]),
					onu_get_input_pins_related_output_port_array_index(current_node->input_pins[j]));
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_hot_encode_constants)
 *-------------------------------------------------------------------------------------------*/
void ofsm_hot_encode_constants(int old_hot_encode_width, int oot_encode_width)
{
	int i, j, k;
	int width;
	int input_port_index;
	int num_cases;
	int value = 0;

	/* go through each of the new case nodes that we've built for the expanded encoding */
	for (i = 0; i < num_fsm_case_node_list; i++)
	{
		num_cases = fsm_case_node_list[i]->new_node->n_t.hetero_node.num_cases;
		width = fsm_case_node_list[i]->new_node->num_output_pins;
		input_port_index = width - oot_encode_width;

		for (k = 0; k < num_cases; k++)
		{
			value = 0;

			/* Calculate the value of the constant */
			for (j = 0; j < old_hot_encode_width; j++)
			{
				if (fsm_case_node_list[i]->new_node->input_pins[num_cases + (input_port_index+j)*num_cases + k]->input_node == vcc_node)
				{
					/* IF - this is hooked up to a one, then record the value */
					value += (long int)pow(2, j);
				}
				else if (!(fsm_case_node_list[i]->new_node->input_pins[num_cases + (input_port_index+j)*num_cases + k]->input_node == gnd_node))
				{
					/* ELSE IF - this is not a gnd node, then this is not hooked up to a constant */
					value = -1;
					break;
				}
			}
		
			if (value == -1)
			{
				continue;
			}

			assert(value - 1 < oot_encode_width);

			/* given the value of the constant set that bit to 1, and all others to 0 . */
			for (j = 0; j < oot_encode_width; j++)
			{
				onu_remove_output_pointer_to_node(
						onu_get_input_pins_node(fsm_case_node_list[i]->new_node->input_pins[num_cases + (input_port_index+j)*num_cases + k]),
						onu_get_input_pins_related_output_port(fsm_case_node_list[i]->new_node->input_pins[num_cases + (input_port_index+j)*num_cases + k]),
						onu_get_input_pins_related_output_port_array_index(fsm_case_node_list[i]->new_node->input_pins[num_cases + (input_port_index+j)*num_cases + k]));

				if (j == value)
				{
					osm_join_gate_nodes(vcc_node, 0, fsm_case_node_list[i]->new_node, num_cases + (input_port_index+j)*num_cases + k);
				}
				else
				{
					osm_join_gate_nodes(gnd_node, 0, fsm_case_node_list[i]->new_node, num_cases + (input_port_index+j)*num_cases + k);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_free_old_nodes)
 *-------------------------------------------------------------------------------------------*/
void ofsm_free_old_nodes()
{
	int i;

	/* free all the equal nodes */
	for (i = 0; i < num_equal_nodes; i++)
	{
		onu_free_node(equal_nodes[i]);
	}
	/* free all the old case nodes */
	for (i = 0; i < num_fsm_case_node_list; i++)
	{
		onu_free_node(fsm_case_node_list[i]->case_node);
	}

	/* free up the list of equal nodes */
	ou_free(equal_nodes);

	/* At the end of it all free up the list used to record the state case/if nodes */
	for (i = 0; i < num_fsm_case_node_list; i++)
	{
		if (fsm_case_node_list[i]->state_output_indexes != NULL)
		{
			ou_free(fsm_case_node_list[i]->state_output_indexes);
		}
		ou_free(fsm_case_node_list[i]);
	}

	equal_nodes = NULL;
	num_equal_nodes = 0;
	fsm_case_node_list = NULL;
	num_fsm_case_node_list = 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: ofsm_add_fsm_to_list)
 *-------------------------------------------------------------------------------------------*/
void ofsm_add_fsm_to_list (node_t *fsm_node) 
{
	assert(fsm_node != NULL);

	/* add a spot in the list for the next element */
	fsm_list = (node_t**)ou_realloc(fsm_list, sizeof(node_t*)*(num_fsm_list + 1), HETS_FINITE_STATE_MACHINE);

	/* store the case */
	fsm_list[num_fsm_list] = fsm_node;

	/* record the addition of the ndoe */
	num_fsm_list++;
}
