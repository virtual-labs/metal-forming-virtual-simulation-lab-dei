
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

/* This file contains all the functionality that converts statements into nodes of a flattened netlist.  Originally, this was a hierarchical structure,
 * but for some reason (it was important at the time, and think was something to do with not having to replicate gnd and vcc cells) I made this into 
 * a flattened traversal.  Statements are created and configured as done below.  Many statment types are not handled, and I don't plan on supporting
 * every type until I need them.
 */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <math.h>
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
#include "odin_memory_utils.h"
#include "odin_ds1_graph_utils.h"
#include "odin_node_and_cell_utils.h"
#include "odin_node_utils.h"
#include "odin_soft_mapping.h"
#include "odin_finite_state_machine.h"

/****************************************************************************************************
* GLOBALS
***************************************************************************************************/
int idx_if = 0;
mixed_signal_t *zero_signal;
mixed_signal_t *one_signal;
signal_list_t *all_signals_in_block;
STRING_CACHE *shell_signals; 
char* current_reset_signal_name;
int current_reset_index;
short current_level; 
short current_reset_state_from_hee_signal; 
node_t **local_write_memories;
int num_local_write_memories;
signal_list_t** last_conditions;
int num_last_conditions;

/****************************************************************************************************
* PROTOTYPES
***************************************************************************************************/
signal_list_t* op_define_statement(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

signal_list_t* op_define_stmt_delayx(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

signal_list_t* op_define_stmt_delay(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

signal_list_t* op_define_stmt_condit(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

signal_list_t* op_define_stmt_case(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

signal_list_t* op_define_stmt_assign_nb(ivl_statement_t net, inflowmation *pass_info);

signal_list_t* op_define_stmt_assign(ivl_statement_t net, inflowmation *pass_info);

signal_list_t* op_define_stmt_block(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info);

/****************************************************************************************************
* FUNCTIONS
***************************************************************************************************/

/*---------------------------------------------------------------------------------------------
* (function: op_show_stmt_wait )
* 	Statement wait is a registered result of internal defined statements.
*-------------------------------------------------------------------------------------------*/
int op_compare_statement_types(int is_blocking_old, int is_blocking_new)
{
	if (is_blocking_old == is_blocking_new)
	{
		return TRUE;
	}
	else
	{
		/* print out a warning to the log file */
		fprintf(log_file, "ERROR: - There is a mismatch of assignment types");
		assert(FALSE);
		
		return FALSE;
	}
}

/*---------------------------------------------------------------------------------------------
* (function: op_show_stmt_wait )
* 	Statement wait is a registered result of internal defined statements.
*-------------------------------------------------------------------------------------------*/
signal_list_t* op_show_stmt_wait(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	ivl_event_t ev = ivl_stmt_events(net, 0);
	int i, j;
	int any_signals_defined = FALSE;
	int sensitivity_signal_count = 0;
	int current_signal_count = 0;
	int clock_index;
	int reset_index;
	cell_information_stmt *return_cell;
	name_instance_pin_t *signals;
	int current_spot;
	int index_start;
	char long_line[4096];
	int idx;
	
	signal_list_t* temp_rc;
	signal_list_t* list;
	node_t *created_node;
	
	/* CODE FUNCTION START */
	pass_info_update(pass_info);
	
	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_wait\n");); 
	
	/* allocate the cell recording information */
	return_cell = ocdu_macro_define_stmt(ocdu_generate_unique_name("STMT_WAIT", pass_info->unique_count));
	
	/* get the number of sensitivity signals */
	sensitivity_signal_count = ivl_event_nany(ev) + ivl_event_npos(ev) + ivl_event_nneg(ev); 
	
	/* allocate the array for the sensitivity signals */
	signals = (name_instance_pin_t*)ou_malloc_struct(sizeof(name_instance_pin_t)*sensitivity_signal_count, HETS_PROCESS);
	
	/* initialize the return list */
	list = onacu_init_list_structure();
	
	D0(tabbed_printf(out, 0, "# Event %s;\n", ivl_event_name(ev)););
	D0(tabbed_printf(out, 0, "# Base %s;\n", ivl_event_basename(ev)););
	
	/* This detects the any signals.  Currently we will consider this to be somewhat of a combinational logic element and 
	 * we will simply either put th outputs into registers that are hooked up with the global clock, or we will create the harware
	 * for an infered latch */
	D0(tabbed_printf(out, 0, "# nany %d;\n", ivl_event_nany(ev));); // number of
	if (ivl_event_nany(ev) > 0)
	{
		/* IF - there are any trigereed signals deal with them as latches */
	
		/* update that any signals are defined */
		any_signals_defined = TRUE;
	
		/* go through each of the signals */
		for (i = 0; i < ivl_event_nany(ev); i++)
		{
			D0(tabbed_printf(out, 0, "#%d any %s;\n", i, (char*)ivl_nexus_name(ivl_event_any(ev, i))););
	
			D0(tabbed_printf(out, 0, "# Nexus Number Pointers %d;\n", ivl_nexus_ptrs(ivl_event_any(ev, i))););
			/* grab the signal for each in the sensitivity list */
			for (j = 0; j < ivl_nexus_ptrs(ivl_event_any(ev, i)); j++)
			{
				if (ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)) != NULL)
				{
					/* IF - this signal exists in the list then check if it matches */
					D0(tabbed_printf(out, 0, "# Nexus Ptr sig %s;\n", (char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)))););
	
					NAME(printf("%s", ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)))););
					NAME(printf("%s", (char*)ivl_nexus_name(ivl_event_any(ev, i))););
					if (ou_do_strings_match(ou_name_without_tailing_pin_info((char*)ivl_nexus_name(ivl_event_any(ev, i))), (char*)ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)))) == TRUE)
					//if (strcmp(ou_name_without_tailing_pin_info((char*)ivl_nexus_name(ivl_event_any(ev, i))), ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)))) == 0)
					{
						/* IF - we find the signal name that corresponds to the event name record this signal */
						/* record the signal name */
						assert(current_signal_count < sensitivity_signal_count);
						signals[current_signal_count].signal = ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j));
						signals[current_signal_count].name = strdup((char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j))));
						signals[current_signal_count].pin = ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)), 0), 0));
						signals[current_signal_count].instance = NULL;
	
						sprintf(long_line, "%s_%d", signals[current_signal_count].name, 0); 
	
						/* check if the signal is already added to the statement shell */
						idx = sc_add_string(shell_signals, long_line);
	
						/* add this output signal to the cells current list */
						if (shell_signals->data[idx] == NULL)
						{
							/* IF - this signal does not exist yet.  It shouldn't, but we add it to the cache anyway */
							signals[current_signal_count].mixed_signal = onacu_init_mixed_signal_t_from_cell_port(
									oEgu_add_a_cell_port_defined_by_a_signal (ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_any(ev, i), j)), signals[current_signal_count].pin, IN_PORT));
							shell_signals->data[idx] = signals[current_signal_count].mixed_signal;
						}
						else
						{
							signals[current_signal_count].mixed_signal = (mixed_signal_t*)shell_signals->data[idx];
						}
	
#if 0
						if (onacu_lookup_port_in_signal_list(list->input_signal_list, list->input_signal_list_size, signals[current_signal_count].mixed_signal) == TRUE)
						{
							/* IF - this signal is used in the hardware...good */
							NULL;
							//onacu_append_port_to_input_signal_list(list, signals[current_signal_count].mixed_signal);
							/* OTHERWISE - this signal is not used by expressions, then it is unconnected and currently, we treat these signals as
							 * nothing */
						}
#endif
	
						current_signal_count++;
	
						/* break from this loop so we can find the next event */
						break;
					}
				}
			}
		}
	}
	
	/* The positive and negative edge detection is for clock and asynhronous resets. */
	D0(tabbed_printf(out, 0, "# nneg %d;\n", ivl_event_nneg(ev));); // number of
	if ((ivl_event_nneg(ev) > 0) || (ivl_event_npos(ev)))
	{
		/* IF there are edge trigerred signals deal with them. */
		if(any_signals_defined)
		{
			/* IF - any signals has already been defined */
			fprintf(log_file, "WARNING: signals with any AND (posedge or negedge) signals not supported");
			assert(FALSE);
		}
			
		if (ivl_event_nneg(ev) > 0)
		{
			for (i = 0; i < ivl_event_nneg(ev); i++)
			{
				D0(tabbed_printf(out, 0, "#%d neg %d;\n", i, ivl_nexus_name(ivl_event_neg(ev, i))););
				D0(tabbed_printf(out, 0, "# Nexus Number Pointers %d;\n", ivl_nexus_ptrs(ivl_event_neg(ev, i))););
	
				for (j = 0; j < ivl_nexus_ptrs(ivl_event_neg(ev, i)); j++)
				{
					D0(tabbed_printf(out, 0, "# Nexus Ptr sig %d;\n", ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j))););
	
					NAME(printf("%s", ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j)))););
					NAME(printf("%s", (char*)ivl_nexus_name(ivl_event_neg(ev, i))););
					if (ou_do_strings_match((char*)ivl_nexus_name(ivl_event_neg(ev, i)), (char*)ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j)))) == TRUE)
					//if (strcmp(ivl_nexus_name(ivl_event_neg(ev, i)), ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j)))) == 0)
					{
						/* IF - we find the signal name that corresponds to the event name record this signal */
						/* record the signal name */
						assert(current_signal_count < sensitivity_signal_count);
						signals[current_signal_count].signal = ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j));
						signals[current_signal_count].name = strdup((char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j))));
						signals[current_signal_count].pin = ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j)), 0), 0));
						signals[current_signal_count].instance = NULL;
	
						sprintf(long_line, "%s_%d", signals[current_signal_count].name, 0); 
	
						/* check if the signal is already added to the statement shell */
						idx = sc_add_string(shell_signals, long_line);
	
						/* add this output signal to the cells current list */
						if (shell_signals->data[idx] == NULL)
						{
							/* IF - this signal does not exist yet.  It shouldn't, but we add it to the cache anyway */
							signals[current_signal_count].mixed_signal = onacu_init_mixed_signal_t_from_cell_port(
									oEgu_add_a_cell_port_defined_by_a_signal (ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_neg(ev, i), j)), signals[current_signal_count].pin, IN_PORT));
							shell_signals->data[idx] = signals[current_signal_count].mixed_signal;
						}
						else
						{
							signals[current_signal_count].mixed_signal = (mixed_signal_t*)shell_signals->data[idx];
						}
	
						/* to stop  signals other than reset and clock */						
						if ((ou_guess_which_signal_is_close_to(signals, current_signal_count+1, "clk") == current_signal_count)
#ifdef ALLOW_RESET
							|| (ou_guess_which_signal_is_close_to(signals, current_signal_count+1, "rst") == current_signal_count))
