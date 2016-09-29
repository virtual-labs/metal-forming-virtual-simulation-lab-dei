
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

#include "libxml/parser.h"
#include "libxml/tree.h"

char* oxmlcf_get_specified_tag_text(xmlNode * a_node, char *specified_tag);
char* oxmlcf_get_child_text(xmlNode * a_node);

void oxmlcf_debug_init();
void oxmlcf_debug_uninit();
void oxmlcf_parse_debug_config_file(char *file_path);
void oxmlcf_highest_level_parse_debug_file(xmlNode * a_node);
void oxmlcf_parse_node_set(xmlNode * a_node);

void oxmlcf_optimization_init();
void oxmlcf_optimization_uninit();
void oxmlcf_parse_optimization_file(char *file_path);
void oxmlcf_highest_level_parse_optimization_file(xmlNode * a_node);
