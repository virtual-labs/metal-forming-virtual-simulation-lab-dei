
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

/* This is where it all happens.  This file contains the many difeerent definitions and data structures that ODin uses.  I try to discuss each
 * data structure since I find this is the vital aspect to understand when reading my code.  
 *
 * Most of the art in programming is designing these data structures to be easy to use in all the functionality that it will be used for.
 * I'm okay at this, but far from a master.  The errors I made in designing my data structures has made some of my code clunky and tricky to
 * wrap my head around.
 *
 * There are two major datastructure types in Odin.  One is the hierarchical related one, and I call these cells.  The other is a for flattened netlists
 * and I call these nodes.  I will reference structures related to these two types of structures as 1st for hierarchical and 2nd for falattened.
 *
 * Also some of the datastructures and ideas in my code are from an original design by Vladimir Dergachev for using Icarus. 
 */
#define cell_nets_t struct cell_nets_t_t
#define internal_signal_t struct internal_signal_t_t
#define net_pointer_t struct net_pointer_t_t
#define cell_ports_t struct cell_ports_t_t
#define cell_t struct cell_t_t
#define generated_cell_t struct generated_cell_t_t
#define macro_cell_t struct macro_cell_t_t
#define defined_cell_t struct defined_cell_t_t
#define instance_cell_t struct instance_cell_t_t
#define node_input_pin_t struct node_input_pin_t_t
#define node_output_pin_t struct node_output_pin_t_t
#define node_t struct node_t_t
#define comp_tree_t struct comp_tree_t_t
#define mixed_signal_t struct mixed_signal_t_t
#define signal_list_t struct signal_list_t_t
#define node_fifo_t struct node_fifo_t_t

#ifndef __EDIF_TYPES_H
#define __EDIF_TYPES_H

#include "linked-list.h"
#include "ivl_target.h"
#include "string_cache.h"

// this is a default number that describes which pins in a memory are reserved.  0 is clock, 1 is write enable 
#define MEMORY_PIN_OFFSET 2

/* These are just some constants that I use to define the state I'm in for traversing Icarus's IR */
#define NUM_TRAVERSALS 3
#define INITIAL_PARSE 0
#define NET_OUTS 1
#define COMPLETE_NETS 2

/* Definitions for turning on/off pieces of code that is sometimes experimental or debugging stuff. */
#define ALLOCATION_COUNT_MACRO
#define ALLOW_RESET 

/* Library cell is part of the 1st data structure (DS) which is describes a library of primitive cells that can
 * be accessed for an EDIF type description.  This data structure is used early in Odin's cycle and is filled
 * statically (this is an interesting idea...not mine).  See odin.c */ 
typedef struct
{
    char *key;
    char *cellref;
    char *viewref;
    char *description;
    long ports;
    char **port_name;
	int num_output_ports; 
}
library_cell;

/* This is an architecture structure that is described by a name and contains a listing of primitive cells (library_cell) */
typedef struct
{
    char *key;
    char *name;
    library_cell *library;
}
architecture;

/* This structure used to be more importnat but not it's a wrapper for a cell that I haven't eliminated yet */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *top_cell;
} cell_information_expr;

/* This is the 1st DS the cell.  This version is the statement cell that includes additional place holders for statement
 * information.  These include the zero and one cells and nets, memory cells, a clock net, and a flag that describes
 * wether the statement tree is all blocking or all non blocking. */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *top_cell;

	cell_t **memory_cells;
	cell_t *zero_cell;
	cell_nets_t *zero_cell_net;
	cell_t *one_cell;
	cell_nets_t *one_cell_net;
	cell_nets_t *clock_net;

	int is_blocking;
} cell_information_stmt;

/* This is another part of the 1st DS for the moduls.  It's similar to the statement, but also has a spot to record
 * statements in the module as well as a flag for what stage of the traversal this module has gone through. */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *top_cell;

	cell_t **memory_cells;
	cell_t *zero_cell;
	cell_nets_t *zero_cell_net;
	cell_t *one_cell;
	cell_nets_t *one_cell_net;
	cell_nets_t *clock_net;

	int number_of_module_statements;
	cell_information_stmt **this_modules_statements;

	int number_times_visited_for_traversing[NUM_TRAVERSALS];
} cell_information_module;

