
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

/* This is another piece of the traveral code that I use to help understand the IR. This one traverses the modules and LPMs
 * defined in ICARUS to describe what they have inside them. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "generic_traversal_of_IR_for_lpm_signal_module_links.h"
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

/****************************************************************************************************
 * FUNCTIONS
 ***************************************************************************************************/
int stmt_and_expressions_examine;
char global_char;

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_design_traversal )
 * 	Traverses the IR, only really considering how LPM and modules relate to the IR instead
 * 	of every little bit of functionality.
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_design_traversal(ivl_design_t design, int stmt_and_expressions)
{
	ivl_scope_t top_level_module;
	
	global_char = 'P';

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "#%c gtoIflsml_design_traversal\n", global_char); 

	stmt_and_expressions_examine = stmt_and_expressions; 

	/* go through the processes defined in this design */
	if(ivl_design_process(design, gtoIflsml_process_traverse, 0) == 0)
	{
		tabbed_printf(out, 0, "#%c No processes so examining top\n", global_char); 
		/* grab the top level module in the verilog hierarchy */
		top_level_module = ivl_design_root(design);
		gtoIflsml_scope_traverse_modules(top_level_module, NULL);
	}

	tabbed_printf(out, 0, "#%c END  gtoIflsml_design_traversal\n", global_char); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_process_traverse )
 *-------------------------------------------------------------------------------------------*/
int  gtoIflsml_process_traverse(ivl_process_t net, void *null)
{
	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return 0;
	}

	if (ivl_process_type(net) == IVL_PR_INITIAL)
	{
		tabbed_printf(out, 0, "#%c Process type IVL_PR_INITIAL\n", global_char); 
	}
	else
	{
		tabbed_printf(out, 0, "#%c Process type IVL_PR_ALWAYS\n", global_char); 
	}

	tabbed_printf(out, 0, "#%c Traversing scope of process\n", global_char); 
	if (ivl_process_scope(net) != NULL)
	{
		gtoIflsml_scope_traverse_modules(ivl_process_scope(net), null);
	}

	if(ivl_process_stmt(net) != NULL)
	{
		if(stmt_and_expressions_examine == TRUE)
		{
			tabbed_printf(out, 0, "#%c Traversing statement\n", global_char); 
			gtoIflsml_stmt_traverse(ivl_process_stmt(net));
		}
	}

	tabbed_spaces(BAT); 

	return 0;
}
/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_scope_traverse_modules )
 *-------------------------------------------------------------------------------------------*/
