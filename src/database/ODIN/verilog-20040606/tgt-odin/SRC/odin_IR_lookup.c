
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

/* This file contains simple functions to lookup a name in a string cache which is a hash. */
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include "string_cache.h"
#include "debug.h"

/*---------------------------------------------------------------------------------------------
 * (function: oIl_add_tname_to_scope_name_lookup_for_modules )
 *-------------------------------------------------------------------------------------------*/
void oIl_add_tname_to_scope_name_lookup_for_modules(STRING_CACHE *lookup_table, char *tname, char* scope_name)
{
	long idx;

	/* check if this string is in the table */
	idx = sc_add_string(lookup_table, scope_name);

    if(lookup_table->data[idx] == NULL) 
	{
		/* IF - this element is not in the table add it */
		lookup_table->data[idx] = tname;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oIl_find_tname_given_scope_name )
 *-------------------------------------------------------------------------------------------*/
char *oIl_find_tname_given_scope_name(STRING_CACHE *lookup_table, char* scope_name)
{
	long idx;

	/* check if this string is in the table */
	idx = sc_add_string(lookup_table, scope_name);

    assert(lookup_table->data[idx] != NULL);

	return ((char*)lookup_table->data[idx]);
}
