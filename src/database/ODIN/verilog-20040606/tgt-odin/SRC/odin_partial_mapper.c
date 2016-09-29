
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

/* THis is the partial mapping stage code for Odin.  Essentially at this stage we are looking for complex heterogeneous functions within the flattened
 * netlist, and then we decide if they can be bound to.  Any node that is not bound to something is sent through a soft mapping stage, which converts the 
 * node into primitive gates, or some form of technology primitives.
 */
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
#include "odin_node_utils.h"
#include "odin_partial_mapper.h"
#include "odin_soft_mapping.h"
#include "odin_TFE_identification.h"
#include "odin_binding.h"

/*---------------------------------------------------------------------------------------------
 * (function: opm_init)
 *-------------------------------------------------------------------------------------------*/
void opm_init()
{
}

/*---------------------------------------------------------------------------------------------
 * (function: opm_partial_mapper)
 *-------------------------------------------------------------------------------------------*/
void opm_partial_mapper()
{
	/* read in technology library for possible matches.  This is currently done at the highest control loop */

	if (architecture_target == STRATIX_ARCH)
	{
		/* do possible tfe identification using the tech library */
		opm_tfe_identification();

		/* do binding for possible matchings */
		opm_binding();
	}

	/* grab the clock node signal */
	if ((clock_node == NULL) && (ff_node != NULL))
	{
		assert((ff_node[0]->node_type == MACRO_NODE) && 
				((ff_node[0]->n_t.hetero_node.hetero_node_type == MN_REGISTER) || (ff_node[0]->n_t.hetero_node.hetero_node_type == MN_REGISTER_RESET)));
		clock_node = ff_node[0]->input_pins[0]->input_node;
	}

	/* do soft conversion for any nodes unmatched */
	opm_soft_mappings();
}

/*---------------------------------------------------------------------------------------------
 * (function: opm_tfe_identification)
 * 	This function goes through a list of tfe and tries to match them up.
 *-------------------------------------------------------------------------------------------*/
void opm_tfe_identification()
{
	int i;

	/* Go through each target and get a match */
	for (i = 0; i < num_matching_targets; i++)
	{
		if (
				((matching_targets[i]->macro_type == MN_FOUR_MULT) && (optimization_on_off[OPT_DETECT_MN_X_MULT] == TRUE)) ||
				((matching_targets[i]->macro_type == MN_TWO_MULT) && (optimization_on_off[OPT_DETECT_MN_X_MULT] == TRUE)) ||
				((matching_targets[i]->macro_type == MN_MAC) && (optimization_on_off[OPT_DETECT_MN_MAC] == TRUE)) ||
				((matching_targets[i]->macro_type == MN_MULT_ADD_PACK) && (optimization_on_off[OPT_DETECT_MN_MULT_ADD_PACK] == TRUE))
		   )
		{
			oTFEi_check_for_match(matching_targets[i]);
		}
	}	
}

//#include "odin_experimental.h"
/*---------------------------------------------------------------------------------------------
 * (function: opm_binding)
 *-------------------------------------------------------------------------------------------*/
void opm_binding()
{
	ob_bind_tfes();

	//obm2m_bind_multiplexers_to_multiliers();
}

/*---------------------------------------------------------------------------------------------
 * (function: opm_soft_mappings)
 * 	traverse the netlist looking for a nodes which are MACRO_NODEs that are not matched.
 * 	When finds such a node passes on to the decision stage which determines what soft logic 
 * 	we will implement as.
 *-------------------------------------------------------------------------------------------*/
void opm_soft_mappings()
{
	int i;

	/*******************/
	/* PASS 1
	 * checks each node if it has been mapped and bound
	 *******************/

	/* start with the primary input list */
	for (i = 0; i < num_input_nodes; i++)
	{
		if (input_nodes[i] != NULL)
		{
			opm_depth_first_traverse_soft_mapping (input_nodes[i], PM_SOFT_TRAVERSE);
		}
	}
	/* now traverse the ground and vcc pins */
	opm_depth_first_traverse_soft_mapping (gnd_node, PM_SOFT_TRAVERSE);
	opm_depth_first_traverse_soft_mapping (vcc_node, PM_SOFT_TRAVERSE);
}

/*---------------------------------------------------------------------------------------------
 * (function: opm_depth_first_traverse_soft_mapping)
 *-------------------------------------------------------------------------------------------*/
void opm_depth_first_traverse_soft_mapping(node_t *node, int traverse_mark_number)
{
	int i, j;

	if (node->mark_number == traverse_mark_number)
	{
		/* IF - this node has already been traversed */
		return;
	}
	else
	{
		/* ELSE - this is a new node so depth visit it */

		/* mark that we have visitied this node now */
		node->mark_number = traverse_mark_number;

		/* once the info has been dropped down, then traverse the additional nodes */
		for (i = 0; i < node->num_output_pins; i++)
		{
			for (j = 0; j < onu_get_output_pins_related_num_level_2(node->output_pins[i]); j++)
			{
				if(onu_get_output_pins_node(node->output_pins[i], j) != NULL)
				{
					/* recursively depth in */
					D0(fprintf(out, "Node %s, Traversing node %s\n", node->unique_name, onu_get_output_pins_node(node->output_pins[i], j)->unique_name););
					opm_depth_first_traverse_soft_mapping (onu_get_output_pins_node(node->output_pins[i], j), traverse_mark_number);
				}
			}
		}

		if ((node->node_type == MACRO_NODE) && (node->is_partial_mapped_bound == HPM_NOT_TOUCHED)) 
		{
			/* IF - this is a macro node that needs to be converted to soft implementation */

			D0(fprintf(out, "Soft mapping %s is a %d\n", node->unique_name, node->n_t.oetero_node.oetero_node_type););
			osm_soft_map_a_macro_node(node, traverse_mark_number);
		}
	
		if ((node->node_type == MACRO_NODE) && (node->is_partial_mapped_bound == HPM_SOFT_MAPPED)) 
		{
			D0(fprintf(out, "Freeing node %s\n", node->unique_name););
			/* now that the node has been replaced, free it */
			onu_free_node(node);
		}
	}
}
