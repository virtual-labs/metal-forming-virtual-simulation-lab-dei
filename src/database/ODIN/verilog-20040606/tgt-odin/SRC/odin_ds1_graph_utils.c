
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

/* This file contains all the utility functions that handle the first data structure in the software.  This first data structure is 
 * a hierarchical one that closely resembles the IR presented by ICARUS.  
 * 
 * Throughout this file there is initialization for the data structures, some searching techniques that fines specific elements,
 * and finally, a way to traverse the data structure.  
 * 
 * These files are called EDIF stuff since historically, this is where I started on my path to Verilog synthesis through Icarus.
 * My original attempts were all EDIF files, so this stuff is still hanging around.  It took me a long time to get EDIF stuff generated,
 * so I haven't reimplemented this stuff through the flattened data structure (I have for the statements and expressions).  This
 * stuff is clunky, but works for now.
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

int number_of_cell_allocates;
STRING_CACHE *logic_definition_cells;
STRING_CACHE *lpm_definition_cells;
STRING_CACHE *logic_instance_cells;
STRING_CACHE *lpm_instance_cells;
STRING_CACHE *net_lookup_hash;

cell_t **BFS_stack;
int num_BFS_stack;

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_initialize)
 * 	Initializes things needed for the data struct representation of the circuit.  Mainly,
 * 	we create the hashes.
 *-------------------------------------------------------------------------------------------*/
void oEgu_initialize ()
{
	number_of_cell_allocates = 0;

	logic_definition_cells = sc_new_string_cache();
	lpm_definition_cells = sc_new_string_cache();
	logic_instance_cells = sc_new_string_cache();
	lpm_instance_cells = sc_new_string_cache();

	net_lookup_hash = sc_new_string_cache();
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_uninitialize)
 *  Cleans the hashes
 *-------------------------------------------------------------------------------------------*/
void oEgu_uninitialize ()
{
	sc_free_string_cache(logic_definition_cells);
	sc_free_string_cache(lpm_definition_cells);
	sc_free_string_cache(logic_instance_cells);
	sc_free_string_cache(lpm_instance_cells);
	sc_free_string_cache(net_lookup_hash);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_cell_port)
 * 	Create and initialize a cell_ports_t.  These are ports of a cell.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_allocate_a_cell_port ()
{
	cell_ports_t *return_node;

	return_node = (cell_ports_t*)ou_malloc_struct(sizeof(cell_ports_t), HETS_EDIF_GRAPH_UTILS_1);

	return_node->back_cell = NULL;
	return_node->port_type = -1;
	return_node->pin_id = -1;
	return_node->pin_order = -1;
	return_node->IN_OUT = -1;
	return_node->do_not_copy = FALSE;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_a_cell_port)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_cell_port (cell_ports_t *to_free)
{
	if (to_free->port_type == USER_NAMED)
	{
		ou_free(to_free->p_t.user_named.name);
	}
	
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_copy_a_cell_port)
 * 	Copies the details of a port into another port.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_copy_a_cell_port_defined_by_a_signal(cell_ports_t *old_port)
{
	cell_ports_t *copy_port;

	assert(old_port->p_t.user_named.name != NULL);

	/* create a cell port */
	if (old_port->port_type == SIGNAL_NAMED)
	{
		copy_port = oEgu_add_a_cell_port_defined_by_a_signal(old_port->p_t.signal_named.signal, old_port->pin_id, old_port->IN_OUT);
	}
	else if (old_port->port_type == USER_NAMED)
	{
		copy_port = oEgu_add_a_cell_port_defined_by_user(old_port->p_t.user_named.name, old_port->pin_id, old_port->IN_OUT);
	}

	return copy_port;	
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_cell_port)
 * 	Adds a cell port based on icarus signals.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_add_a_cell_port_defined_by_a_signal(ivl_signal_t signal, int pin_id, short port_direction)
{
	cell_ports_t *return_cell;

	assert(signal != NULL);

	/* allocate the structure */
	return_cell = oEgu_allocate_a_cell_port();

	/* record that this is signal named */
	return_cell->port_type = SIGNAL_NAMED;

	/* Record the signal, pin_id, and direction */
	return_cell->p_t.signal_named.signal = signal;
	return_cell->pin_id = pin_id;
	return_cell->IN_OUT = port_direction;

	/* return the cell structure */	
	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_cell_port_defined_by_user)
 * 	Adds a cell port based on a string named by the user.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_add_a_cell_port_defined_by_user(char* name, int pin_id, short port_direction)
{
	cell_ports_t *return_cell;

	assert(name != NULL);

	/* allocate the structure */
	return_cell = oEgu_allocate_a_cell_port();

	/* record this is user named */
	return_cell->port_type = USER_NAMED;

	/* Record the signal, pin_id, and direction */
	return_cell->p_t.user_named.name = ou_strdup(name, HETS_EDIF_GRAPH_UTILS_STRDUP_1);
	return_cell->pin_id = pin_id;
	return_cell->IN_OUT = port_direction;

	/* return the cell structure */	
	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_compare_ports)
 * 	Checks if two ports are the same starting with pin and going to naming.
 *-------------------------------------------------------------------------------------------*/
int oEgu_compare_ports(cell_ports_t *cell1, cell_ports_t *cell2)
{
	char *s1, *s2;

	if ((cell1->port_type == cell2->port_type) && (cell1->pin_id == cell2->pin_id))
	{
		/* IF - first check if they have the same port type and pin number */
		if (cell1->port_type == SIGNAL_NAMED)
		{
			/* IF - signal named then compare the strings */
			
			/* have to duplicate since ivl_signal_name does allocation to static variable */
			s1 = strdup((char*)ivl_signal_name(cell1->p_t.signal_named.signal));
			s2 = strdup((char*)ivl_signal_name(cell2->p_t.signal_named.signal));
//			if (strcmp((char*)ivl_signal_name(cell1->p_t.signal_named.signal), (char*)ivl_signal_name(cell2->p_t.signal_named.signal)) == 0)
//			if (ou_do_strings_match(((char*)ivl_signal_name(cell1->p_t.signal_named.signal)), ((char*)ivl_signal_name(cell2->p_t.signal_named.signal))) == TRUE)
			if (ou_do_strings_match(s1, s2) == TRUE)
			{
				ou_free(s1);
				ou_free(s2);
				return TRUE;
			}
			ou_free(s1);
			ou_free(s2);
		}
		else if (cell1->port_type == USER_NAMED)
		{
			/* IF - user named then compare the strings */
			if (ou_do_strings_match(cell1->p_t.user_named.name, cell2->p_t.user_named.name) == TRUE)
			//if (strcmp(cell1->p_t.user_named.name, cell2->p_t.user_named.name) == 0)
			{
				return TRUE;
			}
		}
	}

	return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generate_port_string)
 * 	Generates a string from the details of the port.  This string should be unique.
 *-------------------------------------------------------------------------------------------*/
char *oEgu_generate_port_string(cell_ports_t *port)
{
	char *long_line;
	char *ivl_signal_named;

	if (port->port_type == USER_NAMED)
	{
		long_line = (char*)ou_malloc(strlen(port->p_t.user_named.name) + 1 + 10 + 1, HETS_EDIF_GRAPH_UTILS_2);
		sprintf(long_line, "%s_%d",  port->p_t.user_named.name, port->pin_id);
	}
	else if (port->port_type == SIGNAL_NAMED)
	{
		NAME(printf("%s", (char*)ivl_signal_name(port->p_t.signal_named.signal)););
		ivl_signal_named = (char*)ivl_signal_name(port->p_t.signal_named.signal);
		long_line = (char*)ou_malloc(strlen(ivl_signal_named) + 1 + 10 + 1, HETS_EDIF_GRAPH_UTILS_2);
		sprintf(long_line, "%s_%d",  ivl_signal_named, port->pin_id);
	}

	return long_line;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generate_port_signal_string)
 * 	Returns a string version of the name of the port.  Note that this uses a static return
 * 	variable from ivl_signal_name, which means you can't have two of these at the same time.
 * 	As of Sept 06 2004 this is ok.
 *-------------------------------------------------------------------------------------------*/
char *oEgu_generate_port_signal_string(cell_ports_t *port)
{
	if (port->port_type == USER_NAMED)
	{
		return port->p_t.user_named.name;
	}
	else if (port->port_type == SIGNAL_NAMED)
	{
		NAME(printf("%s", (char*)ivl_signal_name(port->p_t.signal_named.signal)););
		return (char*)ivl_signal_name(port->p_t.signal_named.signal);
	//a	return (char*)ivl_signal_basename(port->p_t.signal_named.signal);
	}
	else
	{
		assert(0);
		return NULL;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_an_internal_signal)
 * 	Create an internal signal.  Internal signals represent any signal in a cell which is
 * 	not from its own cell_ports_t.
 *-------------------------------------------------------------------------------------------*/
internal_signal_t *oEgu_allocate_an_internal_signal ()
{
	internal_signal_t *return_node;

	return_node = (internal_signal_t*)ou_malloc_struct(sizeof(internal_signal_t), HETS_EDIF_GRAPH_UTILS_3);

	return_node->instance_type = -1;
	return_node->cell_instance = NULL;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_an_internal_signal)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_an_internal_signal (internal_signal_t *to_free)
{
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_an_internal_signal_of_a_defined_gate)
 * 	Add an internal signal based on a defined gate like an AND or DFF.
 *-------------------------------------------------------------------------------------------*/
internal_signal_t *oEgu_add_an_internal_signal_of_a_defined_gate (long cell_index, int cell_port_id, cell_t *defined_gate_instance)
{
	internal_signal_t *return_cell;

	/* create the structure */
	return_cell = oEgu_allocate_an_internal_signal();

	/* update the tpye to reflect defined gate */
	return_cell->instance_type = DEFINED_CELL;

	/* store the index and port_id */
	return_cell->i_t.defined_cell.cell_index = cell_index;
	return_cell->i_t.defined_cell.cell_port_id = cell_port_id;

	/* record the cell instance this signal points to */
	return_cell->cell_instance = defined_gate_instance;

	/* return the created cell */	
	return return_cell;
}
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_an_internal_signal_of_a_user_created_cell)
 * 	Add an internal signal for a general cell type.  These signals are based on 
 * 	the defines cell's ports.
 *-------------------------------------------------------------------------------------------*/
