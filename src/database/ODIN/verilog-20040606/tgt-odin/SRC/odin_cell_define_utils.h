#include "string_cache.h"
#include "odin_types.h"

/********************************************************************************************
 * PROTOTYPES
 *******************************************************************************************/

char *ocdu_generate_unique_name(char *name, int concat_name_number);

void ocdu_append_embedded_input_signals(void *v_this_cell,
								void *v_rigot_cell);
void ocdu_append_embedded_output_signals(void *v_this_cell,
								void *v_rigot_cell);
void ocdu_append_embedded_inout_signals(void *v_this_cell,
								void *v_rigot_cell);
cell_ports_t **ocdu_remove_port_from_list(cell_ports_t **list, int size_port_list, cell_ports_t *port);

void ocdu_add_output_to_cell(void *v_this_cell,  
							cell_ports_t *cell_port);
void ocdu_add_input_to_cell(void *v_this_cell,  
							cell_ports_t *cell_port);

cell_information_basic *ocdu_allocate_cell_information_basic(void);
void ocdu_free_cell_information_basic(cell_information_basic *this_cell);

void ocdu_join_signal_lists_and_create_nets(cell_t *this_cell,
											cell_t *past_cell,	
											cell_ports_t **port_list,
											int num_port_list);

/************************* MODULE FUNCTIONS ****************************************************/
cell_information_module *ocdu_macro_define_module(char *unique_name);
cell_information_module *ocdu_allocate_cell_information_module(void);
void ocdu_free_cell_information_module(cell_information_module *this_cell);
void ocdu_instantiate_cell_and_make_nets_module(cell_information_module *v_this_cell,
													void *v_instantiating_cell,
													int id);
void ocmdu_add_statement_module(cell_information_module *this_cell, cell_information_stmt *statement);
void ocmdu_complete_statement_nets_module(cell_information_module *v_this_cell);
void ou_search_and_add_driven_to_net(cell_information_module *this_cell,
						net_pointer_t *to_add_net_pointer,
						ivl_nexus_t nexus,
						int spot);

#define DIRECT_CONNECTION 1
#define FF_CONNECTION 2
/************************* STMT FUNCTIONS ****************************************************/
cell_information_stmt *ocdu_macro_define_stmt( char *unique_name);			/*char *unique_name*/
cell_information_stmt *ocdu_allocate_cell_information_stmt(void);
void ocdu_free_cell_information_stmt(cell_information_stmt *this_cell);

internal_signal_t *ocdu_create_a_logic_tree_to_single_out_with_one_primary_input(void* temp_cell,
										int width, 
										char *network_name,
										net_pointer_t **primary_port,
										char *logic_name);

void ocdu_instantiate_cell_and_make_connections_stmt(cell_information_stmt *this_cell,
													void *v_instantiating_cell,
													int id,
													int connection_type);
