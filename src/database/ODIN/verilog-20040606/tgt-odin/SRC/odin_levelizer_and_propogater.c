
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

/* This file contains code for levelization, and coneects to code that does propogation.  Levelizing can be used for a variety of purposes, and
 * Odin does levelization to aid logic propogation which propogates constants.
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
#include "odin_ds1_graph_utils.h"
#include "odin_QUARTUS_LPM_graph_utils.h"
#include "odin_logic_simulation.h"
#include "odin_levelizer_and_propogater.h"

node_t ***level_list = NULL;
int num_level_list = -1;
int *num_level_list_2nd_dimension = NULL;

/*---------------------------------------------------------------------------------------------
 * (function: olap_add_node_to_level_list)
 *-------------------------------------------------------------------------------------------*/
void olap_add_node_to_level_list(node_t *node, int level)
{
	assert(level <= num_level_list + 1);

	if (level == num_level_list + 1)
	{
		/* IF - this is the first addition to the level_list */
		level_list = (node_t***)ou_realloc(level_list, sizeof(node_t**)*(level+1), HETS_LEVELIZER_AND_PROPOGATER);

		/* update the dimension list to be able to store this value */
		num_level_list_2nd_dimension = (int*)ou_realloc(num_level_list_2nd_dimension, sizeof(int)*(level+1), HETS_LEVELIZER_AND_PROPOGATER);
		num_level_list_2nd_dimension[level] = 0;

		/* update the big count */
		num_level_list = level;
		level_list[level] = NULL;
	}

	/* Add this node to the end of the level list */
	level_list[level] = (node_t**)ou_realloc(level_list[level], sizeof(node_t*) * (num_level_list_2nd_dimension[level] + 1), HETS_LEVELIZER_AND_PROPOGATER);

	/* store the node value in the new spot */
	level_list[level][num_level_list_2nd_dimension[level]] = node;

	/* update the dimension count to reflect the new value */
	num_level_list_2nd_dimension[level] ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: olap_depth_first_traverse_constant_propogation)
 *-------------------------------------------------------------------------------------------*/
void olap_levelizer()
{
	node_t *current_node;
	int i;
	short new_propogation_value;

	/* initialize the level list and add level 0 list */
	level_list = NULL;
	
	/* starting point is to traverse from the: vcc, gnd, input_pins, memory outs, and flip flip outputs */
	
	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			olap_add_node_to_level_list(input_nodes[i], 0);
			olap_visit_output_pins_of_node_to_levelize(input_nodes[i], 0, X);
		}
	}
	/* now traverse the ground and vcc pins */
	olap_add_node_to_level_list(gnd_node, 0);
	olap_visit_output_pins_of_node_to_levelize(gnd_node, 0, ZERO);
	olap_add_node_to_level_list(vcc_node, 0);
	olap_visit_output_pins_of_node_to_levelize(vcc_node, 0, ONE);

	/* visit the memory outputs */
	for (i = 0; i < num_memories; i++)
	{
		current_node = memories[i]->memory_node;

		olap_add_node_to_level_list(current_node, 0);
		olap_visit_output_pins_of_node_to_levelize(current_node, 0, X);
	}

	/* finally visit the flip_flops */
	for (i = 0; i < num_ff_nodes; i++)
	{
		if (ff_node[i] != NULL)
		{
			/* IF - this ff has not been deleted by some other function */
			olap_add_node_to_level_list(ff_node[i], 0);
			new_propogation_value = ols_determine_propogation_value(ff_node[i]);
			olap_visit_output_pins_of_node_to_levelize(ff_node[i], 0, new_propogation_value);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: olap_visit_output_pins_of_node_to_levelize)
 * 	Top part of a levelizer funtion.  Levelizing is going from pins to next stage and calling
 * 	each node in a specific level if all if its inputs have been defined as a level.  The
 * 	new level is "max(all input pin levels) + 1".
 *-------------------------------------------------------------------------------------------*/
void olap_visit_output_pins_of_node_to_levelize(node_t* node, int current_level, short current_propogation_value)
{
	int i;
	int j;
	
	/* visit the output node */
	for (i = 0; i < node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
		{
			if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
				olap_recursive_leveler(onu_get_output_pins_node(node->output_pins[i], j), 
									current_level, 
									current_propogation_value, 
									onu_get_output_pins_related_output_port(node->output_pins[i], j));
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: olap_recursive_leveler)
 *-------------------------------------------------------------------------------------------*/
void olap_recursive_leveler(node_t *node, int input_nodes_level, short propogation_value, int input_pin_index)
{
	short new_propogation_value;

	/* BASE CASE - check if this is a PO, or Memory, or DFF and if it is, add the PO to a level, and the others ignore */
	if (node->node_type == OUTPUT_NODE)  // OUTPUT 
	{
		/* IF - output node */
		if (propogation_value != X)
		{
			fprintf(stderr, "PO node has value %d\n", propogation_value);	
		}
		return;
	}
	else if ((node->node_type == LIBRARY_NODE_FF) || // DFF
		((node->node_type == MACRO_NODE) && (node->n_t.hetero_node.hetero_node_type == MN_MEMORY))) // MEMORY
	{
		/* ELSE IF - memory component */

		/* record the propogation value for one of the inputs */
		node->input_pins[input_pin_index]->input_propogation_value_x_0_1 = propogation_value;

		if ((propogation_value != X) && (node->level_count == node->num_input_pins))
		{
			fprintf(stderr, "MEM node has value %d\n", propogation_value);	
		}
		return;
	}

	/* record the propogation value for one of the inputs */
	node->input_pins[input_pin_index]->input_propogation_value_x_0_1 = propogation_value;
	/* mark the output node with the level, input_count and logic propogation value from this input */
	node->level_count++;
	
	if (node->level_value > input_nodes_level)
	{
		/* IF - the level value coming in is greater than any level value we have update it to this new value.  The greatest level value will determine
		 * this nodes level (max+1) */
		node->level_value = input_nodes_level;
	}

	if (node->level_count == node->num_input_pins)
	{
		/* IF - all the inputs have been visited (input_count == input_pins) then */

		/* Based on level count add this node to the appropriate level list */
		node->level_value ++;
		olap_add_node_to_level_list(node, node->level_value);

		/* determine the logic propogation value for this node */
		new_propogation_value = ols_determine_propogation_value(node);

		/* recursively call the levelizer for the outputs of this node */
		olap_visit_output_pins_of_node_to_levelize(node, node->level_value, new_propogation_value);
	}
}