#else
							)
#endif
							
						{
							onacu_append_port_to_input_signal_list(list, signals[current_signal_count].mixed_signal);
						}
	
						current_signal_count++;
	
						/* break from this loop so we can find the next event */
						break;
					}
				}
			}
		}
	
		D0(tabbed_printf(out, 0, "# npos %d;\n", ivl_event_npos(ev));); // number of
		if (ivl_event_npos(ev) > 0)
		{
			for (i = 0; i < ivl_event_npos(ev); i++)
			{
				D0(tabbed_printf(out, 0, "#%d pos %d;\n", i, ivl_nexus_name(ivl_event_pos(ev, i))););
				D0(tabbed_printf(out, 0, "# Nexus Number Pointers %d;\n", ivl_nexus_ptrs(ivl_event_pos(ev, i))););
		
				for (j = 0; j < ivl_nexus_ptrs(ivl_event_pos(ev, i)); j++)
				{
					D0(tabbed_printf(out, 0, "# Nexus Ptr sig %d;\n", ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j))););
	
					NAME(printf("%s", ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j)))););
					NAME(printf("%s", (char*)ivl_nexus_name(ivl_event_pos(ev, i))););
					if (ou_do_strings_match((char*)ivl_nexus_name(ivl_event_pos(ev, i)), (char*)ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j)))) == TRUE)
					//if (strcmp(ivl_nexus_name(ivl_event_pos(ev, i)), ivl_signal_basename(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j)))) == 0)
					{
						/* IF - we find the signal name that corresponds to the event name record this signal */
						/* record the signal name */
						assert(current_signal_count < sensitivity_signal_count);
						signals[current_signal_count].signal = ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j));
						signals[current_signal_count].name = strdup((char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j))));
						signals[current_signal_count].pin = ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_signal_pin(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j)), 0), 0));
						signals[current_signal_count].instance = NULL;
	
						sprintf(long_line, "%s_%d", signals[current_signal_count].name, 0); 
	
						/* check if the signal is already added to the statement shell */
						idx = sc_add_string(shell_signals, long_line);
	
						/* add this output signal to the cells current list */
						if (shell_signals->data[idx] == NULL)
						{
							/* IF - this signal doesn't exist yet */
							signals[current_signal_count].mixed_signal = onacu_init_mixed_signal_t_from_cell_port(
									oEgu_add_a_cell_port_defined_by_a_signal (ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_event_pos(ev, i), j)), signals[current_signal_count].pin, IN_PORT));
							shell_signals->data[idx] = signals[current_signal_count].mixed_signal;
						}
						else
						{
							signals[current_signal_count].mixed_signal = (mixed_signal_t*)shell_signals->data[idx];
						}
	
	
	
						/* to stop  signals other than reset and clock */						
						if ((ou_guess_which_signal_is_close_to(signals, current_signal_count+1, "clk") == current_signal_count) 
#ifdef ALLOW_RESET
							|| (ou_guess_which_signal_is_close_to(signals, current_signal_count+1, "rst") == current_signal_count))
#else
							)
#endif
						
						{
							onacu_append_port_to_input_signal_list(list, signals[current_signal_count].mixed_signal);
						}
	
						current_signal_count++;
	
						/* break from this loop so we can find the next event */
						break;
					}
				}
			}
		}
	}
	
	/* check if there is also a reset signal */
#ifdef ALLOW_RESET
	reset_index = ou_guess_which_signal_is_close_to(signals, sensitivity_signal_count, "reset");
#else
	reset_index = -1;
