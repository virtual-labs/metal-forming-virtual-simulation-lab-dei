
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

signal_list_t *onacu_init_list_structure();
void onacu_init_list_structure_with_widths(signal_list_t *list, int input_size, int output_size);
void onacu_init_list_outputs(signal_list_t *list,  int size);
void onacu_reinit_list_outputs(signal_list_t *list, int new_size);
void onacu_clean_list_structure(signal_list_t *list);
short onacu_lookup_cell_port_in_input_signal_list(mixed_signal_t **list, int size,  cell_ports_t *cell_port);
short onacu_lookup_node_input_in_input_signal_list(mixed_signal_t **list, int size, node_input_pin_t *cell_port);
short onacu_lookup_node_output_in_input_signal_list(mixed_signal_t **list, int size, node_output_pin_t *cell_port);
short onacu_lookup_node_input_output_in_signal_input_list(mixed_signal_t **list, int size, node_input_pin_t *cell_port, cell_ports_t *port);
int onacu_lookup_cell_port_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, cell_ports_t *cell_port);
int onacu_lookup_node_input_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, node_input_pin_t *cell_port);
int onacu_lookup_node_output_in_input_signal_list_and_return_index(mixed_signal_t **list, int size, node_output_pin_t *cell_port);
int onacu_lookup_node_input_output_in_signal_input_list_and_return_index(mixed_signal_t **list, int size, node_input_pin_t *cell_port, cell_ports_t *port);
int onacu_lookup_node_input_output_in_signal_input_list_just_cell_port_and_return_index(mixed_signal_t **list, int size, cell_ports_t *port);
short onacu_lookup_port_in_signal_list(mixed_signal_t **list, int size, mixed_signal_t *signal);
int onacu_lookup_port_in_signal_list_and_return_index(mixed_signal_t **list, int size, mixed_signal_t *signal);
int onacu_lookup_for_cell_port_match_in_signal_list(mixed_signal_t **list, int size, mixed_signal_t *signal);
void onacu_join_inputs_to_input_list(signal_list_t *list,  signal_list_t *to_join_list);
void onacu_join_outputs_to_output_list(signal_list_t *list,  signal_list_t *to_join_list);
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port(cell_ports_t* port);
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port_and_node_output(cell_ports_t* port, node_output_pin_t *node_output);
mixed_signal_t *onacu_init_mixed_signal_t_from_node_input(node_input_pin_t* port);
mixed_signal_t *onacu_init_mixed_signal_t_from_node_output(node_output_pin_t* port);
mixed_signal_t *onacu_init_mixed_signal_t_from_cell_port_and_node_input(cell_ports_t* port, node_input_pin_t* pin);
void onacu_append_port_to_input_signal_list(signal_list_t *list,  mixed_signal_t* signal);
void onacu_append_port_to_output_signal_list(signal_list_t *list,  mixed_signal_t* signal);
short onacu_compare_node_input_pins(node_input_pin_t *n1, node_input_pin_t *n2);
short onacu_compare_node_output_pins(node_output_pin_t *n1, node_output_pin_t *n2);
node_input_pin_t *onacu_create_an_input_pin(node_t *node, int input_pins_related_output_port, int input_pins_related_output_port_index);
node_output_pin_t *onacu_add_node_and_pin_to_output_pin(node_output_pin_t *pin, node_t *node, int output_pins_related_input_index);
void onacu_connect_multiple_output_ports_from_list_to_input_ports_of_node(node_t *node, 
																			int start_input_index, 
																			signal_list_t *list, 
																			int start_output_index, 
																			int end_output_index);
void onacu_connect_output_port_from_list_toinput_port_of_node(node_t *node, 
																int input_index, 
																mixed_signal_t *signal);
node_t *onacu_create_1inport_1outport_macro_node(char *name, int size_in1, int size_out, short macro_index);
node_t *onacu_create_2inport_1outport_macro_node(char *name, int size_in1, int size_in2, int size_out, short macro_index);
node_t *onacu_create_3inport_1outport_macro_node(char *name, int size_in1, int size_in2, int size_in3, int size_out, short macro_index);
node_t *onacu_create_shift_macro_node(char *name, int size_in1, int size_out, int shift_size, short macro_index);
node_t *onacu_create_case_node(char *name, int num_outputs, int num_inputs, int num_input_ports, int num_output_ports);
node_t *onacu_create_memory_node(char *name, int size_in, int size_addr, int size_out, short macro_index);
void onacu_add_multiple_input_ports_to_list(signal_list_t *list, node_t *node, int start_index, int end_index);
int onacu_find_input_related_to_output(mixed_signal_t *signal, signal_list_t *list);
int onacu_find_output_related_to_output(mixed_signal_t *signal, signal_list_t *list);
void onacu_join_mixed_signals(mixed_signal_t *signal_input, mixed_signal_t *signal_output);
int *onacu_search_for_double_entry_output(mixed_signal_t **list, int size);
void onacu_record_reset_ports(signal_list_t *list, node_t *node, int start_port);
