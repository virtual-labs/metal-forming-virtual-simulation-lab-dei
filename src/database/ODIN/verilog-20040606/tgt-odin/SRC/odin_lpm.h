
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

void
olpm_show_lpm_as_portref(cell_information_module *this_cell,
			ivl_scope_t current_scope,
		    ivl_nexus_t nex,
		    ivl_lpm_t lpm,
		    long *portref_count);

void
olpm_show_lpm(cell_information_module *this_cell,
		ivl_scope_t current_scope,
	 	ivl_lpm_t net);

void
olpm_define_lpm(ivl_scope_t current_scope,
	 ivl_lpm_t net);

void olpm_traverse_1_add_ports (
			   	cell_information_module *this_cell,
				ivl_lpm_t lpm,
				STRING_CACHE* lpm_ports,
		  		STRING_CACHE* lpm_instance_cells);

void olpm_traverse_0_add_ports (
			   	cell_information_module *this_cell,
				ivl_lpm_t lpm,
				STRING_CACHE *lpm_instance_cells);
