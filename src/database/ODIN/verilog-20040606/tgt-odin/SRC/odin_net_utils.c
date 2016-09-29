
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

/* This file contains some simple functions to look up nets for the first hierarchical based data structure */
#include "ivl_target.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <time.h>
#include <stdarg.h>

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_cell_define_utils.h"
#include "linked-list.h"
#include "odin_ds1_graph_utils.h"

/*---------------------------------------------------------------------------------------------
 * (funtction: onu_add_module_nets_info_collection)
 * 	Create a net by including the output name and other search info like pin and instance name
 * 	and also associate a prefined output.
 *-------------------------------------------------------------------------------------------*/
void onu_add_module_nets_info_collection(cell_t* this_cell, 
											net_pointer_t *ivl_version_or_lookup_version,
											net_pointer_t *odin_actual_version)
{
	cell_nets_t *new_net;

	/* create a net in the cell */
	new_net = oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(this_cell, odin_actual_version);

	/* add this pointer pair and the net to a lookup structure */
	oEgu_add_for_lookup(new_net, ivl_version_or_lookup_version, odin_actual_version);
}

/*---------------------------------------------------------------------------------------------
 * (funtction: onu_add_input_to_specified_output_module_nets_info_collection)
 * 	Given output search information, find the specified net and add this input to its listings.
 *-------------------------------------------------------------------------------------------*/
int onu_add_input_module_nets_info_collection(cell_t* this_cell, 
											net_pointer_t *driving_signal,
											net_pointer_t *driven_signal)
{
	cell_nets_t *find_net;

	/* find the net with the provided net_pointer */
	find_net = oEgu_lookup(driving_signal);
	
	/* if there is no net return ERROR */
	if (find_net == NULL)
	{
		return ERROR;
	}

	/* add the nete_pointer */
	oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(find_net, driven_signal);

	return OK;
}
