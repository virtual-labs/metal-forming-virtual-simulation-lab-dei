
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

/* This is the file that converts a design into a BLIF format. */
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
#include "odin_ds1_graph_utils.h"
#include "odin_BLIF_output.h"


STRING_CACHE *ports_cache;

/*---------------------------------------------------------------------------------------------
 * (function: oBo_generate_vqm)
 * 	Basic traversal of the new datastructure.
 *-------------------------------------------------------------------------------------------*/
void oBo_generate_blif(int number_to_mark_as_flag, int *cell_count, FILE *out, ivl_design_t des, const char *path)
{
	int i,j;
	int idx;
    char *module_name;
	char *signal_name;
	int first_time_inputs = FALSE;
	int first_time_outputs = FALSE;
	int count = 0;
	char *return_string;

	/* initialize a hash that stores the signal names */
	ports_cache = sc_new_string_cache();

	/* define the top level module verbatim */
	/* mangle the original root name of the target */
    module_name = ou_strdup((char*)(ivl_scope_basename(ivl_design_root(des))), HETS_QUARTUS_LPM_GRAPH_UTILS);

	/* generate all te signals */
	fprintf(out, ".model %s\n", module_name);
	for (i = 0; i < ivl_scope_sigs(ivl_design_root(des)); i++)
	{
		if (ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_INPUT)
		{
			for (j = 0; j < ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)); j++)
			{
				signal_name = ou_flatten_odin_name((char*)ivl_signal_name(ivl_scope_sig(ivl_design_root(des), i)));
				return_string = oBo_append_string_with_number(signal_name, j);
	
				if (first_time_inputs == FALSE)
				{
					fprintf(out, ".inputs %s", return_string);
					first_time_inputs = TRUE;
					count++;
				}
				else if (count <= 5)
				{
					fprintf(out, " %s", return_string);
					count++;
				}
				else
				{
					fprintf(out, " %s \\\n", return_string);
					count = 0;
				}

				/* find hash spot for the signal name */
				idx = sc_add_string(ports_cache, signal_name);

				if (ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)) > 1)
				{
					ports_cache->data[idx] = (void*)TRUE;
				}
				else
				{
					ports_cache->data[idx] = (void*)FALSE;
				}

				ou_free(return_string);
			}
		}
	}
	fprintf(out, "\n");

	for (i = 0; i < ivl_scope_sigs(ivl_design_root(des)); i++)
	{
		if (ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_OUTPUT)
		{
			for (j = 0; j < ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)); j++)
			{
				signal_name = ou_flatten_odin_name((char*)ivl_signal_name(ivl_scope_sig(ivl_design_root(des), i)));
				return_string = oBo_append_string_with_number(signal_name, j);
	
				if (first_time_outputs == FALSE)
				{
					fprintf(out, ".outputs %s", return_string);
					first_time_outputs = TRUE;
					count++;
				}
				else if (count <= 5)
				{
					fprintf(out, " %s", return_string);
					count++;
				}
				else
				{
					fprintf(out, " %s\\\n", return_string);
					count = 0;
				}

				/* find hash spot for the signal name */
				idx = sc_add_string(ports_cache, signal_name);
	
				if (ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)) > 1)
				{
					ports_cache->data[idx] = (void*)TRUE;
				}
				else
				{
					ports_cache->data[idx] = (void*)FALSE;
				}

				ou_free(return_string);
			}
		}
	}
	fprintf(out, "\n");

	/* add gnd and vcc */
	fprintf(out, "\n.names gnd\n.names vcc\n1\n");

	/* traverse the internals of the flat net-list */
	oBo_depth_first_traversal_start(out);

	/* finish off the top level module */
	fprintf(out, ".end\n");
	
	ou_free(module_name);
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_depth_first_traversal_start()
 *-------------------------------------------------------------------------------------------*/
void oBo_depth_first_traversal_start(FILE *out)
{
	int i;

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			oBo_depth_first_traverse(input_nodes[i], out, BLIF_TRAVERSE);
		}
	}
	/* now traverse the ground and vcc pins */
	oBo_depth_first_traverse(gnd_node, out, BLIF_TRAVERSE);
	oBo_depth_first_traverse(vcc_node, out, BLIF_TRAVERSE);
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_depth_first_traverse)
 *-------------------------------------------------------------------------------------------*/
