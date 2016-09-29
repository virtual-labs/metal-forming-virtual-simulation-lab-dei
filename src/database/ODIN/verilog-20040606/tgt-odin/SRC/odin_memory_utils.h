
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

void omu_initialize ();
memory_t *omu_create_memory(int address_width, node_t *memory_node, ivl_memory_t memory);
void omu_free_memory(memory_t *memory);
void omu_add_a_memory_cell(memory_t *memory, char *memory_name);
int omu_is_memory_cell_already_defined(char *name);
memory_t *omu_get_memory(char *name);
cell_t *omu_define_memory_cell(ivl_memory_t memory, int port_inout_width, int port_address_width, char *cell_name);
void omu_add_initialization_filename(node_t *memory_node, char *file_name);
