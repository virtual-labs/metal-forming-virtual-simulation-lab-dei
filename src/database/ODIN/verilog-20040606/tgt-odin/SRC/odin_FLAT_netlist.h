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

void oFn_init();
void oFn_flatten(cell_t *top_cell, int cell_count);

int oFn_check_if_defined_cell_is_memory (int library_index);

void oFn_check_for_memory_address_extra_flip_flops_for_statix_implementation();

void oFn_create_nodes(cell_t *top_cell, int cell_count, STRING_CACHE *instance_node_hash);
void oFn_create_nodes_for_instance_cell(cell_t *instance_cell, STRING_CACHE *instance_node_hash);

void oFn_propogate_output_wire_name_through_cell(STRING_CACHE *instance_node_hash);

void oFn_propogate_outputs_from_library_node(node_t* node, STRING_CACHE* instance_node_hash, cell_t *instance_pointer);
void oFn_propogate_outputs_from_hetero_node(node_t* node, STRING_CACHE* instance_node_hash, cell_t *instance_pointer, cell_t *current_cell);
void oFn_propogate_outputs_from_statement_node(signal_list_t *list, cell_t *current_cell);

void oFn_flatten_pass(cell_t *cell, STRING_CACHE *instance_node_hash);
void oFn_depth_first_flatten(cell_t *cell, STRING_CACHE* instance_node_hash, cell_t *instance_cell);
void oFn_look_and_propogate_zero_and_one_cells(cell_t *cell, STRING_CACHE *instance_node_hash, cell_t *instance_pointer);

void oFn_depth_first_traverse(node_t *node, FILE *out, int traverse_mark_number);
void oFn_depth_first_traversal_start(cell_t *cell, FILE *out);

void oFn_depth_first_traversal_from_PO_start_to_check_liveness(short offset);
