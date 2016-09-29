
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

#include "odin_types.h"

void osm_soft_map_a_macro_node(node_t *oigh_level_node, short traverse_number);
void osm_join_gate_nodes(node_t *output_node, int output_pin, node_t *input_node, int input_pin);
void osm_join_gate_nodes_with_external_inputs(node_t *output_node, int output_pin, node_t *old_input_node, int old_input_pin, node_t* new_input_node, int new_input_pin);
void osm_join_gate_nodes_with_external_inputs_except_signal_internaly_replicated(node_t *output_node, int output_pin, node_t *old_input_node, int old_input_pin, node_t* new_input_node, int new_input_pin);

node_t *osm_create_a_gate(char *gate_name, int gate_index, int size_input, int size_output, int traverse_number, char* name);
void osm_join_input_directly_to_output(node_t *macro_node, int output_pin, int input_pin);

void osm_instantiate_not_logic(node_t *not_node, short traverse_number);
void osm_instantiate_buffer(node_t *buf_node, short traverse_number);
void osm_instantiate_logic_array_of_2_input_gate(node_t *logic_node, short traverse_number);
void osm_instantiate_logical_reduction_gate(node_t *logic_node, short traverse_number);
void osm_instantiate_logical_not(node_t *logic_node, short traverse_number);
void osm_instantiate_reduction_gate(node_t *logic_node, short traverse_number);
void osm_instantiate_add_with_add_and_carry(node_t *adder_node, short traverse_number);
void osm_instantiate_sub_w_carry_cell(node_t *adder_node, short traverse_number);
void osm_instantiate_add(node_t *adder_node, short traverse_number);
void osm_instantiate_sub(node_t *adder_node, short traverse_number);
void osm_instantiate_unary_sub(node_t *unary_sub, short traverse_number);
void osm_define_an_compare_EQ(node_t *compare_node, short traverse_number);
void osm_define_an_compare_GE(node_t *compare_node, short traverse_number);
void osm_define_an_compare_GT(node_t *compare_node, short traverse_number);
void osm_instantiate_shift_left_or_right(node_t *shift_node, short traverse_number);
void osm_instantiate_2_mux(node_t *mux_node, short traverse_number);
void osm_instantiate_register(node_t *register_node, short traverse_number, short register_type);
void osm_instantiate_if(node_t *if_node, short traverse_number, short id);

node_t *osm_create_a_2_input_logic_tree_to_single_out_with_inputs(int gate_index,
										int width, 
										node_t **input_nodes,
										int *input_nodes_pins, 
										short traverse_number);
void osm_instantiate_simple_soft_multiplier(node_t *multiplier_node, short traverse_number);
