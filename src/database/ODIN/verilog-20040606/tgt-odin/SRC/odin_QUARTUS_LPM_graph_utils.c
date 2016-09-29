
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

/* This is the file that traverses the final netlist and generates a Verilog structural file that can be passed into Quartus */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>
#include <math.h>

#include "debug.h"
#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_node_utils.h"
#include "odin_ds1_graph_utils.h"
#include "odin_QUARTUS_LPM_graph_utils.h"

#define MAX(a,b) ((a)>(b)?(a):(b))

STRING_CACHE *ports_cache;

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_vqm)
 * 	Basic traversal of the new datastructure.
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_vqm(int number_to_mark_as_flag, int *cell_count, FILE *out, ivl_design_t des, const char *path)
{
	int i;
	int idx;
    char *module_name;
	char *signal_name;
	int first_time = FALSE;

	/* initialize a hash that stores the signal names */
	ports_cache = sc_new_string_cache();

	/* define the top level module verbatim */
	/* mangle the original root name of the target */
    module_name = ou_strdup((char*)(ivl_scope_basename(ivl_design_root(des))), HETS_QUARTUS_LPM_GRAPH_UTILS);

	/* generate all te signals */
	fprintf(out, "module %s (\n", module_name);
	for (i = 0; i < ivl_scope_sigs(ivl_design_root(des)); i++)
	{
		if ((ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_INPUT) || (ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_OUTPUT))
		{
			signal_name = ou_flatten_odin_name((char*)ivl_signal_name(ivl_scope_sig(ivl_design_root(des), i)));

			if (first_time == FALSE)
			{
				fprintf(out, "\t%s", signal_name);
				first_time = TRUE;
			}
			else
			{
				fprintf(out, ",\n\t%s", signal_name);
			}

			/* find hash spot for the signal name */
			idx = sc_add_string(ports_cache, signal_name);

			/* if we have already defined this type of gate return */
		    if(ports_cache->data[idx] != NULL)
			{
				assert(0);
			}

			if (ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)) > 1)
			{
				ports_cache->data[idx] = (void*)TRUE;
			}
			else
			{
				ports_cache->data[idx] = (void*)FALSE;
			}
		}
	}
	fprintf(out, ");\n");

	/* now describe the signals based on their direction and width */
	for (i = 0; i < ivl_scope_sigs(ivl_design_root(des)); i++)
	{
		/* define the direction of the port */
		/* skip all signals that are not Port inputs or outputs */
		if (ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_INPUT)
		{
			fprintf(out, "input ");
		}
		else if (ivl_signal_port(ivl_scope_sig(ivl_design_root(des), i)) == IVL_SIP_OUTPUT)
		{
			fprintf(out, "output ");
		}
		else
		{
			continue;
		}

		/* determine the size */
		if (ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i)) > 1)
		{
			fprintf(out, "[%d:0] ", ivl_signal_pins(ivl_scope_sig(ivl_design_root(des), i))-1);
		}

		/* now add the name */
		fprintf(out, "%s;\n", ou_flatten_odin_name((char*)ivl_signal_name(ivl_scope_sig(ivl_design_root(des), i))));
	}

	/* add gnd and vcc */
	fprintf(out, "\nwire gnd;\nwire vcc;\nassign gnd = 1'b0;\nassign vcc = 1'b1;\n\n");

	/* traverse the internals of the flat net-list */
	oQLgu_depth_first_traversal_start(out);

	/* finish off the top level module */
	fprintf(out, "endmodule\n");
	
	/* now print out any verilog definitions that need to be printed out */
	for (i = 0; i < NUM_LIBRARY_CELLS ; i++)
	{
		if (quartus_lib_imp[i].is_definition_already_written == TRUE)
		{
			/* IF - this is a definition cell that is used in the design then printout the verilog version */

			assert(quartus_lib_imp[i].definition_style == QL_DEFINITION);

			fprintf(out, "\n%s\n", quartus_lib_imp[i].verilog_definition_cell);
		}
	}

	ou_free(module_name);
}

/*---------------------------------------------------------------------------------------------
 * (function: oeQLgu_depth_first_traversal_start()
 *-------------------------------------------------------------------------------------------*/
