
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

int ohlf_traverse_1_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt);
int ohlf_traverse_2_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt);
int ohlf_traverse_3_modules_based_on_scope(ivl_scope_t scope, ivl_statement_t stmt);

int ohlf_helper_traverse_1_modules_based_on_scope(ivl_process_t net, void *x);
int ohlf_helper_traverse_2_modules_based_on_scope(ivl_process_t net, void *x);
int ohlf_helper_traverse_3_modules_based_on_scope(ivl_process_t net, void *x);

void ohlf_complete_top_level_module();
