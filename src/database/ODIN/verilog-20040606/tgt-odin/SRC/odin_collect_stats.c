
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

/* This file provides a method of collecting and displaying various statistics from the final flattened netlist.  This information
 * I use to provide width information, counts of devices, and how things are hooked up.  Really just seperates statistical information
 * from the actual synthesis code. */
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
#include "odin_collect_stats.h"

#define multiplier_t struct multiplier_t_t
multiplier_t
{
	int size_a_port;
	int size_b_port;
	int size_output;
};
#define multiplexer_t struct multiplexer_t_t
multiplexer_t
{
	int size_a_port;
};

multiplier_t **list_of_multipliers;
int num_list_of_multipliers;
multiplexer_t **list_of_multiplexers;
int num_list_of_multiplexers;

int *match_types;

/*---------------------------------------------------------------------------------------------
 * (function: ocs_init)
 * 	Initialize any structures in preparation of taking statistics.  This is for experimental
 * 	recording of various structures within the netlist during the translation process.
 *-------------------------------------------------------------------------------------------*/
void ocs_init () 
{
	int i;

	list_of_multipliers = NULL;
	list_of_multiplexers = NULL;
	num_list_of_multipliers = 0;
	num_list_of_multiplexers = 0;

	/* allocate spots for each of the bind units */
	match_types = (int *)ou_malloc(sizeof(int)*MN_END_POINT, HETS_COLLECT_STATS);
	for (i = 0; i < MN_END_POINT; i++)
	{
		match_types[i] = 0;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_dump_stats)
 * 	Spits out the statistical data to the specified out file.
 *-------------------------------------------------------------------------------------------*/
void ocs_dump_stats (FILE *out) 
{
	int i;

	fprintf(out, "-----------------------------\n BEGIN STAT DUMP\n");	

	fprintf(out, "\n");
	/* output multiplier details */
	for (i = 0; i < num_list_of_multipliers; i++)
	{
		fprintf(out, "Multiplier[%d] - (%d)*(%d)=(%d)\n", i, list_of_multipliers[i]->size_a_port, list_of_multipliers[i]->size_b_port, list_of_multipliers[i]->size_output);
	}
	fprintf(out, "\n");

	/* display the results for the general results for the multiplexers */
	ocs_count_and_print_multiplexer_sizes(out);

	/* display the bindings */
	fprintf(out, "\n");
	for (i = 0; i < MN_END_POINT; i++)
	{
		if (match_types[i] != 0)
		{
			fprintf(out, "Binds to %s = %d\n", ou_lookup_macro_name(i), match_types[i]);
		}
	}
	fprintf(out, "\n");
	
	fprintf(out, "\n END STAT DUMP\n-----------------------------\n");	

	
}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_record_multiplier)
 * 	Multiplier details for widths.
 *-------------------------------------------------------------------------------------------*/
void ocs_record_multiplier(int size_a, int size_b, int size_output)
{
	/* record this multipier information */
	list_of_multipliers = (multiplier_t **)ou_realloc(list_of_multipliers, sizeof(multiplier_t*)*(num_list_of_multipliers+1), HETS_COLLECT_STATS);
	list_of_multipliers[num_list_of_multipliers] = (multiplier_t *)ou_malloc(sizeof(multiplier_t), HETS_COLLECT_STATS);
	list_of_multipliers[num_list_of_multipliers]->size_a_port = size_a;
	list_of_multipliers[num_list_of_multipliers]->size_b_port = size_b;
	list_of_multipliers[num_list_of_multipliers]->size_output = size_output;
	num_list_of_multipliers ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_record_multiplexer)
 * 	This info currently is recorded at the soft mapping stage in the IF and CASE.
 *-------------------------------------------------------------------------------------------*/
void ocs_record_multiplexer(int size_a)
{
	/* record this multipexer information */
	list_of_multiplexers = (multiplexer_t **)ou_realloc(list_of_multiplexers, sizeof(multiplexer_t*)*(num_list_of_multiplexers+1), HETS_COLLECT_STATS);
	list_of_multiplexers[num_list_of_multiplexers] = (multiplexer_t *)ou_malloc(sizeof(multiplexer_t), HETS_COLLECT_STATS);
	list_of_multiplexers[num_list_of_multiplexers]->size_a_port = size_a;
	num_list_of_multiplexers ++;
}


/*---------------------------------------------------------------------------------------------
 * (function: ocs_stat_check_if_multiplexer)
 * 	Checks if this node iis a multiplexer type that we want to record details on.
 *-------------------------------------------------------------------------------------------*/
