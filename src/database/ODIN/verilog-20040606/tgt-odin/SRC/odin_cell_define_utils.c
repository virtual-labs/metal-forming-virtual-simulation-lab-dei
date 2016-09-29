
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

/* This is a file that defines a bunch of utility functions that are used when we are first traversing the IR, and building our first data structure.
 * Most of the stuff in this file helps with lists of signals that are passed back and forth between units of the IR */
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
 * (function: ocdu_generate_unique_name )
 * 	Joins a string with a number.
 *-------------------------------------------------------------------------------------------*/
char *ocdu_generate_unique_name(char *name, int concat_name_number)
{
	char *constructed_string;
	char number[100];

	/* put the number into string format */
	sprintf(number, "%d", concat_name_number);

	/* + 2 for the _ and the \0 */
	constructed_string = (char*)ou_malloc(strlen(name)+strlen(number)+2, HETS_CELL_DEFINE_UTILS);

	sprintf(constructed_string, "%s_%d", name, concat_name_number);

	return constructed_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_allocate_cell_information_basic )
 * 	Sets the text field since only one needed
 *-------------------------------------------------------------------------------------------*/
cell_information_basic *ocdu_allocate_cell_information_basic(void)
{
	cell_information_basic* allocated;

	allocated = (cell_information_basic*)ou_malloc_struct(sizeof(cell_information_basic), HETS_CELL_DEFINE_UTILS);

	return allocated;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_free_cell_information_basic )
 *-------------------------------------------------------------------------------------------*/
void ocdu_free_cell_information_basic(cell_information_basic *this_cell)
{
	ou_free(this_cell);
}

/*---------------------------------------------------------------------------------------------
 * (function:  ocdu_join_signal_lists_and_create_nets)
 * 	Joins a cells list with this cells port list, and checks for duplicates.  
 *-------------------------------------------------------------------------------------------*/
