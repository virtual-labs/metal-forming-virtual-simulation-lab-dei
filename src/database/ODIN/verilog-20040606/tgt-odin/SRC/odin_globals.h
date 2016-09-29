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

/* This file contains all the globals.  It's so hard not to have globals...*/
#ifndef __EDIF_GLOBALS_H
#define __EDIF_GLOBALS_H

#include "odin_types.h"
#include "generic_traversal_of_IR.h"

extern short architecture_target;
extern int num_input_nodes;
extern FILE *out;
extern FILE *log_file;
extern char *path;
extern library_cell *current_library;
extern gate_library_implementations *quartus_lib_imp;
extern gate_library_implementations *blif_implementation;
extern inflowmation top_level_process_info;
extern STRING_CACHE *visited_modules_string_cache;
extern STRING_CACHE *visited_constants_string_cache;
extern STRING_CACHE *visited_portrefs_string_cache; 
extern STRING_CACHE *visited_logic_string_cache; 
extern STRING_CACHE *visited_constants_cache; 
extern STRING_CACHE *IR_module_tname_lookup;
extern int number_of_cell_allocates;

extern cell_information_module* top_cell;

extern STRING_CACHE *logic_definition_cells;
extern STRING_CACHE *lpm_definition_cells;
extern STRING_CACHE *logic_instance_cells;
extern STRING_CACHE *lpm_instance_cells;

extern node_t **input_nodes;
extern node_t **output_nodes;
extern int num_output_nodes;
extern node_t **ff_node;
extern int num_ff_nodes;
extern node_t** add_sub_list;
extern int num_add_sub_list;
extern node_t** mult_list;
extern int num_mult_list;
extern node_t** if_and_case_list;
extern int num_if_and_case_list;
extern node_t *gnd_node;
extern node_t *vcc_node;
extern node_t *null_node;

extern memory_t **memories;
extern int num_memories;

extern cell_t **BFS_stack;
extern int num_BFS_stack;

extern int not_cell_lib_index;
extern int and_cell_lib_index;
extern int or_cell_lib_index;
extern int nand_cell_lib_index;
extern int nor_cell_lib_index;
extern int xor_cell_lib_index;
extern int xnor_cell_lib_index;
extern int cmp_eq_cell_lib_index;
extern int cmp_gt_cell_lib_index;
extern int zero_cell_lib_index;
extern int one_cell_lib_index;

extern char *macro_string[];

extern tfe_t **matching_targets;
extern int num_matching_targets;

extern long long int *bytes_allocated;
extern long long int *bytes_reallocated;
extern long long int *bytes_strdup;

extern mixed_signal_t *zero_signal;
extern mixed_signal_t *one_signal;
extern signal_list_t *all_signals_in_block;
extern STRING_CACHE *shell_signals; 

extern char* current_reset_signal_name;
extern short current_reset_state_from_hee_signal; 

extern int oxml_num_debug_nodes;
extern int *oxml_num_debug_nodes_level2;
extern int **oxml_debug_nodes;

extern int num_optimization_on_off;
extern short *optimization_on_off;

extern node_t *clock_node;

#endif