#endif
	
	if (optimization_on_off[OPT_REGISTER_RESET] == TRUE)
	{
		current_reset_index = reset_index;
	}
	else
	{
		current_reset_index = -1;
	}

	current_level = 0;
	if (reset_index != -1)
	{
		current_reset_signal_name = strdup(signals[reset_index].name);
	}
	else
	{
		current_reset_signal_name = NULL;
	}
	
	/* initialize a list that stores each of the memories that are written in this always block */
	local_write_memories = NULL;
	num_local_write_memories = 0;
	
	/* setup the if sturcture globals if it's going to be used.  Assumes only one memory */
	last_conditions = NULL;
	num_last_conditions = 0;
	
	/* do the hardware for the internal hardware structure */
	temp_rc = op_define_statement(ivl_stmt_sub_stmt(net), sscope, pass_info);
	
	/* with this structure, join the inputs to this cell */
	onacu_join_inputs_to_input_list(list, temp_rc);
	
	/* now that we know all of the sensitivity list we need to create the hardware that uses this list.
	 * In the case of combinational we will hookup the ooutputs directly and not infer any latches. 
	 * The second case is for flip flops where there is a clock.  This is simple, however, most clocks are accompanied with 
	 * a reset signal which is not supported in a VPR fpga.  So spit out warning and later need compile flag. */  
	if (any_signals_defined)
	{
		/* IF - this is a combinational situation */
		if(temp_rc->is_blocking == FALSE)
		{
			/* Non-Blocking statments are combinational challenging */	
			fprintf(log_file, "WARNING: Non-blocking statements in combinational always block\n");
			assert(FALSE);
		}
	
		/* shouldn't be any asynchronous memories */
		assert(local_write_memories == NULL);
	
		/* copy outputs through and just need to hook these up...I guess I'm assuming that there is no feedback loops in this
		 * combinational network. */
		onacu_join_outputs_to_output_list(list, temp_rc);
	
		for (i = 0; i < temp_rc->output_signal_list_size; i++)
		{
			int temp;
	
			if ((temp = onacu_lookup_for_cell_port_match_in_signal_list(list->input_signal_list, list->input_signal_list_size, list->output_signal_list[i])) != -1)
			{
				/* IF - this is an instance in which the output and the input are needed to be joined */
	
				/* need to do the hookup, and mark or pull out the input */
				onacu_join_mixed_signals(list->input_signal_list[temp], list->output_signal_list[i]);
	
				/* now remove the input aspect of item...mark as done */
				list->input_signal_list[temp]->has_connection = TRUE;	
			}
		}
	}
	else
	{
		/* ELSE - this is a clock/reset situation */
	
		/* figure out which signal is a clock signal */
		clock_index = ou_guess_which_signal_is_close_to(signals, sensitivity_signal_count, "clk");

		if(sensitivity_signal_count > 2)
		{
			/* IF - If there are more than 2 pos/neg edge signals then this is weird code */
			fprintf(log_file, "WARNING: more than 2 pos/neg sensitivity signals in always list\n");
			assert(FALSE);
		}
	
		if(temp_rc->is_blocking == TRUE)
		{
			/* Blocking statments are sequentially challenging */	
			fprintf(log_file, "WARNING: Blocking statements in sequential always block\n");
			assert(FALSE);
		}
	
		/* hookup the register signals */
		if (temp_rc->output_signal_list_size > 0)
		{
			/* IF - there is something that needs to be registered */
			if(clock_index == -1)
			{
				/* IF - we can't find something resembling a clock signal */
				fprintf(log_file, "WARNING: appears to be no clock\n");
				assert(FALSE);
			}
#ifdef ALLOW_RESET
			else if (reset_index == -1)
#else
			else if (clock_index != -1)
#endif
			{
				/* ELSE IF - there is no reset index but a clock index then process */
				
				/* build register node and attach all these outputs */
				created_node = onacu_create_3inport_1outport_macro_node ("REGISTER", 
																	1,
																	0,
																	temp_rc->output_signal_list_size,
																	temp_rc->output_signal_list_size, 
																	MN_REGISTER);
				index_start = 1;
			}
			else
			{
				/* ELSE - We have both signals */
				/* build register node and attach all these outputs */
				created_node = onacu_create_3inport_1outport_macro_node ("REGISTER", 
																	1,
																	1, /* eventually 1 with reset */
																	temp_rc->output_signal_list_size, 
																	temp_rc->output_signal_list_size, 
																	MN_REGISTER_RESET);
				/* join the reset signal as an input signal */
				signals[reset_index].mixed_signal->t.cell_port.node_output = onacu_add_node_and_pin_to_output_pin(signals[reset_index].mixed_signal->t.cell_port.node_output, created_node, 1);
				index_start = 2;
		
				/* record which inputs need a reset */
				onacu_record_reset_ports(temp_rc, created_node, index_start);
			}

			/* add the register to the list of flip-flops/registers */
			onu_add_a_register_node_to_ff_list(created_node);
		
			/* initialize the output list for the register */
			onacu_join_outputs_to_output_list(list, temp_rc);
		
			/* hookup any outputs from the registers to any inputs that would like them, and take those elements out of the input list since they
			 * don't need to be passed back to the level above statements */
		
			/* hookup all the inports to the register */
			onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																				index_start,
																				temp_rc, 
																				0, temp_rc->output_signal_list_size);
		
			/* hookup the clock to port 0 */
			signals[clock_index].mixed_signal->t.cell_port.node_output = onacu_add_node_and_pin_to_output_pin(signals[clock_index].mixed_signal->t.cell_port.node_output, created_node, 0);
		}
		
		/* hookup the clock to any memories */
		for (i = 0; i < num_local_write_memories; i++)
		{
			signals[clock_index].mixed_signal->t.cell_port.node_output = onacu_add_node_and_pin_to_output_pin(signals[clock_index].mixed_signal->t.cell_port.node_output, local_write_memories[i], 0);
		}

		/* once all these memories have been clocked, free the list of recorded memories */
		if (local_write_memories != NULL)
		{
			ou_free(local_write_memories);
		}
	
		current_spot = 0;
		for (i = 0; i < list->output_signal_list_size; i++)
		{
			/* We know that all statements in here are from within a block or assign statement which means they are in the form
			 * of node_input_output.  Now we just have to change the node_input that these are related to */
			assert(list->output_signal_list[current_spot]->type == NODE_INPUT_OUTPUT);
			/* free the old node_input since we have joined this signal, and it isn't used anymore */
			if ((onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, zero_signal->t.node_input.node_input) == FALSE) &&
			(onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, one_signal->t.node_input.node_input) == FALSE))
			{
				ou_free(list->output_signal_list[current_spot]->t.node_input_output.node_input);
			}
			/* create a new node_input that will hookup with the register statement */
			list->output_signal_list[current_spot]->t.node_input_output.node_input = onacu_create_an_input_pin(created_node, i, 0);
	
			current_spot++;
		}
	
		for (i = 0; i < temp_rc->output_signal_list_size; i++)
		{
			int temp;
	
			if ((temp = onacu_lookup_for_cell_port_match_in_signal_list(list->input_signal_list, 
																		list->input_signal_list_size, 
																		list->output_signal_list[i])) != -1)
			{
				/* IF - this is an instance in which the output and the input are needed to be joined */
	
				/* need to do the hookup, and mark or pull out the input */
				onacu_join_mixed_signals(list->input_signal_list[temp], list->output_signal_list[i]);
	
				/* now remove the input aspect of item...mark as done */
				list->input_signal_list[temp]->has_connection = TRUE;	
			}
		}
	}
	
	/* ou_free local structures */
	ou_free(signals);
	
	/* ou_free the information about the cell */
	onacu_clean_list_structure(temp_rc);
	
	D0(tabbed_printf(out, 0, "# END op_define_stmt_wait\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return list;
}

/*---------------------------------------------------------------------------------------------
* (funtction: op_define_stmt_block )
*	Goes through and calls define_statement on all the internal statments in a block.
*-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_block(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	unsigned i;
	unsigned count = ivl_stmt_block_count(net);
	signal_list_t**res;
	int first_statement_passed = FALSE;
	short still_all_memory = TRUE;
	
	signal_list_t* list;
	
	/* CODE FUNCTION START */
	pass_info_update(pass_info);
	
	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_block\n");); 
	
	/* allocate storgae for each of the internal statements */
	res = (signal_list_t**)ou_malloc_struct(sizeof(signal_list_t*)*count, HETS_PROCESS);
	
	/* initialize the list structure */
	list = onacu_init_list_structure();
	
	/* go through all the statemnts internally defined within a block */
	for (i = 0;  i < count;  i += 1) 
	{
		/* go internally and build the internal structures */
		res[i] = op_define_statement(ivl_stmt_block_stmt(net, i), sscope, pass_info);
	
		/* record all the input signals form the right side of the expression so we can pass up to higher cells in the hierarchy */
		onacu_join_inputs_to_input_list(list, res[i]);
	
		/* join the outputs to this structure */
		onacu_join_outputs_to_output_list(list, res[i]);
	
		if (first_statement_passed == FALSE)
		{
			/* IF - on the first pass record the statement type */
			assert(res[i]->is_blocking != -1);
			list->is_blocking = res[i]->is_blocking;
	
			first_statement_passed = TRUE;
		}
		else
		{
			assert(res[i]->is_blocking != -1);
			op_compare_statement_types(res[i]->is_blocking, list->is_blocking);
		}
	
		if ((res[i]->is_memory == TRUE) && (still_all_memory == TRUE))
		{
			/* IF - we have all memories then propogate this info */
			/* copy this is a memory if all the statements are memories */
			list->is_memory = TRUE;
		}
		else
		{
			list->is_memory = FALSE;
			still_all_memory = FALSE;
		}

		/* clean up the returned lv and rv structure */
		onacu_clean_list_structure(res[i]);
	}
	
	/* ou_free the dynamic structure holding aray */
	ou_free(res);	
	
	D0(tabbed_printf(out, 0, "# END op_define_stmt_block\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return list;
}

/*---------------------------------------------------------------------------------------------
* (funtction: op_define_stmt_assign )
*	Statement assign is for assignments.  These are blocking in that they should be done
*	sequentially from the top statement onwards.
*-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_assign(ivl_statement_t net, inflowmation *pass_info)
{
	ivl_lval_t lval;
	ivl_expr_t rval = ivl_stmt_rval(net);
	ivl_memory_t mem;
	unsigned bit_limit;
	int final_width_size = 0;
	unsigned i;
	
	signal_list_t* list;
	signal_list_t* res;
	int output_list_index = 0;
	
	/* CODE FUNCTION START */
	pass_info_update(pass_info);
	
	D4(tabbed_spaces(TAB););
	D0(tabbed_printf(out, 0, "# op_define_stmt_assign\n"););
	
	/* initialize the list structure */
	list = onacu_init_list_structure();
	
	/* record that this is a blocking statement */
	list->is_blocking = TRUE;
	
	/* deal with the right value of a constant */
	if (ivl_expr_type(rval) == IVL_EX_NUMBER)
	{
		/* IF - the right value of the assignment statement is a constant number */
		const char *bits = ivl_expr_bits(rval);
		unsigned width = ivl_expr_width(rval);
	
		bit_limit = width;
		
		D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- CONSTANT\n"););
	
		/* go through each of the left hand values */
		for (i = 0; i < ivl_stmt_lvals(net); i += 1)
		{
			unsigned j;
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n"););
				assert(0);
			}
			else if (mem)
			{
				/* Assume that we will never write a constant to memory */
				assert(0);
			}
			else
			{
				/* ELSE - this is straight pin assignment */
				/* if the width of the rval is greater than the left value then we only need to go to the left side.  
				 * Other wise need to pad */
				if (bit_limit > ivl_lval_pins(lval))
				{
					bit_limit = ivl_lval_pins(lval);
				}
	
				/* calculate hte new width of this cell */
				final_width_size += ivl_lval_pins(lval);
	
				/* now add outputs to the list */
				onacu_reinit_list_outputs(list, final_width_size);
	
				/* go through each of the pins of the left value */
				for (j = 0; j < ivl_lval_pins(lval); j ++)
				{
					/* straight constant setting based on width we might need to pad */
					if ((output_list_index >= bit_limit) || (bitchar_to_idx(bits[j]) == 0))
					{
						/* create a mixed signal that describes a cell port, and the input pin it comes from */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															zero_signal->t.node_input.node_input);	
						output_list_index++;
					}
					else if (bitchar_to_idx(bits[j]) == 1)
					{
						/* create a mixed signal that describes a cell port, and the input pin it comes from the one signal */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															one_signal->t.node_input.node_input);	
						output_list_index++;
					}
					else
					{
						D0(tabbed_printf(out, 0, "# op_define_stmt_assign- problem situation\n");); 
						assert(0);
					}
				}
			}
		}
	}
	else
	{
		/* ELSE - the right side of the assignement is a signal */
		unsigned width;
		int max_assignment_width = 0;
	
		/* ELSE now deal with the average case with the right side being whatever */
		D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- general left assigned to right\n");); 
	
		/* find the size of the assignment to pass it to the expression creation */
		for (i = 0 ;  i < ivl_stmt_lvals(net) ;  i += 1) 
		{
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n");); 
				assert(0);
			}
			else if (mem) 
			{
				assert(0);
			}
			else
			{
	//				max_assignment_width = max_assignment_width < ivl_lval_pins(lval) ? ivl_lval_pins(lval) : max_assignment_width;
				max_assignment_width += ivl_lval_pins(lval);
			}
		}
	
		/* get the right side with a specified size */
		res = oee_eval_expr_wid(rval, max_assignment_width, pass_info);
	
		bit_limit = width = res->output_signal_list_size;
	
		/* record all the input signals form the right side of the expression so we can pass up to higher cells in the hierarchy */
		onacu_join_inputs_to_input_list(list, res);
	
		/* for each element in the left assignment */
		for (i = 0 ;  i < ivl_stmt_lvals(net) ;  i += 1) 
		{
			unsigned j;
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n");); 
				assert(0);
			}
			else if (mem) 
			{
				assert(FALSE);
			}
			else
			{
				/* ELSE - straight signal assignment */
	
				/* calculate the new width of this cell */
				final_width_size += ivl_lval_pins(lval);
	
				/* now add outputs to the list */
				onacu_reinit_list_outputs(list, final_width_size);
	
				for (j = 0; j < ivl_lval_pins(lval); j ++)
				{
					if (output_list_index >= bit_limit)
					{
						/* IF - overflow then pad with 0 */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															zero_signal->t.node_input.node_input);	
	
						output_list_index++;
					}
					else
					{
						/* ELSE need to set this bit to the expr output pin and the left side pin */
						if(res->output_signal_list[j]->type == NODE_INPUT)
						{
							list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
																oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																						ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																						OUT_PORT),
																res->output_signal_list[output_list_index]->t.node_input.node_input);	
						}
						else if (res->output_signal_list[j]->type == CELL_PORT)
						{
							/* ELSE IF - this is a direct signal, we use a buffer node to hook up the two */
							node_t *buf_node;
	
							buf_node = onacu_create_1inport_1outport_macro_node("B", 1, 1, MN_BUF);
	
							/* join the inputs */
							onacu_connect_output_port_from_list_toinput_port_of_node(buf_node, 0, res->output_signal_list[output_list_index]);
	
							/* add the outputs to the list */
							list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
																oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																						ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																						OUT_PORT),
																onacu_create_an_input_pin(buf_node, 0, 0));
							// GDB - p (char*)ivl_signal_name(ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)))
						}
						else
						{
							assert(FALSE);
						}
						output_list_index++;
					}
				}
			}
		}
	
		/* clean up the returned lv and rv structure */
		onacu_clean_list_structure(res);
	} 
	
	D0(tabbed_printf(out, 0, "# END op_define_stmt_assign\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return list;
}

/*---------------------------------------------------------------------------------------------
* (funtction: op_define_stmt_assign_nb)
* 	Non blocking assign statements mean just assign the value without concern for anybody else.
*-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_assign_nb(ivl_statement_t net, inflowmation *pass_info)
{
	ivl_lval_t lval;
	ivl_expr_t rval = ivl_stmt_rval(net);
	ivl_memory_t mem;
	unsigned bit_limit;
	int final_width_size = 0;
	int i;
	
	signal_list_t* list;
	signal_list_t* res;
	int output_list_index = 0;
	
	/* CODE FUNCTION START */
	pass_info_update(pass_info);
	
	D4(tabbed_spaces(TAB););
	D0(tabbed_printf(out, 0, "# op_define_stmt_assign\n"););
	
	/* initialize the list structure */
	list = onacu_init_list_structure();
	
	/* record that this is a non blocking statement */
	list->is_blocking = FALSE;
	
	/* initialize the output list to 0 */
	onacu_init_list_outputs(list, 0);
	
	/* deal with the right value of a constant */
	if (ivl_expr_type(rval) == IVL_EX_NUMBER)
	{
		/* IF - the right value of the assignment statement is a constant number */
		const char *bits = ivl_expr_bits(rval);
		unsigned width = ivl_expr_width(rval);
	
		bit_limit = width;
		
		D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- CONSTANT\n"););
	
		/* go through each of the left hand values */
		for (i = 0; i < ivl_stmt_lvals(net); i += 1)
		{
			unsigned j;
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n"););
				assert(0);
			}
			else if (mem)
			{
				/* ELSE If - this is a synchronous memory write to a constant */
				assert(FALSE);	
			}
			else
			{
				/* ELSE - this is straight pin assignment */
				/* if the width of the rval is greater than the left value then we only need to go to the left side.  
				 * Other wise need to pad */
				if (bit_limit > ivl_lval_pins(lval))
				{
					bit_limit = ivl_lval_pins(lval);
				}
	
				/* calculate hte new width of this cell */
				final_width_size += ivl_lval_pins(lval);
	
				/* now add outputs to the list */
				onacu_reinit_list_outputs(list, final_width_size);
	
				/* go through each of the pins of the left value */
				for (j = 0; j < ivl_lval_pins(lval); j ++)
				{
					/* straight constant setting based on width we might need to pad */
					if ((output_list_index >= bit_limit) || (bitchar_to_idx(bits[j]) == 0))
					{
						/* create a mixed signal that describes a cell port, and the input pin it comes from */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															zero_signal->t.node_input.node_input);	
	
						output_list_index++;
					}
					else if (bitchar_to_idx(bits[j]) == 1)
					{
						/* create a mixed signal that describes a cell port, and the input pin it comes from the one signal */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															one_signal->t.node_input.node_input);	
	
						output_list_index++;
					}
					else
					{
						D0(tabbed_printf(out, 0, "# op_define_stmt_assign- problem situation\n");); 
						assert(0);
					}
				}
			}
		}
	}
	else
	{
		/* ELSE - the right side of the assignement is a signal */
		unsigned width;
		int max_assignment_width = 0;
	
		/* ELSE now deal with the average case with the right side being whatever */
		D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- general left assigned to right\n");); 
	
		/* find the size of the assignment to pass it to the expression creation */
		for (i = 0 ;  i < ivl_stmt_lvals(net) ;  i += 1) 
		{
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n");); 
				assert(0);
			}
			else if (mem) 
			{
				/* Assume no asynchronous memories */
			//	assert(0);
				max_assignment_width += ivl_lval_pins(lval);
			}
			else
			{
	//				max_assignment_width = max_assignment_width < ivl_lval_pins(lval) ? ivl_lval_pins(lval) : max_assignment_width;
				max_assignment_width += ivl_lval_pins(lval);
			}
		}
	
		/* get the right side with a specified size */
		res = oee_eval_expr_wid(rval, max_assignment_width, pass_info);
	
		bit_limit = width = res->output_signal_list_size;
	
		/* record all the input signals form the right side of the expression so we can pass up to higher cells in the hierarchy */
		onacu_join_inputs_to_input_list(list, res);
	
		/* for each element in the left assignment */
		for (i = 0 ;  i < ivl_stmt_lvals(net) ;  i += 1) 
		{
			unsigned j;
			lval = ivl_stmt_lval(net, i);
			mem = ivl_lval_mem(lval);
	
			if (ivl_lval_mux(lval))
			{
				D0(tabbed_printf(out, 0, "# op_define_stmt_assign_nb- MUX on lval of constant r NOT SUPPORTED\n");); 
				assert(0);
			}
			else if (mem) 
			{
				/* ELSE If - this is a synchronous memory write then we need to hookup the write pins */
				memory_t* memory;
				node_t *memory_node;
				int memory_address_width;
				char memory_name[4096];
				signal_list_t *address_expression;
				int mem_width = ivl_lval_pins(lval);
	
				/* calculate the new width of this celli.  Actually memory doesn't generate any outputs since the read point generates
				 * those signals */
	
				/* find the memory this is, and make it if it currently doesn't exist */
				sprintf(memory_name, "%s_%s", (char*)ivl_memory_basename(mem), (char*)ivl_scope_name(ivl_memory_scope(mem)));
	
				/* check the hash for this memory unit */
				memory = omu_get_memory(memory_name);
	
				/* create a return cell for the memory.  This should create the all the pins.  Need to check if created to check if write has already created it. */
				if (memory == NULL)
				{
					/* IF - this memory has not been defined already, then create it */
					/* see odin_eval.c memory expression for more details */
	
					/* calculate the address pins needed since ICARUS seems to default to 32 bits */
					memory_address_width = ou_find_bit_width_of_address_size(ivl_memory_size(mem)); 
	
					/* build a node for the memory */
					memory_node = onacu_create_memory_node("MEMORY", mem_width,  memory_address_width, mem_width,  MN_MEMORY);
	
					/* create the structure that holds the memory struct */
					memory = omu_create_memory(memory_address_width, memory_node, mem);
					/* record the cell info in a current list, a global list, and a hash */
					omu_add_a_memory_cell(memory, memory_name);
	
					/* update that this is a write node */
					memory->address_write = EXPR_WRITE;
				}
				else
				{
					/* ELSE - a write version of the memory has already been generated */
					assert (memory->address_read == EXPR_READ);
	
					memory_address_width = memory->address_width;
					memory_node = memory->memory_node;
				}
	
				assert( res->output_signal_list_size >= mem_width);
				onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(memory_node, 
																		MEMORY_PIN_OFFSET,  
																		res, 
																		0, res->output_signal_list_size);
	
				/* get the address expression to the write */
				address_expression = oee_eval_expr_wid(ivl_lval_idx(lval), ivl_expr_width(ivl_lval_idx(lval)), pass_info);
				onacu_join_inputs_to_input_list(list, address_expression);
	
				if (memory_address_width > address_expression->output_signal_list_size)
				{
					/* IF - the memory width is bigger than the address supplied, we need to pad */
					for (j = MEMORY_PIN_OFFSET+mem_width+address_expression->output_signal_list_size; 
						 j <  MEMORY_PIN_OFFSET+mem_width+memory_address_width;
						 j++)
					{
						osm_join_gate_nodes(gnd_node, 0, memory_node, j);
					}
	
					/* attach the address to the address lines of the memory.  This is attached at the clk pin + enable pin + the write port */
					onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(memory_node, 
																		MEMORY_PIN_OFFSET+mem_width,  
																		address_expression, 
																		0, address_expression->output_signal_list_size);
				}
				else
				{
					/* ELSE - we use the memory_width value since that's the max size address */
					onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(memory_node, 
																		MEMORY_PIN_OFFSET+mem_width,  
																		address_expression, 
																		0, memory_address_width);
				}
	
				/* now record this local memory, so it can get clocked */
				local_write_memories = (node_t**)ou_realloc(local_write_memories, sizeof(node_t*)*(num_local_write_memories + 1), HETS_PROCESS); 
				local_write_memories[num_local_write_memories] = memory_node;
				num_local_write_memories ++;
	
				/* update that there is a memory in this condition */
				list->is_memory = TRUE;
			}
			else
			{
				/* ELSE - straight signal assignment */
				
				/* calculate the new width of this cell */
				final_width_size += ivl_lval_pins(lval);
	
				/* now add outputs to the list */
				onacu_reinit_list_outputs(list, final_width_size);
	
				for (j = 0; j < ivl_lval_pins(lval); j ++)
				{
					if (output_list_index >= bit_limit)
					{
						/* IF - overflow then pad with 0 */
						list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
															oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																					ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																					OUT_PORT),
															zero_signal->t.node_input.node_input);	
	
						output_list_index++;
					}
					else
					{
						/* ELSE need to set this bit to the expr output pin and the left side pin */
						if(res->output_signal_list[j]->type == NODE_INPUT)
						{
							list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
																oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																						ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																						OUT_PORT),
																res->output_signal_list[output_list_index]->t.node_input.node_input);	
						}
						else if (res->output_signal_list[j]->type == CELL_PORT)
						{
							/* ELSE IF - this is a direct signal, we use a buffer node to hook up the two */
							node_t *buf_node;
	
							buf_node = onacu_create_1inport_1outport_macro_node("B", 1, 1, MN_BUF);
	
							/* join the inputs */
							onacu_connect_output_port_from_list_toinput_port_of_node(buf_node, 0, res->output_signal_list[output_list_index]);
	
							/* add the outputs to the list */
							list->output_signal_list[output_list_index] = onacu_init_mixed_signal_t_from_cell_port_and_node_input(
																oEgu_add_a_cell_port_defined_by_a_signal (  ivl_nexus_ptr_sig(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)), 
																						ivl_nexus_ptr_pin(ivl_nexus_ptr(ivl_lval_pin(lval, j), 0)),
																						OUT_PORT),
																onacu_create_an_input_pin(buf_node, 0, 0));
						}
						else
						{
							assert(FALSE);
						}
						output_list_index++;
					}
				}
			}
		}
	
		/* clean up the returned lv and rv structure */
		onacu_clean_list_structure(res);
	} 
	
	D0(tabbed_printf(out, 0, "# END op_define_stmt_assign\n");); 
	D4(tabbed_spaces(BAT);); 
	
	return list;
}

