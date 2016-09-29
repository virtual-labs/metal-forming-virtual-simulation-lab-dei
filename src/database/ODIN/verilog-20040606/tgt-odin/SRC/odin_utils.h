
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

#ifndef __EDIF_UTLIS_H
#define __EDIF_UTLIS_H

#include "ivl_target.h"
#include "odin_types.h"

int ComparePointers(void *a, void *b); // FOR linked list

void ou_initialize_library_cell_indexes();

void ou_initialize_macro_type_lookup();
short ou_lookup_macro_type(char *lookup_name);
char *ou_lookup_macro_name(short number);

long find_library_cell(char *key);
long find_logic_cell(long logic_type);
long find_pad_cell(ivl_signal_t net);

unsigned long strhash(const char *str);
unsigned bitchar_to_idx(char bit);

void pass_info_update(inflowmation *pass_info);

char *ou_flatten_odin_name(char *name);
int ou_guess_which_signal_is_close_to(name_instance_pin_t *signal_list, int size_of_signal_list,  char *lower_case_comparison_string);
char *ou_name_without_tailing_pin_info(char *name);
void ou_concat_strings_with_memory_allocation(char *from, char **to);
int ou_find_bit_width_of_address_size(int address_size);

void ou_free(void *pointer);
void *ou_malloc(int bytes_to_alloc, int id);
void *ou_malloc_struct(int bytes_to_alloc, int id);
void *ou_realloc(void *old_pointer, int bytes_to_alloc, int id);
char *ou_strdup(char *old_string, int id);
void ou_display_alloc_details(FILE *out);
void ou_display_alloc_details_now();

char *ou_full_scope_name(ivl_scope_t net);
char *ou_full_logic_name(ivl_net_logic_t net);
char *ou_full_lpm_name(ivl_lpm_t net);

short ou_do_strings_match(char *s1, char *s2);

char *ou_generate_path_without_trailing_file_name(char *path);
#endif
