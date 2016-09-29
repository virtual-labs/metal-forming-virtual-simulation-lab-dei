
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

/* This is functions that traverse the flattened netlist.  They are essentially used by odin_FLAT_netlist.c as functions to check if any 
 * functions in the netlist are dead.  This is done by traversing forward from the Primary inputs, and then backwards from the primary outputs
 * and checking if any node doesn't exist.
 */
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
#include "odin_node_utils.h"
#include "odin_node_display.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (function: ond_depth_first_traversal_start()
 *-------------------------------------------------------------------------------------------*/
void ond_depth_first_traversal_start(FILE *out)
{
	int i;

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			ond_depth_first_traverse(input_nodes[i], out, DEBUG_TRAVERSE);
		}
	}
	/* now traverse the ground and vcc pins */
	ond_depth_first_traverse(gnd_node, out, DEBUG_TRAVERSE);
	ond_depth_first_traverse(vcc_node, out, DEBUG_TRAVERSE);

	fprintf(out, "REVERSE DISPLAY\n");
	for (i = 0; i < num_output_nodes; i++)
	{
		if (output_nodes[i] != NULL)
		{
			ond_depth_reverse_traverse(output_nodes[i], out, DEBUG_REVERSE_TRAVERSE);
		}
	}
}
/*---------------------------------------------------------------------------------------------
 * (function:ond_depth_min_traverse
 *-------------------------------------------------------------------------------------------*/
void ond_depth_min_traverse(node_t *node, FILE *out)
{
	/* now traverse the ground and vcc pins */
	ond_depth_first_traverse(node, out, DEBUG_TRAVERSE);
	ond_depth_reverse_traverse(node, out, DEBUG_REVERSE_TRAVERSE);
}

/*---------------------------------------------------------------------------------------------
 * (function: ond_depth_first_traverse)
 *-------------------------------------------------------------------------------------------*/