/*---------------------------------------------------------------------------------------------
* (funtction: op_define_stmt_case)
* This goes through the case stmt and builds a black box definition as well as 
* what connections to look for.
*-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_case(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	ivl_expr_t exp;
	unsigned num_of_cases;
	unsigned default_case, i, j;
	int current_spot;
	int current_port = 0;
	int default_original_spot = -1;
	int default_defined = FALSE;
	int first_statement_passed = FALSE;
	int final_size_of_condition_inputs = 0;
	int index;	
	char long_line[4096];
	cell_ports_t *output;
	mixed_signal_t *temp_signal;
	int idx;
	int current_level_at_start = current_level;
	
	signal_list_t* list;
	signal_list_t* base_condition;
	signal_list_t**condition_statements;
	signal_list_t**conditions;
	node_t *created_node;
	
	int base_cond_size;
	node_t **equal_nodes;
	node_t *red_or_node;
	
	short case_is_constant;
	long int *order;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);
	
	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_case\n");); 
	
	/* initialize the return list */
	list = onacu_init_list_structure();
	
	/* grab the condition expression of the case statement */
	exp = ivl_stmt_cond_expr(net);
	
	/* evaluate the exprssion as hardware */
	base_condition = oee_eval_expr(exp, pass_info); 
	
	/* join the inputs needed for the condition expression */
	onacu_join_inputs_to_input_list(list, base_condition);
	final_size_of_condition_inputs += base_condition->output_signal_list_size;
	
	/* get the count size of the case */
	num_of_cases = ivl_stmt_case_count(net);
	
	/* allocate storage for each of the internal statements */
	condition_statements = (signal_list_t**)ou_malloc_struct(sizeof(signal_list_t*)*num_of_cases, HETS_PROCESS);
	conditions = (signal_list_t**)ou_malloc_struct(sizeof(signal_list_t*)*num_of_cases, HETS_PROCESS);
	
	/* initilialize the default case to the last...may change */
	default_case = num_of_cases;
	
	/* examine each expression by defining the hardware and storing this information */
	for (i = 0 ;  i < num_of_cases ;  i += 1) 
	{
		ivl_expr_t cex = ivl_stmt_case_expr(net, i);
	
		if (cex == 0) 
		{
			/* IF default case get the stmt info too */
			ivl_statement_t cst;
	
			default_defined = TRUE;
			default_case = num_of_cases-1;
			default_original_spot = i;
	
			/* this checks if all the other comparisons have no ones set then do the default */
			cst = ivl_stmt_case_stmt(net, default_case);
	
			/* do the ananalysis on the default case */
			condition_statements[default_case] = op_define_statement(cst, sscope, pass_info);
	
			/* record the inputs that need to be propogated */
			onacu_join_inputs_to_input_list(list, condition_statements[default_case]);
			/* record the outputs that will be coming from the muxes */
			onacu_join_outputs_to_output_list(list, condition_statements[default_case]);
	
			if (first_statement_passed == FALSE)
			{
				/* IF - on the first pass record the statement type */
				assert(condition_statements[default_case]->is_blocking != -1);
				list->is_blocking = condition_statements[default_case]->is_blocking;
	
				first_statement_passed = TRUE;
			}
			else
			{
				/* ELSE - check if this statement type is the same as the original */
				assert(condition_statements[default_case]->is_blocking != -1);
				op_compare_statement_types(list->is_blocking, condition_statements[default_case]->is_blocking);
			}
	
			continue;
		}
		else if ((i == num_of_cases-1)&&(default_defined == TRUE))
		{
			/* ELSE IF - This case is a swap between the defualt so move to where default was */
			ivl_statement_t cst = ivl_stmt_case_stmt(net, i);
	
			/* get the define statement for this case */
			condition_statements[default_original_spot] = op_define_statement(cst, sscope, pass_info);
	
			/* record the inputs that need to be propogated */
			onacu_join_inputs_to_input_list(list, condition_statements[default_original_spot]);
			/* record the outputs that will be coming from the muxes */
			onacu_join_outputs_to_output_list(list, condition_statements[default_original_spot]);
	
			if (first_statement_passed == FALSE)
			{
				/* IF - on the first pass record the statement type */
				assert(condition_statements[default_original_spot]->is_blocking != -1);
				list->is_blocking = condition_statements[default_original_spot]->is_blocking;
	
				first_statement_passed = TRUE;
			}
			else
			{
				/* ELSE - check if this statement type is the same as the original */
				assert(condition_statements[default_original_spot]->is_blocking != -1);
				op_compare_statement_types(list->is_blocking, condition_statements[default_original_spot]->is_blocking);
			}
		}
		else
		{
			/* ELSE all other cases but still need statement HW */
			ivl_statement_t cst = ivl_stmt_case_stmt(net, i);
	
			/* get the define statement for this case */
			condition_statements[i] = op_define_statement(cst, sscope, pass_info);
	
			/* record the inputs that need to be propogated */
			onacu_join_inputs_to_input_list(list, condition_statements[i]);
			/* record the outputs that will be coming from the muxes */
			onacu_join_outputs_to_output_list(list, condition_statements[i]);
	
			if (first_statement_passed == FALSE)
			{
				/* IF - on the first pass record the statement type */
				assert(condition_statements[i]->is_blocking != -1);
				list->is_blocking = condition_statements[i]->is_blocking;
	
				first_statement_passed = TRUE;
			}
			else
			{
				/* ELSE - check if this statement type is the same as the original */
				assert(condition_statements[i]->is_blocking != -1);
				op_compare_statement_types(list->is_blocking, condition_statements[i]->is_blocking);
			}		
		}
	
		/* now need to hook up comparison hardware between the case statement and the condition.  This is 
		 * always an equal comparison since case statments work on base_condition == case.? */
		/* define an EQ cell comparsion */
		if (((i != num_of_cases-1)&&(default_defined == TRUE)) || (default_defined == FALSE))
		{
			/* IF - normal case when this is not the last entry */
	
			/* create the information about each case statement */
			conditions[i] = oee_eval_expr_wid(cex, base_condition->output_signal_list_size, pass_info);
			assert(conditions[i]->output_signal_list_size == base_condition->output_signal_list_size);
	
			/* with this structure, join the inputs to this cell */
			onacu_join_inputs_to_input_list(list, conditions[i]);
			final_size_of_condition_inputs += conditions[i]->output_signal_list_size;
		}
		else
		{
			/* ELSE - special case for the last entry to be copied into the default case spot. 
			 * This makes it easier to run through the outputs */
			/* create the information about each case statement */
			conditions[default_original_spot] = oee_eval_expr_wid(cex, base_condition->output_signal_list_size, pass_info);
			assert(conditions[default_original_spot]->output_signal_list_size == base_condition->output_signal_list_size);
	
			/* with this structure, join the inputs to this cell */
			onacu_join_inputs_to_input_list(list, conditions[default_original_spot]);
			final_size_of_condition_inputs += conditions[default_original_spot]->output_signal_list_size;
		}
	}
	
	switch (ivl_statement_type(net)) {
	case IVL_ST_CASE:
		D0(tabbed_printf(out, 0, "# op_define_stmt_case IVL_ST_CASE\n"););
		break;
	case IVL_ST_CASEX:
		D0(tabbed_printf(out, 0, "# op_define_stmt_case IVL_ST_CASEX\n"););
	case IVL_ST_CASEZ:
		D0(tabbed_printf(out, 0, "# op_define_stmt_case IVL_ST_CASEZ\n"););
	default:
		assert(0);
	}
	
	if (default_defined == FALSE)
	{
		/* ELSE - record that the default is auto done */
		num_of_cases++;
	}

