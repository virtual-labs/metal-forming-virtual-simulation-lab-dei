
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

/* This code perfroms the instantiation of LPMs, which really means complex logic functions that are not primitive gates.  Again, these
 * structures are traversed in a different way than the complex logic functions that are found in expressions, which is a bit annoying.
 * 
 * There are four things that are done in this code.  LPM is defined, instantiated, inputs are joined, and outputs are joined.
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
#include "odin_eval_stmt.h"
#include "odin_ds1_graph_utils.h"
#include "odin_memory_utils.h"
#include "odin_hetero_utils.h"
#include "odin_node_and_cell_utils.h"
#include "odin_collect_stats.h"

#define MIN(a,b) ((a)<(b)?(a):(b))
/*---------------------------------------------------------------------------------------------
 * (function: olpm_traverse_0_add_ports )
 *-------------------------------------------------------------------------------------------*/
void olpm_traverse_0_add_ports (
			   	cell_information_module *this_cell,
				ivl_lpm_t lpm,
				STRING_CACHE *lpm_instance_cells)
{
    int i;
    long width = ivl_lpm_width(lpm);
	net_pointer_t *new_driver_lookup;
	net_pointer_t *new_actual_point;
	char *lpm_name = ou_full_lpm_name(lpm);

	cell_t *lpm_cell;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# olpm_traverse_0_add_ports %d\n", width););

	NAME(printf("%s", lpm_name););
	/* find the cell_t that this q output is hooked up to */
 	lpm_cell = lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
	assert(lpm_cell != NULL);

    switch (ivl_lpm_type(lpm))
	{
	case IVL_LPM_ADD:
	case IVL_LPM_SUB:
	case IVL_LPM_FF:
	case IVL_LPM_MUX:
	case IVL_LPM_SHIFTL:
	case IVL_LPM_SHIFTR:
	case IVL_LPM_RAM   :
	case IVL_LPM_MULT:
	    for(i = 0; i < width; i++)
		{
			/* create a lookup version of this signal from the signal and pin info */
			new_driver_lookup = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
									this_cell->top_cell,
									oEgu_add_an_internal_signal_of_a_user_created_cell(
										oEgu_add_a_cell_port_defined_by_a_signal(
											ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lpm_q(lpm, i), 0)), 
											ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lpm_q(lpm, i), 0)),
											OUT_PORT),
										lpm_cell));
			assert(new_driver_lookup != NULL);

			/* create the actual net pointer that belongs with the net */
			new_actual_point = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
									this_cell->top_cell,
									oEgu_add_an_internal_signal_of_a_user_created_cell(
										((instance_cell_t*)lpm_cell)->cell_definition->cells_output_ports[i],
										lpm_cell));
	
			onu_add_module_nets_info_collection(this_cell->top_cell, 
												new_driver_lookup,
												new_actual_point);
		}
	    break;
	case IVL_LPM_UFUNC:
		D0(tabbed_printf(out, 0, "# show_lpm_as_portref_LPM UFUNC\n"););
		break;
	case IVL_LPM_CMP_EQ:
	case IVL_LPM_CMP_GE:
	case IVL_LPM_CMP_GT:
	case IVL_LPM_CMP_NE:
		D0(tabbed_printf(out, 0, "# show_lpm_as_portref_LPM COMPARE\n"););

		/* create a lookup version of this signal from the signal and pin info */
		new_driver_lookup = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
								this_cell->top_cell,
								oEgu_add_an_internal_signal_of_a_user_created_cell(
									oEgu_add_a_cell_port_defined_by_a_signal(
										ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lpm_q(lpm, 0), 0)), 
										ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lpm_q(lpm, 0), 0)),
										OUT_PORT),
									lpm_cell));
		assert(new_driver_lookup != NULL);

		/* create the actual net pointer that belongs with the net */
		new_actual_point = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
								this_cell->top_cell,
								oEgu_add_an_internal_signal_of_a_user_created_cell(
									((instance_cell_t*)lpm_cell)->cell_definition->cells_output_ports[0],
									lpm_cell));

		onu_add_module_nets_info_collection(this_cell->top_cell, 
											new_driver_lookup,
											new_actual_point);
		break;
	case IVL_LPM_DIVIDE:
		fprintf(stderr, "show_lpm_as_portref_LPM DIVIDE\n");
		break;
	case IVL_LPM_MOD   :
		fprintf(stderr, "show_lpm_as_portref_LPM MOD\n");
		break;

	default:
	    D1(tabbed_printf(out, 0, "#paj SHOW_LPM_AS_PORTREF: uNIMPLEMENTED LPM DEVICE %s\n",
		    lpm_name););
	    fprintf(stderr, "SHOW_LPM_AS_PORTREF: uNIMPLEMENTED LPM DEVICE %s\n",
		    lpm_name);
	}

	ou_free(lpm_name);
	
	D0(tabbed_printf(out, 0, "# END olpm_traverse_0_add_ports\n"););
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: olpm_traverse_1_add_ports )
 *-------------------------------------------------------------------------------------------*/
