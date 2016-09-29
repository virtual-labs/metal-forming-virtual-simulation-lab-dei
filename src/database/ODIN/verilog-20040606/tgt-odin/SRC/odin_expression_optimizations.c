
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

/* This file does stuff for expression optimizations.  The first part it does is it extracts nodes that are arithmetic operations and builds them
 * into subgraphs.  These subgraphs are are trees, which can later be traversed to check if expression optimizations can be done on them.
 *
 * Currently, the only optimization that I do with this stuff is finding expression trees that have constants in them.  These trees can be 
 * shrunk for some FPGA and technological implementations.
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

#include "odin_expression_optimizations.h"
#include "odin_node_utils.h"
#include "odin_FLAT_netlist.h"

comp_tree_t** computation_trees = NULL;
int num_computation_trees = 0;

/*---------------------------------------------------------------------------------------------
 * (function: oeo_create_a_computation_tree_node)
 * 	Creates a node in the tree of computations
 *-------------------------------------------------------------------------------------------*/
comp_tree_t* oeo_create_a_computation_tree_node (node_t *node) 
{
	comp_tree_t *new_leaf;

	new_leaf = (comp_tree_t*)ou_malloc_struct(sizeof(comp_tree_t), HETS_EXPRESSION_OPTIMIZATIONS);

	new_leaf->node_ref = node;
	new_leaf->root = NULL;
	new_leaf->left_branch = NULL;
	new_leaf->right_branch = NULL;

	return new_leaf;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_free_a_computation_tree_node)
 * 	Frees a node.
 *-------------------------------------------------------------------------------------------*/
void oeo_free_a_computation_tree_node (comp_tree_t *to_free) 
{
	ou_free(to_free);
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_add_computation_tree_root_node)
 * 	Adds the root of a computation tree to a global list.  This list allows us to quickly
 * 	go thorugh all the computation trees.
 *-------------------------------------------------------------------------------------------*/
void oeo_add_computation_tree_root_node (comp_tree_t *root_node) 
{
	assert(root_node != NULL);

	/* add a spot in the list for the next element */
	computation_trees = (comp_tree_t**)ou_realloc(computation_trees, sizeof(comp_tree_t*)*(num_computation_trees + 1), HETS_EXPRESSION_OPTIMIZATIONS);

	/* store the root_node */
	computation_trees[num_computation_trees] = root_node;

	/* record the addition of the root_node */
	num_computation_trees++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_add_to_mini_fifo)
 *-------------------------------------------------------------------------------------------*/
void oeo_add_to_mini_fifo (comp_tree_t *tree_el, comp_tree_t ***fifo, int *size_fifo) 
{
	(*fifo) = (comp_tree_t**)ou_realloc((*fifo), sizeof(comp_tree_t)*((*size_fifo)+1), HETS_EXPRESSION_OPTIMIZATIONS);
	(*fifo)[*size_fifo] = tree_el;
	*size_fifo = *size_fifo + 1;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_check_computation_tree)
 * 	Takes in a node and sees if this node is a member of a tree of computation.  If it 
 * 	is, then it grows the tree so we can traverse it later and do our optimizations.
 *-------------------------------------------------------------------------------------------*/