void oQLgu_depth_first_traversal_start(FILE *out)
{
	int i;

	/*******************/
	/* PASS 1
	 * Generates all the wires that will be used */
	/*******************/

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			oQLgu_depth_first_traverse_wire_define_pass(input_nodes[i], out, QUARTUS_LPM_TRAVERSE_WIRE);
		}
	}
	/* now traverse the ground and vcc pins */
	oQLgu_depth_first_traverse_wire_define_pass(gnd_node, out, QUARTUS_LPM_TRAVERSE_WIRE);
	oQLgu_depth_first_traverse_wire_define_pass(vcc_node, out, QUARTUS_LPM_TRAVERSE_WIRE);

	/*******************/
	/* PASS 2
	 * Generates the flat units */
	/*******************/

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			oQLgu_depth_first_traverse(input_nodes[i], out, QUARTUS_LPM_TRAVERSE);
		}
	}
	/* now traverse the ground and vcc pins */
	oQLgu_depth_first_traverse(gnd_node, out, QUARTUS_LPM_TRAVERSE);
	oQLgu_depth_first_traverse(vcc_node, out, QUARTUS_LPM_TRAVERSE);
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_depth_first_traverse_wire_define_pass)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_depth_first_traverse_wire_define_pass(node_t *node, FILE *out, int traverse_mark_number)
{
	int i;
	char* temp_string;

	if (node->mark_number == traverse_mark_number)
	{
		return;
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */

		/* mark that we have visitied this node now */
		node->mark_number = traverse_mark_number;
		if (node->node_type == MAPPED_NODE) // (node->is_partial_mapped_bound == HPM_HARD_MAPPED)
		{
			/* IF - this node has been hard mapped to a special hetero node.  This is needed since when I bind things I don't actually 
			 * rip up and replace the nodes, but instead just mark them specially. */

			/* mark all the nodes as TRAVERSED */
			for (i = 0; i < node->binding->tfe_implementation->all_nodes->num_nodes; i++)
			{
				node->binding->tfe_implementation->all_nodes->nodes[i]->mark_number = traverse_mark_number;
			}

			/* call a function to define the output wires */
			oQLgu_generate_hard_mapped_device_wire_pass(node, out);

			/* now propogate forward on all the output pins */
			oQLgu_wire_define_output_traverse_SPECIAL_for_hard_mapped(node, out, traverse_mark_number);
		}
		else if ((node->node_type == LIBRARY_NODE) || (node->node_type == LIBRARY_NODE_FF)) 
		{
			/* IF - this is a library node then we can drop the implementation */
			int library_index; 
			
			if (node->node_type == LIBRARY_NODE) 
			{
				library_index = node->n_t.library_node.cell_index;
			}
			else
			{
				library_index = node->n_t.library_node_ff.cell_index;
			}

			switch(quartus_lib_imp[library_index].definition_style)
			{
				case QL_LOGIC: 
				{
					temp_string = oQLgu_generate_wire_name(node, 0);
					fprintf(out, "wire %s;\n", temp_string);
					ou_free(temp_string);
					break;
				}
				case QL_DEFINITION: 
				{
					for (i = 0; i < quartus_lib_imp[library_index].num_output_ports; i++)
					{
						temp_string =  oQLgu_generate_wire_name(node, i);
						fprintf(out, "wire %s;\n", temp_string);
						ou_free(temp_string);
					}
					break;
				}
				case QL_DFF: 
				{
					temp_string =  oQLgu_generate_wire_name(node, 0);
					fprintf(out, "wire %s;\n", temp_string);
					ou_free(temp_string);
					break;
				}
			}

			/* once the info has been dropped down, then traverse the additional nodes */
			oQLgu_wire_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == MACRO_NODE)
		{
			/* do the wire assessment for the hetero nodes */
			oQLgu_generate_hetero_device_wire_pass(node, out);

			/* propoate all the outputs forward */
			oQLgu_wire_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == INPUT_NODE)
		{
			oQLgu_wire_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == VCC_GND_NODE)
		{
			oQLgu_wire_define_output_traverse(node, out, traverse_mark_number);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_wire_define_output_traverse)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_wire_define_output_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, j;

	for (i = 0; i < node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
		{
			if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
			{
				/* recursively depth in */
				oQLgu_depth_first_traverse_wire_define_pass (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_wire_define_output_traverse_SPECIAL_for_hard_mapped)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_wire_define_output_traverse_SPECIAL_for_hard_mapped(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, k, l;

	for (i = 0; i < node->binding->tfe_implementation->output_nodes->num_nodes; i++)
	{
		for (k = 0; k < node->binding->tfe_implementation->output_nodes->nodes[i]->num_output_pins; k++)
		{
			for (l = 0; l < onu_get_output_pins_related_num_level_2(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k]); l++)
			{
				if(onu_get_output_pins_node(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k], l) != NULL)
				{
					/* recursively depth in */
					oQLgu_depth_first_traverse_wire_define_pass (onu_get_output_pins_node(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k], l), out, traverse_mark_number);
				}
#if 0
				if(onu_get_output_pins_node(node->output_pins[k], l) != NULL)
				{
					/* recursively depth in */
					oQLgu_depth_first_traverse_wire_define_pass (onu_get_output_pins_node(node->output_pins[k], l), out, traverse_mark_number);
				}
#endif
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_depth_first_traverse)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number)
{
	int i;

	tabbed_spaces(1); 

	if (node->mark_number == QUARTUS_LPM_TRAVERSE)
	{
		D0(tabbed_printf(out, 0, "Defined node...return\n"););
		return;
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */

		/* mark that we have visitied this node now */
		node->mark_number = QUARTUS_LPM_TRAVERSE;

		if (node->node_type == MAPPED_NODE) // (node->is_partial_mapped_bound == HPM_HARD_MAPPED)
		{
			/* IF - this node has been hard mapped to a special hetero node */

			/* mark all the nodes as TRAVERSED */
			for (i = 0; i < node->binding->tfe_implementation->all_nodes->num_nodes; i++)
			{
				node->binding->tfe_implementation->all_nodes->nodes[i]->mark_number = QUARTUS_LPM_TRAVERSE;
			}

			/* call a function to define the node */
			oQLgu_generate_hard_mapped_device(node, node->unique_name, out);

			/* now traverse forward */
			oQLgu_device_define_output_traverse_SPECIAL_for_hard_mapped(node, out, traverse_mark_number);
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
			switch(quartus_lib_imp[library_index].definition_style)
			{
				case QL_LOGIC: 
				{
					/* drop down entire cell with unique name and defined LUT MASK */
					oQLgu_define_logical_function(
							node, 
							library_index, 
							oQLgu_get_unique_name(node), 
							out);
					break;
				}
				case QL_DEFINITION: 
				{
					oQLgu_define_compound_logic(node,
										oQLgu_get_unique_name(node),
										library_index,
										out);	
					break;
				}
				case QL_DFF: 
				{
					/* drop down a LUT register */
					oQLgu_define_register(node, oQLgu_get_unique_name(node), library_index, out);
					break;
				}
			}

			/* once the info has been dropped down, then traverse the additional nodes */
			oQLgu_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == MACRO_NODE)
		{
			D0(tabbed_printf(out, 0, "# Hetero Node :%s (%d)\n", node->unique_name, node););

			/* With each of the hetero nodes we have to actually assess how to generate the Megafunction or the hetero device */
			oQLgu_generate_hetero_device(node, oQLgu_get_unique_name(node), out);	

			oQLgu_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == INPUT_NODE)
		{
			oQLgu_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else if (node->node_type == VCC_GND_NODE)
		{
			oQLgu_device_define_output_traverse(node, out, traverse_mark_number);
		}
		else 
		{
			D0(tabbed_printf(out, 0, "Node is an OUTPUT\n"););
		}
	}

	tabbed_spaces(-1); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_device_define_output_traverse)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_device_define_output_traverse(node_t *node, FILE *out, int traverse_mark_number)
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
				oQLgu_depth_first_traverse (onu_get_output_pins_node(node->output_pins[i], j), out, traverse_mark_number);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_device_define_output_traverse_SPECIAL_for_hard_mapped)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_device_define_output_traverse_SPECIAL_for_hard_mapped(node_t *node, FILE *out, int traverse_mark_number)
{
	int i, k, l;

	for (i = 0; i < node->binding->tfe_implementation->output_nodes->num_nodes; i++)
	{
		for (k = 0; k < node->binding->tfe_implementation->output_nodes->nodes[i]->num_output_pins; k++)
		{
			for (l = 0; l < onu_get_output_pins_related_num_level_2(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k]); l++)
			{
				if(onu_get_output_pins_node(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k], l) != NULL)
				{
					/* recursively depth in */
					oQLgu_depth_first_traverse (onu_get_output_pins_node(node->binding->tfe_implementation->output_nodes->nodes[i]->output_pins[k], l), out, traverse_mark_number);
				}
#if 0
				if(onu_get_output_pins_node(node->output_pins[k], l) != NULL)
				{
					/* recursively depth in */
					oQLgu_depth_first_traverse (onu_get_output_pins_node(node->output_pins[k], l), out, traverse_mark_number);
				}
#endif
			}
		}
	}
}
/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_define_logical_function)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_define_logical_function(
							node_t *node, 
							int library_index, 
							char *unique_name, 
							FILE *out)
{
	int i;
	char *unique_print_name = ou_strdup(ou_flatten_odin_name(unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
	char *wire_string;
	char **output_strings = (char**)ou_malloc(sizeof(char*), HETS_QUARTUS_LPM_GRAPH_UTILS);

	fprintf(out, "\n");

	output_strings[0] =  oQLgu_generate_wire_name(node, 0);

	/* print out all the cell name, unique_name, and start of the port list */
	fprintf(out, "%s %s (", quartus_lib_imp[library_index].name, unique_print_name);

	/* printout the output hookup */
	fprintf(out, "%s", output_strings[0]);
	
	/* printout all the port hookups */
	for (i = 0; i < quartus_lib_imp[library_index].num_input_ports; i++)
	{
		wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[i]), 
												onu_get_input_pins_related_output_port(node->input_pins[i]));

		/* now hookup the input wires with their respective ports.  [1+i] to skip output spot. */
		fprintf(out, ", %s", wire_string); 
		ou_free(wire_string);
	}

	/* end the definition string */
	fprintf(out, ");\n");

	/* Check if any of this nodes outputs drive a verilog output */
	oQLgu_create_an_output_joining(node, output_strings, out);
	ou_free(output_strings[0]);
	ou_free(output_strings);

	ou_free(unique_print_name);

	fprintf(out, "\n");
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_define_registe)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_define_register(node_t *node, char *unique_name, int library_index, FILE *out)
{
	char *unique_print_name = ou_strdup(ou_flatten_odin_name(unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
	char *wire_string;
	char **output_strings = (char**)ou_malloc(sizeof(char*), HETS_QUARTUS_LPM_GRAPH_UTILS);

	output_strings[0] =  oQLgu_generate_wire_name(node, 0);

#if 1
	fprintf(out, "\n");

	/* define the dff */ 
	fprintf(out, "lpm_dff %s (", unique_print_name);

	/* hook up the data port */
	wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[0]), 
											onu_get_input_pins_related_output_port(node->input_pins[0]));
	/* hookup the .d with the input spot 0 which correspinds to in1 */
	fprintf(out, ".data(%s),", wire_string);
	ou_free(wire_string);

	wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[1]), 
											onu_get_input_pins_related_output_port(node->input_pins[1]));
	/* hookup the .clk with the input spot 1 which correspinds to clk */
	fprintf(out, ".clock(%s),", wire_string);
	ou_free(wire_string);

	if (node->num_input_pins > 2)
	{
		/* IF - there is a reset pin then */
		wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[2]), 
											onu_get_input_pins_related_output_port(node->input_pins[2]));
		/* hookup the .clk with the input spot 1 which correspinds to clk */
		fprintf(out, ".sset(%s),", wire_string);
		ou_free(wire_string);
	}

	/* printout the output hookup */
	fprintf(out, ".q(%s));\n", output_strings[0]);

	fprintf(out, "defparam %s.lpm_width = 1;\n", unique_print_name);