/* This is still part of the 1st DS for a cell.  Again, this one use to be more complicated, but now is essentially just a 
 * wrapper */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *top_cell;
} cell_information_basic;

/* This is a little mini data structure that I can use as a parameter to pass through every function.  This allows common stuff
 * to be passed everywhere, and is one way to have globals.  I don't use it as much as I should. */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	long int unique_count;
} inflowmation;

/* One of the original datastructures related to the 1st DS.  This structure allows width of a statement, and statement info to be passed. */
typedef struct {
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	unsigned short wid;
	cell_information_stmt *this_statement_cell_info;
}vector_info ;

/* This structure records information about signals in the sensitivity lists */
typedef struct
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	char* name;
	cell_t* instance;
	int pin;
	ivl_signal_t signal;
	mixed_signal_t *mixed_signal;
} name_instance_pin_t;

/* DEFINITIONS for memory state on flagging wether a memory has been synthesized for both its
 * read and write stages */
#define EXPR_READ 2
#define EXPR_WRITE 3

/* This structure contains the details about a memory.  Mainly the size, the associated flattened node, the cell (LPM only), and some
 * flags to help the processing.  The trick with memory is they are read to, and written from different points, and this structure
 * tries to capture that processing */
#define memory_t struct memory_t_t
memory_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *read_memory_cell; // for LPM
	ivl_memory_t memory;
	node_t *memory_node;
	int address_width;
	short address_read;
	short address_write;
	short is_node_already_defined;
	short clocked;
	char *file_initialization_name;
};

/* DEFITINITIONS for the different classifications of a node (2nd DS). */
#define LIBRARY_NODE 1
#define LIBRARY_NODE_FF 2
#define INPUT_NODE 3
#define OUTPUT_NODE 4
#define VCC_GND_NODE 5
#define MACRO_NODE 6
#define MAPPED_NODE 7
#define NULL_NODE 8

/* DEFINITIONS for the different logic propogation states */
#define INITIALIZED -1
#define ONE 1
#define ZERO 2
#define X 3

/* This is a minor part of the node_t structure (2nd DS).  The port structure tries to capture bus like connections to simplify
 * some of the operations.  I've had a tough time choosing between bus based and single point-to-point connections, so this is
 * a little messy, and I have both.  This describes input ports that attach to the node */
#define node_input_port_t struct node_input_port_t_t
node_input_port_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short is_bus; // TRUE if the entire port
	short width;
	short match;
};

/* This is another port connection, but is used for output, and this means that there are multiples of output nets, which is captured
 * within this structure. */
#define node_output_port_t struct node_output_port_t_t
node_output_port_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short *is_fanout_bus;
	int num_is_fanout_bus;
	short width;
	short match;
};

/* This is the input_pin structure for the 2nd DS.  This describes which node is an input to this pin by describing the node,
 * output pin, and order of the output pins net that this node is connected to.  For example, this node's input on pin 1 is
 * node X on the 3rd output pin, and this connection is the 5th instance on the output net.
 *
 * We also maintain the propogation value at this input, and a spot for who_added which is mainly for debugging. */
node_input_pin_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t *input_node; // each input pin can have 1 driver
	int input_pins_related_output_port; // describes the output port
	int input_pins_related_output_port_index; // describes where this instance appears in the fanout list (outputs can drive multiple inputs)
	short input_propogation_value_x_0_1;
	cell_ports_t *port_who_added;
};

/* This is the output_pin structure for the 2nd DS.  This describes the nodes and pins this particular output pin connects to.
 * For example, imagine the above input pin example is incorporated into this node X.  Then Node X on pin 3 has an output structure.
 * This pin has an output net which attaches to 6 nodes (num_output_pins_level_2).  spot 0 goes to node A input 2 (output_nodes[0], output_pin_related_input_index[0]
 * , spot 1 goes to node ... etc. noting that output 3 goes to node Y on pin 1 (output_nodes[3] = Y, output_pin_related_input_index[3] = 1).
 *
 * Here's a little digram how input and output pins allow us to traverse either way.
 *	X <----------------------------------------------------	input_node
 *			   v-------------------------------------------	input_pins_related_output_port_index
 *		output[3]									input[1]
 *			output_pin_related_input_index[3] ------------^
 *			output_nodes[3] ---------------------> Y
 */ 
