
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

/* This file contains the functionality that does logic propogation */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>

#include "debug.h"
#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: ols_determine_propogation_value)
 * 	Piece of code does static logic simulation, or constant propogation.  I could probably
 * 	make this simulation a little better by considering how complex functions might propogate
 * 	constants, but other than simple cases I just assume unknown (X) is propogated.
 *
 * 	The propogation values for some structures is defined in a library function.
 *-------------------------------------------------------------------------------------------*/
short ols_determine_propogation_value(node_t *node)
{
	int i;
	short propogation_value_if_input_is_one = -1;
	short propogation_value_if_input_is_zero = -1;
	short multi_check = TRUE;

	/* determine the gate type and find the 0, 1 propogation values */

	if (node->node_type == LIBRARY_NODE)
	{
		/* IF - this is a library node then we can drop the implementation */
		int library_index = node->n_t.library_node.cell_index;

		/* determine the values that will be propogated if one of the specified input is found */
		propogation_value_if_input_is_one = quartus_lib_imp[library_index].propogate_on_one;
		propogation_value_if_input_is_zero = quartus_lib_imp[library_index].propogate_on_zero;
	}
	else if (node->node_type == LIBRARY_NODE_FF)
	{
		/* IF - this is a library node then we can drop the implementation */
		int library_index = node->n_t.library_node_ff.cell_index;

		/* determine the values that will be propogated if one of the specified input is found */
		propogation_value_if_input_is_one = quartus_lib_imp[library_index].propogate_on_one;
		propogation_value_if_input_is_zero = quartus_lib_imp[library_index].propogate_on_zero;
	}
	else if (node->node_type == MACRO_NODE)
	{
		switch (node->n_t.hetero_node.hetero_node_type) 
		{
			case MN_MEMORY:
				propogation_value_if_input_is_one = X;
				propogation_value_if_input_is_zero = X;
				break;
			
			case MN_BUF:
				propogation_value_if_input_is_one = ONE; 
				propogation_value_if_input_is_zero = ZERO; 

			case MN_MULT:
				/* special case that if either A*B if A=0 or B=0 then 0 propograted */
				for (i = 0; i < node->n_t.hetero_node.width_a; i++)
				{
					if (node->input_pins[i]->input_propogation_value_x_0_1 != ZERO)
					{
						multi_check = FALSE;
						break;
					}
				}
				if (multi_check == FALSE)
				{
					/* IF - A is already all zeros, don't need to chek B */
					for (i = node->n_t.hetero_node.width_a; 
							i < node->n_t.hetero_node.width_a + node->n_t.hetero_node.width_b; 
							i++)
					{
						if (node->input_pins[i]->input_propogation_value_x_0_1 != ZERO)
						{
							multi_check = FALSE;
							break;
						}
					}
				}
	
				if (multi_check == TRUE)
				{
					/* IF - all A or Bs are 0 then result is 0 */
					return ZERO;
				}
				else
				{
					/* ELSE - need to return an X */
					return X;
				}
				break;
			case MN_ADD:	
			case MN_SUB:	
			case MN_COUNTER:	
			case MN_ADD_CARRY_NODE:	
			case MN_UNARY_SUB:
				return X;
			case MN_EQ:
			case MN_NEQ:
			case MN_GE:
			case MN_GT:
				return X;

			case MN_LOG_AND:
			case MN_LOG_OR:
			case MN_LOG_NOT:
			case MN_NOT:
			case MN_AND:
			case MN_OR:
			case MN_XOR:
			case MN_NAND:
			case MN_NOR:
			case MN_XNOR:
				return X;

			case MN_RED_AND:
			case MN_RED_OR:
			case MN_RED_XOR:
			case MN_RED_NAND:
			case MN_RED_NOR:
			case MN_RED_XNOR:
				return X;

			case MN_SHIFT_LEFT:
			case MN_SHIFT_RIGHT:
				return X;

			case MN_MUX:
			case MN_FF:
			case MN_REGISTER:
			case MN_REGISTER_RESET:
			case MN_IF:
			case MN_CASE:
			case MN_CONST_CASE:
			case MN_STATE_CASE:
				return X;
			default:
				/* catch any undefined MACRO NODES */
				assert(FALSE);
		}
	}
	else 
	{
		assert(FALSE);
	}

	/* based on the propogation values, go through the input propogations to see if we find conditions for a value to be passed on */
	if (propogation_value_if_input_is_zero != X)
	{
		/* IF - the on zero condition is not unknown then look at inputs */
		for (i = 0; i < node->num_input_pins; i++)
		{
			if (node->input_pins[i]->input_propogation_value_x_0_1 == ZERO)
			{
				/* IF - one of the inputs has a zero value */
				return propogation_value_if_input_is_zero;	
			}
		}
	}
	if (propogation_value_if_input_is_one != X)
	{
		/* IF - the on one condition is not unknown then look at inputs */
		for (i = 0; i < node->num_input_pins; i++)
		{
			if (node->input_pins[i]->input_propogation_value_x_0_1 == ONE)
			{
				/* IF - one of the inputs has a one value */
				return propogation_value_if_input_is_one;	
			}
		}
	}

	/* if everyhting else is not true then return an X */
	return X;
}
