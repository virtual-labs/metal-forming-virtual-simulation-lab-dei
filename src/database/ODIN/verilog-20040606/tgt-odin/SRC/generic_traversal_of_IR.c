
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

/* This file defines functionality to traverse the Intermediate Representation that Icarus generates.  To this day I still have trouble wrapping my
 * head around the IR, and I use these types of traversals to extract the information I need. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "generic_traversal_of_IR.h"
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

/* Definitions to have interactive and non interactive mode.  define ME if you want to Interact
 * with traversal */
//#define ME
#ifdef ME
#define INTERACTIVE gets(yorn); if(yorn[0] == 'y')  
#define BYPASS if(FALSE)
#else
#define INTERACTIVE if(TRUE)  
#define BYPASS if(TRUE)
#endif

char yorn[4096];

STRING_CACHE *visited_signal_string_cache = NULL;
STRING_CACHE *visited_scope_string_cache = NULL;
STRING_CACHE *visited_udp_string_cache = NULL;
STRING_CACHE *visited_logic_string_cache = NULL;
STRING_CACHE *visited_lpm_string_cache = NULL;
STRING_CACHE *visited_nexus_string_cache = NULL;
STRING_CACHE *visited_event_string_cache = NULL;
STRING_CACHE *visited_memory_string_cache = NULL;

/****************************************************************************************************
 * FUNCTIONS
 ***************************************************************************************************/

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_design_traversal )
 * 	This is a top-level traversal of the HDL design.  Helps understand how the IR is built.
 *-------------------------------------------------------------------------------------------*/