node_output_pin_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t **output_nodes; // corresponds to all the nodes this output pin drives
	int num_output_pins_level_2;
	int *output_pin_related_input_index;
	short is_output_propogated;
	cell_ports_t *port_who_added;
};

/* This structure is a list of nodes.  We can use this for a number of situations when we want to pass a list of node 2nd DS. */
#define node_list_t struct node_list_t_t
node_list_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t **nodes;
	int num_nodes;
};

/* This is a match structure which we learn about in TFE_identification.  This essentially holds all the nodes that are part
 * of a successful match of a structure. */
#define match_info_t struct match_info_t_t_t
match_info_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_list_t *input_nodes;
	node_list_t *inout_nodes;
	node_list_t *output_nodes;
	node_list_t *nodes;
	node_list_t *additional_seed_nodes;
	STRING_CACHE *additional_seed_nodes_sc;
	node_list_t *all_nodes;
};

/* This structure is a higher level construct that describes a TFE_identification match.  Not only are the nodes that match 
 * referenced here, but we also describe information about the structure that has been matched. */
#define tfe_identification_t struct tfe_identification_t_t
tfe_identification_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short *macro_type_for_match;
	short *match_ids;
	int num_possible_bindings;
	match_info_t **potential_tfe_implementation;	
};

/* This structure is used for when we finally bind a set of nodes to a specific structure. */
#define tfe_binding_t struct tfe_binding_t
tfe_binding_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short match_id;
	match_info_t *tfe_implementation;	
	char *bind_name;	
	void *alternative_bind_info;
};

/* DEFINITIONS for the possible states of a partial mapping.  This helps us decide what we need to do with each node. */
#define HPM_NOT_TOUCHED 1
#define HPM_SOFT_MAPPED 2
#define HPM_HARD_MAPPED 3

/* This is the 2nd Major DS.
 *
 * It's a little big since it tries to union a set of different possible types of nodes.  The biggest is the hetero_node
 * which encompasses many types of structures, so there are a lot of little flags and variables that perform different
 * tasks for different macro nodes.
 *
 * In addition to the union that helps us describe aspects of different nodes, each node has input_pins, output_pins, partial_mapping
 * information, unique_name, and accounting variables.
 *
 * This structure is relatively simple, and probably could be shrunk some, but it works for all the many things I need to use
 * it for.*/
node_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			cell_t *cell;
			short cell_index;
		} library_node;
		struct
		{
			cell_t *cell;
			short cell_index;
			int ff_index;
		} library_node_ff;
		struct
		{
			short hetero_node_type;
			short tree_marked;
			short counter_dir;
			int width;
			int width_a;
			int width_b;
			int width_c_also_shift_size;
			int index_for_global_list;
			short constant_portA;
			short constant_portB;
			ivl_memory_t memory;
			memory_t *memory_details;
			int *port_widths;
			int num_port_widths;
			int muxed_input_start_index;
			int num_cases;
			long int *case_order;
			short *register_ports_or_mux_choice;
		} hetero_node;
		struct
		{
			char *port_string;
			int pin_id;
			int index_in_input_list;
		} input_node;
		struct 
		{
			char *port_string;
			int pin_id;
			int index_in_output_list;
		} output_node;
		struct
		{
			char *name;
		} vcc_gnd_node;
	} n_t;

	void *anything_1;

	char *unique_name;
	char *generated_from_name;

	node_input_pin_t **input_pins;
	int num_input_pins;
	node_input_port_t **input_ports;
	int num_input_ports;

	node_output_pin_t **output_pins;
	int num_output_pins;
	node_output_port_t **output_ports;
	int num_output_ports;

	short node_type;
	short mark_number;
	short mark_number_live;

	short level_count;
	short level_value;

	tfe_identification_t *possible_node_bindings;	
	tfe_binding_t *binding;

	int tfe_id_mark;
	short is_partial_mapped_bound; 
};

/* DEFINTIONS describing right and left aspects of a computation tree */
#define RIGHT 1
#define LEFT 2

/* This is a structure that we use to describe a binary computation tree. */
comp_tree_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t *node_ref;	
	comp_tree_t *root;
	comp_tree_t *left_branch;
	comp_tree_t *right_branch;
};

/* DEFINITIONS for the traverse type we are doing.  These flags are unique so that we
 * can identify for each traverse wether we have traversed a node already.  */
