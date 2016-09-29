
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

/* This file contains the data structure initilization and looking up of for memories.  The main challenge with memories is they are
 * written and read in different points of the Verilog design.  Odin can only handle really simple memories. */
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

memory_t **memories;
int num_memories;
STRING_CACHE *memory_instance_cells;

#define SIZE_ENABLE_STACK 30
cell_information_expr *memory_enable_stack[SIZE_ENABLE_STACK];
int num_memory_enable_stack;

/*---------------------------------------------------------------------------------------------
 * (function: omu_initialize)
 * 	Initializes the global needed to synthesize memories.  Mainly a cache is needed since
 * 	memories are read and written at different points in the design.
 *-------------------------------------------------------------------------------------------*/
void omu_initialize ()
{
	/* initialize the count */
	num_memories = 0;
	memories = NULL;

	/* initialize the hash of memory names */
	memory_instance_cells = sc_new_string_cache();

	/* -1 signifies stack is empty */
	num_memory_enable_stack = -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_create_memory)
 * 	This is the structure initializeion for details about memory.
 *-------------------------------------------------------------------------------------------*/
memory_t *omu_create_memory(int address_width, node_t *memory_node, ivl_memory_t memory)
{
	memory_t *return_memory;

	return_memory = (memory_t*)ou_malloc_struct(sizeof(memory_t), HETS_MEMORY_UTILS);

	/* initialize data */
	return_memory->memory_node = memory_node;
	return_memory->memory = memory;
	return_memory->read_memory_cell = NULL;

	return_memory->address_width = address_width;
	return_memory->is_node_already_defined = FALSE;
	return_memory->address_read = -1;
	return_memory->address_write = -1;
	return_memory->clocked = FALSE;
	return_memory->file_initialization_name = NULL;

	/* make sure the node points to all these structures */
	memory_node->n_t.hetero_node.memory = memory;
	memory_node->n_t.hetero_node.memory_details = return_memory;

	return return_memory;
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_create_memory)
 * 	This is the structure initializeion for details about memory.
 *-------------------------------------------------------------------------------------------*/
void omu_add_initialization_filename(node_t *memory_node, char *file_name)
{
	assert((memory_node->node_type == MACRO_NODE) && (memory_node->n_t.hetero_node.hetero_node_type == MN_MEMORY));

	/* now store the file name */
	memory_node->n_t.hetero_node.memory_details->file_initialization_name = file_name;
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_free_memory)
 *-------------------------------------------------------------------------------------------*/
void omu_free_memory(memory_t *memory)
{
	ou_free(memory);
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_add_a_memory_cell)
 *-------------------------------------------------------------------------------------------*/
void omu_add_a_memory_cell(memory_t *memory, char *memory_name)
{
	int i;

	/* ou_realloc the output pin to hold another pointer */
	memories = (memory_t**)ou_realloc(memories, sizeof(memory_t*) * (num_memories + 1), HETS_MEMORY_UTILS);

	/* store the memory in the array */
	memories[num_memories] = memory;
	num_memories ++;

	/* now add the memory to the string cache */
	i = sc_add_string(memory_instance_cells, memory_name);

	/* if we have already defined this type of gate return */
    if(memory_instance_cells->data[i] != NULL)
	{
		assert(0);
		return;
	}
	memory_instance_cells->data[i] = (void*)memory;
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_is_memory_cell_already_defined)
 *-------------------------------------------------------------------------------------------*/
int omu_is_memory_cell_already_defined(char *name)
{
	long i;

	/* now add the memory to the string cache */
	i = sc_add_string(memory_instance_cells, name);

	/* if we have already defined this type of gate return */
    if(memory_instance_cells->data[i] == NULL)
	{
		return FALSE;
	}
	else
	{
		return TRUE;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_get_memory)
 *-------------------------------------------------------------------------------------------*/
memory_t *omu_get_memory(char *name)
{
	long i;

	/* now get the memory */
	i = sc_add_string(memory_instance_cells, name);

	/* if we have already defined this type of gate return */
    if(memory_instance_cells->data[i] == NULL)
	{
		return NULL;
	}
	else
	{
		return ((memory_t*)memory_instance_cells->data[i]);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: omu_add_a_memory_cell)
 *	Just needed for lpm stuff
 *-------------------------------------------------------------------------------------------*/
cell_t *omu_define_memory_cell(ivl_memory_t memory, int port_inout_width, int port_address_width, char *cell_name)
{
	cell_t * memory_cell;
	int i;
	cell_ports_t *clock;
	cell_ports_t *enable;
	cell_ports_t *temp_port;
	cell_ports_t **output_address_ports;
	cell_ports_t **input_address_ports;

	/* Crate the memory cell */
	memory_cell = oEgu_add_generated_cell(cell_name);

	/* now add all the ports in the memory */

	/* add the clock */
	clock = oEgu_add_a_cell_port_defined_by_user("clk", 0, IN_PORT);
	oEgu_add_a_port_to_a_cell(memory_cell, clock);

	/* add the enable */
	enable = oEgu_add_a_cell_port_defined_by_user("enable", 0, IN_PORT);
	oEgu_add_a_port_to_a_cell(memory_cell, enable);

	assert(port_inout_width > 0);

	/* add the in and out */
    for(i = 0; i < port_inout_width; i++)
	{
		temp_port = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
		oEgu_add_a_port_to_a_cell(memory_cell, temp_port);
	}
    for(i = 0; i < port_inout_width; i++)
	{
		temp_port = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(memory_cell, temp_port);
	}

	/* add the address.  There are 2 address ports, one for the write, and one for the read.  Currently, I have
	 * a simplified assumption for memory that there is only one verilog point that writes, and one verilog point
	 * that reads memory.  Therefore, we just need to multiplex these two address expressions */

	assert(port_address_width > 0);

	/* allocate the ports that will be the multiplexed address */
	output_address_ports = (cell_ports_t**)ou_malloc(sizeof(cell_ports_t*) * port_address_width, HETS_MEMORY_UTILS);
	input_address_ports = (cell_ports_t**)ou_malloc(sizeof(cell_ports_t*) * port_address_width, HETS_MEMORY_UTILS);

	/* create the ports and add them to the cell */
	for(i = 0; i < port_address_width; i++)
	{
		input_address_ports[i] = oEgu_add_a_cell_port_defined_by_user("address_in", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(memory_cell, input_address_ports[i]);
	}
	for(i = 0; i < port_address_width; i++)
	{
		output_address_ports[i] = oEgu_add_a_cell_port_defined_by_user("address_out", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(memory_cell, output_address_ports[i]);
	}

	ou_free(output_address_ports);
	ou_free(input_address_ports);

	return memory_cell;
}
