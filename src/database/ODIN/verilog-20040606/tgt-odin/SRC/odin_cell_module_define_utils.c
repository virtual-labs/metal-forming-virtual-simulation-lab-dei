
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

/* This file defines all the utility functions for dealing with modules and statements.  Mainly the initialization functions
 * for the data structures that represent modules and statements, and also the pieces of code that joins the two items together. */
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
#include "odin_net_utils.h"

#include "odin_cell_define_utils.h"
#include "linked-list.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_macro_define_module )
 *	Updates the structure of a cell with a whole bunch of information.  
 *-------------------------------------------------------------------------------------------*/
cell_information_module *ocdu_macro_define_module(
									char *unique_name)
{
	cell_information_module *return_cell = ocdu_allocate_cell_information_module();
	int i;

	/* intiailise the module for number of times traversed */
	for (i = 0; i < NUM_TRAVERSALS ; i++)
	{
		return_cell->number_times_visited_for_traversing[i] = 0;
	}

	return return_cell;
}

/*---------------------------------------------------------------------------------------------
 * (function: *ocdu_allocate_cell_information_module )
 *  Allocate the structure that holds all the info about a module cell.
 *-------------------------------------------------------------------------------------------*/
cell_information_module *ocdu_allocate_cell_information_module(void)
{
	cell_information_module* allocated;

	allocated = (cell_information_module*)ou_malloc_struct(sizeof(cell_information_module), HETS_CELL_MODULE_DEFINE_UTILS);

	allocated->this_modules_statements = NULL;
	allocated->number_of_module_statements = 0;
	allocated->top_cell = NULL;

	return allocated;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_free_cell_information_module )
 *	Frees all the internal structure allocated information except the list/
 *-------------------------------------------------------------------------------------------*/
void ocdu_free_cell_information_module(cell_information_module *this_cell)
{
	int i;

	/* free the statment structures */
	for (i = 0; i < this_cell->number_of_module_statements; i++)
	{
		ocdu_free_cell_information_stmt(this_cell->this_modules_statements[i]);
	}
	ou_free(this_cell->this_modules_statements);

	ou_free(this_cell);
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_create_net_from_list_module)
 * 	Creates a net for each of the ports provided in the list
 *-------------------------------------------------------------------------------------------*/