void oBo_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	tabbed_spaces(1); 

	if (node->mark_number == BLIF_TRAVERSE)
	{
		D0(tabbed_printf(out, 0, "Defined node...return\n"););
		return;
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */

		/* mark that we have visitied this node now */
		node->mark_number = BLIF_TRAVERSE;

		if (node->node_type == MAPPED_NODE) // (node->is_partial_mapped_bound == HPM_HARD_MAPPED)
		{
			/* IF - this node has been hard mapped to a special hetero node */
			assert(FALSE);
		}
		else if ((node->node_type == LIBRARY_NODE) || (node->node_type == LIBRARY_NODE_FF))
		{
			/* IF - this is a library node then we can drop the implementation */
			int library_index;

			if (node->node_type == LIBRARY_NODE)
			{
				library_index = node->n_t.library_node.cell_index;
				D0(tabbed_printf(out, 0, "# Node :%s (%d)\n", node->unique_name, node););
			}
			else
			{
				library_index = node->n_t.library_node_ff.cell_index;
				D0(tabbed_printf(out, 0, "# Node :%s (%d)\n", node->n_t.unique_name, node););
			}

			/* drop the VQM info for a library node */
			/* drop down a LUT-masked cell to implement this function */
			switch(blif_implementation[library_index].definition_style)
			{
				case QL_LOGIC: 
				{
					/* drop down entire cell with unique name and defined LUT MASK */
					oBo_define_logical_function(
							node, 
							library_index, 
							out);
					break;
				}
				case QL_DFF: 
				{
					/* drop down a LUT register */
					oBo_define_register(node, 
										out);
					break;
				}
			}

			/* once the info has been dropped down, then traverse the additional nodes */
			oBo_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == MACRO_NODE)
		{
			assert(FALSE);
		}
		else if (node->node_type == INPUT_NODE)
		{
			oBo_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == VCC_GND_NODE)
		{
			oBo_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else 
		{
			D0(tabbed_printf(out, 0, "Node is an OUTPUT\n"););
		}
	}

	tabbed_spaces(-1); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_device_define_output_traverse)
 *-------------------------------------------------------------------------------------------*/
