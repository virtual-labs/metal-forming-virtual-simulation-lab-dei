
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

/* This file provides the functionality that takes my first data-structure, which is hierarchical, and flattens the netlist in my second data-structure.
 * Also, at the bottom there is some code that traverses the flattened netlist, and I use this skeleton to build all the output formats that I generate.
 *
 * The way things are flattened, is I take all the rimary inputs, and start propagating through them in a breadth-first search.  If at any point
 * I hit a structure that is a piece of logic, then I create this a node for this logic, and continue the propogation.  This method removes
 * the connections that are made between modules and instead makes the connections between nodes that represent logical functions.
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>

#include "debug.h"

#include "string_cache.h"
#include "odin_types.h"
#include "odin_globals.h"

#include "odin_ds1_graph_utils.h"
#include "odin_utils.h"

#include "odin_FLAT_netlist.h"
#include "odin_node_utils.h"
#include "linked-list.h"
#include "odin_node_and_cell_utils.h"
#include "odin_node_display.h"

STRING_CACHE *instance_hash;
node_t **input_nodes;
int num_input_nodes = 0;
node_t **output_nodes = 0;
int num_output_nodes = 0;
node_t *gnd_node;
node_t *vcc_node;
node_t *null_node;
int *memory_indexes = (int []){10, 15}; /* based on DFF spot and latch sport in paj_vpr.inc */
int num_memory_indexes = 2;

LINKED_LIST *wire_propogate_queue;

typedef struct
{
	cell_t *current_cell;
	node_t *node_from; 
	int output_pin_from;
	net_pointer_t *propogation_net_pointer;
	cell_t *instance_cell; 
	short is_internal_signal;
} output_propogate_t;

// PROTOTYPES
output_propogate_t *oFn_create_output_propogate_struct(cell_t *current_cell, 
													node_t *node_from, 
													int output_pin_from,
													net_pointer_t *propogation_net_pointer, 
													cell_t *instance_cell, 
													short is_internal_signal);
void oFn_free_output_propogate_struct(output_propogate_t *to_free);
void oFn_add_propogate_output_wire_name_to_queue(cell_t *current_cell, 
													node_t *node_from, 
													int output_pin_from,
													net_pointer_t *propogation_net_pointer, 
													cell_t *instance_cell, 
													short is_internal_signal);

/*---------------------------------------------------------------------------------------------
 * (function: oFn_init)
 *-------------------------------------------------------------------------------------------*/
void oFn_init()
{
	/* initialize the hash */
	instance_hash = sc_new_string_cache();

	/* initialize the memory count to 0 */
	num_ff_nodes = 0;

	/* create a node for the gnd and vcc */
	gnd_node = onu_allocate_1or0_node(TRUE);
	vcc_node = onu_allocate_1or0_node(FALSE);

	/* create a NULL node */
	null_node = onu_allocate_node();
	null_node->node_type = NULL_NODE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_check_if_defined_cell_is_memory)
 *-------------------------------------------------------------------------------------------*/
int oFn_check_if_defined_cell_is_memory (int library_index)
{
	int i;

	for (i = 0; i < num_memory_indexes; i++)
	{
		if(memory_indexes[i] == library_index)
			return TRUE;
	}
	return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_flatten)
 * 	Takes the hierachical format and partially flattens to get rid of module hierarchy, so
 * 	we know how everything is connected to each other.
 *-------------------------------------------------------------------------------------------*/
void oFn_flatten(cell_t *top_cell, int cell_count)
{
	int j;

	/* first create all the nodes that will be joined */
	oFn_create_nodes(top_cell, cell_count, instance_hash);

	/* create nodes for memories.  THis is only needed for the LPM memories. */
	for (j = 0; j < num_memories; j++)
	{
		if (memories[j]->read_memory_cell != NULL)
		{
			/* IF - there is a read part to this memory, then allocate it */
			((generated_cell_t*)memories[j]->read_memory_cell)->node_to = memories[j]->memory_node;
		}
	}

	/* then traverse the cell structure and flatten by making all the connections between nodes */
	oFn_flatten_pass(top_cell, instance_hash);
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_create_nodes)
 *-------------------------------------------------------------------------------------------*/