void ocdu_create_net_from_list_module(cell_information_module *v_this_cell,
										cell_information_basic *instance_cell,
										cell_ports_t **list_of_ports,
										int num_list_of_ports)
{
	int i;
	net_pointer_t *actual_net_point;
	net_pointer_t *lookup_net_point;
	internal_signal_t *new_internal_signal;
	cell_ports_t *new_port;

	/* hook your outputs into their desired inputs */
	for (i = 0; i < num_list_of_ports; i++)
    {
		new_port = oEgu_lookup_port_as_a_port(instance_cell->top_cell, 
												list_of_ports[i]);
		assert(new_port != NULL);

		/* create the net_pointer to lookup */
		lookup_net_point = oEgu_allocate_a_cell_net_pointer_for_a_port(v_this_cell->top_cell, new_port);
		/* create the actual details */
		new_internal_signal = oEgu_add_an_internal_signal_of_a_user_created_cell(new_port, instance_cell->top_cell);
		actual_net_point = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(v_this_cell->top_cell, new_internal_signal);

		/* need to make a net connection for all the pins of an embedded signal */
		/* add this output port to a net */
		onu_add_module_nets_info_collection(v_this_cell->top_cell, 
											lookup_net_point,
											actual_net_point);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_instantiate_cell_and_make_connections_module)
 * 	Takes a stmt information and instantiates it locally as well as makes connections to
 * 	the signal elements.
 *-------------------------------------------------------------------------------------------*/
void ocdu_instantiate_cell_and_make_nets_module(cell_information_module *v_this_cell,
													void *v_instantiating_cell,
													int id)
{
	cell_information_basic *this_cell = (cell_information_basic *)v_this_cell;
	cell_information_basic *instantiating_cell = (cell_information_basic *)v_instantiating_cell;
	
	if (instantiating_cell != NULL)
	{
		/* Instantiate the cells */
		/* Instantiate the cells */
		oEgu_add_unformatted_instance_name_to_a_cell(instantiating_cell->top_cell,  "I_C_%d", id);

		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, instantiating_cell->top_cell);

		/* create the nets needed from the outputs */
		ocdu_create_net_from_list_module(v_this_cell,
										instantiating_cell,
										instantiating_cell->top_cell->cells_output_ports,
										instantiating_cell->top_cell->num_cells_output_ports);

		/* create the nets needed from the inouts */
		ocdu_create_net_from_list_module(v_this_cell,
										instantiating_cell,
										instantiating_cell->top_cell->cells_inout_ports,
										instantiating_cell->top_cell->num_cells_inout_ports);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocmdu_add_statement_module)
 * 	Stores statements cells into an array so they can be traversed later.
 *-------------------------------------------------------------------------------------------*/
void ocmdu_add_statement_module(cell_information_module *this_cell, cell_information_stmt *statement)
{
	this_cell->this_modules_statements =
		(cell_information_stmt**)ou_realloc(this_cell->this_modules_statements, (this_cell->number_of_module_statements+1)*sizeof(cell_information_stmt*), HETS_CELL_MODULE_DEFINE_UTILS);

	/* record the statement for later use */
	this_cell->this_modules_statements[this_cell->number_of_module_statements] = statement;

	/* increment the index */
	this_cell->number_of_module_statements++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocmdu_use_list_to_look_for_input_nets_module)
 * 	This is an interesting function.  This function takes a specific list of ports and
 * 	looks for each of these signals (in the list) in the IR so that we can join the nets
 * 	to gether.  this is a one output, multiple input nets, and these connections can
 * 	be between modules, lpms, and external logic.
 *-------------------------------------------------------------------------------------------*/
void ocmdu_use_list_to_look_for_input_nets_module(cell_information_module *v_this_cell,
										int statement_idx,
										cell_ports_t **list_of_ports,
										int num_list_of_ports)
{
	int k;
	int return_val = ERROR;
	int i;
	ivl_signal_t traverse_signal;
	int traverse_pin;

	internal_signal_t *internal_sig;
	net_pointer_t *to_add_net_pointer;
	net_pointer_t *net_pointer_find;
	cell_ports_t *new_port;

	/* add your inputs into their desired net */
	for (i = 0; i < num_list_of_ports; i++) 
    {
        traverse_signal = list_of_ports[i]->p_t.signal_named.signal;
        traverse_pin = list_of_ports[i]->pin_id;

		/* create the internal driven signal - this is an internal signal
		 * since it comes from the statement */
		NAME(printf("%s", (char*)ivl_signal_name(traverse_signal)););
		new_port = oEgu_lookup_port_as_signal_name(v_this_cell->this_modules_statements[statement_idx]->top_cell, (char*)ivl_signal_name(traverse_signal), traverse_pin);
		assert(new_port != NULL);

		internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port,
																			v_this_cell->this_modules_statements[statement_idx]->top_cell);
		/* now create a net pointer */
		to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(v_this_cell->top_cell, internal_sig);

		/* go through each of the entries looking for the 1 that relates to this module */
		for (k = 0; k < ivl_nexus_ptrs(ivl_signal_pin(traverse_signal, traverse_pin)); k++)
		{
			if(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k)))
			{
				/* IF - this entry is a signal look for it in the nets */

				NAME(printf("%s", (char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k)))););
				net_pointer_find = oEgu_lookup_net_pointer_driver_in_this_cells_nets(	
						v_this_cell->top_cell, 
						(char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k))),
						ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k)));

				if (net_pointer_find == NULL)
				{
					/* IF - this net pointer doesn't exist skip to next */
					continue;
				}

				/* traverse until you find an output signal */
				return_val = onu_add_input_module_nets_info_collection(v_this_cell->top_cell,
											net_pointer_find,
											to_add_net_pointer);
			}
			else if (ivl_nexus_ptr_con(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k)))
			{
				/* ELSE - this port is a constant so add the constant type to the ivl */
				int actual_spot = ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k));
				return_val = OK;

				/* determine if this constant is a 1 or 0 */
				if (((char*)ivl_const_bits(ivl_nexus_ptr_con(ivl_nexus_ptr(ivl_signal_pin(traverse_signal, traverse_pin), k))))[actual_spot] == '1')
				{
					/* IF - this bit is a 1 then create portref to modules ONE_CONST */

					/* add the a port to the collection */
					oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(v_this_cell->one_cell_net,
															to_add_net_pointer);
				}
				else
				{
					/* ELSE - this is a 0 constant */
	
					/* add the a port to the collection */
					oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(v_this_cell->zero_cell_net,
															to_add_net_pointer);
				}
			}
	
			if (return_val == OK)
			{
				/* IF - we find the signal it hooks up to then exit */
				break;
			}
		}

		assert(return_val == OK);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocmdu_complete_statement_nets_module)
 * 	Starting point to join netlists from statements or process blocks to all the external
 * 	nets.
 *-------------------------------------------------------------------------------------------*/