#define FLATTEN_TRAVERSE 1
#define VQM_TRAVERSE 2
#define QUARTUS_LPM_TRAVERSE 3
#define QUARTUS_LPM_TRAVERSE_WIRE 4
#define CONSTANT_PROPOGATION 5
#define PM_SOFT_TRAVERSE 6
#define DEBUG_TRAVERSE 7
#define DEBUG_REVERSE_TRAVERSE 8
#define FSM_TRAVERSE 9
#define STAT_TRAVERSE 9
#define LIVE_ANALYSIS_MARK_FORWARDS 16
#define LIVE_ANALYSIS_MARK_BACKWARDS 17
#define LIVE_ANALYSIS_INPUTED_FORWARDS 18
#define LIVE_ANALYSIS_INPUTED_BACKWARDS 19
#define BLIF_TRAVERSE 20
#define FF_TRAVERSE 21

/* DEFINITONS for a signal structure that describes if the naming scheme used for a signal is created by me in a string,
 * or can be accessed using Icarus's IR.  This IR method saves wasting more memory on a name. */
#define SIGNAL_NAMED 0
#define USER_NAMED 1

/* DEFINITIONS for the direction of a cell_port */
#define IN_PORT 1
#define OUT_PORT 2
#define IN_OUT_PORT 0

/* This structure is for the ports of a cell (1st DS).  In this structure we describe the name, pin_id, port_direction and
 * some additional synthesis flags */
cell_ports_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			ivl_signal_t signal;
		} signal_named;
		struct
		{
			char *name;	
		} user_named;
	} p_t;
	cell_t *back_cell;

	int pin_id;
	int pin_order;

	short IN_OUT;
	short port_type;
	short do_not_copy;
};

/* This data structure is used to represent internal wires within a cell.  This type of connection can be made from a library cell or
 * a cell_port of an internal cell.  Are you getting the feeling that the cell DS is poor;) */
internal_signal_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			short cell_index;
			short cell_port_id;
		} defined_cell;
		struct
		{
			cell_ports_t *cell_port;
		} generated_cell;
	} i_t;
	short instance_type;
	cell_t *cell_instance;
};

/* This structure contains the structure that a net is connected to.  This can either be a cell_port or an internal signal. */
#define CELLS_PORTS 0
#define CELLS_INTERNALS 1
net_pointer_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			cell_ports_t *port_reference;
		} cells_ports;
		struct
		{
			internal_signal_t *signal_reference;
		} cells_internals;
	} d_t;
	cell_nets_t *back_net; // This is a pointer to the net that this net_pointer is in

	short driver_type; // Describes if the driver is a port or an internal signal
};

/* This structure describes a net where there is one net_pointer for the output or driver, and there can be a list of net_pointers
 * for the inputs or driven. */
cell_nets_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	cell_t *back_cell; // This is a back pointer to the cell this net is in

	net_pointer_t *driver;
	net_pointer_t **driven;
	int num_driven;	

	short traversal_flag;
};

/* This is a structure that is used for identifying net_pointers.  I can't exactly remember why this is important (you can probably figure it out by looking
 * at the first traversal of the Icarus IR).  I do know that there is some trick in identifying these net pointers so I use this structure as a lookup structure. */
#define net_lookup_t struct net_lookup_t_t
net_lookup_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	net_pointer_t *ivl_lookup_pointer;
	net_pointer_t *odin_actual_pointer;
	cell_nets_t *the_net;
};

/* DEFINTIONS describing which type of cell this is.  Defined cell is a primitive logic cell, Generated cell, is a cell which we generate, and
 * Instance cell is a cell that is an exact copy of a cell definition, and this is a unique instance of that cell. */
#define DEFINED_CELL 0
#define GENERATED_CELL 1
#define INSTANCE_CELL_POINTER 2

