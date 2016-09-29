
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

/* This file allows each node that is not bound to some sort of specific structure to be mapped to a soft implementation.  In most cases we 
 * take the original node, and redefine it as a subgraph of new nodes that implement the logic functionality of the original node.
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>

#include "debug.h"

#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

#include "odin_node_utils.h"
#include "odin_partial_mapper.h"
#include "odin_soft_mapping.h"
#include "odin_node_and_cell_utils.h"
#include "odin_collect_stats.h"

//#include "odin_experimental.h"

/*---------------------------------------------------------------------------------------------
 * (function: osm_soft_map_a_macro_node)
 *-------------------------------------------------------------------------------------------*/
void osm_soft_map_a_macro_node(node_t *high_level_node, short traverse_number)
{
	high_level_node->is_partial_mapped_bound = HPM_SOFT_MAPPED;

	switch (high_level_node->n_t.hetero_node.hetero_node_type) 
	{
		case MN_NOT:
			osm_instantiate_not_logic(high_level_node, traverse_number);
			break;

		case MN_BUF:
			osm_instantiate_buffer(high_level_node, traverse_number);
			break;

		case MN_AND:
		case MN_OR:
		case MN_XOR:
		case MN_NAND:
		case MN_NOR:
		case MN_XNOR:
			osm_instantiate_logic_array_of_2_input_gate(high_level_node, traverse_number);
			break;

		case MN_LOG_AND:
		case MN_LOG_OR:
			osm_instantiate_logical_reduction_gate(high_level_node, traverse_number);
			break;

		case MN_RED_AND:
		case MN_RED_OR:
		case MN_RED_XOR:
		case MN_RED_NAND:
		case MN_RED_NOR:
		case MN_RED_XNOR:
			osm_instantiate_reduction_gate(high_level_node, traverse_number);
			break;

		case MN_LOG_NOT:
			osm_instantiate_logical_not(high_level_node, traverse_number);
			break;

		case MN_ADD:
			if (architecture_target == VPR_ARCH)
			{
				osm_instantiate_add_with_add_and_carry(high_level_node, traverse_number);
			}
			else if (architecture_target == STRATIX_ARCH)
			{
				high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			}
			break;
		case MN_SUB:
			if (architecture_target == VPR_ARCH)
			{
				osm_instantiate_sub_w_carry_cell(high_level_node, traverse_number);
			}
			else if (architecture_target == STRATIX_ARCH)
			{
				high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			}
			break;
		case MN_ADD_SUB:
			if (architecture_target == VPR_ARCH)
			{
				/* IF - vpr, then architecture doesn't have an add sub circuitry */
				assert(FALSE);
			}
			else if (architecture_target == STRATIX_ARCH)
			{
				high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			}
			break;

		case MN_UNARY_SUB:
			osm_instantiate_unary_sub(high_level_node, traverse_number);
			break;

		case MN_EQ:
		case MN_NEQ:
			osm_define_an_compare_EQ(high_level_node, traverse_number);
			break;
		case MN_GE:
			osm_define_an_compare_GE(high_level_node, traverse_number);
			break;
		case MN_GT:
			osm_define_an_compare_GT(high_level_node, traverse_number);
			break;

		case MN_SHIFT_LEFT:
		case MN_SHIFT_RIGHT:
			osm_instantiate_shift_left_or_right(high_level_node, traverse_number);
			break;

		case MN_MUX:
			osm_instantiate_2_mux(high_level_node, traverse_number);
			break;

		case MN_REGISTER:
		case MN_REGISTER_RESET:
			osm_instantiate_register(high_level_node, traverse_number, high_level_node->n_t.hetero_node.hetero_node_type);
			break;

		case MN_IF:
		case MN_CASE:
		case MN_STATE_CASE:
			osm_instantiate_if(high_level_node, traverse_number, high_level_node->n_t.hetero_node.hetero_node_type);
			break;
		case MN_CONST_CASE:
			/* do nothing for constant cases.  If architecture doesn't have an lpm implmentation, we shouldn't have any of these nodes */
			if (architecture_target == VPR_ARCH)
			{
				osm_instantiate_if(high_level_node, traverse_number, high_level_node->n_t.hetero_node.hetero_node_type);
			}
			else if (architecture_target == STRATIX_ARCH)
			{
				high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			}
			break;
		case MN_COUNTER:
		case MN_ADD_CARRY_NODE:
			high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			/* currently skip so goes as hard to Stratix */	
			break;
		case MN_MULT:
			/* Here is the list of different types of multipliers that I can potentially create.  These might
			 * not all be available to you as the software is being used for experiments 
			 * osm_instantiate_radix_4_booth_encoded_soft_multiplier2(high_level_node, NULL, traverse_number);
			 * osm_instantiate_memory_multiplier_for_stratix(high_level_node, traverse_number);
			 * osm_instantiate_memory_booth_encoded_partial_multiplier_for_stratix(high_level_node, traverse_number);
			 */
			if (architecture_target == VPR_ARCH)
			{
				// need soft mult code
				osm_instantiate_simple_soft_multiplier(high_level_node, traverse_number);
			}
			else if (architecture_target == STRATIX_ARCH)
			{
				//osm_instantiate_radix_4_booth_encoded_hybrid_multiplier(high_level_node, 9, traverse_number, MEMORY_MULT);
				//osm_instantiate_radix_4_booth_encoded_hybrid_multiplier(high_level_node, 18, traverse_number, FPGA_HARD_MULT);
			  	//osm_instantiate_radix_4_booth_encoded_soft_multiplier2(high_level_node, NULL, traverse_number);
				high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
				//osm_instantiate_soft_hard_hybrid_multiplier(high_level_node, 9, traverse_number);
			}
			break;
		case MN_MEMORY:
			if (architecture_target == VPR_ARCH)
            {
				assert(FALSE);
            }
			/* MEMORY is just skipped to be mapped by lpm in architectures that support memory */
			high_level_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
			break;
		case MN_FF:
			assert(FALSE);
		default:
			/* catch any undefined MACRO NODES */
			assert(FALSE);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_create_a_gate)
 *-------------------------------------------------------------------------------------------*/
node_t *osm_create_a_gate(char *gate_name, int gate_index, int size_input, int size_output, int traverse_number, char *name)
{
	node_t *return_node;
	char *temp_name;
	temp_name = (char*)ou_malloc(sizeof(char)*(strlen(name)+strlen(gate_name)+2), HETS_SOFT_MAPPING);
	sprintf(temp_name, "%s_%s", gate_name, name);

	return_node = onu_allocate_gate_node(gate_index, size_input, size_output, name);
	return_node->mark_number = traverse_number;
	return_node->generated_from_name = strdup(name);
	return (return_node);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_join_gate_nodes)
 *-------------------------------------------------------------------------------------------*/
void osm_join_gate_nodes(node_t *output_node, int output_pin, node_t *input_node, int input_pin)
{
	int temp_array_index;

	/* create the output net */
	temp_array_index = onu_add_output_pointer_to_node(output_node, input_node, output_pin, input_pin);

	/* create the input net */
	onu_set_input_pointer_to_node(input_node, output_node, input_pin, output_pin, temp_array_index);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_join_gate_nodes_with_external_inputs)
 *-------------------------------------------------------------------------------------------*/
void osm_join_gate_nodes_with_external_inputs(node_t *output_node, int output_pin, node_t *old_input_node, int old_input_pin, node_t* new_input_node, int new_input_pin)
{
	int temp_array_port;
	int temp_array_port_index;

	if (output_node == null_node)
	{
		new_input_node->input_pins[new_input_pin]->input_node = null_node;
	}
	else
	{
		/* create the output net */
		temp_array_port = onu_get_input_pins_related_output_port(old_input_node->input_pins[old_input_pin]);
		temp_array_port_index = onu_get_input_pins_related_output_port_array_index(old_input_node->input_pins[old_input_pin]);
	
		assert(temp_array_port == output_pin);
	
		/* set the output to point to the new node on the new input pin */
		onu_set_output_pointer_to_node(output_node, new_input_node, output_pin, temp_array_port_index, new_input_pin);
	
		/* create the input net */
		onu_set_input_pointer_to_node(new_input_node, output_node, new_input_pin, output_pin, temp_array_port_index);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_join_gate_nodes_with_external_inputs)
 *-------------------------------------------------------------------------------------------*/
void osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(node_t *output_node, int output_pin, node_t *old_input_node, int old_input_pin, node_t* new_input_node, int new_input_pin)
{
	int temp_array_port;
	int temp_array_port_index;

	/* create the output net */
	temp_array_port = onu_get_input_pins_related_output_port(old_input_node->input_pins[old_input_pin]);
	temp_array_port_index = onu_get_input_pins_related_output_port_array_index(old_input_node->input_pins[old_input_pin]);

	assert(temp_array_port == output_pin);

	/* add new output node to the new input node */
	temp_array_port_index = onu_add_output_pointer_to_node(output_node,
									new_input_node,
									output_pin,
									new_input_pin);

	/* create the input net */
	onu_set_input_pointer_to_node(new_input_node, output_node, new_input_pin, output_pin, temp_array_port_index);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_join_input_directly_to_output)
 *-------------------------------------------------------------------------------------------*/
void osm_join_input_directly_to_output(node_t *macro_node, int output_pin, int input_pin)
{
	int j;
	int returned_index;
	node_t *input_node = onu_get_input_pins_node(macro_node->input_pins[input_pin]);
	int input_nodes_output_port_index = onu_get_input_pins_related_output_port(macro_node->input_pins[input_pin]);

	for (j = 0; j < onu_get_output_pins_related_num_level_2(macro_node->output_pins[output_pin]); j++)
	{
		if (onu_get_output_pins_node(macro_node->output_pins[output_pin], j) != NULL)
		{
			if (j == 0)
			{
				/* for the first index, remap it in */

				/* get the old index spot */
				returned_index = onu_get_input_pins_related_output_port_array_index(macro_node->input_pins[input_pin]);

				/* set that old index spot to point to the new */
				onu_set_output_pointer_to_node( onu_get_input_pins_node(macro_node->input_pins[input_pin]),
												onu_get_output_pins_node(macro_node->output_pins[output_pin], j),
												onu_get_input_pins_related_output_port(macro_node->input_pins[input_pin]),
												returned_index,
												onu_get_output_pins_related_output_port(macro_node->output_pins[output_pin], j));
			}
			else
			{
				/* add new output node to the new input node */
				returned_index = onu_add_output_pointer_to_node(onu_get_input_pins_node(macro_node->input_pins[input_pin]), 
												onu_get_output_pins_node(macro_node->output_pins[output_pin], j), 
												onu_get_input_pins_related_output_port(macro_node->input_pins[input_pin]),
												onu_get_output_pins_related_output_port(macro_node->output_pins[output_pin], j));
			}
			/* record how the input pointer is now connected to something new */
			onu_set_input_pointer_to_node(onu_get_output_pins_node(macro_node->output_pins[output_pin], j), 
											input_node,
											onu_get_output_pins_related_output_port(macro_node->output_pins[output_pin], j),
											input_nodes_output_port_index,
											returned_index);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_not_logic )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_not_logic(node_t *not_node, short traverse_number)
{
	int width = not_node->num_input_pins;
	node_t **new_not_cells;
	int j;

	assert(width == not_node->n_t.hetero_node.width_a);

	new_not_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	for (j = 0; j < width; j++)
	{
		new_not_cells[j] = osm_create_a_gate("NOT_LOGIC", not_cell_lib_index, 1, 1, traverse_number, not_node->unique_name);
	}

	/* connect inputs and outputs */
    for(j = 0; j < width; j++)
	{
		/* Joining the inputs to the new soft NOT GATES */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(not_node->input_pins[j]), 
												onu_get_input_pins_related_output_port(not_node->input_pins[j]),
												not_node, 
												j, 
												new_not_cells[j], 
												0);

		/* joining each of the outputs to the not outputs */
		onu_copy_output_port(new_not_cells[j], not_node, 0, j);
	}

	ou_free(new_not_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_buffer )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_buffer(node_t *buf_node, short traverse_number)
{
	int width = buf_node->num_input_pins;
	int j;

	assert(width == buf_node->n_t.hetero_node.width_a);

	/* for now we just pass the signals dierectly through */
	for (j = 0; j < width; j++)
	{
		osm_join_input_directly_to_output(buf_node, j, j);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_logic_array_of_2_input_gate )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_logic_array_of_2_input_gate(node_t *logic_node, short traverse_number)
{
	int width = logic_node->num_output_pins;
	int logic_gate_index;
	int j;
	int port_B_offset = logic_node->n_t.hetero_node.width_a;
	int width_a = logic_node->n_t.hetero_node.width_a;
	int width_b = logic_node->n_t.hetero_node.width_b;
	node_t **new_logic_cells;

	new_logic_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* based on the operand type index the required cell type */
	switch (logic_node->n_t.hetero_node.hetero_node_type) 
	{
		case MN_AND:
	    	logic_gate_index = and_cell_lib_index;
			break;
		case MN_OR:
	    	logic_gate_index = or_cell_lib_index;
			break;
		case MN_XOR:
   		 	logic_gate_index = xor_cell_lib_index;
			break;
		case MN_NAND:
	    	logic_gate_index = nand_cell_lib_index;
			break;
		case MN_NOR:
	    	logic_gate_index = nor_cell_lib_index;
			break;
		case MN_XNOR:
	    	logic_gate_index = xnor_cell_lib_index;
			break;
	  	default:
			assert(0);
	}

	for (j = 0; j < width; j++)
	{
		/* instantiate the cells */
		new_logic_cells[j] = osm_create_a_gate("LOGIC", logic_gate_index, 2, 1, traverse_number, logic_node->unique_name);
	}

	/* connect inputs.  In the case that a signal is smaller than the other then zero pad */
    for(j = 0; j < width; j++)
	{
		/* Joining the inputs to the input 1 of that gate */
		if (j < width_a)
		{
			if (j < width_b)
			{
				/* IF - this current input will also have a corresponding b_port input then join it to the gate */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[j]), 
														onu_get_input_pins_related_output_port(logic_node->input_pins[j]),
														logic_node, 
														j, 
														new_logic_cells[j], 
														0);
			}
			else
			{
				/* ELSE - the B input does not exist, so this answer goes right through */
				osm_join_input_directly_to_output(logic_node, j, j);
			}
		}
#if 0
		else
		{
			/* ELSE - we need to join with a zero node */
			osm_join_gate_nodes(gnd_node, 0, new_logic_cells[j], 0);
		}
#endif

		if (j < width_b)
		{
			if (j < width_a)
			{
				/* IF - this current input will also have a corresponding a_port input then join it to the gate */
				/* Joining the inputs to the input 2 of that gate */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[j+port_B_offset]), 
														onu_get_input_pins_related_output_port(logic_node->input_pins[j+port_B_offset]),
														logic_node, 
														j+port_B_offset, 
														new_logic_cells[j], 
														1);
			}
			else
			{
				/* ELSE - the A input does not exist, so this answer goes right through */
				osm_join_input_directly_to_output(logic_node, j+port_B_offset, j);
			}
		}
#if 0
		else
		{
			/* ELSE - we need to join with a zero node */
			osm_join_gate_nodes(gnd_node, 0, new_logic_cells[j], 1);
		}
#endif


		/* joining each of the outputs to the not outputs */
		onu_copy_output_port(new_logic_cells[j], logic_node, 0, j);
	}

	ou_free(new_logic_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_logical_reduction_gate )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_logical_reduction_gate(node_t *logic_node, short traverse_number)
{
	int width_a;
	int width_b;
	int i;
	int current_spot;

	node_t **new_or_cells1;
	node_t **new_or_cells2;
	node_t *final_gate;

	width_a = logic_node->n_t.hetero_node.width_a;
	width_b = logic_node->n_t.hetero_node.width_b;

	new_or_cells1 = (node_t**)ou_malloc(sizeof(node_t*)*width_a-1, HETS_SOFT_MAPPING);
	new_or_cells2 = (node_t**)ou_malloc(sizeof(node_t*)*width_b-1, HETS_SOFT_MAPPING);

	assert(width_a != 0);
	assert(width_b != 0);

	/* based on the operand type index the required cell type */
	switch (logic_node->n_t.hetero_node.hetero_node_type) 
	{
		case MN_LOG_AND:
			final_gate = osm_create_a_gate("AND", and_cell_lib_index, 2, 1, traverse_number, logic_node->unique_name);
			break;
		case MN_LOG_OR:
			final_gate = osm_create_a_gate("OR", or_cell_lib_index, 2, 1, traverse_number, logic_node->unique_name);
			break;
	  	default:
			assert(FALSE);
	}

	/* create the gates needed for a single output the first  */
    for(i = 0; i < width_a - 1; i++)
	{
		new_or_cells1[i] = osm_create_a_gate("OR_TREE1", or_cell_lib_index, 2, 1, traverse_number, logic_node->unique_name);
	}
    for(i = 0; i < width_b - 1; i++)
	{
		new_or_cells2[i] = osm_create_a_gate("OR_TREE2", or_cell_lib_index, 2, 1, traverse_number, logic_node->unique_name);
	}
	
	current_spot = 0;
	
	/* do the OR trees for each input port.  Done in same loop */
	for (i = 0; i < width_a - 1; i++)
	{
		/* stop condition - 2 * the number of signals coming in */
		if (current_spot != (2*width_a-1))
		{
			/* do the first input to the and gate and check if Primary Input from the comparators */
			if (current_spot < width_a)
			{
				/* IF PI */
				/* start the net */
				/* hookup port A to a or network */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_or_cells1[i], 
												0);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_or_cells1[current_spot-width_a], 0, new_or_cells1[i], 0);
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width_a)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_or_cells1[i], 
												1);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_or_cells1[current_spot-width_a], 0, new_or_cells1[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	current_spot = 0;
	
	/* do the OR trees for each input port.  Done in same loop */
	for (i = 0; i < width_b - 1; i++)
	{
		/* stop condition - 2 * the number of signals coming in */
		if (current_spot != (2*width_b-1))
		{
			/* do the first input to the and gate and check if Primary Input from the comparators */
			if (current_spot < width_b)
			{
				/* IF PI */
				/* start the net */
				/* hookup port B to a or network */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot+width_a]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot+width_a]),
												logic_node, 
												current_spot+width_a, 
												new_or_cells2[i], 
												0);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_or_cells2[current_spot-width_b], 0, new_or_cells2[i], 0);
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width_b)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot+width_a]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot+width_a]),
												logic_node, 
												current_spot+width_a, 
												new_or_cells2[i], 
												1);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_or_cells2[current_spot-width_b], 0, new_or_cells2[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	/* join the final bits of each reduction tree to the final_gate */
	if (width_a == 1)
	{
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[0]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[0]),
												logic_node, 
												0, 
												final_gate,
												0);
	}
	else
	{
		osm_join_gate_nodes(new_or_cells1[width_a-2], 0, final_gate, 0);
	}

	if (width_b == 1)
	{
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[0+width_a]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[0+width_a]),
												logic_node, 
												0+width_a, 
												final_gate,
												1);
	}
	else
	{
		osm_join_gate_nodes(new_or_cells2[width_b-2], 0, final_gate, 1);
	}

	/* join that gate to the output */
	onu_copy_output_port(final_gate, logic_node, 0, 0);

	ou_free(new_or_cells1); 
	ou_free(new_or_cells2); 
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_reduction_gate )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_reduction_gate(node_t *logic_node, short traverse_number)
{
	int width = logic_node->n_t.hetero_node.width_a;
	int logic_gate_index;
	int i;
	int current_spot;
	node_t **new_logic_cells;

	assert(1 == logic_node->n_t.hetero_node.width);

	new_logic_cells = (node_t**)ou_malloc(sizeof(node_t*)*width-1, HETS_SOFT_MAPPING);

	/* based on the operand type index the required cell type */
	switch (logic_node->n_t.hetero_node.hetero_node_type) 
	{
		case MN_RED_AND:
	    	logic_gate_index = and_cell_lib_index;
			break;
		case MN_RED_OR:
	    	logic_gate_index = or_cell_lib_index;
			break;
		case MN_RED_XOR:
	    	logic_gate_index = xor_cell_lib_index;
			break;
		case MN_RED_NAND:
	    	logic_gate_index = nand_cell_lib_index;
			break;
		case MN_RED_NOR:
	    	logic_gate_index = nor_cell_lib_index;
			break;
		case MN_RED_XNOR:
	    	logic_gate_index = xnor_cell_lib_index;
			break;
	  	default:
			assert(FALSE);
	}

	/* create the gates needed for a single output */
    for(i = 0; i < width - 1; i++)
	{
		new_logic_cells[i] = osm_create_a_gate("RED_GATE", logic_gate_index, 2, 1, traverse_number, logic_node->unique_name);
	}

	current_spot = 0;
	
	/* do the LOGIC gate tree to create one output */
	for (i = 0; i < width - 1; i++)
	{
		/* stop condition - 2 * the number of signals coming in */
		if (current_spot != (2*width-1))
		{
			/* do the first input to the and gate and check if Primary Input from the comparators */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_logic_cells[i], 
												0);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 0);
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_logic_cells[i], 
												1);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	/* join the final bit to the output */
	onu_copy_output_port(new_logic_cells[width-2], logic_node, 0, 0);

	ou_free(new_logic_cells); 
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_logical_not )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_logical_not(node_t *logic_node, short traverse_number)
{
	int width = logic_node->n_t.hetero_node.width_a;
	int i;
	int current_spot;
	node_t **new_logic_cells;
	node_t *final_gate;

	assert(1 == logic_node->n_t.hetero_node.width);

	new_logic_cells = (node_t**)ou_malloc(sizeof(node_t*)*width-1, HETS_SOFT_MAPPING);

	/* create the final not gate */
	final_gate = osm_create_a_gate("NOT_LOG", not_cell_lib_index, 1, 1, traverse_number, logic_node->unique_name);

	/* create the gates needed for a single output */
    for(i = 0; i < width - 1; i++)
	{
		new_logic_cells[i] = osm_create_a_gate("NL_OR_TREE", or_cell_lib_index, 2, 1, traverse_number, logic_node->unique_name);
	}

	current_spot = 0;
	
	/* do the LOGIC gate tree to create one output */
	for (i = 0; i < width - 1; i++)
	{
		/* stop condition - 2 * the number of signals coming in */
		if (current_spot != (2*width-1))
		{
			/* do the first input to the and gate and check if Primary Input from the comparators */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_logic_cells[i], 
												0);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 0);
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[current_spot]), 
												onu_get_input_pins_related_output_port(logic_node->input_pins[current_spot]),
												logic_node, 
												current_spot, 
												new_logic_cells[i], 
												1);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	if (width > 1)
	{
		/* join the final bits of each reduction tree to the final_gate */
		osm_join_gate_nodes(new_logic_cells[width-2], 0, final_gate, 0);
	}
	else
	{
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(logic_node->input_pins[0]), 
											onu_get_input_pins_related_output_port(logic_node->input_pins[0]),
											logic_node, 
											0, 
											final_gate, 
											0);
	}

	/* join that gate to the output */
	onu_copy_output_port(final_gate, logic_node, 0, 0);

	ou_free(new_logic_cells); 
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_add_with_add_and_carry )
 * 	This is for soft addition in output formats that don't handle multi-output logic functions
 * 	(BLIF).  We use one function for the add, and one for the carry.
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_add_with_add_and_carry(node_t *adder_node, short traverse_number)
{
	int width = adder_node->n_t.hetero_node.width;
	int width_a = adder_node->n_t.hetero_node.width_a;
	int width_b = adder_node->n_t.hetero_node.width_b;
	int adder_idx;
	int carry_idx;
	int j;
	node_t **new_add_cells;
	node_t **new_carry_cells;

	new_add_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);
	new_carry_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* grab an adder and zero index */
    adder_idx = find_library_cell("ADDC");
	carry_idx = adder_idx + 1;
    if(adder_idx < 0)
	{
		assert(0);
	}

	/* create the adder units and the zero unit */
	for (j = 0; j < width; j++)
	{
		new_add_cells[j] = osm_create_a_gate("ADD", adder_idx, 3, 1, traverse_number, adder_node->unique_name);
		new_carry_cells[j] = osm_create_a_gate("CARRY", carry_idx, 3, 1, traverse_number, adder_node->unique_name);
	}

    /* ground first carry in */
	osm_join_gate_nodes(gnd_node, 0, new_add_cells[0], ADDER_CARRY_IN_PIN);
	osm_join_gate_nodes(gnd_node, 0, new_carry_cells[0], ADDER_CARRY_IN_PIN);

	/* connect inputs */
    for(j = 0; j < width; j++)
	{
		if (j < width_a)
		{
			/* join the A port up to adder */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
													adder_node, 
													j, 
													new_add_cells[j], 
													ADDER_A_IN_PIN);
			/* join the A port upi to carry */
			osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(onu_get_input_pins_node(adder_node->input_pins[j]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
													adder_node, 
													j, 
													new_carry_cells[j], 
													ADDER_A_IN_PIN);
		}
		else 
		{
			osm_join_gate_nodes(gnd_node, 0, new_add_cells[j], ADDER_A_IN_PIN);
			osm_join_gate_nodes(gnd_node, 0, new_carry_cells[j], ADDER_A_IN_PIN);
		}

		if (j < width_b)
		{
			/* join the B port up to adder */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j+width_a]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j+width_a]),
													adder_node, 
													j+width_a, 
													new_add_cells[j], 
													ADDER_B_IN_PIN);
			/* join the B port upi to carry */
			osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(onu_get_input_pins_node(adder_node->input_pins[j+width_a]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j+width_a]),
													adder_node, 
													j+width_a, 
													new_carry_cells[j], 
													ADDER_B_IN_PIN);
		}
		else
		{
			osm_join_gate_nodes(gnd_node, 0, new_add_cells[j], ADDER_B_IN_PIN);
			osm_join_gate_nodes(gnd_node, 0, new_carry_cells[j], ADDER_B_IN_PIN);
		}

		/* join that gate to the output */
		onu_copy_output_port(new_add_cells[j], adder_node, 0, j);
	}
	
    /* connect carry outs with carry ins */
    for(j = 1; j < width; j++)
	{
		osm_join_gate_nodes(new_carry_cells[j-1], 0, new_add_cells[j], ADDER_CARRY_IN_PIN);
		osm_join_gate_nodes(new_carry_cells[j-1], 0, new_carry_cells[j], ADDER_CARRY_IN_PIN);
	}

	ou_free(new_add_cells);
	ou_free(new_carry_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_sub_w_carry_cell )
 * 	This subtraction is intended for sof subtraction with output formats that can't handle 
 * 	multi output logic functions.  We split the add and the carry over two logic functions.
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_sub_w_carry_cell(node_t *adder_node, short traverse_number)
{
	int width = adder_node->n_t.hetero_node.width;
	int width_a = adder_node->n_t.hetero_node.width_a;
	int width_b = adder_node->n_t.hetero_node.width_b;
	int adder_idx;
	int carry_idx;
	int j;
	node_t **new_add_cells;
	node_t **new_carry_cells;
	node_t **new_not_cells;

	new_add_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);
	new_carry_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);
	new_not_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* grab an adder and zero index */
	/* Jul 12, 2002 BUG fix by Nathalie - addc should be ADDC, and lower down hooked up adder to not on bad input */
    adder_idx = find_library_cell("ADDC");
	carry_idx = adder_idx + 1;
    if(adder_idx < 0)
	{
		assert(0);
	}

	/* create the adder units and the zero unit */
	for (j = 0; j < width; j++)
	{
		new_add_cells[j] = osm_create_a_gate("add", adder_idx, 3, 1, traverse_number, adder_node->unique_name);
		new_carry_cells[j] = osm_create_a_gate("carry", carry_idx, 3, 1, traverse_number, adder_node->unique_name);
		new_not_cells[j] = osm_create_a_gate("not_2_sub", not_cell_lib_index, 1, 1, traverse_number, adder_node->unique_name);
	}

    /* vcc first carry in */
	osm_join_gate_nodes(vcc_node, 0, new_add_cells[0], ADDER_CARRY_IN_PIN);
	osm_join_gate_nodes(vcc_node, 0, new_carry_cells[0], ADDER_CARRY_IN_PIN);

	/* connect inputs */
    for(j = 0; j < width; j++)
	{
		if (j < width_a)
		{
			/* join the a port up to adder */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
													adder_node, 
													j, 
													new_add_cells[j], 
													ADDER_A_IN_PIN);
			/* join the a port upi to carry */
			osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(onu_get_input_pins_node(adder_node->input_pins[j]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
													adder_node, 
													j, 
													new_carry_cells[j], 
													ADDER_A_IN_PIN);
		}
		else 
		{
			osm_join_gate_nodes(gnd_node, 0, new_add_cells[j], ADDER_A_IN_PIN);
			osm_join_gate_nodes(gnd_node, 0, new_carry_cells[j], ADDER_A_IN_PIN);
		}

		if (j < width_b)
		{
			/* join the b port up to adder */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j+width_a]), 
													onu_get_input_pins_related_output_port(adder_node->input_pins[j+width_a]),
													adder_node, 
													j+width_a, 
													new_not_cells[j], 
													0);
			osm_join_gate_nodes(new_not_cells[j], 0, new_add_cells[j], ADDER_B_IN_PIN);
			osm_join_gate_nodes(new_not_cells[j], 0, new_carry_cells[j], ADDER_B_IN_PIN);
		}
		else
		{
			osm_join_gate_nodes(vcc_node, 0, new_add_cells[j], ADDER_B_IN_PIN);
			osm_join_gate_nodes(vcc_node, 0, new_carry_cells[j], ADDER_B_IN_PIN);
		}

		/* join that gate to the output */
		onu_copy_output_port(new_add_cells[j], adder_node, 0, j);
	}
	
    /* connect carry outs with carry ins */
    for(j = 1; j < width; j++)
	{
		osm_join_gate_nodes(new_carry_cells[j-1], 0, new_add_cells[j], ADDER_CARRY_IN_PIN);
		osm_join_gate_nodes(new_carry_cells[j-1], 0, new_carry_cells[j], ADDER_CARRY_IN_PIN);
	}

	ou_free(new_add_cells);
	ou_free(new_carry_cells);
	ou_free(new_not_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_add )
 *	Create the adder circuitry.
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_add(node_t *adder_node, short traverse_number)
{
	int width = adder_node->n_t.hetero_node.width;
	int adder_idx;
	int j;
	node_t **new_add_cells;

	int port_B_offset = adder_node->n_t.hetero_node.width_a;

	new_add_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* grab an adder and zero index */
    adder_idx = find_library_cell("ADDC");
    if(adder_idx < 0)
	{
		assert(0);
	}

	/* create the adder units and the zero unit */
	for (j = 0; j < width; j++)
	{
		new_add_cells[j] = osm_create_a_gate("ADD", adder_idx, 3, 2, traverse_number, adder_node->unique_name);
	}

    /* ground first carry in */
	osm_join_gate_nodes(gnd_node, 0, new_add_cells[0], ADDER_CARRY_IN_PIN);

	/* connect inputs */
    for(j = 0; j < width; j++)
	{
		/* join the A port up */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j]), 
												onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
												adder_node, 
												j, 
												new_add_cells[j], 
												ADDER_A_IN_PIN);

		/* join the B port up */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j+port_B_offset]), 
												onu_get_input_pins_related_output_port(adder_node->input_pins[j+port_B_offset]),
												adder_node, 
												j+port_B_offset, 
												new_add_cells[j], 
												ADDER_B_IN_PIN);

		/* join that gate to the output */
		onu_copy_output_port(new_add_cells[j], adder_node, ADDER_OUT_PIN, j);
	}
	
    /* connect carry outs with carry ins */
    for(j = 1; j < width; j++)
	{
		osm_join_gate_nodes(new_add_cells[j-1], ADDER_CARRY_OUT_PIN, new_add_cells[j], ADDER_CARRY_IN_PIN);
	}

	ou_free(new_add_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_sub )
 *	Create the adder circuitry.
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_sub(node_t *adder_node, short traverse_number)
{
	int width = adder_node->n_t.hetero_node.width;
	int adder_idx;
	int j;
	node_t **new_add_cells;
	node_t **new_not_cells;

	int port_B_offset = adder_node->n_t.hetero_node.width_a;

	new_add_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);
	new_not_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* grab an adder and zero index */
    adder_idx = find_library_cell("ADDC");
    if(adder_idx < 0)
	{
		assert(0);
	}

	/* create the adder units and the zero unit */
	for (j = 0; j < width; j++)
	{
		new_add_cells[j] = osm_create_a_gate("SUB", adder_idx, 3, 2, traverse_number, adder_node->unique_name);
		new_not_cells[j] = osm_create_a_gate("NOT_2_SUB", not_cell_lib_index, 1, 1, traverse_number, adder_node->unique_name);
	}

    /* vcc first carry in */
	osm_join_gate_nodes(vcc_node, 0, new_add_cells[0], ADDER_CARRY_IN_PIN);

	/* connect inputs */
    for(j = 0; j < width; j++)
	{
		/* join the A port up */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j]), 
												onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
												adder_node, 
												j, 
												new_add_cells[j], 
												ADDER_A_IN_PIN);

		/* join the B port up to the not then the adder */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j+port_B_offset]), 
												onu_get_input_pins_related_output_port(adder_node->input_pins[j+port_B_offset]),
												adder_node, 
												j+port_B_offset, 
												new_not_cells[j], 
												0);
		osm_join_gate_nodes(new_not_cells[j], 0, new_add_cells[j], ADDER_B_IN_PIN);

		/* join that gate to the output */
		onu_copy_output_port(new_add_cells[j], adder_node, ADDER_OUT_PIN, j);
	}
	
    /* connect carry outs with carry ins */
    for(j = 1; j < width; j++)
	{
		osm_join_gate_nodes(new_add_cells[j-1], ADDER_CARRY_OUT_PIN, new_add_cells[j], ADDER_CARRY_IN_PIN);
	}

	ou_free(new_add_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function:  osm_instantiate_unary_sub )
 *	Does 2's complement which is the equivalent of a unary subtraction as a HW implementation.	
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_unary_sub(node_t *adder_node, short traverse_number)
{
	int width = adder_node->n_t.hetero_node.width; 
	int adder_idx;
	int j;
	node_t **new_add_cells;
	node_t **new_not_cells;

	new_add_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);
	new_not_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	/* grab an adder and zero index */
    adder_idx = find_library_cell("ADDC");
    if(adder_idx < 0)
	{
		assert(0);
	}

	/* create the adder units and the zero unit */
	for (j = 0; j < width; j++)
	{
		new_add_cells[j] = osm_create_a_gate("UN_SUB", adder_idx, 3, 2, traverse_number, adder_node->unique_name);
		new_not_cells[j] = osm_create_a_gate("NOT_2_UN", not_cell_lib_index, 1, 1, traverse_number, adder_node->unique_name);
	}

    /* vcc first carry in */
	osm_join_gate_nodes(vcc_node, 0, new_add_cells[0], ADDER_CARRY_IN_PIN);

	/* connect inputs */
    for(j = 0; j < width; j++)
	{
		/* join the A port up */
		osm_join_gate_nodes(gnd_node, 0, new_add_cells[j], ADDER_A_IN_PIN);

		/* join the B port up to the not then the adder */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(adder_node->input_pins[j]), 
												onu_get_input_pins_related_output_port(adder_node->input_pins[j]),
												adder_node, 
												j, 
												new_not_cells[j], 
												0);
		osm_join_gate_nodes(new_not_cells[j], 0, new_add_cells[j], ADDER_B_IN_PIN);

		/* join that gate to the output */
		onu_copy_output_port(new_add_cells[j], adder_node, ADDER_OUT_PIN, j);
	}
	
    /* connect carry outs with carry ins */
    for(j = 1; j < width; j++)
	{
		osm_join_gate_nodes(new_add_cells[j-1], ADDER_CARRY_OUT_PIN, new_add_cells[j], ADDER_CARRY_IN_PIN);
	}

	ou_free(new_add_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_define_an_compare_EQ )
 *	Builds the hardware for an equal comparison by building EQ for parallel lines and then
 *	taking them all through an AND tree.
 *-------------------------------------------------------------------------------------------*/