void ocmdu_complete_statement_nets_module(cell_information_module *v_this_cell)
{
	int i;
	
	/* maybe should go through outputs, and see where they are now? */
	for (i = 0; i < v_this_cell->number_of_module_statements; i++)
   	{
		/* check if the inputs have a net */
		ocmdu_use_list_to_look_for_input_nets_module(v_this_cell,
										i,
										v_this_cell->this_modules_statements[i]->top_cell->cells_input_ports,
										v_this_cell->this_modules_statements[i]->top_cell->num_cells_input_ports);

		/* check if the inouts have a net */
		ocmdu_use_list_to_look_for_input_nets_module(v_this_cell,
										i,
										v_this_cell->this_modules_statements[i]->top_cell->cells_inout_ports,
										v_this_cell->this_modules_statements[i]->top_cell->num_cells_inout_ports);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_search_and_add_driven_to_net )
 * 	This function searches for a specified driver signal in a net and adds this net_pointer
 * 	into the corresponding net.  This is mainly used for joining behavioural signals with 
 * 	structural signals.
 *-------------------------------------------------------------------------------------------*/
void ou_search_and_add_driven_to_net(cell_information_module *this_cell,
						net_pointer_t *to_add_net_pointer,
						ivl_nexus_t nexus,
						int spot)
{
	int return_val = ERROR;
	int j;
	net_pointer_t *net_pointer_find;

	/* go through each of the entries looking for the 1 that relates to this module */
	for (j = 0; j < ivl_nexus_ptrs(nexus); j++)
	{
		if(ivl_nexus_ptr_sig(ivl_nexus_ptr(nexus, j)))
		{	
			NAME(printf("%s", (char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(nexus, j)))););
			/* find the pointer related to the nexus */
			net_pointer_find = oEgu_lookup_net_pointer_driver_in_this_cells_nets(	
					this_cell->top_cell,
					(char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(nexus, j))),
					ivl_nexus_ptr_pin(ivl_nexus_ptr(nexus, j)));

			if (net_pointer_find == NULL)
			{
				continue;
			}

			return_val = onu_add_input_module_nets_info_collection(this_cell->top_cell,
									net_pointer_find,
									to_add_net_pointer);
		}
		else if(ivl_nexus_ptr_con(ivl_nexus_ptr(nexus, j)))
		{
			return_val = OK;
			int actual_spot = ivl_nexus_ptr_pin(ivl_nexus_ptr(nexus, j));

			if (((char*)ivl_const_bits(ivl_nexus_ptr_con(ivl_nexus_ptr(nexus, j))))[actual_spot] == '1')
			{
				/* IF - this bit is a 1 then create portref to modules ONE_CONST */

				/* add the a port to the collection */
				oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(this_cell->one_cell_net,
														to_add_net_pointer);
			}
			else if (((char*)ivl_const_bits(ivl_nexus_ptr_con(ivl_nexus_ptr(nexus, j))))[actual_spot] == '0')
			{
				/* ELSE - this is a 0 constant */

				/* add the a port to the collection */
				oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(this_cell->zero_cell_net,
														to_add_net_pointer);
			}
			else
			{
				assert(FALSE);
			}
		}
		if (return_val == OK)
		{
			/* IF - we find the signal it hooks up to then exit to the next pin and record that this pin of lpm is defined */

			break;
		}
	}

	/* Should never get here */
	if (return_val != OK)
	{
		if(ivl_nexus_ptr_sig(ivl_nexus_ptr(nexus, 0)))
		{	
			fprintf(stderr, "Warning: nexus %s pin %d doesn't seem to do anything\n", 
				(char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(nexus, 0))),
				ivl_nexus_ptr_pin(ivl_nexus_ptr(nexus, 0)));
		}
		else
		{
			fprintf(stderr, "Warning: nexus pin doesn't seem to do anything\n"); 
		}
	}
//	assert(return_val == OK);
}
