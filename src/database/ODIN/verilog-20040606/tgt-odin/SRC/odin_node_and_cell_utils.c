
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

/* THis file contains the utility functions that I needed for traversing expressions and statements that created a faltened structure instead
 * of a hierarchical structure.  The main items are the signal list which needs to be searched, joined, added to.  Also, there is functions
 * for initializing nodes of a specific type.
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

#include "odin_node_and_cell_utils.h"
#include "odin_ds1_graph_utils.h"
#include "odin_node_utils.h"
#include "odin_hetero_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_list_structure)
 * 	Initializes the list structure which describes inputs and outputs of elements
 * 	as they coneect to other elements in the graph.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *onacu_init_list_structure()
{
	signal_list_t *list;
	list = (signal_list_t*)ou_malloc_struct(sizeof(signal_list_t), HETS_NODE_AND_CELL_UTILS);

	list->input_signal_list_size = 0;
	list->input_signal_list = NULL;
	list->output_signal_list_size = 0;
	list->output_signal_list = NULL;
	list->is_blocking = INIT;
	list->is_memory = FALSE;

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_list_structure_with_widths)
 * 	Initializes out signal lists for the cases when we know how many inputs and outputs we'll have
 *-------------------------------------------------------------------------------------------*/
void onacu_init_list_structure_with_widths(signal_list_t *list, int input_size, int output_size)
{
	list->input_signal_list_size = input_size;
	list->output_signal_list_size = output_size;

	if (input_size > 0)
	{
		list->input_signal_list = (mixed_signal_t**)ou_malloc(input_size * sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
	}
	else
	{
		list->input_signal_list = NULL;
	}

	if (output_size > 0)
	{
		list->output_signal_list = (mixed_signal_t**)ou_malloc(output_size * sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
	}
	else
	{
		list->output_signal_list = NULL;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_list_outputs
 * 	Update a signal list with the number of outputs.
 *-------------------------------------------------------------------------------------------*/
void onacu_init_list_outputs(signal_list_t *list,  int size)
{
	list->output_signal_list_size = size;

	if (size > 0)
	{
		list->output_signal_list = (mixed_signal_t**)ou_malloc(size * sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
	}
	else
	{
		list->output_signal_list = NULL;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_reinit_outputs_only
 * 	Resizes the number of outputs in a signal list
 *-------------------------------------------------------------------------------------------*/
void onacu_reinit_list_outputs(signal_list_t *list, int new_size)
{
	list->output_signal_list_size = new_size;

	assert (new_size > 0)
	list->output_signal_list = (mixed_signal_t**)ou_realloc(list->output_signal_list, new_size * sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_clean_list_structure)
 *-------------------------------------------------------------------------------------------*/
void onacu_clean_list_structure(signal_list_t *list)
{
	if (list->input_signal_list != NULL)
		ou_free(list->input_signal_list);
	if (list->output_signal_list != NULL)
		ou_free(list->output_signal_list);
	list->input_signal_list_size = 0;
	list->output_signal_list_size = 0;

	ou_free(list);
}

/*---------------------------------------------------------------------------------------------
 * (function:  onacu_lookup_cell_port_in_input_signal_list
 * 	Looks up a specific cell port in a signal list.
 *-------------------------------------------------------------------------------------------*/
short onacu_lookup_cell_port_in_input_signal_list(mixed_signal_t **list, int size,  cell_ports_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == CELL_PORT) && (oEgu_compare_ports(cell_port, list[i]->t.cell_port.cell_port) == TRUE))
		{
			return TRUE;
		}
	 }

	 return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_input_in_input_signal_list
 * 	Looks up a node_input pin in the signal list.  This structure is a type in the second
 * 	flattened data structure.
 *-------------------------------------------------------------------------------------------*/
short onacu_lookup_node_input_in_input_signal_list(mixed_signal_t **list, int size, node_input_pin_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_INPUT) && (onacu_compare_node_input_pins(cell_port, list[i]->t.node_input.node_input) == TRUE))
		{
			return TRUE;
		}
	 }

	 return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_output_in_input_signal_list
 * 	Looks for an output pin (2nd Datastructure) in the signal list.
 *-------------------------------------------------------------------------------------------*/
short onacu_lookup_node_output_in_input_signal_list(mixed_signal_t **list, int size, node_output_pin_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_OUTPUT) && (onacu_compare_node_output_pins(cell_port, list[i]->t.node_output.node_output) == TRUE))
		{
			return TRUE;
		}
	 }

	 return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_input_output_in_input_signal_list
 *-------------------------------------------------------------------------------------------*/
short onacu_lookup_node_input_output_in_signal_input_list(mixed_signal_t **list, int size, node_input_pin_t *cell_port, cell_ports_t *port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_INPUT_OUTPUT) && 
	//			(onacu_compare_node_input_pins(cell_port, list[i]->t.node_input_output.node_input) == TRUE) &&
				(oEgu_compare_ports(port, list[i]->t.node_input_output.cell_port) == TRUE))
		{
			return TRUE;
		}
	 }

	 return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function:  onacu_lookup_cell_port_in_input_signal_list
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_cell_port_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, cell_ports_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == CELL_PORT) && (oEgu_compare_ports(cell_port, list[i]->t.cell_port.cell_port) == TRUE))
		{
			return i;
		}
	 }

	 return -1;
}


