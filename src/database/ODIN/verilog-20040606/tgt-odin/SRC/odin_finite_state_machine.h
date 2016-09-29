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

void ofsm_hot_encode () ;
short ofsm_loop_check (node_t *register_node, int output_pin_index, node_t *original_case_node) ;
short ofsm_breadth_first_traverse_backwards(node_t *case_if_node, int output_index, node_t *start_node, node_t *original_case_node, short traverse_value);
void ofsm_create_new_case_if_nodes_for_state_variable(int old_width, int oot_encode_width);
void ofsm_join_new_case_if_nodes_for_state_variable(int old_width, int oot_encode_width, node_t *top_hierarchy_node);
node_t *ofsm_hot_encode_register(node_t *register_node, int new_hot_encode_size, int old_hot_encode_size, int *state_index, node_t *case_node);
void ofsm_hot_encode_case(node_t *case_node, node_t *new_register_node, int new_width, int old_width);
void ofsm_hot_encode_constants(int old_width, int oot_encode_width);
void ofsm_add_fsm_to_list (node_t *fsm_node) ;
void ofsm_free_old_nodes();
