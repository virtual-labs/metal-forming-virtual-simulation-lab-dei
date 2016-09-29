
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

/* This file provides the code that does matching of complex functions.  This is the subgraph isomorphism problem done on my flattened netlist
 * for complex arithmetic functions.  This functionality is a little extrreme for the small gains it gains, but this is an interesting problem to
 * code up.  On the other hand, I can barely look at this code anymore and uderstand what is going on.  The sad part is I wrote it.
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
#include "odin_TFE_identification.h"

short *temp_list_ff;
tfe_identification_t *identified_units = NULL;
int num_identified_units = 0;

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_check_for_mathc)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_check_for_match(tfe_t *current_tfe)
{
	int i;
	static int match_value = 0;

	switch (current_tfe->macro_id_seed_type) 
	{
		case MN_MULT: 
		{
			/* IF - this is a multiplier seed, then proceed through the multiplier list searching against this tfe type */
			for (i = 0; i < num_mult_list; i++)
			{
				oTFEi_id_given_tfe_and_start_node(current_tfe, mult_list[i], match_value);
				match_value ++;
			}
			break;
		}
		case MACRO_NONE:
		{
			fprintf(stderr, "Library TFE with unsupported SEED type\n");
			break;
		}
		default:
		{
			fprintf(stderr, "Library TFE with unsupported SEED type\n");
			assert(FALSE);
			break;
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: *oTFEi_create_identification_structure)
 *-------------------------------------------------------------------------------------------*/
