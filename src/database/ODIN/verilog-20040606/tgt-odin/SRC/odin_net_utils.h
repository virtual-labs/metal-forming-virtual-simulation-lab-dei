
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

void  onu_add_module_nets_info_collection(cell_t* this_collection, 
											net_pointer_t *ivl_version_or_lookup_version,
											net_pointer_t *odin_actual_version);

int  onu_add_input_module_nets_info_collection(cell_t* this_cell, 
											net_pointer_t *driving_signal,
											net_pointer_t *driven_signal);
