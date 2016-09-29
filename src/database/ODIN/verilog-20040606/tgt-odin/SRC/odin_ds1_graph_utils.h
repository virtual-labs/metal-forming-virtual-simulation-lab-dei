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

#include "odin_types.h"

void oEgu_clean_hierarchical_structures();

void oEgu_initialize ();
void oEgu_uninitialize ();

void oEgu_free_unused_cell_items();

/* defined here so we can link back to it in edif.c */
void o_output_standard_cells(void);

/*------------------- cell_port_t ------------------------------------------------------------------------------------------------------------------------*/
cell_ports_t *oEgu_allocate_a_cell_port ();
void oEgu_free_a_cell_port (cell_ports_t *to_free);
cell_ports_t *oEgu_add_a_cell_port_defined_by_a_signal (ivl_signal_t signal, int pin_id, short port_direction);
cell_ports_t *oEgu_add_a_cell_port_defined_by_user(char* name, int pin_id, short port_direction);
cell_ports_t *oEgu_copy_a_cell_port_defined_by_a_signal(cell_ports_t *old_port);

/* COMPARE */
int oEgu_compare_ports(cell_ports_t *cell1, cell_ports_t *cell2);

/* UNIQUE STRING */
char *oEgu_generate_port_string(cell_ports_t *port);
char *oEgu_generate_port_signal_string(cell_ports_t *port);
	
/*------------------- internal_signal_t ------------------------------------------------------------------------------------------------------------------------*/
internal_signal_t *oEgu_allocate_an_internal_signal ();
void oEgu_free_an_internal_signal (internal_signal_t *to_free);
internal_signal_t *oEgu_add_an_internal_signal_of_a_defined_gate (long cell_index, int cell_port_id, cell_t *defined_gate_instance);
internal_signal_t *oEgu_add_an_internal_signal_of_a_user_created_cell(cell_ports_t *cell_port, cell_t *defined_gate_instance);

/* UNIQUE STRING */
char *oEgu_generate_internal_string(internal_signal_t *sig_ref);

/* COMPARE */
int oEgu_compare_internal_signals(internal_signal_t *sig1, internal_signal_t *sig2);

/*------------------- cell_net_pointers_t ------------------------------------------------------------------------------------------------------------------------*/
net_pointer_t *oEgu_allocate_a_cell_net_pointer ();
void oEgu_free_a_cell_net_pointer (net_pointer_t *to_free);
net_pointer_t *oEgu_allocate_a_temp_cell_net_pointer_for_a_port (cell_t *this_cell, cell_ports_t *port_reference);
net_pointer_t *oEgu_allocate_a_cell_net_pointer_for_a_port (cell_t *this_cell, cell_ports_t *port_reference);
net_pointer_t *oEgu_allocate_a_temp_cell_net_pointer_for_an_internal_signal(cell_t *this_cell, internal_signal_t *signal_reference);
net_pointer_t *oEgu_allocate_a_cell_net_pointer_for_an_internal_signal (cell_t *this_cell, internal_signal_t *signal_reference);

/* UNIQUE STRING */
char *oEgu_generate_a_net_pointer_string(net_pointer_t *net_pointer);

/* LOOKUP */
net_pointer_t *oEgu_lookup_net_pointer_driver_in_this_cells_nets(cell_t *this_cell, char *signal_name, int pin);

/* MASS CONVERSION */
net_pointer_t **oEgu_create_net_pointers_list_from_local_cell_ports_list(cell_t *parent_cell, cell_ports_t **cells_ports, int width);
net_pointer_t **oEgu_create_net_pointers_list_from_ports_of_internal_user_defined_cell(cell_t *parent_cell, cell_t *internal_cell, cell_ports_t **cells_ports, int width);

/*------------------- cell_nets_t ------------------------------------------------------------------------------------------------------------------------*/
cell_nets_t *oEgu_allocate_a_cell_net ();
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_net_pointer(cell_t *cell, net_pointer_t *net_pointer);
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_internal_signal(cell_t *cell, internal_signal_t *signal_reference);
cell_nets_t *oEgu_allocate_and_add_a_cell_net_if_needed_given_a_port(cell_t *cell, cell_ports_t *port_reference);
void oEgu_free_a_cell_net (cell_nets_t *to_free);
void oEgu_add_a_port_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, cell_ports_t *port_reference);
void oEgu_add_a_internal_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, internal_signal_t *signal_reference);
void oEgu_add_a_net_pointer_driver_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, net_pointer_t *net_point);
void oEgu_add_a_port_DRIVEN_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, cell_ports_t *port_reference);
void oEgu_add_a_internal_DRIVEN_to_a_cell_net(cell_t *parent_cell, cell_nets_t *this_cell_net, internal_signal_t *signal_reference);
void oEgu_add_a_net_pointer_DRIVEN_to_a_cell_net(cell_nets_t *this_cell_net, net_pointer_t *net_point);

