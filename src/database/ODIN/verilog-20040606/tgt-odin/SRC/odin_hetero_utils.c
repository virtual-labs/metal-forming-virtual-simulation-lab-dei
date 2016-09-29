
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

/* This file contains utility functions for heterogeneous structures including creating cells that describe heterogeneous structures and
 * optimization techniques for heterogeneous structures.  
 *
 * The optimizations are done for multiplexers, multipliers, and adders.  These optimizations can only be done in certain cases,
 * so we use global lists to quickly check if for each node of a given type can the optimization be done.
 *
 * Multiplexers are joined, and common signals are pushed together.
 * Multipliers are checked for constants and high order zeros allow shrinking.
 * Adders are checked for constants and low order zeros allow shrinking of the number of adders used.
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

#include "odin_ds1_graph_utils.h"
#include "odin_cell_define_utils.h"
#include "odin_hetero_utils.h"
#include "odin_node_utils.h"
#include "odin_FLAT_netlist.h"
#include "odin_expression_optimizations.h"
#include "odin_node_and_cell_utils.h"
#include "odin_soft_mapping.h"

node_t** add_sub_list = NULL;
int num_add_sub_list = 0;
node_t** mult_list = NULL;
int num_mult_list = 0;
node_t** if_and_case_list = NULL;
int num_if_and_case_list = 0;

/*---------------------------------------------------------------------------------------------
 * (function: ohu_optimize)
 * 	This is the top-level control for optimizations I perform for heterogeneous structures.
 * 	These structures are anything that is not basic logic, and currently I do optimzations 
 * 	for multiplexers, multipliers, and add/subtraction.
 *-------------------------------------------------------------------------------------------*/
void ohu_optimize () 
{
	ohu_optimize_case_and_if();
	ohu_multiplier_optimization();
	ohu_add_sub_optimization(); 
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_create_computation_trees)
 * 	This is a point where computation trees are created using nodes from the multiplier and
 * 	addition lists.
 *-------------------------------------------------------------------------------------------*/
void ohu_create_computation_trees()
{
	int i;

	for (i = 0; i < num_mult_list; i++)
	{
		if (mult_list[i] == NULL)
		{
			continue;
		}

		/* check if this multiplier is part of a bigger tree */
		oeo_check_computation_tree(mult_list[i]) ;
	}
	/* add to computation trees after all othe optimizations done */
	for (i = 0; i < num_add_sub_list; i++)
	{
		if (add_sub_list[i] == NULL)
		{
			continue;
		}
		else
		{
			/* check if this adder is part of a bigger tree */
			oeo_check_computation_tree(add_sub_list[i]);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_build_skeleton)
 * 	This is part of the first data structure format for creating heterogeneous cells.
 *-------------------------------------------------------------------------------------------*/
void ohu_build_skeleton (cell_t *parent_cell, 
								net_pointer_t **input_1,
								net_pointer_t **input_2,
								int width_a, int width_b, 
								net_pointer_t **output,
								int width,
								int unique_id,
								short macro_type,
								int num_input_ports,
								int num_output_ports)
{
	int i;
	cell_t* skeleton_cell;
	internal_signal_t *temp_sig;
	cell_ports_t **cells_out_ports = NULL;
	cell_ports_t **cells_in1_ports = NULL;
	cell_ports_t **cells_in2_ports = NULL;
	cell_nets_t *new_net;
	
	/* define the lpm inside the cell */
	skeleton_cell = oEgu_add_generated_cell(ocdu_generate_unique_name("H_SKEL", unique_id));

	/* identify this cell as a hetero cell */
	oEgu_add_macro_cell_info(skeleton_cell, width_a, width_b, 0, width, macro_type, num_input_ports, num_output_ports);

	cells_out_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width, HETS_HETERO_UTILS);
	cells_in1_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_a, HETS_HETERO_UTILS);
	cells_in2_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_b, HETS_HETERO_UTILS);

	for(i = 0; i < width_a; i++)
	{
		cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in1_ports[i]);

		/* create a net in the parent cell that has a driver of input_1 and a driven
		 * of port in 1 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in1_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_1[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}
	for(i = 0; i < width_b; i++)
	{
		cells_in2_ports[i] = oEgu_add_a_cell_port_defined_by_user("in2", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in2_ports[i]);

		/* create a net in the parent cell that has a driver of input_2 and a driven
		 * of port in 2 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in2_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_2[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}

	for(i = 0; i < width; i++)
	{
		cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_out_ports[i]);

		/* create a net in the parent cell where the driver is the internal output from the skeleton
		 * and the driven is the port */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_out_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(parent_cell, 
																			temp_sig);
		/* add the driven portion of the net */
		oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(new_net, output[i]);
	}

	/* add the skeleton to the cell */
	oEgu_add_a_cell_to_a_cell(parent_cell, skeleton_cell);

	ou_free(cells_in1_ports);
	ou_free(cells_in2_ports);
	ou_free(cells_out_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_build_skeleton_for_shift)
 *-------------------------------------------------------------------------------------------*/
void ohu_build_skeleton_for_shift (cell_t *parent_cell, 
								net_pointer_t **input_1,
								int width_a, 
								net_pointer_t **output,
								int width,
								short LEFT_OR_RIGHT,
								int shift_size,
								int unique_id)
{
	int i;
	cell_t* skeleton_cell;
	internal_signal_t *temp_sig;
	cell_ports_t **cells_out_ports = NULL;
	cell_ports_t **cells_in1_ports = NULL;
	cell_nets_t *new_net;

	/* define the lpm inside the cell */
	skeleton_cell = oEgu_add_generated_cell(ocdu_generate_unique_name("H_SKEL_U", unique_id));

	/* identify this cell as a hetero cell */
	if (LEFT_OR_RIGHT == MN_SHIFT_LEFT)
	{
		oEgu_add_macro_cell_info_for_shift(skeleton_cell, width_a, width, MN_SHIFT_LEFT, shift_size);
	}
	else
	{
		oEgu_add_macro_cell_info_for_shift(skeleton_cell, width_a, width, MN_SHIFT_RIGHT, shift_size);
	}

	/* define the adder unit and hookup the nets */
	cells_out_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width, HETS_HETERO_UTILS);
	cells_in1_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_a, HETS_HETERO_UTILS);

	for(i = 0; i < width_a; i++)
	{
		cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in1_ports[i]);

		/* create a net in the parent cell that has a driver of input_1 and a driven
		 * of port in 1 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in1_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_1[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}

	for(i = 0; i < width; i++)
	{
		cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_out_ports[i]);

		/* create a net in the parent cell where the driver is the internal output from the skeleton
		 * and the driven is the port */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_out_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(parent_cell, 
																			temp_sig);
		/* add the driven portion of the net */
		oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(new_net, output[i]);
	}

	/* add the skeleton to the cell */
	oEgu_add_a_cell_to_a_cell(parent_cell, skeleton_cell);

	ou_free(cells_in1_ports);
	ou_free(cells_out_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_add_mult_node_to_list)
 * 	This adds multipliers to the global list of multipliers.
 *-------------------------------------------------------------------------------------------*/
void ohu_add_mult_node_to_list (node_t *mult_node) 
{
	assert(mult_node != NULL);

	/* add a spot in the list for the next element */
	mult_list = (node_t**)ou_realloc(mult_list, sizeof(node_t*)*(num_mult_list + 1), HETS_HETERO_UTILS);

	/* store the multiplier */
	mult_list[num_mult_list] = mult_node;
	mult_node->n_t.hetero_node.index_for_global_list = num_mult_list;

	/* record the addition of the multiplier */
	num_mult_list++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_build_skeleton_for_three_ported)
 *-------------------------------------------------------------------------------------------*/