tfe_identification_t *oTFEi_create_identification_structure()
{
	tfe_identification_t *id_struct = (tfe_identification_t*)ou_malloc_struct(sizeof(tfe_identification_t), HETS_TFE_IDENTIFICATION);

	id_struct->macro_type_for_match = NULL;
	id_struct->match_ids = NULL;
	id_struct->num_possible_bindings = 0;
	id_struct->potential_tfe_implementation = NULL;

	return id_struct;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_mark_identified_tfe_primitive)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_mark_identified_tfe_primitive(tfe_t *current_tfe, node_t *start_node, int match_id)
{
	tfe_identification_t *node_bindings;	

	if (start_node->possible_node_bindings == NULL)
	{
		/* IF - this is the first time this node can possibly be bound creat the binding */
		node_bindings = oTFEi_create_identification_structure();
		start_node->possible_node_bindings = node_bindings;
	}
	else
	{
		/* ELSE - this node has been bound before */
		node_bindings = start_node->possible_node_bindings;
	}

	/* record the type of macro binding */
	node_bindings->macro_type_for_match = (short*)ou_realloc(node_bindings->macro_type_for_match, sizeof(short)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->macro_type_for_match[node_bindings->num_possible_bindings] = current_tfe->macro_type;
	node_bindings->match_ids = (short*)ou_realloc(node_bindings->match_ids, sizeof(short)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->match_ids[node_bindings->num_possible_bindings] = match_id;
	node_bindings->potential_tfe_implementation = (match_info_t**)ou_realloc(node_bindings->potential_tfe_implementation, sizeof(match_info_t*)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->potential_tfe_implementation[node_bindings->num_possible_bindings] = NULL;

	/* increase the number of macro_bindings */
	node_bindings->num_possible_bindings ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_clean_port_match_flags)
 * 	Goes through all the input ports and sets them to unmatched
 *-------------------------------------------------------------------------------------------*/
void oTFEi_rec_clean_input_port_match_flags(node_t* tfe_node, node_t *object_node)
{
	int i;

	for (i = 0; i < tfe_node->num_input_ports; i++)
	{
		tfe_node->input_ports[i]->match = INIT;
	}
	for (i = 0; i < object_node->num_input_ports; i++)
	{
		object_node->input_ports[i]->match = INIT;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_clean_port_match_flags)
 * 	Goes through all the output ports and sets them to unmatched
 *-------------------------------------------------------------------------------------------*/
void oTFEi_rec_clean_output_port_match_flags(node_t* tfe_node, node_t *object_node)
{
	int i;

	for (i = 0; i < tfe_node->num_output_ports; i++)
	{
		tfe_node->output_ports[i]->match = INIT;
	}
	for (i = 0; i < object_node->num_output_ports; i++)
	{
		object_node->output_ports[i]->match = INIT;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_is_input_port_going_to_only_one_node)
 * 	Checks if all elements in the port point to the same node (BUS)
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_is_input_port_going_to_only_one_node(node_t* node, int port_idx, int pin_idx)
{
	int i;
	node_t *pointing_to = NULL;

	for (i = pin_idx; i < pin_idx + node->input_ports[port_idx]->width; i++)
	{
		if (pointing_to == NULL)
		{
			/* IF - there is no node we are pointing to then this is the start and determine the node */
			pointing_to = node->input_pins[i]->input_node;
		}
		else if (pointing_to != node->input_pins[i]->input_node)
		{
			/* ELSE IF - we are not all pointing to the same node, so return FAIL */
			return FALSE;
		}
	}
	return TRUE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_is_input_port_to_ff_going_to_only_one_node)
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_is_input_port_to_ff_going_to_only_one_node(node_t* node, int port_idx, int pin_idx)
{
	int i;
	node_t *pointing_to = NULL;

	for (i = pin_idx; i < pin_idx + node->input_ports[port_idx]->width; i++)
	{
		if (node->input_pins[i]->input_node->node_type != LIBRARY_NODE_FF)
		{
			/* IF - any of the pins don't go to a FF node first then return fail */
			return FALSE;
		}

		if (pointing_to == NULL)
		{
			/* IF - there is no node we are pointing to then this is the start and determine the node */
			pointing_to = node->input_pins[i]->input_node->input_pins[0]->input_node;
		}
		else if (pointing_to != node->input_pins[i]->input_node->input_pins[0]->input_node)
		{
			/* ELSE IF - we are not all pointing to the same node, so return FAIL */
			return FALSE;
		}
	}
	return TRUE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_determine_tfe_ff_type)
 * 	Note: could use hash, be these lists should be extremely small (1 or 0 entries)
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_determine_tfe_ff_type(node_t* tfe_node, tfe_t *current_tfe)
{
	int i;

	if ((current_tfe->tfe_type != GRAPH) ||
		(current_tfe->t_t.graph.flip_flops == NULL))
	{
		/* IF - this node is not graph type or deosn't have flip flops then return not found */
		return NOT_OK;
	}

	for (i = 0; i < current_tfe->t_t.graph.flip_flops->num_input_mn_ffs; i++)
	{
		if (tfe_node == current_tfe->t_t.graph.flip_flops->input_mn_ffs[i])
		{
			/* IF - we find a match */
			return INPUT_FF;
		}
	}
	for (i = 0; i < current_tfe->t_t.graph.flip_flops->num_output_mn_ffs; i++)
	{
		if (tfe_node == current_tfe->t_t.graph.flip_flops->output_mn_ffs[i])
		{
			/* IF - we find a match */
			return OUTPUT_FF;
		}
	}
	for (i = 0; i < current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs; i++)
	{
		if (tfe_node == current_tfe->t_t.graph.flip_flops->inout_mn_ffs[i])
		{
			/* IF - we find a match */
			return INOUT_FF;
		}
	}

	return NOT_OK;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_find_matching_output_port)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_rec_copy_all_ff_in_one_output_node(node_t* ff_node, node_t *object_node, int port_idx, int pin_idx, int level_idx)
{
	node_list_t *ff_list;
	int j;

	/* reocrd the rest of the ff_nodes in the first node */
	assert(ff_node->anything_1 == NULL);
	oTFEi_init_empty_list(&ff_list);

	for (j = pin_idx; j < pin_idx+object_node->output_ports[port_idx]->width; j++)
	{
		oTFEi_add_node_to_node_list(ff_list, object_node->output_pins[j]->output_nodes[level_idx]);
	}
	ff_node->anything_1 = (void*)ff_list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_find_matching_input_port)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_rec_copy_all_ff_in_one_input_node(node_t* ff_node, node_t *object_node, int port_idx, int pin_idx)
{
	node_list_t *ff_list;
	int j;
				
	/* reocrd the rest of the ff_nodes in the first node */
	assert(ff_node->anything_1 == NULL);
	oTFEi_init_empty_list(&ff_list);

	for (j = pin_idx; j < pin_idx + object_node->input_ports[port_idx]->width; j++)
	{
		oTFEi_add_node_to_node_list(ff_list, object_node->input_pins[j]->input_node);
	}
	ff_node->anything_1 = (void*)ff_list;
}


/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_find_matching_input_port)
 *-------------------------------------------------------------------------------------------*/
individual_match_info_t *oTFEi_rec_find_matching_input_node(node_t* tfe_node, 
															int port_idx, 
															int pin_idx, 
															node_t *object_node, 
															int iteration_flag, 
															int match_val, 
															tfe_t* current_tfe)
{
	int i, j;
	int last_ports_pin_idx;
	int start_pin_idx;
	short match_type = tfe_node->input_pins[pin_idx]->input_node->n_t.hetero_node.hetero_node_type;
	short match_width = tfe_node->input_ports[port_idx]->width;
	node_t* current_potential_match_node;

	individual_match_info_t *return_matched_up;

	/* initialize the return structure */
	return_matched_up = oTFEi_rec_initialize_match_info();

	last_ports_pin_idx = 0;
	
	for (i = 0; i < object_node->num_input_ports; i++)
	{
		start_pin_idx = last_ports_pin_idx;
		/* update the start idx for the next input port by skipping over the remaining pins of this port (width) */
		last_ports_pin_idx += object_node->input_ports[i]->width;

		if (object_node->input_pins[start_pin_idx]->input_node != NULL) 
		{
			/* IF the input node exists */

			current_potential_match_node = object_node->input_pins[start_pin_idx]->input_node;

			/* check if the node matches type, has a satisfactory width and hasn't already been matched */
			if ((object_node->input_ports[i]->match != iteration_flag) &&
				(current_potential_match_node->tfe_id_mark != match_val) &&
				(current_potential_match_node->node_type == MACRO_NODE) &&
				(match_type == current_potential_match_node->n_t.hetero_node.hetero_node_type) &&
				(match_width >= object_node->input_ports[i]->width) &&
				(oTFEi_rec_is_input_port_going_to_only_one_node(object_node, i, start_pin_idx) == TRUE))
			{
				/* IF - we find a match */
				/* check if all the pins of the object_node all go to the same matching node */
				object_node->input_ports[i]->match = iteration_flag;
				return_matched_up->return_node = current_potential_match_node;
				return return_matched_up;
			}
			else if ((object_node->input_ports[i]->match != iteration_flag) &&
				(current_potential_match_node->node_type == LIBRARY_NODE_FF) &&
				(match_type == MN_FF) &&
				(oTFEi_rec_is_input_port_to_ff_going_to_only_one_node(object_node, i, start_pin_idx) == TRUE))
			{
				/* ELSE IF - we find a match with ffs */
				short ff_type;

				/* determine if it is a only input or inout type ff */
				ff_type = oTFEi_rec_determine_tfe_ff_type(tfe_node->input_pins[pin_idx]->input_node, current_tfe);

				assert((ff_type != NOT_OK) || (ff_type != OUTPUT_FF));

				if (ff_type == INPUT_FF)
				{
					if (current_potential_match_node->tfe_id_mark == match_val) 
					{
						/* IF - we have alrady matched this node then skip */
						continue;
					}

					oTFEi_rec_copy_all_ff_in_one_input_node(current_potential_match_node, object_node, i, start_pin_idx);

					/* return the first node to be matched up against everything else */
					object_node->input_ports[i]->match = iteration_flag;
					return_matched_up->return_node = current_potential_match_node;
					return return_matched_up;
				}
				else 
				{
					/* ELSE IF - this is a ff in a loop */
					assert(ff_type == INOUT_FF);

					for (j = 0; j < current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs; j++)
					{
						if (tfe_node->input_pins[pin_idx]->input_node == current_tfe->t_t.graph.flip_flops->inout_mn_ffs[j])
						{
							/* IF - we find a match */
							if (temp_list_ff[j] == OUTPUT_FF)
							{
								/* IF - this node has already been matched in the output direction then mark fully matched */
								temp_list_ff[j] = INOUT_FF;
								return_matched_up->ff_match = INOUT_FF;
							}
							else
							{
								/* ELSE - we still haven't matched the loop in the other direction */
								temp_list_ff[j] = INPUT_FF;
							}
						}
					}

					/* mark that this is a special ff_match */
					oTFEi_rec_copy_all_ff_in_one_input_node(current_potential_match_node, object_node, i, start_pin_idx);

					object_node->input_ports[i]->match = iteration_flag;
					return_matched_up->return_node = current_potential_match_node;
					return return_matched_up;
				}
			}
		}
	}	

	return NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_initialize_match_info)
 *-------------------------------------------------------------------------------------------*/
individual_match_info_t *oTFEi_rec_initialize_match_info()
{
	individual_match_info_t *return_matched_up;

	return_matched_up = (individual_match_info_t*)ou_malloc_struct(sizeof(individual_match_info_t), HETS_TFE_IDENTIFICATION);
	return_matched_up->full_output_match = FALSE;
	return_matched_up->oas_outputs = FALSE;
	return_matched_up->ff_match = INIT;
	return_matched_up->num_fanout = 0;
	return_matched_up->tfe_pin_idx = INIT;
	return_matched_up->tfe_level_2_pin_idx = NULL;
	return_matched_up->object_pin_idx = INIT;
	return_matched_up->object_level_2_pin_idx = NULL;

	return return_matched_up;
}


/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_find_matching_output_port)
 * 	Finds a matching output port on the object_node.  This is a little tricky since a port
 * 	can have multi-fanout.  We consider this and return a structure which includes lists of
 * 	how the tfe and object fanouts match up.
 *-------------------------------------------------------------------------------------------*/
individual_match_info_t *oTFEi_rec_find_matching_output_port(node_t *tfe_node, int port_idx, int pin_idx, node_t* object_node, int iteration_mark, int match_val, tfe_t* current_tfe)
{
	int i, j, k;
	int last_ports_pin_idx;
	int start_pin_idx;
	short *check_list;
	short match_type;
	short match_width;
	node_t *current_potential_match_node;
	short found_match_for_current_tfe_fanout;
	short num_outputs = 0;

	node_t **ff_cleanup_list = NULL;
	int num_ff_cleanup_list = 0;

	individual_match_info_t *return_matched_up;

	/* initialize the return structure */
	return_matched_up = oTFEi_rec_initialize_match_info();

	return_matched_up->tfe_pin_idx = pin_idx;
	return_matched_up->tfe_level_2_pin_idx = (int*)ou_malloc(sizeof(int)*(tfe_node->output_pins[pin_idx]->num_output_pins_level_2), HETS_TFE_IDENTIFICATION);
	return_matched_up->object_pin_idx = INIT;
	return_matched_up->object_level_2_pin_idx = (int*)ou_malloc(sizeof(int)*(tfe_node->output_pins[pin_idx]->num_output_pins_level_2), HETS_TFE_IDENTIFICATION);
	return_matched_up->ff_matches = (short*)ou_malloc(sizeof(short)*(tfe_node->output_pins[pin_idx]->num_output_pins_level_2), HETS_TFE_IDENTIFICATION);
	for (i = 0; i < tfe_node->output_pins[pin_idx]->num_output_pins_level_2; i++)
	{
		return_matched_up->ff_matches[i] = INIT;
	}

	/* initialize the return structure */
	last_ports_pin_idx = 0;
	/* go through each output port */
	for (i = 0; i < object_node->num_output_ports; i++)
	{
		start_pin_idx = last_ports_pin_idx;
		/* update the start idx for the next input port by skipping over the remaining pins of this port (width) */
		last_ports_pin_idx += object_node->output_ports[i]->width;

		if (object_node->output_ports[i]->match == iteration_mark)
		{
			/* IF - this port has already been matched up against something */
			continue;
		}

		check_list = (short*)ou_malloc(sizeof(short)*object_node->output_pins[start_pin_idx]->num_output_pins_level_2, HETS_TFE_IDENTIFICATION);
		for (k = 0;  k < object_node->output_pins[start_pin_idx]->num_output_pins_level_2; k++)
		{
			check_list[k] = FALSE;
		}	

		/* go through each output port of the tfe and try and find an object version that matches */
		for (j = 0; j < tfe_node->output_pins[pin_idx]->num_output_pins_level_2; j++)
		{
			match_type = tfe_node->output_pins[pin_idx]->output_nodes[j]->n_t.hetero_node.hetero_node_type;
			match_width = tfe_node->output_ports[port_idx]->width;

			if (tfe_node->output_pins[pin_idx]->output_nodes[j] == NULL)
			{
				/* IF - this is a output then it matches with anything */
				num_outputs ++;
				continue;
			}

			found_match_for_current_tfe_fanout = FALSE;

			for (k = 0; k < object_node->output_pins[start_pin_idx]->num_output_pins_level_2; k++)
			{
				if (check_list[k] == TRUE)
				{
					/* IF - this port has already been matched then skip it */
					continue;
				}	
				
				/* grab the potential match node */
				current_potential_match_node = object_node->output_pins[start_pin_idx]->output_nodes[k];

				if ((current_potential_match_node->node_type == MACRO_NODE) &&
					(match_type == current_potential_match_node->n_t.hetero_node.hetero_node_type) &&
					(current_potential_match_node->tfe_id_mark != match_val) &&
					(match_width >= object_node->output_ports[i]->width) &&
					(oTFEi_rec_is_output_port_going_to_only_one_node(object_node, i, start_pin_idx, k) == TRUE))
				{
					/* IF - we find a match, then store the relation ship */
					return_matched_up->tfe_level_2_pin_idx[return_matched_up->num_fanout] = j;
					return_matched_up->object_pin_idx = start_pin_idx;
					return_matched_up->object_level_2_pin_idx[return_matched_up->num_fanout]= k;
					return_matched_up->num_fanout++;

					found_match_for_current_tfe_fanout = TRUE;
				}
				else if ((current_potential_match_node->node_type == LIBRARY_NODE_FF) &&
					(match_type == MN_FF) &&
					(oTFEi_rec_is_output_port_ff_going_to_only_one_node(object_node, i, start_pin_idx, k) == TRUE))
				{
					/* ELSE IF - we find a ff that points to a ff node that points to a common node */
					short ff_type;

					/* determine if it is a only input or inout type ff */
					ff_type = oTFEi_rec_determine_tfe_ff_type(tfe_node->output_pins[pin_idx]->output_nodes[j], current_tfe);

					assert((ff_type != NOT_OK) || (ff_type != INPUT_FF));

					if (ff_type == OUTPUT_FF)
					{
						/* IF - this ff is OUTPUT type */
						if (current_potential_match_node->tfe_id_mark == match_val)
						{
							continue;
						}

						/* record the ff since partial match */
						oTFEi_rec_copy_all_ff_in_one_output_node(current_potential_match_node, object_node, i, start_pin_idx, k);

						/* record that a list of ff was created */
						ff_cleanup_list = (node_t**)ou_realloc(ff_cleanup_list, sizeof(node_t*)*(num_ff_cleanup_list+1), HETS_TFE_IDENTIFICATION);
						ff_cleanup_list[num_ff_cleanup_list] = current_potential_match_node;
						num_ff_cleanup_list ++;
					}
					else if (ff_type == INOUT_FF)
					{
						/* ELSE IF - this ff is INOUT_FF */
						int local_i;

						for (local_i = 0; local_i < current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs; local_i++)
						{
							if (tfe_node->output_pins[pin_idx]->output_nodes[j] == current_tfe->t_t.graph.flip_flops->inout_mn_ffs[i])
							{
								/* IF - we find a match */
								if (temp_list_ff[local_i] == INPUT_FF)
								{
									/* IF - this node has already been matched in the output direction then mark fully matched */
									temp_list_ff[local_i] = INOUT_FF;
									return_matched_up->ff_matches[return_matched_up->num_fanout] = INOUT_FF;
								}
								else
								{
									/* ELSE - we still haven't matched the loop in the other direction */
									temp_list_ff[local_i] = OUTPUT_FF;
									/* mark that this is a special ff_match */
									oTFEi_rec_copy_all_ff_in_one_output_node(current_potential_match_node, object_node, i, start_pin_idx, k);
									/* record that a list of ff was created */
									ff_cleanup_list = (node_t**)ou_realloc(ff_cleanup_list, sizeof(node_t*)*(num_ff_cleanup_list+1), HETS_TFE_IDENTIFICATION);
									ff_cleanup_list[num_ff_cleanup_list] = current_potential_match_node;
									num_ff_cleanup_list ++;
								}
							}
						}
					}
					
					return_matched_up->tfe_level_2_pin_idx[return_matched_up->num_fanout] = j;
					return_matched_up->object_pin_idx = start_pin_idx;
					return_matched_up->object_level_2_pin_idx[return_matched_up->num_fanout]= k;
					return_matched_up->num_fanout++;

					found_match_for_current_tfe_fanout = TRUE;
				}
			}

			if (found_match_for_current_tfe_fanout == FALSE)
			{
				/* IF - did not find match for instance */
				/* break out of the j loop which describes each fanout of the tfe we are searching for */
				return_matched_up->num_fanout = 0;
				break;
			}
		}

		/* free the check list */
		ou_free(check_list);

		/* clean up space we added to make marco nodes out of ffs */
		for (j = 0; j < num_ff_cleanup_list; j++)
		{
			oTFEi_free_node_list((node_list_t*)(ff_cleanup_list[j]->anything_1));
		}
		if (ff_cleanup_list != NULL)
		{
			ou_free(ff_cleanup_list);
		}
		ff_cleanup_list = NULL;
		num_ff_cleanup_list = 0;

		if ((num_outputs >= 1) || (tfe_node->output_pins[pin_idx]->num_output_pins_level_2 == 0))
		{
			/* IF - this node has outputs of the tfe then need to record this node as an output, or this node has no outputs which means it is a output */
			return_matched_up->oas_outputs = TRUE; 
		}

		if (return_matched_up->num_fanout > 0)
		{
			/* IF - there is a matching then return the matched port */

			object_node->output_ports[i]->match = iteration_mark;
			
			return (return_matched_up);
		}

		if (tfe_node->output_pins[pin_idx]->num_output_pins_level_2 == num_outputs)
		{
			/* IF - this tfe is only outputs then return that match was fine */
			/* return structure is set so fanout is zero, so recursive functions think it is all matched */
			return_matched_up->num_fanout = 0; 
			return_matched_up->full_output_match = TRUE; 
			return (return_matched_up);
		}
	}

	/* free the return structure */
	oTFEi_free_match_structure(return_matched_up);

	return NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_free_match_structure)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_free_match_structure(individual_match_info_t* to_free)
{
	if (to_free->num_fanout > 0)
	{
		ou_free(to_free->tfe_level_2_pin_idx);
		ou_free(to_free->object_level_2_pin_idx);
		ou_free(to_free->ff_matches);
	}
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_is_output_port_going_to_only_one_node)
 * 	Checks if a specific fanout goes to a particular node.
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_is_output_port_going_to_only_one_node(node_t* node, int port_idx, int pin_idx, int level_2_pin_idx)
{
	int i;
	node_t *pointing_to = NULL;

	for (i = pin_idx; i < pin_idx + node->output_ports[port_idx]->width; i++)
	{
		if (pointing_to == NULL)
		{
			/* IF - there is no node we are pointing to then this is the start and determine the node this might fail in rare situations */
			pointing_to = node->output_pins[i]->output_nodes[level_2_pin_idx];
		}
		else if ((node->output_pins[i]->num_output_pins_level_2 == 0) || 	
				 (pointing_to != node->output_pins[i]->output_nodes[level_2_pin_idx]))
		{
			/* ELSE IF - we are not all pointing to the same node, so return FAIL */
			return FALSE;
		}
	}
	return TRUE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_is_output_port_ff_going_to_only_one_node)
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_is_output_port_ff_going_to_only_one_node(node_t* node, int port_idx, int pin_idx, int level_2_pin_idx)
{
	int i;
	node_t *pointing_to = NULL;

	for (i = pin_idx; i < pin_idx + node->output_ports[port_idx]->width; i++)
	{
		if (node->output_pins[i]->output_nodes[level_2_pin_idx]->node_type != LIBRARY_NODE_FF)
		{
			/* IF - this node is not a FF */
			return FALSE;
		}

		if (pointing_to == NULL)
		{
			/* IF - there is no node we are pointing to then this is the start and determine the node this might fail in rare situations */
			pointing_to = node->output_pins[i]->output_nodes[level_2_pin_idx]->output_pins[0]->output_nodes[0];
		}
		else if ((node->output_pins[i]->num_output_pins_level_2 == 0) ||
				 (pointing_to != node->output_pins[i]->output_nodes[level_2_pin_idx]->output_pins[0]->output_nodes[0]))
		{
			/* ELSE IF - we are not all pointing to the same node, so return FAIL */
			return FALSE;
		}
	}
	return TRUE;
}
/*---------------------------------------------------------------------------------------------
 * (function:  oTFEi_init_match_info)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_init_match_info(match_info_t **match)
{
	*match = (match_info_t*)ou_malloc_struct(sizeof(match_info_t), HETS_TFE_IDENTIFICATION);

	/* initialize the recursive lists */
	oTFEi_init_empty_list(&((*match)->nodes));	
	oTFEi_init_empty_list(&((*match)->input_nodes));
	oTFEi_init_empty_list(&((*match)->inout_nodes));
	oTFEi_init_empty_list(&((*match)->output_nodes));
	oTFEi_init_empty_list(&((*match)->additional_seed_nodes));
	oTFEi_init_empty_list(&((*match)->all_nodes));
}

/*---------------------------------------------------------------------------------------------
 * (function:  oTFEi_free_match_info)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_free_match_info(match_info_t *match)
{
	/* free the lists */
	oTFEi_free_node_list(match->nodes);
	oTFEi_free_node_list(match->input_nodes);
	oTFEi_free_node_list(match->inout_nodes);
	oTFEi_free_node_list(match->output_nodes);
	oTFEi_free_node_list(match->additional_seed_nodes);
	oTFEi_free_node_list(match->all_nodes);

	/* free the match structure */
	ou_free(match);
}

/*---------------------------------------------------------------------------------------------
 * (function:  oTFEi_add_match_info)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_add_match_info(match_info_t *to, match_info_t *from)
{
	/* append the previous lists */
	oTFEi_append_node_list(to->nodes, from->nodes);
	oTFEi_append_node_list(to->input_nodes, from->input_nodes);
	oTFEi_append_node_list(to->inout_nodes, from->inout_nodes);
	oTFEi_append_node_list(to->output_nodes, from->output_nodes);
	oTFEi_append_node_list(to->additional_seed_nodes, from->additional_seed_nodes);
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_add_node_to_node_list)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_add_node_to_node_list(node_list_t *to, node_t* node)
{
	/* resize the to list */
	to->nodes = (node_t**)ou_realloc(to->nodes, sizeof(node_t*)*(to->num_nodes + 1), HETS_TFE_IDENTIFICATION);

	to->nodes[to->num_nodes] = node;

	/* increase the size of the appended list */
	to->num_nodes++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_append_node_list)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_append_node_list(node_list_t *to, node_list_t *from)
{
	int i;

	if (to->num_nodes + from->num_nodes == 0)
	{
		/* IF - neither one has nodes */
		return;
	}

	/* resize the to list */
	to->nodes = (node_t**)ou_realloc(to->nodes, sizeof(node_t*)*(to->num_nodes + from->num_nodes), HETS_TFE_IDENTIFICATION);

	/* copy ove the nodes */
	for (i = to->num_nodes; i < to->num_nodes + from->num_nodes; i++)
	{
		to->nodes[i] = from->nodes[i-(to->num_nodes)];
	}

	/* increase the size of the appended list */
	to->num_nodes = to->num_nodes + from->num_nodes;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_free_node_list)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_free_node_list(node_list_t *to_free)
{
	if (to_free->nodes != NULL)
	{
		ou_free(to_free->nodes);
	}
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_free_node_list)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_init_empty_list(node_list_t **to)
{
	*to = (node_list_t*)ou_malloc_struct(sizeof(node_list_t), HETS_TFE_IDENTIFICATION);
	(*to)->nodes = NULL;
	(*to)->num_nodes = 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_clean_nodes_of_failed_match)
 * 	This is a clean routine so that if a match is failed all nodes currently matched are cleaned
 * 	to continue the recursion.
 *-------------------------------------------------------------------------------------------*/