internal_signal_t *oEgu_add_an_internal_signal_of_a_user_created_cell(cell_ports_t *cell_port, cell_t *defined_gate_instance)
{
	internal_signal_t *return_cell;

	assert(cell_port != NULL);
	assert(cell_port->p_t.user_named.name != NULL);

	/* create the structure */
	return_cell = oEgu_allocate_an_internal_signal();

	/* update the tpye to reflect a user generated gate */
	return_cell->instance_type = GENERATED_CELL;

	/* store the index and port_id */
	return_cell->i_t.generated_cell.cell_port = cell_port;

	/* record the cell instance this signal points to */
	return_cell->cell_instance = defined_gate_instance;

	/* return the created cell */	
	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generate_internal_string)
 * 	Generate a unique string from an internal signal.
 *-------------------------------------------------------------------------------------------*/
char *oEgu_generate_internal_string(internal_signal_t *sig_ref)
{
	char *long_line;

	if (sig_ref->instance_type == DEFINED_CELL)
	{
		/* IF - this is a library instance then create a string */
		assert (sig_ref->cell_instance->cell_instance_name != NULL)
		/* allocate enough space for the full name */
		long_line = (char*)ou_malloc(strlen(sig_ref->cell_instance->cell_instance_name) + 1 + 10 + 10 + 1, HETS_EDIF_GRAPH_UTILS_4);

		/* record the name in a string */
		sprintf(long_line, "%s_%d_%d", 
				sig_ref->cell_instance->cell_instance_name, 
				sig_ref->i_t.defined_cell.cell_index, 
				sig_ref->i_t.defined_cell.cell_port_id);
	}
	else if (sig_ref->instance_type == GENERATED_CELL)
	{
		/* ELSE IF - this a generated_cell then use the port string generator */
		long_line = oEgu_generate_port_string(sig_ref->i_t.generated_cell.cell_port);
	}

	return long_line;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_compare_internal_signals)
 * 	Compares 2 internal signals.
 *-------------------------------------------------------------------------------------------*/
int oEgu_compare_internal_signals(internal_signal_t *sig1, internal_signal_t *sig2)
{
	if ((sig1->instance_type == sig2->instance_type) && (sig1->cell_instance == sig2->cell_instance))
	{
		if ((sig1->instance_type == DEFINED_CELL) && 
				(sig1->i_t.defined_cell.cell_index == sig2->i_t.defined_cell.cell_index) && 
				(sig1->i_t.defined_cell.cell_port_id == sig2->i_t.defined_cell.cell_port_id))
		{
			return TRUE;
		}
		else if ((sig1->instance_type == GENERATED_CELL) &&
				(oEgu_compare_ports(sig1->i_t.generated_cell.cell_port, sig2->i_t.generated_cell.cell_port)))
		{
			return TRUE;
		}
	}
	return FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_cell_net_pointer)
 * 	Create a net pointer.  net pointers contain either an internal signal or the cell's
 * 	port.  This simplifies nets since they only have to conisist of net_pointers.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_cell_net_pointer ()
{
	net_pointer_t *return_node;

	return_node = (net_pointer_t*)ou_malloc_struct(sizeof(net_pointer_t), HETS_EDIF_GRAPH_UTILS_5);

	return_node->back_net = NULL;
	return_node->driver_type = -1;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_a_cell_net_pointer)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_cell_net_pointer (net_pointer_t *to_free)
{
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_temp_cell_net_pointer_for_a_port)
 * 	Create a net pointer based on a port.  Sibling function also adds to a hash.  Not needed
 * 	here.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_temp_cell_net_pointer_for_a_port (cell_t *this_cell, cell_ports_t *port_reference)
{
	net_pointer_t *return_cell;

	assert(port_reference != NULL);
	assert(port_reference->p_t.user_named.name != NULL);

	/* allocate the cell */
	return_cell = oEgu_allocate_a_cell_net_pointer();

	/* record that this a port reference */
	return_cell->driver_type = CELLS_PORTS;

	/* record the port reference */
	return_cell->d_t.cells_ports.port_reference = port_reference;

	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_cell_net_pointer_for_a_port)
 * 	Create a net pointer based on a port.  Also add this net to the hash so it can be looked
 * 	up quickly.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_cell_net_pointer_for_a_port (cell_t *this_cell, cell_ports_t *port_reference)
{
	net_pointer_t *return_cell;
	int i;
	char *port_string;

	assert(port_reference != NULL);
	assert(port_reference->p_t.user_named.name != NULL);

	/* allocate the cell */
	return_cell = oEgu_allocate_a_cell_net_pointer();

	/* record that this a port reference */
	return_cell->driver_type = CELLS_PORTS;

	/* record the port reference */
	return_cell->d_t.cells_ports.port_reference = port_reference;

	port_string = oEgu_generate_port_string(port_reference);

	assert(this_cell->cell_type == GENERATED_CELL);
	/* add the net_pointer to the HASH */
	i = sc_add_string(((generated_cell_t*)this_cell)->net_pointer_hash, port_string);
    if(((generated_cell_t*)this_cell)->net_pointer_hash->data[i] == NULL)
	{
		/* store this cell in the logic cells */
		((generated_cell_t*)this_cell)->net_pointer_hash->data[i] = (void*)return_cell;
	}
	ou_free(port_string);

	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_temp_cell_net_pointer_for_an_internal_signal)
 * 	Create a net pointer for an internal signal.  Doesn't add to hash
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal(cell_t *this_cell, internal_signal_t *signal_reference)
{
	net_pointer_t *return_cell;

	/* allocate the cell */
	return_cell = oEgu_allocate_a_cell_net_pointer();

	/* record that this a internal signal  reference */
	return_cell->driver_type = CELLS_INTERNALS;

	/* record the port reference */
	return_cell->d_t.cells_internals.signal_reference = signal_reference;

	return return_cell;
}
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_cell_net_pointer_for_an_internal_signal)
 * 	Create a net pointer for an internal signal and add it to the hash.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(cell_t *this_cell, internal_signal_t *signal_reference)
{
	net_pointer_t *return_cell;
	int i;
	char *internal_string;

	/* allocate the cell */
	return_cell = oEgu_allocate_a_cell_net_pointer();

	/* record that this a internal signal  reference */
	return_cell->driver_type = CELLS_INTERNALS;

	/* record the port reference */
	return_cell->d_t.cells_internals.signal_reference = signal_reference;

	/* create an internal string to look up into the hash */
	internal_string = oEgu_generate_internal_string(signal_reference);

	assert(this_cell->cell_type == GENERATED_CELL);
	/* add the net_pointer to the HASH */
	i = sc_add_string(((generated_cell_t*)this_cell)->net_pointer_hash, internal_string);
    if(((generated_cell_t*)this_cell)->net_pointer_hash->data[i] == NULL)
	{
		/* store this cell in the logic cells */
		((generated_cell_t*)this_cell)->net_pointer_hash->data[i] = (void*)return_cell;
	}

	ou_free(internal_string);
	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generate_a_net_pointer_string)
 * 	Creates a string for the net_pointer.
 *-------------------------------------------------------------------------------------------*/
char *oEgu_generate_a_net_pointer_string(net_pointer_t *net_pointer)
{
	char *long_line;
	char *temp_string;
	char *cell_name;

	if (net_pointer->driver_type == CELLS_PORTS)
	{
		/* IF - this a port then create the port string since that is all we need to return */
		temp_string = oEgu_generate_port_string(net_pointer->d_t.cells_ports.port_reference);

		cell_name = oEgu_get_cell_char(net_pointer->d_t.cells_ports.port_reference->back_cell);
	}
	else if (net_pointer->driver_type == CELLS_INTERNALS)
	{
		/* ELSE - we need an internal signal string name,  This includes the signal name and the instance its from. */
		temp_string = oEgu_generate_internal_string(net_pointer->d_t.cells_internals.signal_reference);

		cell_name = oEgu_get_cell_char(net_pointer->d_t.cells_internals.signal_reference->cell_instance);
	}

	assert(cell_name != NULL);

	long_line = (char*)ou_malloc(strlen(temp_string)+strlen(cell_name)+2, HETS_EDIF_GRAPH_UTILS_6);
	sprintf(long_line, "%s|%s", temp_string, cell_name);

	ou_free(temp_string);

	return long_line;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_net_pointer_driver_in_this_cells_nets)
 * 	Search in the hash for a net pointer based on a signal name and a pin.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_lookup_net_pointer_driver_in_this_cells_nets(cell_t *this_cell, char *signal_name, int pin)
{
	char *search_line = (char*)ou_malloc(4096, HETS_EDIF_GRAPH_UTILS_7);
	int i;

	sprintf(search_line, "%s_%d", signal_name, pin);

	assert(this_cell->cell_type == GENERATED_CELL);
	/* add the net_pointer to the HASH */
	i = sc_add_string(((generated_cell_t*)this_cell)->net_pointer_hash, search_line);
	if(((generated_cell_t*)this_cell)->net_pointer_hash->data[i] == NULL)
	{
		ou_free(search_line);
		return NULL;
	}

	ou_free(search_line);

	return (net_pointer_t *)((generated_cell_t*)this_cell)->net_pointer_hash->data[i];
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_create_net_pointers_list_from_local_cell_ports_list)
 * 	Converts a list of cells into a list of net pointers.  This list is allocated and needs
 * 	to be freed after usage.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t **oEgu_create_net_pointers_list_from_local_cell_ports_list(cell_t *parent_cell, cell_ports_t **cells_ports, int width)
{
	net_pointer_t **return_list;
	int i;

	return_list = (net_pointer_t**)ou_malloc(sizeof(net_pointer_t*)*width, HETS_EDIF_GRAPH_UTILS_8);

	for (i = 0; i < width; i++)
	{
		assert(cells_ports[i]->p_t.user_named.name != NULL);

		return_list[i] = oEgu_allocate_a_cell_net_pointer_for_a_port(parent_cell, cells_ports[i]);
	}	

	return return_list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_create_net_pointers_list_from_ports_of_internal_user_defined_cell)
 * 	Converts a list of cells with their instance cell into net pointers.  Each of these returns
 * 	is an internally allocated array that needs to be freed.
 *-------------------------------------------------------------------------------------------*/