char *oEgu_get_cell_char(cell_t *cell);

/* LOOKUP */
cell_nets_t *oEgu_lookup_net_based_on_driver_net_pointer(cell_t *this_cell, net_pointer_t *net_point);
cell_nets_t *oEgu_lookup_in_cell(net_pointer_t *lookup_version, cell_t *cell);

void oEgu_add_for_lookup(cell_nets_t *net_version, net_pointer_t *ivl_version_or_lookup_version, net_pointer_t* oets_actual_version);
cell_nets_t *oEgu_lookup(net_pointer_t *lookup_version);

/*------------------- cell_t ------------------------------------------------------------------------------------------------------------------------*/
cell_t *oEgu_allocate_a_cell(int *cell_count);
void oEgu_free_a_cell(cell_t *to_free);
generated_cell_t *oEgu_allocate_a_generated_cell(int *cell_count);
void oEgu_free_a_generated_cell(cell_t *to_free);
defined_cell_t *oEgu_allocate_a_defined_cell(int *cell_count);
void oEgu_free_a_defined_cell(cell_t *to_free);
instance_cell_t *oEgu_allocate_a_instance_cell(int *cell_count);
void oEgu_free_a_instance_cell(cell_t *to_free);
void oEgu_partial_free_a_cell(cell_t *to_free);
cell_t *oEgu_add_defined_cell(char *instance_name, int cell_index);
cell_t *oEgu_add_defined_cell_unformatted_name(int cell_index, const char* fmt, ...);
cell_t *oEgu_add_generated_cell(char *instance_name);
void oEgu_add_unformatted_name_to_a_cell(cell_t *to_cell, const char* fmt, ...);
void oEgu_add_instance_name_to_a_cell(cell_t *to_cell,  char *instance_name);
void oEgu_add_instance_pointer_to_a_cell(cell_t *to_cell,  cell_t *instance_cell);
void oEgu_add_instance_reused_cell(cell_t *to_cell);
void oEgu_add_unformatted_instance_name_to_a_cell(cell_t *to_cell,  const char* fmt, ...);
void oEgu_add_a_port_to_a_cell(cell_t *this_cell, cell_ports_t *the_port);
int oEgu_add_a_port_to_a_cell_if_not_already(cell_t *this_cell, cell_ports_t *the_port);
void oEgu_add_a_net_to_a_cell(cell_t *this_cell, cell_nets_t *the_net);
void oEgu_add_a_net_to_a_cell_if_not_already(cell_t *this_cell, cell_t *past_cell, cell_ports_t *the_port, cell_ports_t *the_past_port);
void oEgu_add_a_cell_to_a_cell(cell_t *this_cell, cell_t *the_other_cell);

/* HETERO */
void oEgu_add_memory_hetero_flag(cell_t *to_cell, ivl_memory_t memory, memory_t *memory_details);
void oEgu_add_macro_cell_info(cell_t *to_cell, short width_a, short width_b, short width_c, short width, short macro_type, int num_input_ports, int num_output_ports);
void oEgu_add_macro_cell_info_for_shift(cell_t *to_cell, short width_a, short width, short macro_type, int shift_size);

/* LOOKUP */
cell_ports_t *oEgu_lookup_port_as_signal_name(cell_t *this_cell, char* signal_name, int pin);
cell_ports_t *oEgu_lookup_port_as_user_name(cell_t *this_cell, char* name, int pin);
cell_ports_t *oEgu_lookup_port_as_a_port(cell_t *this_cell, cell_ports_t *port);

/* TRAVERSAL */
void oEgu_breadth_first_traverse(cell_t *cell, int number_to_mark_as_flag, int *cell_count);
int oEgu_breadth_order(cell_t *cell, cell_t ***BFS_stack, int all_cells, int mark_number);

void oEgu_generic_visit_cell(cell_t *cell);
void oEgu_generic_visit_port(cell_ports_t *port);
void oEgu_generic_visit_net(cell_nets_t *net);
void oEgu_generic_visit_net_pointer(net_pointer_t *net_pointer);
void oEgu_generic_visit_internal_signal(internal_signal_t *internal);

void oEgu_EDIF_generate(cell_t *cell, int number_to_mark_as_flag, int *cell_count, FILE *out, ivl_design_t des, const char *path);
void oEgu_EDIF_define_cell(cell_t *cell, FILE *output_file, int flag_mark);
void oEgu_EDIF_instance_cell(cell_t *cell, FILE *output_file);
void oEgu_EDIF_define_port(cell_ports_t *port, FILE *output_file);
void oEgu_EDIF_define_net(cell_nets_t *net, FILE *output_file);
void oEgu_EDIF_define_net_pointer(net_pointer_t *net_pointer, FILE *output_file, short drive_type);
void oEgu_EDIF_define_internal_signal(internal_signal_t *internal, FILE *output_file, short driver_type);