void olpm_traverse_1_add_ports (
			   	cell_information_module *this_cell,
				ivl_lpm_t lpm,
				STRING_CACHE* lpm_ports,
		  		STRING_CACHE* lpm_instance_cells)
{
	int i, idx;
    long width = ivl_lpm_width(lpm);
	char string_cache_id[4096];
	cell_t *lpm_cell;
	internal_signal_t *internal_sig;
	net_pointer_t *to_add_net_pointer;
	cell_ports_t *new_port;
	char *lpm_name = ou_full_lpm_name(lpm);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# olpm_traverse_1_add_ports %d\n", width););

	NAME(printf("%s", lpm_name););

    switch (ivl_lpm_type(lpm))
	{
	case IVL_LPM_ADD:
	case IVL_LPM_SUB:
			
		/* find the instance cell that defines this logic */
	 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
		assert(lpm_cell != NULL);

		/* for all the other pins other than 1 look for the matching input and add a specified port */
		/* -1 since carry out */
		for (i = 0; i < width; i++)
		{
			sprintf(string_cache_id, "%s_%d", lpm_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(lpm_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(lpm_ports->data[idx] != NULL)
			{
				continue;
			}
		 	lpm_ports->data[idx] = TAKEN;

			/* create the to add net_pointer_t */

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in1", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);
	
			if (ivl_lpm_data(lpm, i))
			{
				/* IF - this input exists */

				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data(lpm, i), i);
			}
			else
			{
				/* ELSE - connect the zero input to the in1 port */

				/* add this DRIVEN to the zero cell */
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell->top_cell, this_cell->zero_cell_net, internal_sig);
			}

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in2", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			if (ivl_lpm_datab(lpm, i))
			{
				/* IF - this input exists */

				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_datab(lpm, i), i);
			}
			else
			{
				/* ELSE - connect the zero input to the in1 port */

				/* add this DRIVEN to the zero cell */
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell->top_cell, this_cell->zero_cell_net, internal_sig);
			}
		}
	    break;
	case IVL_LPM_MULT:
			
		/* find the instance cell that defines this logic */
	 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
		assert(lpm_cell != NULL);

		/* for all the other pins other than 1 look for the matching input and add a specified port */
		/* -1 since carry out */
		for (i = 0; i < width; i++)
		{
			sprintf(string_cache_id, "%s_%d", lpm_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(lpm_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(lpm_ports->data[idx] != NULL)
			{
				continue;
			}
		 	lpm_ports->data[idx] = TAKEN;

			/* create the to add net_pointer_t */

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			if (ivl_lpm_data(lpm, i))
			{
				/* IF - this input exists */

				new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in1", i);
				assert(new_port != NULL);
				internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);
	
				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data(lpm, i), i);
			}
			if (ivl_lpm_datab(lpm, i))
			{	
				/* IF - this input exists */
				
				/* create the internal driven signal - this is an internal signal since it comes from the statement */
				new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in2", i);
				assert(new_port != NULL);
				internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);
	
				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_datab(lpm, i), i);
			}
		}
	    break;

	case IVL_LPM_CMP_EQ:
	case IVL_LPM_CMP_GE:
	case IVL_LPM_CMP_GT:
	case IVL_LPM_CMP_NE:
			
		/* find the instance cell that defines this logic */
	 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
		assert(lpm_cell != NULL);

		/* for all the other pins other than 1 look for the matching input and add a specified port */
		for (i = 0; i < width; i++)
		{
			sprintf(string_cache_id, "%s_%d", lpm_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(lpm_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(lpm_ports->data[idx] != NULL)
			{
				continue;
			}
		 	lpm_ports->data[idx] = TAKEN;

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in1", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			if (ivl_lpm_data(lpm, i))
			{
				/* IF - this input exists */

				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data(lpm, i), i);
			}
			else
			{
				/* ELSE - connect the zero input to the in1 port */

				/* add this DRIVEN to the zero cell */
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell->top_cell, this_cell->zero_cell_net, internal_sig);
			}

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in2", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			if (ivl_lpm_datab(lpm, i))
			{
				/* IF - this input exists */

				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_datab(lpm, i), i);
			}
			else
			{
				/* ELSE - connect the zero input to the in1 port */

				/* add this DRIVEN to the zero cell */
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(this_cell->top_cell, this_cell->zero_cell_net, internal_sig);
			}
		}
	    break;
	case IVL_LPM_FF:
		/* find thei instance cell that defines this logic */
	 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
		assert(lpm_cell != NULL);

	    for(i = 0; i < width; i++)
		{
			sprintf(string_cache_id, "%s_%d", lpm_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(lpm_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(lpm_ports->data[idx] != NULL)
			{
				continue;
			}
		 	lpm_ports->data[idx] = TAKEN;

			/* create the to add net_pointer_t */
			
			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in1", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			/* now create a net pointer */
			to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

			/* add the to_add_net_pointer */
			ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data(lpm, i), i);
		}

		/* create the internal driven signal - this is an internal signal since it comes from the statement */
		new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "clk", 0);
		assert(new_port != NULL);
		internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

		/* now create a net pointer */
		to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

		/* add the to_add_net_pointer */
		ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_clk(lpm), 0);

	    break;
	case IVL_LPM_MUX:
		/* find thei instance cell that defines this logic */
	 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
		assert(lpm_cell != NULL);

	    for(i = 0; i < width; i++)
		{
			sprintf(string_cache_id, "%s_%d", lpm_name, i); 
		
			D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
			
			/* add this type of compund and to the available gates */
			idx = sc_add_string(lpm_ports, string_cache_id);
			
			/* if we have already defined this type of gate return */
		 	if(lpm_ports->data[idx] != NULL)
			{
				continue;
			}
		 	lpm_ports->data[idx] = TAKEN;

			/* create the to add net_pointer_t */

			/* NOTE : the order of the MUX devices are switched for the respective inputs since if the select is 1, then
			 * the operation is TRUE which normally is the first device as in (condition ? TRUE : FALSE) in verilog */
			
			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in2", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			/* now create a net pointer */
			to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

			/* add the to_add_net_pointer */
			ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data2(lpm, 0, i), i);

			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "in1", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			/* now create a net pointer */
			to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

			/* add the to_add_net_pointer */
			ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_data2(lpm, 1, i), i);
		}
		for (i = 0; i < ivl_lpm_selects(lpm); i++)
		{
			/* create the internal driven signal - this is an internal signal since it comes from the statement */
			new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "selects", i);
			assert(new_port != NULL);
			internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell( new_port, lpm_cell);

			/* now create a net pointer */
			to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);

			/* add the to_add_net_pointer */
			ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_select(lpm, i), 0);
		}
	    break;
	case IVL_LPM_RAM   :
		{
			int min_address_width;

			/* find the instance cell that defines this logic */
		 	lpm_cell = (cell_t*)lpm_instance_cells->data[sc_lookup_string(lpm_instance_cells, lpm_name)];
			assert(lpm_cell != NULL);
			min_address_width = MIN(ivl_lpm_selects(lpm), ((generated_cell_t*)((instance_cell_t*)lpm_cell)->cell_definition)->memory_details->address_width);
	
			for(i = 0; i < min_address_width; i++)
			{
				sprintf(string_cache_id, "%s_%d", lpm_name, i); 
			
				D0(tabbed_printf(out, 0, "# string_cache_id %s\n", string_cache_id););
				
				/* add this type of compund and to the available gates */
				idx = sc_add_string(lpm_ports, string_cache_id);
				
				/* if we have already defined this type of gate return */
			 	if(lpm_ports->data[idx] != NULL)
				{
					continue;
				}
			 	lpm_ports->data[idx] = TAKEN;
	
				/* create the to add net_pointer_t */
	
				/* create the internal driven signal - this is an internal signal since it comes from the statement.  This
				 * has to be a read so we attach to the out_address */
				new_port = oEgu_lookup_port_as_user_name(((instance_cell_t*)lpm_cell)->cell_definition, "address_out", i);
				assert(new_port != NULL);
				internal_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(new_port, lpm_cell);
	
				/* now create a net pointer */
				to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(this_cell->top_cell, internal_sig);
	
				/* add the to_add_net_pointer */
				ou_search_and_add_driven_to_net(this_cell, to_add_net_pointer, ivl_lpm_select(lpm, i), i);
			}
	
			if (ivl_lpm_clk(lpm) != NULL)
			{
				assert (FALSE); // assume never write as LPM 
			}
	
			if (ivl_lpm_enable(lpm) != NULL)
			{
				assert (FALSE); // assume never write as LPM 
			}
		}
		break;
	case IVL_LPM_UFUNC:
		break;
	case IVL_LPM_SHIFTL:
		fprintf(stderr, "show_lpm_as_portref_LPM SHIFTL\n");
		break;
	case IVL_LPM_SHIFTR:
		fprintf(stderr, "show_lpm_as_portref_LPM SHIFTR\n");
		break;
	case IVL_LPM_DIVIDE:
		fprintf(stderr, "show_lpm_as_portref_LPM DIVIDE\n");
		break;
	case IVL_LPM_MOD   :
		fprintf(stderr, "show_lpm_as_portref_LPM MOD\n");
		break;
	default:
	    D1(tabbed_printf(out, 0, "#paj SHOW_LPM_AS_PORTREF: uNIMPLEMENTED LPM DEVICE %s\n",
		    lpm_name););
	    fprintf(stderr, "SHOW_LPM_AS_PORTREF: uNIMPLEMENTED LPM DEVICE %s\n",
		    lpm_name);
	}

	ou_free(lpm_name);

	D0(tabbed_printf(out, 0, "# END olpm_traverse_1_add_ports\n"););
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: olpm_show_lpm )
 *  defines lpm or compund functions so that they can be referenced.  This includes edif-instance
 *  and edif-nets to hookup the internals of the compound structure. 
 *-------------------------------------------------------------------------------------------*/
