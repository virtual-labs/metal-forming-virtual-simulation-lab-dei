
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

/* This file is sort of named incorrectly, but what it does is the high-level traversal of the Internal Representation provided
 * by Icarus, and converts it into the first data structure form, which is a close representation of the hierarchical design.
 * This is done over three stages.  Stage 1 creates the data structure for everything, stage 2 creates all the outputs and statements
 * , and stage 3 completes the connection nets now that everything exists and can be matched up.
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_net_utils.h"

#include "odin_eval_expr.h"
#include "odin_cell_define_utils.h"
#include "odin_signal.h"
#include "odin_eval_stmt.h"
#include "odin_IR_lookup.h"
#include "odin_hl_flatten.h"
#include "odin_ds1_graph_utils.h"
#include "odin_logic.h"
#include "odin_lpm.h"

cell_information_module* top_cell;

/*---------------------------------------------------------------------------------------------
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
			TRAVERSE STAGE - INITIAL PARSE (INITIAL_PARSE)
				get all the info about the cells and start
				up the basic definition for a module.
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*/

/******* HELPER TRAVERSE FUNCTIONS *******/
int ohlf_helper_child_traverse_1_modules_based_on_scope(ivl_scope_t net, void *x)
{
	return ohlf_traverse_1_modules_based_on_scope(net, NULL);
}

int ohlf_helper_traverse_1_modules_based_on_scope(ivl_process_t net, void *x)
{
	return ohlf_traverse_1_modules_based_on_scope(ivl_process_scope(net), ivl_process_stmt(net));
}
/*---------------------------------------------------------------------------------------------
 * (function: ohlf_traverse_1_modules_based_on_scope )
 * 	Stage 1 of the traversal essentially builds all the module data-structures.  It adds the 
 * 	port listing to the cell, and creates all the compound logic and LPM cells.
 *-------------------------------------------------------------------------------------------*/