void osm_define_an_compare_EQ(node_t *compare_node, short traverse_number)
{
	int width_a = compare_node->n_t.hetero_node.width_a;
	int width_b = compare_node->n_t.hetero_node.width_b;
	int width_max = width_a > width_b ? width_a : width_b;
	int i;
	node_t **new_compare_cells;
	node_t *return_output_node;
	int *output_index_list = (int*)ou_malloc(sizeof(int)*width_max, HETS_SOFT_MAPPING);
	int port_B_offset = compare_node->n_t.hetero_node.width_a;

	//assert(compare_node->n_t.hetero_node.width_b == compare_node->n_t.hetero_node.width_a);

	new_compare_cells = (node_t**)ou_malloc(sizeof(node_t*)*width_max, HETS_SOFT_MAPPING);

	/* create the adder units and the zero unit */
	for (i = 0; i < width_max; i++)
	{
		new_compare_cells[i] = osm_create_a_gate("EQ", cmp_eq_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
	}
	
	/* hookup the comaparators to the inputs */
	for(i = 0; i < width_max; i++)
	{
		if (i < width_a)
		{
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i]),
												compare_node, 
												i, 
												new_compare_cells[i], 
												0);
		}
		else
		{
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells[i], 0);
		}

		if (i < width_b)
		{
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i+port_B_offset]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i+port_B_offset]),
												compare_node, 
												i+port_B_offset, 
												new_compare_cells[i], 
												1);
		}
		else
		{
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells[i], 1);
		}

		/* setup the value for outputs */
		output_index_list[i] = 0;
	}
	
	if (width_max >= 2)
	{
		/* create the AND gates needed for a single output */
		return_output_node = osm_create_a_2_input_logic_tree_to_single_out_with_inputs(and_cell_lib_index,
										width_max, 
										new_compare_cells,
										output_index_list,
										traverse_number);
	}
	else
	{
		/* ELSE - retrun the output from the primary cell */
		return_output_node = new_compare_cells[0];
	}	
	
	if (compare_node->n_t.hetero_node.hetero_node_type == MN_NEQ) 
	{
		/* IF - this is not equal then add a not to the end */
		node_t *not_node;
		not_node = osm_create_a_gate("NOT_NEQ", not_cell_lib_index, 1, 1, traverse_number, compare_node->unique_name);
		osm_join_gate_nodes(return_output_node, 0, not_node, 0);

		/* update that the not gate is the final output */
		return_output_node = not_node;
	}
	
	/* join that gate to the output */
	onu_copy_output_port(return_output_node, compare_node, 0, 0);

	/* free the array */
	ou_free(new_compare_cells); 
	ou_free(output_index_list); 
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_define_an_compare_GE )
 *	Defines the HW needed for greter than equal with EQ, GT, AND and OR gates to create
 *	the appropriate logic function.
 *-------------------------------------------------------------------------------------------*/