void ohu_build_skeleton_for_three_ported (cell_t *parent_cell, 
								net_pointer_t **input_1,
								int width_a, 
								net_pointer_t **input_2,
								int width_b, 
								net_pointer_t **input_3,
								int width_c, 
								net_pointer_t **output,
								int width,
								int unique_id,
								short macro_type,
								int num_input_ports,
								int num_output_ports)
{
	int i;
	cell_t* skeleton_cell;
	internal_signal_t *temp_sig;
	cell_ports_t **cells_out_ports = NULL;
	cell_ports_t **cells_in1_ports = NULL;
	cell_ports_t **cells_in2_ports = NULL;
	cell_ports_t **cells_in3_ports = NULL;
	cell_nets_t *new_net;

	/* define the lpm inside the cell */
	skeleton_cell = oEgu_add_generated_cell(ocdu_generate_unique_name("H_SKEL_U", unique_id));

	oEgu_add_macro_cell_info(skeleton_cell, width_a, width_b, width_c, width, macro_type, num_input_ports, num_output_ports);

	/* define the adder unit and hookup the nets */
	cells_out_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width, HETS_HETERO_UTILS);
	cells_in1_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_a, HETS_HETERO_UTILS);
	cells_in2_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_b, HETS_HETERO_UTILS);
	cells_in3_ports = (cell_ports_t **)ou_malloc(sizeof(cell_ports_t*)*width_c, HETS_HETERO_UTILS);

	for(i = 0; i < width_a; i++)
	{
		cells_in1_ports[i] = oEgu_add_a_cell_port_defined_by_user("in1", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in1_ports[i]);

		/* create a net in the parent cell that has a driver of input_1 and a driven
		 * of port in 1 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in1_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_1[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}
	for(i = 0; i < width_b; i++)
	{
		cells_in2_ports[i] = oEgu_add_a_cell_port_defined_by_user("in2", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in2_ports[i]);

		/* create a net in the parent cell that has a driver of input_2 and a driven
		 * of port in 2 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in2_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_2[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}
	for(i = 0; i < width_c; i++)
	{
		cells_in3_ports[i] = oEgu_add_a_cell_port_defined_by_user("in3", i, IN_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_in3_ports[i]);

		/* create a net in the parent cell that has a driver of input_3 and a driven
		 * of port in 3 */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_in3_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(parent_cell, 
																				input_3[i]);
		/* add the driven portion of the net */
		oEgu_add_a_internal_DRIVEN_to_a_cell_net(parent_cell, new_net, temp_sig);
	}

	for(i = 0; i < width; i++)
	{
		cells_out_ports[i] = oEgu_add_a_cell_port_defined_by_user("out", i, OUT_PORT);
		oEgu_add_a_port_to_a_cell(skeleton_cell, cells_out_ports[i]);

		/* create a net in the parent cell where the driver is the internal output from the skeleton
		 * and the driven is the port */
		temp_sig = oEgu_add_an_internal_signal_of_a_user_created_cell(cells_out_ports[i], 
																	skeleton_cell);
		/* create the net with the port driver */
		new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(parent_cell, 
																			temp_sig);
		/* add the driven portion of the net */
		oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(new_net, output[i]);
	}

	/* add the skeleton to the cell */
	oEgu_add_a_cell_to_a_cell(parent_cell, skeleton_cell);

	ou_free(cells_in1_ports);
	ou_free(cells_in2_ports);
	ou_free(cells_in3_ports);
	ou_free(cells_out_ports);
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_multiplier_optimization)
 * 	Optimizations include
 * 		- high-order 0 constants allow shrinking
 * 		- constant inputs need to be identified
 *-------------------------------------------------------------------------------------------*/
void ohu_multiplier_optimization () 
{
	int i;

	for (i = 0; i < num_mult_list; i++)
	{
		if (mult_list[i] == NULL)
		{
			continue;
		}

		assert (mult_list[i]->n_t.hetero_node.hetero_node_type == MN_MULT);

		/* do the zero MSB check so that we can potentially shrink the input width */
		if (optimization_on_off[OPT_MULT_MSB_SHRINK] == TRUE)
		{
			ohu_check_mult_for_high_bit_zero_constants(mult_list[i]);
		}
		if (optimization_on_off[OPT_MULT_CONSTANTS] == TRUE)
		{
			ohu_check_mult_for_constant_input(mult_list[i]);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_mult_for_constant_input)
 *-------------------------------------------------------------------------------------------*/
void ohu_check_mult_for_constant_input (node_t* current_mult) 
{
	int j;
	int width_a;
	int width_b;
	short A_port_constant = TRUE;
	short B_port_constant = TRUE;


	width_a = current_mult->n_t.hetero_node.width_a;
	width_b = current_mult->n_t.hetero_node.width_b;

	/* go through the A port looking for constants */
	for (j = 0; j < width_a; j++)
	{
		if (!((current_mult->input_pins[j]->input_propogation_value_x_0_1 == ZERO) ||
			(current_mult->input_pins[j]->input_propogation_value_x_0_1 == ONE)))
		{
			/* if there is no constant here, then we have found that this port is not all constants.  EXIT */
			A_port_constant = FALSE;
			break;
		}
	}

	/* now do the B port */
	for (j = width_a; j < width_a+width_b; j++)
	{
		if (!((current_mult->input_pins[j]->input_propogation_value_x_0_1 == ZERO) ||
			(current_mult->input_pins[j]->input_propogation_value_x_0_1 == ONE)))
		{
			/* if there is no constant here, then we have found that this port is not all constants.  EXIT */
			B_port_constant = FALSE;
			break;
		}
	}

	/* record if one of the ports was constant */
	current_mult->n_t.hetero_node.constant_portB = B_port_constant;
	current_mult->n_t.hetero_node.constant_portA = A_port_constant;
	
	D0(
	if (B_port_constant == TRUE) 
	{
		fprintf(log_file, "node %s has constant portB\n", current_mult->unique_name);
	}
	if (A_port_constant == TRUE)
	{
		fprintf(log_file, "node %s has constant portA\n", current_mult->unique_name);
	});
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_mult_for_high_bit_zero_constants)
 *-------------------------------------------------------------------------------------------*/
void ohu_check_mult_for_high_bit_zero_constants (node_t* current_mult) 
{
	int i, j;
	int new_width_a;
	int new_width_b;
	int width_a;
	int width_b;
	int temp_array_index;
	int index;

	width_a = new_width_a = current_mult->n_t.hetero_node.width_a;
	width_b = new_width_b = current_mult->n_t.hetero_node.width_b;

	/* go from the MSBit down exiting if the line is not a constant.  Essentially, any value that is = 0 shrinks the size
	 * of the multiplier.  This is first done on the A port */
	for (j = width_a - 1; j >= 0; j--)
	{
		if (current_mult->input_pins[j]->input_propogation_value_x_0_1 == ZERO)
		{
			/* IF - the propogation point is zero, then record that the a width should be reduced by one more */
			new_width_a--;
		}
		else
		{
			break;
		}
	}
	/* do the same for the B port */
	for (j = width_a + width_b - 1; j >= width_a; j--)
	{
		if (current_mult->input_pins[j]->input_propogation_value_x_0_1 == ZERO)
		{
			/* IF - the propogation point is zero, then record that the a width should be reduced by one more */
			new_width_b--;
		}
		else
		{
			break;
		}
	}

	if (width_a != new_width_a) 
	{
		/* IF - there is a change in widths, update the circuit.  Note we don't change the result */
		if (new_width_a == 0)
		{
			/* CORNER CASE - when multiplied by zero */
			current_mult->n_t.hetero_node.width_a = 1;
			new_width_a = 1;
			/* create the output net */
			temp_array_index = onu_add_output_pointer_to_node(gnd_node, current_mult, 0, 0);
			/* create the input net */
			onu_set_input_pointer_to_node(current_mult, gnd_node, 0, 0, temp_array_index);
		}
		else
		{
			current_mult->n_t.hetero_node.width_a = new_width_a;
		}

		for (j = new_width_a; j < width_a; j++)
		{
			/* delete the reference from the A port */
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_mult->input_pins[j]), 
												onu_get_input_pins_related_output_port(current_mult->input_pins[j]),
												onu_get_input_pins_related_output_port_array_index(current_mult->input_pins[j]));
		}

		/* need to move all the B pins to there new spots. Since width_a is now smaller */
		for (j = new_width_a; j < new_width_a + width_b; j++)
		{
			index = j - new_width_a;
			onu_remap_input_port(current_mult, current_mult, j, width_a + index);
		}
	}

	if (width_b != new_width_b)
	{
		/* IF - there is a change in widths, update the circuit.  Note we don't change the  */
		if (new_width_b == 0)
		{
			/* CORNER CASE - when multiplied by zero */
			current_mult->n_t.hetero_node.width_b = 1;
			new_width_b = 1;
			/* create the output net */
			temp_array_index = onu_add_output_pointer_to_node(gnd_node, current_mult, 0, new_width_a);
			/* create the input net */
			onu_set_input_pointer_to_node(current_mult, gnd_node, new_width_a, 0, temp_array_index);
		}
		else
		{
			current_mult->n_t.hetero_node.width_b = new_width_b;
		}

		/* no need to remap the ports if changed since these are high order zero bits */

		for (j = new_width_a + new_width_b; j < new_width_a + width_b; j++)
		{
			/* delete the reference from the B port */
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_mult->input_pins[j]), 
												onu_get_input_pins_related_output_port(current_mult->input_pins[j]),
												onu_get_input_pins_related_output_port_array_index(current_mult->input_pins[j]));

		}
	}

	/* update the size of the input ports now that we have made them smaller */
	onu_update_size_of_input_ports(current_mult, new_width_a + new_width_b);
	current_mult->input_ports[0]->width = new_width_a;
	current_mult->input_ports[1]->width = new_width_b;

	/* now update the size of the output */
	if (new_width_a + new_width_b < current_mult->n_t.hetero_node.width)
	{
		int new_width = new_width_a + new_width_b;
		int width = current_mult->n_t.hetero_node.width;
		int temp_array_index;

		/* IF - smaller then shrink the output size */ 
		
		/* delete the reference the ourput pins and set them to zero */
		for (i = new_width; i < width; i++)
		{
			for (j = 0; j < onu_get_output_pins_related_num_level_2(current_mult->output_pins[i]); j++)
			{
				/* create the output net */
				temp_array_index = onu_add_output_pointer_to_node(gnd_node, onu_get_output_pins_node(current_mult->output_pins[i], j), 0, onu_get_output_pins_related_output_port(current_mult->output_pins[i], j));
				/* create the input net */
				onu_set_input_pointer_to_node(onu_get_output_pins_node(current_mult->output_pins[i], j), gnd_node, onu_get_output_pins_related_output_port(current_mult->output_pins[i], j), 0, temp_array_index);
			}
		}
		
		current_mult->n_t.hetero_node.width = new_width;
		onu_update_size_of_output_ports(current_mult, new_width);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_add_add_sub_node_to_list)
 *-------------------------------------------------------------------------------------------*/