/* This is the 2nd Major DS.  There are three types of cells that extend this basic definition, and we make sure that these structures are
 * defined in exactly the same order so we can do casting without having to copy data between cell_t definition and the other cell defintions.
 *
 * Within the basic cell we describe the cell with respect to its name, ports, connection nets, internal cells, and the cell that referenced it.
 * This is a hierarchical data structure since this cell encapsulates and can be encapsulated by other cells.  
 *
 * Imagine it sort of like this:
 *
 * 		||==============================================||
 * 		||Cell A										||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||		||==========||		||==========||		||
 * 		||		|| Cell B	||		|| Cell C	||		||
 * In 1 ||		||			||		||			||		|| Out 1
 * 	----||------||----!-----||------||---!------||------||------
 * 		||		||			||		||			||		||
 * 		||		||			||		||			||		||
 * 		||		||==========||		||==========||		||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||												||
 * 		||==============================================||
 *
 *	The aboce diagram shows how cells are embedded in other cells.  Cell A will have an input port, and output port and these will be connected to
 *	cell B and Cell C respectively.  There will also be an internal signal which connects B to C.  Within B and C they will have their own internal
 *	ports for input and output which will connect to the "!", which itself is a cell.  This is how I captured the hierarchy of the HDL which closely
 *	approximates the IR that Icarus generates. */ 
cell_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short cell_type;
	short traversal_flag;

	cell_t *back_cell;

	char *cell_definition_name;
	char *cell_instance_name;

	STRING_CACHE *port_hash;

	cell_ports_t **cells_input_ports;
	int num_cells_input_ports;
	cell_ports_t **cells_output_ports;
	int num_cells_output_ports;
	cell_ports_t **cells_inout_ports;
	int num_cells_inout_ports;

	cell_nets_t **cells_nets;
	int num_cells_nets;

	cell_t **cells_instances;
	int num_cells_instances;
};

/* This is the exetended structure of cell for generated cells the addtional stuff is needed for the heterogeneous
 * structures that can be described in Verilog */
generated_cell_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short cell_type;
	short traversal_flag;

	cell_t *back_cell;

	char *cell_definition_name;
	char *cell_instance_name;

	STRING_CACHE *port_hash;

	cell_ports_t **cells_input_ports;
	int num_cells_input_ports;
	cell_ports_t **cells_output_ports;
	int num_cells_output_ports;
	cell_ports_t **cells_inout_ports;
	int num_cells_inout_ports;

	cell_nets_t **cells_nets;
	int num_cells_nets;

	cell_t **cells_instances;
	int num_cells_instances;

	STRING_CACHE *net_pointer_hash;
	STRING_CACHE *net_hash;

	short macro_cell_type;
	node_t *node_to;

	short is_signed_mult;
	short width_a;
	short width_b;
	short width_c_also_shift_size;
	short width;

	int num_input_ports;
	int num_output_ports;

	ivl_memory_t memory;
	memory_t *memory_details;

	short is_statement_cell;
	signal_list_t *list;
};

/* This is the extended definition for an instance cell, where and instance cell is an instance of a generated cell.  The additional 
 * info for the cell_defiiniton provides access to the details. */
instance_cell_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short cell_type;
	short traversal_flag;

	cell_t *back_cell;

	char *cell_definition_name;
	char *cell_instance_name;

	STRING_CACHE *port_hash;

	cell_ports_t **cells_input_ports;
	int num_cells_input_ports;
	cell_ports_t **cells_output_ports;
	int num_cells_output_ports;
	cell_ports_t **cells_inout_ports;
	int num_cells_inout_ports;

	cell_t *cell_definition;
	short reused_cell;
};

/* This holds all the info needed to describe primitive logic also known as the basic library. */
defined_cell_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short cell_type;
	short traversal_flag;

	cell_t *back_cell;

	char *cell_definition_name;
	char *cell_instance_name;

	short cell_index;
	node_t *node_to;
};

/* DEFINITIONS for the different types that a mixed signal can be */
#define CELL_PORT 0
#define NODE_INPUT 1
#define NODE_OUTPUT 2
#define NODE_INPUT_OUTPUT 3

/* This structure is used for expression and statement traversal.  This will describe a signal.  Unfortunately, the signal can be of many types since it 
 * is used to join a mixture of DS 1 and 2.  Therefore all the possible joinings need to appear in mixed_signal. */ 
mixed_signal_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			cell_ports_t *cell_port;
			node_output_pin_t *node_output;
		} cell_port;
		struct
		{
			node_input_pin_t *node_input;
		} node_input;
		struct
		{
			node_output_pin_t *node_output;
		} node_output;
		struct
		{
			node_input_pin_t *node_input;
			cell_ports_t *cell_port;
		} node_input_output;
	} t;
	short type;
	short has_connection;
	short register_reset;
};

