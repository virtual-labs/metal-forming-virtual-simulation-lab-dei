
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

/* This file define utility functions for statements (highest level of a statement structure is a process.  These structures are read
 * from Icarus's IR, and these utilities create the cell data structures that hold info about the statement, and also porvide ways of joining
 * these statement structures to the module. */
#include "ivl_target.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <stdarg.h>

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_cell_define_utils.h"
#include "linked-list.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_macro_define_stmt )
 *	Updates the structure of a cell with a whole bunch of information.  
 *-------------------------------------------------------------------------------------------*/
cell_information_stmt *ocdu_macro_define_stmt(
									char *unique_name)			/*char *unique_name*/
{
	cell_information_stmt *return_cell = ocdu_allocate_cell_information_stmt();

	/* allocate a cell structure for the IR */
	return_cell->top_cell = oEgu_add_generated_cell(unique_name);

	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_free_cell_information_stmt )
 *	Frees all the internal structure allocated information except the list/
 *-------------------------------------------------------------------------------------------*/
void ocdu_free_cell_information_stmt(cell_information_stmt *this_cell)
{
	ou_free(this_cell);
}

/*---------------------------------------------------------------------------------------------
 * (function: *ocdu_allocate_cell_information_stmt )
 *  Allocate the structure that holds all the info about a statement cell.
 *-------------------------------------------------------------------------------------------*/
cell_information_stmt *ocdu_allocate_cell_information_stmt(void)
{
	cell_information_stmt* allocated;

	allocated = (cell_information_stmt*)ou_malloc_struct(sizeof(cell_information_stmt), HETS_CELL_STMT_DEFINE_UTILS);

	allocated->clock_net = NULL;
	allocated->memory_cells = NULL;
	allocated->is_blocking = -1;

	return allocated;
}

/*---------------------------------------------------------------------------------------------
 * (funtction: ocdu_make_direct_output_connection)
 * 	Writes out a net joining an output directly with an instantiated internal cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_make_direct_output_connection( cell_information_stmt *this_cell, 
											cell_information_basic *instance,
											cell_ports_t *toe_port)
{
	cell_nets_t *new_net;
	cell_ports_t *new_port;

	/* connect to the output of the embedded cell */
	new_port = oEgu_lookup_port_as_a_port(instance->top_cell, toe_port);
	assert(new_port != NULL);
	new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(	this_cell->top_cell, 
												oEgu_add_an_internal_signal_of_a_user_created_cell(
														new_port,
														instance->top_cell));
	new_port = oEgu_lookup_port_as_a_port(this_cell->top_cell, toe_port);
	assert(new_port != NULL);
	oEgu_add_a_port_DRIVEN_to_a_cell_net(this_cell->top_cell, new_net, new_port);
}

/*---------------------------------------------------------------------------------------------
 * (funtction: ocdu_make_ff_output_connection)
 * 	Writes out a net joining an ff with an instantiated internal cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_make_ff_output_connection( cell_information_stmt *this_cell, 
								cell_information_basic *inst_cell,
								cell_ports_t *toe_port,
								int *count)
{
	int ff_cell;

	cell_nets_t *new_net;
	cell_ports_t *new_port;

	/* grab a flip flop cell from the main library */
	ff_cell = find_library_cell("DFF");
	if (ff_cell < 0)
	{
		assert(0);
	}

	/* connect the input of the DFF */
	new_port = oEgu_lookup_port_as_a_port(inst_cell->top_cell, toe_port);
	assert(new_port != NULL);
	new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(	this_cell->top_cell, 
												oEgu_add_an_internal_signal_of_a_user_created_cell(
														new_port,
														inst_cell->top_cell));
	oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate (ff_cell, 1, this_cell->memory_cells[*count]));

	new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(this_cell->top_cell, oEgu_add_an_internal_signal_of_a_defined_gate (ff_cell, 0, this_cell->memory_cells[*count]));
	new_port = oEgu_lookup_port_as_a_port(this_cell->top_cell, toe_port);
	assert(new_port != NULL);
	oEgu_add_a_port_DRIVEN_to_a_cell_net(this_cell->top_cell, new_net, new_port);
}

/*---------------------------------------------------------------------------------------------
 * (funtction: ocdu_make_net_for_input_list)
 * 	Creates the nets for any list of input ports.  Hooks up based on the assumption that
 * 	this signal will exist in both.
 *-------------------------------------------------------------------------------------------*/
