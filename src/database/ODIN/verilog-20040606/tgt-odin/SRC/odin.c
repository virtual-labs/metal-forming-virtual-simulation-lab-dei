
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

/* This is the starting point of the Verilog processing.  This connects to the Icarus flow, and takes Icarus's IR and converts it 
 * into a flattened netlist of logic structures that can be interfaced with other CAD flows for mapping to FPGAs or other technology.
 * The flow of this software is controlled and described in the main loop. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "ivl_target.h"

#include "string_cache.h"
#include "debug.h"
#include "config.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_debug.h"
#include "odin_utils.h"

#include "odin_lpm.h"
#include "odin_logic.h"
#include "odin_signal.h"
#include "odin_eval_stmt.h"
#include "odin_cell_define_utils.h"
#include "odin_hl_flatten.h"
#include "odin_memory_utils.h"
#include "odin_ds1_graph_utils.h"
#include "odin_FLAT_netlist.h"
#include "odin_QUARTUS_LPM_graph_utils.h"
#include "odin_levelizer_and_propogater.h"
#include "odin_hetero_utils.h"
#include "odin_expression_optimizations.h"
#include "odin_partial_mapper.h"
#include "odin_xml_parser_device_lib.h"
#include "odin_xml_parser_config_files.h"
#include "odin_node_display.h"
#include "odin_finite_state_machine.h"
#include "odin_collect_stats.h"
#include "odin_BLIF_output.h"
#include "generic_traversal_of_IR_for_lpm_signal_module_links.h"

/* SPECIAL includes which define variables which are actually little technology libraries */
#include "paj_vpr.inc"
#include "paj_quartus.inc"
#include "stratix_QUARTUS_LPM.inc"

/***************************************************************************************************
 * GLOBALS 
 **************************************************************************************************/
FILE *main_out = NULL;
FILE *log_file = NULL;
FILE *stat_file = NULL;
FILE *out = NULL;
char *path; // variable that contains the global path 
node_t *clock_node; // strange and bad variable that tries to capture the clock signal

/* this defines iverilog version of standard logic cell using cells from vendor specific library */
library_cell *current_library = NULL;
gate_library_implementations *quartus_lib_imp;
gate_library_implementations *blif_implementation;

/* all generated cell names are in the form of IVERILOG_FUNCTION_size0_size1 should never exceed 40 characters */
inflowmation top_level_process_info;

STRING_CACHE *visited_modules_string_cache;
STRING_CACHE *visited_constants_string_cache;
STRING_CACHE *visited_portrefs_string_cache; 
STRING_CACHE *visited_logic_string_cache; 
STRING_CACHE *visited_constants_cache; 
STRING_CACHE *IR_module_tname_lookup;

short architecture_target;

/* This is how the libraries are entered in as arrays where the third argument leads the *.inc file */
architecture arch[] = {
    {"vpr", "VPR", paj_vpr_library},
    {"stratix", "STRATIX", paj_quartus_library},
    {NULL, NULL, NULL}
};

void o_list_architectures(FILE *to);

/*---------------------------------------------------------------------------------------------
 * (function: target_design )
 *  This is the entry point from iverilogs emit function and it basically starts at
 *  the top module and traverses all the structures of the desing creating first a hierarchical
 *  data structure (DS 1) and then flattening that structure into a flattened netlist (DS 2).  
 *  See odin_types.h for a description of these data structures.  
 *  
 *  This function does most of the initialization, or calls initialization functions for 
 *  global aspects.  This includes reading in the input arguments and setting up files that
 *  will be read and written to.
 *
 *  Then three traversals are executed to create the hierarchical netlist in DS 1.  
 *
 *  Next we flatten this netlist into DS 2 which everything else is done on.
 *
 *  We perform optimizations, partial mapping to complex functions, and any other optimizations
 *  on the flattened netlist.
 *
 *  Finally, the netlist is traversed and output in the required format. 
 *-------------------------------------------------------------------------------------------*/