/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_input_in_input_signal_list
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_node_input_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, node_input_pin_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_INPUT) && (onacu_compare_node_input_pins(cell_port, list[i]->t.node_input.node_input) == TRUE))
		{
			return i;
		}
	 }

	 return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_output_in_input_signal_list_and_return_index
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_node_output_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, node_output_pin_t *cell_port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_OUTPUT) && (onacu_compare_node_output_pins(cell_port, list[i]->t.node_output.node_output) == TRUE))
		{
			return i;
		}
	 }

	 return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_input_output_in_input_signal_list
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_node_input_output_in_signal_input_list_and_return_index(mixed_signal_t **list, int size, node_input_pin_t *cell_port, cell_ports_t *port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_INPUT_OUTPUT) && 
//				(onacu_compare_node_input_pins(cell_port, list[i]->t.node_input_output.node_input) == TRUE) &&
				(oEgu_compare_ports(port, list[i]->t.node_input_output.cell_port) == TRUE))
		{
			return i;
		}
	 }

	 return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_node_input_output_in_input_signal_list
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_node_input_output_in_signal_input_list_just_cell_port_and_return_index(mixed_signal_t **list, int size, cell_ports_t *port)
{
	 int i;

	 for (i = 0; i < size; i++)
	 {
		if ((list[i]->type == NODE_INPUT_OUTPUT) && (oEgu_compare_ports(port, list[i]->t.node_input_output.cell_port) == TRUE))
		{
			return i;
		}
		else if ((list[i]->type == CELL_PORT) && (oEgu_compare_ports(port, list[i]->t.cell_port.cell_port) == TRUE))
		{
			return i;
		}
	 }

	 return -1;
}


/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_port_in_signal_list
 *-------------------------------------------------------------------------------------------*/