//	if (TRUE)
	if (FALSE)
	{
		/* IF - we are looking for constants and mapping these case structures to multiplexers */
		order = (long int*)ou_malloc(sizeof(long int)*num_of_cases, HETS_PROCESS);
		order[num_of_cases-1] = 0;
		for (i = 0; i < num_of_cases-1; i++)
		{
			order[i] = -1;
		}

		case_is_constant = TRUE;
		/* check if the condition is a constant */
		for (i = 0; i < num_of_cases-1; i++)
		{
			for (j = 0; j < conditions[i]->output_signal_list_size; j++)
			{
				if		((conditions[i]->output_signal_list[j]->type == NODE_INPUT) &&
						((conditions[i]->output_signal_list[j]->t.node_input.node_input->input_node == gnd_node) ||
						((conditions[i]->output_signal_list[j]->t.node_input.node_input->input_node == vcc_node))))
				{
					if (order[i] == -1)
					{
						order[i] = 0;
					}

					/* IF - this is a constant value */
					if (conditions[i]->output_signal_list[j]->t.node_input.node_input->input_node == vcc_node)
					{
						/* IF - it's a one, then we reconstruct the decimal value from the bits */
						order[i] += (long int)pow(2, j);
						/* keep the largest number in the default spot */
						order[num_of_cases-1] = order[num_of_cases-1] > order[i] ? order[num_of_cases-1] : order[i];
					}
				}
				else
				{
					case_is_constant = FALSE;
					break;
				}
			}
		}
	}
	else
	{
		/* ELSE - we are not doing instant mapping of cases to multiplexers */
		case_is_constant = FALSE;
	}

	if (case_is_constant == FALSE)
	{
		/* IF - case is not constant, then we do some comparisons for the conditions and so on */

		/* create the CASE node */
		created_node = onacu_create_case_node("CASE", 
												list->output_signal_list_size,
												num_of_cases + (list->output_signal_list_size * num_of_cases),
												num_of_cases + list->output_signal_list_size /*input_signal*/,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_CASE;
		created_node->n_t.hetero_node.num_port_widths = num_of_cases + list->output_signal_list_size;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_PROCESS);
		created_node->n_t.hetero_node.num_cases = num_of_cases;

		/* Build the condition hardware for each condition */
		equal_nodes = (node_t**)ou_malloc(sizeof(node_t*)*num_of_cases, HETS_SOFT_MAPPING);
	
		/* now we need hookup the default using all the others into a RED_OR and inverse.  Tells if any were on. */
		if (num_of_cases-1 > 1)
		{
			red_or_node = onacu_create_1inport_1outport_macro_node ("OR", num_of_cases-1, 1, MN_RED_OR);
		}
		else if (num_of_cases - 1 == 1) 
		{
			red_or_node = onacu_create_1inport_1outport_macro_node ("INV", 1, 1, MN_NOT);
		}
		else
		{
			assert(FALSE);
		}
	
		base_cond_size = base_condition->output_signal_list_size;
	
		/* generate the condition nodes */
		for (i = 0; i < num_of_cases-1; i++)
		{
			/* create MN_EQ nodes...need to be converted to soft once all signals are connected.  conditions are ports 1+i since base gets first port */
			equal_nodes[i] = onacu_create_2inport_1outport_macro_node ("CMP_EQ", base_cond_size, conditions[i]->output_signal_list_size, 1, MN_EQ);
		
			/* connect the base_condition into the equal statement */
			onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(equal_nodes[i], 
																					0, 
																					base_condition, 
																					0, 
																					base_cond_size);
			/* connect the condition statment into the equal node */
			onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(equal_nodes[i], 
																					base_cond_size, 
																					conditions[i], 
																					0, 
																					conditions[i]->output_signal_list_size);
		
			/* Join each output from the equal_nodes to the giant OR to generate our default signal */ 
			osm_join_gate_nodes(equal_nodes[i], 0, red_or_node, i);
		}
		
		/* create the not that inverses the reduction OR signal for our defualt signal */
		equal_nodes[num_of_cases-1] = osm_create_a_gate("CASE_DEF", not_cell_lib_index, 1, 1, -1, "CASE_DEF");
		osm_join_gate_nodes(red_or_node, 0, equal_nodes[num_of_cases-1], 0);
		
		/* now join the conditions to the spots in the created node */
		for (i = 0; i < num_of_cases; i++)
		{
			osm_join_gate_nodes(equal_nodes[i], 0, created_node, i);
			created_node->n_t.hetero_node.port_widths[i] = 1;
			if (i < num_of_cases-1)
			{
				onacu_clean_list_structure(conditions[i]);
			}
		}
		
		ou_free(equal_nodes);

		/* record where the current spot and port we are at */
		current_spot = num_of_cases;
		current_port = num_of_cases;
	}	
	else
	{
		/* ELSE - this is a CASE with a constant so we will implement as a encoded MUX. */
		/* create the CASE node */
		created_node = onacu_create_case_node("CASE_CONST", 
												list->output_signal_list_size,
												base_condition->output_signal_list_size + (list->output_signal_list_size * num_of_cases),
												1 + list->output_signal_list_size /*input_signal*/,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_CONST_CASE;
		created_node->n_t.hetero_node.num_port_widths = num_of_cases + list->output_signal_list_size;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_PROCESS);
		created_node->n_t.hetero_node.num_cases = num_of_cases;

		created_node->n_t.hetero_node.case_order = order;
		/* record the size of the base_condition or select signal */
		created_node->n_t.hetero_node.width = base_condition->output_signal_list_size;

		/* attach the base condtion to the first spot */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																				0, 
																				base_condition, 
																				0, 
																				created_node->n_t.hetero_node.width);

		/* record where the current spot and port we are at */
		current_spot = created_node->n_t.hetero_node.width;
		current_port = 1;
	}
	
	/* record where the inputs start from */
	created_node->n_t.hetero_node.muxed_input_start_index = current_spot;
	
	/* Now we need to check if for each case we have equivalent signals for each output */
	for (i = 0; i < list->output_signal_list_size; i++)
	{
		for (j = 0; j < num_of_cases; j++)
		{
			if ((default_defined == TRUE) || (j < num_of_cases - 1))
			{
				/* find the index of each input related to this output */
				index =	onacu_find_output_related_to_output(list->output_signal_list[i], condition_statements[j]);
			}
			else
			{
				index = -1;
			}
	
			if (index != -1)
			{
				/* hookup to the node */
				onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																		current_spot, 
																		condition_statements[j]->output_signal_list[index]);
			}
			/* NOV 08 - 2005 changed || to && to solve feedback problem in combinational paths */
			else if ((condition_statements[0]->is_blocking == FALSE) && (current_level_at_start != 1))
			{
				/* ELSE IF - look for a matching signal as long as this always block is sequential statement
				 * is right underneath the always (top of the hierarchy) */
				assert(list->output_signal_list[i]->type == NODE_INPUT_OUTPUT);
				
				/* get the cell port of this output */
				output = list->output_signal_list[i]->t.node_input_output.cell_port;
	
				assert(output->port_type == SIGNAL_NAMED);
				
				NAME(printf("%s",  ivl_signal_name(output->p_t.signal_named.signal)););
				sprintf(long_line, "%s_%d", ivl_signal_name(output->p_t.signal_named.signal), output->pin_id); 
	
				/* find signal */
				idx = sc_add_string(shell_signals, long_line);
			
				/* if we have already defined this type of signal */
				if(shell_signals->data[idx] != NULL)
				{
					/* IF - signal cached */
					temp_signal = (mixed_signal_t*)shell_signals->data[idx];
	
					if (onacu_lookup_port_in_signal_list(list->input_signal_list, list->input_signal_list_size, temp_signal) == FALSE)
					{
						/* IF - this signal is not already in the list */
	
						/* now that we have the original signal, append it */
						onacu_append_port_to_input_signal_list(list, temp_signal);
					}
				}
				else
				{
					/* ELSE - this is the case when assignment in the condition_statement is not done for all
					 * cases.  We assume don't care and resulting send out a zero */
					/* ELSE - add this signal that is needed */
					temp_signal = onacu_init_mixed_signal_t_from_cell_port(list->output_signal_list[i]->t.node_input_output.cell_port);
	
					/* store this signal in the hash, and the global list */
					shell_signals->data[idx] = temp_signal;
					onacu_append_port_to_input_signal_list(list, temp_signal);
				}
	
				/* hookup to the node */
				onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																		current_spot, 
																		temp_signal);
			}
			else
			{
				/* ELSE IF - this is the case when we are in combinationals logic */
				assert(condition_statements[0]->is_blocking == TRUE);
				temp_signal = zero_signal;
				onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																		current_spot, 
																		temp_signal);
			}
	
			current_spot++;
		}
	
		/* now record the size of this input port */
		created_node->n_t.hetero_node.port_widths[current_port] = num_of_cases;
		current_port ++;
	}
	
	if ((condition_statements[0]->is_blocking == TRUE) && (current_level_at_start == 1))
	{
		/* IF - the case is right after the wait statement and the case is combinational
		 * then add this node to the combinational list */
		ofsm_add_fsm_to_list (created_node);
	}

	if (default_defined == TRUE)
	{
		/* now clean up the recorded conditions */
		for (i = 0; i < num_of_cases; i++) 
		{
			/* ou_free the information about the cell */
			onacu_clean_list_structure(condition_statements[i]);
		}
	}
	else
	{
		/* now clean up the recorded conditions */
		for (i = 0; i < num_of_cases-1; i++) 
		{
			/* ou_free the information about the cell */
			onacu_clean_list_structure(condition_statements[i]);
		}
	}

	current_spot = 0;

	/* now we update the outputs so that they point to the newly created node */
	for (i = 0; i < list->output_signal_list_size; i++)
	{
		/* We know that all statements in here are from within a block or assign statement which means they are in the form
		 * of node_input_output.  Now we just have to change the node_input that these are related to */
		assert(list->output_signal_list[current_spot]->type == NODE_INPUT_OUTPUT);
		/* free the old node_input since we have joined this signal, and it isn't used anymore */
		if ((onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, zero_signal->t.node_input.node_input) == FALSE) &&
		(onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, one_signal->t.node_input.node_input) == FALSE))
		{
			ou_free(list->output_signal_list[current_spot]->t.node_input_output.node_input);
		}
		/* create a new node_input that will hookup with the case statement */
		list->output_signal_list[current_spot]->t.node_input_output.node_input = onacu_create_an_input_pin(created_node, i, 0);

		current_spot++;
	}

	onacu_clean_list_structure(base_condition);

	/* ou_free the dynamic structure holding aray */
	ou_free(condition_statements);	
	/* ou_free the output string */
	ou_free(conditions);

	D0(tabbed_printf(out, 0, "# END op_define_stmt_case\n");); 
	D4(tabbed_spaces(BAT);); 

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (funtction: op_define_stmt_condit)
 *  Creates an if statement using similar concepts to the case statment by essentially
 *  building the expression hardware and multiplexing it with all the outputs.
 *-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_condit(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	ivl_expr_t exp = ivl_stmt_cond_expr(net);
	int	num_if_structs = 1;
	int i, j;
	int index;	
	char long_line[4096];
	cell_ports_t *output;
	mixed_signal_t *temp_signal;
	int idx;
	int current_port = 0;
	int current_spot;
	int local_reset_state_from_hee_signal;
	int local_reset_state;

	signal_list_t* list;
	signal_list_t**condition_statements;
	signal_list_t* base_condition;

	node_t *created_node;
	node_t *not_node;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_condit\n");); 

	/* record the state of this if structure */
	local_reset_state = current_level;
	/* reset the state variable to see if this condition has a reset in it */
	current_reset_state_from_hee_signal = 0;
	/* create the expression for the base condition */
	base_condition = oee_eval_expr(exp, pass_info);
	/* record the state value at this time */
	local_reset_state_from_hee_signal = current_reset_state_from_hee_signal;

	if (ivl_stmt_cond_false(net)) 
	{
		/* IF - a flase statement exists then there are two structures */
		num_if_structs = 2;
	}

	/* initialize the return list */
	list = onacu_init_list_structure();

	/* allocate storage for each of the internal statements */
	condition_statements = (signal_list_t**)ou_malloc_struct(sizeof(signal_list_t*)*num_if_structs, HETS_PROCESS);

	assert(base_condition->output_signal_list_size == 1);
	assert(ivl_stmt_cond_true(net));

	/* join the inputs needed for the condition expression */
	onacu_join_inputs_to_input_list(list, base_condition);

	/* assume that a true statement of a condition always exists */
	condition_statements[0] = op_define_statement(ivl_stmt_cond_true(net), sscope, pass_info);

	/* record the statement types */
	assert(condition_statements[0]->is_blocking != -1);
	list->is_blocking = condition_statements[0]->is_blocking;

	/* analyse the statement to check if their is memory enable signals which we need to handle */
	if (condition_statements[0]->is_memory == TRUE)
	{
		/* IF - this is a memory then we need to build the write enable logic */

		/* record the flag for the next level */
		list->is_memory = TRUE;

		/* join the inputs needed for the condition expression */
		onacu_join_inputs_to_input_list(list, condition_statements[0]);

		if (idx_if > 1)
		{
			/* IF - this means there are higher if levels that we still need to get.  Therefore make the output list hold 
			 * the condition value which later will be ANDed together to form one write enable signal */
			last_conditions = (signal_list_t**)ou_realloc(last_conditions, sizeof(signal_list_t*)*num_last_conditions, HETS_PROCESS);
			last_conditions[num_last_conditions] = base_condition;
			num_last_conditions++;
		}
		else
		{
			/* ELSE - join all the output signals into an ANDed version and connect this to the we of the memory */
			node_t *and_node;

			if (num_last_conditions > 0)
			{
				/* create an AND gate that is the size of the ouput list */	
				and_node = onacu_create_1inport_1outport_macro_node ("WRITE_ENABLE", 
																		num_last_conditions+1,
																		1,
																		MN_RED_AND);
				/* Join the base condition for this if case to the AND gate */
				onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(and_node, 
																			0,
																			base_condition, 
																			0, base_condition->output_signal_list_size);
	
				/* join all the conditions */
				for (i = 0; i < num_last_conditions; i++)
				{
					onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(and_node, 
																				i+1,
																				last_conditions[i], 
																				0, last_conditions[i]->output_signal_list_size);
					onacu_clean_list_structure(last_conditions[i]);
				}
	
				/* Finally join the AND gate to the memories */
				for (i = 0; i < num_local_write_memories; i++)
				{
					osm_join_gate_nodes(and_node, 0, local_write_memories[i], 1);
				}
	
				/* clean up the condition structure */
				onacu_clean_list_structure(base_condition);
				if (last_conditions != NULL)
				{
					ou_free(last_conditions);
				}
			}
			else
			{
				/* ELSE - just join the base conditions directly to the enable */
				node_t *buf_node;
				assert(base_condition->output_signal_list_size == 1);

				/* create a buffer node */
				buf_node = onacu_create_1inport_1outport_macro_node("B", 1, 1, MN_BUF);

				/* join the base condition to the buffer node */
				onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(buf_node, 
																			0,
																			base_condition, 
																			0, base_condition->output_signal_list_size);

				/* join hte buffer node to each memories enable port */
				for (i = 0; i < num_local_write_memories; i++)
				{
					osm_join_gate_nodes(buf_node, 0, local_write_memories[i], 1);
				}
			}
		}
	}
	else
	{
		/* ELSE - there are no memories joined to this IF, so let append the input signals as normal, and continue to build the if statement */

		/* join the inputs needed for the condition expression */
		onacu_join_inputs_to_input_list(list, condition_statements[0]);

		/* record the outputs that will be coming from the muxes */
		onacu_join_outputs_to_output_list(list, condition_statements[0]);
	
		if (ivl_stmt_cond_false(net)) 
		{
			condition_statements[1] = op_define_statement(ivl_stmt_cond_false(net), sscope, pass_info);
	
			/* check if the statements have the same blocking type */
			assert(condition_statements[1]->is_blocking != -1);
			op_compare_statement_types(list->is_blocking, condition_statements[1]->is_blocking);
	
			/* join the inputs needed for the condition expression */
			onacu_join_inputs_to_input_list(list, condition_statements[1]);
			/* record the outputs that will be coming from the muxes */
			onacu_join_outputs_to_output_list(list, condition_statements[1]);
		} 
	
		if ((local_reset_state == 1) && (current_reset_index != -1))
		{
			/* IF - this condition is directly below the show_stmt_wait and we have a reset signal, then we need to analyze this if structure
			 * to decide if certain signals can be eliminated.  Whether there is a reset signal is done through a state variable that if 
			 * it has a value > 1 means that it was in the expression.  There could be other stuff attached to it, and this might not
			 * be a proper register reset to 0, but I assume this is not the case and just say if this value is greater than 1 then 
			 * reset is inputted to the True part of the IF statement.  This could be improved...just not by me. */
			if (local_reset_state_from_hee_signal > 1)
			{
				/* IF - the signal out of the condition is the reset signal, then we need to check if the bits are zero */
				for (i = 0; i < condition_statements[0]->output_signal_list_size; i++)
				{
					if ((condition_statements[0]->output_signal_list[i]->type == NODE_INPUT_OUTPUT) &&
						(condition_statements[0]->output_signal_list[i]->t.node_input_output.node_input->input_node == gnd_node))
					{
						/* IF - this is a reset signal, then we need to mark that this is a zero signal */
						list->output_signal_list[i]->register_reset = TRUE;
					}
				}
			}
		}
	
		/* create the CASE node */
		assert(base_condition->output_signal_list_size == 1);
		created_node = onacu_create_case_node("IF", 
												list->output_signal_list_size,
												base_condition->output_signal_list_size + base_condition->output_signal_list_size + (2*list->output_signal_list_size),
												2/*base_cond*/ + list->output_signal_list_size /*input_signal*/,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_IF;
		created_node->n_t.hetero_node.num_port_widths = 2/*base_cond*/ + list->output_signal_list_size /*input_signal*/;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_PROCESS);
		created_node->n_t.hetero_node.num_cases = 2;
	
		/* Join the inputs of the condition hardware */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																			0, 
																			base_condition, 
																			0, 
																			base_condition->output_signal_list_size);
		created_node->n_t.hetero_node.port_widths[0] = base_condition->output_signal_list_size;
	
		/* now join the base condition to an inverse */
		not_node = osm_create_a_gate("IF_NOT", not_cell_lib_index, 1, 1, 0, "IF_NOT");
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(not_node, 
																			0, 
																			base_condition, 
																			0, 
																			base_condition->output_signal_list_size);
		osm_join_gate_nodes(not_node, 0, created_node, base_condition->output_signal_list_size);
		created_node->n_t.hetero_node.port_widths[1] = base_condition->output_signal_list_size;
	
		/* join inputs, skip the base condition comparison */
		current_spot = 2*base_condition->output_signal_list_size;
		current_port = 2;
		created_node->n_t.hetero_node.muxed_input_start_index = current_spot;
	
		/* Now we need to check if for each case we have equivalent signals for each output */
		for (i = 0; i < list->output_signal_list_size; i++)
		{
			for (j = 0; j < 2; j++)
			{
				/* find the index of each input related to this output */
				if (j < num_if_structs)
				{	
					/* IF - condition chooses to do this if there is a false case */
					index =	onacu_find_output_related_to_output(list->output_signal_list[i], condition_statements[j]);
				}
				else
				{
					/* ELSE - when there is no FALSE, then index == -1 so we add the implied signals */
					index = -1;
				}
	
				if ((j != 0) || (list->output_signal_list[i]->register_reset != TRUE))
				{
					/* IF - this register does not have a reset signal then continue */
					if (index != -1)
					{
						/* IF - a related signal exists then append it to the list of inputs */
		
						/* hookup to the node */
						onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																				current_spot, 
																				condition_statements[j]->output_signal_list[index]);
					}
					else if (list->is_blocking == FALSE)
					{
						/* ELSE - this signal is not currently made for this case/condition, therefore, we need to get the original signal and the
						 * we are in a sequential IF */
						assert(list->output_signal_list[i]->type == NODE_INPUT_OUTPUT);
						
						/* get the cell port of this output */
						output = list->output_signal_list[i]->t.node_input_output.cell_port;
		
						assert(output->port_type == SIGNAL_NAMED);
		
						NAME(printf("%s",  ivl_signal_name(output->p_t.signal_named.signal)););
						sprintf(long_line, "%s_%d", ivl_signal_name(output->p_t.signal_named.signal), output->pin_id); 
		
						/* find signal */
						idx = sc_add_string(shell_signals, long_line);
					
						/* if we have already defined this type of signal */
					 	if(shell_signals->data[idx] != NULL)
						{
							/* IF - signal cached */
							temp_signal = (mixed_signal_t*)shell_signals->data[idx];
		
							if (onacu_lookup_port_in_signal_list(list->input_signal_list, list->input_signal_list_size, temp_signal) == FALSE)
							{
								/* IF - this signal is not already in the list */
								
								/* now that we have the original signal, append it */
								onacu_append_port_to_input_signal_list(list, temp_signal);
							}
						}
						else
						{
							/* ELSE - add this signal that is needed */
							temp_signal = onacu_init_mixed_signal_t_from_cell_port(list->output_signal_list[i]->t.node_input_output.cell_port);
		
							/* store this signal in the hash, and the global list */
						 	shell_signals->data[idx] = temp_signal;
							onacu_append_port_to_input_signal_list(list, temp_signal);
							
						}
		
						/* hookup to the node */
						onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																				current_spot, 
																				temp_signal);
					}
					else
					{
						/* ELSE IF - this is the case when we are in combinationals logic */
						assert(condition_statements[0]->is_blocking == TRUE);
						temp_signal = zero_signal;
						onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																				current_spot, 
																				temp_signal);
					}
				}
				else
				{
					/* ELSE - this signal is register reset, and we need to connect it to NULL */
					created_node->input_pins[current_spot]->input_node = null_node;
				}
				current_spot++;
			}
		}
	
		for (i = 0; i < list->output_signal_list_size; i++)
		{
			/* now record the size of this input port */
			created_node->n_t.hetero_node.port_widths[current_port] = 2;
			current_port ++;
		}

		/* now clean up the recorded conditions */
		for (i = 0 ;  i < num_if_structs ;  i += 1) 
		{
			/* ou_free the information about the cell */
			onacu_clean_list_structure(condition_statements[i]);
		}
	
		current_spot = 0;
	
		for (i = 0; i < list->output_signal_list_size; i++)
		{
			/* We know that all statements in here are from wither a block or assign statement which means they are in the form
			 * of node_input_output.  Now we just have to change the node_input that these are related to */
			assert(list->output_signal_list[current_spot]->type == NODE_INPUT_OUTPUT);
			/* free the old node_input since we have joined this signal, and it isn't used anymore */
			if ((onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, zero_signal->t.node_input.node_input) == FALSE) &&
			(onacu_compare_node_input_pins(list->output_signal_list[i]->t.node_input_output.node_input, one_signal->t.node_input.node_input) == FALSE))
			{
				ou_free(list->output_signal_list[current_spot]->t.node_input_output.node_input);
			}
			/* create a new node_input that will hookup with the case statement */
			list->output_signal_list[current_spot]->t.node_input_output.node_input = onacu_create_an_input_pin(created_node, i, 0);
	
			current_spot++;
		}
		onacu_clean_list_structure(base_condition);
	}


	/* ou_free the dynamic structure holding aray */
	ou_free(condition_statements);	

	D0(tabbed_printf(out, 0, "# END op_define_stmt_condit\n");); 
	D4(tabbed_spaces(BAT);); 

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (funtction: op_define_stmt_delay)
 *-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_delay(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	signal_list_t* rc ;
	unsigned long delay = ivl_stmt_delay_val(net);
	ivl_statement_t stmt = ivl_stmt_sub_stmt(net);

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_delay\n");); 

	fprintf(out, "    %%delay %lu;\n", delay);
	rc = op_define_statement(stmt, sscope, pass_info);

	D0(tabbed_printf(out, 0, "# END op_define_stmt_delay\n");); 
	D4(tabbed_spaces(BAT);); 

	return rc;
}