void ohu_add_add_sub_node_to_list (node_t *add_sub_node) 
{
	assert(add_sub_node != NULL);

	/* add a spot in the list for the next element */
	add_sub_list = (node_t**)ou_realloc(add_sub_list, sizeof(node_t*)*(num_add_sub_list + 1), HETS_HETERO_UTILS);

	/* store the adder */
	add_sub_list[num_add_sub_list] = add_sub_node;
	add_sub_node->n_t.hetero_node.index_for_global_list = num_add_sub_list;

	/* record the addition of the adder */
	num_add_sub_list++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_add_sub_optimization)
 * 	Optimizations include:
 * 		- determine if adder has low order 0's 
 * 		- check if adder is in a counter situation
 *
 *-------------------------------------------------------------------------------------------*/
void ohu_add_sub_optimization () 
{
	int i;
	node_t* is_add_sub_still_existing_after_low_zeros;
	node_t* is_add_sub_still_existing_after_counter_check = NULL;

	for (i = 0; i < num_add_sub_list; i++)
	{
		if (add_sub_list[i] == NULL)
		{
			continue;
		}

		assert ((add_sub_list[i]->n_t.hetero_node.hetero_node_type == MN_ADD) 
			|| (add_sub_list[i]->n_t.hetero_node.hetero_node_type == MN_SUB));

		/* do the zero MSB check so that we can potentially shrink the input width */
		if ((optimization_on_off[OPT_ADD_LSB_SHRINK] == TRUE) && (add_sub_list[i] != NULL))
		{
			is_add_sub_still_existing_after_low_zeros = ohu_check_add_for_low_bit_zero_constants(add_sub_list[i]);
		}
		
#if 0
		/* check if this adder is a counter */
		if (add_sub_list[i] != NULL)
		{
			NULL;
// problem!!	is_add_sub_still_existing_after_counter_check = ohu_check_add_as_counter(add_sub_list[i]);
		}
#endif

		if ((is_add_sub_still_existing_after_low_zeros == NULL) || 
		    (is_add_sub_still_existing_after_counter_check == NULL))
		{
			add_sub_list[i] = NULL;
		}
	}

}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_add_for_low_bit_zero_constants)
 *-------------------------------------------------------------------------------------------*/
node_t *ohu_check_add_for_low_bit_zero_constants (node_t* current_add_sub) 
{
	int j, k;
	int new_width_a;
	int new_width_b;
	int width_a;
	int width_b;
	int dif_width_a;
	int dif_width_b;
	int index;

	width_a = new_width_a = current_add_sub->n_t.hetero_node.width_a;
	width_b = new_width_b = current_add_sub->n_t.hetero_node.width_b;

	/* Check if (in order) the least significant bits of an ADDER or SUBER are 0 since these can be replaced
	 * with wires */
	if (current_add_sub->n_t.hetero_node.hetero_node_type == MN_ADD)
	{
		/* IF - Only add allows the value to pass through for the high order bits */
		for (j = 0; j < width_a; j++)
		{
			if (current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO)
			{
				/* IF - the propogation point is zero, then record that the a width should be reduced by one more */
				new_width_a--;
			}
			else
			{
				break;
			}
		}
	}
	/* do the same for the B port.  In the case of subtractors only do it for the B port */
	for (j = width_a; j < width_a + width_b; j++)
	{
		if (current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO)
		{
			/* IF - the propogation point is zero, then record that the a width should be reduced by one more */
			new_width_b--;
		}
		else
		{
			break;
		}
	}

	/* claculate the differecnes */
	dif_width_a = width_a - new_width_a;
	dif_width_b = width_b - new_width_b;

	if ((width_a != new_width_a) || (width_b != new_width_b))
	{
		D0(fprintf(log_file, "There is a 0 constant into the adder:%s, so eliminating some LSBits\n", current_add_sub->unique_name););

		/* IF - both widths have changed, it means that we have 2 constants and we should by pass the larger one */
		if (dif_width_a >= dif_width_b)
		{
			/* IF - port A has larger change so let B bypass */
			new_width_b = width_b - dif_width_a;
			dif_width_b = dif_width_a;

			for (j = 0; j < dif_width_a; j++)
			{
				/* set up the index to access the LSBits of B */
				index = width_a + j;
	
				/* now make the B port value be passed through */
				onu_bypass_a_node(current_add_sub, index, j);

				/* delete the reference from the A port */
				onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_add_sub->input_pins[j]), 
													onu_get_input_pins_related_output_port(current_add_sub->input_pins[j]), 
													onu_get_input_pins_related_output_port_array_index(current_add_sub->input_pins[j]));
			}
		}
		else
		{
			/* ELSE - port B has larger change so let A bypass */
			new_width_a = width_a - dif_width_b;
			dif_width_a = dif_width_b;

			for (j = 0; j < dif_width_a; j++)
			{
				/* set up the index to access the LSBits of B */
				index = width_a + j;
				
				/* now make the B port value be passed through */
				onu_bypass_a_node(current_add_sub, j, j);

				/* delete the reference from the B port */
				onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_add_sub->input_pins[index]), 
													onu_get_input_pins_related_output_port(current_add_sub->input_pins[index]), 
													onu_get_input_pins_related_output_port_array_index(current_add_sub->input_pins[index]));
			}
		}

		/* move all the ports that are needed in the adder to their new positions, and update the width settings */
		current_add_sub->n_t.hetero_node.width_a = new_width_a;
		current_add_sub->n_t.hetero_node.width_b = new_width_b;
	
		/* need to move all the A pins and B pins since the LSBits have now been moved */
		for (j = 0; j < new_width_a; j++)
		{
			index = (dif_width_a) + j;
			onu_remap_input_port(current_add_sub, current_add_sub, j, index);
		}
		for (j = new_width_a; j < new_width_a + new_width_b; j++)
		{
			index = width_a + (dif_width_a) + (j-new_width_a);
			onu_remap_input_port(current_add_sub, current_add_sub, j, index);
		}
	
		/* update the size of the input ports now that we have made them smaller */
		onu_update_size_of_input_ports(current_add_sub, new_width_a + new_width_b);
	
		/* similarly update the output pins to reflect the change */
		for (j = 0; j < current_add_sub->num_output_pins - dif_width_a; j++)
		{
			index = (dif_width_a) + j;
			if (j < dif_width_a-1)
			{
				/* free the second level of output_pins since this info has been copied */
				ou_free(current_add_sub->output_pins[j]);
			}
	
			/* now copy over all the remaining spots */
			current_add_sub->output_pins[j] = current_add_sub->output_pins[index];

			/* Update the to_node with the new input_index */
			for (k = 0; k < onu_get_output_pins_related_num_level_2(current_add_sub->output_pins[index]); k++)
			{
				assert(current_add_sub->output_pins[index]->output_nodes[k]->input_pins[onu_get_output_pins_related_output_port(current_add_sub->output_pins[index], k)]->input_node == current_add_sub);
				assert(current_add_sub->output_pins[index]->output_nodes[k]->input_pins[onu_get_output_pins_related_output_port(current_add_sub->output_pins[index], k)]->input_pins_related_output_port == index);
				assert(current_add_sub->output_pins[index]->output_nodes[k]->input_pins[onu_get_output_pins_related_output_port(current_add_sub->output_pins[index], k)]->input_pins_related_output_port_index == k);
				current_add_sub->output_pins[index]->output_nodes[k]->input_pins[onu_get_output_pins_related_output_port(current_add_sub->output_pins[index], k)]->input_pins_related_output_port = j;
			}
		}
	
		current_add_sub->n_t.hetero_node.width = current_add_sub->num_output_pins - dif_width_a;

		/* update the size of the output ports now that we have made them smaller */
		onu_update_size_of_output_ports(current_add_sub, current_add_sub->num_output_pins - dif_width_a);

		if ((current_add_sub->num_output_pins == 0) ||
			((new_width_a == 0) && (new_width_b == 0)))
		{
			/* IF - any of these are zero, then we don't need the adder any more */

			D0(fprintf(log_file, "REMOVING node:%s since one is zero (new_width_a:%d new_width_b:%d, width:%d)\n", 
						current_add_sub->unique_name,
						new_width_a,
						new_width_b,
						current_add_sub->num_output_pins - dif_width_a););

			onu_free_node(current_add_sub); 
			return NULL;
		}
		else if ((new_width_a == 0) || (new_width_b == 0))
		{
			/* ELSE IF - A or B port is 0 then we can convert this to a buffer since one of the ports can gor straight through */
			node_t *created_node;
			int width = new_width_a > new_width_b ? new_width_a : new_width_b;

			/* create a buffer */
			created_node = onacu_create_1inport_1outport_macro_node ("ADD_BUF", width, width, MN_BUF);

			/* remap the outputs and inputs of the current add suv to a buffer */
		    for(j = 0; j < width; j++)
			{
				/* Joining the inputs to the input 1 of that gate */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(current_add_sub->input_pins[j]), 
														onu_get_input_pins_related_output_port(current_add_sub->input_pins[j]),
														current_add_sub, 
														j, 
														created_node, 
														j);

				/* joining each of the outputs */
				onu_copy_output_port(created_node, current_add_sub, j, j);
			}

			onu_free_node(current_add_sub);
			return NULL;
		}
	}

	return current_add_sub;
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_add_as_counter)
 * 	Condition for a counter is that the input and output are both the same register for
 * 	all inputs and outputs, and one of the ports has constant 1 coming in.
 *-------------------------------------------------------------------------------------------*/
