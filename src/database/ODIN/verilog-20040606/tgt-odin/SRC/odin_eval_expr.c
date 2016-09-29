
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

/* This file performs the traversing and creation of nodes/hardware for the expressions in the HDL.  The main idea is that expressions are
 * trees, and we traverse to the basic elements of the tree (constants and signals), and then proceed to hook these up to nodes.  New nodes
 * on levels higher up the tree (root = highest) are created and hooked up to previous outputs from lower level nodes.  The expression is
 * then finally defined by a graph, and this graph can be hooked up to by using a list of inputs and outputs that will eventually be hooked
 * up to other hardware.  This other hardware is defined by the statement processing and is in the process.c code.
 */
#include "ivl_target.h"
#include  <malloc.h>
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <math.h>

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

#include "odin_eval_expr.h"
#include "odin_cell_define_utils.h"
#include "odin_functions.h"
#include "odin_ds1_graph_utils.h"
#include "odin_memory_utils.h"
#include "odin_hetero_utils.h"
#include "odin_node_and_cell_utils.h"
#include "odin_soft_mapping.h"
#include "odin_collect_stats.h"

/*---------------------------------------------------------------------------------------------
 * (function: oee_number_expr )
 *	Takes a constant number and currently generates a constant by wiring internally to zero and
 *	one cells.	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_number_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *list;
	unsigned width;
	const char*bits;
	int i;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_number_expr\n");); 

	/* get the size and bits of the number */
	bits = ivl_expr_bits(exp);
	width = wid == WIDTH_NOT_IMPORTANT ? ivl_expr_width(exp) : wid;

	/* store the size of the list, and create the list */
	list = onacu_init_list_structure();
	onacu_init_list_structure_with_widths(list, 0, width);

	/* hard connect the bits to a Zero or One bit */
	for (i = 0; i < width; i++) 
	{
		if (i < ivl_expr_width(exp))
		{
			switch (bits[i]) 
			{
			case '0':
				list->output_signal_list[i] = zero_signal;
				break;
			case '1':
				list->output_signal_list[i] = one_signal;
				break;
			case 'x':
				fprintf(stderr, "x value inaprropriate for synthesize constant operation\n");
				assert(0);
				break;
			case 'z':
				fprintf(stderr, "z value inaprropriate for synthesize constant operation\n");
				assert(0);
				break;
			}
		}
		else
		{
			list->output_signal_list[i] = zero_signal;
		}
	}

	D0(tabbed_printf(out, 0, "# END oee_number_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_signal_expr )
 * 	This adds the defined signal into a list that will be used as definition of ouputs.  
 * 	Think of the signal as the base of a tree of units.  This leaf is traversed to first,
 * 	and used to decide how to hookup to the units.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_signal_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	unsigned swid = ivl_expr_width(exp);
	const char *name = ivl_signal_name(ivl_expr_signal(exp));
	signal_list_t *list;
	mixed_signal_t *temp_signal;
	long int i;
	int current_spot;
	int width;

	char long_line[4096];
	int idx;
	int ls_index = ivl_expr_lsi(exp);

	NAME(printf("%s", name););
	
	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_signal_expr\n");); 

	width = wid == WIDTH_NOT_IMPORTANT ? swid : wid;

	D0(tabbed_printf(out, 0, "# oee_signal_expr- Signal:%s\n", name);); 

	list = onacu_init_list_structure();

	/* store the size of the list, and create the list */
	onacu_init_list_structure_with_widths(list, width, width);

	current_spot = 0;

	/* check if signal is a reset signal */
	if ((current_reset_signal_name != NULL) && (ou_do_strings_match((char*)name, current_reset_signal_name) == TRUE))
	{
		/* IF - this is the reset signal then we need to update the state control to indicate that this signal exists */
		current_reset_state_from_hee_signal = 1;
	}

	/* setup all the input ports */
	for (i = ls_index; i < swid+ls_index; i++)
	{
		if ((i < ivl_signal_pins(ivl_expr_signal(exp))) && (i < width+ls_index))
		{
			/* IF - the index is less then the number of input pins, then add a pin */

			sprintf(long_line, "%s_%ld", name, i); 

			/* check if the signal is already added to the statement shell */
			idx = sc_add_string(shell_signals, long_line);
			
			/* if we have already defined this type of signal */
		 	if(shell_signals->data[idx] == NULL)
			{
				/* IF - signal not added, allocate a port and add it for each signal pin */
				temp_signal = onacu_init_mixed_signal_t_from_cell_port(oEgu_add_a_cell_port_defined_by_a_signal(ivl_expr_signal(exp), i, IN_PORT));

				/* store this signal in the hash, and the global list */
		 		shell_signals->data[idx] = temp_signal;
				onacu_append_port_to_input_signal_list(all_signals_in_block, temp_signal);
			}
			else
			{
				/* ELSE - signal already cached */
				temp_signal = (mixed_signal_t*)shell_signals->data[idx];
			}

			/* record the signal index so that we can hook it up at the next level */
			list->input_signal_list[current_spot] = temp_signal;
			list->output_signal_list[current_spot] = temp_signal;

			current_spot ++;
		}
	}

	/* Pad the signal value with zeros. */
	if (swid+ls_index < width+ls_index)
	{
		D0(tabbed_printf(out, 0, "# oee_signal_expr- padding if need be\n");); 
		assert (current_spot == swid);

		/* pad the signal where the is no original signal */
		for (i = swid; i < width; i++)
		{	
			/* record the signal index so that we can hook it up at the next level */
			list->input_signal_list[i] = zero_signal;
			list->output_signal_list[i] = zero_signal;
		}
	}
	
	D0(tabbed_printf(out, 0, "# END oee_signal_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_expr_eq )
 * 	Defines a node structure for comparison
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_eq(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);

	signal_list_t *lv;
	signal_list_t *rv;
	signal_list_t *list;
	node_t *created_node;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr_eq\n");); 

	/* define the HW structures of the other signals */
	lv = oee_eval_expr_wid(le, WIDTH_NOT_IMPORTANT, pass_info);
	rv = oee_eval_expr_wid(re, WIDTH_NOT_IMPORTANT, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, 1);
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_inputs_to_input_list(list, rv);

	/* choose between != and == while === and !== while genrate non-synthesizable remarks */
	switch (ivl_expr_opcode(exp)) {
	  case 'e': /* == */
		/* build a node for == and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("CMP_EQ", lv->output_signal_list_size, rv->output_signal_list_size, 1, MN_EQ);
		break;
	  case 'n': /* != */
		/* build a node for != and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("CMP_NEQ", lv->output_signal_list_size, rv->output_signal_list_size, 1, MN_NEQ);
		break;
	  case 'N': /* !== */
		 fprintf(stderr, "=== not synthesizable\n"); 
		 assert(0);
		break;
	  case 'E': /* === */
		 fprintf(stderr, "=== not synthesizable\n"); 
		 assert(0);
		break;
	  default:
		/* unknown equal operator */
		assert(0);
	}

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		lv, 
																		0, lv->output_signal_list_size);
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		lv->output_signal_list_size, 
																		rv, 
																		0, rv->output_signal_list_size);


	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);
	onacu_clean_list_structure(rv);

	/* set up the return information.  This is a single signal in the output list that stores a node_input_pin_t since it describes the output
	 * pin that connects with this node. */
	list->output_signal_list[0] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(created_node, 0, 0));

	D0(tabbed_printf(out, 0, "# END oee_binary_expr_eq\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

#define AND 0
#define OR 1
/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_expr_land )
 *	Does a logical AND.  This means collapsing a multi input signal into single driver by
 *	an OR tree and then joining both single input left and right operators, and therefore,
 *	there is only one output.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_logical(ivl_expr_t exp, unsigned wid, inflowmation *pass_info, int logic_type)
{
	/* grab the 2 operands */
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);
	
	signal_list_t *lv;
	signal_list_t *rv;
	signal_list_t *list;
	node_t *created_node;

	int cell_idx;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr_land\n");); 

	/* convert the two operands by defining there internal HW organization */
	lv = oee_eval_expr_wid(le, WIDTH_NOT_IMPORTANT, pass_info);
	rv = oee_eval_expr_wid(re, WIDTH_NOT_IMPORTANT, pass_info);
	
	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, 1);
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_inputs_to_input_list(list, rv);

	if (logic_type == AND)
	{
		/* Grab the index of the and cell in the library */
		cell_idx = MN_LOG_AND;

	}
	else if (logic_type == OR)
	{
		cell_idx = MN_LOG_OR;
	}
	
	if (cell_idx < 0)
	{
		assert(0);
	}

	/* build a node for == and hookup the lv and rv values */
	created_node = onacu_create_2inport_1outport_macro_node ("BIN_LOG", lv->output_signal_list_size, rv->output_signal_list_size, 1, cell_idx);

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		lv, 
																		0, lv->output_signal_list_size);
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		lv->output_signal_list_size, 
																		rv, 
																		0, rv->output_signal_list_size);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);
	onacu_clean_list_structure(rv);

	D0(tabbed_printf(out, 0, "# END oee_binary_expr_land\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	/* set up the single output in the list */
	list->output_signal_list[0] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(created_node, 0, 0));

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_expr_le )
 *	creates the HW for a le which is {>, >=, <, <=}.  By using defined logic for > and >= and
 *	ordering the input signals appropriately for < and <=.  The > and >= structures are built
 *	using a GT cell and EQ cells and are created by util functions.	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_le(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);

	signal_list_t *lv;
	signal_list_t *rv;
	signal_list_t *list;
	node_t *created_node;

	int index1, index2;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr_le\n");); 

	lv = oee_eval_expr_wid(le, WIDTH_NOT_IMPORTANT, pass_info);
	rv = oee_eval_expr_wid(re, WIDTH_NOT_IMPORTANT, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, 1);
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_inputs_to_input_list(list, rv);
	
	/* select the operation which needs to be defined using the utilities foe GT and GE and ordering the inputs */
	switch (ivl_expr_opcode(exp)) 
	{
	  case 'G':
		/* build a node and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("GE", lv->output_signal_list_size, rv->output_signal_list_size, 1, MN_GE);

		index1 = 0;
		index2 = lv->output_signal_list_size;
	  	break;

	  case 'L':
		created_node = onacu_create_2inport_1outport_macro_node ("LE", rv->output_signal_list_size, lv->output_signal_list_size, 1, MN_GE);
		
		index1 = rv->output_signal_list_size;
		index2 = 0;
	  	break;

	  case '<':
		created_node = onacu_create_2inport_1outport_macro_node ("LT", rv->output_signal_list_size, lv->output_signal_list_size, 1, MN_GT);

		index1 = rv->output_signal_list_size;
		index2 = 0;
		break;

	  case '>':
		created_node = onacu_create_2inport_1outport_macro_node ("GT", lv->output_signal_list_size, rv->output_signal_list_size, 1, MN_GT);

		index1 = 0;
		index2 = lv->output_signal_list_size;
		break;

	  default:
		assert(0);
	}

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		index1,
																		lv, 
																		0, lv->output_signal_list_size);
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		index2,
																		rv, 
																		0, rv->output_signal_list_size);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);
	onacu_clean_list_structure(rv);

	D0(tabbed_printf(out, 0, "# END oee_binary_expr_le\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	/* set up the single output in the list */
	list->output_signal_list[0] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(created_node, 0, 0));

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_expr_logic )
 *	Create the binary logic expression in HW form.  This currently requires that 2 input 
 *	gates are used to combine the multi width signals to a multi width output.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_logic(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);

	signal_list_t *lv;
	signal_list_t *rv;
	signal_list_t *list;
	node_t *created_node;
	int width_left;
	int width_right;

	int logic_id;
	int width;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr_logic\n");); 

	lv = oee_eval_expr_wid(le, wid, pass_info);
	rv = oee_eval_expr_wid(re, wid, pass_info);

	/* choose the largest width */
	width = wid == WIDTH_NOT_IMPORTANT ? (lv->output_signal_list_size > rv->output_signal_list_size ? lv->output_signal_list_size : rv->output_signal_list_size) : wid;

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, width);
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_inputs_to_input_list(list, rv);

	/* build the proper macro node based on the logic operation */
	switch (ivl_expr_opcode(exp)) 
	{
	  case '&':
    	logic_id = MN_AND;
		break;

	  case '|':
    	logic_id = MN_OR;
		break;

	  case '^':
    	logic_id = MN_XOR;
		break;

	  case 'X': /* exclusive nor (~^) */
    	logic_id = MN_XNOR;
		break;

	  default:
		assert(0);
	}
 
	width_left = width < lv->output_signal_list_size ? width : lv->output_signal_list_size;
	width_right = width < rv->output_signal_list_size ? width : rv->output_signal_list_size;

	created_node = onacu_create_2inport_1outport_macro_node ("LOGIC", width_left, width_right, width, logic_id);

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		lv, 
																		0, width_left);
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		width_left,
																		rv, 
																		0, width_right);
	/* add the outputs to the list */
	onacu_add_multiple_input_ports_to_list(list, created_node, 0, width);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);
	onacu_clean_list_structure(rv);

	D0(tabbed_printf(out, 0, "# END oee_binary_expr_logic\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function:  oee_binary_expr_lrs )
 *	Creates the HW for a left or right shift unit.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_lrs(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);

	signal_list_t *lv;
	signal_list_t *list;
	node_t *created_node;

	long int shift_size = 0;
	int idx;
	unsigned nwid = ivl_expr_width(re);
	const char* bits = ivl_expr_bits(re);
	short shift_index;
	int width;
	int width_left;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_lrs\n");); 

	/* define the left side of the operation */
	lv = oee_eval_expr_wid(le, WIDTH_NOT_IMPORTANT, pass_info);

	/* calculate the width */
	width = (wid == WIDTH_NOT_IMPORTANT) ? ivl_expr_width(exp) : wid;

	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, width);
	onacu_join_inputs_to_input_list(list, lv);

	/* determine the size of the shift.  This is the right side of the operation. */
	switch (ivl_expr_type(re)) 
	{
		case IVL_EX_NUMBER: 
			for (idx = 0; idx < nwid; idx++) 
			{
				switch (bits[idx]) 
				{
				case '0':
					break;
				case '1':
					/* for every 1 add 2^idx to fet a decimal version */
					shift_size += (long int)pow(2, idx);
					break;
				case 'x':
					fprintf(stderr, "x value inaprropriate for shift operation\n");
					break;
				case 'z':
					fprintf(stderr, "z value inaprropriate for shift operation\n");
					break;
				}
			}

			break;

		case IVL_EX_ULONG:
			shift_size = ivl_expr_uvalue(re);
			break;

		default: 
			fprintf(stderr, "Shift operation has an size which I can't determine at compilation this means we have a dynamic shifter.  NOT IMPLEMENTED YET\n");
			assert(0);
			break;
	}

	if (ivl_expr_opcode(exp) == 'l')
	{
		/* IF shift left */
		shift_index = MN_SHIFT_LEFT;
	}
	else
	{
		/* ELSE shift right */
		shift_index = MN_SHIFT_RIGHT;
	}

	width_left = width < lv->output_signal_list_size ? width : lv->output_signal_list_size;

	/* build a node for == and hookup the lv and rv values */
	created_node = onacu_create_shift_macro_node("SHIFT", width_left, width_left, shift_size, shift_index);

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		lv, 
																		0, width_left);
	/* add the outputs to the list */
	onacu_add_multiple_input_ports_to_list(list, created_node, 0, width_left);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);

	D0(tabbed_printf(out, 0, "# END oee_binary_lrs\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_expr_arith)
 *	Creates the hardware for various arithmetic operations.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr_arith(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);

	int width;

	signal_list_t *lv;
	signal_list_t *rv;
	signal_list_t *list;
	node_t *created_node;

	int width_left;
	int width_right;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr_arith\n");); 

	lv = oee_eval_expr_wid(le, wid, pass_info);
	rv = oee_eval_expr_wid(re, wid, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_inputs_to_input_list(list, rv);

	/* choose between the arithmetic operation which needs to be defined in HW */
	switch (ivl_expr_opcode(exp)) {
	  case '+':
		width = wid == WIDTH_NOT_IMPORTANT ? (lv->output_signal_list_size > rv->output_signal_list_size ? lv->output_signal_list_size : rv->output_signal_list_size) : wid;
		onacu_init_list_outputs(list, width);

		width_left = width < lv->output_signal_list_size ? width : lv->output_signal_list_size;
		width_right = width < rv->output_signal_list_size ? width : rv->output_signal_list_size;

		/* build a node for == and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("BINARY_ADD", width_left, width_right, width, MN_ADD);

		break;

	  case '-':
		width = wid == WIDTH_NOT_IMPORTANT ? (lv->output_signal_list_size > rv->output_signal_list_size ? lv->output_signal_list_size : rv->output_signal_list_size) : wid;
		onacu_init_list_outputs(list, width);

		width_left = width < lv->output_signal_list_size ? width : lv->output_signal_list_size;
		width_right = width < rv->output_signal_list_size ? width : rv->output_signal_list_size;

		/* build a node for == and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("BINARY_SUB", width_left, width_right, width, MN_SUB);

		break;

	  case '*':
		/*
		 * This multiply is defined as a heterogeneous device that needs to be identified and dealt with later.  Essentially, we use this
		 * as a shell cell in the hierarchical form, and we'll deal with it in the flattened stage.  We simply mark the cell and the info
		 * about the multiply.
		 */
		width = wid == WIDTH_NOT_IMPORTANT ? lv->output_signal_list_size + rv->output_signal_list_size : (wid <= lv->output_signal_list_size + rv->output_signal_list_size) ? wid : lv->output_signal_list_size + rv->output_signal_list_size;
		onacu_init_list_outputs(list, width);

		width_left = width < lv->output_signal_list_size ? width : lv->output_signal_list_size;
		width_right = width < rv->output_signal_list_size ? width : rv->output_signal_list_size;

		/* record what type of multiplier was encountered */
		ocs_record_multiplier(width_left, width_right, width);

		/* build a node for == and hookup the lv and rv values */
		created_node = onacu_create_2inport_1outport_macro_node ("BINARY_MULT", width_left, width_right, width, MN_MULT);
	 
		break;
	  case '/':
		D0(tabbed_printf(out, 0, "# oee_binary_expr_arith- DIV"););
		fprintf(stderr, "NOT IMPLEMENTED YET\n");
		assert(0);
		break;

	  case '%':
		D0(tabbed_printf(out, 0, "# oee_binary_expr_arith- MOD"););
		fprintf(stderr, "NOT IMPLEMENTED YET\n");
		assert(0);
		break;

	  default:
		fprintf(stderr, "UNIDENTIFIED OPERATOR\n");
		assert(0);
	}

	/* join the left and right sides to the node */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		lv, 
																		0, 
																		width_left);
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		width_left,
																		rv, 
																		0, 
																		width_right);
	/* add the outputs to the list */
	onacu_add_multiple_input_ports_to_list(list, created_node, 0, width);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(lv);
	onacu_clean_list_structure(rv);

	D0(tabbed_printf(out, 0, "# END oee_binary_expr_arith\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_binary_exp)
 *	Binary expressions have 2 operands.  Based on the type we analyse the left and right
 *	sides and join them with the operation HW.	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_binary_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *rv;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_binary_expr\n");); 

	/* determine the binary operation and do conversion */
	switch (ivl_expr_opcode(exp)) {
	  case 'a': /* && (logical and) */
		rv = oee_binary_expr_logical(exp, WIDTH_NOT_IMPORTANT, pass_info, AND);
		break;

	  case 'o': /* || (logical or) */
		rv = oee_binary_expr_logical(exp, WIDTH_NOT_IMPORTANT, pass_info, OR);
		break;

	  case 'E': /* === */
	  case 'e': /* == */
	  case 'N': /* !== */
	  case 'n': /* != */
		rv = oee_binary_expr_eq(exp, WIDTH_NOT_IMPORTANT, pass_info);
		break;

	  case '<':
	  case '>':
	  case 'L': /* <= */
	  case 'G': /* >= */
		rv = oee_binary_expr_le(exp, WIDTH_NOT_IMPORTANT, pass_info);
		break;

	  case '+':
	  case '-':
	  case '*':
	  case '/':
	  case '%':
		rv = oee_binary_expr_arith(exp, wid, pass_info);
		break;

	  case 'l': /* << */
	  case 'r': /* >> */
		rv = oee_binary_expr_lrs(exp, WIDTH_NOT_IMPORTANT, pass_info);
		break;


	  case '&':
	  case '|':
	  case '^':
	  case 'X':
		rv = oee_binary_expr_logic(exp, wid, pass_info);
		break;

	  default:
		fprintf(stderr, "edif-tgt error: unsupported binary (%c)\n",
			ivl_expr_opcode(exp));
		assert(0);
	}

	D0(tabbed_printf(out, 0, "# END oee_binary_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return rv;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_bitsel_expr )
 *	This picks out one line of an input.  This is done by taking the constant supplied and
 *	hooking that line up with the output.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_bitsel_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *res;
	signal_list_t *list;
	ivl_signal_t sig = ivl_expr_signal(exp);
	ivl_expr_t sel = ivl_expr_oper1(exp);
	mixed_signal_t *temp_signal;
	char long_line[4096];

	unsigned nwid = ivl_expr_width(sel);
	const char*bits = ivl_expr_bits(sel);

	long int idx, bit_spot = 0;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_bitsel_expr\n");); 

	/* get the signal we are selecting from */
	res = oee_eval_expr(sel, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, 1);
	onacu_join_inputs_to_input_list(list, res);

	/* Bit select can be done dynamically with the select signal going into a mux of the full signal */
	switch (ivl_expr_type(sel)) 
	{
		case IVL_EX_NUMBER: 
			for (idx = 0; idx < nwid; idx++) 
			{
				switch (bits[idx]) 
				{
				case '0':
					break;
				case '1':
					/* for every 1 add 2^idx to fet a decimal version */
					bit_spot += (long int)pow(2, idx);
					break;
				case 'x':
					fprintf(stderr, "x value inaprropriate for shift operation\n");
					break;
				case 'z':
					fprintf(stderr, "z value inaprropriate for shift operation\n");
					break;
				}
			}

			break;

		case IVL_EX_ULONG:
			bit_spot = ivl_expr_uvalue(sel);
			break;

		default: 
			fprintf(stderr, "It is possible to generate a dynamic select, but for now will assume constant\n");
			assert(0);
			break;
	}
	
	/* set up the return information.  This is a single signal in the output list that stores a node_input_pin_t since it describes the output
	 * pin that connects with this node. */
	NAME(printf("%s", ivl_signal_name(sig)););
	sprintf(long_line, "%s_%ld", ivl_signal_name(sig), bit_spot); 

	/* check if the signal is already added to the statement shell */
	idx = sc_add_string(shell_signals, long_line);
			
	/* if we have already defined this type of signal */
 	if(shell_signals->data[idx] == NULL)
	{
		/* IF - signal not added, allocate a port and add it for each signal pin */
		temp_signal = onacu_init_mixed_signal_t_from_cell_port(oEgu_add_a_cell_port_defined_by_a_signal(ivl_expr_signal(exp), bit_spot, IN_PORT));

		/* store this signal in the hash, and the global list */
 		shell_signals->data[idx] = temp_signal;
		onacu_append_port_to_input_signal_list(all_signals_in_block,  temp_signal);
	}
	else
	{
		/* ELSE - signal already cached */
		temp_signal = (mixed_signal_t*)shell_signals->data[idx];
	}

	/* record the signal index so that we can hook it up at the next level */
	list->output_signal_list[0] = temp_signal;
	onacu_append_port_to_input_signal_list(list, temp_signal);

	/* clean up the storage structure */
	onacu_clean_list_structure(res);
	
	D0(tabbed_printf(out, 0, "# END oee_bitsel_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_concat_expr )
 *	Concatenates signals together into one input by wiring the inputs to the new outputs.	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_concat_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	unsigned off, rep;
	int spot_count = 0;
	int output_spot;
	int i, j;
	int width;

	signal_list_t **avec;
	signal_list_t *list;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_concat_expr\n");); 

	/* get width of the expression if not */
	width = (wid == WIDTH_NOT_IMPORTANT) ? ivl_expr_width(exp) : wid;

	/* allocate the array we need to store all the avec */
	avec = (signal_list_t**)ou_malloc_struct(width*sizeof(signal_list_t*), HETS_EVAL_EXPR);

	/* initialize the output size of the concatenation */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, width);
			
	/* Get the repeat count. This must be a constant that has been
	   evaluated at compile time. The operands will be repeated to
	   form the result.  This means the number of times to repeat the subexpressions */
	rep = ivl_expr_repeat(exp);
	off = 0;

	while (rep > 0) 
	{
		/* Each repeat, evaluate the sub-expressions, from lsb to msb, and copy each into the result vector. The
		 expressions are arranged in the concatenation from MSB to LSB, to go through them backwards.
		 Abort the loop if the result vector gets filled up. */
		unsigned idx = ivl_expr_parms(exp);
		while ((idx > 0) && (off < width)) 
		{
			ivl_expr_t arg = ivl_expr_parm(exp, idx-1);
			unsigned awid = ivl_expr_width(arg);
			unsigned trans = awid;

			avec[spot_count] = oee_eval_expr_wid(arg, awid, pass_info);

			/* append any new signals found in the avec to the return cell */
			onacu_join_inputs_to_input_list(list, avec[spot_count]);

			assert(awid == avec[spot_count]->output_signal_list_size);

			D0(tabbed_printf(out, 0, "# Concat passing phase param off:%u, base:%u;\n", off, trans););

			spot_count ++;

			idx -= 1;
			off += trans;
		}
		rep -= 1;
	}

	/* set up the output port as the last and move backwards */
	output_spot = off - 1;

	/* now instantiate and connect all the previous cells */
	for(i = spot_count-1; i >= 0; i--)
	{
		/* hookup the outputs */
		for (j = avec[i]->output_signal_list_size - 1; j >= 0; j--)
		{
			if (output_spot < width)
			{
				assert(output_spot >= 0);

				list->output_signal_list[output_spot] = avec[i]->output_signal_list[j];
			}

			/* go backwards through outputs since we stored in reverse order */
			output_spot --;
		}

		/* ou_free all the information you just set up */
		onacu_clean_list_structure(avec[i]);
	}

	/* Pad the result with 0, if necessary. */
	if (off < width) 
	{
		D0(tabbed_printf(out, 0, "# %u;\n", width-off););
	}

	D0(tabbed_printf(out, 0, "# END oee_concat_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}



/*---------------------------------------------------------------------------------------------
 * (function: oee_memory_expr )
 *	Some assumptions I've made on memory
 *		- My tool only detects write enable signals that are written to a memory that is
 *		exclusively in an if structure of any hierarchical depth.
 *		- In general I assume the memory usage is very simple.
 *		- I only handle single ported memory.
 *		- The memory is synchronous.
 *		- Assume no ROMs defined in Verilog
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_memory_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *list;
	signal_list_t *address_expression;
	node_t* created_node;
	int memory_address_width;
	char memory_name[4096];
	memory_t* memory;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_memory_expr\n");); 

	/* hxamine the expression for the index pins and hook them up to the address_out spots since this is a read */
	address_expression = oee_eval_expr_wid(ivl_expr_oper1(exp), ivl_expr_width(ivl_expr_oper1(exp)), pass_info);

	/* initialize the list of signals which we will be passing back */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, ivl_expr_width(exp));
	onacu_join_inputs_to_input_list(list, address_expression);

	/* create the name that we will look up in the hash */
	sprintf(memory_name, "%s_%s", (char*)ivl_memory_basename(ivl_expr_memory(exp)), (char*)ivl_scope_name(ivl_memory_scope(ivl_expr_memory(exp))));

	/* check the hash for this memory unit */
	memory = omu_get_memory(memory_name);

	/* create a return cell for the memory.  This should create the all the pins.  Need to check if created to check if write has already created it. */
	if (memory == NULL)
	{
		/* IF - this memory has not been defined already, then create it */
		/* add this memory to the clocking list (this clock should be the same as the write clock, so we'll record this in a list with a read flag checked).  
		 * This is a list that describes which memories need to be clocked.  Assumption is that this is synchronous memory.  FINALLY, this info for current
		 * list is done by add_a_memory_cell, as it records it in a current list.  This list is reset when a new statement is traversed. */

		/* calculate the address pins needed since ICARUS seems to default to 32 bits */
		memory_address_width = ou_find_bit_width_of_address_size(ivl_memory_size(ivl_expr_memory(exp))); 

		/* build a node for the memory */
		created_node = onacu_create_memory_node("MEMORY",  ivl_expr_width(exp), memory_address_width, ivl_expr_width(exp), MN_MEMORY);

		/* create the structure that holds the memory struct */
		memory = omu_create_memory(memory_address_width, created_node, ivl_expr_memory(exp));
		/* record the cell info in a current list, a global list, and a hash */
		omu_add_a_memory_cell(memory, memory_name);
	}
	else
	{
		/* ELSE - a write version of the memory has already been generated */
		assert (memory->address_write == EXPR_WRITE);

		memory_address_width = memory->address_width;
		created_node = memory->memory_node;
	}

	/* check that a read hasn't been already done for this memory since I assume that this doesn't happen */
	if (memory->address_read == EXPR_READ)
	{
		assert(FALSE);
	}
	/* record that that this is a read expression */
	memory->address_read = EXPR_READ;

	/* join the address lines */
	assert(address_expression->output_signal_list_size >= memory_address_width);
	/* note that the address is at the offset (clk, en) + the in port + the in port address */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		MEMORY_PIN_OFFSET+ivl_expr_width(exp)+memory_address_width, 
																		address_expression, 
																		0, memory_address_width);

	/* now add the outputs of the memory to the list */
	onacu_add_multiple_input_ports_to_list(list, created_node, 0, ivl_expr_width(exp));

	D0(tabbed_printf(out, 0, "# END oee_memory_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_select_expr )
 *	Selects a range of a signal based on the operands.......This is what I think, but ivl_target.h
 *	doesn't show anything about this type, and I've never encountered it
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_select_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	ivl_expr_t le = ivl_expr_oper1(exp);
	ivl_expr_t re = ivl_expr_oper2(exp);
	signal_list_t *list;
	signal_list_t *lv;

	assert(re == NULL);

	lv = oee_eval_expr_wid(le, WIDTH_NOT_IMPORTANT, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_join_inputs_to_input_list(list, lv);
	onacu_join_outputs_to_output_list(list, lv);

	onacu_clean_list_structure(lv);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_ternary_expr )
 *	HW definition for a = (exp) ? TRUE : FALSE.  Done by using a multiplexer	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_ternary_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *cond_v, *true_x_v, *false_x_v;

	ivl_expr_t cond = ivl_expr_oper1(exp);
	ivl_expr_t true_ex = ivl_expr_oper2(exp);
	ivl_expr_t false_ex = ivl_expr_oper3(exp);

	int width;
	int i;
	signal_list_t *list;
	int current_port = 0;

	node_t *created_node;
	node_t *not_node;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_ternary_expr\n");); 
	
	/* assign width the larger */
	width = wid == WIDTH_NOT_IMPORTANT ? (true_x_v->output_signal_list_size >= false_x_v->output_signal_list_size) ? true_x_v->output_signal_list_size : false_x_v->output_signal_list_size : wid;

	/* evaluate the expressions into hardware */
	cond_v = oee_eval_expr(cond, pass_info);
	true_x_v = oee_eval_expr_wid(true_ex, width, pass_info);
	false_x_v = oee_eval_expr_wid(false_ex, width, pass_info);

	/* store the size of the list, and create and join the lists */
	list = onacu_init_list_structure();
	onacu_init_list_outputs(list, width);
	onacu_join_inputs_to_input_list(list, cond_v);
	onacu_join_inputs_to_input_list(list, true_x_v);
	onacu_join_inputs_to_input_list(list, false_x_v);

	/* make sure the condition statement is a single bit statement */
	/* convert the or case of large width to a single output */
	if (cond_v->output_signal_list_size > 1)
	{
		assert(FALSE);
	}

	assert(true_x_v->output_signal_list_size >= width);
	assert(false_x_v->output_signal_list_size >= width);

	/* build a node for if structure */
	assert(cond_v->output_signal_list_size == 1);
	created_node = onacu_create_case_node("TERN_IF", 
											width,
											cond_v->output_signal_list_size + cond_v->output_signal_list_size + (2*width),
											2/*base_cond*/ + width /*input_signal*/,
											1);
	created_node->n_t.hetero_node.hetero_node_type = MN_CASE;
	created_node->n_t.hetero_node.num_port_widths = 2/*base_cond*/ + width /*input_signal*/;
	created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_PROCESS);
	created_node->n_t.hetero_node.num_cases = 2;

	assert(cond_v->output_signal_list_size == 1);

	/* Join the inputs of the condition hardware */
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																		0, 
																		cond_v, 
																		0, 
																		cond_v->output_signal_list_size);
	created_node->n_t.hetero_node.port_widths[0] = cond_v->output_signal_list_size;

	/* now join the base condition to an inverse */
	not_node = osm_create_a_gate("IF_NOT", not_cell_lib_index, 1, 1, 0, "expr_NOT");
	onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(not_node, 
																		0, 
																		cond_v, 
																		0, 
																		cond_v->output_signal_list_size);
	osm_join_gate_nodes(not_node, 0, created_node, cond_v->output_signal_list_size);
	created_node->n_t.hetero_node.port_widths[1] = cond_v->output_signal_list_size;

	/* join inputs, skip the base condition comparison */
	current_port = 2;
	created_node->n_t.hetero_node.muxed_input_start_index = 2*cond_v->output_signal_list_size;

	/* now connect each signal one at a time */
	for (i = 0; i < width; i++)
	{
		/* hookup to the node */
		onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																2*i+2*cond_v->output_signal_list_size, 
																true_x_v->output_signal_list[i]);
		onacu_connect_output_port_from_list_toinput_port_of_node(created_node, 
																2*i+1+2*cond_v->output_signal_list_size, 
																false_x_v->output_signal_list[i]);
		/* now record the size of this input port */
		created_node->n_t.hetero_node.port_widths[current_port] = 2;
		current_port ++;
	}

	/* add the outputs to the list */
	onacu_add_multiple_input_ports_to_list(list, created_node, 0, width);

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(true_x_v);
	onacu_clean_list_structure(false_x_v);
	onacu_clean_list_structure(cond_v);

	D0(tabbed_printf(out, 0, "# END oee_ternary_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_ufunc_expr )
 * 	This function means that we have found a defined function in the code, and we need
 * 	to build the cell that defines it.  Each appearence of a function is unikely defined.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_ufunc_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *res;
	assert(FALSE);
	return res;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_unary_expr )
 *	This deals with any operations that have operate in unary form.  Like !, reduction operations
 *	etc. 	
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_unary_expr(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *res;
	ivl_expr_t sub = ivl_expr_oper1(exp);
	short logic_index;

	signal_list_t *list;
	node_t *created_node;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_unary_expr\n");); 

	list = onacu_init_list_structure();

	/* choose between the types of unary operations */
	switch (ivl_expr_opcode(exp)) {
	/* negation */
	  case '~':
		res = oee_eval_expr_wid(sub, wid, pass_info);

		onacu_init_list_outputs(list, res->output_signal_list_size);
		onacu_join_inputs_to_input_list(list, res);

		/* build a node for if structure */
		created_node = onacu_create_1inport_1outport_macro_node ("UNARY_NOT", 
																	res->output_signal_list_size,
																	res->output_signal_list_size,
																	MN_NOT);
	
		/* join the inputs */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																			0, 
																			res, 
																			0, res->output_signal_list_size);
		/* add the outputs to the list */
		onacu_add_multiple_input_ports_to_list(list, created_node, 0, res->output_signal_list_size);

		break;

	/* 2's compliment */
	  case '-':
		res = oee_eval_expr_wid(sub, wid, pass_info);

		onacu_init_list_outputs(list, res->output_signal_list_size);
		onacu_join_inputs_to_input_list(list, res);

		/* build a node for if structure */
		created_node = onacu_create_1inport_1outport_macro_node ("UNARY_MINUS", 
																	res->output_signal_list_size,
																	res->output_signal_list_size,
																	MN_UNARY_SUB);
	
		/* join the inputs */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																			0, 
																			res, 
																			0, res->output_signal_list_size);
		/* add the outputs to the list */
		onacu_add_multiple_input_ports_to_list(list, created_node, 0, res->output_signal_list_size);
		break;

	/* Logical negation */
	  case '!':
		res = oee_eval_expr(sub, pass_info);

		onacu_init_list_outputs(list, 1);
		onacu_join_inputs_to_input_list(list, res);

		/* build a node for if structure */
		created_node = onacu_create_1inport_1outport_macro_node ("LOGICAL_NOT", 
																	res->output_signal_list_size,
																	1,
																	MN_LOG_NOT);
	
		/* join the inputs */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																			0, 
																			res, 
																			0, res->output_signal_list_size);
		/* add the outputs to the list */
		list->output_signal_list[0] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(created_node, 0, 0));
	
		break;

	/* these are all reduction operations */
	  case 'N':// NOR 
	  case 'A':// NAND
	  case 'X':// XNOR
	  case '&':// AND
	  case '|':// OR
	  case '^':// XOR

		if (ivl_expr_opcode(exp) == 'A') 
		{
			logic_index = MN_RED_NAND;
		}
		else if (ivl_expr_opcode(exp) == 'N')
		{
			logic_index = MN_RED_NOR;
		}
		else if (ivl_expr_opcode(exp) == 'X')
		{
			logic_index = MN_RED_XNOR;
		}
		else if (ivl_expr_opcode(exp) == '&') 
		{
			logic_index = MN_RED_AND;
		}
		else if (ivl_expr_opcode(exp) == '|')
		{
			logic_index = MN_RED_OR;
		}
		else if (ivl_expr_opcode(exp) == '^')
		{
			logic_index = MN_RED_XOR;
		}
				
		res = oee_eval_expr(sub, pass_info);

		onacu_init_list_outputs(list, 1);
		onacu_join_inputs_to_input_list(list, res);

		/* build a node for if structure */
		created_node = onacu_create_1inport_1outport_macro_node ("REDUCTION_LOGIC", 
																	res->output_signal_list_size,
																	1,
																	logic_index);
	
		/* join the inputs */
		onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(created_node, 
																			0, 
																			res, 
																			0, res->output_signal_list_size);
		/* add the outputs to the list */
		list->output_signal_list[0] = onacu_init_mixed_signal_t_from_node_input(onacu_create_an_input_pin(created_node, 0, 0));

		break;

	  default:
		fprintf(stderr, "edif error: unhandled unary: %c\n",
			ivl_expr_opcode(exp));
		assert(0);
	}

	/* clean up the returned lv and rv structure */
	onacu_clean_list_structure(res);

	D0(tabbed_printf(out, 0, "# END oee_unary_expr\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return list;
}

/*---------------------------------------------------------------------------------------------
 * (function:  oee_eval_expr_wid )
 *  This is the toplevel aspect of expression to edif representation.  Basically, the 
 *  expression type is determined and analysed by helper functions.  These functions define 
 *  expressions in a tree type fashion such that we post-order traverse until we get
 *  to some sort of primitive.  Then we can build the nodes up by understanding what inputs 
 *  hookup to what and then using these new outputs as the input of the next level up
 *  on the tree.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_eval_expr_wid(ivl_expr_t exp, unsigned wid, inflowmation *pass_info)
{
	signal_list_t *res;

	/* CODE FUNCTION START */
	pass_info_update(pass_info);

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(out, 0, "# oee_eval_expr_wid\n");); 

	D0(tabbed_printf(out, 0, "# oee_eval_expr_wid- width:%d\n", wid);); 

	/* determine the expression type and do the respective hardware conversion */
	switch (ivl_expr_type(exp)) {
	  case IVL_EX_NONE:
		assert(0);
		fprintf(stderr, "Concern about reaching this point...\n");
		assert(0);
		break;

	  case IVL_EX_STRING:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_STRING NOT SUPPORTED\n");); 
		//res = oee_string_expr(exp, wid, pass_info);
		assert(0);
		break;

	  case IVL_EX_BINARY:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid:  IVL_EX_BINARY\n");); 
		res = oee_binary_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_BITSEL:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_BITSEL\n");); 
		res = oee_bitsel_expr(exp, WIDTH_NOT_IMPORTANT, pass_info);
		break;

	  case IVL_EX_SELECT:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid:  IVL_EX_SELECT\n");); 
		res = oee_select_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_CONCAT:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_CONCAT\n");); 
		res = oee_concat_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_NUMBER:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_NUMBER\n");); 
		res = oee_number_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_SIGNAL:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_SIGNAL\n");); 
		res = oee_signal_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_TERNARY:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_TERNARY\n");); 
		res = oee_ternary_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_UNARY:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_UNARY\n");); 
		res = oee_unary_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_MEMORY:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_MEMORY\n");); 
		res = oee_memory_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_SFUNC:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_SFUNCi - NOT SUPPORTED\n");); 
		fprintf(stderr, "# oee_eval_expr_wid: IVL_EX_SFUNCi - NOT SUPPORTED\n");
		assert(0);
		//res = oee_sfunc_expr(exp, wid, pass_info);
		break;

	  case IVL_EX_UFUNC:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: IVL_EX_UFUNC\n");); 
		res = oee_ufunc_expr(exp, wid, pass_info);
		assert(0);
		break;

	  default:
		D0(tabbed_printf(out, 0, "# oee_eval_expr_wid: default\n");); 
		fprintf(stderr, "edif error: unhandled expr type: %u\n",
		ivl_expr_type(exp));
	}

	if (current_reset_state_from_hee_signal == 1)
	{
		/* IF - the state is 1 means that oee_signal has just detected the reset signal */
		current_reset_state_from_hee_signal = 2;
	}
	else if (current_reset_state_from_hee_signal > 1)
	{
		/* This means that we are traversing another node that has reset as an input */
		current_reset_state_from_hee_signal ++;
	}

	D0(tabbed_printf(out, 0, "# END oee_eval_expr_wid\n");); 
	D4(tabbed_spaces(BAT);); 

	/* CODE FUNCTION END */
	pass_info_update(pass_info);

	return res;
}

/*---------------------------------------------------------------------------------------------
 * (function: oee_eval_expr)
 *	Small wrapper that defines expressions.
 *-------------------------------------------------------------------------------------------*/
signal_list_t *oee_eval_expr(ivl_expr_t exp, inflowmation *pass_info)
{
	return oee_eval_expr_wid(exp, ivl_expr_width(exp), pass_info);
}