void oTFEi_clean_nodes_of_failed_match(node_list_t *clean_up_list)
{
	int i;

	/* clean the mark */
	for (i = clean_up_list->num_nodes; i < clean_up_list->num_nodes; i++)
	{
		clean_up_list->nodes[i]->tfe_id_mark = INIT;

		/* check if the node is ff type */
		if ((clean_up_list->nodes[i]->node_type == LIBRARY_NODE_FF) && (clean_up_list->nodes[i]->anything_1 != NULL))
		{
			/* IF - this is a node where we've stored all the ff information in, then clean it up */
			oTFEi_free_node_list((node_list_t*)(clean_up_list->nodes[i]->anything_1));
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_check_if_out_port_is_already_matched)
 *-------------------------------------------------------------------------------------------*/
short oTFEi_rec_check_if_out_port_is_already_matched(node_t *tfe_node, int port_idx, int pin_idx, int match_val)
{
	int i;
	int already_matched = FALSE;

	for (i = 0; i < tfe_node->output_pins[pin_idx]->num_output_pins_level_2; i++)
	{
		if (tfe_node->output_pins[pin_idx]->output_nodes[i] == NULL)
		{
			/* IF - output skip */
			continue;
		}
		if ((already_matched == FALSE) && (tfe_node->output_pins[pin_idx]->output_nodes[i]->tfe_id_mark == match_val) && (tfe_node->output_pins[pin_idx]->output_nodes[i]->n_t.hetero_node.hetero_node_type != MN_FF))
		{
			/* IF - we find an output node that has been matched then update the already matched */
			already_matched = TRUE;
			break;
		}
	}

	return already_matched;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_rec_clean_recursive_structs_on_exit)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_rec_clean_recursive_structs_on_exit(match_info_t* match)
{
	oTFEi_clean_nodes_of_failed_match(match->nodes);

	/* free up the storage structure */
	oTFEi_free_match_info(match);
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_recursive_match)
 * 	This is the recursive matching algorithm (subgraph isomorphism).  The main idea is the
 * 	algorithm starts off with a seed tfe and a seed object node.  We grow out from the seed
 * 	checking each time if the subgraphs match.
 *
 * 	NOTE: this algorithm is not perfect since I have missed dealing with a case in which two 
 * 	neighbour nodes with the same label can be missed as a match.  This may happen if there
 * 	is a particular order for the match (in other words, this algorithm currently doesn'y try 
 * 	all match possibilities for the same labels).
 *-------------------------------------------------------------------------------------------*/
match_info_t *oTFEi_recursive_match(node_t* tfe_node, node_t* object_node, int match_val, tfe_t *current_tfe)
{
	int i, j;
	int last_ports_pin_idx;
	int start_pin_idx;
	short still_trying_object_node_inputs;
	short still_trying_object_node_outputs;
	short is_input_match;
	short this_node_has_outputs = FALSE;
	individual_match_info_t *input_match_info;
	individual_match_info_t *output_match_info;
	int *list_of_input_idxs;
	int num_list_of_input_idxs = 0;
	match_info_t *match_return_info;
	match_info_t *returned_matched_nodes;
	match_info_t *temp_matched_nodes;
	node_list_t *list_type;

	/* mark these nodes as matched.  If fix is made for all possibilities (see above note) then we need to remember to clean these marks */
	tfe_node->tfe_id_mark = match_val;
	object_node->tfe_id_mark = match_val;

	/* initialize the recording structure for matches */
	oTFEi_init_match_info(&match_return_info);

	/********************************************
	 * Do subgraph id in the input direction
	 ********************************************/

	/* clean out these ports so that we can determine which ports are matched */
	oTFEi_rec_clean_input_port_match_flags(tfe_node, object_node);

	/* allocate a list that records the indexes of iputs for the tfe */
	list_of_input_idxs = (int*)ou_malloc(sizeof(int)*tfe_node->num_input_ports, HETS_TFE_IDENTIFICATION);

	last_ports_pin_idx = 0;
	/* For each tfe input node */
	for (i = 0; i < tfe_node->num_input_ports; i++)
	{
		start_pin_idx = last_ports_pin_idx;
		/* update the start idx for the next input port by skipping over the remaining pins of this port (width) */
		last_ports_pin_idx += tfe_node->input_ports[i]->width;

		/* skip if this in a input */
		if (tfe_node->input_pins[start_pin_idx]->input_node == NULL)
		{
			/* IF - the seed is actually a primary input points, then skip */
			list_of_input_idxs[num_list_of_input_idxs] = i;
			num_list_of_input_idxs++;
			continue;
		}

		/* check if we have already matched up this port */
		if (tfe_node->input_pins[start_pin_idx]->input_node->tfe_id_mark == match_val)
		{
			/* IF - matched already then skip */
			tfe_node->input_ports[i]->match = TRUE;
			continue;
		}

		still_trying_object_node_inputs = TRUE;

		/* NOTE - this algorithm does not try all possibilities since it is possible that given two input nodes with the same label, but
		 * different subgraphs it is possible that the subraphs will match only under a specific condition.  I assume based on the symmetry
		 * in my tfes that this currently is not a concern */
		while (still_trying_object_node_inputs)
		{
			/* find an equivalent input node in the object */
			input_match_info = oTFEi_rec_find_matching_input_node(tfe_node, i, start_pin_idx, object_node, i, match_val, current_tfe);

			if (input_match_info == NULL)
			{
				/* IF - there is no matchable input then there is no match for this node */
				/* clean up all the recursive success */
				oTFEi_rec_clean_recursive_structs_on_exit(match_return_info);

				ou_free(list_of_input_idxs);

				return NULL;
			}

			returned_matched_nodes = NULL;
			if (input_match_info->ff_match == INIT)
			{
				/* IF - there are no special ff cases */
				/* recursively check if this subgraph matches */
				returned_matched_nodes = oTFEi_recursive_match(tfe_node->input_pins[start_pin_idx]->input_node, input_match_info->return_node, match_val, current_tfe);
			}

			if (returned_matched_nodes != NULL)
			{
				/* IF - succesful match */
				/* add matched nodes to the list of all matched nodes */
				oTFEi_add_match_info(match_return_info, returned_matched_nodes);
				oTFEi_free_match_info(returned_matched_nodes);

				tfe_node->input_ports[i]->match = TRUE;

				/* and exit while loop */
				still_trying_object_node_inputs = FALSE;
			}
			else if (input_match_info->ff_match == INOUT_FF)
			{
				/* ELSE IF - this is an INOUT ff that is already in the list */
				tfe_node->input_ports[i]->match = TRUE;
				/* and exit while loop */
	            still_trying_object_node_inputs = FALSE;


			}

			oTFEi_free_match_structure(input_match_info);
		}
	}

	/********************************************
	 * Check the ramaining input
	 ********************************************/

	/* For each tfe input node */
	/* NOTE: Assume that input nodes will match since they can be set to nothing.  Maybe should make a list of input from largest to smallest then 
	 * match the widths up with the object.  Currently, just find matches. */

	/* For each tfe input nodes */
	for (i = 0; i < num_list_of_input_idxs; i++)
	{
		for (j = 0; j < object_node->num_input_ports; j++)
		{	
			if ((tfe_node->input_ports[list_of_input_idxs[i]]->match == INIT) &&
				(object_node->input_ports[j]->match == INIT) &&
				(object_node->input_ports[j]->width <= tfe_node->input_ports[i]->width))
			{
				/* IF - find a unmatched input port of object and the widths are good, then we have a match */
				object_node->input_ports[j]->match = TRUE;
				tfe_node->input_ports[list_of_input_idxs[i]]->match = TRUE;
				break;
			}
		}
	}

	ou_free(list_of_input_idxs);

	/********************************************
	 * Determine if we have input id
	 ********************************************/

	is_input_match = TRUE;

	/* determine if we have matched for all inputs */
	for (i = 0; i < tfe_node->num_input_ports; i++)
	{
		if (tfe_node->input_ports[i]->match == INIT)
		{
			/* IF - there is an unmatched input node, then no match */
			is_input_match = FALSE;
			break;
		}
	}

	if (is_input_match == FALSE)
	{
		/* IF - there is no input match, exit */
		oTFEi_rec_clean_recursive_structs_on_exit(match_return_info);
		return NULL;
	}

	/********************************************
	 * Do the subgraph id in the output direction
	 ********************************************/

	/* Now we do the same subgraph recursion in the output port direction */

	/* clean out these ports so that we can determine which ports are matched */
	oTFEi_rec_clean_output_port_match_flags(tfe_node, object_node);

	last_ports_pin_idx = 0;
	/* For each output node */ 
	for (i = 0; i < tfe_node->num_output_ports; i++)
	{
		start_pin_idx = last_ports_pin_idx;
		/* update the start idx for the next output port by skipping over the remaining pins of this port (width) */
		last_ports_pin_idx += tfe_node->output_ports[i]->width;

		/* check if we have already matched up this port */
		if (oTFEi_rec_check_if_out_port_is_already_matched(tfe_node, i, start_pin_idx, match_val) == TRUE)
		{
			/* IF - matched already then skip */
			tfe_node->output_ports[i]->match = TRUE;
			continue;
		}

		/* loop until we find a match */
		still_trying_object_node_outputs = TRUE;

		/* NOTE - Same NOTE as for the output node */
		while (still_trying_object_node_outputs)
		{		
			/* find a matching output port idx */
			output_match_info = oTFEi_rec_find_matching_output_port(tfe_node, i, start_pin_idx, object_node, i, match_val, current_tfe);

			/* if we can't find a matching output port we have failed so return failure */
			if (output_match_info == NULL)
			{
				/* IF - there is no matchable output then there is no match for this node */
				/* clean up all the recursive success */
				oTFEi_rec_clean_recursive_structs_on_exit(match_return_info);
				return NULL;
			}

			/* create empty temp storage for all fanouts */
			oTFEi_init_match_info(&temp_matched_nodes);

			for (j = 0; j < output_match_info->num_fanout; j++)
			{
				/* given a matching	output port see if the subgraph also matches.  Note this returned list does not include outpu since they should
				 * be matched up already. */
				if (output_match_info->ff_matches[j] != INOUT_FF)
				{
					returned_matched_nodes = oTFEi_recursive_match(
														tfe_node->output_pins[output_match_info->tfe_pin_idx]->output_nodes[output_match_info->tfe_level_2_pin_idx[j]], 
														object_node->output_pins[output_match_info->object_pin_idx]->output_nodes[output_match_info->object_level_2_pin_idx[j]], 
														match_val, 
														current_tfe);

					/* if we fin a matching subgraph, then finish looking */
					if (returned_matched_nodes == NULL)
					{
						/* IF one of these fails then we have failed output match and the node does not match */
	
						/* given the temp list, clean up all matched nodes */
						oTFEi_clean_nodes_of_failed_match(temp_matched_nodes->nodes);
	
						break;
					}
					else
					{
						/* ELSE - match is good so far */
	
						/* add nodes returned to the a temp list */
						oTFEi_add_match_info(temp_matched_nodes, returned_matched_nodes);
						oTFEi_free_match_info(returned_matched_nodes);
					}
				}
				else
				{
					/* ELSE - this is an INOUT_FF, so we've marked that we hit it and continue */
					break;
				}
			}

			if (output_match_info->oas_outputs == TRUE)
			{
				/* IF - this node is matched to outputs of the TFE (seen by oTFEi_rec_find_matching_output_port) then indicate that */
				this_node_has_outputs = TRUE;
			}

			if ((returned_matched_nodes != NULL) || (output_match_info->full_output_match == TRUE) || (output_match_info->ff_matches[j] == INOUT_FF))
			{
				/* IF - succesful match */
				/* add matched nodes to the list of all matched nodes.  This addition is the temp list. */
				oTFEi_add_match_info(match_return_info, temp_matched_nodes);

				tfe_node->output_ports[i]->match = TRUE;

				/* and exit while loop */
				still_trying_object_node_outputs = FALSE;
			}

			/* clean temp_storage */
			oTFEi_free_match_info(temp_matched_nodes);

			/* clean up the return match info structure */
			oTFEi_free_match_structure(output_match_info);
		}
	}

	/********************************************
	 * Clean all temp  allocations
	 ********************************************/

	/********************************************
	 * Prepare return struct
	 ********************************************/

	/* choose the right list to add the object node to */
	if ((this_node_has_outputs == TRUE) && (num_list_of_input_idxs > 0))
	{
		/* IF - this node is associated with a tfe output and an input then record this info */
		list_type = match_return_info->inout_nodes;
	}
	else if (this_node_has_outputs == TRUE)
	{
		/* IF - this node is associated with a tfe output then record this info */
		list_type = match_return_info->output_nodes;
	}
	else if (num_list_of_input_idxs > 0)
	{
		/* IF - this is a input node then record it for later */
		list_type = match_return_info->input_nodes;
	}
	else if (num_list_of_input_idxs == 0)
	{
		/* ELSE IF - this is neither an input or an output */
		/* if you make it this far, then this is a match, and add yourself to the list */
		list_type = match_return_info->nodes;
	}
	else
	{
		assert(FALSE);
	}

	/* check if any special details */
	if (object_node->node_type == LIBRARY_NODE_FF)
	{
		/* ELSE - this is a FF so add all the ff to the list */
		node_list_t *ff_list = (node_list_t*)object_node->anything_1;
		
		/* add all the flip flops since this is a loop to the circuit */
		for (j = 0; j < ff_list->num_nodes; j++)
		{
			assert(ff_list->nodes[j]->node_type == LIBRARY_NODE_FF);
			oTFEi_add_node_to_node_list(list_type, ff_list->nodes[j]);
		}
	}
	else
	{
		/* IF - this is a normal list then add */
		oTFEi_add_node_to_node_list(list_type, object_node);
	}

	/* special case check if this node is seed node type.  This is recorded to help us determine if we are redoing a match based on symmetry of
	 * graphs */
	if (tfe_node->n_t.hetero_node.hetero_node_type == current_tfe->macro_id_seed_type)
	{
		/* IF - this node is the same as the seed type then record the object in a special list which helps us check if we've already matched this */
		oTFEi_add_node_to_node_list(match_return_info->additional_seed_nodes, object_node);
	}

	return match_return_info;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_show_matched_nodes)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_show_matched_nodes(match_info_t *lists, short match_type, int match_val)
{
	int i;

	for (i = 0; i < lists->inout_nodes->num_nodes; i++)
	{
		fprintf(out, "INOUT NODE %s is matched to %s for match_val %d\n", lists->inout_nodes->nodes[i]->unique_name, macro_string[match_type], match_val);
	}
	for (i = 0; i < lists->input_nodes->num_nodes; i++)
	{
		fprintf(out, "INPUT NODE %s is matched to %s for match_val %d\n", lists->input_nodes->nodes[i]->unique_name, macro_string[match_type], match_val);
	}
	for (i = 0; i < lists->nodes->num_nodes; i++)
	{
		fprintf(out, "NODE %s is matched to %s for match_val %d\n", lists->nodes->nodes[i]->unique_name, macro_string[match_type], match_val);
	}
	for (i = 0; i < lists->output_nodes->num_nodes; i++)
	{
		fprintf(out, "OUTPUT NODE %s is matched to %s for match_val %d\n", lists->output_nodes->nodes[i]->unique_name, macro_string[match_type], match_val);
	}
	for (i = 0; i < lists->additional_seed_nodes->num_nodes; i++)
	{
		fprintf(out, "MIRROR SEED NODES %s is matched to %s for match_val %d\n", lists->additional_seed_nodes->nodes[i]->unique_name, macro_string[match_type], match_val);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_mark_identified_tfe)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_mark_identified_tfe(tfe_t *current_tfe, node_t *current_node, int match_id, match_info_t *match)
{
	tfe_identification_t *node_bindings;	

	if (current_node->possible_node_bindings == NULL)
	{
		/* IF - this is the first time this node can possibly be bound create the binding */
		node_bindings = oTFEi_create_identification_structure();
		current_node->possible_node_bindings = node_bindings;
	}
	else
	{
		/* ELSE - this node has been bound before */
		node_bindings = current_node->possible_node_bindings;
	}

	/* record the type of macro binding */
	node_bindings->macro_type_for_match = (short*)ou_realloc(node_bindings->macro_type_for_match, sizeof(short)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->macro_type_for_match[node_bindings->num_possible_bindings] = current_tfe->macro_type;
	node_bindings->match_ids = (short*)ou_realloc(node_bindings->match_ids, sizeof(short)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->match_ids[node_bindings->num_possible_bindings] = match_id;
	node_bindings->potential_tfe_implementation = (match_info_t**)ou_realloc(node_bindings->potential_tfe_implementation, sizeof(match_info_t*)*(node_bindings->num_possible_bindings + 1), HETS_TFE_IDENTIFICATION);
	node_bindings->potential_tfe_implementation[node_bindings->num_possible_bindings] = match;

	/* increase the number of macro_bindings */
	node_bindings->num_possible_bindings ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_record_successful_match)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_record_successful_match(match_info_t *lists, tfe_t*  current_tfe, int match_id)
{
	int i;
	int sc_idx;

	/* go through each node updating that it has a match */
	/* later on might need to record wether this is an input/output so we can quickly jump a structure.
	 * Also add each node to a general list so we can quickly go to each */
	for (i = 0; i < lists->inout_nodes->num_nodes; i++)
	{
		oTFEi_mark_identified_tfe(current_tfe, lists->inout_nodes->nodes[i], match_id, lists);
		oTFEi_add_node_to_node_list(lists->all_nodes, lists->inout_nodes->nodes[i]);
	}
	for (i = 0; i < lists->input_nodes->num_nodes; i++)
	{
		oTFEi_mark_identified_tfe(current_tfe, lists->input_nodes->nodes[i], match_id, lists);
		oTFEi_add_node_to_node_list(lists->all_nodes, lists->input_nodes->nodes[i]);
	}
	for (i = 0; i < lists->nodes->num_nodes; i++)
	{
		oTFEi_mark_identified_tfe(current_tfe, lists->nodes->nodes[i], match_id, lists);
		oTFEi_add_node_to_node_list(lists->all_nodes, lists->nodes->nodes[i]);
	}
	for (i = 0; i < lists->output_nodes->num_nodes; i++)
	{
		oTFEi_mark_identified_tfe(current_tfe, lists->output_nodes->nodes[i], match_id, lists);
		oTFEi_add_node_to_node_list(lists->all_nodes, lists->output_nodes->nodes[i]);
	}

	/* go through seed list and add to a hash so that we can quickly lookup additional seed nodes */
	lists->additional_seed_nodes_sc = sc_new_string_cache();
	for (i = 0; i < lists->additional_seed_nodes->num_nodes; i++)
	{
		sc_idx = sc_add_string(lists->additional_seed_nodes_sc, lists->additional_seed_nodes->nodes[i]->unique_name);
	    if(lists->additional_seed_nodes_sc->data[sc_idx] == NULL)
		{
			/* IF - the string is not in the hash */
			lists->additional_seed_nodes_sc->data[sc_idx] = lists->additional_seed_nodes->nodes[i];
		}
		else
		{
			/* ELSE - the string has data */
			assert(FALSE);
		}
	}

}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_compare_tfe_to_graph_for_match)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_compare_tfe_to_graph_for_match(tfe_t *current_tfe, node_t *start_node, int match_val)
{
	match_info_t *match_list;
	short is_matched = TRUE;
	short is_already_matched = FALSE;
	int i, j;
	int sc_idx;
	node_t *seed_node;

	assert(current_tfe->t_t.graph.seed_node != NULL);

	if ((current_tfe->t_t.graph.flip_flops != NULL) && (current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs > 0))
	{
		/* IF - this tfe has flip flops that are part of a loop, create a record list to analyse them */
		temp_list_ff = (short*)ou_malloc(sizeof(short)*current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs, HETS_TFE_IDENTIFICATION);
		for (i = 0; i < current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs; i++)
		{
			temp_list_ff[i] = INIT;
		}
	}
				
	/* start the match given the seed node and the start_node */
	match_list = oTFEi_recursive_match(current_tfe->t_t.graph.seed_node, start_node, match_val, current_tfe);

	if (match_list != NULL)
	{
		/* IF - Found a match so record these nodes as a possible matching */
		if ((current_tfe->t_t.graph.flip_flops != NULL) && (current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs > 0))
		{
			for (i = 0; i < current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs; i++)
			{
				if (temp_list_ff[i] != INOUT_FF)
				{
					is_matched = FALSE;
					break;
				}
			}
			ou_free(temp_list_ff);
		}

		/* also check if we have already found this graph */
		seed_node = match_list->additional_seed_nodes->nodes[0];

		if (seed_node->possible_node_bindings != NULL)
		{
			/* IF - there are other possible bindings on this node */
			for (i = 0; i < seed_node->possible_node_bindings->num_possible_bindings; i++)
			{
				is_already_matched = FALSE;

				if (current_tfe->tfe_type == GRAPH)
				{
					/* IF - this is a graph then we can check for dual.  A primitive can only be matched one since this snippet of code really handles symetric
					 * graphs */
					if (seed_node->possible_node_bindings->macro_type_for_match[i] == current_tfe->macro_type)
					{
						/* IF - this node has already been bound to a similar type, then check if seed list is the same */
						for (j = 1; j < match_list->additional_seed_nodes->num_nodes; j++)
						{
							sc_idx = sc_add_string(seed_node->possible_node_bindings->potential_tfe_implementation[i]->additional_seed_nodes_sc, match_list->additional_seed_nodes->nodes[j]->unique_name);
		    				if(seed_node->possible_node_bindings->potential_tfe_implementation[i]->additional_seed_nodes_sc->data[sc_idx] == NULL)
							{
								/* IF - the string is not in the hash then no match ... break */
								is_already_matched = FALSE;
								break;
							}
							else
							{
								/* ELSE - the string has data so we are still matched */
								is_already_matched = TRUE;
							}			
						}
					}
	
					if (is_already_matched == TRUE)
					{
						/* IF - after a full run through a binding if there is a match then we can discard this match */
						break;
					}
				}
			}
		}

		if ((is_matched == TRUE) && (is_already_matched == FALSE))
		{
			/* IF - everything matches then record */
			oTFEi_record_successful_match(match_list, current_tfe, match_val);

			oTFEi_show_matched_nodes(match_list, current_tfe->macro_type, match_val);
		}
		else
		{
			/* ELSE - clean up the match list */
			oTFEi_free_match_info(match_list);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oTFEi_id_given_tfe_and_start_node)
 *-------------------------------------------------------------------------------------------*/
void oTFEi_id_given_tfe_and_start_node(tfe_t *current_tfe, node_t *start_node, int match_val)
{
	if (current_tfe->tfe_type == PRIMITIVE)
	{
		primitive_t *current_primitive = current_tfe->t_t.primitive.primitive;

		/* IF - the tfe is a primitive then check the input sizes for match */
		if ((start_node->node_type == MACRO_NODE) &&
			(start_node->n_t.hetero_node.hetero_node_type == current_tfe->macro_type))
		{
			/* IF - the start node and the primitive are of the same type */

			/* NOTE: need to consider if a primitive match can match with a smaller start node */
			
			/* check if the input ports are <= */
			if (current_primitive->num_input_ports == 2)
			{
				/* IF - this is a 2 input matching then check if the start node has an A and B port with acceptable sizes */
				if ((start_node->n_t.hetero_node.width_a <= current_primitive->input_port_width[0]) &&
					(start_node->n_t.hetero_node.width_b <= current_primitive->input_port_width[1]))
				{
					/* IF - the input ports then check the output ports */
					if ((current_primitive->num_output_ports == 1) &&
						(start_node->n_t.hetero_node.width <= current_primitive->output_port_width[0]))
					{
						/* IF - the start node has a smaller size outputs, then this node matches */
						oTFEi_mark_identified_tfe_primitive(current_tfe, start_node, match_val);
						fprintf(out, "%s is matched to %s for match_val %d\n", start_node->unique_name, macro_string[current_tfe->macro_type], match_val);
					}
				}
			}
		}
	}
	else if (current_tfe->tfe_type == GRAPH)
	{
		/* ELSE IF - tfe is a complex graph that needs to be isomorphically checked */
		oTFEi_compare_tfe_to_graph_for_match(current_tfe, start_node, match_val);
	}
	else
	{
		assert(FALSE);
	}
}