net_pointer_t **oEgu_create_net_pointers_list_from_ports_of_internal_user_defined_cell(cell_t *parent_cell, cell_t *internal_cell, cell_ports_t **cells_ports, int width)
{
	net_pointer_t **return_list;
	int i;
	internal_signal_t *new_internal_signal;

	return_list = (net_pointer_t**)ou_malloc(sizeof(net_pointer_t*)*width, HETS_EDIF_GRAPH_UTILS_9);

	for (i = 0; i < width; i++)
	{
		assert(cells_ports[i]->p_t.user_named.name != NULL);

		new_internal_signal = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_ports[i], internal_cell);
		return_list[i] = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(parent_cell, new_internal_signal);
	}	

	return return_list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_cell_net)
 * 	Create a net.  A net has one driver and multiple driven.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_allocate_a_cell_net ()
{
	cell_nets_t *return_node;

	return_node = (cell_nets_t*)ou_malloc_struct(sizeof(cell_nets_t), HETS_EDIF_GRAPH_UTILS_10);

	return_node->back_cell = NULL;
	return_node->driver = NULL;
	return_node->driven = NULL;
	return_node->num_driven = 0;
	return_node->traversal_flag = -1;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_a_cell_net)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_cell_net (cell_nets_t *to_free)
{
	int i; 

	/* ou_free the driver port */
	if (to_free->driver != NULL)
	{
		oEgu_free_a_cell_net_pointer(to_free->driver);
	}
	
	/* ou_free all the driven ports */
	for (i = 0; i < to_free->num_driven; i++)
	{
		oEgu_free_a_cell_net_pointer(to_free->driven[i]);
	}

	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal)
 * 	Allocates nets if not already created.  Returns the newly created or found net.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(cell_t *cell, internal_signal_t *signal_reference)
{
	net_pointer_t *temp_net_pointer;
	cell_nets_t *return_net;

	temp_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(cell, signal_reference);

	return_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell, temp_net_pointer);

	return return_net;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port)
 * 	Allocates a net for a port if needed.Returns the newly created or found net.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port(cell_t *cell, cell_ports_t *port_reference)
{
	net_pointer_t *temp_net_pointer;
	cell_nets_t *return_net;

	temp_net_pointer = oEgu_allocate_a_cell_net_pointer_for_a_port (cell, port_reference);

	return_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell, temp_net_pointer);

	return return_net;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_cell_neti_if_needed_given_a_net_pointer)
 * 	Wrapped in other functions takes a net_pointer and see if already created a net.  Will
 * 	create if needed.  Returns the newly created or found net.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell_t *cell, net_pointer_t *net_pointer)
{
	char *oash_string;
	long i;
	cell_nets_t *return_net;

	/* add the net to a hash now that we can identify with a net_pointer */
	oash_string = oEgu_generate_a_net_pointer_string(net_pointer);

	assert(cell->cell_type == GENERATED_CELL);
	/* lookup the string and add the net */
	i = sc_add_string(((generated_cell_t*)cell)->net_hash, oash_string);
	ou_free(oash_string);

	if(((generated_cell_t*)cell)->net_hash->data[i] != NULL)
	{
		/* IF - the driver already exists return the found net and delete the net_pointer */
		
		/* ou_free the net_pointer since it already exists */
		oEgu_free_a_cell_net_pointer (net_pointer);

		return ((cell_nets_t *) ((generated_cell_t*)cell)->net_hash->data[i]);
	}
	else
	{
		/* ELSE - create a net, add the net_pointer and return */

		/* create a net */
		return_net = oEgu_allocate_a_cell_net ();

		/* add this net to the cell */
		oEgu_add_a_net_to_a_cell(cell, return_net);

		/* add the net_pointer to this net */
		oEgu_add_a_net_pointer_driver_to_a_cell_net(cell, return_net, net_pointer);

		/* point the net_pointer back */
		net_pointer->back_net = return_net;

		/* add the net */
		((generated_cell_t*)cell)->net_hash->data[i] = (void*)return_net;

		return return_net;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_port_driver_to_a_cell_net)
 * 	Adds a port as the driver of a net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_port_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, cell_ports_t *port_reference)
{
	char *oash_string;
	long i;

	assert(this_cell_net->driver == NULL);
	assert(port_reference->p_t.user_named.name != NULL);
	
	assert(parent_cell->cell_type == GENERATED_CELL);
	this_cell_net->driver = oEgu_allocate_a_cell_net_pointer_for_a_port(parent_cell, port_reference);

	/* refer the net_pointer back to this cell */
	this_cell_net->driver->back_net = this_cell_net;

	/* add the net to a hash now that we can identify with a net_pointer */
	oash_string = oEgu_generate_a_net_pointer_string(this_cell_net->driver);

	/* lookup the string and add the net */
	i = sc_add_string(((generated_cell_t*)parent_cell)->net_hash, oash_string);
	if(((generated_cell_t*)parent_cell)->net_hash->data[i] != NULL)
	{
		assert(0);
	}
	/* now add the net */
	((generated_cell_t*)parent_cell)->net_hash->data[i] = (void*)this_cell_net; 

	ou_free(oash_string);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_internal_driver_to_a_cell_net)
 * 	Adds an internal signal as the driver of this net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_internal_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, internal_signal_t *signal_reference)
{
	char *oash_string;
	long i;

	assert(this_cell_net->driver == NULL);

	assert(parent_cell->cell_type == GENERATED_CELL); // needs to be one type for casting
	this_cell_net->driver = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(parent_cell, signal_reference);

	/* refer the net_pointer back to this cell */
	this_cell_net->driver->back_net = this_cell_net;

	/* add the net to a hash now that we can identify with a net_pointer */
	oash_string = oEgu_generate_a_net_pointer_string(this_cell_net->driver);

	/* lookup the string and add the net */
	i = sc_add_string(((generated_cell_t*)parent_cell)->net_hash, oash_string);
	if(((generated_cell_t*)parent_cell)->net_hash->data[i] != NULL)
	{
		assert(0);
	}
	/* now add the net */
	((generated_cell_t*)parent_cell)->net_hash->data[i] = (void*)this_cell_net; 

	ou_free(oash_string);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_net_pointer_driver_to_a_cell_net)
 * 	Adds a net_pointer (either port or internal signal) as the driver of a net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_net_pointer_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, net_pointer_t *net_point)
{
	char *oash_string;
	long i;

	assert(this_cell_net->driver == NULL);

	this_cell_net->driver = net_point;

	/* refer the net_pointer back to this cell */
	this_cell_net->driver->back_net = this_cell_net;

	/* add the net to a hash now that we can identify with a net_pointer */
	oash_string = oEgu_generate_a_net_pointer_string(this_cell_net->driver);

	assert(parent_cell->cell_type == GENERATED_CELL); // needs to be one type for casting
	/* lookup the string and add the net */
	i = sc_add_string(((generated_cell_t*)parent_cell)->net_hash, oash_string);
	if(((generated_cell_t*)parent_cell)->net_hash->data[i] != NULL)
	{
		assert(0);
	}
	/* now add the net */
	((generated_cell_t*)parent_cell)->net_hash->data[i] = (void*)this_cell_net; 

	ou_free(oash_string);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_port_DRIVEN_to_a_cell_net)
 * 	Adds a port as one of the driven ports of a net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_port_DRIVEN_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, cell_ports_t *port_reference)
{
	assert(port_reference->p_t.user_named.name != NULL);

	/* we need to ou_realloc some space */
	this_cell_net->driven = (net_pointer_t**)ou_realloc(this_cell_net->driven, sizeof(net_pointer_t*)*(this_cell_net->num_driven + 1), HETS_EDIF_GRAPH_UTILS_11);

	/* record the net pointer */
	this_cell_net->driven[this_cell_net->num_driven] = oEgu_allocate_a_cell_net_pointer_for_a_port (parent_cell, port_reference);
	/* refer the net_pointer back to this cell */
	this_cell_net->driven[this_cell_net->num_driven]->back_net = this_cell_net;
	/* increment the count */
	this_cell_net->num_driven++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_internal_DRIVEN_to_a_cell_net)
 * 	Adds an internal signal as a driven part of the net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, internal_signal_t *signal_reference)
{
	/* we need to ou_realloc some space */
	this_cell_net->driven = (net_pointer_t**)ou_realloc(this_cell_net->driven, sizeof(net_pointer_t*)*(this_cell_net->num_driven + 1), HETS_EDIF_GRAPH_UTILS_12);

	/* record the net pointer */
	this_cell_net->driven[this_cell_net->num_driven] = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal (parent_cell, signal_reference);
	/* refer the net_pointer back to this cell */
	this_cell_net->driven[this_cell_net->num_driven]->back_net = this_cell_net;
	/* increment the count */
	this_cell_net->num_driven++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net)
 * 	Adds a net-pointer as a driven part of this net.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(cell_nets_t *this_cell_net, net_pointer_t *net_point)
{
	/*  we need to ou_realloc some space */
	this_cell_net->driven = (net_pointer_t**)ou_realloc(this_cell_net->driven, sizeof(net_pointer_t*)*(this_cell_net->num_driven + 1), HETS_EDIF_GRAPH_UTILS_13);

	assert (net_point->back_net == NULL);

	/* record the net pointer */
	this_cell_net->driven[this_cell_net->num_driven] = net_point;
	/* refer the net_pointer back to this cell */
	this_cell_net->driven[this_cell_net->num_driven]->back_net = this_cell_net;
	/* increment the count */
	this_cell_net->num_driven++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_net_based_on_driver_net_pointer)
 * 	This lookup is automatically recorded in the new_pointer, so we just send the back_net
 * 	which refers to the net.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_lookup_net_based_on_driver_net_pointer(cell_t *this_cell, net_pointer_t *net_point)
{
	assert(net_point->back_net != NULL);

	return (net_point->back_net);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_cell)
 * 	Cell is the main structure and consists of pointers to ports, other cells, and nets.
 *-------------------------------------------------------------------------------------------*/