/* This struture describes how mixed signals can be joined together in lists that represent the inputs and outputs of the expression and
 * statement trees.  Inputs represent signals that are needed, and outputs represents outputs that the statement/expression generates. we
 * also record some accounting info to help synthesis. */
signal_list_t 
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	mixed_signal_t **input_signal_list;	
	int input_signal_list_size;
	mixed_signal_t **output_signal_list;	
	int output_signal_list_size;

	short is_blocking;
	short is_memory;
};

/* DEFINITIONS this is Quartus specific for a Quartus library we use.  Each definition describes the Quartus primitive. */
#define QL_SIGNAL 1
#define QL_LOGIC 2
#define QL_DFF 3
#define QL_DEFINITION 4

/* HARD coded from file describing library cells int the Quartus tech library */
#define NUM_LIBRARY_CELLS 17

/* This is the structure we use to read in the Quartus library for primitives.  In addition to some naming conventions and description
 * of number of ports, we also provide what happens for constant propogation values. */
typedef struct
{
	char *name;
	short definition_style;
	int num_input_ports;
	char **input_ports;
	int num_output_ports;
	char **output_ports;
	char *verilog_definition_cell;
	short is_definition_already_written;
	short propogate_on_zero;
	short propogate_on_one;
	short propogate_on_x;
}
gate_library_implementations;

/* xml matching library structures */
#define device_library_t struct device_library_t_t
#define primitive_t struct primitive_t_t
#define tfe_t struct tfe_t_t
#define device_tfe_t struct device_tfe_t_t

/* This structure is for the high-level description of the target FPGA library.  As you can see I should unify all these libraries into one, 
 * but currently, this library is for describing complex structures, mainly the Statix DSP block. */
device_library_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	char* device_family_name;
	char* device_name;
	device_tfe_t **devices;
	int num_devices;
};

/* This structure is for a primitive within the FPGA architecture.  Primitives in this case are anything from memories to multipliers, and they 
 * are the building blocks for more complex structures. */
primitive_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	short macro_type;

	int num_input_ports;
	char **input_port_names;
	int *input_port_width;
	int total_input_pins;

	int num_output_ports;
	char **output_port_names;
	int *output_port_width;
	int total_output_pins;

	int timing_delay;
};

/* This is a way of describing flip-flops for the device_library. */
#define ffs_t struct ffs_t_t
ffs_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t **input_mn_ffs;
	int num_input_mn_ffs;
	node_t **output_mn_ffs;
	int num_output_mn_ffs;
	node_t **inout_mn_ffs;
	int num_inout_mn_ffs;
};

/* DEFINTIONS describing the type of TFE this is */
#define PRIMITIVE 1
#define GRAPH 2

/* This structure is a high-level structure that describes the target technology on an FPGA.
 * tfe stands for target functional element, and in this case the tfe can describe either a 
 * primitive or a complex graph of nodes consisiting of nodes, a seed node, and flip-flops.  The
 * seed node is the node we use to try and match other things from since it most likely 
 * appears infrequently in the design netlist.  For example, a multiplier is a common seed node. */
tfe_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	union
	{
		struct
		{
			primitive_t *primitive;	
		} primitive;
		struct
		{
			node_t *seed_node;
			node_t **nodes;
			int num_nodes;
			ffs_t *flip_flops;	
		} graph;
	} t_t;
	short tfe_type;

	char *name;
	short macro_type;
	short macro_id_seed_type;
};

/* This structure is a mini structure that is used when ever I wan't to build a fifo of nodes.  I
 * use the fifo concept whenever something is a recursive problem because the recursive depth in
 * Odin is quite deep for large circuits. */
node_fifo_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	node_t *node;
	node_t *who_added;
	int pin;
};

/* This structure is used to describe a specific complex structure and how many of this structure exist on the
 * target device. */
device_tfe_t
{
#ifdef ALLOCATION_COUNT_MACRO
	long m_id;
#endif
	char *name;
	int num_of_this_device;
	tfe_t **targets;	
	int *num_of_targets_for_this_device;	
	int num_targets;
};

/* This structure is used in our multiplexer to multiplier mapping technique.  It is used to record
 * the estimated logic element saving per mux */