int ohlf_traverse_1_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt)
{
	cell_information_module* this_cell;
	int i, idx, j;
	static int the_top_level_module;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ohlf_traverse_1_modules_based_on_scope\n");); 

	/* add tname to the string cache for modules so we don't redo modules */
	D0(tabbed_printf(out, 0, "# tname %s\n", ivl_scope_tname(scope)););

	if (ivl_scope_type(scope) == IVL_SCT_FUNCTION)
	{
		/* IF - this is a function scope then do nothing */
		return 0;
	}

	NAME(printf("%s",  (char*)ivl_scope_name(scope)););
	/* add this entry to the lookup table so we can find any tname given any module scope_name */
	oIl_add_tname_to_scope_name_lookup_for_modules(IR_module_tname_lookup, (char*)ivl_scope_tname(scope), (char*)ivl_scope_name(scope));

	/* look in string cahce for the NAME...which means there can be multiples of one module with unique names */
	i = sc_add_string(visited_modules_string_cache, (char*)ivl_scope_name(scope));

    if((visited_modules_string_cache->data[i] != NULL) 
			&& (ou_do_strings_match((char*)ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != TRUE)) 
			//&& (strcmp(ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != 0)) 
	{
		/* IF - this module has been looked at before and it doesn't have the name as before then this is a duplicate definition of a 
		 * module.  Basically, we allow one module to be defined as a cell and all references simply instantiate it. */
	
		D1(tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_scope_name(scope)););
		D4(tabbed_spaces(BAT);); 
		return 0;
	}
	else if (visited_modules_string_cache->data[i] == NULL) 
	{
		/* ELSE IF - this module definition has never been visited */

		/* create a cell with unique name so we can identify it */
		this_cell = ocdu_macro_define_module((char*)ivl_scope_name(scope));

		/* create an IR cell for this module */
		this_cell->top_cell = oEgu_add_generated_cell((char*)ivl_scope_name(scope));

		/* update that we have traversed this module once */
		this_cell->number_times_visited_for_traversing[INITIAL_PARSE] = 1;

		/* mark this module */
		visited_modules_string_cache->data[i] = this_cell;

		/* verify that only the supported scopes for modules are analysed here */
		assert(ivl_scope_type(scope) == IVL_SCT_MODULE);

		/* start the edif output for this module */
	    D1(tabbed_printf(out, 0, "# Processing module: %s (%u signals, %u logic)\n",
		    ivl_scope_tname(scope), ivl_scope_sigs(scope),
		    ivl_scope_logs(scope)););
	    D1(tabbed_printf(out, 0, "# processing scope %s\n", ivl_scope_name(scope)););
	
		if (the_top_level_module == FALSE)
		{
			/* IF - static check to see if this is the top level module.  If it is then we need to add the ZERO and ONE
		 	* 	Lines that may be used by all other cells */

			the_top_level_module = TRUE;

			/* Print out the port listing of this module by going through all the signals in this net */
		    for(idx = 0; idx < ivl_scope_sigs(scope); idx++)
			{
				os_show_signal_as_interface(this_cell, scope, ivl_scope_sig(scope, idx));
			}

			/* asssign the top cell so all others can reference it */
			top_cell = this_cell;
		}

		/* PHASE - traverse the LPM and LOGIC elements */

		/* traverse logic - to define the logic cells */
		for(j = 0; j < ivl_scope_logs(scope); j++)
		{
			ol_define_logic_cell(ivl_logic_type(ivl_scope_log(scope, j)), ivl_logic_pins(ivl_scope_log(scope, j)));
		}
	
		/* traverse lpms - to define the LPM compound cells */
		for(j = 0; j < ivl_scope_lpms(scope); j++)
		{
			olpm_define_lpm(scope, ivl_scope_lpm(scope,j));
		}

		/* traverse children recursively through this function */
		ivl_scope_children(scope, ohlf_helper_child_traverse_1_modules_based_on_scope, NULL);
	}
	else
	{
		/* ELSE - set up this cell to point to the cache string */
		this_cell = (cell_information_module*)visited_modules_string_cache->data[i];

		assert(this_cell->number_times_visited_for_traversing[INITIAL_PARSE] != 0);

		/* update that we have traversed this module once more */
		this_cell->number_times_visited_for_traversing[INITIAL_PARSE]++;
	}
	
	D0(tabbed_printf(out, 0, "# END ohlf_traverse_1_modules_based_on_scope\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return 0;
}

/*---------------------------------------------------------------------------------------------
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
			TRAVERSE STAGE - OUTPUT NETS for STATEMENTS, LOGIC, LPMs, and MODULES (NET_OUTS)
				traverse all the modules creating the nets and cells.  For the
				nets we only put the outputs which will be searched for in the
				following stages				
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*/

/******* HELPER TRAVERSE FUNCTIONS *******/
int ohlf_helper_child_traverse_2_modules_based_on_scope(ivl_scope_t net, void *x)
{
	return ohlf_traverse_2_modules_based_on_scope(net, NULL);
}

int ohlf_helper_traverse_2_modules_based_on_scope(ivl_process_t net, void *x)
{
	return ohlf_traverse_2_modules_based_on_scope(ivl_process_scope(net), ivl_process_stmt(net));
}
/*---------------------------------------------------------------------------------------------
 * (function: ohlf_traverse_2_modules_based_on_scope )
 * 	Goes through each of the scope based modules and instantiates the statement, logic, and 
 * 	lpm cells.  We also add all the output port infromation at this stage since this information
 * 	is not directly available in the IR.  This is due to the behavioural and structural 
 * 	mixture in Verilog. 
 *-------------------------------------------------------------------------------------------*/
int ohlf_traverse_2_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt)
{
	cell_information_module* this_cell;
	int i, j;
	vector_info *statement_information;
	static int unique_statement_id = 0;
	static int top_level_module = FALSE;
	ivl_signal_t local_signal;
	net_pointer_t *new_net_point;
	cell_ports_t *new_port;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ohlf_traverse_2_modules_based_on_scope\n");); 

	/* add tname to the string cache for modules so we don't redo modules */
	D0(tabbed_printf(out, 0, "# name %s\n", ivl_scope_name(scope)););

	if (ivl_scope_type(scope) == IVL_SCT_FUNCTION)
	{
		/* IF - this is a function scope then do nothing */
		return 0;
	}

	/* search for the name of the module */
	i = sc_add_string(visited_modules_string_cache, (char*)ivl_scope_name(scope));

    if((visited_modules_string_cache->data[i] != NULL) 
			&& (ou_do_strings_match((char*)ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != TRUE)) 
			//&& (strcmp(ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != 0)) 
	{
		/* IF - this module has been looked at before and it doesn't have the name as before then this is a duplicate definition of a 
		 * module.  Basically, we allow one module to be defined as a cell and all references simply instantiate it. */
	
		D1(tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_scope_name(scope)););
		D4(tabbed_spaces(BAT);); 
		return 0;
	}

	/* set up this cell to point to the cache string */
	this_cell = (cell_information_module*)visited_modules_string_cache->data[i];

	/* update that we have traversed this module once */
	this_cell->number_times_visited_for_traversing[NET_OUTS]++;

	if (top_level_module == FALSE)
	{
		/* IF - static check to see if this is the top level module.  If it is then we need to add the ZERO and ONE
		 * 	Lines that may be used by all other cells */

		top_level_module = TRUE;
	
		D0(tabbed_printf(out, 0, "# Visiting Top level module\n", ivl_scope_name(scope)););

		/* update that we have traversed this module once */
		this_cell->number_times_visited_for_traversing[NET_OUTS] = 1;

		/* CREATE a cell for the ZERO and ONE cells */
		this_cell->zero_cell = oEgu_add_defined_cell_unformatted_name(zero_cell_lib_index, "MODULES_ZERO_CONSTANT");
		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, this_cell->zero_cell);
		this_cell->one_cell = oEgu_add_defined_cell_unformatted_name(one_cell_lib_index, "MODULES_ONE_CONSTANT");
		oEgu_add_a_cell_to_a_cell(this_cell->top_cell, this_cell->one_cell);

		/* now add there output ports as nets */
		this_cell->zero_cell_net = oEgu_allocate_a_cell_net();
		oEgu_add_a_net_pointer_driver_to_a_cell_net(
												this_cell->top_cell,
												this_cell->zero_cell_net, 
												oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
													this_cell->top_cell,
													oEgu_add_an_internal_signal_of_a_defined_gate(zero_cell_lib_index, 0, this_cell->zero_cell)));
		oEgu_add_a_net_to_a_cell(this_cell->top_cell, this_cell->zero_cell_net);

		this_cell->one_cell_net = oEgu_allocate_a_cell_net();
		oEgu_add_a_net_pointer_driver_to_a_cell_net(
												this_cell->top_cell,
												this_cell->one_cell_net, 
												oEgu_allocate_a_cell_net_pointer_for_an_internal_signal(
													this_cell->top_cell,
													oEgu_add_an_internal_signal_of_a_defined_gate(one_cell_lib_index, 0, this_cell->one_cell)));
		oEgu_add_a_net_to_a_cell(this_cell->top_cell, this_cell->one_cell_net);

		/* add the input ports of the top level module as net drivers */

		/* now look at the signals of this module so we can hook them up with signals in the instantiating module */
		for(i = 0; i < ivl_scope_sigs(scope); i++)
		{
			/* grab a signal */
			local_signal = ivl_scope_sig(scope,i);

			if (ivl_signal_port(local_signal) == IVL_SIP_INPUT) 
			{
				D0(tabbed_printf(out, 0, "# signals INPUT %d of %d in %s\n", i, ivl_scope_sigs(scope), ivl_scope_name(scope)););
	
				/* go through each of the pins */
				for (j = 0; j < ivl_signal_pins(local_signal); j++)
				{
					/* IF - local port then add with no instance name */
					NAME(printf("%s", (char*)ivl_signal_name(local_signal)););
					new_port = oEgu_lookup_port_as_signal_name(this_cell->top_cell, (char*)ivl_signal_name(local_signal), j);
					new_net_point = oEgu_allocate_a_cell_net_pointer_for_a_port(this_cell->top_cell, new_port);

					onu_add_module_nets_info_collection(this_cell->top_cell, new_net_point, new_net_point);
				}
			}
		}
	
	}

	if (this_cell->number_times_visited_for_traversing[NET_OUTS] == 1)
	{
		/* IF - this module definition has never been visited */
		/* traverse logic - to create an instance and add all the output ports to their respective nets */
		for(j = 0; j < ivl_scope_logs(scope); j++)
		{
			ol_show_logic(top_cell, scope, ivl_scope_log(scope, j));
			ol_traverse_0_add_ports(top_cell, ivl_scope_log(scope, j), logic_instance_cells);
		}
	
		/* traverse lpms - to show the LPMs, and add all their outputs to create nets */
		for(j = 0; j < ivl_scope_lpms(scope); j++)
		{
			olpm_show_lpm(top_cell, scope, ivl_scope_lpm(scope, j));
			olpm_traverse_0_add_ports(top_cell, ivl_scope_lpm(scope, j), lpm_instance_cells);
		}

		/* traverse children recursively through this function to define all modules that are children of this module.  This
		 * is key to determine modules that do not have an Initial or always statement, and simply define one logic or lpm
		 * element. */
		ivl_scope_children(scope, ohlf_helper_child_traverse_2_modules_based_on_scope , NULL);
	}

	if (stmt != NULL)
	{
		/* IF - this part of the module has a statement then define it and analyse its outputs */

		/* go through the actual definition of statements. */
		statement_information = op_start_statement_generation(stmt, scope, &top_level_process_info);
	
		/* add the statements to this net */
		ocdu_instantiate_cell_and_make_nets_module(top_cell,
												statement_information->this_statement_cell_info,
												unique_statement_id++);
		
		/* record this statement for later use.  All statements are added to the top level cell.
		 * This is so we can flatten all of these statments at once. */
		ocmdu_add_statement_module(top_cell, statement_information->this_statement_cell_info);
		ou_free(statement_information);
	}
	
	D0(tabbed_printf(out, 0, "# END ohlf_traverse_2_modules_based_on_scope\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return 0;
}

/*---------------------------------------------------------------------------------------------
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
			TRAVERSE STAGE - COMPLETE NETS (COMPLETE_NETS)
				In this stage we find inputs and make sure they have a net
				with a driving output to be added to.
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*
 *-------------------------------------------------------------------------------------------*/

/******* HELPER TRAVERSE FUNCTIONS *******/
int ohlf_helper_child_traverse_3_modules_based_on_scope(ivl_scope_t net, void *x)
{
	return ohlf_traverse_3_modules_based_on_scope(net, NULL); 
}

int ohlf_helper_traverse_3_modules_based_on_scope(ivl_process_t net, void *x)
{
	return ohlf_traverse_3_modules_based_on_scope(ivl_process_scope(net), ivl_process_stmt(net));
}
/*---------------------------------------------------------------------------------------------
 * (function: ohlf_complete_define_process_elements_as_cells )
 * 	Once all modules have been traversed once, traverse a second time to complete them by 
 * 	adding all the input signals to their respective nets.
 *-------------------------------------------------------------------------------------------*/
int ohlf_traverse_3_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt)
{
	cell_information_module* this_cell;
	int i, j;
	static int top_level_module_complete = FALSE;
	ivl_signal_t local_signal;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# ohlf_traverse_3_modules_based_on_scope\n");); 

	/* add tname to the string cache for modules so we don't redo modules */
	D0(tabbed_printf(out, 0, "# name %s\n", ivl_scope_name(scope)););

	if (ivl_scope_type(scope) == IVL_SCT_FUNCTION)
	{
		/* IF - this is a function scope then do nothing */
		return 0;
	}

	/* look for full module name */
	i = sc_add_string(visited_modules_string_cache, (char*)ivl_scope_name(scope));

    if((visited_modules_string_cache->data[i] != NULL) 
			&& (ou_do_strings_match((char*)ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != TRUE)) 
			//&& (strcmp(ivl_scope_name(scope), ((cell_information_module*)visited_modules_string_cache->data[i])->top_cell->cell_definition_name) != 0)) 
	{
		/* IF - only do the redefinition for one module of the same tname.  For example two modules for an adder have the same tname,
		 * but different names.  So we avoid defining both as modules */
	
		D1(tabbed_printf(out, 0, "# index:%ld named:%s no need to analyse\n", i, ivl_scope_name(scope)););
		D4(tabbed_spaces(BAT);); 
		return 0;
	}

	/* set up this cell to point to the cache string */
	this_cell = (cell_information_module*)visited_modules_string_cache->data[i];

	/* update that we have traversed this module once */
	this_cell->number_times_visited_for_traversing[COMPLETE_NETS]++;

	if (top_level_module_complete == FALSE)
	{
		/* IF - static check to see if this is the top level module.  If it is then we need to add the ZERO and ONE
		 * 	Lines that may be used by all other cells */

		top_level_module_complete = TRUE;

		/* add the output ports of the top level module as net driven */
		/* now look at the input signals and add them to their output nets */
		for(i = 0; i < ivl_scope_sigs(scope); i++)
		{
			/* grab a signal */
			local_signal = ivl_scope_sig(scope,i);

			if (ivl_signal_port(local_signal) == IVL_SIP_OUTPUT)
			{
				D0(tabbed_printf(out, 0, "# signals %d of %d in %s type:%d\n", i, ivl_scope_sigs(scope), ivl_scope_name(scope), ivl_signal_port(local_signal)););

				/* use the signal to find an output net */
				os_find_input_nets_module(top_cell, local_signal);
			}
		}
	}

	if (this_cell->number_times_visited_for_traversing[COMPLETE_NETS] == 1)
	{
		/* IF - this is the first pass then update the inputs of one time objects including statements since we have saved all of these */

		/* traverse logic - to add the input ports to their respective nets */
		for(j = 0; j < ivl_scope_logs(scope); j++)
		{
			ol_traverse_1_add_ports(top_cell, ivl_scope_log(scope, j), visited_logic_string_cache, logic_instance_cells);
		}
	
		/* traverse lpms - to add LPM input ports to the driver nets */
		for(j = 0; j < ivl_scope_lpms(scope); j++)
		{
			olpm_traverse_1_add_ports(top_cell, ivl_scope_lpm(scope, j), visited_logic_string_cache, lpm_instance_cells);
		}

		if (this_cell->this_modules_statements != NULL)
		{
			/* IF this is a module with statments */

			/* add the statements to this net */
			ocmdu_complete_statement_nets_module(this_cell);
		}

		/* traverse children recursively through this function */
		ivl_scope_children(scope, ohlf_helper_child_traverse_3_modules_based_on_scope, NULL);
	}

	D0(tabbed_printf(out, 0, "# %d == %d\n", this_cell->number_times_visited_for_traversing[NET_OUTS] , 
				this_cell->number_times_visited_for_traversing[COMPLETE_NETS]););

	D0(tabbed_printf(out, 0, "# END ohlf_traverse_3_modules_based_on_scope\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return 0;
}
