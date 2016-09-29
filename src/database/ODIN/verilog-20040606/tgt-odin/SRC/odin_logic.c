
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

/* This file contains the functionality that performs the various stages of logic creation.  Logic structures in this case are
 * the logic primitives we should all be familiar with, and these logic structures will be seen in the assign statements in Verilog.
 * Why Icarus takes this approach I'm not certain, but this logic, and logic in expressions are traversed differently.  Because of this,
 * my code treats these external logic structures as individual elements that are defined hierarchically, and hooked up.  This structures
 * are later converted to nodes in a flattened netlist by the flatenner.
 *
 * There are four things that are done in this code.  Logic is defined, instantiated, inputs are joined, and outputs are joined.
 */
#include "ivl_target.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_net_utils.h"
#include "odin_cell_define_utils.h"

#include "odin_ds1_graph_utils.h"
/*-------------------------------------------------------------------------------------------
 * (function: ol_traverse_1_add_ports  )
 *-------------------------------------------------------------------------------------------*/
void ol_traverse_1_add_ports(
			   cell_information_module *this_cell,
				ivl_net_logic_t logic,
		  		STRING_CACHE* logic_ports,
		  		STRING_CACHE* logic_instance_cells)
{
	long idx, idx2;
	int i;	
	char string_cache_id[4096];

	cell_t *logic_cell;
	internal_signal_t *internal_sig;
	net_pointer_t *to_add_net_pointer;
	cell_ports_t *lookup_port;
	char *logic_name = ou_full_logic_name(logic);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ol_tryyaverse_1_add_ports\n"););

	NAME(printf("%s", logic_name););

    switch (ivl_logic_type(logic))
	{
	case IVL_LO_AND:
	case IVL_LO_NAND:
	case IVL_LO_NOR:
	case IVL_LO_OR:
	case IVL_LO_XOR:
	case IVL_LO_XNOR:
		/* for all the other pins other than 1 look for the matching input and add a specified port */
		for (i = 1; i < ivl_logic_pins(logic); i++)
		{
			sprintf(string_cache_id, "%s_%d", logic_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(logic_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(logic_ports->data[idx] != NULL)
			{
				continue;
			}
		 	logic_ports->data[idx] = TAKEN;

			/* create the to add net_pointer_t */
			
			/* find thei instance cell that defines this logic */
	 		logic_cell = (cell_t*)logic_instance_cells->data[sc_lookup_string(logic_instance_cells, logic_name)];
			assert(logic_cell != NULL);

			/* llok for the cell name */
			lookup_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)logic_cell)->cell_definition, "A", i); 
			assert(lookup_port != NULL);
			/* create the internal driven signal - this is an internal signal since it comes from the statement */

			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( lookup_port, logic_cell);

			/* now create a net pointer */
			to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

			/* add the to_add_net_pointer */
			ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_logic_pin(logic, i), i);
		}
	    break;
	case IVL_LO_BUF:
	case IVL_LO_BUFIF0:
	case IVL_LO_BUFIF1:
	case IVL_LO_BUFZ:
	case IVL_LO_NOT:
	case IVL_LO_PULLDOWN:
	case IVL_LO_PULLUP:
	    idx2 = find_logic_cell(ivl_logic_type(logic));
	    if(idx2 >= 0)
		{
			/* IF - this library cell exists then copy the protref */
	
			/* for all the other pins other than 1 look for the matching input and add a specified port */
			for (i = 1; i < ivl_logic_pins(logic); i++)
			{
				sprintf(string_cache_id, "%s_%d", logic_name, i); 
			
				D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
				
				/* add this type of compund and to the available gates */
				idx = sc_add_string(logic_ports, string_cache_id);
				
				/* if we have already defined this type of gate return */
			 	if(logic_ports->data[idx] != NULL)
				{
					continue;
				}
			 	logic_ports->data[idx] = TAKEN;
	
				/* create the to add net_pointer_t */
				
				/* find thei instance cell that defines this logic */
		 		logic_cell = (cell_t*)logic_instance_cells->data[sc_lookup_string(logic_instance_cells, logic_name)];
				assert(logic_cell != NULL);
	
				internal_sig = oEgu_add_an_internal_signal_of_a_defined_gate (idx2, 1, logic_cell);
	
				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_logic_pin(logic, i), i);
			}
		}
	    else
		{
			fprintf(stderr, "Unrecognized logic cell %s (type %d)\n", logic_name, ivl_logic_type(logic));
		}

	    
		break;
	default:
		D0(tabbed_printf(out, 0, "#paj PORTREF FOR UNDEFINED LOGIC CELL\n"););
	}

	ou_free(logic_name);

	D0(tabbed_printf(out, 0, "# END ol_traverse_1_add_ports\n"););
	D4(tabbed_spaces(BAT);); 
}
/*---------------------------------------------------------------------------------------------
 * (function: ol_traverse_0_add_ports  )
 *-------------------------------------------------------------------------------------------*/
