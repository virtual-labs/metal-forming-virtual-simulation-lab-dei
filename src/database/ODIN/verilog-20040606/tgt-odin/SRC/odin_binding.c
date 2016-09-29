
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

/* The binding file is the access point where I do the actual binding of nodes in the netlist to complex functions available on the 
 * target technology.  This is where we can try different binding strategies.  Currently, the decisions are minimal, and I just
 * go with complex functions on the Stratix, which I map to if I can.  The Quartus flow can still decide if these mappings will
 * be used */ 
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>

#include "debug.h"
#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_binding.h"
#include "odin_collect_stats.h"

#define SIMPLE_BIND 1
//#define TRYALL_BIND 1

/*---------------------------------------------------------------------------------------------
 * (function: ob_bind_tfes)
 * 	This is the high-level for the binding function.  This chooses what type of binding
 * 	algorithm we are going to use.  
 *
 * 	Currently we just do a simple binding, which leaves it to other stages of the CAD flow.
 *-------------------------------------------------------------------------------------------*/
void ob_bind_tfes()
{
#ifdef SIMPLE_BIND
	ob_simple_bind();
#elif TRYALL_BIND
#endif
}

/*---------------------------------------------------------------------------------------------
 * (function: ob_mark_nodes_with_bind_idx)
 * 	Marks the node with the bind information.  This means that we are assigning a binding
 * 	to a the matching nodes.
 *-------------------------------------------------------------------------------------------*/
void ob_mark_nodes_with_bind_idx(match_info_t *match, short match_type)
{
	int i;
	node_t *current_node;
	tfe_binding_t *actual_binding;

	/* create the binding info */
	actual_binding = (tfe_binding_t*)ou_malloc_struct(sizeof(tfe_binding_t), HETS_BINDING);

	/* initialize actual_binding with the bind information */
	actual_binding->match_id = match_type;
	actual_binding->tfe_implementation = match;
	actual_binding->bind_name = ou_strdup(match->all_nodes->nodes[0]->unique_name, HETS_BINDING);

	/* record that a binding has been made in the stats */
	ocs_record_hard_binding(match_type);

	/* go through each node and mark it as bound/mapped */
	for (i = 0; i < match->all_nodes->num_nodes; i++)
	{
		current_node = match->all_nodes->nodes[i];

		current_node->is_partial_mapped_bound = HPM_HARD_MAPPED;
		current_node->binding = actual_binding;
		current_node->node_type = MAPPED_NODE;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ob_simple_bind)
 * 	This function does the most basic type of binding where we traverse the nodes and bind 
 * 	them to the lowest value on the MACRO_LIST.  I've chosen lower numbers as the ones I think
 * 	are betting binding targets.
 *-------------------------------------------------------------------------------------------*/
void ob_simple_bind()
{
	int i, j;
	int temp_bind_idx;
	int temp_bind_macro_val;

	/* go through the mult list */
	for (i = 0; i < num_mult_list; i++)
	{
		if (mult_list[i]->is_partial_mapped_bound == HPM_NOT_TOUCHED)
		{
			/* IF - multiply has not been bound yet */
			temp_bind_idx = -1;
			temp_bind_macro_val = 10000; // number greater than number of macro types (as Jan 7 2004 I think there are 41)
		
			if (mult_list[i]->possible_node_bindings == NULL)
			{
				/* IF - this multiplier is unbound, probably means that it is a mult that is larger then available mults */
				/* deal with later in flow at: osm_soft_map_a_macro_node */
				continue;
			}

			/* go through possible binding list to find one with lowest MACRO VALUE.  This also means we have to check if all other
			 * nodes in the potential binding haven't already been coverd */
			for (j = 0; j < mult_list[i]->possible_node_bindings->num_possible_bindings; j++)
			{
				if ((mult_list[i]->possible_node_bindings->macro_type_for_match[j] < temp_bind_macro_val) &&
					(mult_list[i]->possible_node_bindings->macro_type_for_match[j] != MN_MULT) &&
					(ob_is_tfe_already_marked(mult_list[i]->possible_node_bindings->potential_tfe_implementation[j]) == FALSE))
				{
					/* IF - we find a new minimum then record */
					temp_bind_idx = j;
					temp_bind_macro_val = mult_list[i]->possible_node_bindings->macro_type_for_match[j];
				}
			}

			if (temp_bind_idx != -1)
			{
				/* choose lowest idx as the binding, and mark all other nodes in the binding as bound */
				ob_mark_nodes_with_bind_idx(mult_list[i]->possible_node_bindings->potential_tfe_implementation[temp_bind_idx],
											temp_bind_macro_val);
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ob_is_tfe_already_marked)
 * 	Checks all nodes to see if any have already been bound, since you can't bind a target to
 * 	a node unless you do replication.  Haven't considered this yet as an implementation option.
 *-------------------------------------------------------------------------------------------*/
short ob_is_tfe_already_marked(match_info_t *match)
{
	int i;
	node_t *current_node;
	
	for (i = 0; i < match->all_nodes->num_nodes; i++)
	{
		current_node = match->all_nodes->nodes[i];	

		if (current_node->is_partial_mapped_bound != HPM_NOT_TOUCHED)
		{
			return TRUE;
		}
	}

	return FALSE;
}