void
olpm_show_lpm(cell_information_module *this_cell,
		ivl_scope_t current_scope,
	 	ivl_lpm_t net)
{
    long width = ivl_lpm_width(net);
	char cell_name[4096];
	char definition_name[4096];
	int i;
	char *lpm_name = ou_full_lpm_name(net);

	cell_t *new_instance_cell;
	cell_t *lpm_cell;
	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# olpm_show_lpm\n");); 

	NAME(printf("%s", lpm_name););

    switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
		sprintf(cell_name, "ADD_%s", lpm_name);
	    break;
	case IVL_LPM_SUB:
		sprintf(cell_name, "SUB_%s", lpm_name);
	    break;
	case IVL_LPM_CMP_EQ:
		sprintf(cell_name, "CMP_EQ_%s", lpm_name);
		break;
	case IVL_LPM_CMP_GE:
		sprintf(cell_name, "CMP_GE_%s", lpm_name);
		break;
	case IVL_LPM_CMP_GT:
		sprintf(cell_name, "CMP_GT_%s", lpm_name);
		break;
	case IVL_LPM_CMP_NE:
		sprintf(cell_name, "CMP_NE_%s", lpm_name);
		break;
	case IVL_LPM_MULT:
		sprintf(cell_name, "MULT_%s", lpm_name);
		break;
	case IVL_LPM_FF:
	    sprintf(cell_name, "FF_%s", lpm_name);
	    break;
	case IVL_LPM_MUX:
	    sprintf(cell_name, "MUX_%s", lpm_name);
    	break;
	case IVL_LPM_SHIFTL:
		sprintf(cell_name, "SHIFTL_%s", lpm_name);
		break;
	case IVL_LPM_SHIFTR:
		sprintf(cell_name, "SHIFTR_%s", lpm_name);
		break;
	case IVL_LPM_RAM   :
		sprintf(cell_name, "RAM_%s_%ld_%s", (char*)ivl_memory_basename(ivl_lpm_memory(net)), width, (char*)ivl_scope_name(ivl_memory_scope(ivl_lpm_memory(net))));
		break;
	case IVL_LPM_DIVIDE:
		fprintf(stderr, "show_lpm_LPM DIVIDE\n");
		break;
	case IVL_LPM_MOD   :
		fprintf(stderr, "show_lpm_LPM MOD\n");
		break;
	case IVL_LPM_UFUNC :
		break;
	default:
	    D1(tabbed_printf(out, 0, "#paj uNHANDLED lpm PRIMITIVE: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net)););
	    fprintf(stderr, "  Unhandled LPM primitive: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net));
	}

	/* add the instance name to the cell.  prbably_should make a copy */
	sprintf(definition_name, "IVERILOG_%s", cell_name);

	/* create an instance cell */
	new_instance_cell = (cell_t*)oEgu_allocate_a_instance_cell(&number_of_cell_allocates);

	/* add the cell defintion into this one */
	lpm_cell = (cell_t*)lpm_definition_cells->data[sc_lookup_string(lpm_definition_cells, definition_name)];
	assert(lpm_cell != NULL);
	oEgu_add_instance_pointer_to_a_cell(new_instance_cell, lpm_cell);
	/* update that this is a reusable cell */
	oEgu_add_instance_reused_cell(new_instance_cell);

	/* add the instance name to new_instance_cell */
	oEgu_add_instance_name_to_a_cell(new_instance_cell, lpm_name);

	/* now add the instance cell to the top cell */
	oEgu_add_a_cell_to_a_cell(this_cell->top_cell, new_instance_cell);

	/* add this type to the list of structures */
    i = sc_add_string(lpm_instance_cells, lpm_name);
    if(lpm_instance_cells->data[i] != NULL)
	{
		D4(tabbed_spaces(BAT);); 
		assert(0);
	}
	/* store this cell in the logic cells */
    lpm_instance_cells->data[i] = (void*)new_instance_cell;

	ou_free(lpm_name);

	D0(tabbed_printf(out, 0, "# END olpm_show_lpm\n");); 
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: olpm_define_lpm )
 *  defines lpm or compund functions so that they can be referenced.  This includes edif-instance
 *  and edif-nets to hookup the internals of the compound structure.
 *-------------------------------------------------------------------------------------------*/
void
olpm_define_lpm(ivl_scope_t current_scope,
	 ivl_lpm_t net)
{
    long i;
    long width = ivl_lpm_width(net);
	int library_cell;
	char cell_name[1096];
	char memory_name[4096];
	char *lpm_name = ou_full_lpm_name(net);

	cell_nets_t *new_net;
	cell_information_basic *lpm_cell;
	cell_t *new_library_cell;

	cell_ports_t **cells_out_ports = NULL;
	cell_ports_t **cells_in1_ports = NULL;
	cell_ports_t **cells_in2_ports = NULL;
	net_pointer_t **out_net_pointers = NULL;
	net_pointer_t **in1_net_pointers = NULL;
	net_pointer_t **in2_net_pointers = NULL;
	int num_outputs, num_inputs1, num_inputs2;
	int width_left = 0;
	int width_right = 0;
	int num_input_ports = 0;

	short macro_index = -1;

	memory_t *memory;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# define_lpm_LPM\n");); 

	/* define the logic cell which will store the information we need */
	lpm_cell = ocdu_allocate_cell_information_basic();

	num_inputs1 = num_inputs2 = width;

	NAME(printf("%s", lpm_name););

    switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
		D0(tabbed_printf(out, 0, "# define_lpm_LPM ADD\n");); 
		num_outputs = width;
		macro_index = MN_ADD;
		sprintf(cell_name, "IVERILOG_ADD_%s", lpm_name);
	    break;
	case IVL_LPM_SUB:
		D0(tabbed_printf(out, 0, "# define_lpm_LPM SUB\n");); 
		sprintf(cell_name, "IVERILOG_SUB_%s", lpm_name);
		num_outputs = width;
		macro_index = MN_SUB;
	    break;
	case IVL_LPM_MULT:
		D0(tabbed_printf(out, 0, "# define_lpm_LPM MULT\n");); 
		sprintf(cell_name, "IVERILOG_MULT_%s", lpm_name);
		num_outputs = width;
		macro_index = MN_MULT;
		/* record what type of multiplier was encountered */
		ocs_record_multiplier(width, width, width);
	    break;
	case IVL_LPM_CMP_EQ:
		num_outputs = 1;
		sprintf(cell_name, "IVERILOG_CMP_EQ_%s", lpm_name);
		macro_index = MN_EQ;
		break;
	case IVL_LPM_CMP_GE:
		num_outputs = 1;
		sprintf(cell_name, "IVERILOG_CMP_GE_%s", lpm_name);
		macro_index = MN_GE;
		break;
	case IVL_LPM_CMP_GT:
		num_outputs = 1;
		sprintf(cell_name, "IVERILOG_CMP_GT_%s", lpm_name);
		macro_index = MN_GT;
		break;
	case IVL_LPM_CMP_NE:
		num_outputs = 1;
		sprintf(cell_name, "IVERILOG_CMP_NE_%s", lpm_name);
		macro_index = MN_NEQ;
		break;
	case IVL_LPM_MUX:
		D0(tabbed_printf(out, 0, "# define_lpm_LPM MUX\n");); 
		sprintf(cell_name, "IVERILOG_MUX_%s", lpm_name);
		num_outputs = width;
		macro_index = MN_MUX;
	    break;
	case IVL_LPM_SHIFTL:
		num_outputs = width;
		sprintf(cell_name, "IVERILOG_SHIFTL_%s", lpm_name);
		macro_index = MN_SHIFT_LEFT;
		break;
	case IVL_LPM_SHIFTR:
		num_outputs = width;
		sprintf(cell_name, "IVERILOG_SHIFTR_%s", lpm_name);
		macro_index = MN_SHIFT_RIGHT;
		break;
	case IVL_LPM_FF:
		D0(tabbed_printf(out, 0, "# define_lpm_LPM FF\n");); 
		sprintf(cell_name, "IVERILOG_FF_%s", lpm_name);
		num_outputs = width;
	    break;
	case IVL_LPM_RAM   :
		{
			node_t *created_node;
			/* RAM - this is an lpm device that is found as a definition. */
			num_outputs = width;
	
			sprintf(cell_name, "IVERILOG_RAM_%s_%ld_%s", (char*)ivl_memory_basename(ivl_lpm_memory(net)), width, (char*)ivl_scope_name(ivl_memory_scope(ivl_lpm_memory(net))));
			sprintf(memory_name, "%s_%s", (char*)ivl_memory_basename(ivl_lpm_memory(net)), (char*)ivl_scope_name(ivl_memory_scope(ivl_lpm_memory(net))));
	
			/* check if the memory is already created */
			if (omu_is_memory_cell_already_defined(memory_name) == FALSE)
			{
				/* IF - it isn't then create it */
				int memory_address_width;
	
				/* calculate the address pins needed since ICARUS seems to default to 32 bits */
				memory_address_width = ou_find_bit_width_of_address_size(ivl_memory_size(ivl_lpm_memory(net))); 
	
				/* create the cell */
				lpm_cell->top_cell = omu_define_memory_cell(ivl_lpm_memory(net), width, memory_address_width, memory_name);
	
				/* build a node for the memory */
				created_node = onacu_create_memory_node("MEMORY",  width, memory_address_width, width, MN_MEMORY);
	
				/* record the cell info */
				memory = omu_create_memory(memory_address_width, created_node, ivl_lpm_memory(net));
				memory->address_read = EXPR_READ;
	
				/* record the read memory */
				memory->read_memory_cell = lpm_cell->top_cell;
	
				/* add to the global recording structures */
				omu_add_a_memory_cell(memory, memory_name);
			}
			else
			{
				/* ELSE - already created by the write statement */
	
				/* grab the read side and define this memory as read */
				memory = omu_get_memory(memory_name);
				memory->address_read = EXPR_READ;
	
				/* define the read memory */
				lpm_cell->top_cell = memory->read_memory_cell = omu_define_memory_cell(ivl_lpm_memory(net), width, memory->address_width, memory_name);;
			}
	
			/* add this information to the cell that it is a memory */
			oEgu_add_memory_hetero_flag(lpm_cell->top_cell, ivl_lpm_memory(net), memory);
	
			/* add this type of compund and to the available gates */
			i = sc_add_string(lpm_definition_cells, cell_name);
		
			/* if we have already defined this type of gate return */
		    if(lpm_definition_cells->data[i] != NULL)
			{
				D4(tabbed_spaces(BAT);); 
				return;
			}
		
		    lpm_definition_cells->data[i] = (void*)lpm_cell->top_cell;
			return;
		}

		break;
	case IVL_LPM_DIVIDE:
		fprintf(stderr, "define_lpm_LPM DIVIDE\n");
		assert(0);
		break;
	case IVL_LPM_MOD   :
		fprintf(stderr, "define_lpm_LPM MOD\n");
		assert(0);
		break;
	case IVL_LPM_UFUNC :
		fprintf(stderr, "define_lpm_LPM UFUNC\n");
		assert(0);
		break;
	default:
	    D1(tabbed_printf(out, 0, "#paj UNHANDLED LPM PRIMITIVE: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net)););
	    fprintf(stderr, "  Unhandled LPM primitive: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net));
	}

	/* add this type of compund and to the available gates */
	i = sc_add_string(lpm_definition_cells, cell_name);

	/* if we have already defined this type of gate return */
    if(lpm_definition_cells->data[i] != NULL)
	{
		D4(tabbed_spaces(BAT);); 
		return;
	}

	/* define the lpm inside the cell */
	lpm_cell->top_cell = oEgu_add_generated_cell(cell_name);

    lpm_definition_cells->data[i] = (void*)lpm_cell->top_cell;

	cells_out_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*num_outputs, HETS_LPM);
	cells_in1_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*num_inputs1, HETS_LPM);
	cells_in2_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*num_inputs2, HETS_LPM);

	switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
	case IVL_LPM_SUB:
	case IVL_LPM_MULT:
	case IVL_LPM_CMP_EQ:
	case IVL_LPM_CMP_GE:
	case IVL_LPM_CMP_GT:
	case IVL_LPM_CMP_NE:
		{
			for(i = 0; i < width ; i++)
			{
				if (ivl_lpm_data(net, i))
				{
					cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
					oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in1_ports[i]);
					width_left ++;
				}
			}
			for(i = 0; i < width; i++)
			{
				if (ivl_lpm_datab(net, i))
				{
					cells_in2_ports[i] = oEgu_add_a_cell_port_defined_by_user("in2", i, IN_PORT);
					oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in2_ports[i]);
					width_right ++;
				}
			}
			for(i = 0; i < num_outputs; i++)
			{
				if (ivl_lpm_q(net, i))
				{
					cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
					oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_out_ports[i]);
				}
			}
		
			in1_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_in1_ports, width_left);
			in2_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_in2_ports, width_right);
			out_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_out_ports, num_outputs);
				
			if (width_left > 0)
			{
				num_input_ports++;
			}
			if (width_right > 0)
			{
				num_input_ports++;
			}

			/* build the skeleton that will be hooked up to the input output_pins */
			ohu_build_skeleton (lpm_cell->top_cell,
					in1_net_pointers, in2_net_pointers, width_left, width_right, 
					out_net_pointers, num_outputs,
					width,
				   	macro_index, 
					num_input_ports, 1);
		}
		break;
	case IVL_LPM_MUX:
		{
			cell_ports_t **selects = (cell_ports_t**)ou_malloc(sizeof(cell_ports_t*)*ivl_lpm_selects(net), HETS_LPM); 
			net_pointer_t **select_net_pointers = NULL;

			/* Don't deal with more than two input muxes */
			assert(ivl_lpm_selects(net) <= 1);

			/* define the ports of this LPM */
			for (i = 0; i < ivl_lpm_selects(net); i++)
			{
				selects[i] = oEgu_add_a_cell_port_defined_by_user("selects", i, IN_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, selects[i]);
			}
		    for(i = 0; i < width; i++)
			{
				cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_out_ports[i]);
				cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in1_ports[i]);
				cells_in2_ports[i] = oEgu_add_a_cell_port_defined_by_user("in2", i, IN_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in2_ports[i]);
			}

		    library_cell = find_library_cell("MUX");
		    if(library_cell < 0)
			{
				break;
			}

			in1_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_in1_ports, width);
			in2_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_in2_ports, width);
			out_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_out_ports, width);
			select_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, selects, ivl_lpm_selects(net));

			ohu_build_skeleton_for_three_ported (lpm_cell->top_cell,
					in1_net_pointers, 
					width,
					in2_net_pointers, 
					width,
					select_net_pointers,
					ivl_lpm_selects(net),
					out_net_pointers, 
					width,
					width,
				   	macro_index, 
					3, 1);

			ou_free(selects);

			if (select_net_pointers)
				ou_free(select_net_pointers);
		}
	    break;
	case IVL_LPM_SHIFTL:
	case IVL_LPM_SHIFTR:
		{
			for(i = 0; i < width ; i++)
			{
				if (ivl_lpm_data(net, i))
				{
					cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
					oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in1_ports[i]);
					width_left ++;
				}
			}
			for(i = 0; i < width; i++)
			{
				if (ivl_lpm_q(net, i))
				{
					cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
					oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_out_ports[i]);
				}
			}
		
			in1_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_in1_ports, width_left);
			out_net_pointers = oEgu_create_net_pointers_list_from_local_cell_ports_list(lpm_cell->top_cell, cells_out_ports, width);

			/* build the skeleton that will be hooked up to the input output_pins */
			ohu_build_skeleton_for_shift ( lpm_cell->top_cell,
				in1_net_pointers, width_left, 
				out_net_pointers, width,
				macro_index,
				ivl_lpm_selects(net),
				width);
		}
		break;
	case IVL_LPM_FF:
		{
			cell_ports_t *clock;
			cell_nets_t *clock_net;

			/* intialize the cells ports */
			clock = oEgu_add_a_cell_port_defined_by_user("clk", 0, IN_PORT);
			oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, clock);
		    for(i = 0; i < width; i++)
			{
				cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_out_ports[i]);
				cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
				oEgu_add_a_port_to_a_cell(lpm_cell->top_cell, cells_in1_ports[i]);
			}

		    library_cell = find_library_cell("DFF");
		    if(library_cell < 0)
			{
				break;
			}
	
			clock_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port(lpm_cell->top_cell, clock);

			for (i = 0; i < width; i++)
			{
				new_library_cell = oEgu_add_defined_cell_unformatted_name(library_cell, "%s_%ld", lpm_name, i);
				oEgu_add_a_cell_to_a_cell(lpm_cell->top_cell, new_library_cell);

				/* hook up input 1 */
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port(lpm_cell->top_cell, cells_in1_ports[i]);
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(lpm_cell->top_cell, new_net, oEgu_add_an_internal_signal_of_a_defined_gate(library_cell, 1, new_library_cell));
				/* hook up input 2 */
				oEgu_add_a_internal_DRIVEN_to_a_cell_net(lpm_cell->top_cell, clock_net, oEgu_add_an_internal_signal_of_a_defined_gate(library_cell, 2, new_library_cell));
				/* hookup the outputs */
				new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(lpm_cell->top_cell, oEgu_add_an_internal_signal_of_a_defined_gate(library_cell, 0, new_library_cell));
				oEgu_add_a_port_DRIVEN_to_a_cell_net(lpm_cell->top_cell, new_net, cells_out_ports[i]);
			}
		}
	    break;
	case IVL_LPM_RAM   :
	case IVL_LPM_DIVIDE:
	case IVL_LPM_MOD   :
	case IVL_LPM_UFUNC :
		assert(0);
		break;
	default:
	    D1(tabbed_printf(out, 0, "#paj UNHANDLED LPM PRIMITIVE: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net)););
	    fprintf(stderr, "  Unhandled LPM primitive: %s: <width=%u>\n",
		    lpm_name, ivl_lpm_width(net));
	}		

	if (in1_net_pointers)
		ou_free(in1_net_pointers);
	if (in2_net_pointers)
		ou_free(in2_net_pointers);
	if (out_net_pointers)
		ou_free(out_net_pointers);
	if (cells_out_ports)
		ou_free(cells_out_ports);
	if (cells_in1_ports)
		ou_free(cells_in1_ports);
	if (cells_in2_ports)
		ou_free(cells_in2_ports);

	ou_free(lpm_name);

	D0(tabbed_printf(out, 0, "# END olpm_define_lpm\n");); 
	D4(tabbed_spaces(BAT);); 
}
