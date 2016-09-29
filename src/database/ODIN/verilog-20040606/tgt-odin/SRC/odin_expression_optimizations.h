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

comp_tree_t* oeo_create_a_computation_tree_node (node_t *node) ;
void oeo_add_computation_tree_root_node (comp_tree_t *node) ;
void oeo_check_computation_tree (node_t *check_node) ;
short oeo_check_if_outputs_all_go_to_a_computation_node (node_t *check_node) ;
int oeo_check_if_operand_x_is_a_computation_node (node_t *check_node, int operand) ;
void oeo_free_a_computation_tree_node (comp_tree_t *to_free) ;
void oeo_optimize_expressions ();


void oeo_join_adders_based_on_constants (comp_tree_t *computation_root);
short oeo_check_input_for_carry_bit_sequence (node_t *node, int start_index, int end_index);
void oeo_two_adders_to_one_adder_w_carry_in (short is_root_A_carry, short is_root_B_carry, short is_child_A_carry, short is_child_B_carry, short right_or_left,
												comp_tree_t** root);
