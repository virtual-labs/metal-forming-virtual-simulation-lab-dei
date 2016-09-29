
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

/* This file deals with some simple signal definitions.  This is mainly to deal with primary inputs and outputs. */
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
#include "odin_cell_define_utils.h"
#include "odin_net_utils.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: os_show_signal_as_interface )
 * 	Adds the signal as a port of the cell
 *-------------------------------------------------------------------------------------------*/
void os_show_signal_as_interface(cell_information_module *v_this_cell, ivl_scope_t current_scope, ivl_signal_t sig)
{
    char *pad;
	cell_information_basic *this_cell = (cell_information_basic *)v_this_cell;
	int i;

	cell_ports_t *new_port;

	D4(tabbed_spaces(TAB);); 
	D5(tabbed_printf(out, 0, "# show_signal_as_interface\n"););

	/* if this port is anything but NONE {IVL_SIP_NONE  = 0, IVL_SIP_INPUT = 1, IVL_SIP_OUTPUT= 2, IVL_SIP_INOUT = 3} */
    if(ivl_signal_port(sig) != IVL_SIP_NONE)
	{
		D1(tabbed_printf(out, 0, "# port %s with width %d\n", ivl_signal_name(sig), ivl_signal_pins(sig)););
		NAME(printf("%s", ivl_signal_name(sig)););

		for (i = 0; i < ivl_signal_pins(sig); i++)
		{
			/* based on the type of port print the edif equivalent */
		    switch (ivl_signal_port(sig))
			{
			case IVL_SIP_INPUT:
				new_port = oEgu_add_a_cell_port_defined_by_a_signal (sig, i, IN_PORT);
				oEgu_add_a_port_to_a_cell(this_cell->top_cell, new_port);
				/* add this input to the list for the cell */
				ocdu_add_input_to_cell((void *)v_this_cell,  
								new_port);
			    break;
			case IVL_SIP_OUTPUT:
				new_port = oEgu_add_a_cell_port_defined_by_a_signal (sig, i, OUT_PORT);
				oEgu_add_a_port_to_a_cell(this_cell->top_cell, new_port);
				/* add this output to the list for the cell */
				ocdu_add_output_to_cell((void *)v_this_cell,  
								new_port);
			    break;
			case IVL_SIP_INOUT:
				assert(0);
			    break;
			default:
			    D1(tabbed_printf(out, 0, "#paj uNSUPPORTED pORT TYPE\n"););
			}
		}
	}
	/* if this is a PAD then print out the Pad information */
    else if((pad = (char *)ivl_signal_attr(sig, "PAD")) != NULL)
	{
		assert(0);
	}
	else
	{
		D1(tabbed_printf(out, 0, "# Signal is nothing:\n"););
	}
	D5(tabbed_printf(out, 0, "# END show_signal_as_interface\n"););
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (funtction: os_find_input_nets_module)
 * 	Based on a signal type, this function finds the net that drives it.  This is essentially
 * 	for OUTPUT signals of the top module.
 *-------------------------------------------------------------------------------------------*/
void os_find_input_nets_module(cell_information_module *v_this_cell,
								ivl_signal_t signal)
{
	int i;

	net_pointer_t *to_add_net_pointer;
	cell_ports_t *new_port;

	/* need to make a net connection for all the pins of an embedded signal */
	for (i = 0; i < ivl_signal_pins(signal); i++)
	{
		NAME(printf("%s", (char*)ivl_signal_name(signal)););
		/* create a net pointer */
		new_port = oEgu_lookup_port_as_signal_name(v_this_cell->top_cell, (char*)ivl_signal_name(signal), i);
		assert(new_port != NULL);
		to_add_net_pointer = oEgu_allocate_a_cell_net_pointer_for_a_port(v_this_cell->top_cell, new_port);

		/* add the net */
		ou_search_and_add_driven_to_net(v_this_cell,
						to_add_net_pointer,
						ivl_signal_pin(signal, i), 
						0);
	}
}