short onacu_lookup_port_in_signal_list(mixed_signal_t **list, int size, mixed_signal_t *signal)
{
	if (signal->type == CELL_PORT)
	{
		return onacu_lookup_cell_port_in_input_signal_list(list, size, signal->t.cell_port.cell_port);
	}
	else if (signal->type == NODE_INPUT)
	{
		return onacu_lookup_node_input_in_input_signal_list(list, size, signal->t.node_input.node_input);
	}
	else if (signal->type == NODE_OUTPUT)
	{
		return onacu_lookup_node_output_in_input_signal_list(list, size, signal->t.node_output.node_output);
	}
	else if (signal->type == NODE_INPUT_OUTPUT)
	{
		return onacu_lookup_node_input_output_in_signal_input_list(list, size, signal->t.node_input_output.node_input, signal->t.node_input_output.cell_port);
	}
	else
	{
		assert(FALSE)
	}

	return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_lookup_port_in_signal_list_and_return_index
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_port_in_signal_list_and_return_index(mixed_signal_t **list, int size, mixed_signal_t *signal)
{
	if (signal->type == CELL_PORT)
	{
		return onacu_lookup_cell_port_in_input_signal_list_and_return_index(list, size, signal->t.cell_port.cell_port);
	}
	else if (signal->type == NODE_INPUT)
	{
		return onacu_lookup_node_input_in_input_signal_list_and_return_index(list, size, signal->t.node_input.node_input);
	}
	else if (signal->type == NODE_OUTPUT)
	{
		return onacu_lookup_node_output_in_input_signal_list_and_return_index(list, size, signal->t.node_output.node_output);
	}
	else if (signal->type == NODE_INPUT_OUTPUT)
	{
		return onacu_lookup_node_input_output_in_signal_input_list_and_return_index(list, size, signal->t.node_input_output.node_input, signal->t.node_input_output.cell_port);
	}
	else
	{
		assert(FALSE)
	}

	return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_look_for_cell_port_match_in_signal_list
 *-------------------------------------------------------------------------------------------*/
int onacu_lookup_for_cell_port_match_in_signal_list(mixed_signal_t **list, int size, mixed_signal_t *signal)
{
	if (signal->type == CELL_PORT)
	{
		return onacu_lookup_cell_port_in_input_signal_list_and_return_index(list, size, signal->t.cell_port.cell_port);
	}
	else if (signal->type == NODE_INPUT_OUTPUT)
	{
		return onacu_lookup_node_input_output_in_signal_input_list_just_cell_port_and_return_index(list, size, signal->t.node_input_output.cell_port);
	}
	else
	{
		assert(FALSE)
	}

	return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_search_for_double_entry_output
 *-------------------------------------------------------------------------------------------*/
int *onacu_search_for_double_entry_output(mixed_signal_t **list, int size)
{
	int i, j;
	int *return_details;
	mixed_signal_t *temp_signal;

	for (i = 0; i < size; i++)
	{
		temp_signal = list[i];

		assert(temp_signal->type == NODE_INPUT_OUTPUT);

		for (j = i+1; j < size; j++)
		{
			if ((list[j]->type == NODE_INPUT_OUTPUT) && 
				(oEgu_compare_ports(temp_signal->t.node_input_output.cell_port, list[j]->t.node_input_output.cell_port) == TRUE))
			{
				return_details = (int*)ou_malloc(sizeof(int)*2, HETS_NODE_AND_CELL_UTILS);
				return_details[0] = i;
				return_details[1] = j;
			}
		}
	}

	return NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_join_inputs_to_input_list
 *-------------------------------------------------------------------------------------------*/
void onacu_join_inputs_to_input_list(signal_list_t *list,  signal_list_t *to_join_list)
{
	int i;

	for (i = 0; i < to_join_list->input_signal_list_size; i++)
	{
		if (onacu_lookup_port_in_signal_list(list->input_signal_list, list->input_signal_list_size, to_join_list->input_signal_list[i]) == FALSE)
		{
			onacu_append_port_to_input_signal_list(list, to_join_list->input_signal_list[i]);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_join_outputs_to_output_list
 *-------------------------------------------------------------------------------------------*/
void onacu_join_outputs_to_output_list(signal_list_t *list,  signal_list_t *to_join_list)
{
	int i;

	for (i = 0; i < to_join_list->output_signal_list_size; i++)
	{
		if (onacu_lookup_port_in_signal_list(list->output_signal_list, list->output_signal_list_size, to_join_list->output_signal_list[i]) == FALSE)
		{
			onacu_append_port_to_output_signal_list(list, to_join_list->output_signal_list[i]);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_mixed_signal_t_from_cell_port
 *-------------------------------------------------------------------------------------------*/
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port(cell_ports_t* port)
{
	mixed_signal_t *ret_signal;

	ret_signal = (mixed_signal_t*)ou_malloc_struct(sizeof(mixed_signal_t), HETS_NODE_AND_CELL_UTILS);
	ret_signal->type = CELL_PORT;
	ret_signal->has_connection = FALSE;
	ret_signal->register_reset = FALSE;
	ret_signal->t.cell_port.cell_port = port;
	ret_signal->t.cell_port.node_output = NULL;

	return ret_signal;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_mixed_signal_t_from_cell_port
 *-------------------------------------------------------------------------------------------*/
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port_and_node_output(cell_ports_t* port, node_output_pin_t *node_output)
{
	mixed_signal_t *ret_signal;

	ret_signal = (mixed_signal_t*)ou_malloc_struct(sizeof(mixed_signal_t), HETS_NODE_AND_CELL_UTILS);
	ret_signal->type = CELL_PORT;
	ret_signal->has_connection = FALSE;
	ret_signal->register_reset = FALSE;
	ret_signal->t.cell_port.cell_port = port;
	ret_signal->t.cell_port.node_output = node_output;

	return ret_signal;
}
/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_mixed_signal_t_from_node_input
 *-------------------------------------------------------------------------------------------*/
mixed_signal_t *onacu_init_mixed_signal_t_from_node_input(node_input_pin_t* port)
{
	mixed_signal_t *ret_signal;

	ret_signal = (mixed_signal_t*)ou_malloc_struct(sizeof(mixed_signal_t), HETS_NODE_AND_CELL_UTILS);
	ret_signal->type = NODE_INPUT;
	ret_signal->has_connection = FALSE;
	ret_signal->register_reset = FALSE;
	ret_signal->t.node_input.node_input = port;

	return ret_signal;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_mixed_signal_t_from_node_output
 *-------------------------------------------------------------------------------------------*/
mixed_signal_t *onacu_init_mixed_signal_t_from_node_output(node_output_pin_t* port)
{
	mixed_signal_t *ret_signal;

	ret_signal = (mixed_signal_t*)ou_malloc_struct(sizeof(mixed_signal_t), HETS_NODE_AND_CELL_UTILS);
	ret_signal->type = NODE_OUTPUT;
	ret_signal->has_connection = FALSE;
	ret_signal->register_reset = FALSE;
	ret_signal->t.node_output.node_output = port;

	return ret_signal;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_init_mixed_signal_t_from_cell_port_and_node_input
 *-------------------------------------------------------------------------------------------*/
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port_and_node_input(cell_ports_t* port, node_input_pin_t* pin)
{
	mixed_signal_t *ret_signal;

	ret_signal = (mixed_signal_t*)ou_malloc_struct(sizeof(mixed_signal_t), HETS_NODE_AND_CELL_UTILS);
	ret_signal->type = NODE_INPUT_OUTPUT;
	ret_signal->has_connection = FALSE;
	ret_signal->register_reset = FALSE;
	ret_signal->t.node_input_output.cell_port = port;
	ret_signal->t.node_input_output.node_input = pin;

	return ret_signal;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_append_port_to_input_signal_list
 *-------------------------------------------------------------------------------------------*/
void onacu_append_port_to_input_signal_list(signal_list_t *list,  mixed_signal_t* signal)
{
	if (list->input_signal_list_size == 0)
	{
		list->input_signal_list_size = 1;
		list->input_signal_list = (mixed_signal_t**)ou_malloc(sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
		list->input_signal_list[list->input_signal_list_size-1] = signal;
	}
	else
	{
		list->input_signal_list_size ++;
		list->input_signal_list = (mixed_signal_t**)ou_realloc(list->input_signal_list, sizeof(mixed_signal_t*) * list->input_signal_list_size, HETS_NODE_AND_CELL_UTILS);
		list->input_signal_list[list->input_signal_list_size-1] = signal;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_append_port_to_output_signal_list
 *-------------------------------------------------------------------------------------------*/
void onacu_append_port_to_output_signal_list(signal_list_t *list,  mixed_signal_t* signal)
{
	if (list->output_signal_list_size == 0)
	{
		list->output_signal_list_size = 1;
		list->output_signal_list = (mixed_signal_t**)ou_malloc(sizeof(mixed_signal_t*), HETS_NODE_AND_CELL_UTILS);
		list->output_signal_list[list->output_signal_list_size-1] = signal;
	}
	else
	{
		list->output_signal_list_size ++;
		list->output_signal_list = (mixed_signal_t**)ou_realloc(list->output_signal_list, sizeof(mixed_signal_t*) * list->output_signal_list_size, HETS_NODE_AND_CELL_UTILS);
		list->output_signal_list[list->output_signal_list_size-1] = signal;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_compare_node_input_pins
 *-------------------------------------------------------------------------------------------*/
short onacu_compare_node_input_pins(node_input_pin_t *n1, node_input_pin_t *n2)
{
	if ((n1->input_node == n2->input_node) && (n1->input_pins_related_output_port == n2->input_pins_related_output_port))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_compare_node_output_pins
 *-------------------------------------------------------------------------------------------*/
short onacu_compare_node_output_pins(node_output_pin_t *n1, node_output_pin_t *n2)
{
	if ((n1->output_nodes[0] == n2->output_nodes[0]) && (n1->output_pin_related_input_index[0] == n2->output_pin_related_input_index[0]))
	{
		return TRUE;
	}
	else
	{
		return FALSE;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_an_input_pin
 *-------------------------------------------------------------------------------------------*/
node_input_pin_t *onacu_create_an_input_pin(node_t *node, int input_pins_related_output_port, int input_pins_related_output_port_index)
{
	node_input_pin_t *input_pin;

	input_pin = (node_input_pin_t*)ou_malloc_struct(sizeof(node_input_pin_t), HETS_NODE_AND_CELL_UTILS);	
	input_pin->input_node = node;
	input_pin->input_pins_related_output_port = input_pins_related_output_port;
	input_pin->input_pins_related_output_port_index = input_pins_related_output_port_index;
	input_pin->input_propogation_value_x_0_1 = INITIALIZED;

	return input_pin;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_an_output_pin
 *-------------------------------------------------------------------------------------------*/
node_output_pin_t *onacu_add_node_and_pin_to_output_pin(node_output_pin_t *pin, node_t *node, int output_pins_related_input_index)
{
	node_output_pin_t *r_pin = NULL;

	if (pin == NULL)
	{
		/* Need to initialize */
		r_pin = (node_output_pin_t*)ou_malloc_struct(sizeof(node_output_pin_t), HETS_NODE_AND_CELL_UTILS);	
		r_pin->output_nodes = (node_t**)ou_malloc(sizeof(node_t*), HETS_NODE_AND_CELL_UTILS);	
		r_pin->output_pin_related_input_index = (int*)ou_malloc(sizeof(int), HETS_NODE_AND_CELL_UTILS);	
		r_pin->num_output_pins_level_2 = 1;
		r_pin->output_nodes[0] = node;
		r_pin->output_pin_related_input_index[0] = output_pins_related_input_index;
		r_pin->is_output_propogated = FALSE;
	}
	else
	{
		/* Add another entry */
		pin->output_nodes = (node_t**)ou_realloc(pin->output_nodes, sizeof(node_t*)*(pin->num_output_pins_level_2+1), HETS_NODE_AND_CELL_UTILS);	
		pin->output_pin_related_input_index = (int*)ou_realloc((pin->output_pin_related_input_index), sizeof(int)*(pin->num_output_pins_level_2+1), HETS_NODE_AND_CELL_UTILS);	
		pin->output_nodes[pin->num_output_pins_level_2] = node;
		pin->output_pin_related_input_index[pin->num_output_pins_level_2] = output_pins_related_input_index;
		pin->num_output_pins_level_2 = pin->num_output_pins_level_2 + 1;

		r_pin = pin;
	}

	return r_pin;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_connect_multiple_output_ports_from_list_toinput_ports_of_node
 *-------------------------------------------------------------------------------------------*/
void onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(node_t *node, 
																			int start_input_index, 
																			signal_list_t *list, 
																			int start_output_index, 
																			int end_output_index)
{
	int i;
	int j = start_input_index;
	int temp_array_index;
	
	assert(list->output_signal_list_size >= end_output_index);
	
	for (i = start_output_index; i < end_output_index; i++)
	{
		if (list->output_signal_list[i]->type == CELL_PORT)
		{
			/* IF - this is a cell port, then we need to convert this to a node_output_pin */
			/* add to the netlist */
			list->output_signal_list[i]->t.cell_port.node_output = onacu_add_node_and_pin_to_output_pin(list->output_signal_list[i]->t.cell_port.node_output, node, j);
			/* debugging information to help us figure out things */
			node->input_pins[j]->port_who_added = list->output_signal_list[i]->t.cell_port.cell_port;
		}	
		else if (list->output_signal_list[i]->type == NODE_INPUT)
		{
			/* ELSE - this output is from another node and need to be connect the two signal up.  This can be confusing, but the input_pin
			 * structure describes how to get to the node that this output was generated from */
			temp_array_index = onu_add_output_pointer_to_node(list->output_signal_list[i]->t.node_input.node_input->input_node, 
																node, 
																list->output_signal_list[i]->t.node_input.node_input->input_pins_related_output_port,
																j);

			onu_set_input_pointer_to_node(node, 
											list->output_signal_list[i]->t.node_input.node_input->input_node,
											j, 
											list->output_signal_list[i]->t.node_input.node_input->input_pins_related_output_port,
											temp_array_index);
		}
		else if (list->output_signal_list[i]->type == NODE_INPUT_OUTPUT)
		{
			/* ELSE - this output describes an output signal not from a node, so it also describes what input it comes from
			 * NOTE: does the same thing as above except different structure that holds information about the cell_port */
			temp_array_index = onu_add_output_pointer_to_node(list->output_signal_list[i]->t.node_input_output.node_input->input_node, 
																node, 
																list->output_signal_list[i]->t.node_input_output.node_input->input_pins_related_output_port,
																j);

			onu_set_input_pointer_to_node(node, 
											list->output_signal_list[i]->t.node_input_output.node_input->input_node,
											j, 
											list->output_signal_list[i]->t.node_input_output.node_input->input_pins_related_output_port,
											temp_array_index);

			/* debugging information to help us figure out things */
			node->input_pins[j]->port_who_added = list->output_signal_list[i]->t.node_input_output.cell_port;
		}
		else
		{
			assert(FALSE);
		}

		/* increment to next input port on the node */
		j++;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_connect_output_port_from_list_toinput_port_of_node
 *-------------------------------------------------------------------------------------------*/
void onacu_connect_output_port_from_list_toinput_port_of_node(node_t *node, 
																int input_index, 
																mixed_signal_t *signal)
{
	int temp_array_index;
	
	if (signal->type == CELL_PORT)
	{
		/* IF - this is a cell port, then we need to convert this to a node_output_pin */
		/* add to the netlist */
		signal->t.cell_port.node_output = onacu_add_node_and_pin_to_output_pin(signal->t.cell_port.node_output, node, input_index);
	}	
	else if (signal->type == NODE_INPUT)
	{
		/* ELSE - this output is from another node and need to be connect the two signal up.  This can be confusing, but the input_pin
		 * structure describes how to get to the node that this output was generated from */
		temp_array_index = onu_add_output_pointer_to_node(signal->t.node_input.node_input->input_node, 
															node, 
															signal->t.node_input.node_input->input_pins_related_output_port,
															input_index);

		onu_set_input_pointer_to_node(node, 
										signal->t.node_input.node_input->input_node,
										input_index, 
										signal->t.node_input.node_input->input_pins_related_output_port,
										temp_array_index);
	}
	else if (signal->type == NODE_INPUT_OUTPUT)
	{
		/* ELSE - this output describes an output signal not from a node, so it also describes what input it comes from
		 * NOTE: does the same thing as above except different structure that holds information about the cell_port */
		temp_array_index = onu_add_output_pointer_to_node(signal->t.node_input_output.node_input->input_node, 
															node, 
															signal->t.node_input_output.node_input->input_pins_related_output_port,
															input_index);

		onu_set_input_pointer_to_node(node, 
										signal->t.node_input_output.node_input->input_node,
										input_index, 
										signal->t.node_input_output.node_input->input_pins_related_output_port,
										temp_array_index);
	}
	else
	{
		assert(FALSE);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_2inport_1outport_macro_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_1inport_1outport_macro_node(char *name, int size_in1, int size_out, short macro_index)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, size_out, size_in1, 1, 1);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.hetero_node_type = macro_index;
	created_node->n_t.hetero_node.width = size_out;
	created_node->n_t.hetero_node.width_a = size_in1;
	created_node->n_t.hetero_node.width_b = 0;
	created_node->n_t.hetero_node.width_c_also_shift_size = 0;

	if (macro_index == MN_MULT)
	{
		/* IF - this is a multiplier node then add it to a list so we can quickly access multipliers */
		ohu_add_mult_node_to_list (created_node);
	}
	else if ((macro_index == MN_ADD) || (macro_index == MN_SUB))
	{
		/* IF - this is an adder or subtractor node then add to a list for quick access */
		ohu_add_add_sub_node_to_list (created_node);
	}

	/* setup the 0 port */
	onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
	onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	/* setup the out port */
	onu_add_output_port_fanout(created_node->output_ports[0]);
	onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
	onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_2inport_1outport_macro_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_2inport_1outport_macro_node(char *name, int size_in1, int size_in2, int size_out, short macro_index)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, size_out, size_in1 + size_in2, 2, 1);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.hetero_node_type = macro_index;
	created_node->n_t.hetero_node.width = size_out;
	created_node->n_t.hetero_node.width_a = size_in1;
	created_node->n_t.hetero_node.width_b = size_in2;
	created_node->n_t.hetero_node.width_c_also_shift_size = 0;

	if (macro_index == MN_MULT)
	{
		/* IF - this is a multiplier node then add it to a list so we can quickly access multipliers */
		ohu_add_mult_node_to_list (created_node);
	}
	else if ((macro_index == MN_ADD) || (macro_index == MN_SUB))
	{
		/* IF - this is an adder or subtractor node then add to a list for quick access */
		ohu_add_add_sub_node_to_list (created_node);
	}

	/* setup the 0 port */
	onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
	onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	/* setup the 1 port */
	onu_set_input_port_is_bus(created_node->input_ports[1], FALSE);
	onu_set_input_port_width(created_node->input_ports[1], created_node->n_t.hetero_node.width_b);
	/* setup the out port */
	onu_add_output_port_fanout(created_node->output_ports[0]);
	onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
	onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_3inport_1outport_macro_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_3inport_1outport_macro_node(char *name, int size_in1, int size_in2, int size_in3, int size_out, short macro_index)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, size_out, size_in1 + size_in2 + size_in3, 3, 1);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.hetero_node_type = macro_index;
	created_node->n_t.hetero_node.width = size_out;
	created_node->n_t.hetero_node.width_a = size_in1;
	created_node->n_t.hetero_node.width_b = size_in2;
	created_node->n_t.hetero_node.width_c_also_shift_size = size_in3;

	if (macro_index == MN_MULT)
	{
		/* IF - this is a multiplier node then add it to a list so we can quickly access multipliers */
		ohu_add_mult_node_to_list (created_node);
	}
	else if ((macro_index == MN_ADD) || (macro_index == MN_SUB))
	{
		/* IF - this is an adder or subtractor node then add to a list for quick access */
		ohu_add_add_sub_node_to_list (created_node);
	}

	/* setup the 0 port */
	onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
	onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	/* setup the 1 port */
	onu_set_input_port_is_bus(created_node->input_ports[1], FALSE);
	onu_set_input_port_width(created_node->input_ports[1], created_node->n_t.hetero_node.width_b);
	/* setup the 2 port */
	onu_set_input_port_is_bus(created_node->input_ports[2], FALSE);
	onu_set_input_port_width(created_node->input_ports[2], created_node->n_t.hetero_node.width_c_also_shift_size);
	/* setup the out port */
	onu_add_output_port_fanout(created_node->output_ports[0]);
	onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
	onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_shift_macro_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_shift_macro_node(char *name, int size_in1, int size_out, int shift_size, short macro_index)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, size_out, size_in1, 1, 1);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.hetero_node_type = macro_index;
	created_node->n_t.hetero_node.width = size_out;
	created_node->n_t.hetero_node.width_a = size_in1;
	created_node->n_t.hetero_node.width_b = 0;
	created_node->n_t.hetero_node.width_c_also_shift_size = shift_size;

	/* setup the 0 port */
	onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
	onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	/* setup the out port */
	onu_add_output_port_fanout(created_node->output_ports[0]);
	onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
	onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_case_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_case_node(char *name, int num_outputs, int num_inputs, int num_input_ports, int num_output_ports)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, num_outputs, num_inputs, num_input_ports, num_output_ports);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.register_ports_or_mux_choice = NULL;

	ohu_add_case_and_if_node_to_list (created_node);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_create_memory_node
 *-------------------------------------------------------------------------------------------*/
node_t *onacu_create_memory_node(char *name, int size_in, int size_addr, int size_out, short macro_index)
{	
	node_t *created_node;

	/* build a node */
	created_node = onu_allocate_skeleton_node(name, size_out, 2 + size_in + 2*size_addr, 3, 1);
	/* initialize more parts of the node */
	created_node->node_type = MACRO_NODE;
	created_node->n_t.hetero_node.hetero_node_type = macro_index;
	created_node->n_t.hetero_node.width = size_out;
	created_node->n_t.hetero_node.width_a = 2;
	created_node->n_t.hetero_node.width_b = size_in;
	created_node->n_t.hetero_node.width_c_also_shift_size = 2*size_addr; // one for clock and one for write enable

	/* order of node inputs is clk, enable, write_in, address */
	/* setup the 0 port */
	onu_set_input_port_is_bus(created_node->input_ports[0], FALSE);
	onu_set_input_port_width(created_node->input_ports[0], created_node->n_t.hetero_node.width_a);
	/* setup the 1 port */
	onu_set_input_port_is_bus(created_node->input_ports[1], FALSE);
	onu_set_input_port_width(created_node->input_ports[1], created_node->n_t.hetero_node.width_b);
	/* setup the 2 port */
	onu_set_input_port_is_bus(created_node->input_ports[2], FALSE);
	onu_set_input_port_width(created_node->input_ports[2], created_node->n_t.hetero_node.width_c_also_shift_size);
	/* setup the out port */
	onu_add_output_port_fanout(created_node->output_ports[0]);
	onu_set_output_port_is_bus(created_node->output_ports[0], 0, TRUE);
	onu_set_output_port_width(created_node->output_ports[0], created_node->n_t.hetero_node.width);

	return created_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_add_multiple_input_ports_to_list
 * 	***Assumes all the output_signal_list spots already allocated
 *-------------------------------------------------------------------------------------------*/
void onacu_add_multiple_input_ports_to_list(signal_list_t *list, node_t *node, int start_index, int end_index)
{
	int i;

	for (i = start_index; i < end_index; i++)
	{
		list->output_signal_list[i] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(node, i, 0));
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_find_input_related_to_output
 *-------------------------------------------------------------------------------------------*/
int onacu_find_input_related_to_output(mixed_signal_t *signal, signal_list_t *list)
{
	return onacu_lookup_port_in_signal_list_and_return_index(list->output_signal_list, list->output_signal_list_size, signal);
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_find_output_related_to_output
 *-------------------------------------------------------------------------------------------*/
int onacu_find_output_related_to_output(mixed_signal_t *signal, signal_list_t *list)
{
	return onacu_lookup_port_in_signal_list_and_return_index(list->output_signal_list, list->output_signal_list_size, signal);
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_join_mixed_signals
 *-------------------------------------------------------------------------------------------*/
void onacu_join_mixed_signals(mixed_signal_t *signal_input, mixed_signal_t *signal_output)
{
	int temp_array_index;
	node_t *input_node;
	int input_pin;
	node_t *output_to_node;
	int output_to_pin;
	int i;

	/* signal input can be a node_input or a cell port */
	if (signal_input->type == CELL_PORT)
	{
		/* IF - this is a cell port then */
		if (signal_input->t.cell_port.node_output == NULL)
		{
			return;
		}

		if (signal_output->type == NODE_INPUT)
		{
			/* IF - the output has an INPUT, then this describes how to attach to nodes input */
			output_to_node =  signal_output->t.node_input.node_input->input_node;
			output_to_pin = signal_output->t.node_input.node_input->input_pins_related_output_port;
		}
		else if (signal_output->type == NODE_INPUT_OUTPUT)
		{
			/* ELSE IF - has a cell_port name as well still attach nodes */
			output_to_node =  signal_output->t.node_input_output.node_input->input_node;
			output_to_pin = signal_output->t.node_input_output.node_input->input_pins_related_output_port;
		}
		else
		{
			/* ELSE - shouldn't happen */
			assert(FALSE);
		}

		for (i = 0; i < signal_input->t.cell_port.node_output->num_output_pins_level_2; i++)
		{
			input_node =  signal_input->t.cell_port.node_output->output_nodes[i];
			input_pin = signal_input->t.cell_port.node_output->output_pin_related_input_index[i];

			/* Physically join the nodes */
			temp_array_index = onu_add_output_pointer_to_node(output_to_node,
																input_node,
																output_to_pin,
																input_pin);
	
			onu_set_input_pointer_to_node(input_node,
											output_to_node,
											input_pin, 
											output_to_pin,
											temp_array_index);
		}
	}
	else if (signal_input->type == NODE_OUTPUT)
	{
		/* IF - this is a node output then this describes how to attach to
		 * a nodes output */
		input_node =  signal_input->t.node_output.node_output->output_nodes[0];
		input_pin = signal_input->t.node_output.node_output->output_pin_related_input_index[0];

		if (signal_output->type == NODE_INPUT)
		{
			/* IF - the output has an INPUT, then this describes how to attach to nodes input */
			output_to_node =  signal_output->t.node_input.node_input->input_node;
			output_to_pin = signal_output->t.node_input.node_input->input_pins_related_output_port;
		}
		else if (signal_output->type == NODE_INPUT_OUTPUT)
		{
			/* ELSE IF - has a cell_port name as well still attach nodes */
			output_to_node =  signal_output->t.node_input_output.node_input->input_node;
			output_to_pin = signal_output->t.node_input_output.node_input->input_pins_related_output_port;
		}
		else
		{
			/* ELSE - shouldn;t happen */
			assert(FALSE);
		}

		/* Physically join the nodes */
		temp_array_index = onu_add_output_pointer_to_node(output_to_node,
															input_node,
															output_to_pin,
															input_pin);

		onu_set_input_pointer_to_node(input_node,
										output_to_node,
										input_pin, 
										output_to_pin,
										temp_array_index);
	}
	else
	{
		/* ELSE - shouldn;t happen */
		assert(FALSE);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: onacu_join_mixed_signals
 *-------------------------------------------------------------------------------------------*/
void onacu_record_reset_ports(signal_list_t *list, node_t *node, int start_port)
{
	int i;

	node->n_t.hetero_node.register_ports_or_mux_choice = (short*)ou_malloc(sizeof(short)*list->output_signal_list_size, HETS_NODE_AND_CELL_UTILS);

	for (i = 0; i < list->output_signal_list_size; i++)
	{
		if (list->output_signal_list[i]->register_reset == TRUE)
		{
			/* IF - this port has been marked as a register reset record it */
			node->n_t.hetero_node.register_ports_or_mux_choice[i] = TRUE;
		}
		else
		{
			/* ELSE - mark that this port doesn't have a register reset */
			node->n_t.hetero_node.register_ports_or_mux_choice[i] = FALSE;
		}
	}
}