void oFn_create_nodes(cell_t *top_cell, int cell_count, STRING_CACHE *instance_node_hash)
{
	int i;

	for (i = 0; i < num_BFS_stack; i++)
	{
		/* check each cell to turn it into a node */
		if ((BFS_stack[i]->cell_type == DEFINED_CELL) && 
			(oFn_check_if_defined_cell_is_memory(((defined_cell_t*)BFS_stack[i])->cell_index) == TRUE))
		{
			/* IF - this is a memory cell then add it to the memory cell set */
			onu_add_a_ff_node(BFS_stack[i],  ((defined_cell_t*)BFS_stack[i])->cell_index, BFS_stack[i]->cell_instance_name);
		}
		else if ((BFS_stack[i]->cell_type == DEFINED_CELL) && 
			(((defined_cell_t*)BFS_stack[i])->cell_index != zero_cell_lib_index) &&
			(((defined_cell_t*)BFS_stack[i])->cell_index != one_cell_lib_index))
		{
			/* IF - this is a defined cell, then this becomes a node */
			((defined_cell_t*)BFS_stack[i])->node_to = onu_allocate_library_node(BFS_stack[i],  ((defined_cell_t*)BFS_stack[i])->cell_index, BFS_stack[i]->cell_instance_name);
		}
		else if (BFS_stack[i]->cell_type == INSTANCE_CELL_POINTER)
		{
			/* ELSE IF - this is an Instance cell then convert the internals into nodes with internal pointers already made and
			 * create a hash list so we can get to these internal elements based on the instance */
			oFn_create_nodes_for_instance_cell(BFS_stack[i], instance_node_hash);	
		}
		else if ((BFS_stack[i]->cell_type == GENERATED_CELL) && (((generated_cell_t*)BFS_stack[i])->macro_cell_type != MACRO_NONE))
		{
			/* ELSE IF - this is a heterogeneous structure that needs to become a node */
			((generated_cell_t*)BFS_stack[i])->node_to = onu_allocate_macro_node(BFS_stack[i], BFS_stack[i]->cell_instance_name);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_create_nodes_for_instance_cell)
 *-------------------------------------------------------------------------------------------*/
void oFn_create_nodes_for_instance_cell(cell_t *instance_cell, STRING_CACHE *instance_node_hash)	
{
	int i;
	node_t *created_node;
	char oash_name_entry[4096];
	long oash_idx;
	instance_cell_t* instance_cell_cast = (instance_cell_t*)instance_cell;

	/* traverse the insides of the cell which shouldn't reference any other GENERAL cell, and convert each cell index into a node */
	for (i = 0; i < instance_cell_cast->cell_definition->num_cells_instances; i++)
	{
		if ((instance_cell_cast->cell_definition->cells_instances[i]->cell_type == DEFINED_CELL) && 
			(((defined_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->cell_index != one_cell_lib_index) &&
			(((defined_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->cell_index != zero_cell_lib_index))
		{
			/* IF - this is a defined cell, then this becomse a node */
			if (oFn_check_if_defined_cell_is_memory(((defined_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->cell_index) == TRUE)
			{
				/* IF - this is a memory cell then create the memory cell */
				created_node = onu_add_a_ff_node(instance_cell_cast->cell_definition->cells_instances[i],
													((defined_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->cell_index,
													instance_cell_cast->cell_definition->cells_instances[i]->cell_instance_name);
			}
			else
			{
				/* ELSE - regular type of library cell that needs a node */
				created_node = onu_allocate_library_node(instance_cell_cast->cell_definition->cells_instances[i],
													((defined_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->cell_index,
													instance_cell_cast->cell_definition->cells_instances[i]->cell_instance_name);
			}

			/* now create a hash entry based on the instance name + the cells name */
			sprintf(oash_name_entry, "%s_%s", 
					instance_cell_cast->cell_instance_name, 
					instance_cell_cast->cell_definition->cells_instances[i]->cell_instance_name);

			/* now add this string to the hash */
			oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
			
			/* if we have already defined this type of gate return */
		 	if(instance_node_hash->data[oash_idx] != NULL)
			{
				assert(FALSE);
			}
			/* add the node to the hash */
		 	instance_node_hash->data[oash_idx] = (void*)created_node;
		}
		else if ((instance_cell_cast->cell_definition->cells_instances[i]->cell_type == GENERATED_CELL) && 
				(((generated_cell_t*)instance_cell_cast->cell_definition->cells_instances[i])->macro_cell_type != MACRO_NONE))
		{
			/* ELSE IF - inside the instance cell there is a hetero unit then need to create a node */
			created_node = onu_allocate_macro_node(instance_cell_cast->cell_definition->cells_instances[i],
//												instance_cell_cast->cell_definition->cells_instances[i]->cell_instance_name);
												instance_cell_cast->cell_definition->cells_instances[i]->cell_definition_name);

			/* now create a hash entry based on the instance name + the cells name */
			sprintf(oash_name_entry, "%s_%s", 
					instance_cell_cast->cell_instance_name, 
					instance_cell_cast->cell_definition->cells_instances[i]->cell_instance_name);

			/* now add this string to the hash */
			oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
			
			/* if we have already defined this type of gate return */
		 	if(instance_node_hash->data[oash_idx] != NULL)
			{
				assert(FALSE);
			}
			/* add the node to the hash */
		 	instance_node_hash->data[oash_idx] = (void*)created_node;
		}
	}

	if ((instance_cell_cast->cell_definition->cell_type == GENERATED_CELL) && 
			((((generated_cell_t*)instance_cell_cast->cell_definition)->macro_cell_type != MACRO_NONE)&&
			(((generated_cell_t*)instance_cell_cast->cell_definition)->macro_cell_type != MN_MEMORY)))
	{
		/* IF - the instance cell is a hetero unit then need to create a node */
		created_node = onu_allocate_macro_node(instance_cell_cast->cell_definition,
											instance_cell_cast->cell_definition->cell_definition_name);

		/* now create a hash entry based on the instance name + the cells name */
		sprintf(oash_name_entry, "%s_%s", 
				instance_cell_cast->cell_instance_name,
				instance_cell_cast->cell_definition->cell_definition_name);

		/* now add this string to the hash */
		oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
		
		/* if we have already defined this type of gate return */
	 	if(instance_node_hash->data[oash_idx] != NULL)
		{
			assert(FALSE);
		}
		/* add the node to the hash */
	 	instance_node_hash->data[oash_idx] = (void*)created_node;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_create_output_propogate_struct)
 *-------------------------------------------------------------------------------------------*/
output_propogate_t *oFn_create_output_propogate_struct(cell_t *current_cell, 
													node_t *node_from, 
													int output_pin_from,
													net_pointer_t *propogation_net_pointer, 
													cell_t *instance_cell, 
													short is_internal_signal)
{
	output_propogate_t *return_output_propogate;

	return_output_propogate = (output_propogate_t*)ou_malloc_struct(sizeof(output_propogate_t), HETS_FLAT_NETLIST);

	return_output_propogate->current_cell = current_cell;
	return_output_propogate->node_from = node_from;
	return_output_propogate->output_pin_from = output_pin_from;
	return_output_propogate->propogation_net_pointer = propogation_net_pointer;
	return_output_propogate->instance_cell = instance_cell;
	return_output_propogate->is_internal_signal = is_internal_signal;

	return return_output_propogate;
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_free_output_propogate_struct)
 *-------------------------------------------------------------------------------------------*/
void oFn_free_output_propogate_struct(output_propogate_t *to_free)
{
	if (to_free->is_internal_signal == TRUE)
	{
		/* if this internal signal was allocated, then it needs to be ou_freed */
		oEgu_free_an_internal_signal (to_free->propogation_net_pointer->d_t.cells_internals.signal_reference);
	}
	/* ou_free the temporary net_pointer */
	oEgu_free_a_cell_net_pointer (to_free->propogation_net_pointer);
	
	/* ou_free the rest of the queue value */
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_add_propogate_output_wire_name_to_queue)
 *-------------------------------------------------------------------------------------------*/
void oFn_add_propogate_output_wire_name_to_queue(cell_t *current_cell, 
													node_t *node_from, 
													int output_pin_from,
													net_pointer_t *propogation_net_pointer, 
													cell_t *instance_cell, 
													short is_internal_signal)
{
	output_propogate_t *allocated_output_propogate;

	/* allocate the queue structure that holds all the parameter details */
	allocated_output_propogate = oFn_create_output_propogate_struct( 
													current_cell, 
													node_from, 
													output_pin_from,
													propogation_net_pointer, 
													instance_cell, 
													is_internal_signal);
	
	/* add to the back of the queue */
	LinkedListAppend(wire_propogate_queue, (void*)allocated_output_propogate);
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_propogate_output_wire_name_through_cell)
 *-------------------------------------------------------------------------------------------*/
void oFn_propogate_output_wire_name_through_cell(STRING_CACHE *instance_node_hash)
{
	int  j;
	char oash_name_entry[4096];

	cell_nets_t *found_cell_net;
	cell_t *back_cell;

	long oash_idx;
	int pin_idx;
	node_t *found_node;
	internal_signal_t *temp_internal_signal;
	net_pointer_t *temp_net_pointer;

	cell_t *current_cell;
	node_t *node_from;
	int output_pin_from;
	net_pointer_t *propogation_net_pointer;
	cell_t *instance_cell;
	int temp_array_index;

	output_propogate_t *current_front_of_queue;
	
	/* keep on popping the front of the queue until all are done */
	while (LinkedListSize(wire_propogate_queue) > 0)
	{
		/* grab the next queue element */
		current_front_of_queue = (output_propogate_t *)LinkedListNext(wire_propogate_queue);		

		/* record all the values of the queue structure */
		current_cell = current_front_of_queue->current_cell;
		node_from = current_front_of_queue->node_from;
		output_pin_from = current_front_of_queue->output_pin_from;
		propogation_net_pointer = current_front_of_queue->propogation_net_pointer;
		instance_cell = current_front_of_queue->instance_cell;

		/* check if these values are all legal */
		assert(node_from != NULL);
		assert(current_cell != NULL);
		assert(output_pin_from >= 0);
		assert(propogation_net_pointer != NULL);
	
		D3(	fprintf(out, "cell def: %s\ncell ins: %s\n", current_cell->cell_definition_name, current_cell->cell_instance_name););
	 	D3(	oEgu_EDIF_define_net_pointer(propogation_net_pointer, out, 0););
	
		/* For each of the nets that is DRIVEN by the propogation port_name */
		/* find the cell with the specified propogatioon pointer */	
		found_cell_net = oEgu_lookup_in_cell(propogation_net_pointer, current_cell);
	
		if (found_cell_net != NULL)
		{
			/* IF - there is a found cell net */
	
			if ((instance_cell == NULL) && (found_cell_net->traversal_flag == PROPOGATION))
			{
				/* IF - this net has already been traversed and its not an instance cell (no loops in 
				 * instance cells) or is being traversed then we have caught a loop.  Return. */
				continue;
			}
			found_cell_net->traversal_flag = PROPOGATION;
	
			/* For each of the driven elements of this net */
			for (j = 0; j < found_cell_net->num_driven; j++)
			{
				/* Check the type of cell this is:
				 * 	a An internal library gate
				 * 	aa A hetero cell
				 * 	b A port for the hierarchical cell
				 * 	c An internal signal to a Generated cell */
	
				if ((found_cell_net->driven[j]->driver_type == CELLS_INTERNALS) &&
					(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->instance_type == DEFINED_CELL))
				{	
					/* IF - this is a defined cell then add the wire name to the appropriate port */
		
					/* now hookup the node to the other node.  Must be an input */
					if (found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.defined_cell.cell_index == zero_cell_lib_index)
					{
						/* IF - this is a defined gnd then connect to the ground node */
						found_node = gnd_node;
					}
					else if (found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.defined_cell.cell_index == one_cell_lib_index)
					{
						/* ELSE If - this is a defined vcc */
						found_node = vcc_node;
					}
					else if (instance_cell != NULL)
					{
						/* ELSE IF - this is an instance_cell_pointer and we need to find the node from the hash */
	
						/* now create a has entry based on the instance name + the cells name */
						sprintf(oash_name_entry, "%s_%s", 
								instance_cell->cell_instance_name, 
								found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance->cell_instance_name);
	
						/* now add this string to the hash */
						oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
				
						/* if we have already defined this type of gate return */
					 	if(instance_node_hash->data[oash_idx] == NULL)
						{
							assert(FALSE);
						}
						/* copy out the node from the hash */
					 	found_node = (node_t*)instance_node_hash->data[oash_idx];
					}
					else
					{
						/* ELSE - this is a standard library cell and a node has been created for it */
						found_node = ((defined_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->node_to;
					}
	
					/* get the index of the pin */
					pin_idx = found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.defined_cell.cell_port_id 
								- current_library[found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.defined_cell.cell_index].num_output_ports;
	
					/* now update the node with the input node pointer */
					/* record the backwards link.  From the node_from's output pins to this node */
					temp_array_index = onu_add_output_pointer_to_node(node_from, found_node, output_pin_from, pin_idx);
	
					onu_set_input_pointer_to_node(found_node, node_from, pin_idx, output_pin_from, temp_array_index);

					/* now propogate this defined cells inputs forward */
					oFn_propogate_outputs_from_library_node(found_node, instance_node_hash, instance_cell);
				}
				else if ((found_cell_net->driven[j]->driver_type == CELLS_INTERNALS) &&
					(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->instance_type == GENERATED_CELL) &&
					(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance->cell_type == GENERATED_CELL) &&
					(((generated_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->macro_cell_type != MACRO_NONE))
				{
					/* ELSE IF - this cell is a hetero cell, then we need to hookup the inputs and propogate its outputs.  This is very
					 * similar to the defined gates. */
	
					if (instance_cell != NULL)
					{
						/* IF - this is an instance_cell_pointer (an embedded set) and we need to find the node from the hash */
	
						/* now create a has entry based on the instance name + the cells name */
						sprintf(oash_name_entry, "%s_%s", 
								instance_cell->cell_instance_name, 
								found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance->cell_instance_name);
	
						/* now add this string to the hash */
						oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
				
						/* if we have already defined this type of gate return */
					 	if(instance_node_hash->data[oash_idx] == NULL)
						{
							assert(FALSE);
						}
						/* copy out the node from the hash */
					 	found_node = (node_t*)instance_node_hash->data[oash_idx];
					}
					else
					{
						/* ELSE - this is a standard library cell and a node has been created for it */
						found_node =((generated_cell_t*) found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->node_to;
					}
	
					assert((found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.generated_cell.cell_port->pin_order != -1) &&
							(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.generated_cell.cell_port->IN_OUT == IN_PORT))
					pin_idx = found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.generated_cell.cell_port->pin_order; 
	
					/* now update the node with the input node pointer */
					/* record the backwards link.  From the node_from's output pins to this node */
					temp_array_index = onu_add_output_pointer_to_node(node_from, found_node, output_pin_from, pin_idx);
	
					onu_set_input_pointer_to_node(found_node, node_from, pin_idx, output_pin_from, temp_array_index);

					/* now propogate this defined cells outputs forward */
					oFn_propogate_outputs_from_hetero_node(found_node, instance_node_hash, instance_cell, found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance);
				}
				else if ((found_cell_net->driven[j]->driver_type == CELLS_INTERNALS) &&
					(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->instance_type == GENERATED_CELL) &&
					(found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance->cell_type == GENERATED_CELL) &&
					(((generated_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->macro_cell_type == MACRO_NONE) &&
					(((generated_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->is_statement_cell == TRUE))
				{
					/* ELSE - this is a statment cell, and we need to hook up all the ports as well as progpogate */
					signal_list_t *temp_list = ((generated_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->list;
					int where_in_list;
					int k;

					where_in_list = onacu_lookup_cell_port_in_input_signal_list_and_return_index(temp_list->input_signal_list, temp_list->input_signal_list_size, found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.generated_cell.cell_port);

					assert(temp_list->input_signal_list[where_in_list]->type == CELL_PORT);

					/* hook up each of the cell ports desired connections in the node */
					if (temp_list->input_signal_list[where_in_list]->t.cell_port.node_output != NULL)
					{
						for (k = 0; k < temp_list->input_signal_list[where_in_list]->t.cell_port.node_output->num_output_pins_level_2; k++)
						{
							pin_idx = temp_list->input_signal_list[where_in_list]->t.cell_port.node_output->output_pin_related_input_index[k];
							found_node = temp_list->input_signal_list[where_in_list]->t.cell_port.node_output->output_nodes[k];
	
							temp_array_index = onu_add_output_pointer_to_node(node_from, found_node, output_pin_from, pin_idx);
		
							onu_set_input_pointer_to_node(found_node, node_from, pin_idx, output_pin_from, temp_array_index);
						}	
					}

					/* now propogate this defined cells outputs forward */
					oFn_propogate_outputs_from_statement_node(temp_list, found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance);
				}		
				else if (found_cell_net->driven[j]->driver_type == CELLS_PORTS) 
				{
					/* ELSE IF - this is a port of the current cell then it is an OUTPUT and needs to be propogated in the parent cell */
		
					/* verify this is an output port */
					assert((found_cell_net->driven[j]->d_t.cells_ports.port_reference->IN_OUT == OUT_PORT) ||
						(found_cell_net->driven[j]->d_t.cells_ports.port_reference->IN_OUT == IN_OUT_PORT))
		
					/* check if this is the top cell, or just an embedded cell */
					if (found_cell_net->driven[j]->d_t.cells_ports.port_reference->back_cell->back_cell != NULL)
					{
						/* IF - this cell is embedded then we need to go out to its parent cell and propogate the output port */
	
						/*  this is not an instance cell then back cell is the parent */
						back_cell = found_cell_net->driven[j]->d_t.cells_ports.port_reference->back_cell;
	
						/* temp_internal_signal is not lost memory since I record it in the queue add with TRUE (ou_freed later) */
						temp_internal_signal = oEgu_add_an_internal_signal_of_a_user_created_cell(
														found_cell_net->driven[j]->d_t.cells_ports.port_reference, 
														back_cell);
						temp_net_pointer = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (
														back_cell,
														temp_internal_signal);
	
						/* this is not a top cell, so recurse this function with that cell */
						oFn_add_propogate_output_wire_name_to_queue(
							back_cell->back_cell,
							node_from, 
							output_pin_from,
							temp_net_pointer,
							NULL,
							TRUE);
					}
					else if (instance_cell != NULL)
					{
						/*  this is not an instance cell, then node from is already recorded */
						back_cell = instance_cell;
						
						temp_internal_signal = oEgu_add_an_internal_signal_of_a_user_created_cell(
														found_cell_net->driven[j]->d_t.cells_ports.port_reference, 
														back_cell);
						temp_net_pointer = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (
														back_cell,
														temp_internal_signal);
	
						/* this is not a top cell, so recurse this function with that cell */
	
						oFn_add_propogate_output_wire_name_to_queue(
							back_cell->back_cell,
							node_from, 
							output_pin_from,
							temp_net_pointer,
							NULL,
							TRUE);
					}
					else
					{
						/* ELSE - this is the top cell, so create a node for this output pin */
						node_t *output_node;
	
						output_node = onu_allocate_output_node(found_cell_net->driven[j]->d_t.cells_ports.port_reference);
	
						/* now record the node from */
						/* record the backwards link.  From the node_from's output pins to this node */
						temp_array_index = onu_add_output_pointer_to_node(node_from, output_node, output_pin_from, 0);
						onu_set_input_pointer_to_node(output_node, node_from, 0, output_pin_from, temp_array_index);
					}
				}
				else if (found_cell_net->driven[j]->driver_type == CELLS_INTERNALS)
				{
					/* ELSE - this is an internally defined port.  Define this cells internal port and recursively propogate into it */
	
					/* Instance_pointers should not have internal cells */
					assert(instance_cell == NULL);
	
					net_pointer_t *temp_net_pointer = oEgu_allocate_a_temp_cell_net_pointer_for_a_port (
							found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance, 
							found_cell_net->driven[j]->d_t.cells_internals.signal_reference->i_t.generated_cell.cell_port);
	
					/* recursive call to propogate this signal */
					if (found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance->cell_type == INSTANCE_CELL_POINTER)
					{
						/* IF - the cell we are about to propogate through is an instance_cell_pointer then special parameters */
						oFn_add_propogate_output_wire_name_to_queue(
							((instance_cell_t*)found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance)->cell_definition, 
							node_from, 
							output_pin_from,
							temp_net_pointer,
							found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance, 
							FALSE);
					}
					else
					{
						/* ELSE - just a normal traverse */
						oFn_add_propogate_output_wire_name_to_queue(
							found_cell_net->driven[j]->d_t.cells_internals.signal_reference->cell_instance, 
							node_from, 
							output_pin_from,
							temp_net_pointer,
							NULL,
							FALSE);
					}
				}
			}
		}
		else if ((current_cell->cell_type == GENERATED_CELL) &&
			(((generated_cell_t*)current_cell)->macro_cell_type != MACRO_NONE))
		{
			/* ELSE IF - This is an embedded LPM.  Take the net_pointer and hook it up */
			if (((generated_cell_t*)current_cell)->node_to != NULL)
			{
				/* IF - this is a cell */
				found_node = ((generated_cell_t*)current_cell)->node_to;
			}
			else
			{
				/* IF - this is an instance cell need to find it from the hash */
	
				/* now create a has entry based on the instance name + the cells name */
				sprintf(oash_name_entry, "%s_%s", 
						instance_cell->cell_instance_name, 
						current_cell->cell_definition_name);
	
				/* now add this string to the hash */
				oash_idx = sc_add_string(instance_node_hash, oash_name_entry);
				
				/* if we have already defined this type of gate return */
			 	if(instance_node_hash->data[oash_idx] == NULL)
				{
					assert(FALSE);
				}
				/* copy out the node from the hash */
			 	found_node = (node_t*)instance_node_hash->data[oash_idx];
			}
	
			/* get the pin idx */
			pin_idx = propogation_net_pointer->d_t.cells_ports.port_reference->pin_order;
	
			assert(onu_get_input_pins_node(found_node->input_pins[pin_idx]) == NULL);
			/* now update the node with the input node pointer */
			/* record the backwards link.  From the node_from's output pins to this node */
			temp_array_index = onu_add_output_pointer_to_node(node_from, found_node, output_pin_from, pin_idx);
			onu_set_input_pointer_to_node(found_node, node_from, pin_idx, output_pin_from, temp_array_index);
	
			/* now propogate this defined cells outputs forward */
			oFn_propogate_outputs_from_hetero_node(found_node, instance_node_hash, instance_cell, current_cell);
		}

		/* now that the structure has been used we can ou_free it */
		oFn_free_output_propogate_struct(current_front_of_queue);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_flatten_pass)
 * 	This pass converts ports into pointers that describe who generated the fundamental signal.
 *-------------------------------------------------------------------------------------------*/
void oFn_flatten_pass(cell_t *top_cell, STRING_CACHE *instance_node_hash)
{
	int i;
	net_pointer_t *temp_net_point;
	
	/* create the queue which will be used by the wire propogation function */
	wire_propogate_queue = LinkedListAlloc(ComparePointers);

	input_nodes = (node_t**)ou_malloc(sizeof(node_t *)* top_cell->num_cells_input_ports, HETS_FLAT_NETLIST);
	num_input_nodes = top_cell->num_cells_input_ports;

	/* high-level start, therefore we are at the first top_cell and need to turn all its inputs into wires that will be propogated forward */
	for (i = 0; i < top_cell->num_cells_input_ports; i++)
	{
		/* create a net_pointer to lookup */
		temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_a_port (top_cell, top_cell->cells_input_ports[i]);

		/* create the node for this input */
		input_nodes[i] = onu_allocate_input_node(top_cell->cells_input_ports[i], i);

		/* add all the wires to be propogated this output forward */
		oFn_add_propogate_output_wire_name_to_queue(top_cell, 
													input_nodes[i],
													0,
													temp_net_point,
													NULL,
													FALSE);
	}

	/* propogate these output forward */
	oFn_propogate_output_wire_name_through_cell(instance_node_hash);

	/* make sure that all the values were propogated */
	assert(LinkedListSize(wire_propogate_queue) == 0);

	/* still need to check all cells for zero and one nodes */
	oFn_look_and_propogate_zero_and_one_cells(top_cell, instance_node_hash, NULL);

	/* propogate these zero one outputs forward */
	oFn_propogate_output_wire_name_through_cell(instance_node_hash);

	/* make sure that all the values were propogated */
	assert(LinkedListSize(wire_propogate_queue) == 0);

	/* propogate these output forward */
	oFn_propogate_output_wire_name_through_cell(instance_node_hash);

	/* ou_free the queue */
	assert(LinkedListSize(wire_propogate_queue) == 0);
	LinkedListFree(wire_propogate_queue);

	/* ONCE EVRYTHING IS FLATTENED */
	oFn_check_for_memory_address_extra_flip_flops_for_statix_implementation();
}


/*---------------------------------------------------------------------------------------------
 * (function: oFn_check_for_memory_address_extra_flip_flops_for_statix_implementation)
 *-------------------------------------------------------------------------------------------*/
void oFn_check_for_memory_address_extra_flip_flops_for_statix_implementation()
{
	int i, j;
	node_t *current_node;

	/* For the memories we need to look for the address lines and bypass the registers into the address */
	for (j = 0; j < num_memories; j++)
	{
		current_node = memories[j]->memory_node;

		int memory_width = ivl_memory_width(memories[j]->memory);
		int address_width = memories[j]->address_width;

		/* Do the A&B port addresses */
		for (i = 2+memory_width; i < 2+memory_width+address_width+address_width; i++)
		{
			assert(current_node != NULL);

			/* check if the node that drives this address is a Flip-Flop - it should be */
			if (onu_get_input_pins_node(current_node->input_pins[i])->node_type == LIBRARY_NODE_FF) 
			{
				/* temporarily record this node */
				node_t *dff = onu_get_input_pins_node(current_node->input_pins[i]);
				int output_pin = onu_get_input_pins_related_output_port(current_node->input_pins[i]);
				int output_pin_array_index = onu_get_input_pins_related_output_port_array_index(current_node->input_pins[i]);
			
				assert(dff != NULL);
				
				/* check if the flip-flop has any other related outputs */
				if (onu_get_output_pins_related_num_level_2(dff->output_pins[0]) > 1)
				{
					/* IF - the flip-flop still has other outputs then need to shrink the number of output ports */

					onu_remove_output_pointer_to_node(dff, output_pin, output_pin_array_index);

					/* replace the input_pins and related output port with the inputs to the flip-flop since we are bypassing is into memory */
					onu_set_input_pointer_to_node(current_node, 
													onu_get_input_pins_node(dff->input_pins[0]), 
													i, 
													onu_get_input_pins_related_output_port(dff->input_pins[0]), 
													onu_get_input_pins_related_output_port_array_index(dff->input_pins[0]));

					onu_add_output_pointer_to_node(current_node->input_pins[i]->input_node, current_node, output_pin, i);
				}
				else
				{
					/* ELSE - this flip-flop can be removed */
					node_t *before_dff = onu_get_input_pins_node(dff->input_pins[0]);
					int before_output_pin = onu_get_input_pins_related_output_port(dff->input_pins[0]);
					int before_output_pin_array_index = onu_get_input_pins_related_output_port_array_index(dff->input_pins[0]);

					/* replace the input_pins and related output port with the inputs to the flip-flop since we are bypassing is into memory */
					onu_set_input_pointer_to_node(current_node, 
													onu_get_input_pins_node(dff->input_pins[0]), 
													i, 
													onu_get_input_pins_related_output_port(dff->input_pins[0]), 
													onu_get_input_pins_related_output_port_array_index(dff->input_pins[0]));

					/* need to change the pointer in the node before the dff so it points to this node */
					onu_set_output_pointer_to_node(before_dff, current_node, before_output_pin, before_output_pin_array_index, i);

					/* tell the clock that it no longer needs to clock this register */
					onu_remove_output_pointer_to_node(onu_get_input_pins_node(dff->input_pins[1]), 
													onu_get_input_pins_related_output_port(dff->input_pins[1]), 
													onu_get_input_pins_related_output_port_array_index(dff->input_pins[1]));

					onu_free_node(dff);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_look_and_propogate_zero_and_one_cells)
 *-------------------------------------------------------------------------------------------*/
void oFn_look_and_propogate_zero_and_one_cells(cell_t *cell, STRING_CACHE *instance_node_hash, cell_t *instance_pointer)
{
	int i;
	internal_signal_t *temp_internal_sig;
	net_pointer_t *temp_net_point;
	node_t *found_node = NULL;
	
	/* now traverse (depth wise) cells instantiated by this cell */
	for (i = 0; i < cell->num_cells_instances; i++)
	{
		if ((cell->cells_instances[i]->cell_type == DEFINED_CELL) &&
				((((defined_cell_t*)cell->cells_instances[i])->cell_index == zero_cell_lib_index) || 
				 (((defined_cell_t*)cell->cells_instances[i])->cell_index == one_cell_lib_index))
		   )
		{
			/* IF - this cell is a defined cell that is a zero or one, then propogate the outputs as wires */

			/* create a net_pointer representing this net */
			temp_internal_sig = oEgu_add_an_internal_signal_of_a_defined_gate (((defined_cell_t*)cell->cells_instances[i])->cell_index, 
																				0, 
																				cell->cells_instances[i]);
			temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (cell->cells_instances[i], temp_internal_sig);

			if (((defined_cell_t*)cell->cells_instances[i])->cell_index == zero_cell_lib_index)
			{
				found_node = gnd_node;
			}
			else if (((defined_cell_t*)cell->cells_instances[i])->cell_index == one_cell_lib_index)
			{
				found_node = vcc_node;
			}

			oFn_add_propogate_output_wire_name_to_queue(
				cell,
				found_node,
				0,
				temp_net_point,
				instance_pointer,
				TRUE);
		}
		else if (cell->cells_instances[i]->cell_type == DEFINED_CELL) 
		{
			/* ELSE - this not a zero or gnd cell */
			continue;
		}
		else if (cell->cells_instances[i]->traversal_flag != EF_FLATTEN_PASS)
		{
			/* ELSE IF - this cell has not been visited yet then mark it and perform the processing */
	
			if (instance_pointer != NULL)
			{
				/* IF - this is not an instance definition cell then we can mark it (instance definition cells need to be traversed multiple times) */
				/* mark the node */
				cell->cells_instances[i]->traversal_flag = EF_FLATTEN_PASS;
			}
	
			/* recursively traverse this node */
			if (cell->cells_instances[i]->cell_type == INSTANCE_CELL_POINTER)
			{
				/* IF - we are going into a instance_pointer cell then pass through to the cell_definition */
				oFn_look_and_propogate_zero_and_one_cells(((instance_cell_t*)cell->cells_instances[i])->cell_definition, instance_node_hash, cell->cells_instances[i]);
			}
			else
			{
				/* ELSE - just go into the next cell */
				oFn_look_and_propogate_zero_and_one_cells(cell->cells_instances[i], instance_node_hash, NULL);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function:  oFn_propogate_outputs_from_library_node)
 * 	This function takes in a defined cell and starts to propogate its output through the
 * 	flattened net-list.
 *-------------------------------------------------------------------------------------------*/
void oFn_propogate_outputs_from_library_node(node_t* node, STRING_CACHE* instance_node_hash, cell_t *instance_pointer)
{
	int j;
	node_t *found_node = NULL;
	internal_signal_t *temp_internal_sig;
	net_pointer_t *temp_net_point;

	/* IF - this cell is a defined cell, then propogate the outputs as wires */
	for (j = 0; j < current_library[node->n_t.library_node.cell_index].ports; j++)
	{
		if ( (current_library[node->n_t.library_node.cell_index].num_output_ports > j) &&
				(onu_get_output_pins_is_output_propogated(node->output_pins[j]) == FALSE))
		{
			/* IF - this is an output port, then create a wire and propogate it */

			/* mark this node propogation */
			node->output_pins[j]->is_output_propogated = TRUE;

			/* create a net_pointer representing this net */
			temp_internal_sig = oEgu_add_an_internal_signal_of_a_defined_gate (node->n_t.library_node.cell_index, 
																				j, 
																				node->n_t.library_node.cell);
			temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (node->n_t.library_node.cell, temp_internal_sig);

			if (node->n_t.library_node.cell_index == zero_cell_lib_index)
			{
				found_node = gnd_node;
			}
			else if (node->n_t.library_node.cell_index == one_cell_lib_index)
			{
				found_node = vcc_node;
			}
			else 
			{
				found_node = node;
			}

			/* propogate this output */
			if (instance_pointer != NULL)
			{
				/* IF - this is an instance_pointer cell then we need to propogate with this cell and the instance_pointer */
				oFn_add_propogate_output_wire_name_to_queue(
						node->n_t.library_node.cell->back_cell,
						found_node,
						j,
						temp_net_point,
						instance_pointer,
						TRUE);
			}
			else
			{
				/* ELSE - just propogating into a normal cell */
				oFn_add_propogate_output_wire_name_to_queue(
						node->n_t.library_node.cell->back_cell,
						found_node,
						j,
						temp_net_point,
						NULL,
						TRUE);
			}

			/* reset found_node */
			found_node = NULL;
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_propogate_outputs_from_hetero_node)
 * 	This function takes in a hetero cell and starts to propogate its output through the
 * 	flattened net-list.
 *-------------------------------------------------------------------------------------------*/
void oFn_propogate_outputs_from_hetero_node(node_t* node, STRING_CACHE* instance_node_hash, cell_t *instance_pointer, cell_t *current_cell)
{
	int j;
	internal_signal_t *temp_internal_sig;
	net_pointer_t *temp_net_point;

	/* propogate the outputs as wires */
	for (j = 0; j < current_cell->num_cells_output_ports; j++)
	{
		if (onu_get_output_pins_is_output_propogated(node->output_pins[j]) == FALSE)
		{
			/* IF - this is an output port that hasn't been propogated before, then create a wire and propogate it */
	
			/* mark this node as propogated */
			node->output_pins[j]->is_output_propogated = TRUE;
	
			/* propogate this output */
			if (instance_pointer != NULL)
			{
				/* IF - this is an instance_pointer cell then we need to propogate with this cell and the instance_pointer */
	
				/* create a net_pointer representing this net */
				temp_internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(current_cell->cells_output_ports[j], instance_pointer);
				temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (instance_pointer, temp_internal_sig);
				
				oFn_add_propogate_output_wire_name_to_queue(
						instance_pointer->back_cell,
						node,
						j,
						temp_net_point,
						NULL,
						TRUE);
			}
			else
			{
				/* ELSE - just propogating into a normal cell */
	
				/* create a net_pointer representing this net */
				temp_internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(current_cell->cells_output_ports[j], current_cell);
				temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (current_cell, temp_internal_sig);
	
				oFn_add_propogate_output_wire_name_to_queue(
						current_cell->back_cell,
						node,
						j,
						temp_net_point,
						NULL,
						TRUE);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_propogate_outputs_from_statement_node)
 *-------------------------------------------------------------------------------------------*/
void oFn_propogate_outputs_from_statement_node(signal_list_t *list, cell_t *current_cell)
{
	int i;
	internal_signal_t *temp_internal_sig;
	net_pointer_t *temp_net_point;
	node_t *temp_node;

	/* go to through each output node of the list */
	for (i = 0; i < list->output_signal_list_size; i++)
	{
		assert(list->output_signal_list[i]->type == NODE_INPUT_OUTPUT);
		assert(list->output_signal_list[i]->t.node_input_output.node_input->input_node != NULL);

		/* Find the node that this output is related to by using the list information */
		temp_node = list->output_signal_list[i]->t.node_input_output.node_input->input_node;

		if (onu_get_output_pins_is_output_propogated(temp_node->output_pins[list->output_signal_list[i]->t.node_input_output.node_input->input_pins_related_output_port]) == FALSE)
		{
			/* IF - this is an output port that hasn't been propogated before, then create a wire and propogate it */
		
			/* mark this node as propogated.  Pin number is determined by the recorded list information */
			temp_node->output_pins[list->output_signal_list[i]->t.node_input_output.node_input->input_pins_related_output_port]->is_output_propogated = TRUE;
		
			/* create a net_pointer representing this net. */
			temp_internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(current_cell->cells_output_ports[i], current_cell);
			temp_net_point = oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal (current_cell, temp_internal_sig);
	
			oFn_add_propogate_output_wire_name_to_queue(
					current_cell->back_cell,
					temp_node,
					list->output_signal_list[i]->t.node_input_output.node_input->input_pins_related_output_port,
					temp_net_point,
					NULL,
					TRUE);
			
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_depth_first_traversal_start)
 * 	Generic depth first traversal of flattened net-list.  Good for template and debugging.
 *-------------------------------------------------------------------------------------------*/
void oFn_depth_first_traversal_start(cell_t *cell, FILE *out)
{
	int i;

	/* start with the primary input list */
	for (i = 0; i < cell->num_cells_input_ports; i++)
	{
		if (input_nodes[i] != NULL)
		{
			oFn_depth_first_traverse(input_nodes[i], out, FLATTEN_TRAVERSE);
		}
	}
	/* now traverse the ground and vcc pins */
	oFn_depth_first_traverse(gnd_node, out, FLATTEN_TRAVERSE);
	oFn_depth_first_traverse(vcc_node, out, FLATTEN_TRAVERSE);
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_depth_first_traverse)
 *-------------------------------------------------------------------------------------------*/
void oFn_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, j;

	tabbed_spaces(1); 

	if (node->mark_number == FLATTEN_TRAVERSE)
	{
		/* IF - this node has already been visited mention it */
		if (node->node_type == LIBRARY_NODE)
		{
			tabbed_printf(out, 0, "Node :%s (%d) already visited\n", node->unique_name, node);
		}
		if (node->node_type == LIBRARY_NODE_FF)
		{
			tabbed_printf(out, 0, "Node ff :%s (%d) already visited\n", node->unique_name, node);
		}
		else if (node->node_type == MACRO_NODE)
		{
			tabbed_printf(out, 0, "Node :%s (%d) already visited\n", node->unique_name, node);
		}
		else if (node->node_type == OUTPUT_NODE)
		{
			tabbed_printf(out, 0, "Node OUTPUT %s already visited\n", node->n_t.output_node.port_string);
		}
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */
		node->mark_number = FLATTEN_TRAVERSE;

		if (node->node_type == LIBRARY_NODE)
		{
			tabbed_printf(out, 0, "Node :%s (%d) is a %s\n", node->unique_name, node, current_library[node->n_t.library_node.cell_index].key);

			for (i = 0; i < node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
				{
					tabbed_printf(out, 0, "Node :%s (%d) traversing on pin:%d_%d\n", node->unique_name, node, i, j);

					if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
					{
						/* recursively depth in */
						oFn_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
					}
				}
			}
		}
		else if (node->node_type == LIBRARY_NODE_FF)
		{
			tabbed_printf(out, 0, "Node :%s (%d) is a %s\n", node->unique_name, node, current_library[node->n_t.library_node_ff.cell_index].key);

			for (i = 0; i < node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
				{
					tabbed_printf(out, 0, "Node :%s (%d) traversing on pin:%d_%d\n", node->unique_name, node, i, j);

					if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
					{
						/* recursively depth in */
						oFn_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
					}
				}
			}
		}
		else if (node->node_type == MACRO_NODE)
		{
			tabbed_printf(out, 0, "Node :%s (%d) is a %d\n", node->unique_name, node, node->n_t.hetero_node.hetero_node_type);

			for (i = 0; i < node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
				{
					tabbed_printf(out, 0, "Node :%s (%d) traversing on pin:%d_%d\n", node->unique_name, node, i, j);

					if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
					{
						/* recursively depth in */
						oFn_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
					}
				}
			}
		}
		else if (node->node_type == INPUT_NODE)
		{
			for (i = 0; i < node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
				{
					tabbed_printf(out, 0, "Node INPUT %s (%d) traversing on pin:%d_%d\n", node->n_t.output_node.port_string, node, i, j);

					if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
					{
						/* recursively depth in */
						oFn_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
					}
				}
			}
		}
		else if (node->node_type == VCC_GND_NODE)
		{
			for (i = 0; i < node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
				{
					tabbed_printf(out, 0, "Node GND_VCC (%d) traversing on pin:%d_%d\n", node, i, j);

					if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
					{
						/* recursively depth in */
						oFn_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
					}
				}
			}
		}
		else
		{
			tabbed_printf(out, 0, "Node is an OUTPUT\n");
		}
	}

	tabbed_spaces(-1); 
}

node_fifo_t **fifo;
int size_fifo;
/*---------------------------------------------------------------------------------------------
 * (function: oeo_add_to_mini_fifo)
 *-------------------------------------------------------------------------------------------*/
void oFn_add_to_mini_node_fifo (node_t *current_node, node_t *add_node, int pin) 
{
	fifo = (node_fifo_t**)ou_realloc(fifo, sizeof(node_fifo_t*)*(size_fifo+1), HETS_FLAT_NETLIST);
	fifo[size_fifo] = (node_fifo_t*)ou_malloc(sizeof(node_fifo_t), HETS_FLAT_NETLIST);
	fifo[size_fifo]->node = current_node;
	fifo[size_fifo]->who_added = add_node;
	fifo[size_fifo]->pin = pin;
	size_fifo++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oFn_depth_first_traversal_from_PO_start)
 * 	Generic depth first traversal of flattened net-list from the PO in.
 *-------------------------------------------------------------------------------------------*/
void oFn_depth_first_traversal_from_PO_start_to_check_liveness(short offset)
{
	int i, j;
	int current_index_fifo = 0;
	node_t *cur_node;
	node_t *comparison_node;
	int new_offset = offset*10;

	size_fifo = 0;
	fifo = NULL;

	/* start with the primary output list by adding them all to the depth search stack */
	for (i = 0; i < num_output_nodes; i++)
	{
		if (output_nodes[i] != NULL)
		{
			oFn_add_to_mini_node_fifo(output_nodes[i], NULL, 0);
		}
	}

	while (size_fifo != current_index_fifo)
	{
		cur_node = fifo[current_index_fifo]->node;

		/* check if we have visited this node before */
		if (cur_node->mark_number_live != LIVE_ANALYSIS_MARK_BACKWARDS+new_offset)
		{
			/* IF -  this node has not been marked yet then traverse all the inputs */
			
			/* mark the node */
			cur_node->mark_number_live= LIVE_ANALYSIS_MARK_BACKWARDS+new_offset;

			for (i = 0; i < cur_node->num_input_pins; i++)
			{
				comparison_node = onu_get_input_pins_node(cur_node->input_pins[i]);

				if ((comparison_node != NULL) &&
						(!((comparison_node->mark_number_live == LIVE_ANALYSIS_MARK_BACKWARDS+new_offset) || 
						   (comparison_node->mark_number_live == LIVE_ANALYSIS_INPUTED_BACKWARDS+new_offset))))
				{
					/* IF - this node exists and we haven't already visited then add each of the input nodes to the fifo */
					if (comparison_node->mark_number_live != LIVE_ANALYSIS_MARK_BACKWARDS+new_offset)
					{
						/* IF - this hasn't been specially marked then mark that it has been added to the queue */
						comparison_node->mark_number_live = LIVE_ANALYSIS_INPUTED_BACKWARDS+new_offset;
					}

					oFn_add_to_mini_node_fifo(comparison_node, cur_node, i);
				}
			}
		}

		/* go to the next item in the fifo */
		current_index_fifo ++;
	}

	/* finally free the miniature fifo */
	for (i = 0; i < size_fifo; i++)
	{
		ou_free(fifo[i]);
	}
	if (size_fifo > 0)
	{
		ou_free(fifo);
	}

	/* NOW go through the list the other way and flag any node that wasn't marked by the backward traversal */

	size_fifo = 0;
	fifo = NULL;
	current_index_fifo = 0;

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			oFn_add_to_mini_node_fifo(input_nodes[i], NULL, 0);
		}
	}
	/* now traverse the ground and vcc pins */
	oFn_add_to_mini_node_fifo(gnd_node, NULL, 0);
	oFn_add_to_mini_node_fifo(vcc_node, NULL, 0);

	while (size_fifo != current_index_fifo)
	{
		cur_node = fifo[current_index_fifo]->node;

		/* check if we have visited this node before */
		if (cur_node->mark_number != LIVE_ANALYSIS_MARK_FORWARDS+new_offset)
		{
			/* IF - this node hasn't been visited then check for backward mark */

			for (i = 0; i < cur_node->num_output_pins; i++)
			{
				for (j = 0; j < onu_get_output_pins_related_num_level_2(cur_node->output_pins[i]); j++)
				{
					if ((onu_get_output_pins_node(cur_node->output_pins[i], j) != NULL) &&
						(!((onu_get_output_pins_node(cur_node->output_pins[i], j)->mark_number == LIVE_ANALYSIS_MARK_FORWARDS+new_offset) || 
						   (onu_get_output_pins_node(cur_node->output_pins[i], j)->mark_number == LIVE_ANALYSIS_INPUTED_FORWARDS+new_offset))))
					{
						/* IF - this node exists and we haven't already visited then add each of the input nodes to the fifo */
						if (onu_get_output_pins_node(cur_node->output_pins[i], j)->mark_number != LIVE_ANALYSIS_MARK_FORWARDS+new_offset)
						{
							/* IF - this hasn't been specially marked then mark that it has been added to the queue */
							onu_get_output_pins_node(cur_node->output_pins[i], j)->mark_number = LIVE_ANALYSIS_INPUTED_FORWARDS+new_offset;
						}

						/* add to fifo */
						oFn_add_to_mini_node_fifo (onu_get_output_pins_node(cur_node->output_pins[i], j), cur_node, i);
					}
				}
			}

			if ((cur_node->mark_number_live != LIVE_ANALYSIS_MARK_BACKWARDS+new_offset) && (cur_node->node_type != VCC_GND_NODE)) 
			{
				/* IF -  this node has not been marked yet then we have found a dead node */
				
				fprintf(log_file, "FOUND dead node: %s\n", cur_node->unique_name);
				
				/* looks at details around node for debugging purposes */
				ond_depth_min_traverse(cur_node, log_file);

				/* remove node from the graph */

				/* remove entries any nodes have that input to this node */
				onu_remove_nodes_links(cur_node);

				/* remove this entry from any lists that record info about this node */
				onu_remove_node_from_relevant_lists(cur_node);

				/* free node */
				onu_free_node(cur_node);
			}
			else
			{
				/* mark the node */
				cur_node->mark_number = LIVE_ANALYSIS_MARK_FORWARDS+new_offset;
			}
		}

		/* go to the next item in the fifo */
		current_index_fifo ++;
	}

	for (i = 0; i < size_fifo; i++)
	{
		ou_free(fifo[i]);
	}
	if (size_fifo > 0)
	{
		ou_free(fifo);
	}
}