void ocdu_make_net_for_input_list_stmt(cell_information_stmt *this_cell,
									cell_information_basic *past_cell,
									cell_ports_t **port_list,
									int num_port_list)
{
	int i;
	cell_nets_t *new_net;
	cell_ports_t *new_port;

	/* hook your inputs into their desired inputs */
	for (i = 0; i < num_port_list; i++)
    {
		if (port_list[i]->do_not_copy == TRUE)
		{
			/* IF - this port was not copied, then it can't be connected normally */
			continue;
		}

		new_port = oEgu_lookup_port_as_a_port(this_cell->top_cell, port_list[i]);
		assert(new_port != NULL);
		/* add the port, create_net, and add net to cell if not already created */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port(this_cell->top_cell, new_port);

		new_port = oEgu_lookup_port_as_a_port(past_cell->top_cell, port_list[i]);
		assert(new_port != NULL);
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(	
													this_cell->top_cell, new_net, 
													oEgu_add_an_internal_signal_of_a_user_created_cell(
														new_port,
														past_cell->top_cell));
	}
}

/*---------------------------------------------------------------------------------------------
 * (funtction: ocdu_make_net_for_output_list)
 * 	This takes the output lists and creates hookups for them based on if this is flip flop or
 * 	direct.
 *-------------------------------------------------------------------------------------------*/
void ocdu_make_net_for_output_list_stmt(cell_information_stmt *this_cell,
									cell_information_basic *inst_cell,
									cell_ports_t **port_list,
									int num_port_list,
									int output_connection_type, 
									int *count)
{
	int i;

	/* hook your outputs into their desired inputs */
	for (i = 0; i < num_port_list; i++)
	{
		/* need to make a net connection for all the pins of an embedded signal */
		/* hookup the outputs based on the type of output */
		if ((port_list[i]->do_not_copy == FALSE) && (output_connection_type == DIRECT_CONNECTION))
		{
			ocdu_make_direct_output_connection(this_cell, inst_cell, port_list[i]);
		}
		else if ((port_list[i]->do_not_copy == FALSE) && (output_connection_type == FF_CONNECTION))
		{
			ocdu_make_ff_output_connection(this_cell, inst_cell, port_list[i], count);
			(*count) ++;
		}
	}
}



/*---------------------------------------------------------------------------------------------
 * (funtction: ocdu_instantiate_cell_and_make_input_connections_only_stmt)
 *	Instantiates a cell with the internal info.  Then makes nets to join the inputs and the 
 *	outputs of the internal cell to the external cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_instantiate_cell_and_make_input_connections_only_stmt(cell_information_stmt *this_cell,
													void *v_instantiating_cell,
													int id)
{
	cell_information_basic *instantiating_cell = (cell_information_basic *)v_instantiating_cell;

	if (instantiating_cell != NULL)
	{
		/* Instantiate the cells */
		oEgu_add_unformatted_instance_name_to_a_cell(instantiating_cell->top_cell,  "I_C_%d", id);

		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, instantiating_cell->top_cell);

		/* create nets for the inputs */
		ocdu_make_net_for_input_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_input_ports,
									instantiating_cell->top_cell->num_cells_input_ports);

		/* create nets for the inouts for input */
		ocdu_make_net_for_input_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_inout_ports,
									instantiating_cell->top_cell->num_cells_inout_ports);
	}
}

/*--------------------------------------------------------------------------------------------
 * (funtction: ocdu_instantiate_cell_and_make_connections_stmt)
 *	Instantiates a cell with the internal info.  Then makes nets to join the inputs and the 
 *	outputs of the internal cell to the external cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_instantiate_cell_and_make_connections_stmt(cell_information_stmt *this_cell,
													void *v_instantiating_cell,
													int id,
													int output_connection_type)
{
	int *count = (int*)ou_malloc(sizeof(int), HETS_CELL_STMT_DEFINE_UTILS);
	cell_information_basic *instantiating_cell = (cell_information_basic *)v_instantiating_cell;

	*count = 0;
	
	if (instantiating_cell != NULL)
	{
		/* Instantiate the cells */
		oEgu_add_unformatted_instance_name_to_a_cell(instantiating_cell->top_cell,  "I_C_%d", id);

		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, instantiating_cell->top_cell);

		/* create nets for the inputs */
		ocdu_make_net_for_input_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_input_ports,
									instantiating_cell->top_cell->num_cells_input_ports);

		/* create nets for the inouts for input */
		ocdu_make_net_for_input_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_inout_ports,
									instantiating_cell->top_cell->num_cells_inout_ports);

		/* create the nets for the output list */
		ocdu_make_net_for_output_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_output_ports,
                                    instantiating_cell->top_cell->num_cells_output_ports,
									output_connection_type, 
									count);

		/* create the nets for the output list */
		ocdu_make_net_for_output_list_stmt(this_cell,
									instantiating_cell,
									instantiating_cell->top_cell->cells_inout_ports,
									instantiating_cell->top_cell->num_cells_inout_ports,
									output_connection_type,
									count);
	}
}