void oeo_check_computation_tree (node_t *check_node) 
{
	comp_tree_t **current_fifo = NULL;
	int size_fifo = 0;
	int index_fifo = 0;
	comp_tree_t *current_root = NULL;
	comp_tree_t *new_root;
	comp_tree_t *new_leaf;
	int operand_a_index;
	int operand_b_index;

	assert(check_node->node_type == MACRO_NODE);

	if (check_node->n_t.hetero_node.tree_marked == -1)
	{
		/* IF - this graph node is not a member of any other computation graph then begin to traverse it */

		/* add the first element onto the fifo */
		oeo_add_to_mini_fifo (oeo_create_a_computation_tree_node (check_node), &current_fifo, &size_fifo);
		current_root = current_fifo[0];

		while (size_fifo != index_fifo)
		{
			/* check if outputs go to another arithmetic operation node */
			if (oeo_check_if_outputs_all_go_to_a_computation_node(current_fifo[index_fifo]->node_ref) == TRUE)
			{
				/* IF - the nodes outputs all go to another computational node then add it to the graph */
				new_root = oeo_create_a_computation_tree_node(onu_get_output_pins_node(current_fifo[index_fifo]->node_ref->output_pins[0],0));
				current_fifo[index_fifo]->root = new_root;

				oeo_add_to_mini_fifo (new_root, &current_fifo, &size_fifo);

				if (current_fifo[index_fifo] == current_root)
				{
					/* IF - the node we are at is the current root, then this new_node becomes the root */
					current_root = new_root;
				}
			}

			/* check if the inputs go to another computation tree that we have not examined yet */
			operand_a_index = oeo_check_if_operand_x_is_a_computation_node(current_fifo[index_fifo]->node_ref, 0);
			if (operand_a_index != -1)
			{
				/* IF - operand A is another computation then add this node to the left tree point */
				new_leaf = oeo_create_a_computation_tree_node(current_fifo[index_fifo]->node_ref->input_pins[operand_a_index]->input_node);
				current_fifo[index_fifo]->left_branch = new_leaf;

				oeo_add_to_mini_fifo (new_leaf, &current_fifo, &size_fifo);
			}
					
			operand_b_index = oeo_check_if_operand_x_is_a_computation_node(current_fifo[index_fifo]->node_ref, 1);
			if (operand_b_index != -1)
			{
				/* IF - operand B is another computation then add this node to the left tree point */
				new_leaf = oeo_create_a_computation_tree_node(current_fifo[index_fifo]->node_ref->input_pins[operand_b_index]->input_node);
				current_fifo[index_fifo]->right_branch = new_leaf;

				oeo_add_to_mini_fifo (new_leaf, &current_fifo, &size_fifo);
			}

			/* mark this node as traversed */
			current_fifo[index_fifo]->node_ref->n_t.hetero_node.tree_marked = 1;

			/* now that you have examined outputs and inputs go to the next queue element */
			index_fifo ++;
		}

		/* free the traverse fifo we used */
		ou_free(current_fifo);

		/* record the root node of this computation tree */
		if (size_fifo == 1)
		{
			/* IF - there were no elements in the list */

			/* free the comp_tree_t allocated */
			oeo_free_a_computation_tree_node (current_root);
		}
		else
		{
			/* record this current root */
			oeo_add_computation_tree_root_node(current_root);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_check_if_outputs_all_go_to_a_computation_node)
 * 	Checks if all the outputs of a particular node point to a specific computation node.
 * 	This is a way of identifying a graph of joined computation items.
 *-------------------------------------------------------------------------------------------*/
short oeo_check_if_outputs_all_go_to_a_computation_node (node_t *check_node) 
{
	int i;
	short return_val = TRUE;
	node_t *match_node = NULL;
	
	if (check_node->num_output_pins == 0)
	{
		return FALSE;
	}

	/* do an iteration for each of the output pins */
	for (i = 0; i < check_node->num_output_pins; i++)
	{
		/* MN_COMPUTATIONS_GT is a define number within our list of nodes that says that anything with a larger
		 * number is actually an aritmetic operation that we will create computation trees from */
		if(!((onu_get_output_pins_related_num_level_2(check_node->output_pins[i]) == 1) && 
			(onu_get_output_pins_node(check_node->output_pins[i], 0)->node_type == MACRO_NODE) &&
			(onu_get_output_pins_node(check_node->output_pins[i], 0)->n_t.hetero_node.hetero_node_type > MN_COMPUTATIONS_GT) &&
			(check_node->n_t.hetero_node.tree_marked == -1) &&
			((match_node == onu_get_output_pins_node(check_node->output_pins[i], 0)) || (match_node == NULL)))) 
		{
			/* IF - this node is not a  computational node then exit FALSE */
			return_val = FALSE;
			break;
		}
		else if (match_node == NULL)
		{
			match_node = (onu_get_output_pins_node(check_node->output_pins[i], 0));
		}
	}
		
	return return_val;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_check_if_operand_x_is_a_computation_node)
 * 	Checks if the inputs of a node are all a single computation node.  This is similar to 
 * 	ouputs, except there are 2 operands to a computational node, and therefore we split
 * 	each have up based on the operand paramteter being 0 = A or 1 = B.
 *-------------------------------------------------------------------------------------------*/
int oeo_check_if_operand_x_is_a_computation_node (node_t *check_node, int operand) 
{
	int i;
	int operand_size;
	int starting_point;
	short return_val = -1;
	node_t* match_node = NULL;
	node_t* temp_match_node;
	
	if ((check_node->n_t.hetero_node.hetero_node_type == MN_ADD) || 
		(check_node->n_t.hetero_node.hetero_node_type == MN_SUB) ||
		(check_node->n_t.hetero_node.hetero_node_type == MN_MULT))
	{
		if (operand == 0)
		{
			starting_point = 0;
			operand_size = check_node->n_t.hetero_node.width_a;
		}
		else if (operand == 1)
		{
			starting_point = check_node->n_t.hetero_node.width_a;
			operand_size = check_node->n_t.hetero_node.width_b;
		}
	}
	else 
	{
		return return_val;
	}

	/* do an iteration for each of the output pins */
	for (i = starting_point; i < starting_point + operand_size ; i++)
	{
		temp_match_node = onu_get_input_pins_node(check_node->input_pins[i]);

		if(!((temp_match_node->node_type == MACRO_NODE) &&
			(temp_match_node->n_t.hetero_node.hetero_node_type > MN_COMPUTATIONS_GT) &&
			(check_node->n_t.hetero_node.tree_marked == -1) &&
			((match_node == temp_match_node) || (match_node == NULL))))  
		{
			/* IF - this node is not a  computational node then exit FALSE */
			return_val = -1;
			break;
		}
		else if (match_node == NULL)
		{
			/* ELSE - first match node so start it up */
			match_node = temp_match_node;
			return_val = i;
		}
	}
		
	return return_val;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_optimize_expressions)
 * 	This is the high-level expression optimization function.  It essentially sends each
 * 	tree to the expression optimizations we would like to do.
 *-------------------------------------------------------------------------------------------*/
void oeo_optimize_expressions () 
{
	int i;

	if (optimization_on_off[OPT_A_B_1_ADD] == TRUE) 
	{
		for (i = 0; i < num_computation_trees; i++)
		{
			oeo_join_adders_based_on_constants(computation_trees[i]);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_join_adders_based_on_constants
 * 	This function attempts to join the following cases:
 * 		A + B + 000001
 * 		A + 000001 + B
 * 		(0 - A) + C = A - C
 *-------------------------------------------------------------------------------------------*/
void oeo_join_adders_based_on_constants (comp_tree_t *computation_root) 
{
	comp_tree_t **current_fifo = NULL;
	int size_fifo = 0;
	int index_fifo = 0;
	short is_B_of_left_input_op_carry = FALSE;
	short is_A_of_left_input_op_carry = FALSE;
	short is_B_of_right_input_op_carry = FALSE;
	short is_A_of_right_input_op_carry = FALSE;
	short is_left_ADDER = FALSE;
	short is_right_ADDER = FALSE;
	short is_B_of_output_op_carry = FALSE;
	short is_A_of_output_op_carry = FALSE;

	/* add the root to the stack for the traversal */	
	oeo_add_to_mini_fifo(computation_root, &current_fifo, &size_fifo);

	/* traverse the fifo until we have searched everything */
	while(index_fifo != size_fifo)
	{
		/* check if the current element is an ADD */
		if ((current_fifo[index_fifo]->node_ref->n_t.hetero_node.hetero_node_type == MN_ADD))
		{
			is_A_of_output_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->node_ref, 
													0,
													current_fifo[index_fifo]->node_ref->n_t.hetero_node.width_a);
			is_B_of_output_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->node_ref, 
													current_fifo[index_fifo]->node_ref->n_t.hetero_node.width_a,
													current_fifo[index_fifo]->node_ref->n_t.hetero_node.width_a +
													current_fifo[index_fifo]->node_ref->n_t.hetero_node.width_b);


			/* IF - this node is an adder, then check if either input is an adder */
			if ((current_fifo[index_fifo]->left_branch != NULL) &&
				(current_fifo[index_fifo]->left_branch->node_ref->n_t.hetero_node.hetero_node_type == MN_ADD))
			{
				/* IF - the left input is an adder then check if the left adder inputs has all zeros except a LSbit signal */
				is_left_ADDER = TRUE;
				
				is_A_of_left_input_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->left_branch->node_ref, 
													0,
													current_fifo[index_fifo]->left_branch->node_ref->n_t.hetero_node.width_a);
				is_B_of_left_input_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->left_branch->node_ref, 
													current_fifo[index_fifo]->left_branch->node_ref->n_t.hetero_node.width_a,
													current_fifo[index_fifo]->left_branch->node_ref->n_t.hetero_node.width_a +
													current_fifo[index_fifo]->left_branch->node_ref->n_t.hetero_node.width_b);
			}

			/* IF - this node is an adder, then check if either input is an adder */
			if ((current_fifo[index_fifo]->right_branch != NULL) &&
				(current_fifo[index_fifo]->right_branch->node_ref->n_t.hetero_node.hetero_node_type == MN_ADD))
			{
				/* IF - the right input is an adder then check if the right adder inputs has all zeros except a LSbit signal */
				is_right_ADDER = TRUE;
				
				is_A_of_right_input_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->right_branch->node_ref, 
													0,
													current_fifo[index_fifo]->right_branch->node_ref->n_t.hetero_node.width_a);
				is_B_of_right_input_op_carry = oeo_check_input_for_carry_bit_sequence(current_fifo[index_fifo]->right_branch->node_ref, 
													current_fifo[index_fifo]->right_branch->node_ref->n_t.hetero_node.width_a,
													current_fifo[index_fifo]->right_branch->node_ref->n_t.hetero_node.width_a +
													current_fifo[index_fifo]->right_branch->node_ref->n_t.hetero_node.width_a);
			}

			/* NOTE : the selection of adders to combine is a graph problem for these computation trees.  In theory if there are multiples of these
			 * then we should be doing a graph matching to find the optimal matching.  My theory is that the odds of this happening are very small,
			 * and I'm not going to spend my time fixing them. */
			
			if ((is_A_of_output_op_carry == TRUE) || (is_B_of_output_op_carry == TRUE))
			{
				/* IF - the root is a carry-in adder, then join it with the left if an adder, and then the right */
				if (is_left_ADDER == TRUE)
				{
					/* IF - the left ADDER then join with left */
					oeo_two_adders_to_one_adder_w_carry_in(is_A_of_output_op_carry, 
															is_B_of_output_op_carry,
															is_A_of_left_input_op_carry,
															is_B_of_left_input_op_carry,
															LEFT,
															&current_fifo[index_fifo]);
				}
				else if (is_right_ADDER == TRUE)
				{
					/* ELSE IF - the right is an adder so join */
					oeo_two_adders_to_one_adder_w_carry_in(is_A_of_output_op_carry, 
															is_B_of_output_op_carry,
															is_A_of_right_input_op_carry,
															is_B_of_right_input_op_carry,
															RIGHT,
															&current_fifo[index_fifo]);
				}
			}
			else if ((is_A_of_left_input_op_carry == TRUE) || (is_B_of_left_input_op_carry == TRUE))
			{
				/* ELSE IF - the left is a carry-in adder, then join with the root */
				oeo_two_adders_to_one_adder_w_carry_in(is_A_of_output_op_carry, 
														is_B_of_output_op_carry,
														is_A_of_left_input_op_carry,
														is_B_of_left_input_op_carry,
														LEFT,
														&current_fifo[index_fifo]);
	
			}
			else if ((is_A_of_right_input_op_carry == TRUE) || (is_B_of_right_input_op_carry == TRUE))
			{
				/* ELSE IF - the right is a carry-in adder, then join with the adder */
				oeo_two_adders_to_one_adder_w_carry_in(is_A_of_output_op_carry, 
														is_B_of_output_op_carry,
														is_A_of_right_input_op_carry,
														is_B_of_right_input_op_carry,
														RIGHT,
														&current_fifo[index_fifo]);
			}
		}

		/* set up the traversal */
		if (current_fifo[index_fifo]->left_branch != NULL)
		{
			oeo_add_to_mini_fifo(current_fifo[index_fifo]->left_branch, &current_fifo, &size_fifo);
		}
		else if (current_fifo[index_fifo]->right_branch != NULL)
		{
			oeo_add_to_mini_fifo(current_fifo[index_fifo]->right_branch, &current_fifo, &size_fifo);
		}

		/* go to the next element */
		index_fifo ++;
	}

	free(current_fifo);
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_check_input_for_carry_bit_sequence
 *-------------------------------------------------------------------------------------------*/
short oeo_check_input_for_carry_bit_sequence (node_t *node, int start_index, int end_index) 
{
	int i;

	for (i = end_index - 1; i >= start_index+1; i--)
	{
		if (node->input_pins[i]->input_propogation_value_x_0_1 != ZERO)
		{
			/* IF - the propogation point is zero */
			return FALSE;
		}
	}

	return TRUE;
}

/*---------------------------------------------------------------------------------------------
 * (function: oeo_two_adders_to_one_adder_w_carry_in
 *-------------------------------------------------------------------------------------------*/
void oeo_two_adders_to_one_adder_w_carry_in (short is_root_A_carry, short is_root_B_carry, short is_child_A_carry, short is_child_B_carry, short right_or_left,
												comp_tree_t** root)
{
	int i;
	node_t *root_node = (*root)->node_ref;
	int width = (*root)->node_ref->num_output_pins;
	node_t *child_node;
	
	node_t *port_A_node;
	int index_start_port_A;
	node_t *port_B_node;
	int index_start_port_B;
	node_t *carry_node;
	int index_start_carry;

	node_t *new_joined_node;	

	comp_tree_t *child_comp_tree;

	assert(2*width == root_node->num_input_pins);

	if (right_or_left == LEFT)
	{
		/* IF - the left node is the one we want to join then store it in child_node */
		child_node = (*root)->left_branch->node_ref;
		child_comp_tree = (*root)->left_branch;

		if ((*root)->left_branch->left_branch != NULL)
		{
			/* IF - the left_branch is an arithmetic node, then make it point to the root node since it will be joined */
			(*root)->left_branch->left_branch->root = (*root);
		}
		if ((*root)->left_branch->right_branch != NULL)
		{
			/* IF - the right_branch is an arithmetic node, then make it point to the root node since it will be joined */
			(*root)->left_branch->right_branch->root = (*root);
		}
	}
	else
	{
		/* ELSE - we want the right side */
		child_node = (*root)->right_branch->node_ref;
		child_comp_tree = (*root)->right_branch;

		if ((*root)->right_branch->left_branch != NULL)
		{
			/* IF - the left_branch is an arithmetic node, then make it point to the root node since it will be joined */
			(*root)->right_branch->left_branch->root = (*root);
		}
		if ((*root)->right_branch->right_branch != NULL)
		{
			/* IF - the right_branch is an arithmetic node, then make it point to the root node since it will be joined */
			(*root)->right_branch->right_branch->root = (*root);
		}
	}

	assert(width == child_node->num_output_pins);
	assert(2*width == child_node->num_input_pins);

	/* create the new node */
	new_joined_node = onu_allocate_skeleton_node("adder_car_join", width, 2*width+1, 3, 1);
	new_joined_node->node_type = MACRO_NODE;
	new_joined_node->n_t.hetero_node.hetero_node_type = MN_ADD_CARRY_NODE;
	new_joined_node->n_t.hetero_node.width = width;

	/* the compt_tree now has a new_ref_node */
	(*root)->node_ref = new_joined_node;

	/* get the carry node */
	if (is_root_A_carry == TRUE)
	{
		/* IF - the root is carry on Port A */
		index_start_carry = 0;
		carry_node = root_node;
		port_A_node = child_node;
		index_start_port_A = 0;
		port_B_node = child_node;
		index_start_port_B = width;

		/* Since carry is on the Left(PortA) then just take the right stuff */
		(*root)->left_branch = child_comp_tree->left_branch;
		(*root)->right_branch = child_comp_tree->right_branch;
	}
	else if (is_root_B_carry == TRUE)
	{
		/* ELSE IF - the root is carry on Port B */
		index_start_carry = width;
		carry_node = root_node;
		port_A_node = child_node;
		index_start_port_A = 0;
		port_B_node = child_node;
		index_start_port_B = width;

		/* Since carry is on the Right(PortB) then just take the left stuff */
		(*root)->left_branch = child_comp_tree->left_branch;
		(*root)->right_branch = child_comp_tree->right_branch;
	}
	else if (is_child_A_carry == TRUE)
	{
		/* ELSE IF - the port A of the root is the carryA*/
		index_start_carry = 0;
		carry_node = child_node;
		port_A_node = child_node;
		index_start_port_A = width;
		port_B_node = root_node;
		if (right_or_left == LEFT)
		{
			/* IF - lefth branch then the other input starts at width_b which is = to width */
			index_start_port_B = width;

			/* Since carry is on the Left(PortA) of the input then update the left branch of the new comp_tree to be the right branch */
			(*root)->left_branch = child_comp_tree->right_branch;
		}
		else
		{
			/* ELSE - the join is with the right node so the width_a is the  input */
			index_start_port_B = 0;

			/* Since carry is on the Left(PortA) of the input then update the right branch of the new comp_tree to be the right branch */
			(*root)->right_branch = child_comp_tree->right_branch;
		}
	}
	else if (is_child_B_carry == TRUE)
	{
		/* ELSE IF - the port B of the root is the carryB */
		index_start_carry = width;
		carry_node = child_node;
		port_A_node = child_node;
		index_start_port_A = 0;
		port_B_node = root_node;
		if (right_or_left == LEFT)
		{
			/* IF - lefth branch then the other input starts at width_b which is = to width */
			index_start_port_B = width;

			/* Since carry is on the Right(PortB) of the input then update the left branch of the new comp_tree to be the left branch */
			(*root)->left_branch = child_comp_tree->left_branch;
		}
		else
		{
			/* ELSE - the join is with the right node so the width_a is the  input */
			index_start_port_B = 0;

			/* Since carry is on the Right(PortB) of the input then update the right branch of the new comp_tree to be the left branch */
			(*root)->right_branch = child_comp_tree->left_branch;
		}
	}

	/* hookup input 1 */
	for (i = 0; i < width; i++)
	{
		/* copy the input node into the new node */
		onu_remap_input_port(new_joined_node, port_A_node, i, i + index_start_port_A);
	}

	/* hookup input 2 */
	for (i = 0; i < width; i++)
	{
		/* copy the input node into the new node */
		onu_remap_input_port(new_joined_node, port_B_node, width + i, i + index_start_port_B);
	}

	/* hook up the carry node to the last input */
	onu_remap_input_port(new_joined_node, carry_node, 2*width, index_start_carry);

	/* remove the zero values that make up the carry_in */
	for (i = index_start_carry+1; i < index_start_carry+width; i++)
	{
		onu_remove_output_pointer_to_node(onu_get_input_pins_node(carry_node->input_pins[i]), 
										onu_get_input_pins_related_output_port(carry_node->input_pins[i]), 
										onu_get_input_pins_related_output_port_array_index(carry_node->input_pins[i]));
	}

	/* hookup the output */
	for (i = 0; i < width; i++)
	{
		onu_copy_output_port(new_joined_node, root_node, i, i);
	}

	/* delete the comp_tree */
	oeo_free_a_computation_tree_node (child_comp_tree);

	/* delete the previous nodes */
	onu_free_node(root_node);
	onu_free_node(child_node);
}