#define mux_saving_t struct mux_saving_t_t
mux_saving_t
{
	float LE_saving_value;
	short is_decoded_mux;
	int corresponding_index_in_multiplexer_list; 
	mux_saving_t *next;
};

/* Function definition */
typedef void (*nexus_if) (cell_information_module *,
			  ivl_scope_t,
			  STRING_CACHE *,
			  ivl_nexus_t);

/* DEFINTIONS for define debug spacing */
#define TAB 1
#define BAT -1

/* DEFINITIONS for common constants I use throughout the program */
#define TRUE 1
#define FALSE 0
#define OK 1
#define ERROR 0
#define NOT_OK -1
#define INIT -1

#define TAKEN (void *)0x0000001

#define GDB_MACRO {int gdb_macro = 17; while(gdb_macro == 17){}}

#define OUT_NAME "OUT"

#define WIDTH_NOT_IMPORTANT -99

/* DEFINED traversal numbers */
#define EF_FLATTEN_PASS 12 
#define EF_CREATE_PASS 11 
#define EDIF_PASS 2
#define VQM_PASS 3 
#define QL_PASS 4 
#define PROPOGATION 8 

/* DEFINITIONS for some constants of where specific pins are in an adder.  I hard code this with the librarires. */
#define ADDER_A_IN_PIN 0
#define ADDER_B_IN_PIN 1
#define ADDER_CARRY_IN_PIN 2
#define ADDER_CARRY_OUT_PIN 1
#define ADDER_OUT_PIN 0

/* DEFINITIONS describing the type of FF */
#define INPUT_FF 1
#define OUTPUT_FF 2
#define INOUT_FF 3

/* These are names for an optimization that maps multiplexers to DSP blocks */
#define MUX_SOFT_MAP 0
#define MUX_DSP_MAP 1

/* DEINITIONS for the possible target architectures */
#define STRATIX_ARCH 1
#define VPR_ARCH 2
#define VIRTEX_ARCH 3

/* DEFINITIONS for the different types of multipliers */
#define FPGA_HARD_MULT 1
#define MEMORY_MULT 2
#define FPGA_PURE_SOFT_MULT 3
#define FPGA_HYBRID_MULT 4

/* DEFINTIONS for all the different types of nodes there are.  This is also used cross-referenced in utils.c so that I can get a string version 
 * of these names, so if you add new tpyes in here, be sure to add those same types in utils.c */
typedef enum macro_types_t_t
{
	MACRO_NONE,
	MN_MEMORY,
	MN_COUNTER,
	MN_ADD_CARRY_NODE,
	MN_UNARY_SUB,
	MN_EQ,
	MN_NEQ,
	MN_GE,
	MN_GT,
	
	MN_LOG_AND, // 9
	MN_LOG_OR,
	MN_LOG_NOT,

	MN_NOT,
	MN_AND,
	MN_OR,
	MN_XOR,
	MN_NAND,
	MN_NOR,
	MN_XNOR,
	
	MN_RED_AND, // 19
	MN_RED_OR,
	MN_RED_XOR,
	MN_RED_NAND,
	MN_RED_NOR,
	MN_RED_XNOR,
	
	MN_SHIFT_LEFT,
	MN_SHIFT_RIGHT,
	
	MN_MUX,
	MN_FF,
	MN_FFR, // 29
	MN_REGISTER, 
	MN_REGISTER_RESET, 
	
	/* These DSP blocks are ranked in order from FOUR MULT being of the highest priority to MN_MULT_ADD_PACK being the lowest */
	MN_FOUR_MULT,
	MN_TWO_MULT,

	MN_ADD_MULT,
	MN_MAC,

	MN_MULT_ADD_PACK,

	MN_IF,
	MN_CASE,
	MN_STATE_CASE,// 39 
	MN_CONST_CASE,

	VCC,
	GND, 
	MN_BUF,

	MN_ADD_SUB,

	// HETER_COMPUTATIONS_GT is the threshold where all hetero units greater than this are computational hetero nodes
	MN_COMPUTATIONS_GT,
	MN_MULT,
	MN_ADD,
	MN_SUB, 

	MN_END_POINT
} macro_types_t;