void oBo_device_define_output_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, j;

	for (i = 0; i < node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
		{
			D0(tabbed_printf(out, 0, "Node (%d) traversing on pin:%d_%d\n", node, i, j););

			if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
			{
				/* recursively depth in */
				oBo_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_define_logical_function)
 *-------------------------------------------------------------------------------------------*/
void oBo_define_logical_function(
							node_t *node, 
							int library_index, 
							FILE *out)
{
	int i;
	char *wire_string;
	char **output_strings = (char**)ou_malloc(sizeof(char*), HETS_QUARTUS_LPM_GRAPH_UTILS);

	output_strings[0] =  oBo_generate_wire_name(node, 0);

	fprintf(out, "\n");
	fprintf(out, ".names");

	/* printout all the port hookups */
	for (i = 0; i < blif_implementation[library_index].num_input_ports; i++)
	{
		wire_string =  oBo_generate_wire_name(onu_get_input_pins_node(node->input_pins[i]), 
												onu_get_input_pins_related_output_port(node->input_pins[i]));

		/* now hookup the input wires with their respective ports.  [1+i] to skip output spot. */
		fprintf(out, " %s", wire_string); 
		ou_free(wire_string);
	}

	/* now print the output */
	fprintf(out, " %s", output_strings[0]);
	fprintf(out, "\n");

	/* print out the blif definition of this gate */
	fprintf(out, "%s", blif_implementation[library_index].verilog_definition_cell);

	/* Check if any of this nodes outputs drive a verilog output */
	oBo_create_an_output_joining(node, output_strings, out);
	ou_free(output_strings[0]);
	ou_free(output_strings);

	fprintf(out, "\n");
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_define_registe)
 *-------------------------------------------------------------------------------------------*/
void oBo_define_register(node_t *node, FILE *out)
{
	char *wire_string;
	char **output_strings = (char**)ou_malloc(sizeof(char*), HETS_QUARTUS_LPM_GRAPH_UTILS);

	output_strings[0] =  oBo_generate_wire_name(node, 0);
	/* hook up the data port */
	wire_string =  oBo_generate_wire_name(onu_get_input_pins_node(node->input_pins[0]), 
											onu_get_input_pins_related_output_port(node->input_pins[0]));

	fprintf(out, "\n");

	/* define the dff */ 
	fprintf(out, ".latch %s %s re ", wire_string, output_strings[0]);
	ou_free(wire_string);

	wire_string =  oBo_generate_wire_name(onu_get_input_pins_node(node->input_pins[1]), 
											onu_get_input_pins_related_output_port(node->input_pins[1]));
	/* hookup the .clk with the input spot 1 which correspinds to clk */
	fprintf(out, "%s 2", wire_string);
	ou_free(wire_string);

	/* create the final output connection if the output of this register is conneted to a primary output */
	oBo_create_an_output_joining(node, output_strings, out);
	ou_free(output_strings[0]);
	ou_free(output_strings);

	fprintf(out, "\n");
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_create_an_output_joining)
 * 	Searches all the outputs to check if there is any connection to a Primary Output.
 *-------------------------------------------------------------------------------------------*/
void oBo_create_an_output_joining(node_t *node, char** output_strings, FILE *out)
{
	int i, j;

	fprintf(out, "\n");
	for (i = 0; i < node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
		{
			if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
			{
				if (onu_get_output_pins_node(node->output_pins[i], j)->node_type == OUTPUT_NODE)
				{
					/* IF - this attached node is an output node then we need to make an attachment by creating a buffer */
					fprintf(out, ".names %s %s\n1 1\n", 
												output_strings[i],
												oBo_generate_port_string(onu_get_output_pins_node(node->output_pins[i], j)));

				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_generate_wire_name)
 *-------------------------------------------------------------------------------------------*/
char *oBo_generate_wire_name(node_t *node, int output_index) 
{
	char *generated_wire_names;
	char *temp_return_strings;

	switch(node->node_type)
	{
		case LIBRARY_NODE: 
		{
			/* concat the cell name with 'out' */
			temp_return_strings = ou_strdup(ou_flatten_odin_name(node->unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
			generated_wire_names = (char*)ou_malloc(sizeof(char) * (strlen(temp_return_strings) + 
																1 + 
																strlen(current_library[node->n_t.library_node.cell_index].port_name[output_index]) 
																+ 1), HETS_QUARTUS_LPM_GRAPH_UTILS);
			sprintf(generated_wire_names, "%s_%s", 	temp_return_strings, 
													current_library[node->n_t.library_node.cell_index].port_name[output_index]);
			ou_free(temp_return_strings);
			break;
		}
		case LIBRARY_NODE_FF: 
		{
			/* concat the cell name with 'out' */
			assert(output_index == 0);
			temp_return_strings = ou_strdup(ou_flatten_odin_name(node->unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
			generated_wire_names = (char*)ou_malloc(sizeof(char) * (strlen(temp_return_strings) + 
																1 + 
																strlen(current_library[node->n_t.library_node_ff.cell_index].port_name[output_index]) 
																+ 1), HETS_QUARTUS_LPM_GRAPH_UTILS);
			sprintf(generated_wire_names, "%s_%s", 	temp_return_strings, 
													current_library[node->n_t.library_node_ff.cell_index].port_name[output_index]);
			ou_free(temp_return_strings);
			break;
		}
		case INPUT_NODE: 
		{
			/* grab the port name with the pin number */
			generated_wire_names = ou_strdup(oBo_generate_port_string(node), HETS_QUARTUS_LPM_GRAPH_UTILS);
			break;
		}
		case OUTPUT_NODE: 
		{
			assert(FALSE);
			break;
		}
		case VCC_GND_NODE: 
		{
			/* for vcc or ground just copy out the name */
			generated_wire_names = ou_strdup(node->n_t.vcc_gnd_node.name, HETS_QUARTUS_LPM_GRAPH_UTILS);
			break;
		}
		default:
			assert(FALSE);
	}
	return generated_wire_names;
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_append_string_with_number)
 *-------------------------------------------------------------------------------------------*/
char *oBo_append_string_with_number(char *string, int number)
{
	char *return_string;
	return_string = (char*)ou_malloc(strlen(string) + 1 + 20 + 1, HETS_QUARTUS_LPM_GRAPH_UTILS);
	sprintf(return_string, "%s_%d",  string, number);
	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: oBo_generate_port_string)
 *-------------------------------------------------------------------------------------------*/
char *oBo_generate_port_string(node_t *node_with_port)
{
	char *long_line;
	char *ivl_signal_named;
	int pin_id;
	int i;

	if (node_with_port->node_type == INPUT_NODE)
	{
		ivl_signal_named = node_with_port->n_t.input_node.port_string;
		pin_id = node_with_port->n_t.input_node.pin_id; 
	}
	else
	{
		ivl_signal_named = node_with_port->n_t.output_node.port_string;
		pin_id = node_with_port->n_t.output_node.pin_id; 
	}

	/* find hash spot for the signal name */
	i = sc_add_string(ports_cache, ivl_signal_named);

	/* if we have already defined this type of gate return */
	if ((int)ports_cache->data[i] == TRUE)
	{
		/* IF - this port has width > 1 then us [] */
		long_line = (char*)ou_malloc(strlen(ivl_signal_named) + 1 + 10 + 1, HETS_QUARTUS_LPM_GRAPH_UTILS);
		sprintf(long_line, "%s_%d",  ivl_signal_named, pin_id);
	}
	else
	{
		/* ELSE - just the straight name */
		long_line = (char*)ou_malloc(strlen(ivl_signal_named) + 3, HETS_QUARTUS_LPM_GRAPH_UTILS);
		sprintf(long_line, "%s_0", ivl_signal_named);
	}

	return long_line;
}