#endif
#if 0
	/* print out all the cell name, unique_name, and start of the port list */
	fprintf(out, "%s %s (", quartus_lib_imp[library_index].name, unique_print_name);

	wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[0]), 
											onu_get_input_pins_related_output_port(node->input_pins[0]));
	/* hookup the .d with the input spot 0 which correspinds to in1 */
	fprintf(out, ".%s(%s),", quartus_lib_imp[library_index].input_ports[0], wire_string);
	ou_free(wire_string);

	wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[1]), 
											onu_get_input_pins_related_output_port(node->input_pins[1]));
	/* hookup the .clk with the input spot 1 which correspinds to clk */
	fprintf(out, ".%s(%s),", quartus_lib_imp[library_index].input_ports[1], wire_string);
	ou_free(wire_string);

	fprintf(out, ".clrn(vcc), .prn(vcc),");

	/* printout the output hookup */
	fprintf(out, ".%s(%s));\n", quartus_lib_imp[library_index].output_ports[0], output_strings[0]);
#endif

	/* create the final output connection if the output of this register is conneted to a primary output */
	oQLgu_create_an_output_joining(node, output_strings, out);
	ou_free(output_strings[0]);
	ou_free(output_strings);

	ou_free(unique_print_name);

	fprintf(out, "\n");
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_define_compound_logic)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_define_compound_logic(node_t *node, char *unique_name, int library_index, FILE *out)
{
	int i;
	char *unique_print_name = ou_strdup(ou_flatten_odin_name(unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
	char *wire_string;
	char **output_strings = (char**)ou_malloc(sizeof(char*)*quartus_lib_imp[library_index].num_output_ports, HETS_QUARTUS_LPM_GRAPH_UTILS);

	fprintf(out, "\n");

	/* update that this definition is used in the design so we actually print it out */
	quartus_lib_imp[library_index].is_definition_already_written = TRUE;

	/* print out all the cell name, unique_name, and start of the port list */
	fprintf(out, "%s %s (", quartus_lib_imp[library_index].name, unique_print_name);

	for (i = 0; i < quartus_lib_imp[library_index].num_output_ports; i++)
	{
		if (i != 0)
		{
			fprintf(out, ", ");
		}

		output_strings[i] =  oQLgu_generate_wire_name(node, i);
		/* printout the output hookup */
		fprintf(out, ".%s(%s)", quartus_lib_imp[library_index].output_ports[i], output_strings[i]);
	}
	
	for (i = 0; i < quartus_lib_imp[library_index].num_input_ports; i++)	
	{
		wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[i]), 
												onu_get_input_pins_related_output_port(node->input_pins[i]));

		/* now hookup the input wires with their respective ports. */
		fprintf(out, ", .%s(%s)", quartus_lib_imp[library_index].input_ports[i], wire_string); 
		ou_free(wire_string);
	}

	/* end the definition string */
	fprintf(out, ");\n");

	/* create the final output connection if the outputs of this function is conneted to a primary output */
	oQLgu_create_an_output_joining(node, output_strings, out);

	/* ou_free all the outputs */
	for (i = 0; i < quartus_lib_imp[library_index].num_output_ports; i++)
	{
		ou_free(output_strings[i]);
	}
	ou_free(output_strings);

	ou_free(unique_print_name);

	fprintf(out, "\n");
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_hard_mapped_device_wire_pass)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_hard_mapped_device_wire_pass(node_t *node, FILE *out)
{
	int i, j, k;
	char *wire_string;
	int output_idx = 0;

	/* go through all the output nodes and for each output node go through all the output ports, and for
	 * each output port go through each pin and define a wire.  The assumption is that if a node is in 
	 * a match, then the wires needed are based on the outputs */
	for (i = 0; i < node->binding->tfe_implementation->output_nodes->num_nodes; i++)
	{
		for (j = 0; j < node->binding->tfe_implementation->output_nodes->nodes[i]->num_output_ports; j++)
		{
			for (k = 0; k < node->binding->tfe_implementation->output_nodes->nodes[i]->output_ports[j]->width; k++)
			{
				wire_string =  oQLgu_generate_wire_name(node, output_idx);
				fprintf(out, "wire %s;\n", wire_string);
				ou_free(wire_string);

				output_idx ++;
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_hetero_device_wire_pass)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_hetero_device_wire_pass(node_t *node, FILE *out)
{
	int i;
	char *wire_string;
	int width;

	/* determine what type of hetero node this is */
	switch (node->n_t.hetero_node.hetero_node_type)
	{
		case MN_MEMORY:
		{
			int memory_width;

			if (node->n_t.hetero_node.memory != NULL)
			{
				memory_width = ivl_memory_width(node->n_t.hetero_node.memory);
			}
			else
			{
				memory_width = node->n_t.hetero_node.width;
			}

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			for (i = 0; i < memory_width; i++)
			{
				wire_string =  oQLgu_generate_wire_name(node, i);
				fprintf(out, "wire %s;\n", wire_string);
				ou_free(wire_string);
			}
			break;
		}
		case MN_MULT:
		{
			width = node->n_t.hetero_node.width;

			for (i = 0; i < width; i++)
			{
				wire_string =  oQLgu_generate_wire_name(node, i);
				fprintf(out, "wire %s;\n", wire_string);
				ou_free(wire_string);
			}
			break;
		}
		case MN_ADD:
		case MN_SUB:
		case MN_ADD_SUB:
		case MN_ADD_CARRY_NODE:
		case MN_COUNTER:
		case MN_CONST_CASE:
		{
			width = node->num_output_pins;

			for (i = 0; i < width; i++)
			{
				wire_string =  oQLgu_generate_wire_name(node, i);
				fprintf(out, "wire %s;\n", wire_string);
				ou_free(wire_string);
			}
			break;
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_hetero_device)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_hetero_device(node_t *node, char *unique_name, FILE *out)
{
	char *wire_string;
	char *unique_print_name = ou_strdup(ou_flatten_odin_name(unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
	int i;
	char **output_strings;

	/* determine what type of hetero node this is */
	switch (node->n_t.hetero_node.hetero_node_type)
	{
		case MN_MEMORY:
		{
			int memory_width;
			int memory_size_in_words;
			int address_width;

			if (node->n_t.hetero_node.memory != NULL)
			{
				memory_width = ivl_memory_width(node->n_t.hetero_node.memory);
				memory_size_in_words = ivl_memory_size(node->n_t.hetero_node.memory);
				address_width = node->n_t.hetero_node.memory_details->address_width;
			}
			else
			{
				memory_width = node->n_t.hetero_node.width;
				address_width = node->n_t.hetero_node.memory_details->address_width;
				memory_size_in_words = (int)pow(2, address_width);
			}

			/* A hetero memory needs to be defined.  Using Alteras lpm_ram_dp which is a dual port ram.  This allows a read and write address to be 
			 * seperately hooked up into the memory.  Maybe should use the altsyncram??? */

			/* define the RAM function. */ 
			fprintf(out, "altsyncram %s (\n", unique_print_name);

			if (node->n_t.hetero_node.width_b != 0)
			{
				/* IF - this is not a ROM then don't make a write enable */
				wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[1]), 
														onu_get_input_pins_related_output_port(node->input_pins[1]));
				fprintf(out, "\t.wren_a(%s),\n", wire_string); 
				ou_free(wire_string);
			}

			/* hook up the wrclock */
			wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[0]), 
													onu_get_input_pins_related_output_port(node->input_pins[0]));
			fprintf(out, "\t.clock0(%s),\n", wire_string); 
			ou_free(wire_string);


			if (node->n_t.hetero_node.width_b != 0)
			{
				/* IF - this node is not a ROM */

				/* hookup the wradress */
				fprintf(out, "\t.address_a("); 
				oQLgu_generate_concat_input_port_list(node,  address_width, 2+memory_width, out);
				fprintf(out, "),\n"); 

				/* hookup the rdaddress */
				fprintf(out, "\t.address_b("); 
				oQLgu_generate_concat_input_port_list(node,  address_width, 2+memory_width+address_width, out);
				fprintf(out, "),\n"); 

				/* hook up the data port */
				fprintf(out, "\t.data_a("); 
				oQLgu_generate_concat_input_port_list(node,  memory_width, 2, out); 
				fprintf(out, "),\n"); 

				/* hookup the output port */
				fprintf(out, "\t.q_b("); 
				output_strings = oQLgu_generate_concat_output_port_list(node, memory_width, 0, out);
				fprintf(out, "));\n"); 
			}
			else
			{
				/* ELSE - this node is a ROM */
				/* hookup the wradress */
				fprintf(out, "\t.address_a("); 
				oQLgu_generate_concat_input_port_list(node,  address_width, 2, out);
				fprintf(out, "),\n"); 

				/* hookup the output port */
				fprintf(out, "\t.q_a("); 
				output_strings = oQLgu_generate_concat_output_port_list(node, memory_width, 0, out);
				fprintf(out, "));\n"); 
			}

			/* send out the parameters - obtained by creating a MegaFunction in Quartus */
			fprintf(out, "defparam\n\t%s.widthad_a = %d,\n", unique_print_name, address_width);
			fprintf(out, "\t%s.numwords_a = %d,\n", unique_print_name, memory_size_in_words);
			fprintf(out, "\t%s.width_a = %d,\n", unique_print_name, memory_width);
			if (node->n_t.hetero_node.width_b != 0)
		    {
				/* IF - not a ROM */
				fprintf(out, "\t%s.operation_mode = \"DUAL_PORT\",\n", unique_print_name);
				fprintf(out, "\t%s.width_b = %d,\n", unique_print_name, memory_width);
				fprintf(out, "\t%s.widthad_b = %d,\n", unique_print_name, address_width);
				fprintf(out, "\t%s.numwords_b = %d,\n", unique_print_name, memory_size_in_words);
				fprintf(out, "\t%s.width_byteena_a = 1,\n", unique_print_name);
				fprintf(out, "\t%s.outdata_reg_b = \"UNREGISTERED\",\n", unique_print_name);
				fprintf(out, "\t%s.indata_aclr_a = \"NONE\",\n", unique_print_name);
				fprintf(out, "\t%s.wrcontrol_aclr_a = \"NONE\",\n", unique_print_name);
				fprintf(out, "\t%s.address_aclr_a = \"NONE\",\n", unique_print_name);
				fprintf(out, "\t%s.address_reg_b = \"CLOCK0\",\n", unique_print_name);
				fprintf(out, "\t%s.address_aclr_b = \"NONE\",\n", unique_print_name);
				fprintf(out, "\t%s.outdata_aclr_b = \"NONE\",\n", unique_print_name);
			}
			else
			{
				/* ELSE - is a ROM */
				fprintf(out, "\t%s.operation_mode = \"ROM\",\n", unique_print_name);
				fprintf(out, "\t%s.outdata_reg_a = \"UNREGISTERED\",\n", unique_print_name);
			}
			if (node->n_t.hetero_node.memory_details->file_initialization_name != NULL)
			{
				/* IF - there is an init file */
				fprintf(out, "\t%s.init_file = \"%s\",\n", unique_print_name, node->n_t.hetero_node.memory_details->file_initialization_name);
			}
			else
			{
				/* ELSE - there is no init file */
				fprintf(out, "\t%s.init_file = \"UNUSED\",\n", unique_print_name);
			}
			fprintf(out, "\t%s.lpm_type = \"altsyncram\",\n", unique_print_name);
			fprintf(out, "\t%s.ram_block_type = \"AUTO\",\n", unique_print_name);
			fprintf(out, "\t%s.read_during_write_mode_mixed_ports = \"DONT_CARE\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < memory_width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);
		
			break;
		}
		case MN_MULT:
		{
			int widtha = node->n_t.hetero_node.width_a;
			int widthb = node->n_t.hetero_node.width_b;
			int width = node->n_t.hetero_node.width;
			/* A multiplier unit needs to be used */

			/* define the mult function. */ 
			fprintf(out, "lpm_mult %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			oQLgu_generate_concat_input_port_list(node,  widtha, 0, out);
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			oQLgu_generate_concat_input_port_list(node, widthb, widtha, out);
			fprintf(out, "),\n"); 

			/* hookup the output port */
			fprintf(out, "\t.result("); 
			output_strings = oQLgu_generate_concat_output_port_list(node,  width, 0, out);
			fprintf(out, "));\n"); 

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "defparam %s.lpm_widtha = %d,\n", unique_print_name, widtha);
			fprintf(out, "%s.lpm_widthb = %d,\n", unique_print_name, widthb);
			fprintf(out, "%s.lpm_widthp = %d,\n", unique_print_name, width);
			fprintf(out, "%s.lpm_widths = 1,\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"LPM_MULT\",\n", unique_print_name);
			fprintf(out, "%s.lpm_representation = \"UNSIGNED\",\n", unique_print_name);
			fprintf(out, "%s.dedicated_multiplier_circuitry = \"YES\",\n", unique_print_name);

			if (node->n_t.hetero_node.constant_portA == TRUE)
			{
				/* IF - A port has all constants then pass this on to Quartus */
				fprintf(out, "%s.INPUT_A_IS_CONSTANT = \"YES\",\n", unique_print_name);
			}
			if (node->n_t.hetero_node.constant_portB == TRUE)
			{
				/* IF - B port has all constants then pass this on to Quartus */
				fprintf(out, "%s.INPUT_B_IS_CONSTANT = \"YES\",\n", unique_print_name);
			}

			fprintf(out, "%s.lpm_hint = \"MAXIMIZE_SPEED=6", unique_print_name);
			fprintf(out, "\";\n");

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_ADD:
		case MN_SUB:
		{
			int widtha = node->n_t.hetero_node.width_a;
			int widthb = node->n_t.hetero_node.width_b;
			int width = node->n_t.hetero_node.width;
			/* A add_sub unit needs to be used */

			assert((widtha != 0) && (widthb != 0) && (width != 0))

			/* define the mult function. */ 
			fprintf(out, "lpm_add_sub %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			oQLgu_generate_concat_input_port_list(node,  widtha, 0, out);
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			oQLgu_generate_concat_input_port_list(node, widthb, widtha, out);
			fprintf(out, "),\n"); 

			if (width >= MAX(widtha, widthb))
			{
				/* IF - this is not using a carry */
				/* hookup the output port */
				fprintf(out, "\t.result("); 
				output_strings = oQLgu_generate_concat_output_port_list(node,  width, 0, out);
				fprintf(out, "));\n"); 
			}
			else if (width == MAX(widtha, widthb) + 1)
			{
				char **temp_strings;

				fprintf(out, "\t.result("); 
				output_strings = oQLgu_generate_concat_output_port_list(node,  width-1, 0, out);
				fprintf(out, "),\n"); 

				fprintf(out, "\t.cout("); 
				temp_strings = oQLgu_generate_concat_output_port_list(node,  1, width-1, out);
				fprintf(out, "));\n"); 

				/* adjust the output string */
				output_strings = (char**)ou_realloc(output_strings, sizeof(char*)*width, HETS_QUARTUS_LPM_GRAPH_UTILS);
				output_strings[width-1] = temp_strings[0];
				ou_free(temp_strings);
			}
			else
			{
				assert(FALSE);
			}

			if (node->n_t.hetero_node.hetero_node_type == MN_ADD) 
			{
				/* IF - this is an addition then make the quartus lpm addition */
				fprintf(out, "defparam %s.lpm_direction = \"ADD\",\n", unique_print_name);
			}
			else
			{
				/* ELSE - this is an subtraction then make the quartus lpm subtract */
				fprintf(out, "defparam %s.lpm_direction = \"SUB\",\n", unique_print_name);
			}

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "%s.lpm_width = %d,\n", unique_print_name, width);
			fprintf(out, "%s.lpm_representation = \"SIGNED\",\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"LPM_ADD_SUB\",\n", unique_print_name);
			fprintf(out, "%s.use_wys = \"ON\",\n", unique_print_name);
			fprintf(out, "%s.lpm_hint = \"MAXIMIZE_SPEED=6\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_ADD_CARRY_NODE:
		{
			int width = node->n_t.hetero_node.width;

			assert(width != 0);

			/* define the mult function. */ 
			fprintf(out, "lpm_add_sub %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			oQLgu_generate_concat_input_port_list(node,  width, 0, out);
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			oQLgu_generate_concat_input_port_list(node, width, width, out);
			fprintf(out, "),\n"); 

			/* hook up the cin port - the last input pin */
			wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[2*width]), 
													onu_get_input_pins_related_output_port(node->input_pins[2*width]));
			fprintf(out, "\t.cin(%s),\n", wire_string);

			/* hookup the output port */
			fprintf(out, "\t.result("); 
			output_strings = oQLgu_generate_concat_output_port_list(node,  width, 0, out);
			fprintf(out, "));\n"); 

			fprintf(out, "defparam %s.lpm_direction = \"ADD\",\n", unique_print_name);

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "%s.lpm_width = %d,\n", unique_print_name, width);
			fprintf(out, "%s.lpm_representation = \"SIGNED\",\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"LPM_ADD_SUB\",\n", unique_print_name);
			fprintf(out, "%s.use_wys = \"ON\",\n", unique_print_name);
			fprintf(out, "%s.lpm_hint = \"MAXIMIZE_SPEED=6\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_ADD_SUB:
		{
			int widtha = node->n_t.hetero_node.width_a;
			int widthb = node->n_t.hetero_node.width_b;
			int width = node->n_t.hetero_node.width;
			/* A add_sub unit needs to be used */

			assert((widtha != 0) && (widthb != 0) && (width != 0))

			/* define the mult function. */ 
			fprintf(out, "lpm_add_sub %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			oQLgu_generate_concat_input_port_list(node,  widtha, 0, out);
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			oQLgu_generate_concat_input_port_list(node, widthb, widtha, out);
			fprintf(out, "),\n"); 

			/* hookup the add/sub signal */
			wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[widtha+widthb]), 
													onu_get_input_pins_related_output_port(node->input_pins[widtha+widthb]));
			fprintf(out, "\t.add_sub(%s),\n", wire_string); 
			ou_free(wire_string);

			/* hookup the output port */
			fprintf(out, "\t.result("); 
			output_strings = oQLgu_generate_concat_output_port_list(node,  width, 0, out);
			fprintf(out, "));\n"); 

			if (node->n_t.hetero_node.hetero_node_type == MN_ADD) 
			{
				/* IF - this is an addition then make the quartus lpm addition */
				fprintf(out, "defparam %s.lpm_direction = \"ADD\",\n", unique_print_name);
			}
			else
			{
				/* ELSE - this is an subtraction then make the quartus lpm subtract */
				fprintf(out, "defparam %s.lpm_direction = \"SUB\",\n", unique_print_name);
			}

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "%s.lpm_width = %d,\n", unique_print_name, width);
			fprintf(out, "%s.lpm_representation = \"SIGNED\",\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"LPM_ADD_SUB\",\n", unique_print_name);
			fprintf(out, "%s.use_wys = \"ON\",\n", unique_print_name);
			fprintf(out, "%s.lpm_hint = \"MAXIMIZE_SPEED=6\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_COUNTER:
		{
			int width = node->n_t.hetero_node.width;

			assert(width != 0);

			/* define the mult function. */ 
			fprintf(out, "lpm_counter %s (\n", unique_print_name);

			/* hook up clock */
			wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[0]), 
													onu_get_input_pins_related_output_port(node->input_pins[0]));
			/* hookup the .clk with the input spot 0 which correspinds to clk */
			fprintf(out, "\t.clock(%s),\n", wire_string);
			ou_free(wire_string);

			/* hook up reset signal */
			if (node->num_input_pins == 2)
			{
				wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[1]), 
														onu_get_input_pins_related_output_port(node->input_pins[1]));
				/* hookup the .sclr with the input spot 1 which correspinds to clk */
				fprintf(out, "\t.sclr(%s),\n", wire_string);
				ou_free(wire_string);
			}

			/* hook up outputs */
			fprintf(out, "\t.q("); 
			output_strings = oQLgu_generate_concat_output_port_list(node,  width, 0, out);
			fprintf(out, "));\n"); 

			fprintf(out, "defparam ");

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "%s.lpm_width = %d,\n", unique_print_name, width);
			if (node->n_t.hetero_node.counter_dir == MN_ADD) 
			{
				/* IF - this is an addition then make the quartus lpm addition */
				fprintf(out, "%s.lpm_direction = \"UP\",\n", unique_print_name);
			}
			else
			{
				/* ELSE - this is an subtraction then make the quartus lpm subtract */
				fprintf(out, "%s.lpm_direction = \"DOWN\",\n", unique_print_name);
			}
			fprintf(out, "%s.lpm_type = \"LPM_COUNTER\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_CONST_CASE:
		{
			int width = node->num_output_pins;
			int i, j;
			int num_cases = node->n_t.hetero_node.num_cases-1; // -1 since the case processing always adds a default which we don't want in the constant
			int input_port_index = node->n_t.hetero_node.muxed_input_start_index;
			int *pre_analyse_NULL_count;
			int width_sel = node->n_t.hetero_node.width;
			char **input_ordered_list;

			output_strings = (char**)ou_malloc(sizeof(char*)*width, HETS_QUARTUS_LPM_GRAPH_UTILS);
		
			assert (num_cases > 1);
			/* allocate and initialize the analysis flags */
			pre_analyse_NULL_count = (int*)ou_malloc(sizeof(int)*width, HETS_QUARTUS_LPM_GRAPH_UTILS);
			for (i = 0; i < width; i++)
			{
				pre_analyse_NULL_count[i] = 0;
			}
		
			for (i = 0; i < width; i++)
			{
				for (j = 0; j < num_cases; j++)
				{
					if (node->input_pins[input_port_index]->input_node == null_node)
					{
						/* IF - we find a NULL node, then record this in the preanalyse flags */
						pre_analyse_NULL_count[i] ++;
					}
					input_port_index ++;
				}
			}
		
			/* reset input_port_index_count */
			input_port_index = node->n_t.hetero_node.muxed_input_start_index;
		
			for (i = 0; i < width; i++)
			{
				int max_size_mux;
				assert(num_cases-pre_analyse_NULL_count[i] > 1);
		
				/* define the mult function. */ 
				fprintf(out, "lpm_mux %s_m%d (\n", unique_print_name, i);
		
				/* hookup select */
				fprintf(out, "\t.sel("); 
				oQLgu_generate_concat_input_port_list(node, width_sel, 0, out);
				fprintf(out, "),\n"); 
		
				assert (num_cases - pre_analyse_NULL_count[i] > 1);
		
				/* create the string list of ordered inputs */
				max_size_mux = node->n_t.hetero_node.case_order[num_cases]+1;
				input_ordered_list = (char**)ou_malloc(sizeof(char*)*max_size_mux, HETS_QUARTUS_LPM_GRAPH_UTILS);
				for (j = 0; j < max_size_mux; j++)
				{
					input_ordered_list[j] = NULL;
				}
		
				for (j = 0; j < num_cases; j++)
				{
					assert(node->n_t.hetero_node.case_order[j] < max_size_mux);
					assert(node->n_t.hetero_node.case_order[j] != -1);
					assert(input_ordered_list[node->n_t.hetero_node.case_order[j]] == NULL);
		
					if (node->input_pins[input_port_index]->input_node != null_node)
					{
						/* IF - there is a value for this input port extract it */
						input_ordered_list[node->n_t.hetero_node.case_order[j]] = oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[input_port_index]), 
																											onu_get_input_pins_related_output_port(node->input_pins[input_port_index]));
					}
					input_port_index++;
				}
				
				/* add an extra 1 for the default case whcih doesn't apply to constants */
				input_port_index++;
		
				/* hookup inputs in order */
				fprintf(out, "\t.data("); 
				fprintf(out, "\n\t\t{");

				/* Error caught by Dave Howland - fix is to traverse backwards */
				for (j = max_size_mux-1; j >= 0; j--)
				//for (j = 0; j < max_size_mux; j++)
				{
					if ((input_ordered_list[j] == NULL) && (j == max_size_mux-1))
					//if ((input_ordered_list[j] == NULL) && (j == 0))
					{
						fprintf(out, "gnd");
					}
					else if (input_ordered_list[j] == NULL)
					{
						fprintf(out, ",\n\t\tgnd");
					}
					else if (j == max_size_mux-1)
					//else if (j == 0)
					{
						fprintf(out, "%s", input_ordered_list[j]);
					}
					else
					{
						fprintf(out, ",\n\t\t%s", input_ordered_list[j]);
					}
				}
				fprintf(out, "}");
				fprintf(out, "),\n"); 
		
				/* hookup outputs */
				output_strings[i] =  oQLgu_generate_wire_name(node, i);
				/* hookup the .clk with the input spot 0 which correspinds to clk */
				fprintf(out, "\t.result(%s));\n", output_strings[i]);
		
				fprintf(out, "defparam ");
		
				/* define the parameters - based on MegaFunction in Quartus and help files */
				fprintf(out, "%s_m%d.lpm_size = %d,\n", unique_print_name, i, max_size_mux);
				fprintf(out, "%s_m%d.lpm_widths = %d,\n", unique_print_name, i, width_sel);
				fprintf(out, "%s_m%d.lpm_width = 1,\n", unique_print_name, i);
				fprintf(out, "%s_m%d.lpm_type = \"LPM_MUX\";\n", unique_print_name, i);
		
				ou_free(input_ordered_list);
			}
			ou_free(pre_analyse_NULL_count);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(node, output_strings, out);
			for (i = 0; i < width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
	}

	ou_free(unique_print_name);
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_hard_mapped_device)
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_hard_mapped_device(node_t *node, char *unique_name, FILE *out)
{
	char *wire_string;
	char *unique_print_name = ou_strdup(ou_flatten_odin_name(unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
	int i, j;
	char **output_strings;
	tfe_binding_t *binding = node->binding;

	/* determine what type of hetero node this is */
	switch (node->binding->match_id)
	{
		case MN_FOUR_MULT:
		case MN_TWO_MULT:
		{
			int num_input_nodes = binding->tfe_implementation->input_nodes->num_nodes;
			int max_input_widtha = 0;
			int max_input_widthb = 0;

			/* find the largest input width */
			for (i = 0; i < num_input_nodes; i++)
		    {
				max_input_widtha = MAX(binding->tfe_implementation->input_nodes->nodes[i]->input_ports[0]->width, max_input_widtha);
				max_input_widthb = MAX(binding->tfe_implementation->input_nodes->nodes[i]->input_ports[1]->width, max_input_widthb);
			}

			/* define the add function. */ 
			fprintf(out, "altmult_add %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			fprintf(out, "\n\t\t{");

			for (i = 0; i < num_input_nodes; i++)
			{
				for (j = max_input_widtha - 1; j >= 0; j--)
				{
					if (!((j == max_input_widtha - 1) && (i == 0)))
					{
						fprintf(out, ",\n\t\t"); 
					}

					if (j >= binding->tfe_implementation->input_nodes->nodes[i]->input_ports[0]->width)
					{
						/* IF - the value is larger, then we need to put in gnd */
						fprintf(out, "gnd");
					}
					else
					{
						/* ELSE - define the wire */
						wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(binding->tfe_implementation->input_nodes->nodes[i]->input_pins[j]), 
												onu_get_input_pins_related_output_port(binding->tfe_implementation->input_nodes->nodes[i]->input_pins[j]));
						
						fprintf(out, "%s", wire_string); 
						ou_free(wire_string);
					}
				}
			}
			fprintf(out, "}");
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			fprintf(out, "\n\t\t{");

			for (i = 0; i < num_input_nodes; i++)
			{
				for (j = max_input_widthb + binding->tfe_implementation->input_nodes->nodes[i]->input_ports[1]->width - 1; j >= binding->tfe_implementation->input_nodes->nodes[i]->input_ports[1]->width; j--)
				{
					if (!((j == max_input_widthb + binding->tfe_implementation->input_nodes->nodes[i]->input_ports[1]->width - 1) && (i == 0)))
					{
						fprintf(out, ",\n\t\t"); 
					}

					if (j >= binding->tfe_implementation->input_nodes->nodes[i]->input_ports[1]->width + binding->tfe_implementation->input_nodes->nodes[i]->input_ports[0]->width)
					{
						/* IF - the value is larger, then we need to put in gnd */
						fprintf(out, "gnd");
					}
					else
					{
						/* ELSE - define the wire */
						wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(binding->tfe_implementation->input_nodes->nodes[i]->input_pins[j]), 
												onu_get_input_pins_related_output_port(binding->tfe_implementation->input_nodes->nodes[i]->input_pins[j]));
						
						fprintf(out, "%s", wire_string); 
						ou_free(wire_string);
					}
				}
			}
			fprintf(out, "}");
			fprintf(out, "),\n"); 

			/* hookup the output port.  Should only be one. */
			assert(binding->tfe_implementation->output_nodes->num_nodes == 1);
			fprintf(out, "\t.result("); 
			output_strings = oQLgu_generate_concat_output_port_list(binding->tfe_implementation->output_nodes->nodes[0], 
																	binding->tfe_implementation->output_nodes->nodes[0]->output_ports[0]->width, 
																	0, 
																	out);
			fprintf(out, "));\n"); 

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "defparam %s.number_of_multipliers = %d,\n", unique_print_name, num_input_nodes);
			fprintf(out, "%s.width_a = %d,\n", unique_print_name, max_input_widtha);
			fprintf(out, "%s.width_b = %d,\n", unique_print_name, max_input_widthb);
			fprintf(out, "%s.width_result = %d,\n", unique_print_name, binding->tfe_implementation->output_nodes->nodes[0]->output_ports[0]->width);
			for (i = 0; i < num_input_nodes; i++)
			{
				fprintf(out, "%s.input_register_a%d = \"UNREGISTERED\",\n", unique_print_name, i);
				fprintf(out, "%s.input_register_b%d = \"UNREGISTERED\",\n", unique_print_name, i);
				fprintf(out, "%s.multiplier_register%d = \"UNREGISTERED\",\n", unique_print_name, i);
			}
			fprintf(out, "%s.output_register = \"UNREGISTERED\",\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"almult_add\",\n", unique_print_name);
			fprintf(out, "%s.representation_a = \"UNSIGNED\",\n", unique_print_name);
			fprintf(out, "%s.representation_b = \"UNSIGNED\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(binding->tfe_implementation->output_nodes->nodes[0], output_strings, out);
			for (i = 0; i < binding->tfe_implementation->output_nodes->nodes[0]->output_ports[0]->width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_MULT_ADD_PACK:
		{
			int num_input_nodes = 2;
			int max_input_widtha;
			int max_input_widthb = binding->tfe_implementation->input_nodes->nodes[0]->input_ports[1]->width;
			int index_adder_non_multiplier_node;
			int port_index;

			assert(binding->tfe_implementation->input_nodes->num_nodes == 1);

			/* enter in the inputs for the second input to the adder */
			if (binding->tfe_implementation->input_nodes->nodes[0] == binding->tfe_implementation->inout_nodes->nodes[0]->input_pins[0]->input_node)
			{
				/* IF - the first port of the adder node is the multiplier node, then the inputs we need to pass through is the other inputs */
				port_index = 1;
				index_adder_non_multiplier_node = binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[0]->width;
				max_input_widtha = binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[port_index]->width > binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width ? binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[port_index]->width : binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width;
			}
			else
			{
				/* ELSE - the input node we want to connect to is hooked up to these pins */
				port_index = 0;
				index_adder_non_multiplier_node = 0;
				max_input_widtha = binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[port_index]->width > binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width ? binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[port_index]->width : binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width;
			}	

			/* define the add function. */ 
			fprintf(out, "altmult_add %s (\n", unique_print_name);

			/* hook up the data port */
			fprintf(out, "\t.dataa("); 
			fprintf(out, "\n\t\t{");

			/* enter in the first multiply */
			for (j = max_input_widtha - 1; j >= 0; j--)
			{
				if (j >= binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width)
				{
					/* IF - the value is larger, then we need to put in gnd */
					fprintf(out, "gnd");
				}
				else
				{
					/* ELSE - define the wire */
					wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(binding->tfe_implementation->input_nodes->nodes[0]->input_pins[j]), 
											onu_get_input_pins_related_output_port(binding->tfe_implementation->input_nodes->nodes[0]->input_pins[j]));
					
					fprintf(out, "%s", wire_string); 
					ou_free(wire_string);
				}
				fprintf(out, ",\n\t\t"); 
			}

			for (j = max_input_widtha - 1; j >= 0; j--)
			{
				if (j >= binding->tfe_implementation->inout_nodes->nodes[0]->input_ports[port_index]->width)
				{
					/* IF - the value is larger, then we need to put in gnd */
					fprintf(out, "gnd");
				}
				else
				{
					wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(binding->tfe_implementation->inout_nodes->nodes[0]->input_pins[j+index_adder_non_multiplier_node]), 
											onu_get_input_pins_related_output_port(binding->tfe_implementation->inout_nodes->nodes[0]->input_pins[j+index_adder_non_multiplier_node]));
					
					fprintf(out, "%s", wire_string); 
					ou_free(wire_string);
				}

				if (j != 0)
				{
					fprintf(out, ",\n\t\t"); 
				}
			}

			fprintf(out, "}");
			fprintf(out, "),\n"); 

			/* hook up the datab port */
			fprintf(out, "\t.datab("); 
			fprintf(out, "\n\t\t{");

			for (j = max_input_widthb + binding->tfe_implementation->input_nodes->nodes[0]->input_ports[1]->width - 1; j >= binding->tfe_implementation->input_nodes->nodes[0]->input_ports[1]->width; j--)
			{
				if (j >= binding->tfe_implementation->input_nodes->nodes[0]->input_ports[1]->width + binding->tfe_implementation->input_nodes->nodes[0]->input_ports[0]->width)
				{
					/* IF - the value is larger, then we need to put in gnd */
					fprintf(out, "gnd");
				}
				else
				{
					/* ELSE - define the wire */
					wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(binding->tfe_implementation->input_nodes->nodes[0]->input_pins[j]), 
											onu_get_input_pins_related_output_port(binding->tfe_implementation->input_nodes->nodes[0]->input_pins[j]));
					
					fprintf(out, "%s", wire_string); 
					ou_free(wire_string);
				}
				fprintf(out, ",\n\t\t"); 
			}

			/* enter the number 1 in for the second input to the other multiplier */
			for (j = max_input_widthb-1; j >= 0; j--)
			{
				if (j == 0)
				{
					/* IF - we aren't at the LSB print out 0 */
					fprintf(out, "vcc");
				}
				else
				{
					/* ELSE - print 0 for all other bits */
					fprintf(out, "gnd, \n\t\t");
				}
			}

			fprintf(out, "}");
			fprintf(out, "),\n"); 

			/* hookup the output port.  Should only be one. */
			assert(binding->tfe_implementation->inout_nodes->num_nodes == 1);
			fprintf(out, "\t.result("); 
			output_strings = oQLgu_generate_concat_output_port_list(binding->tfe_implementation->inout_nodes->nodes[0], 
																	binding->tfe_implementation->inout_nodes->nodes[0]->output_ports[0]->width, 
																	0, 
																	out);
			fprintf(out, "));\n"); 

			/* define the parameters - based on MegaFunction in Quartus and help files */
			fprintf(out, "defparam %s.number_of_multipliers = %d,\n", unique_print_name, num_input_nodes);
			fprintf(out, "%s.width_a = %d,\n", unique_print_name, max_input_widtha);
			fprintf(out, "%s.width_b = %d,\n", unique_print_name, max_input_widthb);
			fprintf(out, "%s.width_result = %d,\n", unique_print_name, binding->tfe_implementation->inout_nodes->nodes[0]->output_ports[0]->width);
			for (i = 0; i < num_input_nodes; i++)
			{
				fprintf(out, "%s.input_register_a%d = \"UNREGISTERED\",\n", unique_print_name, i);
				fprintf(out, "%s.input_register_b%d = \"UNREGISTERED\",\n", unique_print_name, i);
				fprintf(out, "%s.multiplier_register%d = \"UNREGISTERED\",\n", unique_print_name, i);
			}
			fprintf(out, "%s.output_register = \"UNREGISTERED\",\n", unique_print_name);
			fprintf(out, "%s.lpm_type = \"almult_add\",\n", unique_print_name);
			fprintf(out, "%s.representation_a = \"UNSIGNED\",\n", unique_print_name);
			fprintf(out, "%s.representation_b = \"UNSIGNED\";\n", unique_print_name);

			/* create the final output connection if the outputs of this function is conneted to a primary output */
			oQLgu_create_an_output_joining(binding->tfe_implementation->inout_nodes->nodes[0], output_strings, out);
			for (i = 0; i < binding->tfe_implementation->inout_nodes->nodes[0]->output_ports[0]->width; i++)
			{
				ou_free(output_strings[i]);
			}
			ou_free(output_strings);

			break;
		}
		case MN_ADD_MULT:
		{
			assert(FALSE);
			break;
		}	
		case MN_MAC:
		{
			assert(FALSE);
			break;
		}
		default:
		{
			assert(FALSE);
		}
	}

	ou_free(unique_print_name);
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_create_an_output_joining)
 * 	Searches all the outputs to check if there is any connection to a Primary Output.
 *-------------------------------------------------------------------------------------------*/
void oQLgu_create_an_output_joining(node_t *node, char** output_strings, FILE *out)
{
	int i, j;

	for (i = 0; i < node->num_output_pins; i++)
	{
		for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
		{
			if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
			{
				if (onu_get_output_pins_node(node->output_pins[i], j)->node_type == OUTPUT_NODE)
				{
					/* IF - this attached node is an output node then we need to make an attachment */
					fprintf(out, "assign %s = %s;\n", oQLgu_generate_port_string(onu_get_output_pins_node(node->output_pins[i], j)), output_strings[i]);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_get_unique_name)
 *-------------------------------------------------------------------------------------------*/
char *oQLgu_get_unique_name(node_t *node)
{
	switch(node->node_type)
	{
		case LIBRARY_NODE: 
		case LIBRARY_NODE_FF: 
		case INPUT_NODE: 
		case OUTPUT_NODE: 
		case MACRO_NODE:
		{
			return node->unique_name;
		}
		case MAPPED_NODE:
		{
			return node->binding->bind_name;
		}
		case VCC_GND_NODE: 
		{
			assert(FALSE);
			break;
		}
	}
	return NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_wire_name)
 *-------------------------------------------------------------------------------------------*/
char *oQLgu_generate_wire_name(node_t *node, int output_index) 
{
	char *generated_wire_names;
	char *temp_return_strings;

	switch(node->node_type)
	{
		case MACRO_NODE:
		{
			/* concat the cell name with 'out' */
			temp_return_strings = ou_strdup(ou_flatten_odin_name(node->unique_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
			generated_wire_names = (char*)ou_malloc(sizeof(char) * (strlen(temp_return_strings) + 1 + 10), HETS_QUARTUS_LPM_GRAPH_UTILS); 
			sprintf(generated_wire_names, "%s_%d", 	temp_return_strings, output_index);
			ou_free(temp_return_strings);
			break;
		}
		case MAPPED_NODE:
		{
			/* concat the cell name with 'out' */
			temp_return_strings = ou_strdup(ou_flatten_odin_name(node->binding->bind_name), HETS_QUARTUS_LPM_GRAPH_UTILS);
			generated_wire_names = (char*)ou_malloc(sizeof(char) * (strlen(temp_return_strings) + 1 + 10), HETS_QUARTUS_LPM_GRAPH_UTILS); 
			sprintf(generated_wire_names, "%s_%d", 	temp_return_strings, output_index);
			ou_free(temp_return_strings);
			break;
		}
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
			generated_wire_names = ou_strdup(oQLgu_generate_port_string(node), HETS_QUARTUS_LPM_GRAPH_UTILS);
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
 * (function: oQLgu_generate_port_string)
 *-------------------------------------------------------------------------------------------*/
char *oQLgu_generate_port_string(node_t *node_with_port)
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
		sprintf(long_line, "%s[%d]",  ivl_signal_named, pin_id);
	}
	else
	{
		/* ELSE - just the straight name */
		long_line = (char*)ou_malloc(strlen(ivl_signal_named) + 1, HETS_QUARTUS_LPM_GRAPH_UTILS);
		sprintf(long_line, "%s",  ivl_signal_named);
	}

	return long_line;
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_concat_input_port_list)
 * 	This generates a concated list for inputs starting at the index and going to the list size
 *-------------------------------------------------------------------------------------------*/
void oQLgu_generate_concat_input_port_list(node_t *node,  int size_list, int index_to_start_at, FILE *out)
{
	int i;
	char *wire_string;

	fprintf(out, "\n\t\t{");

	assert(index_to_start_at + size_list <= node->num_input_pins);
	assert(size_list > 0);

	for (i = index_to_start_at + size_list - 1; i >= index_to_start_at; i--)
	{
		wire_string =  oQLgu_generate_wire_name(onu_get_input_pins_node(node->input_pins[i]), 
												onu_get_input_pins_related_output_port(node->input_pins[i]));

		if (i == index_to_start_at + size_list - 1)
			fprintf(out, "%s", wire_string); 
		else
			fprintf(out, ",\n\t\t%s", wire_string); 
		ou_free(wire_string);
	}

	fprintf(out, "}");
}

/*---------------------------------------------------------------------------------------------
 * (function: oQLgu_generate_concat_output_port_list)
 * 	This generates a concated list for outputs starting at the index and going to the list size
 *-------------------------------------------------------------------------------------------*/
char **oQLgu_generate_concat_output_port_list(node_t *node,  int size_list, int index_to_start_at, FILE *out)
{
	int i;
	char *wire_string;
	char **return_string = (char**)ou_malloc(sizeof(char*)*size_list, HETS_QUARTUS_LPM_GRAPH_UTILS); 

	fprintf(out, "\n\t\t{");

	assert(index_to_start_at + size_list <= node->num_output_pins);

	for (i = index_to_start_at + size_list - 1; i >= index_to_start_at; i--)
	{
		wire_string =  oQLgu_generate_wire_name(node, i);

		if (i == index_to_start_at + size_list - 1)
			fprintf(out, "%s", wire_string); 
		else
			fprintf(out, ",\n\t\t%s", wire_string); 

		/* copy each of the output strings */
		return_string[i-index_to_start_at] = ou_strdup(wire_string, HETS_QUARTUS_LPM_GRAPH_UTILS);

		ou_free(wire_string);
	}

	fprintf(out, "}");

	return return_string;
}