void gtoI_design_traversal(ivl_design_t design)
{
	char *architecture_parameter;
	ivl_scope_t top_level_module;
	int time_precision;
	ivl_net_const_t net_constant_traverse;
	int i;
	
	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_design_traversal\n"); 

    visited_signal_string_cache = sc_new_string_cache();
    visited_scope_string_cache = sc_new_string_cache();
    visited_udp_string_cache = sc_new_string_cache();
    visited_logic_string_cache = sc_new_string_cache();
    visited_lpm_string_cache = sc_new_string_cache();
    visited_nexus_string_cache = sc_new_string_cache();
    visited_event_string_cache = sc_new_string_cache();
    visited_memory_string_cache = sc_new_string_cache();

	/* grab the architecture parameter.  I can define parameters in verilog-0.6/iverilog.conf
	 * with a -fkey=string_param.  For example arch is defined */
	architecture_parameter = (char*)ivl_design_flag(design, "arch");	
	tabbed_printf(out, 0, "# Architecure file = %s\n", architecture_parameter);

	/* get the time precision of the design */
	time_precision = ivl_design_time_precision(design);
	tabbed_printf(out, 0, "# Time precision = %d\n", time_precision);

	tabbed_printf(out, 0, "# TRAVERSING PROCESSES\n");
	/* go through the processes defined in this design */
	ivl_design_process(design, gtoI_process_traverse, NULL);

	/* grab the top level module in the verilog hierarchy */
	top_level_module = ivl_design_root(design);

	tabbed_printf(out, 0, "# TRAVERSING TOP LEVEL\n");
	if (top_level_module != NULL)
	{
		gtoI_scope_traverse(top_level_module, NULL);
	}

	/* look at all the high level design constants */
	for (i = 0; i < ivl_design_consts(design); i++)
	{
		/* grab a constant to look at */
		net_constant_traverse = ivl_design_const(design, i);
	}

	/* free string caches */
    sc_free_string_cache(visited_signal_string_cache);
    sc_free_string_cache(visited_scope_string_cache);
    sc_free_string_cache(visited_udp_string_cache);
    sc_free_string_cache(visited_logic_string_cache);
    sc_free_string_cache(visited_lpm_string_cache);
    sc_free_string_cache(visited_nexus_string_cache);
    sc_free_string_cache(visited_event_string_cache);
    sc_free_string_cache(visited_memory_string_cache);

	tabbed_printf(out, 0, "# END  gtoI_design_traversal\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_net_const_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_net_const_traverse(ivl_net_const_t net, int continue_nexus_traverse)
{
	//int signed_val;
	ivl_nexus_t nexus_pin;
	char *constant_bits;
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_traverse_net_const\n"); 
        
	/* check what the bits are */
	constant_bits = (char*)ivl_const_bits(net);
	tabbed_printf(out, 0, "# The constant bits are = %s\n", constant_bits);

	/* check if the constant is signed */
/*	Doesn't look like there code does this, and with a constant we can dtermine if it is important if signed or not */
#if 0
	signed_val = ivl_const_signed(net);
	tabbed_printf(out, 0, "# This constant is signed = %d\n", signed_val);
#endif

	if (continue_nexus_traverse == TRUE)
	{
		/* go through the pins of the constant */
		for (i = 0; i < ivl_const_pins(net); i++)
		{
			tabbed_printf(out, 0, "# Examining constant pin %d of %d\n",i, ivl_const_pins(net));
	
			/* grab the nexus pin */
			nexus_pin = ivl_const_pin(net, i);
	
			/* examine into the nexus */
			gtoI_nexus_traverse(nexus_pin);
		}
	}

	tabbed_printf(out, 0, "# END gtoI_traverse_net_const\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_event_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_event_traverse(ivl_event_t event, int continue_nexus_traverse)
{
	int i;

	if (event == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_event_string_cache, (char*)ivl_event_name(event));

	/* if this scope has been analysed before break */
    if(visited_event_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# index:%d named:%s pre_analysed\n", i, ivl_event_name(event));
		return;
	}
	visited_event_string_cache->data[i] = event;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_traverse_event\n"); 

	/* get the name of the event */
	tabbed_printf(out, 0, "# Event %s;\n", (ivl_event_name(event)));
	/* get the base of the event */
	tabbed_printf(out, 0, "# Base %s;\n", (ivl_event_basename(event)));

	/* go through each of the any signals */
	for (i = 0; i < ivl_event_nany(event); i++)
	{
		tabbed_printf(out, 0, "# Event any signals %d of %d in %s\n", i, ivl_event_nany(event), ivl_event_name(event));
		if (continue_nexus_traverse == TRUE)
		INTERACTIVE
		{
			gtoI_nexus_traverse(ivl_event_any(event, i));
		}
	}
	/* go through each of the neg signals */
	for (i = 0; i < ivl_event_nneg(event); i++)
	{
		tabbed_printf(out, 0, "# Event neg signals %d of %d in %s\n", i, ivl_event_nneg(event), ivl_event_name(event));
		if (continue_nexus_traverse == TRUE)
		INTERACTIVE
		{
			gtoI_nexus_traverse(ivl_event_neg(event, i));
		}
	}
	/* go through each of the pos signals */
	for (i = 0; i < ivl_event_npos(event); i++)
	{
		tabbed_printf(out, 0, "# Event pos signals %d of %d in %s\n", i, ivl_event_npos(event), ivl_event_name(event));
		if (continue_nexus_traverse == TRUE)
		INTERACTIVE
		{
			gtoI_nexus_traverse(ivl_event_pos(event, i));
		}
	}

	tabbed_printf(out, 0, "# END gtoI_traverse_event\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_nexus_ptr_traverse )
 * 	Look at a nexus and determine what type of ptr it has
 *-------------------------------------------------------------------------------------------*/
void gtoI_nexus_ptr_traverse(ivl_nexus_ptr_t net)
{
	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	tabbed_spaces(TAB); 

	tabbed_printf(out, 0, "# Nexus Ptr drive0 %d; ", ivl_nexus_ptr_drive0(net));
	fprintf(out, " Nexus Ptr drive1 %d; ", ivl_nexus_ptr_drive1(net));
	fprintf(out, " Nexus Ptr pin number %d;\n", ivl_nexus_ptr_pin(net));
	
	if (ivl_nexus_ptr_con(net) != NULL)
	{
		tabbed_printf(out, 0, "# Nexus Ptr con traverse\n");
		INTERACTIVE
		{
			gtoI_net_const_traverse(ivl_nexus_ptr_con(net), TRUE);
		}
	}

	if (ivl_nexus_ptr_log(net) != NULL)
	{
		tabbed_printf(out, 0, "# Nexus Ptr log traverse\n");
		INTERACTIVE
		{
			gtoI_logic_traverse(ivl_nexus_ptr_log(net), TRUE);
		}
	}

	if (ivl_nexus_ptr_lpm(net) != NULL)
	{
		tabbed_printf(out, 0, "# Nexus Ptr lpm traverse\n");
		INTERACTIVE
		{
			gtoI_lpm_traverse(ivl_nexus_ptr_lpm(net));
		}
	}

	if (ivl_nexus_ptr_sig(net) != NULL)
	{
		tabbed_printf(out, 0, "# Nexus Ptr sig traverse\n");
		INTERACTIVE
		{
			gtoI_signal_traverse(ivl_nexus_ptr_sig(net), TRUE);
		}
	}

	tabbed_printf(out, 0, "# END test_nexus_ptr\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_nexus_traverse )
 * 	Go through each nexus and its respective pointers
 *-------------------------------------------------------------------------------------------*/
void gtoI_nexus_traverse(ivl_nexus_t net)
{
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_nexus_string_cache, (char*)ivl_nexus_name(net));

	/* if this scope has been analysed before break */
    if(visited_nexus_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# %s already analysed [SCindex:%ld] \n", ivl_nexus_name(net), i);
		return;
	}
	visited_nexus_string_cache->data[i] = net;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# Nexus Name %s;\n", ivl_nexus_name(net));
	/* used to save data at this location */
	tabbed_printf(out, 0, "# Nexus Private %d;\n", ivl_nexus_get_private(net));
	tabbed_printf(out, 0, "# Nexus Number Pointers %d;\n", ivl_nexus_ptrs(net));
	for (i = 0; i < ivl_nexus_ptrs(net); i++)
	{
		tabbed_printf(out, 0, "# pin %d of %d in %s\n", i, ivl_nexus_ptrs(net),  ivl_nexus_name(net) );
		INTERACTIVE
		{
			gtoI_nexus_ptr_traverse(ivl_nexus_ptr(net, i));	
		}
	}

	tabbed_printf(out, 0, "# END test_nexus\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_expression_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_expression_traverse(ivl_expr_t net)
{
	int signed_val;
	int width;
	char* expr_bits;
	unsigned    expr_lsi;
	const char* expr_name;
	char        expr_opcode;
	unsigned    expr_repeat;
	const char* expr_string;
	unsigned long expr_value;
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}


	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_expression_traverse\n"); 

	/* determine the expression type and do the respective hardware conversion */
	switch (ivl_expr_type(net)) {
	  case IVL_EX_NONE:
		fprintf(stderr, "Concern about reaching this point...\n");
		break;

	  case IVL_EX_STRING:
		expr_string = ivl_expr_string(net);
		tabbed_printf(out, 0, "# IVL_EX_STRING NOT SUPPORTED : %s\n", expr_string); 
		break;

	  case IVL_EX_BINARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "# This expression has sign:%d (TRUE != 0, FALSE == 0)\n", signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "# This expression has width:%d\n", width);
		expr_opcode = ivl_expr_opcode(net);
		tabbed_printf(out, 0, "# IVL_EX_BINARY cahracter : %c\n", expr_opcode); 
		tabbed_printf(out, 0, "# IVL_EX_BINARY Examine Oper1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));
		tabbed_printf(out, 0, "# IVL_EX_BINARY Examine Oper2\n"); 
		gtoI_expression_traverse(ivl_expr_oper2(net));
		break;

	  case IVL_EX_BITSEL:
		tabbed_printf(out, 0, "# IVL_EX_BITSEL Examine Oper1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));
		tabbed_printf(out, 0, "# IVL_EX_BITSEL Examine Signal\n"); 
		gtoI_signal_traverse(ivl_expr_signal(net), TRUE);
		break;

	  case IVL_EX_SELECT:
		tabbed_printf(out, 0, "# IVL_EX_SELECT Examine Oper1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));
		tabbed_printf(out, 0, "# IVL_EX_SELECT Examine Oper2\n"); 
		gtoI_expression_traverse(ivl_expr_oper2(net));
		break;

	  case IVL_EX_CONCAT:
		expr_repeat = ivl_expr_repeat(net);
		tabbed_printf(out, 0, "# IVL_EX_CONCAT repeat %d\n", expr_repeat); 
		tabbed_printf(out, 0, "# IVL_EX_CONCAT examine parm expressions\n"); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "# IVL_EX_CONCAT examine parm %d expressions\n", i); 
			gtoI_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_NUMBER:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "# This expression has sign:%d (TRUE != 0, FALSE == 0)\n", signed_val);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "# This expression has width:%d\n", width);
		expr_bits = (char*)ivl_expr_bits(net);
		tabbed_printf(out, 0, "# IVL_EX_NUMBER bits = %s\n", expr_bits); 
		break;

	  case IVL_EX_SIGNAL:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "# This expression has sign:%d (TRUE != 0, FALSE == 0)\n", signed_val);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "# This expression has width:%d\n", width);
		expr_lsi = ivl_expr_lsi(net);
		tabbed_printf(out, 0, "# IVL_EX_SIGNAL lsi = %d\n", expr_lsi); 
		expr_name = ivl_expr_name(net);
		tabbed_printf(out, 0, "# IVL_EX_SIGNAL expression name = %s\n", expr_name); 
		break;

	  case IVL_EX_TERNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "# This expression has sign:%d (TRUE != 0, FALSE == 0)\n", signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "# This expression has width:%d\n", width);
		tabbed_printf(out, 0, "# IVL_EX_TERNARY traversing operand 1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));
		tabbed_printf(out, 0, "# IVL_EX_TERNARY traversing operand 2\n"); 
		gtoI_expression_traverse(ivl_expr_oper2(net));
		tabbed_printf(out, 0, "# IVL_EX_TERNARY traversing operand 3\n"); 
		gtoI_expression_traverse(ivl_expr_oper3(net));
		break;

	  case IVL_EX_UNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "# This expression has sign:%d (TRUE != 0, FALSE == 0)\n", signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "# This expression has width:%d\n", width);
		expr_opcode = ivl_expr_opcode(net);
		tabbed_printf(out, 0, "# IVL_EX_UNARY opcode = %c\n", expr_opcode); 
		tabbed_printf(out, 0, "# IVL_EX_UNARY traversing operand 1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));
		break;

	  case IVL_EX_MEMORY:
		tabbed_printf(out, 0, "# IVL_EX_MEMORY examining Oper1\n"); 
		gtoI_expression_traverse(ivl_expr_oper1(net));

		tabbed_printf(out, 0, "# IVL_EX_MEMORY examining Memory\n"); 
		gtoI_memory_traverse(ivl_expr_memory(net));
		break;

	  case IVL_EX_SFUNC:
		expr_name = ivl_expr_name(net);
		tabbed_printf(out, 0, "# IVL_EX_SFUNC expression %s\n", expr_name); 
		
		tabbed_printf(out, 0, "# IVL_EX_SFUNC examine parm expressions\n"); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "# IVL_EX_SFUNC examine parm %d expressions\n", i); 
			gtoI_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_UFUNC:
		tabbed_printf(out, 0, "# IVL_EX_UFUNC looking at scope\n"); 
		gtoI_scope_traverse(ivl_expr_def(net), NULL);

		tabbed_printf(out, 0, "# IVL_EX_UFUNC examine parm expressions\n"); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "# IVL_EX_UFUNC examine parm %d expressions\n", i); 
			gtoI_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_SCOPE:
		tabbed_printf(out, 0, "# IVL_EX_SCOPE looking at scope\n"); 
		gtoI_scope_traverse(ivl_expr_scope(net), NULL);
		break;

	  case IVL_EX_ULONG:
		expr_value = ivl_expr_uvalue(net);
		tabbed_printf(out, 0, "# IVL_EX_ULONG long value = %d\n", expr_value); 
		break;

	  default:
		tabbed_printf(out, 0, "# draw_eval_expr_wid: default\n"); 
	}

	tabbed_printf(out, 0, "# END gtoI_expression_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_memory_traverse )
 * 	Traverse a memory piece
 *-------------------------------------------------------------------------------------------*/
void gtoI_memory_traverse(ivl_memory_t net)
{
	char* memory_basename;
	int memory_root;
	unsigned memory_size;
	unsigned memory_width;
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}
	
	i = sc_add_string(visited_memory_string_cache, (char*)ivl_memory_basename(net));

	/* if this scope has been analysed before break */
    if(visited_memory_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_memory_basename(net));
		return;
	}
	visited_memory_string_cache->data[i] = net;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_memory_traverse\n"); 

//	memory_name = (char*)ivl_memory_name(net);
	memory_basename = (char*)ivl_memory_basename(net);
	memory_root = ivl_memory_root(net);
	memory_size = ivl_memory_size(net);
	memory_width = ivl_memory_width(net);

//	tabbed_printf(out, 0, "# Name %s\n", memory_name); 
	tabbed_printf(out, 0, "# BaseName %s\n", memory_basename); 
	tabbed_printf(out, 0, "# root %d\n", memory_root); 
	tabbed_printf(out, 0, "# size %d\n", memory_size); 
	tabbed_printf(out, 0, "# width %d\n", memory_width); 

	tabbed_printf(out, 0, "# END gtoI_memory_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_top_most_level )
 *-------------------------------------------------------------------------------------------*/
void gtoI_logic_traverse(ivl_net_logic_t net, int continue_nexus_traverse)
{
	char* logic_name;
	char* logic_basename;
	unsigned    logic_pins;
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_logic_string_cache, (char*) ivl_logic_name(net));

	/* if this scope has been analysed before break */
    if(visited_logic_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_logic_name(net));
		return;
	}
	visited_logic_string_cache->data[i] = net;	/* mark this scope */
    
	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_logic_traverse\n"); 
    
    switch (ivl_logic_type(net))
	{
	case IVL_LO_NONE:
		tabbed_printf(out, 0, "# IVL_LO_NONE\n");
		break;
	case IVL_LO_NMOS:
		tabbed_printf(out, 0, "# IVL_LO_NMOS\n");
		break;
	case IVL_LO_NOTIF0:
		tabbed_printf(out, 0, "# IVL_LO_NOTIF0\n");
		break;
	case IVL_LO_NOTIF1:
		tabbed_printf(out, 0, "# IVL_LO_NOTIF1\n");
		break;
	case IVL_LO_RNMOS:
		tabbed_printf(out, 0, "# IVL_LO_RNMOS\n");
		break;
	case IVL_LO_RPMOS:
		tabbed_printf(out, 0, "# IVL_LO_RPMOS\n");
		break;
	case IVL_LO_PMOS:
		tabbed_printf(out, 0, "# IVL_LO_PMOS\n");
		break;
	case IVL_LO_EEQ:
		tabbed_printf(out, 0, "# IVL_LO_EEQ\n");
		break;
	case IVL_LO_UDP:
		tabbed_printf(out, 0, "# IVL_LO_UDP\n");
		tabbed_printf(out, 0, "# logic traverse scope\n");
		gtoI_udp_traverse(ivl_logic_udp(net));
		break;
	case IVL_LO_AND:
		tabbed_printf(out, 0, "# IVL_LO_AND\n");
		break;
	case IVL_LO_NAND:
		tabbed_printf(out, 0, "# IVL_LO_NAND\n");
		break;
	case IVL_LO_NOR:
		tabbed_printf(out, 0, "# IVL_LO_NOR\n");
		break;
	case IVL_LO_OR:
		tabbed_printf(out, 0, "# IVL_LO_OR\n");
		break;
	case IVL_LO_XOR:
		tabbed_printf(out, 0, "# IVL_LO_XOR\n");
		break;
	case IVL_LO_XNOR:
		tabbed_printf(out, 0, "# IVL_LO_XNOR\n");
		break;
	case IVL_LO_BUF:
		tabbed_printf(out, 0, "# IVL_LO_BUF\n");
		break;
	case IVL_LO_BUFIF0:
		tabbed_printf(out, 0, "# IVL_LO_BUFIF0\n");
		break;
	case IVL_LO_BUFIF1:
		tabbed_printf(out, 0, "# IVL_LO_BUFIF1\n");
		break;
	case IVL_LO_BUFZ:
		tabbed_printf(out, 0, "# IVL_LO_BUFZ\n");
		break;
	case IVL_LO_NOT:
		tabbed_printf(out, 0, "# IVL_LO_NOT\n");
		break;
	case IVL_LO_PULLDOWN:
		tabbed_printf(out, 0, "# IVL_LO_PULLDOWN\n");
		break;
	case IVL_LO_PULLUP:
		tabbed_printf(out, 0, "# IVL_LO_PULLUP\n");
		break;
	default:
		tabbed_printf(out, 0, "#paj PORTREF FOR UNDEFINED LOGIC CELL\n");
		break;
	}

	logic_name = (char*)ivl_logic_name(net);
	logic_basename = (char*)ivl_logic_basename(net);
	logic_pins = ivl_logic_pins(net);

#if 0 // some questionable definitions in the IR that I don't use or understand yet
	/* don't know what transition is??? */
	logic_delay = ivl_logic_delay(net, unsigned transition);
	/* unsure what this one is useful for */
	logic_attr = ivl_logic_attr(ivl_net_logic_t net, const char*key);
	tabbed_printf(out, 0, "# logic delay %d\n", logic_delay );
	tabbed_printf(out, 0, "# logic attr %s\n", logic_attr );
#endif

	tabbed_printf(out, 0, "# logic name %s\n", logic_name );
	tabbed_printf(out, 0, "# logic basename %s\n", logic_basename );

	if (continue_nexus_traverse == TRUE)
	{
		tabbed_printf(out, 0, "# logic pins %d\n", logic_pins );
		for (i = 0; i < logic_pins; i++)
		{
			tabbed_printf(out, 0, "# traverse nexus pin %d of %d in %s\n", i, logic_pins, logic_name );
			INTERACTIVE
			{
				gtoI_nexus_traverse(ivl_logic_pin(net, i));
			}
		}
	}

	tabbed_printf(out, 0, "# logic traverse scope\n");
	if (ivl_logic_scope(net) != NULL)
	{
		INTERACTIVE
		{
			gtoI_scope_traverse(ivl_logic_scope(net), NULL);
		}
	}


	tabbed_printf(out, 0, "# END gtoI_logic_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_top_most_level )
 *-------------------------------------------------------------------------------------------*/
void gtoI_udp_traverse(ivl_udp_t net)
{
	unsigned    udp_sequ;
	unsigned    udp_nin;
	unsigned    udp_init;
	unsigned    udp_rows;
	char* udp_name;
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_udp_string_cache, (char*)ivl_udp_name(net));

	/* if this scope has been analysed before break */
    if(visited_udp_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_udp_name(net));
		return;
	}
	visited_udp_string_cache->data[i] = net;	/* mark this scope */


	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# test_nexus_ptr\n"); 
	
	udp_sequ = ivl_udp_sequ(net);
	udp_nin = ivl_udp_nin(net);
	udp_init = ivl_udp_init(net);
	udp_name = (char*)ivl_udp_name(net);

	tabbed_printf(out, 0, "# udp_sequ:%d\n", udp_sequ); 
	tabbed_printf(out, 0, "# udp_nin:%d\n", udp_nin); 
	tabbed_printf(out, 0, "# udp_init:%d\n", udp_init); 
	tabbed_printf(out, 0, "# udp_name:%s\n", udp_name); 

	udp_rows = ivl_udp_rows(net);
	tabbed_printf(out, 0, "# rows %d\n", udp_rows); 
	for (i = 0; i < udp_rows; i++)
	{
		tabbed_printf(out, 0, "# row %s", ivl_udp_row(net, i));
	}

	tabbed_printf(out, 0, "# END test_nexus_ptr\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_lpm_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_lpm_traverse(ivl_lpm_t net)
{

	char*    lpm_name;
	char*    lpm_basename;
	unsigned lpm_width;
	int i;
	
	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_lpm_string_cache, (char*)ivl_lpm_name(net));

	/* if this scope has been analysed before break */
    if(visited_lpm_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# index:%ld named:%s already analysed \n", i, ivl_lpm_name(net));
		return;
	}
	visited_lpm_string_cache->data[i] = net;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_lpm_traverse\n"); 

	lpm_name = (char*)ivl_lpm_name(net);
	lpm_basename = (char*)ivl_lpm_basename(net);
	lpm_width = ivl_lpm_width(net);

	tabbed_printf(out, 0, "# lpm_name %s\n", lpm_name); 
	tabbed_printf(out, 0, "# lpm_basename %s\n", lpm_basename); 
	tabbed_printf(out, 0, "# lpm_width %d\n", lpm_width); 

    switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
		tabbed_printf(out, 0, "# IVL_LPM_ADD\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			INTERACTIVE
			{
				gtoI_nexus_traverse(ivl_lpm_data(net, i));
			}
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			INTERACTIVE
			{
				gtoI_nexus_traverse(ivl_lpm_datab(net, i));
			}
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			INTERACTIVE
			{
				gtoI_nexus_traverse(ivl_lpm_q(net, i));
			}
		}
	    break;
	case IVL_LPM_SUB:
		tabbed_printf(out, 0, "# IVL_LPM_SUB\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_FF:
		tabbed_printf(out, 0, "# IVL_LPM_FF\n");
		tabbed_printf(out, 0, "# clock nexus \n");
		gtoI_nexus_traverse(ivl_lpm_clk(net));
		tabbed_printf(out, 0, "# enable nexus\n");
		gtoI_nexus_traverse(ivl_lpm_enable(net));
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_MULT:
		tabbed_printf(out, 0, "# IVL_LPM_MULT\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_MUX:
		tabbed_printf(out, 0, "# IVL_LPM_MUX\n");

		tabbed_printf(out, 0, "# select signals %d\n", ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "# select nexus %d of %d\n", i, lpm_width);
            gtoI_nexus_traverse(ivl_lpm_select(net, i));
		}

		tabbed_printf(out, 0, "# size %d\n", ivl_lpm_size(net));
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data2 nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data2(net, 0, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
	
	    break;
	case IVL_LPM_CMP_EQ:
		tabbed_printf(out, 0, "# IVL_LPM_CMP_EQ\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "# q nexus %d of %d\n", 0, lpm_width);
		gtoI_nexus_traverse(ivl_lpm_q(net, 0));

		break;
	case IVL_LPM_CMP_GE:
		tabbed_printf(out, 0, "# IVL_LPM_CMP_GE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "# q nexus %d of %d\n", 0, lpm_width);
		gtoI_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_CMP_GT:
		tabbed_printf(out, 0, "# IVL_LPM_CMP_GT\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "# q nexus %d of %d\n", 0, lpm_width);
		gtoI_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_CMP_NE:
		tabbed_printf(out, 0, "# IVL_LPM_CMP_NE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "# q nexus %d of %d\n", 0, lpm_width);
		gtoI_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_SHIFTL:
		tabbed_printf(out, 0, "# IVL_LPM_SHIFTL\n");

		tabbed_printf(out, 0, "# select signals %d\n", ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "# select nexus %d of %d\n", i, lpm_width);
            gtoI_nexus_traverse(ivl_lpm_select(net, i));
		}


		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_SHIFTR:
		tabbed_printf(out, 0, "# IVL_LPM_SHIFTR\n");

		tabbed_printf(out, 0, "# select signals %d\n", ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "# select nexus %d of %d\n", i, lpm_width);
            gtoI_nexus_traverse(ivl_lpm_select(net, i));
		}

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# q nexus %d\n", i);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_DIVIDE:
		tabbed_printf(out, 0, "# IVL_LPM_DIVIDE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_MOD   :
		tabbed_printf(out, 0, "# IVL_LPM_MOD   \n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# datab nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_RAM   :
		tabbed_printf(out, 0, "# IVL_LPM_RAM   \n");

		tabbed_printf(out, 0, "# select signals %d\n", ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "# select nexus %d of %d\n", i, lpm_width);
            gtoI_nexus_traverse(ivl_lpm_select(net, i));
		}

		tabbed_printf(out, 0, "# clock nexus \n");
		gtoI_nexus_traverse(ivl_lpm_clk(net));

		tabbed_printf(out, 0, "# enable nexus\n");
		gtoI_nexus_traverse(ivl_lpm_enable(net));

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "# data nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "# q nexus %d of %d\n", i, lpm_width);
			gtoI_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	default:
			tabbed_printf(out, 0, "# DEFUALT TROUBLE");
		
	}

	tabbed_printf(out, 0, "# finally traverse lpm scope %d\n", i);
	INTERACTIVE
	{
		gtoI_scope_traverse(ivl_lpm_scope(net), NULL);
	}

	tabbed_printf(out, 0, "# END gtoI_lpm_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_lval_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_lval_traverse(ivl_lval_t net, int continue_nexus_traverse)
{
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_lval_traverse\n"); 
	
	if(ivl_lval_mux(net) != 0)
	{
		tabbed_printf(out, 0, "# part off %d\n", ivl_lval_part_off(net)); 
		tabbed_printf(out, 0, "# mux select expression traverse\n"); 
		INTERACTIVE
		{
			gtoI_expression_traverse(ivl_lval_mux(net));	
		}
		tabbed_printf(out, 0, "# lval pins %d\n", ivl_lval_pins(net) );
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				tabbed_printf(out, 0, "# traverse nexus pin %d of %d\n", i, ivl_lval_pins(net));
				INTERACTIVE
				{
					gtoI_nexus_traverse(ivl_lval_pin(net,i));
				}
			}
		}
	}
	if(ivl_lval_mem(net) != 0)
	{
		tabbed_printf(out, 0, "# memory expression traverse\n"); 
		gtoI_memory_traverse(ivl_lval_mem(net));	
		tabbed_printf(out, 0, "# index select expression traverse\n"); 
		gtoI_expression_traverse(ivl_lval_idx(net));	
	}
	if(ivl_lval_sig(net) != 0)
	{
		tabbed_printf(out, 0, "# part off %d\n", ivl_lval_part_off(net)); 
		tabbed_printf(out, 0, "# signal expression traverse\n"); 
		INTERACTIVE
		{
			gtoI_signal_traverse(ivl_lval_sig(net), TRUE);	
		}
		tabbed_printf(out, 0, "# lval pins %d\n", ivl_lval_pins(net) );
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				tabbed_printf(out, 0, "# traverse nexus pin %d of %d\n", i, ivl_lval_pins(net));
				INTERACTIVE
				{
					gtoI_nexus_traverse(ivl_lval_pin(net,i));
				}
			}
		}
	}

	tabbed_printf(out, 0, "# END gtoI_lval_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_scope_traverse )
 *-------------------------------------------------------------------------------------------*/
int gtoI_scope_traverse(ivl_scope_t net, void *null)
{
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net=NULL!\n"); 
		return 0;
	}

	i = sc_add_string(visited_scope_string_cache, (char*)ivl_scope_name(net));

	/* if this scope has been analysed before break */
    if(visited_scope_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# %s ALREADY ANALYSED [SCindex:%ld] \n", ivl_scope_name(net), i);
		return 0;
	}
	visited_scope_string_cache->data[i] = net;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_scope_traverse\n"); 
	tabbed_printf(out, 0, "# name %s\n", ivl_scope_name(net));
	tabbed_printf(out, 0, "# basename %s\n", ivl_scope_basename(net));
	tabbed_printf(out, 0, "# tname %s\n", ivl_scope_tname(net));

    switch (ivl_scope_type(net))
	{
	case IVL_SCT_MODULE:
		tabbed_printf(out, 0, "# IVL_SCT_MODULE\n");
	    break;
	case IVL_SCT_FUNCTION:
		tabbed_printf(out, 0, "# IVL_SCT_FUNCTION\n");
		for(i = 0; i < ivl_scope_ports(net); i++)
		{
			tabbed_printf(out, 0, "# signal port %d of %d in %s\n", i, ivl_scope_ports(net), ivl_scope_name(net));
			gtoI_signal_traverse(ivl_scope_port(net,i), TRUE);
		}
	    break;
	case IVL_SCT_BEGIN:
		tabbed_printf(out, 0, "# IVL_SCT_BEGIN\n");
	    break;
	case IVL_SCT_FORK:
		tabbed_printf(out, 0, "# IVL_SCT_FORK\n");
	    break;
	case IVL_SCT_TASK:
		tabbed_printf(out, 0, "# IVL_SCT_TASK\n");
		tabbed_printf(out, 0, "# traverse scope definition if has one... \n");
			if (ivl_scope_def(net) != NULL)
			{
				INTERACTIVE
				{
					gtoI_stmt_traverse(ivl_scope_def(net));
				}
			}
	    break;
	default:
	    tabbed_printf(out, 0, "#paj UNHANDLED TYPE(%u) %s\n", ivl_scope_type(net),
		    ivl_scope_tname(net));
	}

	for(i = 0; i < ivl_scope_events(net); i++)
	{
		tabbed_printf(out, 0, "# event %d of %d in %s\n", i, ivl_scope_events(net), ivl_scope_name(net));
		INTERACTIVE
		{
			gtoI_event_traverse(ivl_scope_event(net,i), TRUE);
		}
	}
	for(i = 0; i < ivl_scope_logs(net); i++)
	{
		tabbed_printf(out, 0, "# logic %d of %d in %s\n", i, ivl_scope_logs(net),  ivl_scope_name(net));
		INTERACTIVE
		{
			gtoI_logic_traverse(ivl_scope_log(net,i), TRUE);
		}
	}
	for(i = 0; i < ivl_scope_lpms(net); i++)
	{
		tabbed_printf(out, 0, "# lpm %d of %d in %s\n", i, ivl_scope_lpms(net), ivl_scope_name(net));
		INTERACTIVE
		{
			gtoI_lpm_traverse(ivl_scope_lpm(net,i));
		}
	}
	for(i = 0; i < ivl_scope_mems(net); i++)
	{
		tabbed_printf(out, 0, "# memory %d of %d in %s\n", i, ivl_scope_mems(net), ivl_scope_name(net));
		INTERACTIVE
		{
			gtoI_memory_traverse(ivl_scope_mem(net,i));
		}
	}
	for(i = 0; i < ivl_scope_sigs(net); i++)
	{
		tabbed_printf(out, 0, "# signals %d of %d in %s\n", i, ivl_scope_sigs(net), ivl_scope_name(net));
		INTERACTIVE
		{
			gtoI_signal_traverse(ivl_scope_sig(net,i), TRUE);
		}
	}

	tabbed_printf(out, 0, "# has parent %d and traversing children\n", ivl_scope_parent(net));
	/* traverse all the children of this scope */
	INTERACTIVE
	{
		ivl_scope_children(net, gtoI_scope_traverse, NULL);
	}

	tabbed_printf(out, 0, "# END gtoI_scope_traverse\n"); 
	tabbed_spaces(BAT); 

	return 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_signal_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_signal_traverse(ivl_signal_t net, int continue_nexus_traverse)
{
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	i = sc_add_string(visited_signal_string_cache, (char*)ivl_signal_basename(net));

	/* if this scope has been analysed before break */
    if(visited_signal_string_cache->data[i] != NULL)
	{
		tabbed_printf(out, 0, "# named:%s already analysed [SCindex:%ld] \n", ivl_signal_basename(net), i);
		return;
	}
	visited_signal_string_cache->data[i] = net;	/* mark this scope */

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_signal_traverse\n"); 
	tabbed_printf(out, 0, "# name %s\n", ivl_signal_name(net)); 
	tabbed_printf(out, 0, "# basename %s\n", ivl_signal_basename(net)); 
	tabbed_printf(out, 0, "# signed value %d\n", ivl_signal_signed(net)); 
	/* extern const char* ivl_signal_attr(ivl_signal_t net, const char*key); */
	switch(ivl_signal_port(net))
	{
		case IVL_SIP_NONE:
			tabbed_printf(out, 0, "# port direction IVL_SIP_NONE\n");
			break;
		case IVL_SIP_INPUT:
			tabbed_printf(out, 0, "# port direction IVL_SIP_INPUT\n");
			break;
		case IVL_SIP_OUTPUT:
			tabbed_printf(out, 0, "# port direction IVL_SIP_OUTPUT\n");
			break;
		case IVL_SIP_INOUT:
			tabbed_printf(out, 0, "# port direction IVL_SIP_INOUT\n");
			break;
	}
    tabbed_printf(out, 0, "# signal type:");
	switch(ivl_signal_type(net))
	{
      case IVL_SIT_NONE:
      	fprintf(out, " IVL_SIT_NONE\n");
		break;
      case IVL_SIT_REG:
      	fprintf(out, " IVL_SIT_REG\n");
		break;
      case IVL_SIT_SUPPLY0:
      	fprintf(out, " IVL_SIT_SUPPLY0\n");
		break;
      case IVL_SIT_SUPPLY1:
      	fprintf(out, " IVL_SIT_SUPPLY1\n");
		break;
      case IVL_SIT_TRI:
      	fprintf(out, " IVL_SIT_TRI\n");
		break;
      case IVL_SIT_TRI0:
      	fprintf(out, " IVL_SIT_TRI0\n");
		break;
      case IVL_SIT_TRI1:
      	fprintf(out, " IVL_SIT_TRI1\n");
		break;
      case IVL_SIT_TRIAND:
      	fprintf(out, " IVL_SIT_TRIAND\n");
		break;
      case IVL_SIT_TRIOR:
      	fprintf(out, " IVL_SIT_TRIOR\n");
		break;
	  default:
	  	fprintf(out, " DEFAULT\n");
	}

	if (continue_nexus_traverse == TRUE)
	{
		for (i = 0; i < ivl_signal_pins(net); i++)
		{
			tabbed_printf(out, 0, "# traversing nexus pin %d of %d in %s\n", i, ivl_signal_pins(net), ivl_signal_basename(net)); 
			INTERACTIVE
			{
				gtoI_nexus_traverse(ivl_signal_pin(net, i));
			}
		}
	}


	tabbed_printf(out, 0, "# END gtoI_signal_traverse\n"); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_process_traverse )
 *-------------------------------------------------------------------------------------------*/
int  gtoI_process_traverse(ivl_process_t net, void *null)
{
	if (net == NULL)
	{
		tabbed_printf(out, 0, "# NULL value!\n"); 
		return 0;
	}

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_process_traverse\n"); 

	if (ivl_process_type(net) == IVL_PR_INITIAL)
	{
		tabbed_printf(out, 0, "# type:IVL_PR_INITIAL\n"); 
	}
	else
	{
		tabbed_printf(out, 0, "# type:IVL_PR_ALWAYS\n"); 
	}

	tabbed_printf(out, 0, "# SCOPE-----------------------\n"); 
	if (ivl_process_scope(net) != NULL)
	{
		INTERACTIVE
		{
			gtoI_scope_traverse(ivl_process_scope(net), null);
		}
	}
	tabbed_printf(out, 0, "# -----------------------\n"); 


	tabbed_printf(out, 0, "# STATEMENTS-------------------\n"); 
	if(ivl_process_stmt(net) != NULL)
	{
		INTERACTIVE
		{
			gtoI_stmt_traverse(ivl_process_stmt(net));
		}
	}
	tabbed_printf(out, 0, "# -----------------------\n"); 

	tabbed_printf(out, 0, "# END gtoI_process_traverse\n"); 
	tabbed_spaces(BAT); 

	return 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoI_stmt_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoI_stmt_traverse(ivl_statement_t net)
{
	int i;

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		return;
	}

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoI_stmt_traverse\n"); 

	switch (ivl_statement_type(net)) 
	{
	  case IVL_ST_NONE:
	  	tabbed_printf(out, 0, "# IVL_ST_NONE\n");
		break;
      case IVL_ST_NOOP:
      	tabbed_printf(out, 0, "# IVL_ST_NOOP\n");
		break;
      case IVL_ST_ASSIGN:
      	tabbed_printf(out, 0, "# IVL_ST_ASSIGN\n");
		tabbed_printf(out, 0, "# Statement width %d\n",  ivl_stmt_lwidth(net));
      	tabbed_printf(out, 0, "# rval expression\n");
		if (ivl_stmt_rval(net) != NULL)
		{
			gtoI_expression_traverse(ivl_stmt_rval(net));
		}
      	tabbed_printf(out, 0, "# delay expression\n");
		if (ivl_stmt_delay_expr(net) != NULL)
		{
			gtoI_expression_traverse(ivl_stmt_delay_expr(net));
		}
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i,  ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_ASSIGN_NB:
      	tabbed_printf(out, 0, "# IVL_ST_ASSIGN_NB\n");
		tabbed_printf(out, 0, "# Statement width %d\n",  ivl_stmt_lwidth(net));
      	tabbed_printf(out, 0, "# rval expression\n");
		gtoI_expression_traverse(ivl_stmt_rval(net));
      	tabbed_printf(out, 0, "# delay expression\n");
		gtoI_expression_traverse(ivl_stmt_delay_expr(net));

		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i, ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_BLOCK:
      	tabbed_printf(out, 0, "# IVL_ST_BLOCK\n");
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
      		tabbed_printf(out, 0, "# blocks %d of %d\n", i,  ivl_stmt_block_count(net));
			gtoI_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_CASE:
      	tabbed_printf(out, 0, "# IVL_ST_CASE\n");
      	tabbed_printf(out, 0, "# case condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEX:
      	tabbed_printf(out, 0, "# IVL_ST_CASEX\n");
		tabbed_printf(out, 0, "# case condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEZ:
      	tabbed_printf(out, 0, "# IVL_ST_CASEZ\n");
		tabbed_printf(out, 0, "# case condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "# case expression %d of %d\n", i, ivl_stmt_case_count(net));
			gtoI_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASSIGN:
      	tabbed_printf(out, 0, "# IVL_ST_CASSIGN\n");
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d\n", i,  ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}

		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
      		tabbed_printf(out, 0, "# nexus traverse %d of %d\n", i, ivl_stmt_nexus_count(net));
			gtoI_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_CONDIT:
      	tabbed_printf(out, 0, "# IVL_ST_CONDIT\n");
		tabbed_printf(out, 0, "# condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));

		tabbed_printf(out, 0, "# condition false statement\n");
		gtoI_stmt_traverse( ivl_stmt_cond_false(net));

		tabbed_printf(out, 0, "# condition true statement\n");
		gtoI_stmt_traverse( ivl_stmt_cond_true(net));

		break;
      case IVL_ST_DEASSIGN:
      	tabbed_printf(out, 0, "# IVL_ST_DEASSIGN\n");
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i, ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_DELAY:
      	tabbed_printf(out, 0, "# IVL_ST_DELAY\n");
		tabbed_printf(out, 0, "# sub statement\n");
		gtoI_stmt_traverse( ivl_stmt_sub_stmt(net));

      	tabbed_printf(out, 0, "# delay value %d\n", ivl_stmt_delay_val(net));
		break;
      case IVL_ST_DELAYX:
      	tabbed_printf(out, 0, "# IVL_ST_DELAYX\n");
		tabbed_printf(out, 0, "# sub statement\n");
		gtoI_stmt_traverse( ivl_stmt_sub_stmt(net));

      	tabbed_printf(out, 0, "# delay value %d\n", ivl_stmt_delay_val(net));
		break;
      case IVL_ST_DISABLE:
      	tabbed_printf(out, 0, "# IVL_ST_DISABLE\n");
		tabbed_printf(out, 0, "# scope traverse\n");
		gtoI_scope_traverse(ivl_stmt_call(net), NULL);
		break;
      case IVL_ST_FORCE:
      	tabbed_printf(out, 0, "# IVL_ST_FORCE\n");
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i, ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}

		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
      		tabbed_printf(out, 0, "# nexus traverse %d of %d\n", i, ivl_stmt_nexus_count(net));
			gtoI_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_FOREVER:
      	tabbed_printf(out, 0, "# IVL_ST_FOREVER\n");
		tabbed_printf(out, 0, "# sub statement\n");
		gtoI_stmt_traverse( ivl_stmt_sub_stmt(net));
		break;
      case IVL_ST_FORK:
      	tabbed_printf(out, 0, "# IVL_ST_FORK\n");
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
      		tabbed_printf(out, 0, "# blocks %d of %d\n", i, ivl_stmt_block_count(net));
			gtoI_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_RELEASE:
      	tabbed_printf(out, 0, "# IVL_ST_RELEASE\n");
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i, ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_REPEAT:
      	tabbed_printf(out, 0, "# IVL_ST_REPEAT\n");
		tabbed_printf(out, 0, "# case condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "# lvals %d of %d\n", i, ivl_stmt_lvals(net));
			gtoI_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_STASK:
      	tabbed_printf(out, 0, "# IVL_ST_STASK\n");
      	tabbed_printf(out, 0, "# stmt_name %s\n", ivl_stmt_name(net));

		for (i = 0; i < ivl_stmt_parm_count(net); i++)
		{
      		tabbed_printf(out, 0, "# parameters %d of %d\n", i,  ivl_stmt_parm_count(net));
			gtoI_expression_traverse(ivl_stmt_parm(net, i));
		}
		break;
      case IVL_ST_TRIGGER:
      	tabbed_printf(out, 0, "# IVL_ST_TRIGGER\n");
		break;
      case IVL_ST_UTASK:
      	tabbed_printf(out, 0, "# IVL_ST_UTASK\n");
		tabbed_printf(out, 0, "# stmt call traverse scope\n");
		gtoI_scope_traverse(ivl_stmt_call(net), NULL);
		break;
      case IVL_ST_WAIT:
      	tabbed_printf(out, 0, "# IVL_ST_WAIT\n");
		tabbed_printf(out, 0, "# sub statement\n");
		gtoI_stmt_traverse( ivl_stmt_sub_stmt(net));

		tabbed_printf(out, 0, "# event traverse\n");
		for (i = 0; i < ivl_stmt_nevent(net); i++)
		{
			gtoI_event_traverse(ivl_stmt_events(net, i), TRUE);
		}
		break;
	  case IVL_ST_WHILE:
	  	tabbed_printf(out, 0, "# IVL_ST_WHILE\n");
		tabbed_printf(out, 0, "# sub statement\n");
		gtoI_stmt_traverse( ivl_stmt_sub_stmt(net));

		tabbed_printf(out, 0, "# case condition expression\n");
		gtoI_expression_traverse( ivl_stmt_cond_expr(net));
		break;

	  default:
		tabbed_printf(out, 0, "# DEFAULT CASE\n");
		break;
	}

	tabbed_printf(out, 0, "# END gtoI_stmt_traverse\n"); 
	tabbed_spaces(BAT); 
}