void ocs_stat_check_if_multiplexer(node_t* cur_node)
{
	if ((cur_node->node_type == MACRO_NODE) && 
			((cur_node->n_t.hetero_node.hetero_node_type == MN_IF) || 
			 (cur_node->n_t.hetero_node.hetero_node_type == MN_CASE) || 
			 (cur_node->n_t.hetero_node.hetero_node_type == MN_CONST_CASE) || 
			 (cur_node->n_t.hetero_node.hetero_node_type == MN_STATE_CASE)))
	{
		/* IF - this is a set of multiplexers defined by IF structures */
		list_of_multiplexers = (multiplexer_t **)ou_realloc(list_of_multiplexers, sizeof(multiplexer_t*)*(num_list_of_multiplexers+1), HETS_COLLECT_STATS);
		list_of_multiplexers[num_list_of_multiplexers] = (multiplexer_t *)ou_malloc(sizeof(multiplexer_t), HETS_COLLECT_STATS);
		num_list_of_multiplexers ++;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_count_and_print_multiplexer_sizes)
 * 	Prints out details about multiplexers in the netlist
 *-------------------------------------------------------------------------------------------*/
void ocs_count_and_print_multiplexer_sizes(FILE *out)
{
	int i;
	int largest_multiplexer = 0;
	int *mult_counts;

	/* find the largest multiplexer */
	for (i = 0; i < num_list_of_multiplexers; i++)
	{
		largest_multiplexer = largest_multiplexer > list_of_multiplexers[i]->size_a_port ? largest_multiplexer : list_of_multiplexers[i]->size_a_port;		
	}

	if (largest_multiplexer == 0)
	{
		return;
	}
		
	/* allocate the count */
	mult_counts = (int *)ou_malloc(sizeof(int)*largest_multiplexer, HETS_COLLECT_STATS);

	/* initialize the array */
	for (i = 0; i < largest_multiplexer; i++)
	{
		mult_counts[i] = 0;
	}
	/* increment the stat count if we have one */
	for (i = 0; i < num_list_of_multiplexers; i++)
	{
		mult_counts[list_of_multiplexers[i]->size_a_port-1] ++;
	}
	/* Finally print out the bin results */
	for (i = 0; i < largest_multiplexer; i++)
	{
		if (mult_counts[i] > 0)
		{
			fprintf(out, "Multiplexer %d - %d to 1\n", mult_counts[i], i+1);
		}
	}

	/* Clean up everything */
	if (mult_counts != NULL)
	{
		ou_free(mult_counts);
	}

	/* output multiplexer information.  Prints each multiplexer...not really needed, but sometimes I use this */
#if 0
	for (i = 0; i < num_list_of_multiplexers; i++)
	{
		fprintf(out, "Multiplexer[%d] - %d to 1\n", i, list_of_multiplexers[i]->size_a_port);
	}
	fprintf(out, "\n");
#endif

}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_add_to_mini_node_fifo)
 *-------------------------------------------------------------------------------------------*/
void ocs_record_hard_binding(short match_type)
{
	match_types[match_type]++;
}

node_fifo_t **fifo;
int size_fifo;
/*---------------------------------------------------------------------------------------------
 * (function: ocs_add_to_mini_node_fifo)
 *-------------------------------------------------------------------------------------------*/
void ocs_add_to_mini_node_fifo (node_t *current_node, node_t *add_node, int pin) 
{
	fifo = (node_fifo_t**)ou_realloc(fifo, sizeof(node_fifo_t*)*(size_fifo+1), HETS_COLLECT_STATS);
	fifo[size_fifo] = (node_fifo_t*)ou_malloc(sizeof(node_fifo_t), HETS_COLLECT_STATS);
	fifo[size_fifo]->node = current_node;
	fifo[size_fifo]->who_added = add_node;
	fifo[size_fifo]->pin = pin;
	size_fifo++;
}

/*---------------------------------------------------------------------------------------------
 * (function: ocs_traverse_and_count)
 * 	One way of traversing the entire list to gather stats on specific nodes.  The other
 * 	choice for recording stats is doing it at points of creation.
 *-------------------------------------------------------------------------------------------*/
void ocs_traverse_and_count ()
{
	int i;
	int current_index_fifo = 0;
	node_t *cur_node;
	node_t *comparison_node;

	/* initialize fifo ... use this instead of recursion to keep depth minamal for memory */
	size_fifo = 0;
	fifo = NULL;

	/* start with the primary output list by adding them all to the depth search stack */
	for (i = 0; i < num_output_nodes; i++)
	{
		if (output_nodes[i] != NULL)
		{
			ocs_add_to_mini_node_fifo(output_nodes[i], NULL, 0);
		}
	}

	while (size_fifo != current_index_fifo)
	{
		cur_node = fifo[current_index_fifo]->node;

		/* check if we have visited this node before */
		if (cur_node->mark_number_live != STAT_TRAVERSE)
		{
			/* IF -  this node has not been marked yet then traverse all the inputs and check if this is a stat that we need to catch */
			ocs_stat_check_if_multiplexer(cur_node);	

			/* mark the node */
			cur_node->mark_number_live= STAT_TRAVERSE;

			for (i = 0; i < cur_node->num_input_pins; i++)
			{
				comparison_node = onu_get_input_pins_node(cur_node->input_pins[i]);

				if ((comparison_node != NULL) &&
						(!((comparison_node->mark_number_live == STAT_TRAVERSE) || 
						   (comparison_node->mark_number_live == STAT_TRAVERSE+1))))
				{
					/* IF - this node exists and we haven't already visited then add each of the input nodes to the fifo */
					if (comparison_node->mark_number_live != STAT_TRAVERSE)
					{
						/* IF - this hasn't been specially marked then mark that it has been added to the queue */
						comparison_node->mark_number_live = STAT_TRAVERSE+1;
					}

					ocs_add_to_mini_node_fifo(comparison_node, cur_node, i);
				}
			}
		}

		/* go to the next item in the fifo */
		current_index_fifo ++;
	}

	/* finally free the miniature fifo */
	for (i = 0; i < size_fifo; i++)
	{
		ou_free(fifo[i]);
	}
	if (size_fifo > 0)
	{
		ou_free(fifo);
	}
}