node_t* ohu_check_add_as_counter(node_t* current_add_sub) 
{
	int j;
	int width_a;
	int width_b;
	int width;
	short port_A_is_type_constant = FALSE;
	short port_B_is_type_constant = FALSE;
	short port_A_is_type_ff = FALSE;
	short port_B_is_type_ff = FALSE;
	node_t **register_list;
	node_t *reset_signal = NULL;
	int reset_related_pin = -1;
	int mux_or_input_index;
	int mux_and_input_index;
	int mux_and_opposite_input_index;
	node_t *return_signal = NULL;
	node_t *clock_signal = NULL;
	int new_width;
	int temp_array_index;

	if (current_add_sub == NULL)
	{
		return NULL;
	}

	width_a = current_add_sub->n_t.hetero_node.width_a;
	width_b = current_add_sub->n_t.hetero_node.width_b;
	width = current_add_sub->n_t.hetero_node.width;
	new_width = width;

	register_list = (node_t**)ou_malloc(sizeof(node_t*)*width, HETS_HETERO_UTILS);

	/* check the output ports to verify single output to a register fed by a mux */
	for (j = 0; j < width; j++)
	{
		if (onu_get_output_pins_related_num_level_2(current_add_sub->output_pins[j]) < 1)
		{
			break;
		}

		node_t *temp_current_node = onu_get_output_pins_node(current_add_sub->output_pins[j], 0);
		/* check if first level is an AND, second is an OR, and third is a FF */
		/* also possible that just FF */

		if ((onu_get_output_pins_related_num_level_2(current_add_sub->output_pins[j]) == 1) && // check if the output of the adder is only to one path
			(temp_current_node->node_type == LIBRARY_NODE) && // check if the output is a gate
			(temp_current_node->n_t.library_node.cell_index == and_cell_lib_index) && // check if the gate is an AND
			(onu_get_output_pins_related_num_level_2(temp_current_node->output_pins[0]) == 1) && // check that the AND only has one output
			(onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->node_type == LIBRARY_NODE) && // check if the next output is a geat
			(onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->n_t.library_node.cell_index == or_cell_lib_index) && // check if that gate is an OR
			(onu_get_output_pins_related_num_level_2(onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->output_pins[0]) == 1) && // check that the OR only has one output
			(onu_get_output_pins_node(onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->output_pins[0], 0)->node_type == LIBRARY_NODE_FF)) // check that the output is a flip flop
		{
			/* IF - and, or, ff then record ff */
			register_list[j] = onu_get_output_pins_node(onu_get_output_pins_node(temp_current_node->output_pins[0],0)->output_pins[0], 0);

			/* We now need to determine if the signal that is being muxed together with our signal is actually a reset signal.  This would mean,
			 * the counter would use the MUX signal as a reset signal */

			/* Find the input index based on this nodes input index to the OR, but want the opposite input */
			mux_or_input_index = (onu_get_output_pins_related_output_port(temp_current_node->output_pins[0], 0) ^ 1) & 1;
			/* the input pin on the AND will be the same as the input index for the original signal */
			mux_and_input_index = onu_get_output_pins_related_output_port(current_add_sub->output_pins[j], 0);

			if (onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->input_pins[mux_or_input_index]->input_node->input_pins[mux_and_input_index]->input_propogation_value_x_0_1 == ZERO)
			{
				/* IF - the other input to the AND is zero as in a reset signal */
				mux_and_opposite_input_index = (mux_and_input_index ^ 1) & 1;
				if ((reset_signal == NULL) && (j == 0))
				{
					/* IF - this is the first time through then create the reset signal */
					reset_signal = onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->input_pins[mux_or_input_index]->input_node->input_pins[mux_and_opposite_input_index]->input_node;
					reset_related_pin = mux_and_opposite_input_index;
					new_width = width * 2 + 1;
				}
				else if (reset_signal != onu_get_output_pins_node(temp_current_node->output_pins[0], 0)->input_pins[mux_or_input_index]->input_node->input_pins[mux_and_opposite_input_index]->input_node) 
				{
					/* ELSE IF - another signal has a different reset signal then this is not the type of counter */
					return_signal = current_add_sub;
					break;
				}
			}
		}
		else if ((onu_get_output_pins_related_num_level_2(current_add_sub->output_pins[j]) == 1) &&
				            (temp_current_node->node_type == LIBRARY_NODE_FF))
		{
			/* IF - the first level is a FF then record */
			register_list[j] = temp_current_node;
		}
		else
		{
			/* ELSE - this does not satisfy counter situation */
			return_signal = current_add_sub;
			break;
		}
		
		/* also need to verify that the clock signal is all the same */
		if (j == 0)
		{
			/* IF - this is the first run then record the clock on input 1 */
			clock_signal = register_list[j]->input_pins[1]->input_node;
		}
		else if (clock_signal != register_list[j]->input_pins[1]->input_node)
		{
			/* ELSE IF - the clock signal is not the same for two signals then exit */
			return_signal = current_add_sub;
			break;
		}
	}

	if (return_signal == NULL)
	{
		/* check the A port to see if it is either the constant, or the ff */
		for (j = 0; j < width_a; j++)
		{
			node_t *temp_current_node = onu_get_input_pins_node(current_add_sub->input_pins[j]);

			if (j == 0)
			{
				if ((current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ONE) ||
						(current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO)) 
				{
					/* ELSE IF - the first value is a constant the constant mode */
					port_A_is_type_constant = TRUE;
				}
				else if (temp_current_node->node_type == LIBRARY_NODE_FF)
				{
					/* IF - the first value is a ff then go in ff mode */
					port_A_is_type_ff = TRUE;
				}
				else
				{
					/* ELSE - definitely not a counter */
					return_signal = current_add_sub;
					break;
				}
			}
	
			if ((port_A_is_type_ff == TRUE) &&
				(temp_current_node->node_type == LIBRARY_NODE_FF) &&
				(temp_current_node == register_list[j]))
			{
				/* IF - this is all true then the current j satisfies the ff mode */
			   	continue;	
			}
			else if ((port_A_is_type_constant == TRUE) &&
					 ((((j == 0) && ((current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ONE))) || (current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO))))
			{
				/* ELSE IF - this is a constant and j is the correct value then continue */
				continue;
			}
			else
			{
				/* ELSE - this is not a counter */
				return_signal = current_add_sub;
				break;
			}
		}
	}
	if (return_signal == NULL)
	{
		/* check the B port to see if it is either the constant, or the ff */
		for (j = width_a; j < width_a+width_b; j++)
		{
			node_t *temp_current_node = onu_get_input_pins_node(current_add_sub->input_pins[j]);

			if (j == width_a)
			{
				if ((current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ONE) ||
						(current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO)) 
				{
					/* ELSE IF - the first value is a constant the constant mode */
					port_B_is_type_constant = TRUE;
				}
				else if (temp_current_node->node_type == LIBRARY_NODE_FF)
				{
					/* IF - the first value is a ff then go in ff mode */
					port_B_is_type_ff = TRUE;
				}
				
				else
				{
					/* ELSE - definitely not a counter */
					return_signal = current_add_sub;
					break;
				}
			}
	
			if ((port_B_is_type_ff == TRUE) &&
				(temp_current_node->node_type == LIBRARY_NODE_FF) &&
				(temp_current_node == register_list[j]))
			{
				/* IF - this is all true then the current j satisfies the ff mode */
			   	continue;	
			}
			else if ((port_B_is_type_constant == TRUE) &&
					 ((((j == width_a) && ((current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ONE))) || (current_add_sub->input_pins[j]->input_propogation_value_x_0_1 == ZERO))))
			{
				/* ELSE IF - this is a constant and j is the correct value then continue */
				continue;
			}
			else
			{
				/* ELSE - this is not a counter */
				return_signal = current_add_sub;
				break;
			}
		}
	}

	if (return_signal == NULL)
	{
		node_t *new_counter_node;
		
		/* create a super node that encapsulates the registers and the counter */
		if (reset_signal != NULL)
		{
			/* IF - this is a mux based counter super node then we have inputs */
			new_counter_node = onu_allocate_skeleton_node(current_add_sub->unique_name, width, 2, 2, 1);

			/* hookup the reset signal */
			temp_array_index = onu_add_output_pointer_to_node(reset_signal, new_counter_node, reset_related_pin, 1);
			onu_set_input_pointer_to_node(new_counter_node, reset_signal, 1, reset_related_pin, temp_array_index);
		}
		else
		{
			/* ELSE - this is a ff based counter, no inputs */
			new_counter_node = onu_allocate_skeleton_node(current_add_sub->unique_name, width, 1, 1, 1);
		}

		/* initialize more parts of the node */
		new_counter_node->node_type = MACRO_NODE;
		new_counter_node->n_t.hetero_node.hetero_node_type = MN_COUNTER;
		new_counter_node->n_t.hetero_node.width = width;
		new_counter_node->n_t.hetero_node.counter_dir = current_add_sub->n_t.hetero_node.hetero_node_type;

		/* hookup the clock signal */
		temp_array_index = onu_add_output_pointer_to_node(clock_signal, new_counter_node, 0, 0);
		onu_set_input_pointer_to_node(new_counter_node, clock_signal, 0, 0, temp_array_index);

		/* copy the output signals of the flip flop into the new super node and update, but skip the outputs to the adder we are changing */
		for (j = 0; j < width; j++)
		{
			onu_copy_output_port(new_counter_node, register_list[j], j, 0);
		}

		for (j = 0; j < width; j++)
		{
			/* disconnect inputs */
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(register_list[j]->input_pins[0]), 
												onu_get_input_pins_related_output_port(register_list[j]->input_pins[0]), 
												onu_get_input_pins_related_output_port_array_index(register_list[j]->input_pins[0]));
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(register_list[j]->input_pins[1]), 
												onu_get_input_pins_related_output_port(register_list[j]->input_pins[1]), 
												onu_get_input_pins_related_output_port_array_index(register_list[j]->input_pins[1]));

			/* remove the FF gate */
			onu_free_node(register_list[j]);
		}

		/* delete the mux network */
		if (reset_signal != NULL)
		{
			/* IF - this has a mux network */
			node_t *OR_gate;
			node_t *AND_gate_directly_connected;
			node_t *other_AND_gate;
			int mux_or_opposite_input_index;
			
			for (j = 0; j < width; j++)
			{
				AND_gate_directly_connected = onu_get_output_pins_node(current_add_sub->output_pins[j], 0);
				OR_gate = onu_get_output_pins_node(AND_gate_directly_connected->output_pins[0], 0);

				/* Find the input index based on this nodes input index to the OR, but want the opposite input */
				mux_or_input_index = onu_get_output_pins_related_output_port(onu_get_output_pins_node(current_add_sub->output_pins[j], 0)->output_pins[0], 0);
				/* this determines the input gate of the other OR into the MUX or */
				mux_or_opposite_input_index = (mux_or_input_index ^ 1) & 1;
				/* the input pin on the AND will be the same as the input index for the original signal */
				mux_and_input_index = onu_get_output_pins_related_output_port(current_add_sub->output_pins[j], 0);
				/* this determines the input gate of the other AND into the MUX or */
				mux_and_opposite_input_index = (mux_and_input_index ^ 1) & 1;

				other_AND_gate = onu_get_input_pins_node(OR_gate->input_pins[mux_or_opposite_input_index]);

				/* delete the AND gates control signal */
				onu_remove_output_pointer_to_node(onu_get_input_pins_node(AND_gate_directly_connected->input_pins[mux_and_opposite_input_index]), 
													onu_get_input_pins_related_output_port(AND_gate_directly_connected->input_pins[mux_and_opposite_input_index]), 
													onu_get_input_pins_related_output_port_array_index(AND_gate_directly_connected->input_pins[mux_and_opposite_input_index]));
				/* remove the AND gate */
				onu_free_node(AND_gate_directly_connected);

				/* delete the inputs to the opposite AND */
				onu_remove_output_pointer_to_node(onu_get_input_pins_node(other_AND_gate->input_pins[0]), 
													onu_get_input_pins_related_output_port(other_AND_gate->input_pins[0]), 
													onu_get_input_pins_related_output_port_array_index(other_AND_gate->input_pins[0]));

				onu_remove_output_pointer_to_node(onu_get_input_pins_node(other_AND_gate->input_pins[1]), 
													onu_get_input_pins_related_output_port(other_AND_gate->input_pins[1]), 
													onu_get_input_pins_related_output_port_array_index(other_AND_gate->input_pins[1]));

				/* remove this AND gate */
				onu_free_node(other_AND_gate);

				/* remove the OR gate */
				onu_free_node(OR_gate);
			}
		}
	
		/* Finally, remove the input pins to the adder */
		for (j = 0; j < width_a; j++)
		{
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_add_sub->input_pins[j]), 
												onu_get_input_pins_related_output_port(current_add_sub->input_pins[j]), 
												onu_get_input_pins_related_output_port_array_index(current_add_sub->input_pins[j]));
		}
		for (j = width_a; j < width_a+width_b; j++)
		{
			onu_remove_output_pointer_to_node(onu_get_input_pins_node(current_add_sub->input_pins[j]), 
												onu_get_input_pins_related_output_port(current_add_sub->input_pins[j]), 
												onu_get_input_pins_related_output_port_array_index(current_add_sub->input_pins[j]));
		}
	
		/* now get rid of the add_sub */
		onu_free_node(current_add_sub);
	}

	/* clean up local allocations */
	ou_free(register_list);

	return return_signal;
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_add_case_and_if_node_to_list)
 *-------------------------------------------------------------------------------------------*/
