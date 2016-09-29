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

void ohu_optimize ();
void ohu_create_computation_trees();

void ohu_build_skeleton (cell_t *parent_cell, 
								net_pointer_t **input_1,
								net_pointer_t **input_2,
								int width_a, int width_b, 
								net_pointer_t **output,
								int width,
								int unique_id,
								short macro_type,
								int num_input_ports,
								int num_output_ports);
void ohu_build_skeleton_for_shift (cell_t *parent_cell, 
								net_pointer_t **input_1,
								int width_a, 
								net_pointer_t **output,
								int width,
								short LEFT_OR_RIGHT,
								int shift_size,
								int unique_id);
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
								int num_output_ports);

void ohu_add_mult_node_to_list (node_t *mult_node);
void ohu_multiplier_optimization();
void ohu_check_mult_for_constant_input (node_t* current_mult);
void ohu_check_mult_for_high_bit_zero_constants (node_t* current_mult);

void ohu_add_add_sub_node_to_list (node_t *add_sub_node);
void ohu_add_sub_optimization(); 
node_t* ohu_check_add_for_low_bit_zero_constants (node_t* current_add_sub);
node_t* ohu_check_add_as_counter(node_t* current_add_sub);

void ohu_optimize_case_and_if();
void ohu_check_to_collapse_ifs (node_t *case_an_if_node);
void ohu_check_if_for_common_signals (node_t *case_an_if_node);
void ohu_add_case_and_if_node_to_list (node_t *case_an_if_node);