int target_design(ivl_design_t des)
{
	const char *main_path;
    const char *tech_lib_file_path = ivl_design_flag(des, "lib");
	const char *dynamic_debug_file = ivl_design_flag(des, "dynamic_debug_file");
	const char *optimization_file = ivl_design_flag(des, "optimization_file");
    char *log_file_path;
    char *stat_file_path;
    char *architecture;
    char *gdb_macro_to_catch_dll;
    long i;

	/* get the path of the main output file = directory + name. */
    main_path = ivl_design_flag(des, "-o");
	path = ou_generate_path_without_trailing_file_name((char*)main_path);

	/* initializing a global */
	clock_node = NULL;

	/* Read in the dynamic debug file */
	oxmlcf_parse_debug_config_file((char*)dynamic_debug_file);
	/* Read in the optimizations that will be turned on */
	oxmlcf_parse_optimization_file((char*)optimization_file);
	
	/* finds icarus's targeting architecture key */
    architecture = (char*)ivl_design_flag(des, "arch");
    if(architecture == NULL)
	{
	    fprintf(stderr, "ERROR: the architecture was not specified\n");
	    o_list_architectures(stderr);
	    return -1;
	}

	if (strcmp(architecture, "vpr") == 0)
	{
		/* IF - the string indicates we are a VPR architecture */
		architecture_target = VPR_ARCH;
	}
	else if (strcmp(architecture, "stratix") == 0)
	{
		/* ELSE IF - the string indicates we are targeting a Stratix FPGA */
		architecture_target = STRATIX_ARCH;
	}
	else if (strcmp(architecture, "virtex") == 0)
	{
		/* ELSE IF - the string indicates we are targeting a Virtex FPGA */
		architecture_target = VIRTEX_ARCH;
		assert(FALSE); // not supported yet
	}
	else
	{
		assert(FALSE);
	}

	/* grab the possiblity of a dll catch statement - this is only needed when we link the library in dynamically.
	 * For profiling reasons, we also have a non-dynamic build */
	gdb_macro_to_catch_dll = (char*)ivl_design_flag(des, "gdb_spin_point");
	if(strcmp(gdb_macro_to_catch_dll, "yes") == 0)
	{
	    fprintf(stdout, "AT GDB_MACRO\n");
//		GDB_MACRO;
	}

	/* make sure that this target architecture is valid */
    for(i = 0; arch[i].key != NULL; i++)
	{
	    if(!strcmp(arch[i].key, architecture))
		{
		    fprintf(stderr, "Producing EDIF 2.0.0 output for %s\n", arch[i].name);
		    current_library = arch[i].library;
		    break;
		}
	}
    if(arch[i].key == NULL)
	{
	    fprintf(stderr, "ERROR: unknown architecture \"%s\"\n", architecture);
	    o_list_architectures(stderr);
	    return -1;
	}

	/* make sure there is a path specified for the output */
    if(main_path == 0)
	{
	    return -1;
	}

	/* open the main output file */
    main_out = fopen(main_path, "w");
    if(main_out == 0)
	{
	    perror(main_path);
	    return -2;
	}

	/* make a vqm extension */
	log_file_path = (char*)ou_malloc(strlen(main_path) + 13, HETS);
	sprintf(log_file_path, "%s_log_file", main_path);
	/* open the output file */
    log_file = fopen(log_file_path, "w");
    if(log_file == 0)
	{
	    perror(log_file_path);
	    return -2;
	}
	out = log_file;

	/* set up path for stats file. NOTE hard coded currently */
	stat_file_path = (char*)ou_malloc(strlen("stats") + strlen(main_path) + 14, HETS);
	sprintf(stat_file_path, "%s_stats_file", main_path);
	/* open the stat file */
	stat_file = fopen(stat_file_path, "w");
    if(stat_file == 0)
	{
	    perror(stat_file_path);
	    return -2;
	}

	/* traverse the entire structure to get information */
	//gtoI_design_traversal(des);
	/* traverse the connection structure...more refined traversal and not interactive */
	if((strcmp(gdb_macro_to_catch_dll, "yes") != 0)&&(strcmp(log_file_path, "test") == 0)) // should fail, but forces to link
	{
		gtoIflsml_design_traversal(des, TRUE);
	}

	/* traverse to produce stats of number of devices */
	//gts_design_traversal (des, TRUE);

	/* INITIALIZE the IR of the EDIF */
	oEgu_initialize();

	/* analyze stats before partial mapping */
	ocs_init ();

	/* initialize the library cell indexes */
	ou_initialize_library_cell_indexes();

	/* initilize some lookup functions for macro identifiers */
	ou_initialize_macro_type_lookup();

	/* initialize the memory handling structures */
	omu_initialize();
	
	/* set a traverse counter for the process information */	
	top_level_process_info.unique_count = 0;

	/* create string caches needed for the module definitions */
	visited_modules_string_cache = sc_new_string_cache();
	visited_constants_string_cache = sc_new_string_cache();
	visited_portrefs_string_cache = sc_new_string_cache();
	visited_logic_string_cache = sc_new_string_cache();
	visited_constants_cache = sc_new_string_cache();
	IR_module_tname_lookup = sc_new_string_cache();

	/* initialize the flatten stuff early for the gnd and vcc_node */
	oFn_init();

	/* TRAVERSE 1 */
	/* start the traversal at the top module */
	ohlf_traverse_1_modules_based_on_scope(ivl_design_root(des), NULL);
	/* make sure all the behavioural code is caught*/
	ivl_design_process(des, ohlf_helper_traverse_1_modules_based_on_scope, 0);

	/* TRAVERSE 2 */
	ohlf_traverse_2_modules_based_on_scope(ivl_design_root(des), NULL);
	ivl_design_process(des, ohlf_helper_traverse_2_modules_based_on_scope, 0);

	/* TRAVERSE 3 */
	ohlf_traverse_3_modules_based_on_scope(ivl_design_root(des), NULL);
	ivl_design_process(des, ohlf_helper_traverse_3_modules_based_on_scope, 0);

	/* Free the unneeded hashes now that we have hooked everything up */
	oEgu_free_unused_cell_items();
	oEgu_uninitialize();

	/* free string cahces */
    sc_free_string_cache(visited_modules_string_cache);
    sc_free_string_cache(visited_constants_string_cache);
    sc_free_string_cache(visited_portrefs_string_cache);
    sc_free_string_cache(visited_logic_string_cache);
    sc_free_string_cache(visited_constants_cache);
    sc_free_string_cache(IR_module_tname_lookup);

	/* Get the BreadthFirstSearch stack order for the cells.  Used by:
	 * oEgu_breadth_first_traverse, oEgu_EDIF_generate, oFn_flatten, oFn_depth_first_traversal_start */
	BFS_stack = (cell_t**)ou_malloc_struct(sizeof(cell_t*)*(number_of_cell_allocates), HETS);
	num_BFS_stack = oEgu_breadth_order(top_cell->top_cell, &BFS_stack, number_of_cell_allocates, 1);

	/* traverse the generated hierarchichal net-list */
	D0(oEgu_breadth_first_traverse(top_cell->top_cell, 1, &number_of_cell_allocates););
	/* this will print out a sort of hierarchical list for looking at a hard copy of the 1st Data structure */
	D0(oEgu_EDIF_generate(top_cell->top_cell, EDIF_PASS, &number_of_cell_allocates, log_file, des, main_path););

	/* flatten the hierarchical design */
	quartus_lib_imp = ql_library_implementation;
	blif_implementation = blif_imp;
	oFn_flatten(top_cell->top_cell, number_of_cell_allocates);

	/* debug the generated details */
	D0(oFn_depth_first_traversal_start(top_cell->top_cell, log_file););

	oEgu_clean_hierarchical_structures();

	/* Free the breadth first search stack order */
	ou_free(BFS_stack);

	/* Free the cell structures */
	// oEgu_free_structure();
	//od_check_for_combinational_loops ();

	/* propogate and levelize the circuit */
	olap_levelizer();

	D0(ond_depth_first_traversal_start(log_file););

	/* Convert any state machines into one-oot_encoded */
	if (optimization_on_off[OPT_FSM_ONE_HOT] == TRUE)
	{
		ofsm_hot_encode();
	}

	D0(ond_depth_first_traversal_start(log_file););

	/* Do low order local optimizations before partial map
	 * 	Include:
	 * 		- MULT - high order zeros shrink mult size
	 * 		- MULT - identify constants going into a structure
	 * 		- ADD/SUB - low oreder zeros can shrink the adder
	 * 		- ADD/SUB - check if this is a counter (+1) setup with registers
	 * 		- CASE and IF collapsing
	 */
	ohu_optimize ();
	/* create computation trees for next optimizations */
	ohu_create_computation_trees();
	/* Do larger low local optimizations with a grouping of computation nodes
	 * 	Include:
	 * 		- ADD/SUB - joins of A + B + 1 and (0 - A) + C = A - C 
	 */
	oeo_optimize_expressions ();

	/* read in the tech library used for matching */
	if ((tech_lib_file_path == NULL) || (strcmp("", tech_lib_file_path) == 0))
	{
		/* IF - the library was not specified */
		assert (FALSE);
		tech_lib_file_path = (char*)ou_malloc(200, HETS);
		sprintf((char*)tech_lib_file_path, MONO_OR_LAP_PATH);
	}
	oxmlpdl_parse_tech_library((char*)tech_lib_file_path);

	/* Partial Mapping */
	opm_init();
	opm_partial_mapper();
	
	oFn_depth_first_traversal_from_PO_start_to_check_liveness(0);
	/* consider doing more local optimizations (don't think there are any here */	

	/* GENERATE desired mappings to output files */

	if (architecture_target == VPR_ARCH)
	{
		/* IF - vpr then use the BLIF output */
		oBo_generate_blif(QL_PASS,  &number_of_cell_allocates, main_out, des, main_path);
	}
	else if (architecture_target == STRATIX_ARCH)
	{
		/* ELSE IF - stratix then spit out a verilog stratix file */
		/* Generate a verilog quatus mapping */
		oQLgu_generate_vqm(QL_PASS, &number_of_cell_allocates, main_out, des, main_path);
	}
	/* Dump the stats that were collected */
	ocs_dump_stats (stat_file) ;

	/* Now free up the data structures including the tech library, mult_list, add_list etc. */

	D4(tabbed_spaces(BAT);); 

	/* close the files we were using */
	fclose(stat_file);
	fclose(log_file);
    fclose(main_out);

    return 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: o_list_architectures )
 *  simply pumps out architecture names to stderr.
 *-------------------------------------------------------------------------------------------*/