/*---------------------------------------------------------------------------------------------
 * (funtction: op_define_stmt_delayx)
 *-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_stmt_delayx(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	signal_list_t* rc;
//	ivl_expr_t exp = ivl_stmt_delay_expr(net);
	ivl_statement_t stmt = ivl_stmt_sub_stmt(net);

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_stmt_delayx\n");); 

	fprintf(out, "    %%delayx 0;\n");

	rc = op_define_statement(stmt, sscope, pass_info);

	D0(tabbed_printf(out, 0, "# END op_define_stmt_delayx\n");); 
	D4(tabbed_spaces(BAT);); 

	return rc;
}

/*---------------------------------------------------------------------------------------------
 * (funtction: op_define_statement)
 * 	High level function which chooses between the statement types.
 *-------------------------------------------------------------------------------------------*/
signal_list_t* op_define_statement(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	const ivl_statement_type_t code = ivl_statement_type(net);
	signal_list_t* rc;
	int value_of_idx_if = idx_if;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# op_define_statement\n");); 
	
	/* control the reset state variable */
#ifdef ALLOW_RESET
	if (current_level == 0)
#else
	if (FALSE)
#endif
	{
		/* state 1 tells if structures that they are directly below a wait statement */
		current_level = 1;
	}
	else
	{
		current_level++;
	}

	switch (code) {
	  case IVL_ST_ASSIGN:
		rc = op_define_stmt_assign(net, pass_info);
		break;

	  case IVL_ST_ASSIGN_NB:
		rc = op_define_stmt_assign_nb(net, pass_info);
		break;

	  case IVL_ST_BLOCK:
		rc = op_define_stmt_block(net, sscope, pass_info);
		break;

	  case IVL_ST_CASE:
	  case IVL_ST_CASEX:
	  case IVL_ST_CASEZ:
		rc = op_define_stmt_case(net, sscope, pass_info);
		break;

	  case IVL_ST_CONDIT:
		idx_if++;
		rc = op_define_stmt_condit(net, sscope, pass_info);
		idx_if--;
		/* after returning from statement cehck that stack is properly recovered */
		assert(idx_if == value_of_idx_if);
		break;

	  case IVL_ST_DELAY:
		rc = op_define_stmt_delay(net, sscope, pass_info);
		break;

	  case IVL_ST_DELAYX:
		rc = op_define_stmt_delayx(net, sscope, pass_info);
		break;

	  case IVL_ST_WAIT:
		rc = op_show_stmt_wait(net, sscope, pass_info);
		break;

	  case IVL_ST_CASSIGN:
	  case IVL_ST_DEASSIGN:
	  case IVL_ST_DISABLE:
	  case IVL_ST_FORCE:
	  case IVL_ST_FOREVER:
	  case IVL_ST_FORK:
	  case IVL_ST_NOOP:
	  case IVL_ST_RELEASE:
	  case IVL_ST_REPEAT:
	  case IVL_ST_STASK:
	  case IVL_ST_TRIGGER:
	  case IVL_ST_UTASK:
	  case IVL_ST_WHILE:
		fprintf(stderr, "edif.tgt: synthesis of code:%u (ivl_target.h) not supported yet\n", code);
		assert(0);
		break;

	  default:
		fprintf(stderr, "edif.tgt: Unable to draw statement type %u\n", code);
		break;
	}

	D0(tabbed_printf(out, 0, "# END op_define_statement\n");); 
	D4(tabbed_spaces(BAT);); 

	D0(fprintf(out, "-------------------------------------------------------------------------------------------------------------------\n"););
	D0(fprintf(out, "-------------------------------------------------------------------------------------------------------------------\n"););
	D0(oEgu_EDIF_define_cell(rc.this_statement_cell_info->top_cell, out, -12););
	D0(fprintf(out, "-------------------------------------------------------------------------------------------------------------------\n"););
	D0(fprintf(out, "-------------------------------------------------------------------------------------------------------------------\n\n"););

	return rc;
}