cell_t *oEgu_allocate_a_cell(int *cell_count)
{
	cell_t *return_node;

	return_node = (cell_t*)ou_malloc_struct(sizeof(cell_t), HETS_EDIF_GRAPH_UTILS_14);

	return_node->cell_type = -1;
	return_node->traversal_flag = -1;
	return_node->back_cell = NULL;
	return_node->cell_instance_name = NULL;
	return_node->cell_definition_name = NULL;
	
		/* record the cell_count */
	(*cell_count) ++;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_a_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_cell(cell_t *to_free)
{
	if (to_free->cell_definition_name != NULL)
	{
		ou_free(to_free->cell_definition_name);
	}

	if (to_free->cell_instance_name != NULL)
	{
		ou_free(to_free->cell_instance_name);
	}

	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_generated_cell)
 *-------------------------------------------------------------------------------------------*/
generated_cell_t *oEgu_allocate_a_generated_cell(int *cell_count)
{
	generated_cell_t *return_node;

	return_node = (generated_cell_t*)ou_malloc_struct(sizeof(generated_cell_t), HETS_EDIF_GRAPH_UTILS_15);

	return_node->cell_type = -1;
	return_node->traversal_flag = -1;
	return_node->back_cell = NULL;
	return_node->cell_instance_name = NULL;
	return_node->cell_definition_name = NULL;
	return_node->cells_input_ports = NULL;
	return_node->num_cells_input_ports = 0;
	return_node->cells_output_ports = NULL;
	return_node->num_cells_output_ports = 0;
	return_node->cells_inout_ports = NULL;
	return_node->num_cells_inout_ports = 0;
	return_node->cells_nets = NULL;
	return_node->num_cells_nets = 0;
	return_node->cells_instances = NULL;
	return_node->num_cells_instances = 0;
	return_node->net_pointer_hash = sc_new_string_cache();
	return_node->port_hash = sc_new_string_cache();
	return_node->net_hash = sc_new_string_cache();
	return_node->macro_cell_type = -1;
	return_node->node_to = NULL;
	return_node->is_statement_cell = FALSE;

	/* record the cell_count */
	(*cell_count) ++;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function:  oEgu_free_a_generated_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_generated_cell(cell_t *to_free)
{
	if (to_free->cell_definition_name != NULL)
	{
		ou_free(to_free->cell_definition_name);
	}

	if (to_free->cell_instance_name != NULL)
	{
		ou_free(to_free->cell_instance_name);
	}

	if (((generated_cell_t*)to_free)->net_pointer_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->net_pointer_hash);
		((generated_cell_t*)to_free)->net_pointer_hash = NULL;
	}

	if (((generated_cell_t*)to_free)->port_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->port_hash);
		((generated_cell_t*)to_free)->port_hash = NULL;
	}

	if (((generated_cell_t*)to_free)->net_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->net_hash);
		((generated_cell_t*)to_free)->net_hash = NULL;
	}

	ou_free(((generated_cell_t*)to_free));
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_defined_cell)
 *-------------------------------------------------------------------------------------------*/
defined_cell_t *oEgu_allocate_a_defined_cell(int *cell_count)
{
	defined_cell_t *return_node;

	return_node = (defined_cell_t*)ou_malloc_struct(sizeof(defined_cell_t), HETS_EDIF_GRAPH_UTILS_16);

	return_node->cell_type = -1;
	
	return_node->cell_type = -1;
	return_node->traversal_flag = -1;
	return_node->back_cell = NULL;
	return_node->cell_instance_name = NULL;
	return_node->cell_definition_name = NULL;
	return_node->cell_index = -1;
	return_node->node_to = NULL;
	
	/* record the cell_count */
	(*cell_count) ++;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function:  oEgu_free_a_defined_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_defined_cell(cell_t *to_free)
{
	if (to_free->cell_definition_name != NULL)
	{
		ou_free(to_free->cell_definition_name);
	}

	if (to_free->cell_instance_name != NULL)
	{
		ou_free(to_free->cell_instance_name);
	}

	ou_free(to_free);
}
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_allocate_a_instance_cell)
 *-------------------------------------------------------------------------------------------*/
instance_cell_t *oEgu_allocate_a_instance_cell(int *cell_count)
{
	instance_cell_t *return_node;

	return_node = (instance_cell_t*)ou_malloc_struct(sizeof(instance_cell_t), HETS_EDIF_GRAPH_UTILS_17);

	return_node->cell_type = -1;
	
	return_node->cell_type = INSTANCE_CELL_POINTER;
	return_node->traversal_flag = -1;
	return_node->back_cell = NULL;
	return_node->cell_instance_name = NULL;
	return_node->cell_definition_name = NULL;
	return_node->cells_input_ports = NULL;
	return_node->num_cells_input_ports = 0;
	return_node->cells_output_ports = NULL;
	return_node->num_cells_output_ports = 0;
	return_node->cells_inout_ports = NULL;
	return_node->num_cells_inout_ports = 0;
	return_node->cell_definition = NULL;
	return_node->reused_cell = -1;
	return_node->port_hash = sc_new_string_cache();

	/* record the cell_count */
	(*cell_count) ++;

	return return_node;
}

/*---------------------------------------------------------------------------------------------
 * (function:  oEgu_free_a_instance_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_a_instance_cell(cell_t *to_free)
{
	if (to_free->cell_definition_name != NULL)
	{
		ou_free(to_free->cell_definition_name);
	}

	if (to_free->cell_instance_name != NULL)
	{
		ou_free(to_free->cell_instance_name);
	}

	if (((instance_cell_t*)to_free)->port_hash != NULL)
	{
		sc_free_string_cache(((instance_cell_t*)to_free)->port_hash);
		((instance_cell_t*)to_free)->port_hash = NULL;
	}

	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_partial_free_a_cell)
 * 	Partial free since the hashes don't need to bne kept around once everything is hooked up.
 *-------------------------------------------------------------------------------------------*/
void oEgu_partial_free_a_cell(cell_t *to_free)
{
	assert(to_free->cell_type == GENERATED_CELL);
	
	if (((generated_cell_t*)to_free)->net_pointer_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->net_pointer_hash);
		((generated_cell_t*)to_free)->net_pointer_hash = NULL;
	}

	if (((generated_cell_t*)to_free)->port_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->port_hash);
		((generated_cell_t*)to_free)->port_hash = NULL;
	}

	if (((generated_cell_t*)to_free)->net_hash != NULL)
	{
		sc_free_string_cache(((generated_cell_t*)to_free)->net_hash);
		((generated_cell_t*)to_free)->net_hash = NULL;
	}
}

int unique_defined_cell_number = 0;
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_defined_cell)
 * 	Add a cell that is predefined like AND or OR.  These cells exist in the library and
 * 	have indexes that point to them.
 *-------------------------------------------------------------------------------------------*/
cell_t *oEgu_add_defined_cell(char *instance_name, int cell_index)
{
	defined_cell_t *defined_cell;

	defined_cell = oEgu_allocate_a_defined_cell(&number_of_cell_allocates);

	defined_cell->cell_instance_name = (char*)ou_malloc(strlen(instance_name) + 1 + 10 + 1, HETS_EDIF_GRAPH_UTILS_18);
	sprintf(defined_cell->cell_instance_name, "%s_%d", instance_name, unique_defined_cell_number);
	unique_defined_cell_number ++;

	/* create the defined cell information */
	defined_cell->cell_type = DEFINED_CELL;
	defined_cell->cell_index = cell_index;

	return (cell_t*)defined_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_defined_cell_unformatted_name)
 * 	Adds a defined cell, but the instance name needs to be created from printf like format.
 *-------------------------------------------------------------------------------------------*/
cell_t *oEgu_add_defined_cell_unformatted_name(int cell_index, const char* fmt, ...)
{
   	va_list args;
	defined_cell_t *defined_cell;
	char long_line[4096];

	defined_cell = oEgu_allocate_a_defined_cell(&number_of_cell_allocates);

	defined_cell->cell_type = DEFINED_CELL;
	defined_cell->cell_index = cell_index;

	/* go through the arguments and add them to the string */
	va_start(args, fmt);
	vsprintf(long_line, fmt, args);
	va_end(args);

	defined_cell->cell_instance_name = (char*)ou_malloc(strlen(long_line) + 1 + 10 + 1, HETS_EDIF_GRAPH_UTILS_19);
	sprintf(defined_cell->cell_instance_name, "%s_%d", long_line, unique_defined_cell_number);
	unique_defined_cell_number ++;

	return (cell_t*)defined_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_generated_cell)
 * 	Add a cell from a general cell.
 *-------------------------------------------------------------------------------------------*/
