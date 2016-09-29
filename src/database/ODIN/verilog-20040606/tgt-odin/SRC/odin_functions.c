
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

/* This is currently defunct code that handles Verilog functions.  I haven't got around to getting this stuff working again. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_cell_define_utils.h"
#include "odin_eval_stmt.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: of_show_function )
 * 	This function builds a function cell that can be instantiated by others.
 *-------------------------------------------------------------------------------------------*/
vector_info *of_show_function(ivl_scope_t sscope, inflowmation *pass_info)
{
	vector_info *rc;
	cell_information_stmt *return_cell;
	int i, j;
	int output_count = 0;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# of_show_function\n");); 

	/* allocate the cell recording information */
	return_cell = ocdu_macro_define_stmt((char*)ivl_scope_name(sscope));
	
	/* do the hardware for the internal hardware structure */
	rc = op_start_statement_generation(ivl_scope_def(sscope), sscope, pass_info);
	
	/* define the input ports */
	/* define the output ports */
	for(i = 0; i < ivl_scope_sigs(sscope); i++)
	{
		if (ivl_signal_port(ivl_scope_sig(sscope, i)) == IVL_SIP_INPUT)
		{
			for (j = 0; j < ivl_signal_pins(ivl_scope_sig(sscope, i)); j++)
			{
				/* IF - an input port then define as PARM_i where we will reference as parm numb */
				oEgu_add_a_port_to_a_cell(return_cell->top_cell,
										oEgu_add_a_cell_port_defined_by_user(
											(char*)ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_signal_pin(ivl_scope_sig(sscope, i), 0), 0))),
											ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(ivl_scope_sig(sscope, i), j), 0)),
											IN_PORT));
			}
		}
		else if (ivl_signal_port(ivl_scope_sig(sscope, i)) == IVL_SIP_OUTPUT)
		{
			for (j = 0; j < ivl_signal_pins(ivl_scope_sig(sscope, i)); j++)
			{
				oEgu_add_a_port_to_a_cell(return_cell->top_cell,
										oEgu_add_a_cell_port_defined_by_user(
											(char*)ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_signal_pin(ivl_scope_sig(sscope, i), 0), 0))),
											ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(ivl_scope_sig(sscope, i), j), 0)),
											OUT_PORT));

				output_count++;
			}
		}
		else
		{
			/* ELSE - we have a function problem that is unhandled */
			assert (FALSE);
		}
    }

	/* connect all the cell stuff with this cell */
	ocdu_instantiate_cell_and_make_connections_stmt(return_cell,
												rc->this_statement_cell_info,
												0,
												DIRECT_CONNECTION);

	rc->wid = output_count; 
	rc->this_statement_cell_info = return_cell;

	D0(tabbed_printf(out, 0, "# END of_show_function\n");); 
	D4(tabbed_spaces(BAT);); 

	return rc;
}