void ol_traverse_0_add_ports(
			   cell_information_module *this_cell,
				ivl_net_logic_t logic,
				STRING_CACHE *logic_instance_cells)
{
	cell_t *logic_cell;
	net_pointer_t *new_driver_lookup;
	net_pointer_t *new_actual_point;
	int i;
	char *logic_name = ou_full_logic_name(logic);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ol_traverse_0_add_ports\n"););

	NAME(printf("%s", logic_name););

    switch (ivl_logic_type(logic))
	{
	case IVL_LO_AND:
	case IVL_LO_NAND:
	case IVL_LO_NOR:
	case IVL_LO_OR:
	case IVL_LO_XOR:
	case IVL_LO_XNOR:
	/* grab the nexus of this logic with its' first pointer */
		assert(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)));

		/* find the cell_t that this q output is hooked up to */
	 	logic_cell = (cell_t*)logic_instance_cells->data[sc_lookup_string(logic_instance_cells, logic_name)];
		assert(logic_cell != NULL);

		/* create a lookup version of this signal from the signal and pin info */
		new_driver_lookup = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
								this_cell->top_cell, 
								oEgu_add_an_internal_signal_of_a_user_created_cell(
									oEgu_add_a_cell_port_defined_by_a_signal(
										ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)),
										ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)),
										OUT_PORT),
									logic_cell));
		assert(new_driver_lookup != NULL);

		/* create the actual net pointer that belongs with the net */
		new_actual_point = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
								this_cell->top_cell, 
								oEgu_add_an_internal_signal_of_a_user_created_cell(
									((instance_cell_t*)logic_cell)->cell_definition->cells_output_ports[0],
									logic_cell));
		onu_add_module_nets_info_collection(this_cell->top_cell, 
											new_driver_lookup,
											new_actual_point);

		break;
	case IVL_LO_BUF:
	case IVL_LO_BUFIF0:
	case IVL_LO_BUFIF1:
	case IVL_LO_BUFZ:
	case IVL_LO_NOT:
	case IVL_LO_PULLDOWN:
	case IVL_LO_PULLUP:
		i = find_logic_cell(ivl_logic_type(logic));
	    if(i >= 0)
		{
			/* IF - this library cell exists then copy the protref */

			assert(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)));

			/* find the cell_t that this q output is hooked up to */
		 	logic_cell = (cell_t*)logic_instance_cells->data[sc_lookup_string(logic_instance_cells, logic_name)];
			assert(logic_cell != NULL);
	
			/* create a lookup version of this signal from the signal and pin info */
			new_driver_lookup = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
									this_cell->top_cell, 
									oEgu_add_an_internal_signal_of_a_user_created_cell(
										oEgu_add_a_cell_port_defined_by_a_signal(
											ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)),
											ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_logic_pin(logic, 0), 0)),
											OUT_PORT),
										logic_cell));
			assert(new_driver_lookup != NULL);
	
			/* create the actual net pointer that belongs with the net */
			new_actual_point = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
									this_cell->top_cell, 
									oEgu_add_an_internal_signal_of_a_defined_gate (i, 0, logic_cell));
	
			onu_add_module_nets_info_collection(this_cell->top_cell, 
												new_driver_lookup,
												new_actual_point);
		}	
	default:
		D0(tabbed_printf(out, 0, "#paj PORTREF FOR UNDEFINED LOGIC CELL\n"););
	}

	ou_free(logic_name);
	
	D0(tabbed_printf(out, 0, "# END ol_traverse_0_add_ports\n"););
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: ol_show_logic )
 *  Outputs a instance for simple logic elements. 
 *-------------------------------------------------------------------------------------------*/
