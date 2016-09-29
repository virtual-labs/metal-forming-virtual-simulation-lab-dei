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

/********************************************************************************************
 * PROTOTYPES
 *******************************************************************************************/
void gtoI_design_traversal(ivl_design_t design);
void gtoI_net_const_traverse(ivl_net_const_t net, int continue_nexus_traverse);
void gtoI_event_traverse(ivl_event_t event, int continue_nexus_traverse);
void gtoI_nexus_ptr_traverse(ivl_nexus_ptr_t net);
void gtoI_nexus_traverse(ivl_nexus_t net);
void gtoI_expression_traverse(ivl_expr_t net);
void gtoI_memory_traverse(ivl_memory_t net);
void gtoI_logic_traverse(ivl_net_logic_t net, int continue_nexus_traverse);
void gtoI_udp_traverse(ivl_udp_t net);
void gtoI_lpm_traverse(ivl_lpm_t net);
void gtoI_lval_traverse(ivl_lval_t net, int continue_nexus_traverse);
int gtoI_scope_traverse(ivl_scope_t net, void *null);
void gtoI_signal_traverse(ivl_signal_t net, int continue_nexus_traverse);
int  gtoI_process_traverse(ivl_process_t net, void *null);
void gtoI_stmt_traverse(ivl_statement_t net);