/* DEFINITIONS for allocation names that help me record what file is allocating what memory.  Some of my own adhoc memory accounting. */ 
#define NUM_ALLOC_IDS 56
typedef enum alloc_id_t_t
{
	GENERIC_TRAVERSAL_OF_IR_FOR_LPM_SIGNAL_MODULE_LINKS = 0,
	GENERIC_TRAVERSAL_STATS,
	HETS_BINDING,
	HETS,
	HETS_CELL_DEFINE_UTILS,
	HETS_CELL_EXPR_DEFINE_UTILS,
	HETS_CELL_MODULE_DEFINE_UTILS,
	HETS_CELL_STMT_DEFINE_UTILS,
	HETS_EDIF_GRAPH_UTILS_1,
	HETS_EDIF_GRAPH_UTILS_2,
	HETS_EDIF_GRAPH_UTILS_3,
	HETS_EDIF_GRAPH_UTILS_4,
	HETS_EDIF_GRAPH_UTILS_5,
	HETS_EDIF_GRAPH_UTILS_6,
	HETS_EDIF_GRAPH_UTILS_7,
	HETS_EDIF_GRAPH_UTILS_8,
	HETS_EDIF_GRAPH_UTILS_9,
	HETS_EDIF_GRAPH_UTILS_10,
	HETS_EDIF_GRAPH_UTILS_11,
	HETS_EDIF_GRAPH_UTILS_12,
	HETS_EDIF_GRAPH_UTILS_13,
	HETS_EDIF_GRAPH_UTILS_14,
	HETS_EDIF_GRAPH_UTILS_15,
	HETS_EDIF_GRAPH_UTILS_16,
	HETS_EDIF_GRAPH_UTILS_17,
	HETS_EDIF_GRAPH_UTILS_18,
	HETS_EDIF_GRAPH_UTILS_19,
	HETS_EDIF_GRAPH_UTILS_20,
	HETS_EDIF_GRAPH_UTILS_21,
	HETS_EDIF_GRAPH_UTILS_22,
	HETS_EDIF_GRAPH_UTILS_23,
	HETS_EDIF_GRAPH_UTILS_STRDUP_1,
	HETS_EDIF_GRAPH_UTILS_STRDUP_2,
	HETS_EDIF_GRAPH_UTILS_STRDUP_3,
	HETS_EDIF_GRAPH_UTILS_STRDUP_4,
	HETS_EDIF_GRAPH_UTILS_STRDUP_5,
	HETS_EDIF_GRAPH_UTILS_STRDUP_6,
	HETS_EDIF_GRAPH_UTILS_STRDUP_7,
	HETS_EDIF_GRAPH_UTILS_STRDUP_8,
	HETS_EVAL_EXPR,
	HETS_EXPRESSION_OPTIMIZATIONS,
	HETS_FLAT_NETLIST,
	HETS_HETERO_UTILS,
	HETS_LEVELIZER_AND_PROPOGATER,
	HETS_LPM,
	HETS_MEMORY_UTILS,
	HETS_NODE_UTILS,
	HETS_NODE_AND_CELL_UTILS,
	HETS_PROCESS,
	HETS_QUARTUS_LPM_GRAPH_UTILS,
	HETS_SOFT_MAPPING,
	HETS_TFE_IDENTIFICATION,
	HETS_UTILS,
	HETS_XML_PARSER_DEVICE_LIB,
	HETS_FINITE_STATE_MACHINE,
	HETS_COLLECT_STATS,
	HETS_BIND_MULTIPLEXERS_2_MULTIPLIERS
} alloc_id_t;

/* DEFINITIONS for all the different types of optimizaitons that can be turned on or off. */
typedef enum optimization_t_t
{
	OPT_UNARY_MINUS,
	OPT_ADD_CONSTANTS,
	OPT_ADD_LSB_SHRINK,
	OPT_MULT_CONSTANTS,
	OPT_MULT_MSB_SHRINK,
	OPT_A_B_1_ADD,
	OPT_DETECT_MN_X_MULT,
	OPT_DETECT_MN_MAC,
	OPT_DETECT_MN_MULT_ADD_PACK,
	OPT_COLLAPSE_MULTIPLEXERS, // 9
	OPT_COMMON_SIG_MULTIPLEXERS,
	OPT_FSM_ONE_HOT,
	OPT_REGISTER_RESET,
	OPT_MAP_MUX_TO_MULTIPLIER,
	OPT_ENCODE_MUXES
} optimization_t;

#define MAX(a,b) ((a)>(b)?(a):(b))

#endif
