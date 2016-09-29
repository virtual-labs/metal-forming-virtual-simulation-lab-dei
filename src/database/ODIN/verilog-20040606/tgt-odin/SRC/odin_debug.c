
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

/* This is really just a set of wrappers to pretify my debug code */
#include <stdio.h>
#include <stdlib.h>
#include <stdarg.h>
#include "string_cache.h"
#include "debug.h"
#include "config.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_debug.h"
#include "odin_utils.h"


/**************************
GLOBALS
**************************/
int spacing = 0;

/**************************
PROTOTYPES
**************************/

/*-------------------------------------------------------------------
tabbed_spaces
-------------------------------------------------------------------*/
void tabbed_spaces(int spaces)
{
	spacing += spaces;
}

/*-------------------------------------------------------------------
tabbed_spaces
-------------------------------------------------------------------*/
void tabbed_spaces_set(int spaces)
{
	spacing = spaces;
}
/*-------------------------------------------------------------------
tabbed_printf
-------------------------------------------------------------------*/
void tabbed_printf(FILE *target, int spaces, const char* fmt, ...)
{
	int i;

   	va_list args;

	spacing += spaces;

	for (i = 0; i < spacing; i++)
	{
		fprintf(target, " ");
	}

	va_start(args, fmt);
	vfprintf(target, fmt, args);
	va_end(args);

	fflush(target);
}


void od_check_for_combinational_loops_depth (node_t *cur_node, node_t *who_added, int current_traverse_id) ;

/*---------------------------------------------------------------------------------------------
 * (function: od_check_for_combinational_loops)
 *-------------------------------------------------------------------------------------------*/
void od_check_for_combinational_loops ()
{
	int i, j, k;
	int current_search = FF_TRAVERSE;

	for (i = 0; i < num_ff_nodes; i++)
	{
		if (ff_node[i] != NULL)
		{
			/* IF - this ff_node exists */	
			for (j = 0; j < ff_node[i]->num_output_pins; j++)
			{
				current_search ++;
				//fprintf(stdout, "\nNew flip flop\n");

				for (k = 0; k < ff_node[i]->output_pins[j]->num_output_pins_level_2; k++)
				{
					/* add all the outputs of the current flip-flop node to the stack to be searched */
					//fprintf(stdout, "Adding(ff:%ld) node_id:%ld\n",ff_node[i]->m_id, ff_node[i]->output_pins[j]->output_nodes[k]->m_id);
					od_check_for_combinational_loops_depth (ff_node[i]->output_pins[j]->output_nodes[k], ff_node[i], current_search);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: od_check_for_combinational_loops)
 *-------------------------------------------------------------------------------------------*/
void od_check_for_combinational_loops_depth (node_t *cur_node, node_t *who_added, int current_traverse_id) 
{
	int j, k;

	if (cur_node->mark_number == current_traverse_id) 
	{
		/* IF - we find a node with the same mark then there is a feedback loop */
		assert(FALSE);
	}	
	else if (!((cur_node->n_t.hetero_node.hetero_node_type == MN_REGISTER) 
				|| (cur_node->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)
				|| (cur_node->node_type == OUTPUT_NODE)))
	{
		/* ELSE IF - this node is NOT a flip-flop then add it's outputs to the stack after marking */
		cur_node->mark_number = current_traverse_id;

		for (j = 0; j < cur_node->num_output_pins; j++)
		{
			for (k = 0; k < cur_node->output_pins[j]->num_output_pins_level_2; k++)
			{
				/* add all the outputs of the current flip-flop node to the stack to be searched */
				od_check_for_combinational_loops_depth (cur_node->output_pins[j]->output_nodes[k], cur_node, current_traverse_id);
				//fprintf(stdout, "Adding(%ld) node_id:%ld\n", cur_node->m_id, cur_node->output_pins[j]->output_nodes[k]->m_id); 
			}
		}

		/* reset this node since it is completely searched */
		cur_node->mark_number = FF_TRAVERSE;
	}
	else
	{
		/* ELSE - this is a flip-flop so we're done with it reset this node since it is completely searched */
		cur_node->mark_number = FF_TRAVERSE;
	}
}