void ohu_add_case_and_if_node_to_list (node_t *case_an_if_node) 
{
	assert(case_an_if_node != NULL);

	/* add a spot in the list for the next element */
	if_and_case_list = (node_t**)ou_realloc(if_and_case_list, sizeof(node_t*)*(num_if_and_case_list + 1), HETS_HETERO_UTILS);

	/* store the case */
	if_and_case_list[num_if_and_case_list] = case_an_if_node;
	case_an_if_node->n_t.hetero_node.index_for_global_list = num_if_and_case_list;

	/* record the addition of the ndoe */
	num_if_and_case_list++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ) ohu_optimize_case_and_if();
 * 	Optimizations include
 * 		- Join together - Looks for outputs of 1 if going into inputs of another means can join
 * 		- Optimize common signals - Looks for common signals in structures and merges
 *-------------------------------------------------------------------------------------------*/
void ohu_optimize_case_and_if() 
{
	int i;
	
	/* go through each element of the list using while loop since the list grows as we eliminate */
	if (optimization_on_off[OPT_COLLAPSE_MULTIPLEXERS] == TRUE)
	{
		i = 0;
		while (i < num_if_and_case_list)
		{
			if (if_and_case_list[i] == NULL)
			{
				i++;
				continue;
			}
	
			if ((if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_IF) || 
					(if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_STATE_CASE) ||
					(if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_CASE))
			{
				ohu_check_to_collapse_ifs(if_and_case_list[i]);
			}
			
			i++;
		}
	}

	/* Do whole thing again since collapsing adds new elements to the list */
	/* don't need to worry about list growing since the new formed common signal ones can't be commonized again */
	if (optimization_on_off[OPT_COMMON_SIG_MULTIPLEXERS] == TRUE)
	{
		for (i = 0; i < num_if_and_case_list; i++)
		{
			if (if_and_case_list[i] == NULL)
			{
				i++;
				continue;
			}
	
			if ((if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_IF) || 
					(if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_STATE_CASE) ||
					(if_and_case_list[i]->n_t.hetero_node.hetero_node_type == MN_CASE))
			{	
				ohu_check_if_for_common_signals(if_and_case_list[i]);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_to_collapse_ifs)
 * 		Checks if outputs of an if go to another if as inputs.  If they do, then we can
 * 		collapse the two into one.  Conditions for this are:  the outputs of 1 particular signal
 * 		(i.e. each of the bits) goes to the same if, the size of the common signal exactly
 * 		matches the output and input width of the two ifs.
 *-------------------------------------------------------------------------------------------*/
void ohu_check_to_collapse_ifs (node_t *case_and_if_node) 
{
	int i, j;
	int analysed_width;
	short first_match;
	node_t *matching_node;
	short found_match;

	short *debug1;
	short *debug2;

	analysed_width = 0;
	first_match = TRUE;
	matching_node = NULL;
	found_match = TRUE;
	/* check if each output exclusively goes to another if structure */
	if (case_and_if_node->num_output_pins == 0)
	{
		/* IF - structure can become unimportant if reset is activated */
		return;
	}
	for (i = 0; i < case_and_if_node->num_output_pins; i++)
	{
		/* check if for each of the outputs we are pointing exlusively to another if/case node */
		if ((case_and_if_node->output_pins[i]->num_output_pins_level_2 == 1) &&
			(first_match == TRUE) && 
			(case_and_if_node->output_pins[i]->output_nodes[0]->node_type == MACRO_NODE) &&
			(	(case_and_if_node->output_pins[i]->output_nodes[0]->n_t.hetero_node.hetero_node_type == MN_IF) ||
				(case_and_if_node->output_pins[i]->output_nodes[0]->n_t.hetero_node.hetero_node_type == MN_STATE_CASE) ||
				(case_and_if_node->output_pins[i]->output_nodes[0]->n_t.hetero_node.hetero_node_type == MN_CASE)))
		{
			/* IF - this is the first match and it points to a IF or CASE node then record */
			first_match = TRUE;
			matching_node = case_and_if_node->output_pins[i]->output_nodes[0];
			analysed_width++;
		}
		else if ((case_and_if_node->output_pins[i]->num_output_pins_level_2 == 1) &&
				 (first_match == FALSE) &&
				 (case_and_if_node->output_pins[i]->output_nodes[0] == matching_node))
		{
			/* ELSE IF - we still are pointing to the same IF or CASE node */
			analysed_width++;
		}
		else
		{
			/* ELSE - this node is not pointing to an IF or CASE node exclusively */
			found_match = FALSE;
			break;
		}
	}

	/* if this node solely connects to another if or case type node. */
	if (found_match == TRUE)
	{
		/* IF - we found a match, then we can collapse */
		int matching_through_condition_x;
		int num_cases_front_node = case_and_if_node->n_t.hetero_node.num_cases;
		int num_cases_next_node = matching_node->n_t.hetero_node.num_cases;
		int width_front_node = case_and_if_node->num_output_pins;
		int width_next_node = matching_node->num_output_pins;
		int new_num_cases = num_cases_front_node + num_cases_next_node - 1;
		int case_spot;
		int index_old;
		int index_new;
		short mapped_once;
		node_t *created_node;
		node_t *and_node;

		assert(analysed_width == width_front_node);

		debug1 = (short*)ou_malloc(sizeof(short)*(num_cases_front_node+num_cases_front_node*width_front_node), HETS_HETERO_UTILS);
		debug2 = (short*)ou_malloc(sizeof(short)*(num_cases_next_node+num_cases_next_node*width_next_node), HETS_HETERO_UTILS);
		for (i = 0; i < num_cases_front_node+num_cases_front_node*width_front_node; i++)
		{
			debug1[i] = FALSE;
		}
		for (i = 0; i <  num_cases_next_node+num_cases_next_node*width_next_node; i++)
		{
			debug2[i] = FALSE;
		}

		/* calculate which condition we are coming in on. calculate by looking at the first input from the front node
		 * and subtracting the number of cases. */
		matching_through_condition_x = case_and_if_node->output_pins[0]->output_pin_related_input_index[0] % num_cases_next_node;

		/* create a new if/case node lets call it MN_CASE.  
		 * number of ports = old_output_cond_ports + old_input_cond_ports-1 + old_output_ports + old_input_ports-1.  
		 * Same width. */
		created_node = onacu_create_case_node("COMBO", 
												width_next_node,
												new_num_cases + (width_next_node * new_num_cases),
												new_num_cases + width_next_node,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_IF;
		created_node->n_t.hetero_node.num_port_widths = new_num_cases + width_next_node;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_HETERO_UTILS);
		created_node->n_t.hetero_node.num_cases = new_num_cases;
		
		mapped_once = FALSE;
		case_spot = 0;
		/* conditions for each of new_width build as own nodes and join to each condition spot.  
		 * Essentially becomes input_condition & output_condition[condition_port_coming_in_to] */
		for (i = 0; i < num_cases_front_node; i++)
		{
			/* join each condition from the front with an AND with the condition we are coming in on */
			and_node = onacu_create_2inport_1outport_macro_node ("AND_IF", 1, 1, 1, MN_AND);

			/* join the old front to pin 1 */
			osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[i]),
																	onu_get_input_pins_related_output_port(case_and_if_node->input_pins[i]),
																	case_and_if_node, 
																	i,
																	and_node,
																	0);
			debug1[i] = TRUE;

			/* join the old next condition to pin 2 of the AND */
			if (mapped_once == FALSE)
			{
				mapped_once = TRUE;
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(matching_node->input_pins[matching_through_condition_x]),
																		onu_get_input_pins_related_output_port(matching_node->input_pins[matching_through_condition_x]),
																		matching_node, 
																		matching_through_condition_x,
																		and_node,
																		1);
			}
			else
			{
				osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
																		onu_get_input_pins_node(matching_node->input_pins[matching_through_condition_x]),
																		onu_get_input_pins_related_output_port(matching_node->input_pins[matching_through_condition_x]),
																		matching_node, 
																		matching_through_condition_x,
																		and_node,
																		1);
			}
			
			debug2[matching_through_condition_x] = TRUE;

			/* now join the and into the created_node in spot case_spot */
			osm_join_gate_nodes(and_node, 0, created_node, case_spot);

			case_spot++;
		}
		/* now put the old cases in their proper spots, skipping the one we've anded */
		for (i = 0; i < num_cases_next_node; i++)
		{
			if (i != matching_through_condition_x)
			{
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(matching_node->input_pins[i]),
																		onu_get_input_pins_related_output_port(matching_node->input_pins[i]),
																		matching_node, 
																		i,
																		created_node,
																		case_spot);
				debug2[i] = TRUE;

				case_spot++;
			}
		}

		assert(case_spot == new_num_cases);

		/* record where we are now in the case */
		created_node->n_t.hetero_node.muxed_input_start_index = new_num_cases;

		for (i = 0; i < width_front_node; i++)
		{
			int current_condition_index = -1;

			for (j = 0; j < num_cases_front_node; j++)
			{
				/* calculate what condition this input goes into in matching_node */
				current_condition_index = ((case_and_if_node->output_pins[i]->output_pin_related_input_index[0] - num_cases_next_node) / num_cases_next_node);

				/* based on that number for each of the cases put that output into its slot */
				index_old = num_cases_front_node+i*num_cases_front_node+j;	
				index_new = new_num_cases+current_condition_index*new_num_cases+j;

				/* map the old inputs into their new spots */
				osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[index_old]),
																		onu_get_input_pins_related_output_port(case_and_if_node->input_pins[index_old]),
																		case_and_if_node, 
																		index_old,
																		created_node,
																		index_new);
				debug1[index_old] = TRUE;
				debug2[case_and_if_node->output_pins[i]->output_pin_related_input_index[0]] = TRUE;
			}
		}
		for (i = 0; i < width_next_node; i++)
		{
			int idx_case_next_node = 0;
			mapped_once = FALSE;

			/* join inputs to new node from old_front node. */
			for (j = 0; j < new_num_cases; j++)
			{
				index_new = new_num_cases+i*new_num_cases+j;

				if (j < num_cases_front_node)
				{
					if (created_node->input_pins[index_new]->input_node == NULL)
					{
						/* ELSE - there is no join point, and we need to use the old next node value */
						index_old = num_cases_next_node+i*num_cases_next_node+matching_through_condition_x;

						if (mapped_once == FALSE)
						{
							mapped_once = TRUE;
							osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(matching_node->input_pins[index_old]),
																					onu_get_input_pins_related_output_port(matching_node->input_pins[index_old]),
																					matching_node, 
																					index_old,
																					created_node,
																					index_new);
						}
						else
						{
							osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
																					onu_get_input_pins_node(matching_node->input_pins[index_old]),
																					onu_get_input_pins_related_output_port(matching_node->input_pins[index_old]),
																					matching_node, 
																					index_old,
																					created_node,
																					index_new);
						}

						debug2[index_old] = TRUE;
					}
				}
				else
				{
					/* ELSE - need to hookup the old case and if node inputs to this newly created node */

					/* calculate index based on skipping over the point where we are merging */
					if (j - num_cases_front_node >= matching_through_condition_x)
					{
						/* IF - we need to skip over the condition which is joined togetehr with the front if node */
						idx_case_next_node = j - num_cases_front_node + 1;
					}
					else
					{
						idx_case_next_node = j - num_cases_front_node;
					}

					index_old = num_cases_next_node+i*num_cases_next_node+idx_case_next_node;
	
					/* map the next inputs into their new spots */
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(matching_node->input_pins[index_old]),
																			onu_get_input_pins_related_output_port(matching_node->input_pins[index_old]),
																			matching_node, 
																			index_old,
																			created_node,
																			index_new);
					debug2[index_old] = TRUE;
				}
			}

			/* join the outputs to new node from old_next */
			onu_copy_output_port(created_node, matching_node, i, i);
		}

		/* eliminate the old if nodes now that we have completely remapped everything.  This also removes them from the global
		 * list for case and if nodes. */

		for (i = 0; i < num_cases_front_node+num_cases_front_node*width_front_node; i++)
		{
			assert (debug1[i] == TRUE);
		}
		for (i = 0; i <  num_cases_next_node+num_cases_next_node*width_next_node; i++)
		{
			assert (debug2[i] == TRUE);
		}

		if (debug1 != NULL)
		{
			ou_free(debug1);
		}
		if (debug2 != NULL)
		{
			ou_free(debug2);
		}

		onu_free_node(matching_node);
		onu_free_node(case_and_if_node);
	}
}