void
ol_show_logic(cell_information_module *v_this_cell, 
		ivl_scope_t current_scope,
	   	ivl_net_logic_t net)
{
    long library_cell;
    char cell_kind[4096];
    char *instance_name = ou_full_logic_name(net);
	cell_information_basic *this_cell = (cell_information_basic *)v_this_cell;
	int i;
	char *logic_name = ou_full_logic_name(net);

	NAME(printf("%s", instance_name););

	cell_t *new_instance_cell;
	cell_t *logic_cell;
	char definition_name[4096];

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ol_show_logic\n"););
	D1(tabbed_printf(out, 0, "# logic:%s:%d\n", instance_name, ivl_logic_type(net)););
	D1(tabbed_printf(out, 0, "# IVL_LO_NONE 0, IVL_LO_AND 1, IVL_LO_BUF 2, IVL_LO_BUFIF0 3, IVL_LO_BUFIF1 4, IVL_LO_BUFZ 5,\n"
				"# IVL_LO_NAND 6, IVL_LO_NMOS 7, IVL_LO_NOR 8, IVL_LO_NOT 9, IVL_LO_NOTIF0 10, IVL_LO_NOTIF1 11,\n"
				"# IVL_LO_OR 12, IVL_LO_PULLDOWN 13, IVL_LO_PULLUP 14, IVL_LO_RNMOS 15, IVL_LO_RPMOS 16, IVL_LO_PMOS 17,\n"
				"# IVL_LO_XNOR 18, IVL_LO_XOR 19, IVL_LO_EEQ 20, IVL_LO_UDP 21\n"););

    switch (ivl_logic_type(net))
	{
	case IVL_LO_AND:
	    sprintf(cell_kind, "AND");
	    break;
	case IVL_LO_NAND:
	    sprintf(cell_kind, "NAND");
	    break;
	case IVL_LO_NOR:
	    sprintf(cell_kind, "NOR");
	    break;
	case IVL_LO_OR:
	    sprintf(cell_kind, "OR");
	    break;
	case IVL_LO_XOR:
	    sprintf(cell_kind, "XOR");
	    break;
	case IVL_LO_XNOR:
	    sprintf(cell_kind, "XNOR");
	    break;
	case IVL_LO_BUF:
	case IVL_LO_BUFIF0:
	case IVL_LO_BUFIF1:
	case IVL_LO_BUFZ:
	case IVL_LO_NOT:
	case IVL_LO_PULLDOWN:
	case IVL_LO_PULLUP:
	    library_cell = find_logic_cell(ivl_logic_type(net));
	    if(library_cell < 0)
		{
		    fprintf(stderr, "Standard cell %s of type %d is not present in the library, ignoring\n",
			    logic_name, ivl_logic_type(net));
			D4(tabbed_spaces(BAT);); 
		    return;
		}

		/* create the logic cell */
		new_instance_cell = oEgu_add_defined_cell_unformatted_name(library_cell, "%s", ou_flatten_odin_name(instance_name));

		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, new_instance_cell);

		/* add this type to the list of structures */
	    i = sc_add_string(logic_instance_cells, instance_name);
   	 	if(logic_instance_cells->data[i] != NULL)
		{
			D4(tabbed_spaces(BAT);); 
			assert(0);
		}
		/* store this cell in the logic cells */
   		logic_instance_cells->data[i] = (void*)new_instance_cell;

		D4(tabbed_spaces(BAT);); 
	    return;
	default:
		D1(tabbed_printf(out, 0, "#paj LOGIC CELL NOT SUPPORTED\n"););
		D4(tabbed_spaces(BAT);); 
	    return;
	}

	/* add the instance name to the cell.  prbably_should make a copy */
	sprintf(definition_name, "IVERILOG_%s_%d", cell_kind, ivl_logic_pins(net) - 1);

	/* create an instance cell */
	new_instance_cell = (cell_t*)oEgu_allocate_a_instance_cell(&number_of_cell_allocates);

	/* add the cell defintion into this one */
	logic_cell = (cell_t*)logic_definition_cells->data[sc_lookup_string(logic_definition_cells, definition_name)];
	assert(logic_cell != NULL);
	oEgu_add_instance_pointer_to_a_cell(new_instance_cell, logic_cell);
	/* update that this is a reusable cell */
	oEgu_add_instance_reused_cell(new_instance_cell);

	/* add the instance name to new_instance_cell */
	oEgu_add_instance_name_to_a_cell(new_instance_cell, instance_name);

	/* now add the instance cell to the top cell */
	oEgu_add_a_cell_to_a_cell(this_cell->top_cell, new_instance_cell);

	/* add this type to the list of structures */
    i = sc_add_string(logic_instance_cells, instance_name);
    if(logic_instance_cells->data[i] != NULL)
	{
		D4(tabbed_spaces(BAT);); 
		assert(0);
	}
	/* store this cell in the logic cells */
    logic_instance_cells->data[i] = (void*)new_instance_cell;

	ou_free(logic_name);

	D0(tabbed_printf(out, 0, "# END ol_show_logic\n");); 
	D4(tabbed_spaces(BAT);); 
}

