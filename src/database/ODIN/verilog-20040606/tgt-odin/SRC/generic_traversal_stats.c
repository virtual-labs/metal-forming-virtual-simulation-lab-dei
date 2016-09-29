
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

/* This is a stats collection file that goes through the ICARUS Intermediate representation and counts how many of specific devices there are, and
 * spits out this data in a file.  I use this sometimes to verify things with the final design, and also to get benchmark stats and potentially ideas 
 * based on the statistical counts in the designs. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include "generic_traversal_stats.h"
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

int stmt_and_expressions_examine;
char global_char;
STRING_CACHE *count_hash;

#define stat_counter_t struct stat_counter_t_t
stat_counter_t
{
	char *name;
	int count;
};

stat_counter_t **list_of_devices = NULL;
int num_list_of_devices = 0;

/*---------------------------------------------------------------------------------------------
 * (function: gts_allocate_another )
 * 	Allocates another dynamic spot in the list of statistic counters.  These ussually are
 * 	used to count the number of devices of a specific structure.
 *-------------------------------------------------------------------------------------------*/
stat_counter_t *gts_allocate_another(char *name)
{
	/* create a larger list of devices */
	list_of_devices = (stat_counter_t**)ou_realloc(list_of_devices, sizeof(stat_counter_t*) * (num_list_of_devices + 1), GENERIC_TRAVERSAL_STATS);

	/* create and initialize a new counter */
	list_of_devices[num_list_of_devices] = (stat_counter_t*)ou_malloc(sizeof(stat_counter_t), GENERIC_TRAVERSAL_STATS);
	list_of_devices[num_list_of_devices]->name = name;
	list_of_devices[num_list_of_devices]->count = 1;

	num_list_of_devices++;

	return list_of_devices[num_list_of_devices-1];
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_add_stat_count )
 * 	Finds a named device and increments the respective stat counter for it.
 *-------------------------------------------------------------------------------------------*/