void ocdu_join_signal_lists_and_create_nets(cell_t *this_cell,
											cell_t *past_cell,	
											cell_ports_t **port_list,
											int num_port_list)
{
	int i;
	cell_ports_t *new_port;

	for (i = 0; i < num_port_list; i++)
	{
		new_port = oEgu_lookup_port_as_a_port(this_cell, port_list[i]);

		/* add the port if it hasn't already been added */
		if (new_port == NULL)
		{
			/* IF - this port already exists delete it */
			new_port = oEgu_copy_a_cell_port_defined_by_a_signal(port_list[i]);
			oEgu_add_a_port_to_a_cell(this_cell, new_port);
		}

		/* add the net if it hasn't been added */
		oEgu_add_a_net_to_a_cell_if_not_already(this_cell, past_cell, new_port, port_list[i]);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function:  ocdu_append_signal_list )
 * 	Takes a port list and joins it with the cell, checking if the port potentially becomes
 * 	an IN_OUT.
 *-------------------------------------------------------------------------------------------*/
void  ocdu_append_signal_list(cell_t *new_cell,
								cell_ports_t **past_ports_list,
								int size_past_ports_list)
{
	int i; 
	cell_ports_t *new_port;
	cell_ports_t *found_port;

	for (i = 0; i < size_past_ports_list; i++)
	{
		/* add the port if it hasn't already been added */
		found_port = oEgu_lookup_port_as_a_port(new_cell, past_ports_list[i]);

		if (found_port != NULL)
		{
			/* IF - this port already exists */

			if (found_port->IN_OUT != past_ports_list[i]->IN_OUT)
			{
				/* IF - these ports are not the same, then this must be an IN_OUT_PORT */
				if (found_port->IN_OUT == IN_PORT)
				{
					/* IF - the current port in the cell is an input, then remove it from the input and add it to the in_out */
					
					/* take out of old list */
					new_cell->cells_input_ports = ocdu_remove_port_from_list(new_cell->cells_input_ports, 
																			new_cell->num_cells_input_ports,
																			found_port);
					/* decrease the size of the list */
					new_cell->num_cells_input_ports --;

					/* add the port to the inout list */
					found_port->IN_OUT = IN_OUT_PORT;
					oEgu_add_a_port_to_a_cell(new_cell, found_port);
				}
				else if (found_port->IN_OUT == OUT_PORT)
				{
					/* IF - the current port in the cell is an input, then remove it from the input and add it to the in_out */
					
					/* take out of old list */
					new_cell->cells_output_ports = ocdu_remove_port_from_list(new_cell->cells_output_ports, 
																			new_cell->num_cells_output_ports,
																			found_port);
					/* decrease the size of the list */
					new_cell->num_cells_output_ports --;

					/* add the port to the inout list */
					found_port->IN_OUT = IN_OUT_PORT;
					oEgu_add_a_port_to_a_cell(new_cell, found_port);
				}
				/* Third case is that the found cell is already in the INOUT list so we don't have to do anything */
			}
		}
		else if (past_ports_list[i]->do_not_copy == FALSE)
		{
			/* ELSE - this port has not been added to the list */
			new_port = oEgu_copy_a_cell_port_defined_by_a_signal(past_ports_list[i]);
			oEgu_add_a_port_to_a_cell(new_cell, new_port);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_remove_port_from_list )
 *-------------------------------------------------------------------------------------------*/
cell_ports_t **ocdu_remove_port_from_list(cell_ports_t **list, int size_port_list, cell_ports_t *port)
{
	int i;
	int FOUND_MATCH = FALSE;

	cell_ports_t **new_list;

	int current_size = 0;

	if (size_port_list > 0)
	{
		/* IF - this list has size, create a copy list */
		new_list = (cell_ports_t **)ou_malloc_struct(sizeof(cell_ports_t*)*(size_port_list-1), HETS_CELL_DEFINE_UTILS);
	}

	for (i = 0; i < size_port_list; i++)
	{
		if (oEgu_compare_ports(port, list[i]))
		{
			/* When we find a match, remove it */
			FOUND_MATCH = TRUE;
		}
		else
		{
			new_list[current_size] = list[i];
			current_size++;
		}
	}

	assert(FOUND_MATCH == TRUE);

	return(new_list);
}

/*---------------------------------------------------------------------------------------------
 * (function:  ocdu_append_embedded_input_signals )
 * 	Joins the right list with this list making sure not to duplicate entries of the inputs.
 *-------------------------------------------------------------------------------------------*/
void  ocdu_append_embedded_input_signals(void *v_this_cell,
								void *v_rigot_cell)
{
	cell_information_basic *this_cell = v_this_cell;
	cell_information_basic *rigot_cell = v_rigot_cell;

	ocdu_append_signal_list(this_cell->top_cell,
								rigot_cell->top_cell->cells_input_ports,
								rigot_cell->top_cell->num_cells_input_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function:  ocdu_join_embedded_output_signals )
 * 	Joins the right list with this list making sure not to duplicate entries of the outputs.
 *-------------------------------------------------------------------------------------------*/
void  ocdu_append_embedded_output_signals(void *v_this_cell,
								void *v_rigot_cell)
{
	cell_information_basic *this_cell = v_this_cell;
	cell_information_basic *rigot_cell = v_rigot_cell;

	ocdu_append_signal_list(this_cell->top_cell,
								rigot_cell->top_cell->cells_output_ports,
								rigot_cell->top_cell->num_cells_output_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function:  ocdu_join_embedded_inout_signals )
 *-------------------------------------------------------------------------------------------*/
void  ocdu_append_embedded_inout_signals(void *v_this_cell,
								void *v_rigot_cell)
{
	cell_information_basic *this_cell = v_this_cell;
	cell_information_basic *rigot_cell = v_rigot_cell;

	ocdu_append_signal_list(this_cell->top_cell,
								rigot_cell->top_cell->cells_inout_ports,
								rigot_cell->top_cell->num_cells_inout_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_add_output_to_cell )
 * 	This function adds an output specification to the respective cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_add_output_to_cell(void *v_this_cell,  
							cell_ports_t *cell_port)
{
	cell_information_basic *this_cell = (cell_information_basic*)v_this_cell;
	cell_ports_t **mini_list = (cell_ports_t**)ou_malloc_struct(sizeof(cell_ports_t*), HETS_CELL_DEFINE_UTILS);
			
	mini_list[0] = cell_port;
	
	ocdu_append_signal_list(this_cell->top_cell,
								mini_list,
								1);

	ou_free(mini_list);
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_add_input_to_cell )
 * 	This function adds an input specification to the respective cell.
 *-------------------------------------------------------------------------------------------*/
void ocdu_add_input_to_cell(void *v_this_cell,  
							cell_ports_t *cell_port)
{
	cell_information_basic *this_cell = (cell_information_basic*)v_this_cell;
	cell_ports_t **mini_list = (cell_ports_t**)ou_malloc_struct(sizeof(cell_ports_t*), HETS_CELL_DEFINE_UTILS);
			
	mini_list[0] = cell_port;
	
	ocdu_append_signal_list(this_cell->top_cell,
								mini_list,
								1);

	ou_free(mini_list);
}

/*---------------------------------------------------------------------------------------------
 * (function: ocdu_create_an_OR_tree_to_single_out_with_one_primary_input )
 *	OR tree text information is converted given one input to hookup.
 *-------------------------------------------------------------------------------------------*/
internal_signal_t *ocdu_create_a_logic_tree_to_single_out_with_one_primary_input(void* temp_cell,
										int width, 
										char *network_name,
										net_pointer_t **primary_port,
										char *logic_name)
{
	cell_information_basic *cell = (cell_information_basic*)temp_cell;
	int logic_cell;
	int i;
	int current_spot;

	cell_t **new_logic_cells;
	cell_nets_t *new_net;
	internal_signal_t *return_internal_signal = (internal_signal_t*)ou_malloc_struct(sizeof(internal_signal_t), HETS_CELL_DEFINE_UTILS);

	new_logic_cells = (cell_t**)ou_malloc(sizeof(cell_t*)*width, HETS_CELL_DEFINE_UTILS);

	/* grab an logic_cell from the library */
    logic_cell = find_library_cell(logic_name);
	if (logic_cell < 0)
	{
		assert(0);
	}
	
	/* create the gates needed for a single output */
    for(i = 0; i < width - 1; i++)
	{
		new_logic_cells[i] = oEgu_add_defined_cell_unformatted_name(logic_cell, "%s_%s_%ld", logic_name, network_name, i);
		oEgu_add_a_cell_to_a_cell(cell->top_cell, new_logic_cells[i]);
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
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell->top_cell, primary_port[current_spot]);
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 1, new_logic_cells[i]));
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(cell->top_cell, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 0, new_logic_cells[current_spot-width]));
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 1, new_logic_cells[i]));
			}
	
			current_spot ++;
	
			/* do the second input to the and gate */
			if (current_spot < width)
			{
				/* IF PI */
				/* start the net */
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell->top_cell, primary_port[current_spot]);
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 2, new_logic_cells[i]));
			}	
			else
			{
				/* ELSE this is an internal gate */
				/* start the net */
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(cell->top_cell, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 0, new_logic_cells[current_spot-width]));
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 2, new_logic_cells[i]));
			}
	
			current_spot ++;
		}
		else
		{
			fprintf(stderr, "Error in GATE generation\n");
			assert(0);
		}
	}

	return_internal_signal = oEgu_add_an_internal_signal_of_a_defined_gate (logic_cell, 0, new_logic_cells[current_spot-width]);

	/* ou_free the array */
	ou_free(new_logic_cells); 

	return (return_internal_signal);
}