#define two_ints_t struct two_ints_t_t
two_ints_t
{
	int one;
	int two;
};
/*---------------------------------------------------------------------------------------------
 * (function:  ou_look_for_1D_array_sequence_in_3D_list)
---------------------------------------------------------------------------------------------*/
two_ints_t* ou_look_for_1D_array_sequence_in_3D_list(int ***list_3d, int size3d3d, int size3d2d, int **size3d1d, int *list_1d, int size1d)
{
	int i, j, k;
	int oint_id = list_1d[0];
	two_ints_t *two_ints = (two_ints_t*)ou_malloc(sizeof(two_ints_t), HETS_UTILS);
	
	two_ints->one = INIT;
	two_ints->two = INIT;

	for (i = 0; i < size3d3d; i++)
	{
		for (j = 0; j < size3d2d; j++)
		{
			if ((size3d1d[i][j] == size1d) && (j == oint_id))
			{
				for (k = 0; k < size1d; k++)
				{
					if (list_3d[i][j][k] == list_1d[k])
					{
						two_ints->one = i;
					}
				}
				if (two_ints->one != INIT)
				{
					two_ints->two = j;
					return two_ints;
				}
				else
				{
					two_ints->one = INIT;
					two_ints->two = INIT;
				}
			}
		}
	}
	return two_ints;
}