void gts_add_stat_count(char *name, int width)
{
	long oash_idx;
	stat_counter_t *temp_stat;
	char *oash_entry_name;

	oash_entry_name = (char*)ou_malloc(strlen(name) + 1 + 10 + 1, GENERIC_TRAVERSAL_STATS);

	sprintf(oash_entry_name, "%s_%d", name, width);

	/* check if this name is in the hash */
	/* now add this string to the hash */
	oash_idx = sc_add_string(count_hash, oash_entry_name);
		
	/* if we have already defined this type of gate return */
 	if(count_hash->data[oash_idx] != NULL)
	{
		/* IF - in the hash, then increment the count */
		temp_stat = (stat_counter_t*)count_hash->data[oash_idx];
		temp_stat->count ++;
		ou_free(oash_entry_name);
	}
	else
	{
		/* ELSE - not in the hash, create a counter pair, and add it to the hash */
		temp_stat = gts_allocate_another(oash_entry_name);
		count_hash->data[oash_idx] = temp_stat;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_display_stats )
 * 	Display function to spit out all the stats recorded in stdout.
 *-------------------------------------------------------------------------------------------*/
void gts_display_stats()
{
	int i;

	for (i = 0; i < num_list_of_devices; i++)
	{
		fprintf(out, "Device %s has %d\n", list_of_devices[i]->name, list_of_devices[i]->count);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_design_traversal )
 * 	Starts traversing the design to collect IR stats, and finishes by displaying the stats
 * 	collected.
 *-------------------------------------------------------------------------------------------*/
void gts_design_traversal(ivl_design_t design, int stmt_and_expressions)
{
	ivl_scope_t top_level_module;
	
	global_char = 'P';

	/* initialize the hash */
	count_hash = sc_new_string_cache();

	stmt_and_expressions_examine = stmt_and_expressions; 

	/* go through the processes defined in this design */
	if(ivl_design_process(design, gts_process_traverse, 0) == 0)
	{
		/* grab the top level module in the verilog hierarchy */
		top_level_module = ivl_design_root(design);
		gts_scope_traverse_modules(top_level_module, NULL);
	}

	gts_display_stats();
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_process_traverse )
 *-------------------------------------------------------------------------------------------*/
int  gts_process_traverse(ivl_process_t net, void *null)
{
	if (net == NULL)
	{
		return 0;
	}

	if (ivl_process_scope(net) != NULL)
	{
		gts_scope_traverse_modules(ivl_process_scope(net), null);
	}

	if(ivl_process_stmt(net) != NULL)
	{
		if(stmt_and_expressions_examine == TRUE)
		{
			gts_stmt_traverse(ivl_process_stmt(net));
		}
	}

	return 0;
}
/*---------------------------------------------------------------------------------------------
 * (function: gts_scope_traverse_modules )
 *-------------------------------------------------------------------------------------------*/
int gts_scope_traverse_modules(ivl_scope_t net, void *null)
{
	int i;

	if (net == NULL)
	{
		return 0;
	}

	assert((ivl_scope_type(net) == IVL_SCT_MODULE)||(ivl_scope_type(net) == IVL_SCT_FUNCTION));

	/* show all signals in this module */
	for(i = 0; i < ivl_scope_sigs(net); i++)
	{
		gts_signal_show(ivl_scope_sig(net, i), TRUE);
    }

	/* traverse logic */
	for(i = 0; i < ivl_scope_logs(net); i++)
	{
		gts_logic_traverse(ivl_scope_log(net,i), TRUE);
	}

	/* traverse lpms */
	for(i = 0; i < ivl_scope_lpms(net); i++)
	{
		gts_lpm_traverse(ivl_scope_lpm(net,i));
	}

	if (ivl_scope_type(net) == IVL_SCT_FUNCTION)
	{
		if(ivl_scope_def(net) != NULL)
		{
			gts_stmt_traverse(ivl_scope_def(net));
		}
	}

	/* traverse all the children of this scope */
	global_char = 'C';
	ivl_scope_children(net, gts_scope_traverse_modules, NULL);
	global_char = 'P';


	return 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_signal_show )
 *-------------------------------------------------------------------------------------------*/
void gts_signal_show(ivl_signal_t net, int nexus_traverse)
{
	int i;

	if (net == NULL)
	{
		return;
	}

	switch(ivl_signal_port(net))
	{
		case IVL_SIP_NONE:
			
			break;
		case IVL_SIP_INPUT:
			
			break;
		case IVL_SIP_OUTPUT:
			
			break;
		case IVL_SIP_INOUT:
			
			break;
	}

    
	switch(ivl_signal_type(net))
	{
      case IVL_SIT_NONE:
      	
		break;
      case IVL_SIT_REG:
      	
		break;
      case IVL_SIT_SUPPLY0:
      	
		break;
      case IVL_SIT_SUPPLY1:
      	
		break;
      case IVL_SIT_TRI:
      	
		break;
      case IVL_SIT_TRI0:
      	
		break;
      case IVL_SIT_TRI1:
      	
		break;
      case IVL_SIT_TRIAND:
      	
		break;
      case IVL_SIT_TRIOR:
      	
		break;
	  default:
		break;  	
	}

	if (nexus_traverse == TRUE)
	{
		for(i = 0; i < ivl_signal_pins(net); i++)
		{
			gts_nexus_traverse(ivl_signal_pin(net, i));
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_lpm_traverse )
 *-------------------------------------------------------------------------------------------*/
void gts_lpm_traverse(ivl_lpm_t net)
{

	char*    lpm_name;
	char*    lpm_basename;
	unsigned lpm_width;
	int i, j;
	
	lpm_name = (char*)ivl_lpm_name(net);
	lpm_basename = (char*)ivl_lpm_basename(net);
	lpm_width = ivl_lpm_width(net);

    switch (ivl_lpm_type(net))
	{
	case IVL_LPM_ADD:
		
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
			gts_add_stat_count("LPM_ADD", lpm_width);
		}
	    break;
	case IVL_LPM_SUB:
		
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
			gts_add_stat_count("LPM_SUB", lpm_width);
		}
	    break;
	case IVL_LPM_FF:
		
		gts_nexus_traverse(ivl_lpm_clk(net));
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}

		gts_add_stat_count("LPM_FF", lpm_width);
	    break;
	case IVL_LPM_MULT:
		
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}


		gts_add_stat_count("LPM_MULT", lpm_width);
	    break;
	case IVL_LPM_MUX:
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
            gts_nexus_traverse(ivl_lpm_select(net, i));
		}
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data2(net, 0, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_MUX", lpm_width);
	    break;
	case IVL_LPM_CMP_EQ:
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
		}
		gts_nexus_traverse(ivl_lpm_q(net, 0));
		gts_add_stat_count("LPM_CMP_EQ", lpm_width);
		break;
	case IVL_LPM_CMP_GE:
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
		}
		gts_nexus_traverse(ivl_lpm_q(net, 0));
		gts_add_stat_count("LPM_CMP_GE", lpm_width);
		break;
	case IVL_LPM_CMP_GT:
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
		}
		gts_nexus_traverse(ivl_lpm_q(net, 0));
		gts_add_stat_count("LPM_CMP_GT", lpm_width);
		break;
	case IVL_LPM_CMP_NE:
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
		}
		gts_nexus_traverse(ivl_lpm_q(net, 0));
		gts_add_stat_count("LPM_CMP_NE", lpm_width);
		break;
	case IVL_LPM_SHIFTL:
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
            gts_nexus_traverse(ivl_lpm_select(net, i));
		}
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_SHIFTL", lpm_width);
		break;
	case IVL_LPM_SHIFTR:
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
            gts_nexus_traverse(ivl_lpm_select(net, i));
		}
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_SHIFTR", lpm_width);
		break;
	case IVL_LPM_DIVIDE:
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_DIVIDE", lpm_width);
		break;
	case IVL_LPM_MOD   :
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_datab(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_MOD", lpm_width);
		break;
	case IVL_LPM_RAM   :
		for(i = 0; i < ivl_lpm_selects(net); i++)
		{
            gts_nexus_traverse(ivl_lpm_select(net, i));
		}
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_data(net, i));
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		gts_add_stat_count("LPM_RAM", lpm_width);
		break;
	case IVL_LPM_UFUNC :