void osm_define_an_compare_GE(node_t *compare_node, short traverse_number)
{
	int width_a = compare_node->n_t.hetero_node.width_a;
	int width_b = compare_node->n_t.hetero_node.width_b;
	int width_max = width_a > width_b ? width_a : width_b;
	int i;
	int current_spot;

	node_t **new_compare_cells_EQ;
	node_t **new_compare_cells_GT;
	node_t **new_and_cells_cascade;
	node_t **new_and_cells_gt;
	node_t **new_or_cells;
	node_t *final_or_cell;

	int port_B_offset = compare_node->n_t.hetero_node.width_a;

	/* allocate cells that will be used */
	new_compare_cells_EQ = (node_t**)ou_malloc(sizeof(node_t*)*width_max, HETS_SOFT_MAPPING);
	new_compare_cells_GT = (node_t**)ou_malloc(sizeof(node_t*)*width_max, HETS_SOFT_MAPPING);
	new_and_cells_cascade = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);
	new_and_cells_gt = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);
	new_or_cells = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);

	/* create the adder units and the zero unit */
	for (i = 0; i < width_max; i++)
	{
		new_compare_cells_EQ[i] = osm_create_a_gate("EQ", cmp_eq_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
		new_compare_cells_GT[i] = osm_create_a_gate("GT", cmp_gt_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
	}

	for (i = 0; i < width_max-1; i++)
	{
		new_and_cells_cascade[i] = osm_create_a_gate("GE_AND_CASC", and_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
		new_and_cells_gt[i] = osm_create_a_gate("GE_AND_GT", and_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
		new_or_cells[i] = osm_create_a_gate("GE_OR_TREE", or_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
	}
	/* hookup the comaparators to the inputs */
	for(i = 0; i < width_max; i++)
	{
		/* Join to the equal */
		if (i < width_a)
		{
			/* IF - we don't need to pad, hookup the input */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i]),
												compare_node, 
												i, 
												new_compare_cells_EQ[i], 
												0);
			/* Join to the GT gates */
			osm_join_gate_nodes(onu_get_input_pins_node(compare_node->input_pins[i]), 
							onu_get_input_pins_related_output_port(compare_node->input_pins[i]), 
							new_compare_cells_GT[i], 
							0);
		}
		else
		{
			/* ELSE - pad with zero */
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells_EQ[i], 0);
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells_GT[i], 0);
		}
		if (i < width_b)
		{
			/* IF - we don't need to pad, hookup the input */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i+port_B_offset]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i+port_B_offset]),
												compare_node, 
												i+port_B_offset, 
												new_compare_cells_EQ[i], 
												1);
			/* Join to the GT gates */
			osm_join_gate_nodes(onu_get_input_pins_node(compare_node->input_pins[i+port_B_offset]), 
							onu_get_input_pins_related_output_port(compare_node->input_pins[i+port_B_offset]), 
							new_compare_cells_GT[i], 
							1);
		}
		else
		{
			/* ELSE - pad with zero */
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells_EQ[i], 1);
			osm_join_gate_nodes(gnd_node, 0, new_compare_cells_GT[i], 1);
		}
	}
	
	current_spot = 0;
	
	/* Build the little and networks */
	for (i = width_max-1; i >= 0; i--)
	{
		/* the first one is the second most significant bit which is a single input */
		if (i < width_max - 2)
		{
			/* do the next AND i(x) attached to the CASCADE */
			osm_join_gate_nodes(new_compare_cells_EQ[i], 0, new_and_cells_cascade[i], 0);
			osm_join_gate_nodes(new_and_cells_cascade[i+1], 0, new_and_cells_cascade[i], 1);
		}
		/* second stage (3rd most significant bit needs to start the casecade */
		else if (i == width_max - 2)
		{
			/* do the next AND i(x) attached to the CASCADE */
			osm_join_gate_nodes(new_compare_cells_EQ[i], 0, new_and_cells_cascade[i], 0);
			osm_join_gate_nodes(new_compare_cells_EQ[i+1], 0, new_and_cells_cascade[i], 1);
		}
	}
	for (i = width_max-1; i >= 0; i--)
	{
		/* attach this cascades output to an AND_GT of the GT units */
		if (i < width_max-2)
		{
			/* connect the cascade with the output of the comparator into an AND */
			osm_join_gate_nodes(new_compare_cells_GT[i], 0, new_and_cells_gt[i], 0);
			osm_join_gate_nodes(new_and_cells_cascade[i+1], 0, new_and_cells_gt[i], 1);
		}
		else if (i == width_max - 2)
		{
			/* ELSE this is special case for the first join (second MSbit) where no cascade yet */

			/* connect the start with the output of the comparator into an AND */
			osm_join_gate_nodes(new_compare_cells_GT[i], 0, new_and_cells_gt[i], 0);
			osm_join_gate_nodes(new_compare_cells_EQ[i+1], 0, new_and_cells_gt[i], 1);
		}
	}
		
	current_spot = 0;

	/* do the OR gate tree to create one output */
	for (i = 0; i < width_max - 1; i++)
	{
		/* stop condition */
		if (current_spot != (2*width_max-1))
		{
			/* do the first input to the OR gate and check if Primary Input from the comparators */
			if ((current_spot < width_max)&&(current_spot != width_max-1))
			{
				/* IF PI */
				osm_join_gate_nodes(new_and_cells_gt[current_spot], 0, new_or_cells[i], 0);
			}	
			else if (current_spot == width_max-1)
			{
				/* ELSE IF PI is the non AND_GT spot since this is the MSbit */
				osm_join_gate_nodes(new_compare_cells_GT[current_spot], 0, new_or_cells[i], 0);
			}
			else
			{
				/* ELSE this is an internal gate */
				osm_join_gate_nodes(new_or_cells[current_spot-width_max], 0, new_or_cells[i], 0);
			}

			current_spot ++;
	
			/* do the second input to the and gate */
			if ((current_spot < width_max)&&(current_spot != width_max-1))
			{
				/* IF PI */
				osm_join_gate_nodes(new_and_cells_gt[current_spot], 0, new_or_cells[i], 1);
			}	
			else if (current_spot == width_max-1)
			{
				/* ELSE IF PI is the non AND_GT spot since this is the MSbit */
				osm_join_gate_nodes(new_compare_cells_GT[current_spot], 0, new_or_cells[i], 1);
			}
			else
			{
				/* ELSE this is an internal gate */
				osm_join_gate_nodes(new_or_cells[current_spot-width_max], 0, new_or_cells[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			/* should be the last gate.  Need to hook up to the output of the compare. */
			fprintf(stderr, "Error in GATE generation\n");
			exit(-1);
		}
	}

	/* create FINAL OR gate */
	final_or_cell = osm_create_a_gate("GE_FIN_OR", or_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);

	if (width_max != 1)
	{
		/* create the OR between CMP and GT */
		osm_join_gate_nodes(new_and_cells_cascade[0], 0, final_or_cell, 0);
		/* the output from the GT tests */
		osm_join_gate_nodes(new_or_cells[current_spot-width_max], 0, final_or_cell, 1);
	}
	else
	{
		/* ELSE this is a single EQ and GT units so just OR together */

		/* create the OR between CMP and GT */
		osm_join_gate_nodes(new_compare_cells_EQ[0], 0, final_or_cell, 0);
		/* the output from the GT tests */
		osm_join_gate_nodes(new_compare_cells_GT[0], 0, final_or_cell, 0);
	}

	/* join that gate to the output */
	onu_copy_output_port(final_or_cell, compare_node, 0, 0);

	ou_free(new_compare_cells_EQ);
	ou_free(new_compare_cells_GT);
	ou_free(new_and_cells_gt);
	ou_free(new_and_cells_cascade);
	ou_free(new_or_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_define_an_compare_GT )
 *	Defines the HW needed for greter than equal with EQ, GT, AND and OR gates to create
 *	the appropriate logic function.
 *-------------------------------------------------------------------------------------------*/
void osm_define_an_compare_GT(node_t *compare_node, short traverse_number)
{
	int width_a = compare_node->n_t.hetero_node.width_a;
	int width_b = compare_node->n_t.hetero_node.width_b;
	int width_max = width_a > width_b ? width_a : width_b;
	int i;
	int current_spot;
	int port_B_offset = compare_node->n_t.hetero_node.width_a;

	if (TRUE)
	{
		/* IF - there is no adder capabilities */
		node_t **new_compare_cells_EQ;
		node_t **new_compare_cells_GT;
		node_t **new_and_cells_cascade;
		node_t **new_and_cells_gt;
		node_t **new_or_cells;
	
		/* allocate cells that will be used */
		new_compare_cells_EQ = (node_t**)ou_malloc(sizeof(node_t*)*width_max, HETS_SOFT_MAPPING);
		new_compare_cells_GT = (node_t**)ou_malloc(sizeof(node_t*)*width_max, HETS_SOFT_MAPPING);
		new_and_cells_cascade = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);
		new_and_cells_gt = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);
		new_or_cells = (node_t**)ou_malloc(sizeof(node_t*)*width_max-1, HETS_SOFT_MAPPING);
	
		/* create the adder units and the zero unit */
		for (i = 0; i < width_max; i++)
		{
			new_compare_cells_EQ[i] = osm_create_a_gate("GT_EQ", cmp_eq_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
			new_compare_cells_GT[i] = osm_create_a_gate("GT_GT", cmp_gt_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
		}
		for (i = 0; i < width_max-1; i++)
		{
			new_and_cells_cascade[i] = osm_create_a_gate("GT_AND_CASC", and_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
			new_and_cells_gt[i] = osm_create_a_gate("GT_AND_GT", and_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
			new_or_cells[i] = osm_create_a_gate("GT_OR_TREE", or_cell_lib_index, 2, 1, traverse_number, compare_node->unique_name);
		}
	
		/* hookup the comaparators to the inputs */
		for(i = 0; i < width_max; i++)
		{
			/* Join to the equal */
			if (i < width_a)
			{
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i]), 
													onu_get_input_pins_related_output_port(compare_node->input_pins[i]),
													compare_node, 
													i, 
													new_compare_cells_EQ[i], 
													0);
				/* Join to the GT gates */
				osm_join_gate_nodes(onu_get_input_pins_node(compare_node->input_pins[i]), 
								onu_get_input_pins_related_output_port(compare_node->input_pins[i]), 
								new_compare_cells_GT[i], 
								0);
			}
			else
			{
				/* ELSE - pad with zero */
				osm_join_gate_nodes(gnd_node, 0, new_compare_cells_EQ[i], 0);
				osm_join_gate_nodes(gnd_node, 0, new_compare_cells_GT[i], 0);
			}
			if (i < width_b)
			{
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i+port_B_offset]), 
													onu_get_input_pins_related_output_port(compare_node->input_pins[i+port_B_offset]),
													compare_node, 
													i+port_B_offset, 
													new_compare_cells_EQ[i], 
													1);
				osm_join_gate_nodes(onu_get_input_pins_node(compare_node->input_pins[i+port_B_offset]), 
								onu_get_input_pins_related_output_port(compare_node->input_pins[i+port_B_offset]), 
								new_compare_cells_GT[i], 
								1);
			}
			else
			{
				/* ELSE - pad with zero */
				osm_join_gate_nodes(gnd_node, 0, new_compare_cells_EQ[i], 1);
				osm_join_gate_nodes(gnd_node, 0, new_compare_cells_GT[i], 1);
			}
		}
	
		/* Build the little and networks */
		for (i = width_max-1; i >= 0; i--)
		{
			if (i < width_max - 2)
			{
				/* do the next AND i(x) attached to the CASCADE */
				osm_join_gate_nodes(new_compare_cells_EQ[i], 0, new_and_cells_cascade[i], 0);
				osm_join_gate_nodes(new_and_cells_cascade[i+1], 0, new_and_cells_cascade[i], 1);
			}
			/* second stage (3rd most significant bit needs to start the casecade */
			else if (i == width_max - 2)
			{
				/* do the next AND i(x) attached to the CASCADE */
				osm_join_gate_nodes(new_compare_cells_EQ[i], 0, new_and_cells_cascade[i], 0);
				osm_join_gate_nodes(new_compare_cells_EQ[i+1], 0, new_and_cells_cascade[i], 1);
			}
		}
		
		for (i = width_max - 1; i >= 0; i--)
		{
			/* attach this cascades output to an AND_GT of the GT units */
			if (i < width_max-2)
			{
				/* connect the cascade with the output of the comparator into an AND */
				osm_join_gate_nodes(new_compare_cells_GT[i], 0, new_and_cells_gt[i], 0);
				osm_join_gate_nodes(new_and_cells_cascade[i+1], 0, new_and_cells_gt[i], 1);
			}
			else if (i == width_max - 2)
			{
				/* ELSE this is special case for the first join (second MSbit) where no cascade yet */
	
				/* connect the start with the output of the comparator into an AND */
				osm_join_gate_nodes(new_compare_cells_GT[i], 0, new_and_cells_gt[i], 0);
				osm_join_gate_nodes(new_compare_cells_EQ[i+1], 0, new_and_cells_gt[i], 1);
			}
		}
	
		current_spot = 0;
	
		/* do the OR gate tree to create one output */
		for (i = 0; i < width_max - 1; i++)
		{
			/* stop condition */
			if (current_spot != (2*width_max-1))
			{
				/* do the first input to the OR gate and check if Primary Input from the comparators */
				if ((current_spot < width_max)&&(current_spot != width_max-1))
				{
					/* IF PI */
					/* the output from the comparator */
					osm_join_gate_nodes(new_and_cells_gt[current_spot], 0, new_or_cells[i], 0);
				}	
				else if (current_spot == width_max-1)
				{
					/* ELSE IF PI is the non AND_GT spot since this is the MSbit */
					/* the output from the comparator */
					osm_join_gate_nodes(new_compare_cells_GT[current_spot], 0, new_or_cells[i], 0);
				}
				else
				{
					/* ELSE this is an internal gate */
					/* the output from an OR */
					osm_join_gate_nodes(new_or_cells[current_spot-width_max], 0, new_or_cells[i], 0);
				}
		
				current_spot ++;
		
				/* start the net */
				/* do the second input to the and gate */
				if ((current_spot < width_max)&&(current_spot != width_max-1))
				{
					/* IF PI */
					/* the output from the comparator */
					osm_join_gate_nodes(new_and_cells_gt[current_spot], 0, new_or_cells[i], 1);
				}	
				else if (current_spot == width_max-1)
				{
					/* ELSE IF PI is the non AND_GT spot since this is the MSbit */
					/* the output from the comparator */
					osm_join_gate_nodes(new_compare_cells_GT[current_spot], 0, new_or_cells[i], 1);
				}
				else
				{
					/* ELSE this is an internal gate */
					/* the output from an OR */
					osm_join_gate_nodes(new_or_cells[current_spot-width_max], 0, new_or_cells[i], 1);
				}
		
				current_spot ++;
			}
			else
			{
				/* should be the last gate.  Need to hook up to the output of the compare. */
				fprintf(stderr, "Error in GATE generation\n");
				exit(-1);
			}
		}
	
		if (width_max != 1)
		{
			/* join that gate to the output */
			onu_copy_output_port(new_or_cells[current_spot-width_max], compare_node, 0, 0);
		}
		else
		{
			/* ELSE this is a single output means GT unit is directly connected to out */
			onu_copy_output_port(new_compare_cells_GT[0], compare_node, 0, 0);
		}
	
		ou_free(new_compare_cells_EQ);
		ou_free(new_compare_cells_GT);
		ou_free(new_and_cells_gt);
		ou_free(new_and_cells_cascade);
		ou_free(new_or_cells);
	}
	else
	{
		/* ELSE - this is the greater than with adder capabilities */
		/* a > b is the same as b - a is not negative */
		node_t *new_adder_node;
		new_adder_node = onacu_create_2inport_1outport_macro_node ("GT_ADDER", width_a, width_b, width_max+1, MN_SUB);

		/* hook up port a */
		for (i = 0; i < width_a; i++)
		{
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i]),
												compare_node, 
												i, 
												new_adder_node, 
												i);
	
		}
		/* hook up port b */
		for (i = width_a; i < width_b+width_b; i++)
		{
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(compare_node->input_pins[i]), 
												onu_get_input_pins_related_output_port(compare_node->input_pins[i]),
												compare_node, 
												i, 
												new_adder_node, 
												i);
		}
		/* hookup the output */
		onu_copy_output_port(new_adder_node, compare_node, width_max, 0);

		/* do a soft mapping of this node just in case the adders are soft mapped. */
		osm_soft_map_a_macro_node(new_adder_node, traverse_number);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_shift_left_or_right )
 *	Creates the hardware for a shift left or right operation by a constant size.
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_shift_left_or_right(node_t *shift_node, short traverse_number)
{
	/* these variables are used in an attempt so that I don't need if cases.  Probably a bad idea, but fun */
	int width = shift_node->n_t.hetero_node.width;
	int i;
	int shift_size = shift_node->n_t.hetero_node.width_c_also_shift_size;

	assert(width == shift_node->n_t.hetero_node.width_a);
	assert(shift_size > 0);

	if (shift_node->n_t.hetero_node.hetero_node_type == MN_SHIFT_LEFT) 
	{
		/* IF shift left */

		/* connect inputs to outputs */
	 	for(i = 0; i < width - shift_size; i++)
		{
			// connect higher output pin to lower input pin
			osm_join_input_directly_to_output(shift_node, i + shift_size, i);
		}
	
		/* connect ZERO to outputs that don't have inputs connected */
	 	for(i = 0; i < shift_size; i++)
		{
			// connect 0 to lower outputs
			onu_copy_output_port(gnd_node, shift_node, 0, i);
		}
	
   		 for(i = width - shift_size; i < width; i++)
		{
			/* remove the input since it is no longer needed after the shift */
			onu_remove_output_pointer_to_node(
					onu_get_input_pins_node(shift_node->input_pins[i]),
					onu_get_input_pins_related_output_port(shift_node->input_pins[i]),
					onu_get_input_pins_related_output_port_array_index(shift_node->input_pins[i]));
		}
	}
	else
	{
		/* ELSE shift right */

		/* connect inputs to outputs */
	 	for(i = width - 1; i >= shift_size; i--)
		{
			// connect higher input pin to lower output pin
			osm_join_input_directly_to_output(shift_node, i - shift_size, i);
		}
	
		/* connect ZERO to outputs that don't have inputs connected */
	 	for(i = width - 1; i >= width - shift_size; i--)
		{
			// connect 0 to lower outputs
			onu_copy_output_port(gnd_node, shift_node, 0, i);
		}
	
   		 for(i = 0; i < shift_size; i++)
		{
			/* remove the input since it is no longer needed after the shift */
			onu_remove_output_pointer_to_node(
					onu_get_input_pins_node(shift_node->input_pins[i]),
					onu_get_input_pins_related_output_port(shift_node->input_pins[i]),
					onu_get_input_pins_related_output_port_array_index(shift_node->input_pins[i]));
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_2_mux )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_2_mux(node_t *mux_node, short traverse_number)
{
	int width = mux_node->num_output_pins;
	int j;
	int port_B_offset = mux_node->n_t.hetero_node.width_a;
	int offset = mux_node->n_t.hetero_node.width_a + mux_node->n_t.hetero_node.width_b;
	int mux_index;
	node_t **new_mux_cells;

	assert(width == mux_node->n_t.hetero_node.width_a);
	assert(width == mux_node->n_t.hetero_node.width_b);

	new_mux_cells = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	mux_index = find_library_cell("MUX");
   	if(mux_index < 0)
	{
		assert(FALSE);
	}

	for (j = 0; j < width; j++)
	{
		/* instantiate the cells */
		new_mux_cells[j] = osm_create_a_gate("MUX", mux_index, 3, 1, traverse_number, mux_node->unique_name);
	}

	/* connect inputs.  In the case that a signal is smaller than the other then zero pad */
    for(j = 0; j < width; j++)
	{
		/* Joining the inputs to the input 1 of that gate */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(mux_node->input_pins[j]), 
												onu_get_input_pins_related_output_port(mux_node->input_pins[j]),
												mux_node, 
												j, 
												new_mux_cells[j], 
												0);

		/* Joining the inputs to the input 2 of that gate */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(mux_node->input_pins[j+port_B_offset]), 
												onu_get_input_pins_related_output_port(mux_node->input_pins[j+port_B_offset]),
												mux_node, 
												j+port_B_offset, 
												new_mux_cells[j], 
												1);

		/* Joining the inputs to the select of that gate */
		if (j == 0)
		{
			/* The firs time we can make this external input point point to the old spot */
			osm_join_gate_nodes_with_external_inputs( onu_get_input_pins_node(mux_node->input_pins[offset]), 
													onu_get_input_pins_related_output_port(mux_node->input_pins[offset]),
													mux_node, 
													offset, 
													new_mux_cells[j], 
													2);
		}
		else
		{
			/* ELSE - we need to make a new entry for this signal */
			osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated( onu_get_input_pins_node(mux_node->input_pins[offset]), 
													onu_get_input_pins_related_output_port(mux_node->input_pins[offset]),
													mux_node, 
													offset, 
													new_mux_cells[j], 
													2);
		}

		/* joining each of the outputs to the not outputs */
		onu_copy_output_port(new_mux_cells[j], mux_node, 0, j);
	}

	ou_free(new_mux_cells);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_register )
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_register(node_t *register_node, short traverse_number, short register_type)
{
	int width = register_node->num_output_pins;
	int j;
	int reg_index;
	int reg_index_reset;
	node_t **register_nodes;
	int start_port_index;
	short first_reset = TRUE;

	register_nodes = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	if (register_type == MN_REGISTER)
	{
		start_port_index = 1;
	}
	else if (register_type == MN_REGISTER_RESET)
	{
		start_port_index = 2;
	}

	reg_index = find_library_cell("DFF");
   	if(reg_index < 0)
	{
		assert(FALSE);
	}
	reg_index_reset = find_library_cell("DFFR");
   	if(reg_index_reset < 0)
	{
		assert(FALSE);
	}

	for (j = 0; j < width; j++)
	{
		/* instantiate the cells */
		if ((register_type == MN_REGISTER_RESET) && (register_node->n_t.hetero_node.register_ports_or_mux_choice[j] == TRUE))
		{
			register_nodes[j] = osm_create_a_gate("FFR", reg_index_reset, 3, 1, traverse_number, register_node->unique_name);
		}
		else
		{
			register_nodes[j] = osm_create_a_gate("FF", reg_index, 2, 1, traverse_number, register_node->unique_name);
		}
	}

	/* connect inputs.  In the case that a signal is smaller than the other then zero pad */
    for(j = 0; j < width; j++)
	{
		/* Joining the inputs to the input 1 of that gate */
		osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[j+start_port_index]), 
												onu_get_input_pins_related_output_port(register_node->input_pins[j+start_port_index]),
												register_node, 
												j+start_port_index, 
												register_nodes[j], 
												0);

		/* Joining the clock to the input 2 of that gate */
		if (j == 0)
		{
			/* IF - the first time can directly hook clock */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[0]), 
													onu_get_input_pins_related_output_port(register_node->input_pins[0]),
													register_node, 
													0, 
													register_nodes[j], 
													1);
		}
		else
		{
			/* ELSE - these are clock extensions, and we need to hook up by making new connection */
			osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
													onu_get_input_pins_node(register_node->input_pins[0]), 
													onu_get_input_pins_related_output_port(register_node->input_pins[0]),
													register_node, 
													0, 
													register_nodes[j], 
													1);
		}

		if ((register_type == MN_REGISTER_RESET) && (register_node->n_t.hetero_node.register_ports_or_mux_choice[j] == TRUE))
		{
			/* join the reset to those that need it */
			if (first_reset == TRUE)
			{
				/* IF - the first time can directly hook reset */
				first_reset = FALSE;
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(register_node->input_pins[1]), 
														onu_get_input_pins_related_output_port(register_node->input_pins[1]),
														register_node, 
														1, 
														register_nodes[j], 
														2);
			}
			else
			{
				/* ELSE - these are reset extensions, and we need to hook up by making new connection */
				osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
														onu_get_input_pins_node(register_node->input_pins[1]), 
														onu_get_input_pins_related_output_port(register_node->input_pins[1]),
														register_node, 
														1, 
														register_nodes[j], 
														2);
			}
		}

		/* joining each of the outputs */
		onu_copy_output_port(register_nodes[j], register_node, 0, j);
	}

	if ((register_type == MN_REGISTER_RESET) && (first_reset == TRUE) && (onu_get_input_pins_node(register_node->input_pins[1]) != NULL))
	{
		/* IF - the reset signal was never used then remove this connection */
		onu_remove_output_pointer_to_node(
				onu_get_input_pins_node(register_node->input_pins[1]),
				onu_get_input_pins_related_output_port(register_node->input_pins[1]),
				onu_get_input_pins_related_output_port_array_index(register_node->input_pins[1]));
	}
			

	ou_free(register_nodes);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_if )
 * input port order is -
 * 					condition
 * 					conditions [CASE ONLY]
 * 					inputs_1
 * 					inputs_2
 * 					inputs_* [CASE ONLY]
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_if(node_t *if_node, short traverse_number, short id)
{
	int width = if_node->num_output_pins;
	int i, j;
	int num_cases = if_node->n_t.hetero_node.num_cases;
	int input_port_index = if_node->n_t.hetero_node.muxed_input_start_index;
	int *pre_analyse_NULL_count;
	short *condition_connected;
	int and_gate_count;

	node_t ***and_nodes;
	node_t **or_nodes;

	/* BUILD the AND gates and wide OR gate */
	and_nodes = (node_t***)ou_malloc(sizeof(node_t**)*width, HETS_SOFT_MAPPING);
	or_nodes = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_SOFT_MAPPING);

	condition_connected = (short*)ou_malloc(sizeof(short)*num_cases, HETS_SOFT_MAPPING);
	for (i = 0; i < num_cases; i++)
	{
		condition_connected[i] = FALSE;
	}

	if (num_cases > 1)
	{
		/* allocate and initialize the analysis flags */
		pre_analyse_NULL_count = (int*)ou_malloc(sizeof(int)*width, HETS_SOFT_MAPPING);
		for (i = 0; i < width; i++)
		{
			pre_analyse_NULL_count[i] = 0;
		}

		/* preanalyse for NULL nodes.  Only have to do for IF nodes */
	//	if (if_node->n_t.hetero_node.hetero_node_type == MN_IF)
	//	{
			for (i = 0; i < width; i++)
			{
				for (j = 0; j < num_cases; j++)
				{
					if (if_node->input_pins[input_port_index]->input_node == null_node)
					{
						/* IF - we find a NULL node, then record this in the preanalyse flags */
						pre_analyse_NULL_count[i] ++;
					}
					input_port_index ++;
				}

				/* record the statistics for the size of this multiplexer since we know at this point the
				number of null ports.  The multiplexer size is num_cases - null_ports */
				ocs_record_multiplexer(num_cases-pre_analyse_NULL_count[i]);
			}
	//}

		/* reset input_port_index_count */
		input_port_index = if_node->n_t.hetero_node.muxed_input_start_index;

		for (i = 0; i < width; i++)
		{
			assert(num_cases-pre_analyse_NULL_count[i] >= 0);

			if (num_cases - pre_analyse_NULL_count[i] > 1)
			{
				if ((if_node->n_t.hetero_node.register_ports_or_mux_choice != NULL) && 
					(if_node->n_t.hetero_node.register_ports_or_mux_choice[i] == MUX_DSP_MAP) &&
					(optimization_on_off[OPT_MAP_MUX_TO_MULTIPLIER] == TRUE))
				{
					/* IF - this particular part of the if node is to be mapped to a DSP block then do so */
					/* The hookup to the multiplier is as follows:
					 * 	Imagine we have a 4by4 hard multiplier. 
					 * 				a3 a2 a1 a0
					 * 				b3 b2 b1 b0
					 * 				-----------
					 * 	o7 o6 o5 o4 o3 o2 o1 o0
					 *
					 * 	No imagine we have say a 3:1 multiplexer that is decoded...
					 * 				inputs = c2 c1 c0 controlled respectively by d2 d1 d0
					 * 				output = out
					 *
					 * 	Then if we attach c0->a0, c1->a1, c2->a2 and d0->b2, d1->b1, d2->b0 and o2->out then we have a multiplexer
					 * 	based on shifts by powers of 2 */
					node_t *multiplier_node;
					int multiplier_port_index = 0;

					assert(num_cases - pre_analyse_NULL_count[i] <= 18);

					/* create the multiplier node */
					multiplier_node = onacu_create_2inport_1outport_macro_node ("MULTIPLEXER_MULT", 
																				num_cases - pre_analyse_NULL_count[i], 
																				num_cases - pre_analyse_NULL_count[i], 
																				(num_cases - pre_analyse_NULL_count[i])*2, MN_MULT);

					/* now hookup the original signals into the multiplier */
					for (j = 0; j < num_cases; j++)
					{
						if (if_node->input_pins[input_port_index]->input_node != null_node)
						{
							/* If this is not one of the NULL node connections, then hook the multiplier up */
			
							/* join the first input with the signal from the inputs to the a port of the multiplier */
							osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(if_node->input_pins[input_port_index]),
																	onu_get_input_pins_related_output_port(if_node->input_pins[input_port_index]),
																	if_node, 
																	input_port_index,
																	multiplier_node,
																	multiplier_port_index);
			
							/* join the condition connections to the and gates.  i.e d? in the example above */
							if (condition_connected[j] == FALSE)
							{
								condition_connected[j] = TRUE;
	
								/* Join the base_cond inputs into this structure */	
								osm_join_gate_nodes_with_external_inputs(
																		onu_get_input_pins_node(if_node->input_pins[j]), 
																		onu_get_input_pins_related_output_port(if_node->input_pins[j]),
																		if_node, 
																		j,
																		multiplier_node,
																		2*(num_cases - pre_analyse_NULL_count[i]) -1 - multiplier_port_index);
							}
							else
							{
								assert(condition_connected[j] == TRUE);
	
								/* ELSE - these are multiple condition coneections, and we need to hook up by making new connection */
								osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
																		onu_get_input_pins_node(if_node->input_pins[j]), 
																		onu_get_input_pins_related_output_port(if_node->input_pins[j]),
																		if_node, 
																		j,
																		multiplier_node,
																		2*(num_cases - pre_analyse_NULL_count[i]) -1 - multiplier_port_index);
							}
							multiplier_port_index++;
						}
	
						/* now that this input port is connected go to the next */
						input_port_index++;
					}

					/* finally join the output of the multipliexer to the output of the multiplexer */
					onu_copy_output_port(multiplier_node, if_node, (num_cases - pre_analyse_NULL_count[i])-1, i);
				}
				else
				{
					/* ELSE - create a pure soft mapping with AND gates and OR gates */

					/* allocate the second dimension of the AND gates which represents each internal case */
					and_nodes[i] = (node_t**)ou_malloc(sizeof(node_t*)*(num_cases-pre_analyse_NULL_count[i]), HETS_SOFT_MAPPING);
		
					/* create a large OR gate ... need to convert later in this function */
					or_nodes[i] = onacu_create_1inport_1outport_macro_node ("IF_OR", 
																				(num_cases-pre_analyse_NULL_count[i]),
																				1,
																				MN_RED_OR);
	
					and_gate_count = 0;
	
					for (j = 0; j < num_cases; j++)
					{
						if (if_node->input_pins[input_port_index]->input_node != null_node)
						{
							/* If this is not one of the NULL node connections, then hook the AND gate up */
	
							/* create a 2AND for each pin */
							and_nodes[i][and_gate_count] = osm_create_a_gate("IF_AND", and_cell_lib_index, 2, 1, traverse_number, if_node->unique_name);
			
							/* join the first input with the signal from the inputs */
							osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(if_node->input_pins[input_port_index]),
																	onu_get_input_pins_related_output_port(if_node->input_pins[input_port_index]),
																	if_node, 
																	input_port_index,
																	and_nodes[i][and_gate_count], 
																	0);
			
							/* join the condition connections to the and gates */
							if (condition_connected[j] == FALSE)
							{
								condition_connected[j] = TRUE;
	
								/* Join the base_cond inputs into this structure */	
								osm_join_gate_nodes_with_external_inputs(
																		onu_get_input_pins_node(if_node->input_pins[j]), 
																		onu_get_input_pins_related_output_port(if_node->input_pins[j]),
																		if_node, 
																		j,
																		and_nodes[i][and_gate_count], 
																		1);
							}
							else
							{
								assert(condition_connected[j] == TRUE);
	
								/* ELSE - these are clock extensions, and we need to hook up by making new connection */
								osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
																		onu_get_input_pins_node(if_node->input_pins[j]), 
																		onu_get_input_pins_related_output_port(if_node->input_pins[j]),
																		if_node, 
																		j,
																		and_nodes[i][and_gate_count], 
																		1);
							}
	
							/* join the output of the AND to the OR */
							osm_join_gate_nodes(and_nodes[i][and_gate_count], 0, or_nodes[i], and_gate_count);
	
							and_gate_count++;
						}
	
						/* now that this input port is connected go to the next */
						input_port_index++;
					}
					ou_free(and_nodes[i]);
			
					assert (and_gate_count == num_cases - pre_analyse_NULL_count[i]);
	
					/* joining the OR output to the output of the if_node */
					onu_copy_output_port(or_nodes[i], if_node, 0, i);
			
					/* now convert the RED_OR since all signals are joined */
					osm_soft_map_a_macro_node(or_nodes[i], traverse_number);
					onu_free_node(or_nodes[i]);
				}
			}
			else if (num_cases-pre_analyse_NULL_count[i] == 1)
			{
				/* ELSE - single signal through the if, so direct connection */
				short found_at_least_one = FALSE;

				for (j = 0; j < num_cases; j++)
				{
					if (if_node->input_pins[input_port_index]->input_node != null_node)
					{
						/* IF - find direct_ connection then hookup */
						osm_join_input_directly_to_output(if_node, i, input_port_index);
						assert(found_at_least_one == FALSE);
						found_at_least_one = TRUE;
					}

					/* now that this input port is connected go to the next */
					input_port_index++;
				}

				assert(found_at_least_one == TRUE);
			}
		}

		/* check if any conditions not used because all NULL inputs */
		for (j = 0; j < num_cases; j++)
		{
			if (condition_connected[j] == FALSE)
			{
				/* IF - this condition is connected to nothing, then scrap it */
				onu_remove_output_pointer_to_node(
						onu_get_input_pins_node(if_node->input_pins[j]),
						onu_get_input_pins_related_output_port(if_node->input_pins[j]),
						onu_get_input_pins_related_output_port_array_index(if_node->input_pins[j]));
			}
		}

		ou_free(pre_analyse_NULL_count);
	}
	else
	{
		assert(num_cases == 1);
		assert(if_node->num_input_pins == if_node->num_output_pins + 1);

		/* remove the condition signal since this if has only one case */
		onu_remove_output_pointer_to_node(
				onu_get_input_pins_node(if_node->input_pins[0]),
				onu_get_input_pins_related_output_port(if_node->input_pins[0]),
				onu_get_input_pins_related_output_port_array_index(if_node->input_pins[0]));

		/* map all the input ports directly through skipping the first which holds the condition info */
		for (i = 0; i < width; i++)
		{
			osm_join_input_directly_to_output(if_node, i, i+1);
		}
	}
	
	ou_free(and_nodes);
	ou_free(or_nodes);
	ou_free(condition_connected);
}