cell_t *oEgu_add_generated_cell(char *definition_name)
{
	generated_cell_t *generated_cell;

	/* allocate the cell */
	generated_cell = oEgu_allocate_a_generated_cell(&number_of_cell_allocates);

	/* record the internals */
	generated_cell->cell_definition_name = ou_strdup(definition_name, HETS_EDIF_GRAPH_UTILS_STRDUP_2);

	generated_cell->cell_type = GENERATED_CELL;
	generated_cell->macro_cell_type = MACRO_NONE;

	return (cell_t*)generated_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_instance_name_to_a_cell)
 * 	Add an instance name to a cell.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_instance_name_to_a_cell(cell_t *to_cell,  char *instance_name)
{
	assert(to_cell->cell_instance_name == NULL);
	to_cell->cell_instance_name = ou_strdup(instance_name, HETS_EDIF_GRAPH_UTILS_STRDUP_3);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_instance_pointer_to_a_cell)
 * 	Adds an instance cell.  This is a special case when we have a cell that describes the
 * 	definition of the cell, but many cells might use this definition.  So instead of 
 * 	copying the details of the second cell, we use this inbetween pointer that describes
 * 	then instance name, and points to the definition.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_instance_pointer_to_a_cell(cell_t *to_cell,  cell_t *instance_cell)
{
	to_cell->cell_type = INSTANCE_CELL_POINTER;

	((instance_cell_t*)to_cell)->cell_definition = instance_cell;
	
	((instance_cell_t*)to_cell)->reused_cell = FALSE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_instance_reused_cell)
 * 	Add an unfromatted instance name to the cell by reconstructing the arguments into a string.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_instance_reused_cell(cell_t *to_cell)
{
	assert(to_cell->cell_type == INSTANCE_CELL_POINTER); // needs to be one type for casting
	((instance_cell_t*)to_cell)->reused_cell = TRUE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_hetero_flag)
 * 	Updates the cell with the hetero flag, meaning this cell is hetrogeneous memory
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_memory_hetero_flag(cell_t *to_cell, ivl_memory_t memory, memory_t *memory_details)
{
	assert(to_cell->cell_type == GENERATED_CELL);
	((generated_cell_t*)to_cell)->macro_cell_type = MN_MEMORY;
	((generated_cell_t*)to_cell)->memory = memory;
	((generated_cell_t*)to_cell)->memory_details = memory_details;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_macro_cell_info)
 * 	Updates the cell with the hetero flag, meaning this cell is hetrogeneous subtract
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_macro_cell_info(cell_t *to_cell, short width_a, short width_b, short width_c, short width, short macro_type, int num_input_ports, int num_output_ports)
{
	to_cell->cell_type = GENERATED_CELL;
	((generated_cell_t*)to_cell)->macro_cell_type = macro_type;
	((generated_cell_t*)to_cell)->width_a = width_a;
	((generated_cell_t*)to_cell)->width_b = width_b;
	((generated_cell_t*)to_cell)->width_c_also_shift_size = width_c;
	((generated_cell_t*)to_cell)->width = width;
	((generated_cell_t*)to_cell)->num_input_ports = num_input_ports;
	((generated_cell_t*)to_cell)->num_output_ports = num_output_ports;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_macro_cell_info_for_shift)
 * 	Updates the cell with the hetero flag, meaning this cell is hetrogeneous subtract
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_macro_cell_info_for_shift(cell_t *to_cell, short width_a, short width, short macro_type, int shift_size)
{
	to_cell->cell_type = GENERATED_CELL;
	((generated_cell_t*)to_cell)->macro_cell_type = macro_type;
	((generated_cell_t*)to_cell)->width_a = width_a;
	((generated_cell_t*)to_cell)->width_c_also_shift_size= shift_size;
	((generated_cell_t*)to_cell)->width = width;
	((generated_cell_t*)to_cell)->num_input_ports = 1;
	((generated_cell_t*)to_cell)->num_output_ports = 1;
}
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_unformatted_instance_name_to_a_cell)
 * 	Add an unfromatted instance name to the cell by reconstructing the arguments into a string.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_unformatted_instance_name_to_a_cell(cell_t *to_cell,  const char* fmt, ...)

{
	char long_line[4096];
   	va_list args;

	va_start(args, fmt);
	vsprintf(long_line, fmt, args);
	va_end(args);

	assert(to_cell->cell_instance_name == NULL);
	to_cell->cell_instance_name = ou_strdup(long_line, HETS_EDIF_GRAPH_UTILS_STRDUP_4);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_port_to_a_cell_if_not_already)
 * 	Adds a port to the cell, but first checks if it has already been added using a local hash.
 *-------------------------------------------------------------------------------------------*/
int oEgu_add_a_port_to_a_cell_if_not_already(cell_t *this_cell, cell_ports_t *the_port)
{
	assert(the_port->p_t.user_named.name != NULL);
	assert((this_cell->cell_type == GENERATED_CELL) || (this_cell->cell_type == INSTANCE_CELL_POINTER));

	/* look up the port */
	if (oEgu_lookup_port_as_a_port(this_cell, the_port) != NULL)
	{
		/* IF - this cell is defined then return that it has been added */
		return ERROR;
	}

	/* otherwise add the port */
	oEgu_add_a_port_to_a_cell(this_cell, the_port);

	return OK;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_port_to_a_cell)
 * 	Adds a port to one of the port lists and records in the port which cell uses it.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_port_to_a_cell(cell_t *this_cell, cell_ports_t *the_port)
{
	long i;
	char *port_string;

	assert(the_port->p_t.user_named.name != NULL);
	assert((this_cell->cell_type == GENERATED_CELL) || (this_cell->cell_type == INSTANCE_CELL_POINTER));

	/* update the port with this cell */
	the_port->back_cell = this_cell;

	if (the_port->IN_OUT == IN_PORT)
	{
		/* we need to ou_realloc some space */
		this_cell->cells_input_ports = (cell_ports_t**)ou_realloc(this_cell->cells_input_ports, sizeof(cell_ports_t*)*(this_cell->num_cells_input_ports + 1), HETS_EDIF_GRAPH_UTILS_20);

		/* record which input pin this is in the array of inputs. */
		the_port->pin_order = this_cell->num_cells_input_ports;

		this_cell->cells_input_ports[this_cell->num_cells_input_ports] = the_port;
		this_cell->num_cells_input_ports++;
	}
	else if (the_port->IN_OUT == OUT_PORT)
	{
		/* - we need to ou_realloc some space */
		this_cell->cells_output_ports = (cell_ports_t**)ou_realloc(this_cell->cells_output_ports, sizeof(cell_ports_t*)*(this_cell->num_cells_output_ports + 1), HETS_EDIF_GRAPH_UTILS_20);

		/* record which output pin this is in the array of outputs. */
		the_port->pin_order = this_cell->num_cells_output_ports;

		this_cell->cells_output_ports[this_cell->num_cells_output_ports] = the_port;
		this_cell->num_cells_output_ports++;
	}
	else if (the_port->IN_OUT == IN_OUT_PORT)
	{
		/* we need to ou_realloc some space */
		this_cell->cells_inout_ports = (cell_ports_t**)ou_realloc(this_cell->cells_inout_ports, sizeof(cell_ports_t*)*(this_cell->num_cells_inout_ports + 1), HETS_EDIF_GRAPH_UTILS_20);

		/* record which inoutput pin this is in the array of inoutputs. */
		the_port->pin_order = this_cell->num_cells_inout_ports;

		this_cell->cells_inout_ports[this_cell->num_cells_inout_ports] = the_port;
		this_cell->num_cells_inout_ports++;
	}
	else
	{
		assert(FALSE);
	}

	/* finally add the port to the cells hash */

	/* create a lookup string */
	port_string = oEgu_generate_port_string(the_port);

	/* add the port to the HASH */
	i = sc_add_string(((generated_cell_t*)this_cell)->port_hash, port_string);
    if(((generated_cell_t*)this_cell)->port_hash->data[i] == NULL)
	{
		/* store this cell in the logic cells */
		((generated_cell_t*)this_cell)->port_hash->data[i] = (void*)the_port;
	}
	ou_free(port_string);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_net_to_a_cell_if_not_already)
 * 	Add a net to the cell, but check if this net already exists.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_net_to_a_cell_if_not_already(cell_t *this_cell, cell_t *past_cell, cell_ports_t *the_port, cell_ports_t *the_past_port)
{
	net_pointer_t *driver_net_point;
	cell_nets_t *new_net;

	assert(this_cell->cell_type == GENERATED_CELL);
	assert(the_port->p_t.user_named.name != NULL);

	driver_net_point = oEgu_allocate_a_cell_net_pointer_for_a_port(this_cell, the_port);

	new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(this_cell, driver_net_point);

	/* add the port + instance cell as a DRIVEN port of the found or created net */
	oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell, new_net, oEgu_add_an_internal_signal_of_a_user_created_cell(the_past_port, past_cell));
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_net_to_a_cell)
 * 	Add a net to the cell.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_net_to_a_cell(cell_t *this_cell, cell_nets_t *the_net)
{
	assert(this_cell->cell_type == GENERATED_CELL);

	/* we need to ou_realloc some space */
	this_cell->cells_nets = (cell_nets_t**)ou_realloc(this_cell->cells_nets, sizeof(cell_nets_t*)*(this_cell->num_cells_nets + 1), HETS_EDIF_GRAPH_UTILS_21);
	assert (the_net->back_cell == NULL);

	/* record the pointer */
	this_cell->cells_nets[this_cell->num_cells_nets] = the_net;
	/* refer the net back to this cell */
	the_net->back_cell = this_cell;
	/* increment the count */
	this_cell->num_cells_nets++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_a_cell_to_a_cell)
 * 	Add instances that this cell has in it.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_a_cell_to_a_cell(cell_t *this_cell, cell_t *the_other_cell)
{
	assert(this_cell->cell_type == GENERATED_CELL);
	
	if (this_cell->num_cells_instances == -1)
	{
		/* IF - this is the firs allocation then we ou_malloc the array holder */
		this_cell->cells_instances = (cell_t**)ou_malloc(sizeof(cell_t*), HETS_EDIF_GRAPH_UTILS_22);
		this_cell->num_cells_instances = 0;
	}
	else
	{
		/* ELSE - we need to ou_realloc some space */
		this_cell->cells_instances = (cell_t**)ou_realloc(this_cell->cells_instances, sizeof(cell_t*)*(this_cell->num_cells_instances + 1), HETS_EDIF_GRAPH_UTILS_22);
	}

	/* record the pointer */
	this_cell->cells_instances[this_cell->num_cells_instances] = the_other_cell;
	/* record your parent cell */
	the_other_cell->back_cell = this_cell;
	/* increment the count */
	this_cell->num_cells_instances++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_get_cell_char)
 * 	Grab the instance name, and if doesn;t exist grab the definition name
 *-------------------------------------------------------------------------------------------*/
