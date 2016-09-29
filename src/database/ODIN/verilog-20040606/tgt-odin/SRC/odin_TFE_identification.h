
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

#define individual_match_info_t struct individual_match_info_t_t
individual_match_info_t

{
	short oas_outputs;
	short full_output_match;
	short ff_match;
	node_t *return_node;
	int num_fanout;
	int tfe_pin_idx;
	int *tfe_level_2_pin_idx;
	int object_pin_idx;
	int *object_level_2_pin_idx;
	short *ff_matches;
};

void oTFEi_mark_identified_tfe_primitive(tfe_t *current_tfe, node_t *start_node, int match_id);
tfe_identification_t *oTFEi_create_identification_structure();

void oTFEi_check_for_match(tfe_t *current_tfe);
void oTFEi_id_given_tfe_and_start_node(tfe_t *current_tfe, node_t *start_node, int match_val);
void oTFEi_compare_tfe_to_graph_for_match(tfe_t *current_tfe, node_t *start_node, int match_val);
match_info_t *oTFEi_recursive_match(node_t* tfe_node, node_t* object_node, int match_val, tfe_t *current_tfe);

void oTFEi_clean_nodes_of_failed_match(node_list_t *clean_up_list);
void oTFEi_init_empty_list(node_list_t **to);
void oTFEi_free_node_list(node_list_t *to_free);
void oTFEi_append_node_list(node_list_t *to, node_list_t *from);
void oTFEi_add_node_to_node_list(node_list_t *to, node_t* node);

void oTFEi_free_match_info(match_info_t *match);
void oTFEi_init_match_info(match_info_t **match);
void oTFEi_add_match_info(match_info_t *to, match_info_t *from);

individual_match_info_t *oTFEi_rec_initialize_match_info();

short oTFEi_rec_determine_tfe_ff_type(node_t* tfe_node, tfe_t *current_tfe);
short oTFEi_rec_is_input_port_to_ff_going_to_only_one_node(node_t* node, int port_idx, int pin_idx);

individual_match_info_t *oTFEi_rec_find_matching_output_port(node_t *tfe_node, int port_idx, int pin_idx, node_t* object_node, int iteration_mark, int match_val, tfe_t* current_tfe);
short oTFEi_rec_is_output_port_going_to_only_one_node(node_t* node, int port_idx, int pin_idx, int level_2_pin_idx);
short oTFEi_rec_is_output_port_ff_going_to_only_one_node(node_t* node, int port_idx, int pin_idx, int level_2_pin_idx);
void oTFEi_rec_clean_output_port_match_flags(node_t* tfe_node, node_t *object_node);
short oTFEi_rec_check_if_out_port_is_already_matched(node_t *tfe_node, int port_idx, int pin_idx, int match_val);

void oTFEi_free_match_structure(individual_match_info_t* to_free);

individual_match_info_t *oTFEi_rec_find_matching_input_node(node_t* tfe_node, int port_idx, int pin_idx, node_t *object_node, int iteration_flag, int match_val, tfe_t* current_tfe);
short oTFEi_rec_is_input_port_going_to_only_one_node(node_t* node, int port_idx, int pin_idx);
void oTFEi_rec_clean_input_port_match_flags(node_t* tfe_node, node_t *object_node);

void oTFEi_mark_identified_tfe(tfe_t *current_tfe, node_t *current_node, int match_id, match_info_t *match);
void oTFEi_record_successful_match(match_info_t *lists, tfe_t*  current_tfe, int match_id);

void oTFEi_show_matched_nodes(match_info_t *lists, short match_type, int match_val);
