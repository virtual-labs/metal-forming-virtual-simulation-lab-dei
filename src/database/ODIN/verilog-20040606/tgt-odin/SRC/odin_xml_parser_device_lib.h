
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

#include "libxml/parser.h"
#include "libxml/tree.h"

void oxmlpdl_parse_tech_library(char *path);

void oxmlpdl_init();
void oxmlpdl_uninit();

device_tfe_t *oxmlpdl_allocate_device_tfe_t(char *name, int number);
tfe_t *oxmlpdl_allocate_tfe_t(char *name);
primitive_t *oxmlpdl_allocate_primitive_t();
void oxmlpdl_add_to_match_list(tfe_t *new_addition);

char* oxmlpdl_get_specified_tag_text_if_exists(xmlNode * a_node, char *specified_tag);
char* oxmlpdl_get_specified_tag_text(xmlNode * a_node, char *specified_tag);
char* oxmlpdl_get_child_text(xmlNode * a_node);
void oxmlpdl_print_xml_file(xmlNode * a_node, int level);

void oxmlpdl_generate_device_info(xmlNode * a_node);
void oxmlpdl_generate_match_library(xmlNode * a_node);
void oxmlpdl_generate_targets(xmlNode * a_node);
void oxmlpdl_highest_level_parse(xmlNode * a_node);

void oxmlpdl_data_struct_traverse();
void oxmlpdl_DS_traverse_device_arch(device_library_t current_device_arch);
void oxmlpdl_DS_traverse_device(device_tfe_t *current_device_tfe);
void oxmlpdl_DS_traverse_matching_targets();
void oxmlpdl_DS_traverse_tfe(tfe_t* current_tfe);
void oxmlpdl_DS_traverse_tfe_primitive(tfe_t* current_tfe);
void oxmlpdl_DS_traverse_tfe_graph(tfe_t* current_tfe);