char *oEgu_get_cell_char(cell_t *cell)
{
	if (cell->cell_definition_name != NULL)
		return cell->cell_definition_name;
	else if (cell->cell_instance_name != NULL)
		return cell->cell_instance_name;
	else
	{
		assert(FALSE);
		return NULL;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_port_as_signal_name)
 * 	This function looks for a cell_ports_t based on the signal name and the pin.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_lookup_port_as_signal_name(cell_t *this_cell, char* signal_name, int pin)
{
	int i;
	cell_t *search_cell;
	char search_string[4096];

	if(this_cell->cell_type == INSTANCE_CELL_POINTER)
	{
		/* IF - this is an instance cell, we need to look at the definition */
		search_cell = ((instance_cell_t*)this_cell)->cell_definition;
	}
	else if (this_cell->cell_type == DEFINED_CELL)
	{
		/* ELSE IF - this is a defined cell and has no ports */
		return NULL;
	}
	else if (this_cell->cell_type == GENERATED_CELL)
	{
		/* ELSE IF - just use the cell */
		search_cell = this_cell;
	}

	/* create the string */
	sprintf(search_string, "%s_%d", signal_name, pin);

	/* grab the string from the hash checking if there is a match */
	i = sc_add_string(search_cell->port_hash, search_string);
	if(search_cell->port_hash->data[i] == NULL)
	{
		return NULL;
	}

	return ((cell_ports_t*)search_cell->port_hash->data[i]);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_port_as_user_name)
 * 	This function looks up the port based on a user defined name.
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_lookup_port_as_user_name(cell_t *this_cell, char* name, int pin)
{
	int i;
	cell_t *search_cell;
	char search_string[4096];

	if(this_cell->cell_type == INSTANCE_CELL_POINTER)
	{
		/* IF - this is an instance cell, we need to look at the defintion */
		search_cell = ((instance_cell_t*)this_cell)->cell_definition;
	}
	else if (this_cell->cell_type == DEFINED_CELL)
	{
		/* ELSE IF - this is a defined cell and has no ports */
		return NULL;
	}
	else if (this_cell->cell_type == GENERATED_CELL)
	{
		/* ELSE IF - just use the cell */
		search_cell = this_cell;
	}

	/* create the string */
	sprintf(search_string, "%s_%d", name, pin);

	/* grab the string from the hash checking if there is a match */
	i = sc_add_string(search_cell->port_hash, search_string);
	if(search_cell->port_hash->data[i] == NULL)
	{
		return NULL;
	}

	return ((cell_ports_t*)search_cell->port_hash->data[i]);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_port_as_a_port)
 * 	Does a lookup for a port by converting the port to a string which can be searched in the hash. 
 *-------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_lookup_port_as_a_port(cell_t *this_cell, cell_ports_t *port)
{
	int i;
	cell_t *search_cell;
	char *search_string;

	if(this_cell->cell_type == INSTANCE_CELL_POINTER)
	{
		/* IF - this is an instance cell, we need to look at the definition */
		search_cell = ((instance_cell_t*)this_cell)->cell_definition;
	}
	else if (this_cell->cell_type == DEFINED_CELL)
	{
		/* ELSE IF - this is a defined cell and has no ports */
		return NULL;
	}
	else if (this_cell->cell_type == GENERATED_CELL)
	{
		/* ELSE IF - just use the cell */
		search_cell = this_cell;
	}

	/* create the string */
	search_string = oEgu_generate_port_string(port);

	/* grab the string from the hash checking if there is a match */
	i = sc_add_string(search_cell->port_hash, search_string);
	if(search_cell->port_hash->data[i] == NULL)
	{
		ou_free(search_string);
		return NULL;
	}

	ou_free(search_string);
	return ((cell_ports_t*)search_cell->port_hash->data[i]);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup)
 * 	Search for a cell_net
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_lookup(net_pointer_t *lookup_version)
{
	int i;
	char *search_string;

	/* convert net_pointer to a string */
	/* create the string */
	search_string = oEgu_generate_a_net_pointer_string(lookup_version);

	/* lookup string in hash */
	/* grab the string from the hash checking if there is a match */
	i = sc_add_string(net_lookup_hash, search_string);
	if(net_lookup_hash->data[i] == NULL)
	{
		ou_free(search_string);
		return NULL;
	}

	ou_free(search_string);
	return ((net_lookup_t*)(net_lookup_hash->data[i]))->the_net;
}


/*---------------------------------------------------------------------------------------------
 * (function: oEgu_lookup_in_cell)
 * 	Seraches for a cell_net locally in a cell.
 *-------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_lookup_in_cell(net_pointer_t *lookup_version, cell_t *cell)
{
	int i;
	char *search_string;

	assert(cell->cell_type == GENERATED_CELL);

	/* convert net_pointer to a string */
	/* create the string */
	search_string = oEgu_generate_a_net_pointer_string(lookup_version);

	/* lookup string in hash */
	/* grab the string from the hash checking if there is a match */
	i = sc_add_string(((generated_cell_t*)cell)->net_hash, search_string);
	if(((generated_cell_t*)cell)->net_hash->data[i] == NULL)
	{
		ou_free(search_string);
		return NULL;
	}

	ou_free(search_string);
	return ((cell_nets_t*)((generated_cell_t*)cell)->net_hash->data[i]);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_add_for_lookup)
 * 	Adds a lookup which is a cross-reference for a net_pointer.
 *-------------------------------------------------------------------------------------------*/
void oEgu_add_for_lookup(cell_nets_t *net_version, net_pointer_t *ivl_version_or_lookup_version, net_pointer_t* odin_actual_version)
{
	char *search_string;
	int i;
	net_lookup_t* temp_lookup  = (net_lookup_t*)ou_malloc_struct(sizeof(net_lookup_t), HETS_EDIF_GRAPH_UTILS_23);

	/* add the info */
	temp_lookup->ivl_lookup_pointer = ivl_version_or_lookup_version;
	temp_lookup->odin_actual_pointer = odin_actual_version;
	temp_lookup->the_net = net_version;

	search_string = oEgu_generate_a_net_pointer_string(ivl_version_or_lookup_version);

	/* add this net_lookup to the hash based on the lookup_version info */
	i = sc_add_string(net_lookup_hash, search_string);
	if(net_lookup_hash->data[i] != NULL)
	{
		assert(FALSE);
	}
	/* finally store the ner_lookup */
	net_lookup_hash->data[i] = (void*)temp_lookup;

	ou_free(search_string);
}


/*---------------------------------------------------------------------------------------------
 * (function: oEgu_traverse)
 * 	Basic traversal of the new datastructure.
 *-------------------------------------------------------------------------------------------*/
