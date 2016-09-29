
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

/* This is the functionality that provides the basic functions for dealing with the 2nd data structure.  This data structure is the basic node
 * which represents logic or I/O.  These structures are created as we flatten the design, and these structures essentially need to be created,
 * destroyed, searched, connected, and reconnected.
 *
 * Within this data structure we create a graph such that nodes are connected to both their inputs and outputs.  This allows us to traverse
 * the design in either direction, but can make it tricky understanding how the nodes are connected.  We call node_inputs the description point
 * of what nodes connect to this node, and the node_outputs, the nodes that a node connects to.  Even in writing this I sometimes get confused.
 *
 * I've written some functions that help do remapping such that inputs can be rewirred to a new output, and this will update all the structures.  
 * Ussually, these types of remappings happen in optimizations, and ussually cause many of the my debugging challenges.  If things aren't remapped
 * properly, then certain stages of the code will go to nodes that will later be freed, and cause segfaults.
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

#include "odin_ds1_graph_utils.h"
#include "odin_FLAT_netlist.h"
#include "odin_node_utils.h"
#include "odin_hetero_utils.h"

node_t **ff_node;
int num_ff_nodes;

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_node()
{
	node_t *temp_node;

	temp_node = (node_t *)ou_malloc_struct(sizeof(node_t), HETS_NODE_UTILS);

	temp_node->node_type = -1;
	temp_node->input_pins = NULL;
	temp_node->num_input_pins = 0;
	temp_node->input_ports = NULL;
	temp_node->num_input_ports = 0;
	temp_node->output_pins = NULL;
	temp_node->num_output_pins = 0;
	temp_node->output_ports = NULL;
	temp_node->num_output_ports = 0;
	temp_node->unique_name = NULL;
	temp_node->generated_from_name = NULL;
	temp_node->mark_number = -1;
	temp_node->mark_number_live = -1;
	temp_node->level_count = 0;
	temp_node->level_value = 0;
	temp_node->tfe_id_mark = -1;
	temp_node->is_partial_mapped_bound = HPM_NOT_TOUCHED;
	temp_node->possible_node_bindings = NULL;
	temp_node->binding = NULL;
	temp_node->anything_1 = NULL;

	return temp_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_free_node)
 *-------------------------------------------------------------------------------------------*/
void onu_free_node(node_t *to_free)
{
	int i;
	static int debug_val = 0;

	debug_val ++;
	D0(fprintf(out, "Deleting Node %s is a %d (debug:%d)\n", to_free->unique_name, to_free->n_t.hetero_node.hetero_node_type, debug_val ););

#ifdef ALLOCATION_COUNT_MACRO // Do this so we can see the node info on errors
	for (i = 0; i < oxml_num_debug_nodes_level2[1]; i++)
	{
		if (oxml_debug_nodes[1][i] == debug_val)
		{
			__asm("int3");
		}
	}
#endif

	/* any global lists that are used need to update that this node is gone */
	onu_remove_node_from_relevant_lists(to_free);

	if(to_free->unique_name != NULL)
	{
		ou_free(to_free->unique_name);
	}

	if(to_free->generated_from_name != NULL)
	{
		ou_free(to_free->generated_from_name);
		to_free->generated_from_name = NULL;
	}

	if(to_free->num_input_pins != 0)
	{
		ou_free(to_free->input_pins);
	}

	if(to_free->num_input_ports != 0)
	{
		ou_free(to_free->input_ports);
	}

	if(to_free->num_output_pins != 0)
	{
		for (i = 0; i < to_free->num_output_pins; i++)
		{
			if (to_free->output_pins[i]->num_output_pins_level_2 != 0)
			{
				ou_free(to_free->output_pins[i]->output_pin_related_input_index);
				ou_free(to_free->output_pins[i]);
			}
		}
		ou_free(to_free->output_pins);
	}

	if(to_free->num_output_ports != 0)
	{
		for (i = 0; i < to_free->num_output_ports; i++)
		{
			if (to_free->output_ports[i]->num_is_fanout_bus != 0)
			{
				ou_free(to_free->output_ports[i]->is_fanout_bus);
			}
		}
		ou_free(to_free->output_ports);
	}

	/* Fill these spots in with a value so we can see that if we try to use this memory later then it will 
	 * have values that describe when it got delete, and this might give us a hint */
	to_free->node_type = debug_val;
	to_free->input_pins = (node_input_pin_t**)debug_val;
	to_free->num_input_pins = debug_val;
	to_free->output_pins = (node_output_pin_t**)debug_val;
	to_free->num_output_pins = debug_val;
	to_free->unique_name = (char*)debug_val;
	to_free->mark_number = debug_val;
	to_free->mark_number_live = debug_val;
	to_free->level_count = debug_val;
	to_free->level_value = debug_val;
	to_free->is_partial_mapped_bound = debug_val;
	to_free->tfe_id_mark = debug_val;

#ifndef ALLOCATION_COUNT_MACRO // Do this so we can see the node info on errors
	ou_free(to_free);
#endif
}

