
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

void oQLgu_generate_vqm(int number_to_mark_as_flag, int *cell_count, FILE *out, ivl_design_t des, const char *path);

void oQLgu_depth_first_traversal_start(FILE *out);

void oQLgu_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number);
void oQLgu_device_define_output_traverse(node_t *node, FILE *out, int traverse_mark_number);
void oQLgu_device_define_output_traverse_SPECIAL_for_hard_mapped(node_t *node, FILE *out, int traverse_mark_number);

void oQLgu_depth_first_traverse_wire_define_pass(node_t *node, FILE *out, int traverse_mark_number);
void oQLgu_wire_define_output_traverse(node_t *node, FILE *out, int traverse_mark_number);
void oQLgu_wire_define_output_traverse_SPECIAL_for_hard_mapped(node_t *node, FILE *out, int traverse_mark_number);

void oQLgu_define_logical_function(
							node_t *node, 
							int library_index, 
							char *unique_name, 
							FILE *out);
void oQLgu_define_register(node_t *node, char *unique_name, int library_index, FILE *out);
void oQLgu_define_compound_logic(node_t *node, char *unique_name, int library_index, FILE *out);
void oQLgu_generate_hetero_device(node_t *node, char *unique_name, FILE *out);
void oQLgu_generate_hetero_device_wire_pass(node_t *node, FILE *out);
void oQLgu_generate_hard_mapped_device_wire_pass(node_t *node, FILE *out);
void oQLgu_generate_hard_mapped_device(node_t *node, char *unique_name, FILE *out);

void oQLgu_create_an_output_joining(node_t *node, char** output_strings, FILE *out);

char *oQLgu_get_unique_name(node_t *node);
char *oQLgu_generate_wire_name(node_t *node, int output_index);

char *oQLgu_generate_port_string(node_t *node_with_port);
void oQLgu_generate_concat_input_port_list(node_t *node,  int size_list, int index_to_start_at, FILE *out);
char **oQLgu_generate_concat_output_port_list(node_t *node,  int size_list, int index_to_start_at, FILE *out);