void ond_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, j;

	if (node->level_count == DEBUG_TRAVERSE)
	{
		return;
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */

		/* mark that we have visitied this node now */
		node->level_count = DEBUG_TRAVERSE;

		if (node == gnd_node)
		{
			fprintf(out, "NODE: gnd\n");
		}
		else if (node == vcc_node)
		{
			fprintf(out, "NODE: vcc\n");
		}
		else if (node == null_node)
		{
			fprintf(out, "NODE: null\n");
		}
		else
		{
			fprintf(out, "NODE: %s\n", node->unique_name);
		}

		if (node->node_type == INPUT_NODE)
		{
			fprintf(out, "INPUT pin: %d\n", node->n_t.input_node.pin_id);
		}
		else if (node->node_type == OUTPUT_NODE)
		{
			fprintf(out, "OUTPUT pin: %d\n", node->n_t.output_node.pin_id);
		}

		if (node->generated_from_name != NULL)
		{
			fprintf(out, "\tGenerated From: %s\n", node->generated_from_name);
		}

		for (i = 0; i < node->num_input_pins; i++)
		{
			char *name;
			short free = TRUE;
			if (node->input_pins[i]->input_node == NULL)
			{
				fprintf(out, "\tINTERESTING null node->input_pins[%d]\n", i);
				continue;
			}

			if (node->input_pins[i]->input_node == gnd_node)
			{
				name = (char*)ou_malloc(sizeof(char)*20, HETS_UTILS);
				sprintf(name, "gnd");
			}
			else if (node->input_pins[i]->input_node== vcc_node)
			{
				name = (char*)ou_malloc(sizeof(char)*20, HETS_UTILS);
				sprintf(name, "vcc");
			}
			else if (node->input_pins[i]->input_node== null_node)
			{
				name = (char*)ou_malloc(sizeof(char)*20, HETS_UTILS);
				sprintf(name, "null");
			}
			else
			{
				free = FALSE;
				name = node->input_pins[i]->input_node->unique_name;
			}

			fprintf(out, "\tINPUT %d from: %s on pin %d as %d output", i, name, node->input_pins[i]->input_pins_related_output_port, node->input_pins[i]->input_pins_related_output_port_index);
			if (node->input_pins[i]->port_who_added != NULL)
			{
				fprintf(out, "--- Input was related to cell port %s\n", oEgu_generate_port_string(node->input_pins[i]->port_who_added));
			}
			else
			{
				fprintf(out, "\n");
			}

			if (free == TRUE)
			{
				ou_free(name);
			}
		}
		if ((node->num_input_pins == 0) && 
				(!((node->node_type == INPUT_NODE) || (node->node_type == VCC_GND_NODE))))
		{
			fprintf(out, "INTERESTING: Input %d has no input\n", i);
		}

		for (i = 0; i < node->num_output_pins; i++)
		{
			for (j = 0; j < node->output_pins[i]->num_output_pins_level_2; j++)
			{
				fprintf(out, "\tOUTPUT %d at %d to: %s on pin %d\n", i, j, node->output_pins[i]->output_nodes[j]->unique_name, node->output_pins[i]->output_pin_related_input_index[j]);
			}
			if (node->output_pins[i]->num_output_pins_level_2 == 0)
			{
				fprintf(out, "INTERESTING: Output %d at %d has no output\n", i, j);
			}
		}
		if ((node->num_output_pins == 0) && (node->node_type != OUTPUT_NODE))
		{
			fprintf(out, "INTERESTING: Output %d has no output\n", i);
		}

		fprintf(out, "\n");

		for (i = 0; i < node->num_output_pins; i++)
		{
			for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
			{
				D0(tabbed_printf(out, 0, "Node (%d) traversing on pin:%d_%d\n", node, i, j););
	
				if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
				{
					/* recursively depth in */
					ond_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ond_depth_reverse_traverse)
 *-------------------------------------------------------------------------------------------*/
void ond_depth_reverse_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, j;

	if (node->level_count == DEBUG_REVERSE_TRAVERSE)
	{
		return;
	}
	else if (node->level_count != DEBUG_TRAVERSE)
	{
		/* ELSE - this is a new node so depth visit it */
		fprintf(out, "MISSED NODE: %s\n", node->unique_name);
		if (node->generated_from_name != NULL)
		{
			fprintf(out, "\tGenerated From: %s\n", node->generated_from_name);
		}

		for (i = 0; i < node->num_input_pins; i++)
		{
			fprintf(out, "\tINPUT %d from: %s on pin %d as %d output\n", i, node->input_pins[i]->input_node->unique_name, node->input_pins[i]->input_pins_related_output_port, node->input_pins[i]->input_pins_related_output_port_index);
		}
		if ((node->num_input_pins == 0) && 
				(!((node->node_type == INPUT_NODE) || (node->node_type == VCC_GND_NODE))))
		{
			fprintf(out, "INTERESTING: Input %d has no input\n", i);
		}

		for (i = 0; i < node->num_output_pins; i++)
		{
			for (j = 0; j < node->output_pins[i]->num_output_pins_level_2; j++)
			{
				fprintf(out, "\tOUTPUT %d at %d to: %s on pin %d\n", i, j, node->output_pins[i]->output_nodes[j]->unique_name, node->output_pins[i]->output_pin_related_input_index[j]);
			}
			if (node->output_pins[i]->num_output_pins_level_2 == 0)
			{
				fprintf(out, "INTERESTING: Output %d at %d has no output\n", i, j);
			}
		}
		if ((node->num_output_pins == 0) && (node->node_type != OUTPUT_NODE))
		{
			fprintf(out, "INTERESTING: Output %d has no output\n", i);
		}

		fprintf(out, "\n");


	}

	/* mark that we have visitied this node now */
	node->level_count = DEBUG_REVERSE_TRAVERSE;

	for (i = 0; i < node->num_input_pins; i++)
	{
		if(onu_get_input_pins_node(node->input_pins[i]) != NULL)
		{
			/* recursively depth in */
			ond_depth_reverse_traverse (onu_get_input_pins_node(node->input_pins[i]), out, traverse_mark_number);
		}
	}
}