int unique_node_id = 0;
/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_library_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_library_node(cell_t *cell, int library_index, char *name)
{
	node_t *created_node;
	int i;
	defined_cell_t *cast_cell = (defined_cell_t*)cell;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = LIBRARY_NODE;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "%s_%d", name, unique_node_id);
	created_node->generated_from_name = ou_strdup(name, HETS_NODE_UTILS);
	unique_node_id ++;

	created_node->n_t.library_node.cell_index = cast_cell->cell_index;
	created_node->n_t.library_node.cell = cell;

	/* determine the number of pins */
	created_node->num_output_pins = current_library[library_index].num_output_ports;
	created_node->num_output_ports = current_library[library_index].num_output_ports;
	created_node->num_input_pins = current_library[library_index].ports - created_node->num_output_pins;
	created_node->num_input_ports = current_library[library_index].ports - created_node->num_output_pins;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	/* set port information */
	for (i = 0; i < created_node->num_input_ports; i++)
	{
		onu_set_input_port_is_bus(created_node->input_ports[i], TRUE);
		onu_set_input_port_width(created_node->input_ports[i], 1);
	}

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_gate_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_gate_node(int cell_index, int size_input, int size_output, char *name)
{
	node_t *created_node;
	int i;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = LIBRARY_NODE;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "%s_%d", name, unique_node_id);
	unique_node_id ++;

	created_node->n_t.library_node.cell_index = cell_index;

	/* determine the number of pins */
	created_node->num_output_pins = size_output;
	created_node->num_output_ports = size_output;
	created_node->num_input_pins = size_input;
	created_node->num_input_ports = size_input;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins);
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	/* set port information */
	for (i = 0; i < created_node->num_input_ports; i++)
	{
		onu_set_input_port_is_bus(created_node->input_ports[i], TRUE);
		onu_set_input_port_width(created_node->input_ports[i], 1);
	}

	return created_node;
}
/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_library_node_ff)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_library_node_ff(cell_t *cell, int library_index, char *name, int ff_index)
{
	node_t *created_node;
	defined_cell_t *cast_cell = (defined_cell_t*)cell;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = LIBRARY_NODE_FF;

	created_node->n_t.library_node.cell = cell;
	created_node->n_t.library_node_ff.ff_index = ff_index;
	created_node->n_t.library_node_ff.cell_index = cast_cell->cell_index;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "%s_%d", name, unique_node_id);
	created_node->generated_from_name = ou_strdup(name, HETS_NODE_UTILS);
	unique_node_id ++;

	/* determine the number of pins */
	created_node->num_output_pins = current_library[library_index].num_output_ports;
	created_node->num_output_ports = current_library[library_index].num_output_ports;
	created_node->num_input_pins = current_library[library_index].ports - created_node->num_output_pins;
	created_node->num_input_ports = current_library[library_index].ports - created_node->num_output_pins;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	/* set port information */
	onu_set_input_port_is_bus(created_node->input_ports[0], TRUE);
	onu_set_input_port_width(created_node->input_ports[0], 1);
	onu_set_input_port_is_bus(created_node->input_ports[1], TRUE);
	onu_set_input_port_width(created_node->input_ports[1], 1);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_macro_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_macro_node(cell_t *cell, char *name)
{
	node_t *created_node;
	generated_cell_t* cell_cast = (generated_cell_t*)cell;

	D0(fprintf(out, "onu_hetero_node cell def: %s\neFn_hetero_node cell ins: %s\neFn_hetero_node name %s\n", cell_cast->cell_definition_name, cell_cast->cell_instance_name, name););

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.tree_marked = -1;
	created_node->n_t.hetero_node.constant_portA = -1;
	created_node->n_t.hetero_node.constant_portB = -1;
	created_node->n_t.hetero_node.hetero_node_type = cell_cast->macro_cell_type;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 7 + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "hetero_%s_%d", name, unique_node_id);
	created_node->generated_from_name = ou_strdup(name, HETS_NODE_UTILS);
	unique_node_id ++;

	created_node->num_output_pins = cell_cast->num_cells_output_ports;
	created_node->num_input_pins = cell_cast->num_cells_input_ports;
	created_node->num_output_ports = cell_cast->num_output_ports;
	created_node->num_input_ports = cell_cast->num_input_ports;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	if (cell_cast->macro_cell_type == MN_MULT)
	{
		/* IF - this is a multiplier node then add it to a list so we can quickly access multipliers */
		ohu_add_mult_node_to_list (created_node);
	}
	else if ((cell_cast->macro_cell_type == MN_ADD) || (cell_cast->macro_cell_type == MN_SUB))
	{
		/* IF - this is an adder or subtractor node then add to a list for quick access */
		ohu_add_add_sub_node_to_list (created_node);
	}

	created_node->n_t.hetero_node.width = cell_cast->width;
	created_node->n_t.hetero_node.width_a = cell_cast->width_a;
	created_node->n_t.hetero_node.width_b = cell_cast->width_b;
	created_node->n_t.hetero_node.width_c_also_shift_size = cell_cast->width_c_also_shift_size;

	/* initialize the ports based on size of port list */
	if (created_node->num_input_ports > 0)
	{
		onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
		onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	}
	if (created_node->num_input_ports > 1)
	{
		onu_set_input_port_is_bus(created_node->input_ports[1], FALSE);
		onu_set_input_port_width(created_node->input_ports[1], created_node->n_t.hetero_node.width_b);
	}
	if (created_node->num_input_ports > 2)
	{
		onu_set_input_port_is_bus(created_node->input_ports[2], FALSE);
		onu_set_input_port_width(created_node->input_ports[2], created_node->n_t.hetero_node.width_c_also_shift_size);
	}
	if (created_node->num_input_ports > 3)
	{
		assert(FALSE);
	}

	if (created_node->num_output_ports > 0)
	{
		onu_add_output_port_fanout(created_node->output_ports[0]);
		onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
		onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);
	}
	if (created_node->num_output_ports > 1)
	{
		assert(FALSE);
	}
	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_macro_node_for_match)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_macro_node_for_match (short macro_type, 
											int size_input,
											int *size_input_ports, 
											int num_input_ports, 
											int size_output, 
											int *size_output_ports, 
											short *fanout_output_ports, 
											int num_output_ports, 
											char *name)
{
	node_t *created_node;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.tree_marked = -1;
	created_node->n_t.hetero_node.constant_portA = -1;
	created_node->n_t.hetero_node.constant_portB = -1;
	created_node->n_t.hetero_node.hetero_node_type = macro_type;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 7 + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "hetero_%s_%d", name, unique_node_id);
	unique_node_id ++;


	/* these hetero devices don't have multiple spanning instances */
	created_node->num_output_pins = size_output;
	created_node->num_output_ports = num_output_ports;
	created_node->num_input_pins = size_input;
	created_node->num_input_ports = num_input_ports;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	created_node->n_t.hetero_node.width = size_output;

	created_node->n_t.hetero_node.width_a = 0; 
	created_node->n_t.hetero_node.width_b = 0;
	created_node->n_t.hetero_node.width_c_also_shift_size = 0;

	/* initialize the ports based on size of port list */
	if (num_input_ports > 0)
	{
		created_node->n_t.hetero_node.width_a = size_input_ports[0]; 
		onu_set_input_port_is_bus(created_node->input_ports[0], TRUE);
		onu_set_input_port_width(created_node->input_ports[0], size_input_ports[0]);
	}
	if (num_input_ports > 1)
	{
		created_node->n_t.hetero_node.width_b = size_input_ports[1];
		onu_set_input_port_is_bus(created_node->input_ports[1], TRUE);
		onu_set_input_port_width(created_node->input_ports[1], size_input_ports[1]);
	}
	if (num_input_ports > 2)
	{
		created_node->n_t.hetero_node.width_c_also_shift_size = size_input_ports[2];
		onu_set_input_port_is_bus(created_node->input_ports[2], TRUE);
		onu_set_input_port_width(created_node->input_ports[2], size_input_ports[2]);
	}
	if (num_input_ports > 3)
	{
		assert(FALSE);
	}

	if (num_output_ports > 0)
	{
		onu_add_output_port_fanout(created_node->output_ports[0]);
		onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
		onu_set_output_port_width(created_node->output_ports[0], size_output);
	}
	if (num_output_ports > 1)
	{
		assert(FALSE);
	}

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_skeleton_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_skeleton_node(char *name, int num_outputs, int num_inputs, int num_input_ports, int num_output_ports)
{
	node_t *created_node;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->n_t.hetero_node.tree_marked = -1;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(strlen(name) + 7 + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "hetero_%s_%d", name, unique_node_id);
	unique_node_id ++;

	/* ELSE - these hetero devices don't have multiple spanning instances */
	created_node->num_output_pins = num_outputs;
	created_node->num_input_pins = num_inputs;
	created_node->num_output_ports = num_output_ports;
	created_node->num_input_ports = num_input_ports;

	/* allocate spots accordingly based on the number of input and output ports */
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	/* initialize all of them to nothing */
	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	/* initialize all the ports to nothing */
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_input_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_input_node(cell_ports_t* cell_port, int index)
{
	node_t *created_node;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = INPUT_NODE;

	/* record the port this was generated from */
	created_node->n_t.input_node.port_string = ou_strdup(ou_flatten_odin_name(oEgu_generate_port_signal_string(cell_port)), HETS_NODE_UTILS);
	created_node->n_t.input_node.pin_id = cell_port->pin_id;
	created_node->n_t.input_node.index_in_input_list = index;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(2 + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "IN_%d", unique_node_id);
	created_node->generated_from_name = ou_strdup(ou_flatten_odin_name(oEgu_generate_port_signal_string(cell_port)), HETS_NODE_UTILS);
	unique_node_id ++;

	/* create one output port */
	created_node->num_output_pins = 1;
	created_node->num_output_ports = 1;
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);
	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_output_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_output_node(cell_ports_t* cell_port)
{
	node_t *created_node;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = OUTPUT_NODE;

	/* record the port this was generated from */
	created_node->n_t.output_node.port_string = ou_strdup(ou_flatten_odin_name(oEgu_generate_port_signal_string(cell_port)), HETS_NODE_UTILS);
	created_node->n_t.output_node.pin_id = cell_port->pin_id;

	/* create a unique name for library cells based on name + unique_id */
	created_node->unique_name = (char*)ou_malloc(3 + 1 + 10 + 1, HETS_NODE_UTILS);
	sprintf(created_node->unique_name, "OUT_%d", unique_node_id);
	created_node->generated_from_name = ou_strdup(ou_flatten_odin_name(oEgu_generate_port_signal_string(cell_port)), HETS_NODE_UTILS);
	unique_node_id ++;

	/* create one output port */
	created_node->num_input_pins = 1;
	created_node->num_input_ports = 1;
	created_node->input_pins = (node_input_pin_t**)ou_malloc(sizeof(node_input_pin_t*)*created_node->num_input_pins, HETS_NODE_UTILS);	
	created_node->input_ports = (node_input_port_t**)ou_malloc(sizeof(node_input_port_t*)*created_node->num_input_ports, HETS_NODE_UTILS);	

	onu_initialize_input_pins(created_node->input_pins, created_node->num_input_pins );
	onu_initialize_input_ports(created_node->input_ports, created_node->num_input_ports);

	/* add to the list of output nodes */
	output_nodes = (node_t**)ou_realloc(output_nodes, sizeof(node_t*)*(num_output_nodes+1), HETS_NODE_UTILS);
	output_nodes[num_output_nodes] = created_node;
	/* record index */
	created_node->n_t.output_node.index_in_output_list = num_output_nodes;
	/* increment the current size of the list */
	num_output_nodes++;

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_allocate_1or0_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_allocate_1or0_node(int is_gnd)
{
	node_t *created_node;

	/* allocate the node */
	created_node = onu_allocate_node();

	/* record the internal information */
	created_node->node_type = VCC_GND_NODE;

	created_node->n_t.vcc_gnd_node.name = (char*)ou_malloc(4, HETS_NODE_UTILS);
	if (is_gnd == TRUE)
	{
		sprintf(created_node->n_t.vcc_gnd_node.name, "gnd");
	}
	else
	{
		sprintf(created_node->n_t.vcc_gnd_node.name, "vcc");
	}
	
	/* create one output port */
	created_node->num_output_pins = 1;
	created_node->num_output_ports = 1;
	created_node->output_pins = (node_output_pin_t**)ou_malloc(sizeof(node_output_pin_t*)*created_node->num_output_pins, HETS_NODE_UTILS);	
	created_node->output_ports = (node_output_port_t**)ou_malloc(sizeof(node_output_port_t*)*created_node->num_output_ports, HETS_NODE_UTILS);	

	onu_initialize_output_ports(created_node->output_ports, created_node->num_output_ports);
	onu_initialize_output_pins(created_node->output_pins, created_node->num_output_pins);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_add_a_ff_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_add_a_register_node_to_ff_list(node_t *node_to_add)
{
	/* ou_realloc the output pin to hold another pointer */
	ff_node = (node_t**)ou_realloc(ff_node, sizeof(node_t*) * (num_ff_nodes + 1), HETS_NODE_UTILS);

	ff_node[num_ff_nodes] = node_to_add;
	num_ff_nodes ++;

	return ff_node[num_ff_nodes - 1];
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_add_a_ff_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_add_a_ff_node(cell_t *cell, int library_index, char *name)
{
	/* ou_realloc the output pin to hold another pointer */
	ff_node = (node_t**)ou_realloc(ff_node, sizeof(node_t*) * (num_ff_nodes + 1), HETS_NODE_UTILS);

	((defined_cell_t*)cell)->node_to = ff_node[num_ff_nodes] = onu_allocate_library_node_ff(cell, library_index, name, num_ff_nodes);
	num_ff_nodes ++;

	return ff_node[num_ff_nodes - 1];
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_add_output_pointer_to_node)
 *-------------------------------------------------------------------------------------------*/
int onu_add_output_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int output_pin_index, int input_pin_index)
{
	assert (the_pointer_node != NULL);

	/* ou_realloc the output pin to hold another pointer */
	the_node->output_pins[output_pin_index]->output_nodes = 
		(node_t**)ou_realloc(the_node->output_pins[output_pin_index]->output_nodes, sizeof(node_t*) * (the_node->output_pins[output_pin_index]->num_output_pins_level_2+1), HETS_NODE_UTILS);
	the_node->output_pins[output_pin_index]->output_pin_related_input_index = 
		(int*)ou_realloc(the_node->output_pins[output_pin_index]->output_pin_related_input_index, sizeof(int) * (the_node->output_pins[output_pin_index]->num_output_pins_level_2+1), HETS_NODE_UTILS);

	/* add the info */
	the_node->output_pins[output_pin_index]->output_nodes[the_node->output_pins[output_pin_index]->num_output_pins_level_2] = the_pointer_node;
	the_node->output_pins[output_pin_index]->output_pin_related_input_index[the_node->output_pins[output_pin_index]->num_output_pins_level_2] = input_pin_index;

	D0(fprintf(log_file, "node:%s now has new output node %s on [%d][%d]\n", the_node->unique_name, 
			   																the_node->output_pins[output_pin_index]->output_nodes[the_node->output_pins[output_pin_index]->num_output_pins_level_2]->unique_name,
																			output_pin_index,
																			the_node->output_pins[output_pin_index]->num_output_pins_level_2););

	the_node->output_pins[output_pin_index]->num_output_pins_level_2++;

	return (the_node->output_pins[output_pin_index]->num_output_pins_level_2 - 1);
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_output_pins_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_get_output_pins_node(node_output_pin_t *output_pin, int index)
{
	return output_pin->output_nodes[index];
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_output_pins_related_output_port)
 *-------------------------------------------------------------------------------------------*/
int onu_get_output_pins_related_output_port(node_output_pin_t *output_pin, int index)
{
	return output_pin->output_pin_related_input_index[index];
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_output_pins_related_output_port_array_index)
 *-------------------------------------------------------------------------------------------*/
int onu_get_output_pins_related_num_level_2(node_output_pin_t *output_pin)
{
	return output_pin->num_output_pins_level_2;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_output_pins_related_output_port_array_index)
 *-------------------------------------------------------------------------------------------*/
short onu_get_output_pins_is_output_propogated(node_output_pin_t *output_pin)
{
	return output_pin->is_output_propogated;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_set_output_pointer_to_node)
 *-------------------------------------------------------------------------------------------*/
void onu_set_output_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int output_pin_index, int output_pin_index_array_index, int input_pin_index)
{
	/* add the info */
	the_node->output_pins[output_pin_index]->output_nodes[output_pin_index_array_index] = the_pointer_node;
	the_node->output_pins[output_pin_index]->output_pin_related_input_index[output_pin_index_array_index] = input_pin_index;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_input_pins_node)
 *-------------------------------------------------------------------------------------------*/
node_t *onu_get_input_pins_node(node_input_pin_t *input_pin)
{
	return input_pin->input_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_input_pins_related_output_port)
 *-------------------------------------------------------------------------------------------*/
int onu_get_input_pins_related_output_port(node_input_pin_t *input_pin)
{
	return input_pin->input_pins_related_output_port;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_get_input_pins_related_output_port_array_index)
 *-------------------------------------------------------------------------------------------*/
int onu_get_input_pins_related_output_port_array_index(node_input_pin_t *input_pin)
{
	return input_pin->input_pins_related_output_port_index;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_set_input_pointer_to_node)
 *-------------------------------------------------------------------------------------------*/
void onu_set_input_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int input_pin_index, int output_pin_index, int output_pin_index_array_index)
{
	the_node->input_pins[input_pin_index]->input_node = the_pointer_node;
	the_node->input_pins[input_pin_index]->input_pins_related_output_port = output_pin_index;
	the_node->input_pins[input_pin_index]->input_pins_related_output_port_index = output_pin_index_array_index;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_initialize_input_pins)
 *-------------------------------------------------------------------------------------------*/
void onu_initialize_input_pins(node_input_pin_t **input_pin, int num_input_pins)
{
	int i;

	for (i = 0; i < num_input_pins; i++)
	{
		input_pin[i] = (node_input_pin_t*)ou_malloc_struct(sizeof(node_input_pin_t), HETS_NODE_UTILS);
		input_pin[i]->input_node = NULL;	
		input_pin[i]->input_pins_related_output_port = INITIALIZED; // describes the output port
		input_pin[i]->input_pins_related_output_port_index = INITIALIZED; // describes where this instance appears in the fanout list (outputs can drive multiple inputs)
		input_pin[i]->input_propogation_value_x_0_1 = INITIALIZED;
		input_pin[i]->port_who_added = NULL;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_initialize_output_pins)
 *-------------------------------------------------------------------------------------------*/
void onu_initialize_output_pins(node_output_pin_t **output_pin, int num_output_pins)
{
	int i;

	for (i = 0; i < num_output_pins; i++)
	{
		output_pin[i] = (node_output_pin_t*)ou_malloc_struct(sizeof(node_output_pin_t), HETS_NODE_UTILS);
		output_pin[i]->is_output_propogated = FALSE;
		output_pin[i]->output_nodes = NULL;
		output_pin[i]->output_pin_related_input_index = NULL;
		output_pin[i]->num_output_pins_level_2 = 0;
		output_pin[i]->port_who_added = NULL;
	}	
}

/*---------------------------------------------------------------------------------------------
 * (function:  onu_add_output_port_fanout)
 *-------------------------------------------------------------------------------------------*/
void onu_add_output_port_fanout(node_output_port_t *output_port)
{
	output_port->is_fanout_bus = (short*)ou_realloc(output_port->is_fanout_bus, sizeof(short)*(output_port->num_is_fanout_bus + 1), HETS_NODE_UTILS);
	output_port->is_fanout_bus[output_port->num_is_fanout_bus] = FALSE;
	output_port->num_is_fanout_bus ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_set_output_port_width)
 *-------------------------------------------------------------------------------------------*/
void onu_set_output_port_width(node_output_port_t *output_port, int width)
{
	output_port->width = width;
}

/*---------------------------------------------------------------------------------------------
 * (function:  onu_set_output_port_is_bus)
 *-------------------------------------------------------------------------------------------*/
void onu_set_output_port_is_bus(node_output_port_t *output_port, int idx, short is_bus)
{
	output_port->is_fanout_bus[idx] = is_bus; // TRUE or FALSE
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_initialize_output_ports)
 *-------------------------------------------------------------------------------------------*/
void onu_initialize_output_ports(node_output_port_t **output_port, int num_output_ports)
{
	int i;

	for (i = 0; i < num_output_ports; i++)
	{
		output_port[i] = (node_output_port_t*)ou_malloc_struct(sizeof(node_output_port_t), HETS_NODE_UTILS);
		output_port[i]->is_fanout_bus = NULL;
		output_port[i]->num_is_fanout_bus = 0;
		output_port[i]->width = -1;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function:  onu_set_input_port_is_bus)
 *-------------------------------------------------------------------------------------------*/
void onu_set_input_port_is_bus(node_input_port_t *input_port, short is_bus)
{
	input_port->is_bus = is_bus; // TRUE or FALSE
}

/*---------------------------------------------------------------------------------------------
 * (function:  onu_set_input_port_width)
 *-------------------------------------------------------------------------------------------*/
void onu_set_input_port_width(node_input_port_t *input_port, int width)
{
	input_port->width = width;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_initialize_input_ports)
 *-------------------------------------------------------------------------------------------*/
void onu_initialize_input_ports(node_input_port_t **input_port, int num_input_ports)
{
	int i;

	for (i = 0; i < num_input_ports; i++)
	{
		input_port[i] = (node_input_port_t*)ou_malloc_struct(sizeof(node_input_port_t), HETS_NODE_UTILS);
		input_port[i]->is_bus = FALSE;
		input_port[i]->width = -1;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_bypass_a_node)
 *  This function takes the current_node and one of its inputs, and redirects it to 
 *  a specified output of the same current node.  Essentially vypassing the node.
 *  	This process is
 *
 *  	input <-> current <-> fan_out_node1
 *  					  <-> fan_out_node2
 *  					  ...
 *
 *  	changes to <-> fan_out_node1
 *  			   <-> fan_out_node2
 *  			   ...
 *-------------------------------------------------------------------------------------------*/
#if 0
void onu_bypass_a_node(node_t *current_node, int input_index, int output_index)
{
	/* record the stuff about the input node we want to change */
	node_t *input_node = onu_get_input_pins_node(current_node->input_pins[input_index]);
	int input_pins_src_port = onu_get_input_pins_related_output_port(current_node->input_pins[input_index]);
	int input_pins_src_port_index = onu_get_input_pins_related_output_port_array_index(current_node->input_pins[input_index]);

	D0(fprintf(log_file, "Current node:%s input port:[%d] to output port[%d] || ", current_node->unique_name, input_index, output_index);); 
	D0(fprintf(log_file, "Bypassing node:%s output port:[%d][%d] with size:%d\n", input_node->unique_name, input_pins_src_port, input_pins_src_port_index, 
			   																	onu_get_output_pins_related_output_port(input_node->num_output_pins_level_2[input_pins_src_port])););

	/* add the outputs of current_node[output_index] to the outputs of input_node[input_index] and point back the output fan out nodes back to 
	 * the new input node.  NOTE: we skip 0 since we will reuse the spot that we are changing. */
	onu_copy_output_port(input_node, current_node, input_pins_src_port, output_index);

	if (onu_get_output_pins_related_num_level_2(current_node->output_pins[output_index]) > 0)
	{
		/* IF - there are lots of outputs, then we need to consider what to do with the output that points to this node */

		D0(fprintf(log_file, "	swapping port point: %s index:%d to input_node\n", onu_get_output_pins_node(current_node->output_pins[output_index], 0)->unique_name, onu_get_output_pins_related_output_port(current_node->output_pins[output_index], 0)););

		/* overwrite the spot that originally pointed to current_node */
		input_node->output_pins[input_pins_src_port]->output_nodes[input_pins_src_port_index] = current_node->output_pins[output_index]->output_nodes[0];
		input_node->output_pins[input_pins_src_port]->output_pin_related_input_index[input_pins_src_port_index] = current_node->output_pins[output_index]->output_pin_related_input_index[0];
	
		/* now change that input port to point to this output */
		onu_set_input_pointer_to_node(onu_get_output_pins_node(current_node->output_pins[output_index], 0), 
									input_node, 
									onu_get_output_pins_related_output_port(current_node->output_pins[output_index], 0), 
									input_pins_src_port, 
									input_pins_src_port_index);
	}
	else
	{
		D0(fprintf(log_file, "	special case remove pointer since no current_node->output_pins[output_index]"););

		/* ELSE - there is nothing to point to so delete this entry */
		onu_remove_output_pointer_to_node(input_node, input_pins_src_port, input_pins_src_port_index);
	}
	
	/* there are lots of outputs, then we need to consider what to do with the output that points to this node */
//	onu_remove_output_pointer_to_node(input_node, input_pins_src_port, input_pins_src_port_index);
}
#endif
void onu_bypass_a_node(node_t *macro_node, int input_pin, int output_pin)
{
	int j;
	int returned_index;
	node_t *input_node = onu_get_input_pins_node(macro_node->input_pins[input_pin]);
	int input_pins_src_port = onu_get_input_pins_related_output_port(macro_node->input_pins[input_pin]);
	int input_pins_src_port_index = onu_get_input_pins_related_output_port_array_index(macro_node->input_pins[input_pin]);
	int atleast_one = FALSE;

	for (j = 0; j < onu_get_output_pins_related_num_level_2(macro_node->output_pins[output_pin]); j++)
	{
		if (onu_get_output_pins_node(macro_node->output_pins[output_pin], j) != NULL)
		{
			atleast_one = TRUE;

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
											input_pins_src_port,
											returned_index);

			macro_node->output_pins[output_pin]->output_nodes[j] = NULL;
			macro_node->output_pins[output_pin]->output_pin_related_input_index[j] = 0;
		}
	}

	/* clear all the infor for the ouput and input pins */
	macro_node->output_pins[output_pin]->num_output_pins_level_2 = 0;

	macro_node->input_pins[input_pin]->input_node = NULL;
	macro_node->input_pins[input_pin]->input_pins_related_output_port = 0;
	macro_node->input_pins[input_pin]->input_pins_related_output_port_index = 0;

	if (atleast_one == FALSE)
	{
		/* IF - there is nothing to remap the input port then we need to delete the output */
		onu_remove_output_pointer_to_node(input_node, input_pins_src_port, input_pins_src_port_index);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_update_size_of_input_ports)
 *-------------------------------------------------------------------------------------------*/
void onu_update_size_of_input_ports(node_t *current_node, int new_size)
{
	if (new_size == 0)
	{
		ou_free(current_node->input_pins);
	}
	else
	{
		current_node->input_pins = (node_input_pin_t**)ou_realloc(current_node->input_pins, sizeof(node_input_pin_t*)*new_size, HETS_NODE_UTILS);
	}
	current_node->num_input_pins = new_size;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_update_size_of_output_ports)
 *-------------------------------------------------------------------------------------------*/
void onu_update_size_of_output_ports(node_t *current_node, int new_size)
{
	int i;

	if (new_size == 0)
	{
		if(current_node->num_output_pins != 0)
		{
			for (i = 0; i < current_node->num_output_pins; i++)
			{
				if (onu_get_output_pins_related_num_level_2(current_node->output_pins[i]) != 0)
				{
					ou_free(current_node->output_pins[i]->output_pin_related_input_index);
					ou_free(current_node->output_pins[i]);
				}
			}
			ou_free(current_node->output_pins);
		}
	}
	else
	{
		current_node->output_pins = (node_output_pin_t**)ou_realloc(current_node->output_pins, sizeof(node_output_pin_t*)*new_size, HETS_NODE_UTILS);
	}
	current_node->num_output_pins = new_size;
	current_node->output_ports[0]->width = new_size;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_remap_input_port)
 *-------------------------------------------------------------------------------------------*/
void onu_remap_input_port(node_t *to, node_t *from, int index_to, int index_from)
{
	/* copy the details, and then makesure that the point from the node is to the remapped node */
	onu_set_input_pointer_to_node(to,
									onu_get_input_pins_node(from->input_pins[index_from]), 
									index_to,
									onu_get_input_pins_related_output_port(from->input_pins[index_from]),
									onu_get_input_pins_related_output_port_array_index(from->input_pins[index_from]));
	to->input_pins[index_to]->input_propogation_value_x_0_1 = from->input_pins[index_from]->input_propogation_value_x_0_1;

	onu_set_output_pointer_to_node(onu_get_input_pins_node(to->input_pins[index_to]), 
									to, 
									onu_get_input_pins_related_output_port(to->input_pins[index_to]),
									onu_get_input_pins_related_output_port_array_index(to->input_pins[index_to]), 
									index_to);
#if 0
	/* remap the output port */
	to->input_pins[index_to]->input_node->output_pins[onu_get_input_pins_related_output_port(to->input_pins[index_to])]->output_nodes[onu_get_input_pins_related_output_port_array_index(to->input_pins[index_to])] = to;
	to->input_pins[index_to]->input_node->output_pins[onu_get_input_pins_related_output_port(to->input_pins[index_to])]->output_pin_related_input_index[onu_get_input_pins_related_output_port_array_index(to->input_pins[index_to])] = index_to;
#endif
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_copy_output_port)
 *-------------------------------------------------------------------------------------------*/
void onu_copy_output_port(node_t *to, node_t *from, int index_to, int index_from)
{
	int j;
	int returned_index;

	/* remap an ouput index port to a new node */
	for (j = 0; j < onu_get_output_pins_related_num_level_2(from->output_pins[index_from]); j++)
	{
		if (onu_get_output_pins_node(from->output_pins[index_from], j) != NULL)
		{
			D0(fprintf(log_file, "	moving port point: %s index:%d to input_node\n", onu_get_output_pins_node(from->output_pins[index_from], j)->unique_name, onu_get_output_pins_related_output_port(current_node->output_pins[index_from], j)););

			/* add new output node to the new input node */
			returned_index = onu_add_output_pointer_to_node(to, 
											onu_get_output_pins_node(from->output_pins[index_from], j), 
											index_to, 
											onu_get_output_pins_related_output_port(from->output_pins[index_from], j));

			/* now change that input port to point to this output */
			onu_set_input_pointer_to_node(from->output_pins[index_from]->output_nodes[j],
									to,
									onu_get_output_pins_related_output_port(from->output_pins[index_from], j),
									index_to,
									returned_index);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_remove_node_from_relevant_lists)
 *-------------------------------------------------------------------------------------------*/
void onu_remove_node_from_relevant_lists(node_t *to_remove)
{
	switch (to_remove->node_type) 
	{
		case INPUT_NODE:
		{
			/* Input node needs to removed from the input_nodes list */
			input_nodes[to_remove->n_t.input_node.index_in_input_list] = NULL;
			break;
		}
		case OUTPUT_NODE:
		{
			/* Output node needs to removed from the output_nodes list */
			output_nodes[to_remove->n_t.output_node.index_in_output_list] = NULL;
			break;
		}
		case LIBRARY_NODE_FF:
		{
			ff_node[to_remove->n_t.library_node_ff.ff_index] = NULL;
			break;
		}
		case MACRO_NODE:
		{
			if (to_remove->n_t.hetero_node.hetero_node_type == MN_MULT)
			{
				/* IF - this is a multiplier */
				if (mult_list != NULL)
				{
					/* IF - the multiply list still exists */
					mult_list[to_remove->n_t.hetero_node.index_for_global_list] = NULL;
				}
			}
			else if ((to_remove->n_t.hetero_node.hetero_node_type == MN_ADD)
			 		|| (to_remove->n_t.hetero_node.hetero_node_type == MN_SUB))
			{
				/* IF - this is a add related item */	
				if (add_sub_list != NULL)
				{
					/* IF - the addsub list exists */
					add_sub_list[to_remove->n_t.hetero_node.index_for_global_list] = NULL;
				}
			}
			else if ((to_remove->n_t.hetero_node.hetero_node_type == MN_CASE)
					|| (to_remove->n_t.hetero_node.hetero_node_type == MN_STATE_CASE) 
					|| (to_remove->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) 
					|| (to_remove->n_t.hetero_node.hetero_node_type == MN_IF))
			{
				if (if_and_case_list != NULL)
				{
					if_and_case_list[to_remove->n_t.hetero_node.index_for_global_list] = NULL;
				}
			}
					
			break;
		}
		case LIBRARY_NODE:
		case VCC_GND_NODE:
			break;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_remove_nodes_links)
 * 	NOTE: currently this is used in liveness check only.  Cause removal of an input link
 * 	will probably cause other bits of code to segfault.  We can assume no problem here since
 * 	any of this nodes output links should also lead to dead nodes.
 *-------------------------------------------------------------------------------------------*/
void onu_remove_nodes_links(node_t *the_node)
{
	int i, j;

	/* remove the input links */
	for (i = 0; i < the_node->num_input_pins; i++)
	{
		if (the_node->input_pins[i]->input_node != NULL)
		{
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(the_node->input_pins[i]), 
											onu_get_input_pins_related_output_port(the_node->input_pins[i]), 
											onu_get_input_pins_related_output_port_array_index(the_node->input_pins[i]));
		}
	}

	/* remove the output links */
	for (i = 0; i < the_node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(the_node->output_pins[i]); j++)
		{
			if(onu_get_output_pins_node(the_node->output_pins[i], j) != NULL)
			{
				D0(fprintf(log_file, "Removing this %s's output_pins[%d][%d] and updating %s's inputs[%d]\n", the_node->unique_name, i, j,
																				onu_get_output_pins_node(the_node->output_pins[i], j)->unique_name,
																				onu_get_output_pins_related_output_port(the_node->output_pins[i], j)););

				assert(onu_get_output_pins_node(the_node->output_pins[i], j)->input_pins[onu_get_output_pins_related_output_port(the_node->output_pins[i], j)]->input_node == the_node);
				
				/* update that nodes references to 0 */
				onu_set_input_pointer_to_node(onu_get_output_pins_node(the_node->output_pins[i], j),
									NULL,
									onu_get_output_pins_related_output_port(the_node->output_pins[i], j),
									-1,
									-1);

				the_node->output_pins[i]->output_nodes[j] = NULL;
				the_node->output_pins[i]->output_pin_related_input_index[j] = -1;
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_delete_output_entry)
 *-------------------------------------------------------------------------------------------*/
void onu_remove_output_pointer_to_node(node_t *the_node, int output_pin_index, int output_pin_index_array_index)
{
	int current_output_size = onu_get_output_pins_related_num_level_2(the_node->output_pins[output_pin_index]);
	int old_input_index,  swap_input_index;
	node_t *old_input_node, *swap_input_node;

	assert(current_output_size > 0);

	D0(fprintf(log_file, "Removing complete entry node:%s[%d][%d] output pin to node:%s on port[%d]\n", the_node->unique_name, 
																				output_pin_index,
																				output_pin_index_array_index,
																				onu_get_output_pins_node(the_node->output_pins[output_pin_index], output_pin_index_array_index)->unique_name,
																				onu_get_output_pins_related_output_port(the_node->output_pins[output_pin_index], output_pin_index_array_index)););

	if (current_output_size > 1)
	{
		/* IF - this output has more than one output left at this level, then do a swap with last */ 

		if (output_pin_index_array_index != current_output_size - 1)
		{
			/* IF - the entry to be moved is not in the last spot */

			/* update the related input port with the new details for the swapped output */
			old_input_node = onu_get_output_pins_node(the_node->output_pins[output_pin_index], output_pin_index_array_index);
			old_input_index = onu_get_output_pins_related_output_port(the_node->output_pins[output_pin_index], output_pin_index_array_index);
			swap_input_node = onu_get_output_pins_node(the_node->output_pins[output_pin_index], current_output_size - 1);
			swap_input_index = onu_get_output_pins_related_output_port(the_node->output_pins[output_pin_index], current_output_size - 1);

			/* delete the info in the old */
			onu_set_input_pointer_to_node(old_input_node,
									NULL,
									old_input_index,
									-1,
									-1);

			/* swap the input info in.  input_pins[] and input_pins_related_output_port[] don't change */
			swap_input_node->input_pins[swap_input_index]->input_pins_related_output_port_index = output_pin_index_array_index;
			
			/* now do the internal swap */
			the_node->output_pins[output_pin_index]->output_nodes[output_pin_index_array_index] = swap_input_node;
			the_node->output_pins[output_pin_index]->output_pin_related_input_index[output_pin_index_array_index] = swap_input_index;
		}

		/* realloc the output_pins_list */
		the_node->output_pins[output_pin_index]->output_nodes = (node_t**)ou_realloc(the_node->output_pins[output_pin_index]->output_nodes, sizeof(node_t*)*(onu_get_output_pins_related_num_level_2(the_node->output_pins[output_pin_index]) - 1), HETS_NODE_UTILS);
	}
	else if (onu_get_output_pins_related_num_level_2(the_node->output_pins[output_pin_index]) == 1)
	{
		the_node->output_pins[output_pin_index]->output_nodes = NULL;
	}
	
	/* decrement the number of output pins being used */
	the_node->output_pins[output_pin_index]->num_output_pins_level_2 --;
}