/*---------------------------------------------------------------------------------------------
 * (function: ohu_check_if_for_common_signals)
 * 		Looks through a case/if/decision structure for common inputs which can be collapsed
 * 		together by creating more complex condition logic.  For each common input we save
 * 		an AND and an OR at the cost of creating an OR in the condition logic.
 *-------------------------------------------------------------------------------------------*/
void ohu_check_if_for_common_signals (node_t *case_and_if_node) 
{
	int num_cases = case_and_if_node->n_t.hetero_node.num_cases;
	int width = case_and_if_node->num_output_pins;
	int index_to_start = case_and_if_node->n_t.hetero_node.muxed_input_start_index;
	int i, j, k;
	int ***matches;
	int **size_matches;
	node_t **new_condition_nodes;
	int additional_conditions;
	short *condition_remapped;
	int case_index;
	int old_pin_index;
	int new_pin_index;
	int index_of_condition_port;
	short *debug1;

	debug1 = (short*)ou_malloc(sizeof(short)*(num_cases+num_cases*width), HETS_HETERO_UTILS);
	for (i = 0; i < num_cases+num_cases*width; i++)
	{
		debug1[i] = FALSE;
	}

	/* initialize the base stuff */
	new_condition_nodes = NULL;
	additional_conditions = 0;

	/* initialize a flag list that indicates if a condition signal has been remapped */
	condition_remapped = (short*)ou_malloc(sizeof(short)*num_cases, HETS_HETERO_UTILS);
	for (i = 0; i < num_cases; i++)
	{
		condition_remapped[i] = FALSE;
	}

	/* allocate and initialize a matches list that shows if something is matched and to which port */
	matches = (int***)ou_malloc(sizeof(int**)*width, HETS_HETERO_UTILS);
	size_matches = (int**)ou_malloc(sizeof(int*)*width, HETS_HETERO_UTILS);
	for (i = 0; i < width; i++)
	{
		matches[i] = (int**)ou_malloc(sizeof(int*)*num_cases, HETS_HETERO_UTILS);
		size_matches[i] = (int*)ou_malloc(sizeof(int)*num_cases, HETS_HETERO_UTILS);

		for (j = 0; j < num_cases; j++)
		{
			size_matches[i][j] = 0;
		}
	}

	/* Analyse each of the signals to find matches */
	for (i = 0; i < width; i++)
	{
		for (j = 0; j < num_cases; j++)
		{
			if ((case_and_if_node->input_pins[index_to_start+j]->input_node == null_node) ||
				(size_matches[i][j] > 0))
			{
				/* IF - null node then don;t try to match */
				continue;
			}

			/* compare against other ports */
			for (k = j + 1; k < num_cases; k++)
			{
				if ((case_and_if_node->input_pins[index_to_start+k]->input_node != null_node) && 
					(case_and_if_node->input_pins[index_to_start+j]->input_node == case_and_if_node->input_pins[index_to_start+k]->input_node) &&
					(case_and_if_node->input_pins[index_to_start+j]->input_pins_related_output_port == case_and_if_node->input_pins[index_to_start+k]->input_pins_related_output_port))
				{
					/* IF - we have a match */
					if (size_matches[i][j] == 0)
					{
						/* record a string of alpha's that represent which ports are joined with alpha[j] and alpha[k] */
						matches[i][j] = (int*)ou_malloc(sizeof(int)*2, HETS_HETERO_UTILS);
						matches[i][j][0] = j;
						matches[i][j][1] = k;
						size_matches[i][j] = 2;
					
						/* record in the matched k that it is matched with j */
						matches[i][k] = (int*)ou_malloc(sizeof(int)*1, HETS_HETERO_UTILS);
						matches[i][k][0] = INIT;
						size_matches[i][k] = 1;
					}
					else
					{
						/* add to a string of alpha's that represent which ports are joined where with alpha[k] */
						matches[i][j] = (int*)ou_realloc(matches[i][j], sizeof(int)*(size_matches[i][j]+1), HETS_HETERO_UTILS);
						matches[i][j][size_matches[i][j]] = k;
						size_matches[i][j] ++;
						/* record in the matched k that it is matched with j */
						matches[i][k] = (int*)ou_malloc(sizeof(int)*1, HETS_HETERO_UTILS);
						matches[i][k][0] = INIT;
						size_matches[i][k] = 1;
					}

					/* remove the k input signal since it won't be used anymore */
					onu_remove_output_pointer_to_node(
							onu_get_input_pins_node(case_and_if_node->input_pins[index_to_start+k]),
							onu_get_input_pins_related_output_port(case_and_if_node->input_pins[index_to_start+k]),
							onu_get_input_pins_related_output_port_array_index(case_and_if_node->input_pins[index_to_start+k]));

					debug1[index_to_start+k] = TRUE;
				}
			}

			if (size_matches[i][j] > 1)
			{
				/* IF - we have common inputs, then we can build the condition hardware, and store it in a cache */
				two_ints_t *found_indexes;
				found_indexes = ou_look_for_1D_array_sequence_in_3D_list(matches, width, num_cases, size_matches, matches[i][j], size_matches[i][j]);

		 		if((found_indexes->one == i) && (found_indexes->two == j))
				{
					/* IF - we haven't built a combination like this one yet, then build it */
					int width_or = size_matches[i][j];
					node_t *or_node;

					/* create a joining OR for each of the condition ports */
					or_node = onacu_create_1inport_1outport_macro_node ("OR", width_or, 1, MN_RED_OR);

					/* join each of the conditions with the proper spot */
					for (k = 0; k < width_or; k++)
					{
						index_of_condition_port = matches[i][j][k];
						assert(index_of_condition_port < num_cases);

						if (condition_remapped[index_of_condition_port] == FALSE)
						{
							/* IF - this condition has not been remapped yet */
							condition_remapped[index_of_condition_port] = TRUE;

							/* Remap the input pin to the OR gate */
							osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[index_of_condition_port]), 
																	onu_get_input_pins_related_output_port(case_and_if_node->input_pins[index_of_condition_port]),
																	case_and_if_node, 
																	index_of_condition_port, 
																	or_node, 
																	k);
						}
						else
						{
							/* Map again the input pin to the OR gate */
							osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(
																	onu_get_input_pins_node(case_and_if_node->input_pins[index_of_condition_port]), 
																	onu_get_input_pins_related_output_port(case_and_if_node->input_pins[index_of_condition_port]),
																	case_and_if_node, 
																	index_of_condition_port, 
																	or_node, 
																	k);
						}
						debug1[index_of_condition_port] = TRUE;
					}

					/* record the new condition in a list (to free later) and in the cache */
					new_condition_nodes = (node_t**)ou_realloc(new_condition_nodes, sizeof(node_t*)*(additional_conditions+1), HETS_HETERO_UTILS);
					new_condition_nodes[additional_conditions] = or_node;
					/* record the location of this node by putting an extra spot in the list */
					matches[i][j] = (int*)ou_realloc(matches[i][j], sizeof(int)*(size_matches[i][j]+1), HETS_HETERO_UTILS);
					matches[i][j][size_matches[i][j]] = additional_conditions;

					additional_conditions++;
				}
			}
		}
		index_to_start += num_cases;
	}

	/* Now that we know which additional conditions that there are, we can create the new node */
	if (additional_conditions > 0)
	{
		int new_num_cases = additional_conditions + num_cases;
		node_t *created_node;

		/* create a new if/case node lets call it MN_CASE.  
		 * number of ports = old_output_cond_ports + old_input_cond_ports-1 + old_output_ports + old_input_ports-1.  
		 * Same width. */
		created_node = onacu_create_case_node("COLLAPSE", 
												width,
												new_num_cases + (width * new_num_cases),
												new_num_cases + width,
												1);
		created_node->n_t.hetero_node.hetero_node_type = MN_IF;
		created_node->n_t.hetero_node.num_port_widths = new_num_cases + width;
		created_node->n_t.hetero_node.port_widths = (int*)ou_malloc(sizeof(int)*(created_node->n_t.hetero_node.num_port_widths), HETS_HETERO_UTILS);
		created_node->n_t.hetero_node.num_cases = new_num_cases;

		/* record the mux start index */
		created_node->n_t.hetero_node.muxed_input_start_index = new_num_cases;
	
		for (i = 0; i < new_num_cases; i++)
		{
			if (i < additional_conditions)
			{
				/* IF - we are adding the new conditions */
				osm_join_gate_nodes(new_condition_nodes[i], 0, created_node, i);
			}
			else
			{
				/* ELSE - we are mapping the old conditions */
				old_pin_index = i - additional_conditions;

				if(condition_remapped[old_pin_index] == FALSE)
				{
					/* IF - this port has not been remapped yet then we can remap it */
					condition_remapped[old_pin_index] = TRUE;
	
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[old_pin_index]),
																			onu_get_input_pins_related_output_port(case_and_if_node->input_pins[old_pin_index]),
																			case_and_if_node, 
																			old_pin_index,
																			created_node,
																			i);
				}
				else
				{
					/* ELSE - has been remapped once, so we need to add a new signal to it */
					osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated( onu_get_input_pins_node(case_and_if_node->input_pins[old_pin_index]),
																			onu_get_input_pins_related_output_port(case_and_if_node->input_pins[old_pin_index]),
																			case_and_if_node, 
																			old_pin_index,
																			created_node,
																			i);
				}
				debug1[old_pin_index] = TRUE;
			}
		}

		/* now that the conditions are joined, it's time to join the inputs based on how they are matched up with other inputs */
		for (i = 0; i < width; i++)
		{
			/* set all the ports to null before we start putting in the nodes that we want */
			for (j = 0; j < new_num_cases; j++)
			{
				created_node->input_pins[new_num_cases + (i * new_num_cases) + j]->input_node = null_node;
			}

			for (j = 0; j < num_cases; j++)
			{
				if (size_matches[i][j] > 1)
				{
					/* IF - this port has a match listing, then join this node to its proper spot.  char comparison part
					 * handles cases when we record that pin j is matched with others, so we can leave as NULL. */
					two_ints_t *found_indexes;

					found_indexes = ou_look_for_1D_array_sequence_in_3D_list(matches, width, num_cases, size_matches, matches[i][j], size_matches[i][j]);

		 			if(found_indexes->one == INIT)
					{
						assert(FALSE);
					}
					else
					{
						/* Found the the condition, so extract the case spot */
						case_index = matches[found_indexes->one][found_indexes->two][size_matches[found_indexes->one][found_indexes->two]];
					}

					old_pin_index = num_cases + (i*num_cases) + j;
					new_pin_index = new_num_cases + (i*new_num_cases) + case_index;

					/* Join up the input pin with the proper case spot that corresponds to the case location found in the cached condition info */
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[old_pin_index]), 
															onu_get_input_pins_related_output_port(case_and_if_node->input_pins[old_pin_index]),
															case_and_if_node, 
															old_pin_index, 
															created_node, 
															new_pin_index);
					debug1[old_pin_index] = TRUE;
				}
				else if (size_matches[i][j] == 0) 
				{
					/* ELSE IF - this node was not matched up with any other, then we just map the original to the proper spot */
					old_pin_index = num_cases + (i*num_cases) + j;
					new_pin_index = new_num_cases + (i*new_num_cases) + additional_conditions + j;

					/* join the old input point from the old case_and_if to the new one in the same condition spot */
					osm_join_gate_nodes_with_external_inputs(onu_get_input_pins_node(case_and_if_node->input_pins[old_pin_index]), 
															onu_get_input_pins_related_output_port(case_and_if_node->input_pins[old_pin_index]),
															case_and_if_node, 
															old_pin_index, 
															created_node, 
															new_pin_index);
					debug1[old_pin_index] = TRUE;
				}
			}

			/* join the outputs to new node from old_next */
			onu_copy_output_port(created_node, case_and_if_node, i, i);
		}

		/* free the old if node */
		onu_free_node(case_and_if_node);

		for (i = 0; i < num_cases+num_cases*width; i++)
		{
			assert(debug1[i] == TRUE);
		}
	}

	/* clean up structures that we created */
	ou_free(condition_remapped);

	if (debug1 != NULL)
	{
		ou_free(debug1);
	}
	
	for (i = 0; i < width; i++)
	{
		for (j = 0; j < num_cases; j++)
		{
			if (size_matches[i][j] > 0)
			{
				ou_free(matches[i][j]);
			}
		}
		ou_free(matches[i]);
		ou_free(size_matches[i]);
	}
	ou_free(matches);
	ou_free(size_matches);

	if (new_condition_nodes != NULL)
	{
		ou_free(new_condition_nodes);
	}
}