/*---------------------------------------------------------------------------------------------
 * op_start_statement_generation
 *-------------------------------------------------------------------------------------------*/
vector_info *op_start_statement_generation(ivl_statement_t net, ivl_scope_t sscope, inflowmation *pass_info)
{
	cell_information_stmt *return_cell;
	signal_list_t* list;
	int i;
	vector_info *shell;
	int final_width_size = 0;

	shell = (vector_info*)ou_malloc(sizeof(vector_info), HETS_PROCESS);

	/* create the hash for the input and output signals */
	shell_signals = sc_new_string_cache();

	/* input signals to the cell */
	zero_signal = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(gnd_node, 0, 0));
	one_signal = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(vcc_node, 0, 0));

	all_signals_in_block = onacu_init_list_structure();

	list = op_define_statement(net, sscope, pass_info);

	/* allocate the cell recording information */
	return_cell = ocdu_macro_define_stmt(ocdu_generate_unique_name("STMT", pass_info->unique_count));

	/* create inputs and outputs that will hook up to the statement information */
	for (i = 0; i < list->input_signal_list_size; i++)
	{	
		if (list->input_signal_list[i]->has_connection == TRUE)
		{
			continue;
		}
		if (list->input_signal_list[i]->type == CELL_PORT)
		{
			/* allocate a port and add it for each signal pin */
			oEgu_add_a_port_to_a_cell(return_cell->top_cell, list->input_signal_list[i]->t.cell_port.cell_port);
		}
		else if (
					((list->input_signal_list[i]->type == NODE_OUTPUT) &&
					((list->input_signal_list[i]->t.node_output.node_output->output_nodes[0] == gnd_node) ||
					((list->input_signal_list[i]->t.node_output.node_output->output_nodes[0] == vcc_node))))
				||
					((list->input_signal_list[i]->type == NODE_INPUT) &&
					((onacu_compare_node_input_pins(list->input_signal_list[i]->t.node_input.node_input, zero_signal->t.node_input.node_input) == TRUE) ||
					(onacu_compare_node_input_pins(list->input_signal_list[i]->t.node_input.node_input, one_signal->t.node_input.node_input) == TRUE)))
				)
		{
			/* ELSE IF - these are the 0 and 1 signals then skip since these are nodes that have already been hooked up to proper outputs */
			continue;	
		}
		else
		{
			assert(FALSE);
		}
	}
	for (i = 0; i < list->output_signal_list_size; i++)
	{	
		if (list->output_signal_list[i]->type == NODE_INPUT_OUTPUT)
		{
			/* allocate a port and add it for each signal pin */
			oEgu_add_a_port_to_a_cell(return_cell->top_cell, list->output_signal_list[i]->t.node_input_output.cell_port);

			/* record that another output port has been added */
			final_width_size ++;
		}
		else
		{
			assert(FALSE);
		}
	}

	/* done with internal hashes */
    sc_free_string_cache(shell_signals);

	/* free the zero and one signal mixed signal */

	/* mark the cell as a statement cell, so we can figure out how to hook up the in/outputs in flatten */
	((generated_cell_t*)(return_cell->top_cell))->is_statement_cell = TRUE;
	((generated_cell_t*)(return_cell->top_cell))->list = list;

	/* record the final details of the statement */
	shell->this_statement_cell_info = return_cell;
	shell->wid = final_width_size;

	return shell;
}