//		gts_scope_traverse(ivl_lpm_define(net), NULL);
		/* get the number of function ports. -1 for output port */
		for (i = 0; i < ivl_lpm_size(net)-1; i++)
		{
			/* find the width of each port */
			for (j = 0; j < ivl_lpm_data2_width(net, i); j++)
			{
				gts_nexus_traverse(ivl_lpm_data2(net, i, j));
			}
		}
		for(i = 0; i < lpm_width; i++)
		{
			gts_nexus_traverse(ivl_lpm_q(net, i));
		}
		break;
	default:
		break;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_top_most_level )
 *-------------------------------------------------------------------------------------------*/
void gts_logic_traverse(ivl_net_logic_t net, int continue_nexus_traverse)
{
	char* logic_name;
	char* logic_basename;
	unsigned    logic_pins;
	int i;

	if (net == NULL)
	{
		return;
	}

	logic_name = (char*)ivl_logic_name(net);
	logic_basename = (char*)ivl_logic_basename(net);
	logic_pins = ivl_logic_pins(net);

    switch (ivl_logic_type(net))
	{
	case IVL_LO_NONE:
		break;
	case IVL_LO_NMOS:
		break;
	case IVL_LO_NOTIF0:
		break;
	case IVL_LO_NOTIF1:
		break;
	case IVL_LO_RNMOS:
		break;
	case IVL_LO_RPMOS:
		break;
	case IVL_LO_PMOS:
		break;
	case IVL_LO_EEQ:
		break;
	case IVL_LO_UDP:
		break;
	case IVL_LO_AND:
		gts_add_stat_count("AND", logic_pins);
		break;
	case IVL_LO_NAND:
		gts_add_stat_count("NAND", logic_pins);
		break;
	case IVL_LO_NOR:
		gts_add_stat_count("NOR", logic_pins);
		break;
	case IVL_LO_OR:
		gts_add_stat_count("OR", logic_pins);
		break;
	case IVL_LO_XOR:
		gts_add_stat_count("XOR", logic_pins);
		break;
	case IVL_LO_XNOR:
		gts_add_stat_count("XNOR", logic_pins);
		break;
	case IVL_LO_BUF:
		break;
	case IVL_LO_BUFIF0:
		break;
	case IVL_LO_BUFIF1:
		break;
	case IVL_LO_BUFZ:
		break;
	case IVL_LO_NOT:
		gts_add_stat_count("NOT", logic_pins);
		break;
	case IVL_LO_PULLDOWN:
		break;
	case IVL_LO_PULLUP:
		break;
	default:
		break;
	}

	for (i = 0; i < logic_pins; i++)
	{
		gts_nexus_traverse(ivl_logic_pin(net, i));
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_nexus_ptr_traverse )
 * 	Look at a nexus and determine what type of ptr it has
 *-------------------------------------------------------------------------------------------*/
void gts_nexus_ptr_traverse(ivl_nexus_ptr_t net)
{
	if (net == NULL)
	{
		return;
	}
	
	if (ivl_nexus_ptr_con(net) != NULL)
	{
	}
	if (ivl_nexus_ptr_log(net) != NULL)
	{
	}
	if (ivl_nexus_ptr_lpm(net) != NULL)
	{
	}
	if (ivl_nexus_ptr_sig(net) != NULL)
	{
		gts_signal_show(ivl_nexus_ptr_sig(net), FALSE);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_nexus_traverse )
 * 	Go through each nexus and its respective pointers
 *-------------------------------------------------------------------------------------------*/
void gts_nexus_traverse(ivl_nexus_t net)
{
	int i;
	int *number_times_visited;

	if (ivl_nexus_get_private(net) == NULL)
	{
		number_times_visited = (int*)ou_malloc(sizeof(int)*1, GENERIC_TRAVERSAL_STATS);
		ivl_nexus_set_private(net, (void*)number_times_visited);
		*number_times_visited = 0;
	}
	else
	{
		number_times_visited = (int*)ivl_nexus_get_private(net);
		*number_times_visited++;
	}
	
	/* used to save data at this location */
	for (i = 0; i < ivl_nexus_ptrs(net); i++)
	{
		gts_nexus_ptr_traverse(ivl_nexus_ptr(net, i));	
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_stmt_traverse )
 *-------------------------------------------------------------------------------------------*/
void gts_stmt_traverse(ivl_statement_t net)
{
	int i;

	if (net == NULL)
	{
		return;
	}

	switch (ivl_statement_type(net)) 
	{
	  case IVL_ST_NONE:
		break;
      case IVL_ST_NOOP:
		break;
      case IVL_ST_ASSIGN:
		if (ivl_stmt_rval(net) != NULL)
		{
			gts_expression_traverse(ivl_stmt_rval(net));
		}
		if (ivl_stmt_delay_expr(net) != NULL)
		{
			gts_expression_traverse(ivl_stmt_delay_expr(net));
		}
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_ASSIGN_NB:
		gts_expression_traverse(ivl_stmt_rval(net));
		gts_expression_traverse(ivl_stmt_delay_expr(net));
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_BLOCK:
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
			gts_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_CASE:
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
			gts_expression_traverse(ivl_stmt_case_expr(net, i));
			gts_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEX:
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
			gts_expression_traverse(ivl_stmt_case_expr(net, i));
			gts_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASEZ:
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		for (i = 0; i < ivl_stmt_case_count(net); i++)
		{
			gts_expression_traverse(ivl_stmt_case_expr(net, i));
			gts_stmt_traverse(ivl_stmt_case_stmt(net, i));
		}
		break;
      case IVL_ST_CASSIGN:
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
			gts_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_CONDIT:
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		gts_stmt_traverse( ivl_stmt_cond_false(net));
		gts_stmt_traverse( ivl_stmt_cond_true(net));
		break;
      case IVL_ST_DEASSIGN:
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_DELAY:
		gts_stmt_traverse( ivl_stmt_sub_stmt(net));
		break;
      case IVL_ST_DELAYX:
		gts_stmt_traverse( ivl_stmt_sub_stmt(net));
		break;
      case IVL_ST_DISABLE:
		break;
      case IVL_ST_FORCE:
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		for (i = 0; i < ivl_stmt_nexus_count(net); i++)
		{
			gts_nexus_traverse(ivl_stmt_nexus(net, i));
		}
		break;
      case IVL_ST_FOREVER:
		gts_stmt_traverse( ivl_stmt_sub_stmt(net));
		break;
      case IVL_ST_FORK:
		for (i = 0; i < ivl_stmt_block_count(net); i++)
		{
			gts_stmt_traverse(ivl_stmt_block_stmt(net, i));
		}
		break;
      case IVL_ST_RELEASE:
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_REPEAT:
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		for (i = 0; i < ivl_stmt_lvals(net); i++)
		{
			gts_lval_traverse(ivl_stmt_lval(net, i), TRUE);
		}
		break;
      case IVL_ST_STASK:
		for (i = 0; i < ivl_stmt_parm_count(net); i++)
		{
			gts_expression_traverse(ivl_stmt_parm(net, i));
		}
		break;
      case IVL_ST_TRIGGER:
		break;
      case IVL_ST_UTASK:
		break;
      case IVL_ST_WAIT:
		gts_stmt_traverse( ivl_stmt_sub_stmt(net));
		for (i = 0; i < ivl_stmt_nevent(net); i++)
		{
			gts_event_traverse(ivl_stmt_events(net, i), TRUE);
		}
		break;
	  case IVL_ST_WHILE:
		gts_stmt_traverse( ivl_stmt_sub_stmt(net));
		gts_expression_traverse( ivl_stmt_cond_expr(net));
		break;
	  default:
		break;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_event_traverse )
 *-------------------------------------------------------------------------------------------*/
void gts_event_traverse(ivl_event_t event, int continue_nexus_traverse)
{
	int i;

	if (event == NULL)
	{
		return;
	}

	/* get the name of the event */

	/* go through each of the any signals */
	for (i = 0; i < ivl_event_nany(event); i++)
	{
		gts_nexus_traverse(ivl_event_any(event, i));
	}
	/* go through each of the neg signals */
	for (i = 0; i < ivl_event_nneg(event); i++)
	{
		gts_nexus_traverse(ivl_event_neg(event, i));
	}
	/* go through each of the pos signals */
	for (i = 0; i < ivl_event_npos(event); i++)
	{
		gts_nexus_traverse(ivl_event_pos(event, i));
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_lval_traverse )
 *-------------------------------------------------------------------------------------------*/
void gts_lval_traverse(ivl_lval_t net, int continue_nexus_traverse)
{
	int i;
	
	if (net == NULL)
	{
		return;
	}

	if(ivl_lval_mux(net) != 0)
	{
		gts_expression_traverse(ivl_lval_mux(net));	
		
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				gts_nexus_traverse(ivl_lval_pin(net,i));
			}
		}
	}
	if(ivl_lval_mem(net) != 0)
	{
		//gts_memory_traverse(ivl_lval_mem(net));	
		gts_expression_traverse(ivl_lval_idx(net));	
	}
	if(ivl_lval_sig(net) != 0)
	{
		gts_signal_show(ivl_lval_sig(net), TRUE);	
		
		if (continue_nexus_traverse == TRUE)
		{
			for (i = 0; i < ivl_lval_pins(net); i++)
			{
				gts_nexus_traverse(ivl_lval_pin(net,i));
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: gts_expression_traverse )
 *-------------------------------------------------------------------------------------------*/
void gts_expression_traverse(ivl_expr_t net)
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
	char temp_char [2];

	if (net == NULL)
	{
		return;
	}

	/* determine the expression type and do the respective hardware conversion */
	switch (ivl_expr_type(net)) {
	  case IVL_EX_NONE:
		break;

	  case IVL_EX_STRING:
		expr_string = ivl_expr_string(net);
		break;

	  case IVL_EX_BINARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		expr_opcode = ivl_expr_opcode(net);
		sprintf(temp_char, "%c", expr_opcode);
		gts_add_stat_count(temp_char, width);
		gts_expression_traverse(ivl_expr_oper1(net));
		gts_expression_traverse(ivl_expr_oper2(net));
		break;
	  case IVL_EX_BITSEL:
		gts_expression_traverse(ivl_expr_oper1(net));
		gts_signal_show(ivl_expr_signal(net), FALSE);
		break;
	  case IVL_EX_SELECT:
		break;
	  case IVL_EX_CONCAT:
		expr_repeat = ivl_expr_repeat(net);
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			gts_expression_traverse(ivl_expr_parm(net, i));
		}
		break;
	  case IVL_EX_NUMBER:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		expr_bits = (char*)ivl_expr_bits(net);
		break;
	  case IVL_EX_SIGNAL:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		expr_lsi = ivl_expr_lsi(net);
		expr_name = ivl_expr_name(net);
		break;
	  case IVL_EX_TERNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		gts_expression_traverse(ivl_expr_oper1(net));
		gts_expression_traverse(ivl_expr_oper2(net));
		gts_expression_traverse(ivl_expr_oper3(net));
		break;
	  case IVL_EX_UNARY:
		/* get if the expression is signed */
		signed_val = ivl_expr_signed(net);
		/* get the width of the expression */
		width = ivl_expr_width(net);
		expr_opcode = ivl_expr_opcode(net);
		sprintf(temp_char, "%c", expr_opcode);
		gts_add_stat_count(temp_char, width);
		gts_expression_traverse(ivl_expr_oper1(net));
		break;
	  case IVL_EX_MEMORY:
		width = ivl_expr_width(net);
		gts_expression_traverse(ivl_expr_oper1(net));
		gts_add_stat_count("EXPR_MEMORY", width);
		break;
	  case IVL_EX_SFUNC:
		expr_name = ivl_expr_name(net);
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			gts_expression_traverse(ivl_expr_parm(net, i));
		}
		break;
	  case IVL_EX_UFUNC:
		for (i = 0; i < ivl_expr_parms(net); i++)
		{	
			gts_expression_traverse(ivl_expr_parm(net, i));
		}
		break;
	  case IVL_EX_SCOPE:
		break;
	  case IVL_EX_ULONG:
		expr_value = ivl_expr_uvalue(net);
		break;
	  default:
		break;
	}
}