/**********************************************************************************************
 * HELPER FUNCTIONS
 * *******************************************************************************************/

/*---------------------------------------------------------------------------------------------
 * (function: osm_create_a_blanced_given_a_logic_index)
 *-------------------------------------------------------------------------------------------*/
node_t *osm_create_a_2_input_logic_tree_to_single_out_with_inputs(int gate_index,
										int width, 
										node_t **input_nodes,
										int *input_nodes_pins, 
										short traverse_number)
{
	node_t **new_logic_cells;
	int i;
	int current_spot;
	node_t *return_node;

	new_logic_cells = (node_t**)ou_malloc(sizeof(node_t*)*width-1, HETS_SOFT_MAPPING);

	/* create the gates needed for a single output */
    for(i = 0; i < width - 1; i++)
	{
		new_logic_cells[i] = osm_create_a_gate("TREE_GATE", gate_index, 2, 1, traverse_number, input_nodes[0]->unique_name);
	}

	current_spot = 0;
	
	/* do the LOGIC gate tree to create one output */
	for (i = 0; i < width - 1; i++)
	{
		/* stop condition - 2 * the number of signals coming in */
		if (current_spot != (2*width-1))
		{
			/* do the first input to the and gate and check if Primary Input from the comparators */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes(input_nodes[current_spot], input_nodes_pins[current_spot] , new_logic_cells[i], 0);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 0);
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				osm_join_gate_nodes(input_nodes[current_spot], input_nodes_pins[current_spot] , new_logic_cells[i], 1);
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				osm_join_gate_nodes(new_logic_cells[current_spot-width], 0, new_logic_cells[i], 1);
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	return_node = new_logic_cells[width-2];

	ou_free(new_logic_cells); 

	return (return_node);
}

/*---------------------------------------------------------------------------------------------
 * (function: osm_instantiate_simple_soft_multiplier )
 * Sample 4x4 multiplier to help understand logic.
 *
 * 					a3  a2  a1  a0 
 *					b3  b2  b1  b0
 *					---------------
 *					c03 c02 c01 c00
 *			+	c13 c12 c11 c10
 *			-------------------	
 *			r14	r13	r12	r11	r10
 *		+	c23 c22 c21 c20
 *		-------------------
 *		r24	r23	r22	r21	r20
 *	+	c33 c32 c31 c30
 *	-------------------
 *	o7	o6	o5	o4	o3	o2	o1	o0
 *
 *	In the first case will be c01
 *-------------------------------------------------------------------------------------------*/
void osm_instantiate_simple_soft_multiplier(node_t *multiplier_node, short traverse_number)
{
	int width_a = multiplier_node->n_t.hetero_node.width_a;
	int width_b = multiplier_node->n_t.hetero_node.width_b;
	int width = multiplier_node->n_t.hetero_node.width;
	int multiplier_width;
	int multiplicand_width;
	node_t **adders_for_partial_products;
	node_t ***partial_products;
	int multiplicand_offset_index;
	int multiplier_offset_index;
	int current_index;
	int i, j;

	/* need for an carry-ripple-adder for each of the bits of port B. */
	/* good question of which is better to put on the bottom of multiplier.  Larger means more smaller adds, or small is 
	 * less large adds */
	multiplicand_width = width_b;
	multiplier_width = width_a;
	/* offset is related to which multport is chosen as the multiplicand */
	multiplicand_offset_index = width_a;
	multiplier_offset_index = 0;
	adders_for_partial_products = (node_t**)ou_malloc(sizeof(node_t*)*multiplicand_width-1, HETS_SOFT_MAPPING);

	/* need to generate partial products for each bit in width B. */
	partial_products = (node_t***)ou_malloc(sizeof(node_t**)*multiplicand_width, HETS_SOFT_MAPPING);

	/* generate the AND partial products */
	for (i = 0; i < multiplicand_width; i++)
	{
		/* create the memory for each AND gate needed for the levels of partial products */
		partial_products[i] = (node_t**)ou_malloc(sizeof(node_t*)*multiplier_width, HETS_SOFT_MAPPING);
		
		/* create a carry in adder for each level of multiplication */
#if 0
		adders_for_partial_products[i] = onu_allocate_skeleton_node("MULT_PARTIAL_ADD", width_b, width_b*2+1, 3, 1);
		adders_for_partial_products[i]->node_type = MACRO_NODE;
		adders_for_partial_products[i]->n_t.hetero_node.hetero_node_type = MN_ADD_CARRY_NODE;
		adders_for_partial_products[i]->n_t.hetero_node.width = width_b;
#endif
		if (i < multiplicand_width - 1)
		{
			adders_for_partial_products[i] = onacu_create_2inport_1outport_macro_node ("MULT_PARTIAL_ADD", 
																						multiplier_width+1, 
																						multiplier_width+1, 
																						multiplier_width+1, 
																						MN_ADD);
		}

		for (j = 0; j < multiplier_width; j++)
		{
			/* create each one of the partial products */
			partial_products[i][j] = osm_create_a_gate("PARTIAL_PROD", and_cell_lib_index, 2, 1, traverse_number, multiplier_node->unique_name);
		}
	}

	/* generate the coneections to the AND gates */
	for (i = 0; i < multiplicand_width; i++)
	{
		for (j = 0; j < multiplier_width; j++)
		{
			/* hookup the input of B to each AND gate */
			if (j == 0)
			{
				/* IF - this is the first time we are mapping multiplicand port then can remap */ 
				osm_join_gate_nodes_with_external_inputs(
														onu_get_input_pins_node(multiplier_node->input_pins[i+multiplicand_offset_index]), 
														onu_get_input_pins_related_output_port(multiplier_node->input_pins[i+multiplicand_offset_index]),
														multiplier_node, 
														i+multiplicand_offset_index, 
														partial_products[i][j], 
														0);
			}
			else
			{
				/* ELSE - this needs to be a new ouput of the multiplicand port */
				osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
														onu_get_input_pins_node(multiplier_node->input_pins[i+multiplicand_offset_index]), 
														onu_get_input_pins_related_output_port(multiplier_node->input_pins[i+multiplicand_offset_index]),
														multiplier_node, 
														i+multiplicand_offset_index, 
														partial_products[i][j], 
														0);
			}

			/* hookup the input of the multiplier to each AND gate */
			if (i == 0)
			{
				/* IF - this is the first time we are mapping multiplier port then can remap */ 
				osm_join_gate_nodes_with_external_inputs(
														onu_get_input_pins_node(multiplier_node->input_pins[j+multiplier_offset_index]), 
														onu_get_input_pins_related_output_port(multiplier_node->input_pins[j+multiplier_offset_index]),
														multiplier_node, 
														j+multiplier_offset_index, 
														partial_products[i][j], 
														1);
			}
			else
			{
				/* ELSE - this needs to be a new ouput of the multiplier port */
				osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
														onu_get_input_pins_node(multiplier_node->input_pins[j+multiplier_offset_index]), 
														onu_get_input_pins_related_output_port(multiplier_node->input_pins[j+multiplier_offset_index]),
														multiplier_node, 
														j+multiplier_offset_index, 
														partial_products[i][j], 
														1);
			}
		}
	}

	/* hookup each of the adders */
	for (i = 0; i < multiplicand_width-1; i++)
	{
		for (j = 0; j < multiplier_width+1; j++)
		{
			/* join to port 1 of the add one of the partial products.  */
			if (i == 0)
			{
				/* IF - this is the first addition row, then adding two sets of partial products and first set is from the c0* */
				if (j < multiplier_width - 1)
				{
					/* IF - we just take an element of the first list c[0][j+1]. */
					osm_join_gate_nodes(partial_products[i][j+1], 0, adders_for_partial_products[i], j);
				}
				else
				{
					/* ELSE - this is the last input to the first adder, then we pass in 0 since no carry yet */
					osm_join_gate_nodes(gnd_node, 0, adders_for_partial_products[i], j);
				}
			}
			else if (j < multiplier_width)
			{
				/* ELSE - this is the standard situation when we need to hookup this adder with a previous adder, r[i-1][j+1] */
				osm_join_gate_nodes(adders_for_partial_products[i-1], j+1, adders_for_partial_products[i], j);
			}
			else
			{
				osm_join_gate_nodes(gnd_node, 0, adders_for_partial_products[i], j);
			}
			
			if (j < multiplier_width)
			{
				/* IF - this is not most significant bit then just add current partial product */
				osm_join_gate_nodes(partial_products[i+1][j], 0, adders_for_partial_products[i], j+multiplier_width+1);
			}
			else
			{
				osm_join_gate_nodes(gnd_node, 0, adders_for_partial_products[i], j+multiplier_width+1);
			}
		}
	}

	current_index = 0;
	/* hookup the outputs */
	for (i = 0; i < width; i++)
	{
		if (i == 0)
		{
			/* IF - this is the LSbit, then we use a pass through from the partial product */
			onu_copy_output_port(partial_products[0][0], multiplier_node, 0, i);
		}
		else if (i < multiplicand_width - 1)
		{
			/* ELSE IF - these are the middle values that come from the LSbit of partial adders */
			onu_copy_output_port(adders_for_partial_products[i-1], multiplier_node, 0, i);
		}
		else 
		{
			/* ELSE - the final outputs are straight from the outputs of the last adder */
			onu_copy_output_port(adders_for_partial_products[multiplicand_width - 2], multiplier_node, current_index, i);
			current_index++;
		}
	}

	/* soft map the adders if they need to be mapped */
	for (i = 0; i < multiplicand_width - 1; i++)
	{
		osm_soft_map_a_macro_node(adders_for_partial_products[i], traverse_number);
	}

	if (adders_for_partial_products != NULL)
	{
		ou_free(adders_for_partial_products);
	}
	/* generate the AND partial products */
	for (i = 0; i < multiplicand_width; i++)
	{
		/* create the memory for each AND gate needed for the levels of partial products */
		if (partial_products[i] != NULL)
		{
			ou_free(partial_products[i]);
		}
	}
	if (partial_products != NULL)
	{
		ou_free(partial_products);
	}
}
