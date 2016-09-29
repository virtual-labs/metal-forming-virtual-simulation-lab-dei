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

#include "ivl_target.h"

/****************************************************************************************************
 * FUNCTIONS
 ***************************************************************************************************/

void gtoIflsml_design_traversal(ivl_design_t design, int stmt_and_expressions);
int  gtoIflsml_process_traverse(ivl_process_t net, void *null);
int gtoIflsml_scope_traverse_modules(ivl_scope_t net, void* null);
void gtoIflsml_signal_show(ivl_signal_t net, int nexus_traverse);
void gtoIflsml_lpm_traverse(ivl_lpm_t net);
void gtoIflsml_logic_traverse(ivl_net_logic_t net, int continue_nexus_traverse);
void gtoIflsml_nexus_ptr_traverse(ivl_nexus_ptr_t net);
void gtoIflsml_nexus_traverse(ivl_nexus_t net);
void gtoIflsml_stmt_traverse(ivl_statement_t net);
void gtoIflsml_event_traverse(ivl_event_t event, int continue_nexus_traverse);
void gtoIflsml_lval_traverse(ivl_lval_t net, int continue_nexus_traverse);
void gtoIflsml_expression_traverse(ivl_expr_t net);
void gtoIflsml_memory_traverse(ivl_memory_t net);