void oEgu_breadth_first_traverse(cell_t *cell, int number_to_mark_as_flag, int *cell_count)
{
	int i;

	for (i = 0; i < num_BFS_stack; i++)
	{
		oEgu_generic_visit_cell(BFS_stack[i]);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_breadth_order)
 * 	Creates a stack with the order of cells to be visited.
 *-------------------------------------------------------------------------------------------*/
int oEgu_breadth_order(cell_t *cell, cell_t ***BFS_stack, int all_cells, int mark_number)
{
	int i;
	int stack_top = 0;
	int stack_bottom = 1;

	/* put cell ontop of the stack */
	BFS_stack[0][0] = cell;

	while ((stack_top != all_cells) && (stack_top != stack_bottom))
	{
		if (BFS_stack[0][stack_top]->cell_type == GENERATED_CELL)
		{
			/* visit the all the neighbour cells on the top of the stack */
			for (i = 0; i < BFS_stack[0][stack_top]->num_cells_instances; i++)
			{
				if (BFS_stack[0][stack_top]->cells_instances[i]->traversal_flag != mark_number)
				{
					/* IF - this cell has not been visited yet then add it to the stack and mark it */
					/* add this cell to the stack */
					BFS_stack[0][stack_bottom] = BFS_stack[0][stack_top]->cells_instances[i];	
	
					/* mark this new cell as visited */
					BFS_stack[0][stack_top]->cells_instances[i]->traversal_flag = mark_number;
	
					stack_bottom ++;
				}
			}
		}
	
		/* we are done with this cell move onto the next on the stack */
		stack_top++;
	}

	return stack_bottom;
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generic_visit_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_generic_visit_cell(cell_t *cell)
{
	int i;

	D4(tabbed_spaces(TAB);); 
	
	D0(tabbed_printf(out, 0, "# cell name:%s cell instance:%s\n", cell->cell_definition_name, cell->cell_instance_name););

	if (cell->cell_type == DEFINED_CELL)
	{
		D0(tabbed_printf(out, 0, "# DEFINED CELL with index:%d\n", ((defined_cell_t*)cell)->cell_index);); 
	}
	else if (cell->cell_type == GENERATED_CELL)
	{
		D0(tabbed_printf(out, 0, "# GENERATED CELL with cellref:GENERIC and viewref:NETLIST\n"););
	}
	else if (cell->cell_type == INSTANCE_CELL_POINTER)
	{
		D0(tabbed_printf(out, 0, "# INSTNACE_CELL\n"););
		oEgu_generic_visit_cell(((instance_cell_t*)cell)->cell_definition);
	}
	
	if ((cell->cell_type == GENERATED_CELL) || (cell->cell_type == INSTANCE_CELL_POINTER))
	{
		/* visit the ports */
		for (i = 0; i < cell->num_cells_input_ports; i++)
		{
			oEgu_generic_visit_port(cell->cells_input_ports[i]);
		}
		for (i = 0; i < cell->num_cells_output_ports; i++)
		{
			oEgu_generic_visit_port(cell->cells_output_ports[i]);
		}
		for (i = 0; i < cell->num_cells_inout_ports; i++)
		{
			oEgu_generic_visit_port(cell->cells_inout_ports[i]);
		}
	}

	if (cell->cell_type == GENERATED_CELL)
	{
		/* visit the nets */
		for (i = 0; i < cell->num_cells_nets; i++)
		{
			oEgu_generic_visit_net(cell->cells_nets[i]);
		}
	}

	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generic_visit_port)
 *-------------------------------------------------------------------------------------------*/
void oEgu_generic_visit_port(cell_ports_t *port)
{
	D4(tabbed_spaces(TAB);); 
	
	D0(tabbed_printf(out, 0, "# port with pin:%d\n", port->pin_id););

	if (port->IN_OUT == IN_PORT)
	{
		D0(tabbed_printf(out, 0, "# port is INPUT\n"););
	}
	else if (port->IN_OUT == OUT_PORT)
	{
		D0(tabbed_printf(out, 0, "# port is OUTPUT\n"););
	}
	else if (port->IN_OUT == IN_OUT_PORT)
	{
		D0(tabbed_printf(out, 0, "# port is IN_OUT_PORT\n"););
	}

	if (port->port_type == SIGNAL_NAMED)
	{
		D0(tabbed_printf(out, 0, "# port is signal_named:%s\n", (char*)ivl_signal_basename(port->p_t.signal_named.signal)););
	}
	else
	{
		D0(tabbed_printf(out, 0, "# port is user_named:%s\n", port->p_t.user_named.name););
	}

	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generic_visit_net)
 *-------------------------------------------------------------------------------------------*/
void oEgu_generic_visit_net(cell_nets_t *net)
{
	int i;

	D4(tabbed_spaces(TAB);); 
	
	D0(tabbed_printf(out, 0, "# net DRIVER\n"););
	oEgu_generic_visit_net_pointer(net->driver);

	for (i = 0; i < net->num_driven; i++)
	{
		D0(tabbed_printf(out, 0, "# net DRIVEN: %d\n", i););
		oEgu_generic_visit_net_pointer(net->driven[i]);
	}

	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generic_visit_net_pointer)
 *-------------------------------------------------------------------------------------------*/
void oEgu_generic_visit_net_pointer(net_pointer_t *net_pointer)
{
	D4(tabbed_spaces(TAB);); 

	if (net_pointer->driver_type == CELLS_PORTS)
	{
		D0(tabbed_printf(out, 0, "# net_pointer is a port\n"););
		oEgu_generic_visit_port(net_pointer->d_t.cells_ports.port_reference);
	}
	else
	{
		D0(tabbed_printf(out, 0, "# net_pointer is an internal signal\n"););
		oEgu_generic_visit_internal_signal(net_pointer->d_t.cells_internals.signal_reference);
	}

	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_generic_visit_internal_signal)
 *-------------------------------------------------------------------------------------------*/
void oEgu_generic_visit_internal_signal(internal_signal_t *internal)
{
	D4(tabbed_spaces(TAB);); 

	D0(tabbed_printf(out, 0, "# internal signal refers to instance cell:%s\n", internal->cell_instance->cell_instance_name););

	if (internal->instance_type == DEFINED_CELL)
	{
		D0(tabbed_printf(out, 0, "# internal signal is a Defined cell with index:%d and port_id:%d\n", internal->i_t.defined_cell.cell_index, internal->i_t.defined_cell.cell_port_id););
	}
	else
	{
		D0(tabbed_printf(out, 0, "# internal signal is a Generated cell with port\n"););
		oEgu_generic_visit_port(internal->i_t.generated_cell.cell_port);
	}

	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_memory_traverse )
 * 	Traverse a memory piece
 *-------------------------------------------------------------------------------------------*/
void oEgu_memory_visit(ivl_memory_t net)
{
	char* memory_basename;
	int memory_root;
	unsigned memory_size;
	unsigned memory_width;

	D4(tabbed_spaces(TAB););
	D0(tabbed_printf(out, 0, "# oEgu_memory_traverse\n"););

	if (net == NULL)
	{
		D0(tabbed_printf(out, 0, "# net has NULL value!\n"););
		D0(tabbed_spaces(BAT););
		return;
	}

	NAME(printf("%s", (char*)ivl_memory_basename(net)););
	memory_basename = (char*)ivl_memory_basename(net);
	memory_root = ivl_memory_root(net);
	memory_size = ivl_memory_size(net);
	memory_width = ivl_memory_width(net);

	D0(tabbed_printf(out, 0, "# BaseName %s\n", memory_basename););
	D0(tabbed_printf(out, 0, "# root %d\n", memory_root););
	D0(tabbed_printf(out, 0, "# size %d\n", memory_size););
	D0(tabbed_printf(out, 0, "# width %d\n", memory_width););

	D0(tabbed_printf(out, 0, "# END oEgu_memory_traverse\n"););
	D0(tabbed_spaces(BAT););
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_generate)
 * 	Traversal to produce an EDIF output.
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_generate(cell_t *cell, int number_to_mark_as_flag, int *cell_count, FILE *out, ivl_design_t des, const char *path)
{
	int i;
    char *module_name;
    time_t seconds;
    struct tm *tm_time;

	D0(tabbed_printf(out, 0, "# Generating EDIF with %d cells\n", num_BFS_stack);); 

	/* mangle the original root name of the target */
    module_name = ou_strdup(((char*)ivl_scope_name(ivl_design_root(des))), HETS_EDIF_GRAPH_UTILS_STRDUP_5);

	/* record the seconds at this point in time and convert to local time */
    seconds = time(NULL);
    tm_time = localtime(&seconds);

    fprintf(stderr, "Writing to %s\n", path);

	/* start making the edif file */
    fprintf(out, "(edif %s\n", ivl_scope_name(ivl_design_root(des)));
    fprintf(out, "\t(edifVersion 2 0 0)\n" "\t(edifLevel 0)\n"
	    "\t(keywordMap (keywordLevel 0))\n" "\t(status\n" "\t\t(written\n"
	    "\t\t\t(timeStamp %d %d %d %d %d %d)\n", tm_time->tm_year + 1900,
	    tm_time->tm_mon, tm_time->tm_mday, tm_time->tm_hour,
	    tm_time->tm_min, tm_time->tm_sec);
    fprintf(out, "\t\t\t(program \"iverilog\"\n" "\t\t\t\t(version \"iverilog %s\")\n" "\t\t\t\t)\n", "alpha edif output module, version of Tue Jul 10 21:36:41 2001");	/* replace with real version string later */
    fprintf(out, "\t\t\t)\n");	/* ) of written */
    fprintf(out, "\t\t)\n");	/* ) of status */

	/* print out the standard library defined in the *.inc file of the targe arch */
    fprintf(out, "\t(library %s (edifLevel 0) (technology (numberDefinition))\n", module_name);
    o_output_standard_cells();

	for (i = num_BFS_stack-1; i >= 0; i--)
	{
		oEgu_EDIF_define_cell(BFS_stack[i], out, (number_to_mark_as_flag++));
	}

	/* clso the library print out */
    fprintf(out, "\t\t)\n");	/* ) of library */

	/* finish the design description */
    fprintf(out, "\t(design %s\n" "\t\t(cellRef %s (libraryRef %s)))\n",
	    module_name,
	    ivl_scope_name(ivl_design_root(des)), 
		module_name);
    fprintf(out, "\t)\n");	/* ) of edif */

    ou_free(module_name);
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_generate_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_define_cell(cell_t *cell, FILE *output_file, int flag_mark)
{
	int i;
	char* cell_name;

	if (cell->cell_type == DEFINED_CELL)
	{
		/* IF - this is a library cell we can just skip */
		D0(tabbed_printf(output_file, 0, "# DEFINED CELL with index:%d doesn't need EDIF\n", cell->cell_index);); 
		return;
	}
	else if (cell->cell_type == INSTANCE_CELL_POINTER)
	{
		/* ELSE IF - this is an instance cell we can just jump to the GENERATED CELL */
		D0(tabbed_printf(output_file, 0, "# INSTANCE_CELL\n"););
		if ((((instance_cell_t*)cell)->reused_cell == FALSE) || (((instance_cell_t*)cell)->cell_definition->traversal_flag != 9))
		{
			/* IF - only print out the cell definition once for reusable cells like LPMs of certain width and LOGICs of certain widths */
			oEgu_EDIF_define_cell(((instance_cell_t*)cell)->cell_definition, output_file, flag_mark);
			/* update that we have now printed out this reusable cell */
			((instance_cell_t*)cell)->cell_definition->traversal_flag = 9;
		}
		return;
	}
	else if (cell->cell_type == GENERATED_CELL)
	{
		D0(tabbed_printf(output_file, 0, "# GENERATED CELL with cellref:GENERIC and viewref:NETLIST\n"););
	}
	else
	{
		assert(0);
	}

	cell_name = ou_strdup(ou_flatten_odin_name(cell->cell_definition_name), HETS_EDIF_GRAPH_UTILS_STRDUP_6);
	/* define header = NAME and CELL INFO */
	fprintf(output_file, "\t\t(cell %s (cellType GENERIC) (view %s (viewType NETLIST)\n"
			"\t\t\t(interface\n", 
			cell_name, cell_name);
	ou_free(cell_name);

	/* define PORTS */
	for (i = 0; i < cell->num_cells_input_ports; i++)
	{
		oEgu_EDIF_define_port(cell->cells_input_ports[i], output_file);
	}
	for (i = 0; i < cell->num_cells_output_ports; i++)
	{
		oEgu_EDIF_define_port(cell->cells_output_ports[i], output_file);
	}
	for (i = 0; i < cell->num_cells_inout_ports; i++)
	{
		oEgu_EDIF_define_port(cell->cells_inout_ports[i], output_file);
	}

	/* end EDIF header */
    fprintf(out, "\t\t\t\t)\n\t\t\t(contents\n");/* ) of interface && start of contents */

	/* Define all instances */
	for (i = 0; i < cell->num_cells_instances; i++)
	{
		oEgu_EDIF_instance_cell(cell->cells_instances[i], output_file);
	}

	/* Define all nets */
	for (i = 0; i < cell->num_cells_nets; i++)
	{
		oEgu_EDIF_define_net(cell->cells_nets[i], output_file);
	}

	fprintf(output_file, "\t\t\t\t)\n\t\t\t))\n");	/* ) of contents */	/* ) of cell and view */
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_instance_cell)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_instance_cell(cell_t *cell, FILE *output_file)
{
	static int unique_instance_id = 0;
	char long_line[4096];

	if (cell->cell_type == DEFINED_CELL)
	{
		/* IF - this is a library cell we can just skip */
		fprintf(output_file, "\t\t\t\t(instance %s (viewRef %s (cellRef %s)))\n", 
				cell->cell_instance_name,
	   			current_library[((defined_cell_t*)cell)->cell_index].viewref, 
				current_library[((defined_cell_t*)cell)->cell_index].cellref);
	}
	else if (cell->cell_type == INSTANCE_CELL_POINTER)
	{
		/* ELSE IF - this is an instance cell we can just jump to the GENERATED CELL */
		fprintf(output_file, "\t\t\t\t(instance %s (viewRef %s (cellRef %s)))\n", 
				ou_flatten_odin_name(cell->cell_instance_name),
				((instance_cell_t*)cell)->cell_definition->cell_definition_name,
				((instance_cell_t*)cell)->cell_definition->cell_definition_name);
	}
	else if (cell->cell_type == GENERATED_CELL)
	{
		/* ELSE IF - this a generated cell, check if it has a name, and make one if it doesn't */
		if (cell->cell_instance_name == NULL)
		{
			sprintf(long_line, "I_C_%d", unique_instance_id);
			unique_instance_id ++;	
			cell->cell_instance_name = ou_strdup(long_line, HETS_EDIF_GRAPH_UTILS_STRDUP_7);
		}

		fprintf(output_file, "\t\t\t\t(instance %s (viewRef %s (cellRef %s)))\n", 
				ou_flatten_odin_name(cell->cell_instance_name),
				cell->cell_definition_name,
				cell->cell_definition_name);
	}
	else
	{
		assert(0);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_define_port)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_define_port(cell_ports_t *port, FILE *output_file)
{
	char *port_name = oEgu_generate_port_string(port);
	char *port_string = ou_strdup(ou_flatten_odin_name(port_name), HETS_EDIF_GRAPH_UTILS_STRDUP_8);

	if (port->IN_OUT == IN_PORT)
	{
		fprintf(output_file, "\t\t\t\t(port %s (direction INPUT))\n", port_string);
	}
	else if (port->IN_OUT == OUT_PORT)
	{
		fprintf(output_file, "\t\t\t\t(port %s (direction OUTPUT))\n", port_string);
	}
	else if (port->IN_OUT == IN_OUT_PORT)
	{
		fprintf(output_file, "\t\t\t\t(port %s (direction INPUT))\n", port_string);
		fprintf(output_file, "\t\t\t\t(port %s_out (direction OUTPUT))\n", port_string);
	}
	ou_free(port_name);
	ou_free(port_string);
}

#define DRIVER 0
#define DRIVEN 1
/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_define_net)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_define_net(cell_nets_t *net, FILE *output_file)
{
	int i;
	static long net_unique_id = 0;

//	if (net->num_driven >= 1)
//	{
	 	fprintf(output_file, "\t\t\t\t(net NET_EMB_%ld (joined\n", net_unique_id);
		net_unique_id ++;

		/* define the driver */
		oEgu_EDIF_define_net_pointer(net->driver, output_file, DRIVER);
	
		/* define all the driven ports */
		for (i = 0; i < net->num_driven; i++)
		{
			oEgu_EDIF_define_net_pointer(net->driven[i], output_file, DRIVEN);
		}

		fprintf(output_file, "\t\t\t\t\t))\n");	/* ) of net and joined */
//	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_define_net_pointer)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_define_net_pointer(net_pointer_t *net_pointer, FILE *output_file, short drive_type)
{
	char *port_string; 

	if (net_pointer->driver_type == CELLS_PORTS)
	{
		/* IF - this is a local port */
		port_string = oEgu_generate_port_string(net_pointer->d_t.cells_ports.port_reference);
		if ((drive_type == DRIVEN) && (net_pointer->d_t.cells_ports.port_reference->IN_OUT == IN_OUT_PORT))
		{
			fprintf(output_file, "\t\t\t\t\t(portRef %s_out)\n", ou_flatten_odin_name(port_string));
		}
		else
		{
			fprintf(output_file, "\t\t\t\t\t(portRef %s)\n", ou_flatten_odin_name(port_string));
		}
		ou_free(port_string);
	}
	else
	{
		oEgu_EDIF_define_internal_signal(net_pointer->d_t.cells_internals.signal_reference, output_file, drive_type);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_EDIF_define_internal_signal)
 *-------------------------------------------------------------------------------------------*/
void oEgu_EDIF_define_internal_signal(internal_signal_t *internal, FILE *output_file, short driver_type)
{
	char *port_string; 

	D0(tabbed_printf(out, 0, "# internal signal refers to instance cell:%s\n", internal->cell_instance->cell_instance_name););

	if (internal->instance_type == DEFINED_CELL)
	{
		D0(tabbed_printf(out, 0, "# internal signal is a Defined cell with index:%d and port_id:%d\n", 
					internal->i_t.defined_cell.cell_index, internal->i_t.defined_cell.cell_port_id););
		fprintf(output_file, "\t\t\t\t\t(portRef %s (instanceRef %s))\n",
			  	(current_library[internal->i_t.defined_cell.cell_index].port_name[internal->i_t.defined_cell.cell_port_id]),
				(internal->cell_instance->cell_instance_name));
	}
	else
	{
		port_string = oEgu_generate_port_string(internal->i_t.generated_cell.cell_port);
		if ((driver_type == DRIVER) && (internal->i_t.generated_cell.cell_port->IN_OUT == IN_OUT_PORT))
		{
			/* IF - this is a DRIVER, and the port is an INOUT port then we need to append it */
			fprintf(output_file, "\t\t\t\t\t(portRef %s_out", ou_flatten_odin_name(port_string));
			fprintf(output_file, "(instanceRef %s))\n", ou_flatten_odin_name(internal->cell_instance->cell_instance_name));
		}
		else
		{
			fprintf(output_file, "\t\t\t\t\t(portRef %s", ou_flatten_odin_name(port_string));
			fprintf(output_file, "(instanceRef %s))\n", ou_flatten_odin_name(internal->cell_instance->cell_instance_name));
		}
		ou_free(port_string);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_free_unused_cell_items)
 *-------------------------------------------------------------------------------------------*/
void oEgu_free_unused_cell_items()
{
	int i;

	for (i = 0; i < num_BFS_stack; i++)
	{
		if (BFS_stack[i]->cell_type == INSTANCE_CELL_POINTER)
		{
			/* IF - instance_cell then can delete the port hash */
			if (BFS_stack[i]->port_hash != NULL)
			{
				sc_free_string_cache(BFS_stack[i]->port_hash);
				BFS_stack[i]->port_hash = NULL;
			}
		}
		else if (BFS_stack[i]->cell_type == GENERATED_CELL)
		{
			/* ELSE IF - generated cell then delet all the hashes */

			if (((generated_cell_t*)BFS_stack[i])->net_pointer_hash != NULL)
			{
				sc_free_string_cache(((generated_cell_t*)BFS_stack[i])->net_pointer_hash);
				((generated_cell_t*)BFS_stack[i])->net_pointer_hash = NULL;
			}

			if (BFS_stack[i]->port_hash != NULL)
			{
				sc_free_string_cache(BFS_stack[i]->port_hash);
				BFS_stack[i]->port_hash = NULL;
			}

			if (((generated_cell_t*)BFS_stack[i])->net_hash != NULL)
			{
				sc_free_string_cache(((generated_cell_t*)BFS_stack[i])->net_hash);
				((generated_cell_t*)BFS_stack[i])->net_hash = NULL;
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oEgu_clean_hierarchical_structures)
 *-------------------------------------------------------------------------------------------*/
void oEgu_clean_hierarchical_structures()
{
	int i;

	for (i = 0; i < num_BFS_stack; i++)
	{
		if (BFS_stack[i]->cell_type == INSTANCE_CELL_POINTER)
		{
			oEgu_free_a_instance_cell(BFS_stack[i]);
		}
		else if (BFS_stack[i]->cell_type == GENERATED_CELL)
		{
			oEgu_free_a_generated_cell(BFS_stack[i]);
		}
		else if (BFS_stack[i]->cell_type == DEFINED_CELL)
		{
			oEgu_free_a_defined_cell(BFS_stack[i]);
		}
		else
		{
			assert(FALSE);
		}
	}
}