void o_list_architectures(FILE *to)
{
    long i;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(to, 0, "# o_list_architectures\n");); 

    fprintf(stderr, "Available architectures are:\n");
    for(i = 0; arch[i].key != NULL; i++)
	{
		fprintf(stderr, "\t-farch=%s\t%s\n", arch[i].key, arch[i].name);
	}
	D0(tabbed_printf(to, 0, "# END o_list_architectures\n");); 
	D4(tabbed_spaces(BAT);); 
}

/*---------------------------------------------------------------------------------------------
 * (function: o_output_standard_cells )
 * 	Goes through a provided library of cells and defines those cells in the edif output file.
 * 	The neat thing about this library is that is a library which is linked directly into the
 * 	code so no reading of the file is needed (not my idea...in original code).
 *-------------------------------------------------------------------------------------------*/
void o_output_standard_cells(void)
{
    long i;

	D4(tabbed_spaces(TAB);); 
	D0(tabbed_printf(log_file, 0, "# o_output_standard_cells\n"););

	/* the library file is actually in array static form so we can simply read each entry as is as print it out directly to the file */
    for(i = 0; current_library[i].description != NULL; i++)
	{
	    fprintf(log_file, current_library[i].description);
	}

	D0(tabbed_printf(log_file, 0, "# END o_output_standard_cells\n"););
	D4(tabbed_spaces(BAT);); 
}


