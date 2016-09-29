
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
#include "string_cache.h"

node_t *onu_allocate_node();
void onu_free_node(node_t *to_free);
node_t *onu_allocate_macro_node(cell_t *cell, char *name);
node_t *onu_allocate_library_node(cell_t *cell, int library_index, char *name);
node_t *onu_allocate_library_node_ff(cell_t *cell, int library_index, char *name, int ff_index);
node_t *onu_allocate_gate_node(int cell_index, int size_input, int size_output, char *name);
node_t *onu_allocate_input_node(cell_ports_t* cell_port, int index);
node_t *onu_allocate_output_node(cell_ports_t* cell_port);
node_t *onu_allocate_1or0_node(int is_gnd);
node_t *onu_allocate_skeleton_node(char *name, int num_outputs, int num_inputs, int num_input_ports, int num_output_ports);
node_t *onu_allocate_macro_node_for_match (short macro_type, 
											int size_input,
											int *size_input_ports, 
											int num_input_ports, 
											int size_output, 
											int *size_output_ports, 
											short *fanout_output_ports, 
											int num_output_ports, 
											char *name);
void onu_free_node(node_t *node);
node_t *onu_add_a_ff_node(cell_t *cell, int library_index, char *name);
node_t *onu_add_a_register_node_to_ff_list(node_t *node);

node_t *onu_get_output_pins_node(node_output_pin_t *output_pin, int index);
int onu_get_output_pins_related_output_port(node_output_pin_t *output_pin, int index);
int onu_get_output_pins_related_num_level_2(node_output_pin_t *output_pin);
short onu_get_output_pins_is_output_propogated(node_output_pin_t *output_pin);
void onu_set_output_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int output_pin_index, int output_pin_index_array_index, int input_pin_index);

node_t *onu_get_input_pins_node(node_input_pin_t *input_pin);
int onu_get_input_pins_related_output_port(node_input_pin_t *input_pin);
int onu_get_input_pins_related_output_port_array_index(node_input_pin_t *input_pin);
void onu_set_input_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int input_pin_index, int output_pin_index, int output_pin_index_array_index);

void onu_initialize_input_ports(node_input_port_t **input_port, int num_input_ports);
void onu_initialize_output_ports(node_output_port_t **output_port, int num_output_ports);

void onu_add_output_port_fanout(node_output_port_t *output_port);
void onu_set_output_port_width(node_output_port_t *output_port, int width);
void onu_set_output_port_is_bus(node_output_port_t *output_port, int idx, short is_bus);
void onu_set_input_port_is_bus(node_input_port_t *input_port, short is_bus);
void onu_set_input_port_width(node_input_port_t *input_port, int width);

void onu_initialize_input_pins(node_input_pin_t **input_pin, int num_input_pins);
void onu_initialize_output_pins(node_output_pin_t **output_pin, int num_output_pins);

int onu_add_output_pointer_to_node(node_t *the_node, node_t *the_pointer_node, int output_pin_index, int input_pin_index);
void onu_copy_output_port(node_t *to, node_t *from, int index_to, int index_from);
void onu_remove_output_pointer_to_node(node_t *the_node, int output_pin_index, int output_pin_index_array_index);

void onu_bypass_a_node(node_t *current_node, int input_index, int output_index);
void onu_remap_input_port(node_t *to, node_t *from, int index_to, int index_from);

void onu_update_size_of_input_ports(node_t *current_node, int new_size);
void onu_update_size_of_output_ports(node_t *current_node, int new_size);

void onu_remove_node_from_relevant_lists(node_t *to_remove);
void onu_remove_nodes_links(node_t *the_node);