/* (paj_EDIF_MODULE2) Generic cell print header */
void
ol_define_logic_cell_header(cell_t *cell, long pins)
{
	long i;

	oEgu_add_a_port_to_a_cell(cell, oEgu_add_a_cell_port_defined_by_user("Q", 0, OUT_PORT));

	for (i = 1; i < pins+1; i++)
	{
		oEgu_add_a_port_to_a_cell(cell, oEgu_add_a_cell_port_defined_by_user("A", i, IN_PORT));
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ol_define_logic_cell )
 * 	This function creates compound logic gates using the primitive gates.  This includes blif-interface
 * 	and blif-net connections for the compound structure. 
 *-------------------------------------------------------------------------------------------*/
#define LOGIC 1
#define NOT_LOGIC 2
long
ol_define_logic_cell(long type,
		  long npins)
{
    long i;
	cell_information_basic *logic_cell;
	internal_signal_t *final_output;
	char cell_name[4096];
	char logic_name[10];
	int logic_type = 0;

	cell_nets_t *new_net;
	cell_t *new_not_cell;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ol_define_logic_cell\n"););

	/* define the logic cell which will store the information we need */
	logic_cell = ocdu_allocate_cell_information_basic();


	/* create the type of cell this is */
	
    switch (type)
	{
	case IVL_LO_OR:
	    sprintf(cell_name, "IVERILOG_OR_%ld", npins - 1);
	    sprintf(logic_name, "OR");
		logic_type = LOGIC;
		break;
	case IVL_LO_AND:
	    sprintf(cell_name, "IVERILOG_AND_%ld", npins - 1);
	    sprintf(logic_name, "AND");
		logic_type = LOGIC;
		break;
	case IVL_LO_XOR:
	    sprintf(cell_name, "IVERILOG_XOR_%ld", npins - 1);
	    sprintf(logic_name, "XOR");
		logic_type = LOGIC;
		break;
	case IVL_LO_NAND:
	    sprintf(cell_name, "IVERILOG_NAND_%ld", npins - 1);
	    sprintf(logic_name, "AND");
		logic_type = NOT_LOGIC;
		break;
	case IVL_LO_NOR:
	    sprintf(cell_name, "IVERILOG_NOR_%ld", npins - 1);
	    sprintf(logic_name, "OR");
		logic_type = NOT_LOGIC;
		break;
	case IVL_LO_XNOR:
	    sprintf(cell_name, "IVERILOG_XNOR_%ld", npins - 1);
	    sprintf(logic_name, "XOR");
		logic_type = NOT_LOGIC;
		break;
	case IVL_LO_BUF:
	case IVL_LO_BUFIF0:
	case IVL_LO_BUFIF1:
	case IVL_LO_BUFZ:
	case IVL_LO_NOT:
	case IVL_LO_PULLDOWN:
	case IVL_LO_PULLUP:
		return OK;
	default:
		D0(tabbed_printf(out, 0, "#paj THIS LOGIC (%ld) CELL NOT DEFINED\n", type););
	    return -1;
	}
	
	if (logic_type)
	{
		/* IF - this is a logic type, now we need to store to the logic */

		/* add this type to the list of structures */
	    i = sc_add_string(logic_definition_cells, cell_name);
	    if(logic_definition_cells->data[i] != NULL)
		{
			D4(tabbed_spaces(BAT);); 
			return 0;
		}

		/* define the logic inside the cell */
		logic_cell->top_cell = oEgu_add_generated_cell(cell_name);

		/* store this cell in the logic cells */
	    logic_definition_cells->data[i] = (void*)logic_cell->top_cell;

		/* define the header */
	    ol_define_logic_cell_header(logic_cell->top_cell, npins - 1);

		/* create the logic cell */
		final_output = ocdu_create_a_logic_tree_to_single_out_with_one_primary_input(logic_cell,
										npins - 1, 
										cell_name,
										oEgu_create_net_pointers_list_from_local_cell_ports_list(
																								logic_cell->top_cell,
																								logic_cell->top_cell->cells_input_ports,
																								npins-1),
										logic_name);
	}

	if (logic_type == LOGIC)
	{
		/* IF this is straight logic */

	    /* tie the output of the last OR gate into output */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(logic_cell->top_cell, final_output);
		oEgu_add_a_port_DRIVEN_to_a_cell_net(logic_cell->top_cell,new_net, logic_cell->top_cell->cells_output_ports[0]);	
	}
	else if (logic_type == NOT_LOGIC)
	{
		/* instantiate a not cell */
		new_not_cell = oEgu_add_defined_cell_unformatted_name(not_cell_lib_index, "NOT");
		oEgu_add_a_cell_to_a_cell(logic_cell->top_cell, new_not_cell);

		/* hookup to NOT input */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(logic_cell->top_cell, final_output);
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(logic_cell->top_cell,new_net, oEgu_add_an_internal_signal_of_a_defined_gate(not_cell_lib_index, 1, new_not_cell));

		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(logic_cell->top_cell, oEgu_add_an_internal_signal_of_a_defined_gate(not_cell_lib_index, 0, new_not_cell));
		oEgu_add_a_port_DRIVEN_to_a_cell_net(logic_cell->top_cell,new_net, logic_cell->top_cell->cells_output_ports[0]);	
	}
	
	/* ou_free the cell we used for print info */
	ocdu_free_cell_information_basic(logic_cell);
	
	D0(tabbed_printf(out, 0, "# END ol_define_logic_cell\n"););
	D4(tabbed_spaces(BAT);); 

    return 0;
}