int gtoIflsml_scope_traverse_modules(ivl_scope_t net, void *null)
{
	int i;

	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return 0;
	}

	tabbed_printf(out, 0, "#%c name %s, basename %s, tname %s\n", global_char, ivl_scope_name(net), ivl_scope_basename(net),ivl_scope_tname(net));

	assert((ivl_scope_type(net) == IVL_SCT_MODULE)||(ivl_scope_type(net) == IVL_SCT_FUNCTION));

	/* show all signals in this module */
	for(i = 0; i < ivl_scope_sigs(net); i++)
	{
		gtoIflsml_signal_show(ivl_scope_sig(net, i), TRUE);
    }

	/* traverse logic */
	for(i = 0; i < ivl_scope_logs(net); i++)
	{
		tabbed_printf(out, 0, "#%c logic %d of %d in %s\n", global_char, i, ivl_scope_logs(net),  ivl_scope_name(net));
		gtoIflsml_logic_traverse(ivl_scope_log(net,i), TRUE);
	}

	/* traverse lpms */
	for(i = 0; i < ivl_scope_lpms(net); i++)
	{
		tabbed_printf(out, 0, "#%c lpm %d of %d in %s\n", global_char, i, ivl_scope_lpms(net), ivl_scope_name(net));
		gtoIflsml_lpm_traverse(ivl_scope_lpm(net,i));
	}

	if (ivl_scope_type(net) == IVL_SCT_FUNCTION)
	{
		if(ivl_scope_def(net) != NULL)
		{
			tabbed_printf(out, 0, "#%c Traversing statement\n", global_char); 
			gtoIflsml_stmt_traverse(ivl_scope_def(net));
		}
	}

	tabbed_printf(out, 0, "#%c has parent %d and traversing children\n", global_char, ivl_scope_parent(net));
	/* traverse all the children of this scope */
	global_char = 'C';
	ivl_scope_children(net, gtoIflsml_scope_traverse_modules, NULL);
	global_char = 'P';

	tabbed_spaces(BAT); 

	return 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_signal_show )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_signal_show(ivl_signal_t net, int nexus_traverse)
{
	int i;

	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	tabbed_printf(out, 0, "# %s\t\t", ivl_signal_basename(net)); 
	fprintf(out, " gtoIflsml_signal_show name:%s;", ivl_signal_name(net)); 
	fprintf(out, " basename %s;", ivl_signal_basename(net)); 
	fprintf(out, " signed value %d;", ivl_signal_signed(net)); 

	switch(ivl_signal_port(net))
	{
		case IVL_SIP_NONE:
			fprintf(out, " port direction IVL_SIP_NONE;");
			break;
		case IVL_SIP_INPUT:
			fprintf(out, " port direction IVL_SIP_INPUT;");
			break;
		case IVL_SIP_OUTPUT:
			fprintf(out, " port direction IVL_SIP_OUTPUT;");
			break;
		case IVL_SIP_INOUT:
			fprintf(out, " port direction IVL_SIP_INOUT;");
			break;
	}

    fprintf(out, "#%c signal type:", global_char);
	switch(ivl_signal_type(net))
	{
      case IVL_SIT_NONE:
      	fprintf(out, "#%c IVL_SIT_NONE\n", global_char);
		break;
      case IVL_SIT_REG:
      	fprintf(out, "#%c IVL_SIT_REG\n", global_char);
		break;
      case IVL_SIT_SUPPLY0:
      	fprintf(out, "#%c IVL_SIT_SUPPLY0\n", global_char);
		break;
      case IVL_SIT_SUPPLY1:
      	fprintf(out, "#%c IVL_SIT_SUPPLY1\n", global_char);
		break;
      case IVL_SIT_TRI:
      	fprintf(out, "#%c IVL_SIT_TRI\n", global_char);
		break;
      case IVL_SIT_TRI0:
      	fprintf(out, "#%c IVL_SIT_TRI0\n", global_char);
		break;
      case IVL_SIT_TRI1:
      	fprintf(out, "#%c IVL_SIT_TRI1\n", global_char);
		break;
      case IVL_SIT_TRIAND:
      	fprintf(out, "#%c IVL_SIT_TRIAND\n", global_char);
		break;
      case IVL_SIT_TRIOR:
      	fprintf(out, "#%c IVL_SIT_TRIOR\n", global_char);
		break;
	  default:
	  	fprintf(out, "#%c DEFAULT\n", global_char);
	}

	if (nexus_traverse == TRUE)
	{
		for(i = 0; i < ivl_signal_pins(net); i++)
		{
			gtoIflsml_nexus_traverse(ivl_signal_pin(net, i));
		}
	}


	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_lpm_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_lpm_traverse(ivl_lpm_t net)
{

	char*    lpm_name;
	char*    lpm_basename;
	unsigned lpm_width;
	int i, j;
	
	tabbed_spaces(TAB); 

	lpm_name = (char*)ivl_lpm_name(net);
	lpm_basename = (char*)ivl_lpm_basename(net);
	lpm_width = ivl_lpm_width(net);

	tabbed_printf(out, 0, "#%c lpm_name %s;", global_char, lpm_name); 
	fprintf(out, " lpm_basename %s;", lpm_basename); 
	fprintf(out, " lpm_width %d;", lpm_width); 

    switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
		fprintf(out, "#%c IVL_LPM_ADD\n", global_char);
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_SUB:
		fprintf(out, " IVL_LPM_SUB\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_FF:
		fprintf(out, " IVL_LPM_FF\n");
		tabbed_printf(out, 0, "#%c clock nexus \n", global_char);
		gtoIflsml_nexus_traverse(ivl_lpm_clk(net));
//		tabbed_printf(out, 0, "#%c enable nexus\n", global_char);
//		gtoIflsml_nexus_traverse(ivl_lpm_enable(net));
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_MULT:
		fprintf(out, " IVL_LPM_MULT\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_MUX:
		fprintf(out, " IVL_LPM_MUX\n");

		tabbed_printf(out, 0, "#%c select signals %d\n", global_char, ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "#%c select nexus %d of %d\n", global_char, i, lpm_width);
            gtoIflsml_nexus_traverse(ivl_lpm_select(net, i));
		}

		tabbed_printf(out, 0, "#%c size %d\n", global_char, ivl_lpm_size(net));
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data2 nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data2(net, 0, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	    break;
	case IVL_LPM_CMP_EQ:
		fprintf(out, " IVL_LPM_CMP_EQ\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, 0, lpm_width);
		gtoIflsml_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_CMP_GE:
		fprintf(out, " IVL_LPM_CMP_GE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, 0, lpm_width);
		gtoIflsml_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_CMP_GT:
		fprintf(out, " IVL_LPM_CMP_GT\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, 0, lpm_width);
		gtoIflsml_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_CMP_NE:
		fprintf(out, " IVL_LPM_CMP_NE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
		}
		tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, 0, lpm_width);
		gtoIflsml_nexus_traverse(ivl_lpm_q(net, 0));
		break;
	case IVL_LPM_SHIFTL:
		fprintf(out, " IVL_LPM_SHIFTL\n");

		tabbed_printf(out, 0, "#%c select signals %d\n", global_char, ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "#%c select nexus %d of %d\n", global_char, i, lpm_width);
            gtoIflsml_nexus_traverse(ivl_lpm_select(net, i));
		}

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_SHIFTR:
		fprintf(out, " IVL_LPM_SHIFTR\n");

		tabbed_printf(out, 0, "#%c select signals %d\n", global_char, ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "#%c select nexus %d of %d\n", global_char, i, lpm_width);
            gtoIflsml_nexus_traverse(ivl_lpm_select(net, i));
		}

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d\n", global_char, i);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_DIVIDE:
		fprintf(out, " IVL_LPM_DIVIDE\n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_MOD   :
		fprintf(out, " IVL_LPM_MOD   \n");
		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			tabbed_printf(out, 0, "#%c datab nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_datab(net, i));
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	case IVL_LPM_RAM   :
		fprintf(out, " IVL_LPM_RAM   \n");

		tabbed_printf(out, 0, "#%c select signals %d\n", global_char, ivl_lpm_selects(net));
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
			tabbed_printf(out, 0, "#%c select nexus %d of %d\n", global_char, i, lpm_width);
            gtoIflsml_nexus_traverse(ivl_lpm_select(net, i));
		}

		if (ivl_lpm_clk(net) != NULL)
		{
			tabbed_printf(out, 0, "#%c clock nexus \n", global_char);
			gtoIflsml_nexus_traverse(ivl_lpm_clk(net));

			/* write port only exists if clock is hooked up */
			for(i = 0; i < lpm_width; i++)
			{
				tabbed_printf(out, 0, "#%c data nexus %d of %d\n", global_char, i, lpm_width);
				gtoIflsml_nexus_traverse(ivl_lpm_data(net, i));
			}
		}

		if (ivl_lpm_enable(net) != NULL)
		{
			tabbed_printf(out, 0, "#%c enable nexus\n", global_char);
			gtoIflsml_nexus_traverse(ivl_lpm_enable(net));
		}

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}

		gtoIflsml_memory_traverse(ivl_lpm_memory(net));
		break;
	case IVL_LPM_UFUNC :
		tabbed_printf(out, 0, " IVL_LPM_UFUNC\n");

		tabbed_printf(out, 0, "#%c UFUNC traverse scope:\n", global_char);
//		gtoIflsml_scope_traverse(ivl_lpm_define(net), NULL);

		/* get the number of function ports. -1 for output port */
		for (i = 0; i < ivl_lpm_size(net)-1; i++)
		{
			/* find the width of each port */
			for (j = 0; j < ivl_lpm_data2_width(net, i); j++)
			{
				tabbed_printf(out, 0, "#%c port %d data2 nexus %d of %d\n", global_char, i, j, lpm_width);
				gtoIflsml_nexus_traverse(ivl_lpm_data2(net, i, j));
			}
		}

		for(i = 0; i < lpm_width; i++)
		{
			tabbed_printf(out, 0, "#%c q nexus %d of %d\n", global_char, i, lpm_width);
			gtoIflsml_nexus_traverse(ivl_lpm_q(net, i));
		}
	
		break;
	default:
			tabbed_printf(out, 0, "#%c DEFUALT TROUBLE");
		
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_top_most_level )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_logic_traverse(ivl_net_logic_t net, int continue_nexus_traverse)
{
	char* logic_name;
	char* logic_basename;
	unsigned    logic_pins;
	int i;

	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	logic_name = (char*)ivl_logic_name(net);
	logic_basename = (char*)ivl_logic_basename(net);
	tabbed_printf(out, 0, "#%c logic name %s;", global_char, logic_name );
	fprintf(out, " logic basename %s;", logic_basename );

	logic_pins = ivl_logic_pins(net);

    switch (ivl_logic_type(net))
	{
	case IVL_LO_NONE:
		fprintf(out, " IVL_LO_NONE;");
		break;
	case IVL_LO_NMOS:
		fprintf(out, " IVL_LO_NMOS;");
		break;
	case IVL_LO_NOTIF0:
		fprintf(out, " IVL_LO_NOTIF0;");
		break;
	case IVL_LO_NOTIF1:
		fprintf(out, " IVL_LO_NOTIF1;");
		break;
	case IVL_LO_RNMOS:
		fprintf(out, " IVL_LO_RNMOS;");
		break;
	case IVL_LO_RPMOS:
		fprintf(out, " IVL_LO_RPMOS;");
		break;
	case IVL_LO_PMOS:
		fprintf(out, " IVL_LO_PMOS;");
		break;
	case IVL_LO_EEQ:
		fprintf(out, " IVL_LO_EEQ;");
		break;
	case IVL_LO_UDP:
		fprintf(out, " IVL_LO_UDP;");
		break;
	case IVL_LO_AND:
		fprintf(out, " IVL_LO_AND;");
		break;
	case IVL_LO_NAND:
		fprintf(out, " IVL_LO_NAND;");
		break;
	case IVL_LO_NOR:
		fprintf(out, " IVL_LO_NOR;");
		break;
	case IVL_LO_OR:
		fprintf(out, " IVL_LO_OR;");
		break;
	case IVL_LO_XOR:
		fprintf(out, " IVL_LO_XOR;");
		break;
	case IVL_LO_XNOR:
		fprintf(out, " IVL_LO_XNOR;");
		break;
	case IVL_LO_BUF:
		fprintf(out, " IVL_LO_BUF;");
		break;
	case IVL_LO_BUFIF0:
		fprintf(out, " IVL_LO_BUFIF0;");
		break;
	case IVL_LO_BUFIF1:
		fprintf(out, " IVL_LO_BUFIF1;");
		break;
	case IVL_LO_BUFZ:
		fprintf(out, " IVL_LO_BUFZ;");
		break;
	case IVL_LO_NOT:
		fprintf(out, " IVL_LO_NOT;");
		break;
	case IVL_LO_PULLDOWN:
		fprintf(out, " IVL_LO_PULLDOWN;");
		break;
	case IVL_LO_PULLUP:
		fprintf(out, " IVL_LO_PULLUP;");
		break;
	default:
		fprintf(out, "paj PORTREF FOR UNDEFINED LOGIC CELL;");
		break;
	}


	fprintf(out, " logic pins %d\n", logic_pins );

	for (i = 0; i < logic_pins; i++)
	{
		tabbed_printf(out, 0, "#%c traverse nexus pin %d of %d in %s\n", global_char, i, logic_pins, logic_name );
		gtoIflsml_nexus_traverse(ivl_logic_pin(net, i));
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_nexus_ptr_traverse )
 * 	Look at a nexus and determine what type of ptr it has
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_nexus_ptr_traverse(ivl_nexus_ptr_t net)
{
	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	tabbed_printf(out, 0, "#%c Nexus Ptr pin %d; ", global_char, ivl_nexus_ptr_pin(net));
	fprintf(out, " drive1 %d;", ivl_nexus_ptr_drive1(net));
	fprintf(out, " drive0 %d;", ivl_nexus_ptr_drive0(net));
	
	if (ivl_nexus_ptr_con(net) != NULL)
	{
		fprintf(out, " constant bits:%s\n", ivl_const_bits(ivl_nexus_ptr_con(net)));
	}

	if (ivl_nexus_ptr_log(net) != NULL)
	{
		fprintf(out, " logic name:%s\n", ivl_logic_name(ivl_nexus_ptr_log(net)));
	}

	if (ivl_nexus_ptr_lpm(net) != NULL)
	{
		fprintf(out, " lpm name:%s\n" , ivl_lpm_name(ivl_nexus_ptr_lpm(net)));
	}

	if (ivl_nexus_ptr_sig(net) != NULL)
	{
		fprintf(out, "\n");
		gtoIflsml_signal_show(ivl_nexus_ptr_sig(net), FALSE);
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_nexus_traverse )
 * 	Go through each nexus and its respective pointers
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_nexus_traverse(ivl_nexus_t net)
{
	int i;
	int *number_times_visited;

	tabbed_spaces(TAB); 

	if (ivl_nexus_get_private(net) == NULL)
	{
		number_times_visited = (int*)ou_malloc(sizeof(int)*1, GENERIC_TRAVERSAL_OF_IR_FOR_LPM_SIGNAL_MODULE_LINKS);
		ivl_nexus_set_private(net, (void*)number_times_visited);
		*number_times_visited = 0;
	}
	else
	{
		number_times_visited = (int*)ivl_nexus_get_private(net);
		*number_times_visited++;
	}

	tabbed_printf(out, 0, "#%c Nexus Name %s;", global_char, ivl_nexus_name(net));
	/* used to save data at this location */
	fprintf(out, " Number Pointers %d\n", ivl_nexus_ptrs(net));

	for (i = 0; i < ivl_nexus_ptrs(net); i++)
	{
		tabbed_printf(out, 0, "#%c Examining pin %d of %d in %s\n", global_char, i, ivl_nexus_ptrs(net),  ivl_nexus_name(net) );
		gtoIflsml_nexus_ptr_traverse(ivl_nexus_ptr(net, i));	
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_stmt_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_stmt_traverse(ivl_statement_t net)
{
	int i;

	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	switch (ivl_statement_type(net)) 
	{
	  case IVL_ST_NONE:
	  	tabbed_printf(out, 0, "#%c IVL_ST_NONE\n", global_char);
		break;
      case IVL_ST_NOOP:
      	tabbed_printf(out, 0, "#%c IVL_ST_NOOP\n", global_char);
		break;
      case IVL_ST_ASSIGN:
      	tabbed_printf(out, 0, "#%c IVL_ST_ASSIGN\n", global_char);

		tabbed_printf(out, 0, "#%c Statement width %d\n", global_char,  ivl_stmt_lwidth(net));

      	tabbed_printf(out, 0, "#%c rval expression\n", global_char);
		if (ivl_stmt_rval(net) != NULL)
		{
			gtoIflsml_expression_traverse(ivl_stmt_rval(net));
		}

      	tabbed_printf(out, 0, "#%c delay expression\n", global_char);
		if (ivl_stmt_delay_expr(net) != NULL)
		{
			gtoIflsml_expression_traverse(ivl_stmt_delay_expr(net));
		}

		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i,  ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_ASSIGN_NB:
      	tabbed_printf(out, 0, "#%c IVL_ST_ASSIGN_NB\n", global_char);

		tabbed_printf(out, 0, "#%c Statement width %d\n", global_char,  ivl_stmt_lwidth(net));

      	tabbed_printf(out, 0, "#%c rval expression\n", global_char);
		gtoIflsml_expression_traverse(ivl_stmt_rval(net));

      	tabbed_printf(out, 0, "#%c delay expression\n", global_char);
		gtoIflsml_expression_traverse(ivl_stmt_delay_expr(net));

		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i, ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_BLOCK:
      	tabbed_printf(out, 0, "#%c IVL_ST_BLOCK\n", global_char);
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c blocks %d of %d\n", global_char, i,  ivl_stmt_block_count(net));
			gtoIflsml_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_CASE:
      	tabbed_printf(out, 0, "#%c IVL_ST_CASE\n", global_char);
      	tabbed_printf(out, 0, "#%c case condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEX:
      	tabbed_printf(out, 0, "#%c IVL_ST_CASEX\n", global_char);
		tabbed_printf(out, 0, "#%c case condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEZ:
      	tabbed_printf(out, 0, "#%c IVL_ST_CASEZ\n", global_char);
		tabbed_printf(out, 0, "#%c case condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_expression_traverse(ivl_stmt_case_expr(net, i));
      		tabbed_printf(out, 0, "#%c case expression %d of %d\n", global_char, i, ivl_stmt_case_count(net));
			gtoIflsml_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASSIGN:
      	tabbed_printf(out, 0, "#%c IVL_ST_CASSIGN\n", global_char);
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d\n", global_char, i,  ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}

		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c nexus traverse %d of %d\n", global_char, i, ivl_stmt_nexus_count(net));
			gtoIflsml_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_CONDIT:
      	tabbed_printf(out, 0, "#%c IVL_ST_CONDIT\n", global_char);
		tabbed_printf(out, 0, "#%c condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));

		tabbed_printf(out, 0, "#%c condition false statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_cond_false(net));

		tabbed_printf(out, 0, "#%c condition true statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_cond_true(net));

		break;
      case IVL_ST_DEASSIGN:
      	tabbed_printf(out, 0, "#%c IVL_ST_DEASSIGN\n", global_char);
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i, ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_DELAY:
      	tabbed_printf(out, 0, "#%c IVL_ST_DELAY\n", global_char);
		tabbed_printf(out, 0, "#%c sub statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_sub_stmt(net));

      	tabbed_printf(out, 0, "#%c delay value %d\n", global_char, ivl_stmt_delay_val(net));
		break;
      case IVL_ST_DELAYX:
      	tabbed_printf(out, 0, "#%c IVL_ST_DELAYX\n", global_char);
		tabbed_printf(out, 0, "#%c sub statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_sub_stmt(net));

      	tabbed_printf(out, 0, "#%c delay value %d\n", global_char, ivl_stmt_delay_val(net));
		break;
      case IVL_ST_DISABLE:
      	tabbed_printf(out, 0, "#%c IVL_ST_DISABLE\n", global_char);
		break;
      case IVL_ST_FORCE:
      	tabbed_printf(out, 0, "#%c IVL_ST_FORCE\n", global_char);
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i, ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}

		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c nexus traverse %d of %d\n", global_char, i, ivl_stmt_nexus_count(net));
			gtoIflsml_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_FOREVER:
      	tabbed_printf(out, 0, "#%c IVL_ST_FOREVER\n", global_char);
		tabbed_printf(out, 0, "#%c sub statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_sub_stmt(net));
		break;
      case IVL_ST_FORK:
      	tabbed_printf(out, 0, "#%c IVL_ST_FORK\n", global_char);
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c blocks %d of %d\n", global_char, i, ivl_stmt_block_count(net));
			gtoIflsml_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_RELEASE:
      	tabbed_printf(out, 0, "#%c IVL_ST_RELEASE\n", global_char);
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i, ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_REPEAT:
      	tabbed_printf(out, 0, "#%c IVL_ST_REPEAT\n", global_char);
		tabbed_printf(out, 0, "#%c case condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));

		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
      		tabbed_printf(out, 0, "#%c lvals %d of %d\n", global_char, i, ivl_stmt_lvals(net));
			gtoIflsml_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_STASK:
      	tabbed_printf(out, 0, "#%c IVL_ST_STASK\n", global_char);
      	tabbed_printf(out, 0, "#%c stmt_name %s\n", global_char, ivl_stmt_name(net));

		for (i = 0; i < ivl_stmt_parm_count(net); i++)
		{
      		tabbed_printf(out, 0, "#%c parameters %d of %d\n", global_char, i,  ivl_stmt_parm_count(net));
			gtoIflsml_expression_traverse(ivl_stmt_parm(net, i));
		}
		break;
      case IVL_ST_TRIGGER:
      	tabbed_printf(out, 0, "#%c IVL_ST_TRIGGER\n", global_char);
		break;
      case IVL_ST_UTASK:
      	tabbed_printf(out, 0, "#%c IVL_ST_UTASK\n", global_char);
		break;
      case IVL_ST_WAIT:
      	tabbed_printf(out, 0, "#%c IVL_ST_WAIT\n", global_char);
		tabbed_printf(out, 0, "#%c sub statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_sub_stmt(net));

		tabbed_printf(out, 0, "#%c event traverse\n", global_char);
		for (i = 0; i < ivl_stmt_nevent(net); i++)
		{
			gtoIflsml_event_traverse(ivl_stmt_events(net, i), TRUE);
		}
		break;
	  case IVL_ST_WHILE:
	  	tabbed_printf(out, 0, "#%c IVL_ST_WHILE\n", global_char);
		tabbed_printf(out, 0, "#%c sub statement\n", global_char);
		gtoIflsml_stmt_traverse( ivl_stmt_sub_stmt(net));

		tabbed_printf(out, 0, "#%c case condition expression\n", global_char);
		gtoIflsml_expression_traverse( ivl_stmt_cond_expr(net));
		break;

	  default:
		tabbed_printf(out, 0, "#%c DEFAULT CASE\n", global_char);
		break;
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_event_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_event_traverse(ivl_event_t event, int continue_nexus_traverse)
{
	int i;

	tabbed_spaces(TAB); 

	if (event == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	/* get the name of the event */
	tabbed_printf(out, 0, "#%c Event %s; Base %s\n", global_char, (ivl_event_name(event)), ivl_event_basename(event));

	/* go through each of the any signals */
	for (i = 0; i < ivl_event_nany(event); i++)
	{
		tabbed_printf(out, 0, "#%c Event any signals %d of %d in %s\n", global_char, i, ivl_event_nany(event), ivl_event_name(event));
		gtoIflsml_nexus_traverse(ivl_event_any(event, i));
	}
	/* go through each of the neg signals */
	for (i = 0; i < ivl_event_nneg(event); i++)
	{
		tabbed_printf(out, 0, "#%c Event neg signals %d of %d in %s\n", global_char, i, ivl_event_nneg(event), ivl_event_name(event));
		gtoIflsml_nexus_traverse(ivl_event_neg(event, i));
	}
	/* go through each of the pos signals */
	for (i = 0; i < ivl_event_npos(event); i++)
	{
		tabbed_printf(out, 0, "#%c Event pos signals %d of %d in %s\n", global_char, i, ivl_event_npos(event), ivl_event_name(event));
		gtoIflsml_nexus_traverse(ivl_event_pos(event, i));
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_lval_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_lval_traverse(ivl_lval_t net, int continue_nexus_traverse)
{
	int i;

	tabbed_spaces(TAB); 
	
	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	if(ivl_lval_mux(net) != 0)
	{
		tabbed_printf(out, 0, "# part off %d\n", ivl_lval_part_off(net)); 
		tabbed_printf(out, 0, "# mux select expression traverse\n"); 
		gtoIflsml_expression_traverse(ivl_lval_mux(net));	
		tabbed_printf(out, 0, "# lval pins %d\n", ivl_lval_pins(net) );
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				tabbed_printf(out, 0, "# traverse nexus pin %d of %d\n", i, ivl_lval_pins(net));
				gtoIflsml_nexus_traverse(ivl_lval_pin(net,i));
			}
		}
	}
	if(ivl_lval_mem(net) != 0)
	{
		tabbed_printf(out, 0, "# memory expression traverse\n"); 
		gtoIflsml_memory_traverse(ivl_lval_mem(net));	
		tabbed_printf(out, 0, "# index select expression traverse\n"); 
		gtoIflsml_expression_traverse(ivl_lval_idx(net));	
	}
	if(ivl_lval_sig(net) != 0)
	{
		tabbed_printf(out, 0, "# part off %d\n", ivl_lval_part_off(net)); 
		tabbed_printf(out, 0, "# signal expression traverse\n"); 
		gtoIflsml_signal_show(ivl_lval_sig(net), TRUE);	
		tabbed_printf(out, 0, "# lval pins %d\n", ivl_lval_pins(net) );
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				tabbed_printf(out, 0, "# traverse nexus pin %d of %d\n", i, ivl_lval_pins(net));
				gtoIflsml_nexus_traverse(ivl_lval_pin(net,i));
			}
		}
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_expression_traverse )
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_expression_traverse(ivl_expr_t net)
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
	
	tabbed_spaces(TAB); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "#%c net has NULL value!\n", global_char); 
		tabbed_spaces(BAT); 
		return;
	}

	/* determine the expression type and do the respective hardware conversion */
	switch (ivl_expr_type(net)) {
	  case IVL_EX_NONE:
		fprintf(stderr, "Concern about reaching this point...\n");
		break;

	  case IVL_EX_STRING:
		expr_string = ivl_expr_string(net);
		tabbed_printf(out, 0, "#%c IVL_EX_STRING NOT SUPPORTED : %s\n", global_char, expr_string); 
		break;

	  case IVL_EX_BINARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "#%c This expression has sign:%d (TRUE != 0, FALSE == 0)\n", global_char, signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "#%c This expression has width:%d\n", global_char, width);

		expr_opcode = ivl_expr_opcode(net);
		tabbed_printf(out, 0, "#%c IVL_EX_BINARY cahracter : %c\n", global_char, expr_opcode); 

		tabbed_printf(out, 0, "#%c IVL_EX_BINARY Examine Oper1\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper1(net));

		tabbed_printf(out, 0, "#%c IVL_EX_BINARY Examine Oper2\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper2(net));
		break;

	  case IVL_EX_BITSEL:
		tabbed_printf(out, 0, "#%c IVL_EX_BITSEL Examine Oper1\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper1(net));

		tabbed_printf(out, 0, "#%c IVL_EX_BITSEL Examine Signal\n", global_char); 
		gtoIflsml_signal_show(ivl_expr_signal(net), FALSE);
		break;

	  case IVL_EX_SELECT:
		tabbed_printf(out, 0, "#%c IVL_EX_SELECT does nothing\n", global_char); 
		break;

	  case IVL_EX_CONCAT:
		expr_repeat = ivl_expr_repeat(net);
		tabbed_printf(out, 0, "#%c IVL_EX_CONCAT repeat %d\n", global_char, expr_repeat); 

		tabbed_printf(out, 0, "#%c IVL_EX_CONCAT examine parm expressions\n", global_char); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "#%c IVL_EX_CONCAT examine parm %d expressions\n", global_char, i); 
			gtoIflsml_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_NUMBER:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "#%c This expression has sign:%d (TRUE != 0, FALSE == 0)\n", global_char, signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "#%c This expression has width:%d\n", global_char, width);
		expr_bits = (char*)ivl_expr_bits(net);
		tabbed_printf(out, 0, "#%c IVL_EX_NUMBER bits = %s\n", global_char, expr_bits); 
		break;

	  case IVL_EX_SIGNAL:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "#%c This expression has sign:%d (TRUE != 0, FALSE == 0)\n", global_char, signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "#%c This expression has width:%d\n", global_char, width);
		expr_lsi = ivl_expr_lsi(net);
		tabbed_printf(out, 0, "#%c IVL_EX_SIGNAL lsi = %d\n", global_char, expr_lsi); 

		expr_name = ivl_expr_name(net);
		tabbed_printf(out, 0, "#%c IVL_EX_SIGNAL expression name = %s\n", global_char, expr_name); 
		break;

	  case IVL_EX_TERNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "#%c This expression has sign:%d (TRUE != 0, FALSE == 0)\n", global_char, signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "#%c This expression has width:%d\n", global_char, width);
		tabbed_printf(out, 0, "#%c IVL_EX_TERNARY traversing operand 1\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper1(net));
		
		tabbed_printf(out, 0, "#%c IVL_EX_TERNARY traversing operand 2\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper2(net));

		tabbed_printf(out, 0, "#%c IVL_EX_TERNARY traversing operand 3\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper3(net));
		break;

	  case IVL_EX_UNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		tabbed_printf(out, 0, "#%c This expression has sign:%d (TRUE != 0, FALSE == 0)\n", global_char, signed_val);

		/* get the width of the expression */
		width = ivl_expr_width(net);
		tabbed_printf(out, 0, "#%c This expression has width:%d\n", global_char, width);
		expr_opcode = ivl_expr_opcode(net);
		tabbed_printf(out, 0, "#%c IVL_EX_UNARY opcode = %c\n", global_char, expr_opcode); 

		tabbed_printf(out, 0, "#%c IVL_EX_UNARY traversing operand 1\n", global_char); 
		gtoIflsml_expression_traverse(ivl_expr_oper1(net));
		break;

	  case IVL_EX_MEMORY:
		tabbed_printf(out, 0, "#%c IVL_EX_MEMORY examining Oper1\n", global_char); 
		width = ivl_expr_width(net);
		gtoIflsml_expression_traverse(ivl_expr_oper1(net));
		gtoIflsml_memory_traverse(ivl_expr_memory(net));

		break;

	  case IVL_EX_SFUNC:
		expr_name = ivl_expr_name(net);
		tabbed_printf(out, 0, "#%c IVL_EX_SFUNC expression %s\n", global_char, expr_name); 
		
		tabbed_printf(out, 0, "#%c IVL_EX_SFUNC examine parm expressions\n", global_char); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "#%c IVL_EX_SFUNC examine parm %d expressions\n", global_char, i); 
			gtoIflsml_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_UFUNC:
		tabbed_printf(out, 0, "#%c IVL_EX_UFUNC looking at scope\n", global_char); 
//		gtoIflsml_scope_traverse(ivl_expr_def(net), NULL);

		tabbed_printf(out, 0, "#%c IVL_EX_UFUNC examine parm expressions\n", global_char); 
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			tabbed_printf(out, 0, "#%c IVL_EX_UFUNC examine parm %d expressions\n", global_char, i); 
			gtoIflsml_expression_traverse(ivl_expr_parm(net, i));
		}
		break;

	  case IVL_EX_SCOPE:
		tabbed_printf(out, 0, "#%c IVL_EX_SCOPE looking at scope\n", global_char); 
//		gtoIflsml_scope_traverse(ivl_expr_scope(net), NULL);
		break;

	  case IVL_EX_ULONG:
		expr_value = ivl_expr_uvalue(net);
		tabbed_printf(out, 0, "#%c IVL_EX_ULONG long value = %d\n", global_char, expr_value); 
		break;

	  default:
		tabbed_printf(out, 0, "#%c draw_eval_expr_wid: default\n", global_char); 
	}

	tabbed_printf(out, 0, "#%c END gtoIflsml_expression_traverse\n", global_char); 
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: gtoIflsml_memory_traverse )
 * 	Traverse a memory piece
 *-------------------------------------------------------------------------------------------*/
void gtoIflsml_memory_traverse(ivl_memory_t net)
{
	char* memory_basename;
	int memory_root;
	unsigned memory_size;
	unsigned memory_width;

	tabbed_spaces(TAB); 
	tabbed_printf(out, 0, "# gtoIflsml_memory_traverse\n"); 

	if (net == NULL)
	{
		tabbed_printf(out, 0, "# net has NULL value!\n"); 
		tabbed_spaces(BAT); 
		return;
	}

	memory_basename = (char*)ivl_memory_basename(net);
	memory_root = ivl_memory_root(net);
	memory_size = ivl_memory_size(net);
	memory_width = ivl_memory_width(net);

	tabbed_printf(out, 0, "# BaseName %s\n", memory_basename); 
	tabbed_printf(out, 0, "# root %d\n", memory_root); 
	tabbed_printf(out, 0, "# size %d\n", memory_size); 
	tabbed_printf(out, 0, "# width %d\n", memory_width); 

	tabbed_printf(out, 0, "# END gtoIflsml_memory_traverse\n"); 
	tabbed_spaces(BAT); 
}
