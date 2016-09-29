
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

/* This file contains a variety of utility functions used throughout Odin.  The most important ones are the rewiriting of allocation functions, which helps me
 * debug datastructures and memory usage.  Also, there are some string techniques and other little functions that are useful.
 *
 * With respect to the allocation functions, one of the things that I've built which has been valuable in my debugging runs is the GDB break point
 * based on a unique id for every structure I allocate.  I use this technique to trace the creation of pieces of the data structure so I can see
 * exactly when it gets created.  These break points can be dynamically defined using the dynamic debug xml file so that I can break on these data
 * structure creations without having to recompile.  Probably, the best debugging idea I've implemented, and would recommend for any software
 * built that has what I consider complex datastructures you can't wrap your head around (by the way I love learning techniques like these, so 
 * if you have any, pass them on).
 */
#include "ivl_target.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <ctype.h>

#include "string_cache.h"
#include "debug.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"

#include "string_cache.h"

#include "odin_ds1_graph_utils.h"

#define TO_UPPER(x) \
{int to_upper_i; \
for (to_upper_i = 0; to_upper_i < strlen(x); to_upper_i++) { \
	x[to_upper_i] = toupper(x[to_upper_i]);}}

long long int *bytes_allocated;
long long int *bytes_reallocated;
long long int *bytes_strdup;

/*---------------------------------------------------------------------------------------------
 * (function: ComparePointers )
 * 	This function is used with any linked lists as the comparison component of a generic
 * 	linked list.
 *-------------------------------------------------------------------------------------------*/
int ComparePointers(foint a, foint b)
{   
	if ((void*)a > (void*)b)
	{
		return 0;
	}
    return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_find_bit_width_of_address_size )
 * 	Given a an address size this function determines the number of addresses it can reference
 *-------------------------------------------------------------------------------------------*/
int not_cell_lib_index;
int and_cell_lib_index;
int or_cell_lib_index;
int nand_cell_lib_index;
int nor_cell_lib_index;
int xor_cell_lib_index;
int xnor_cell_lib_index;
int cmp_eq_cell_lib_index;
int cmp_gt_cell_lib_index;
int zero_cell_lib_index;
int one_cell_lib_index;

void ou_initialize_library_cell_indexes()
{
    zero_cell_lib_index = find_library_cell("ZERO");
    one_cell_lib_index = find_library_cell("ONE");
   	not_cell_lib_index = find_library_cell("NOT");
    and_cell_lib_index = find_library_cell("AND");
    or_cell_lib_index = find_library_cell("OR");
   	nand_cell_lib_index = find_library_cell("NAND");
    nor_cell_lib_index = find_library_cell("NOR");
    cmp_eq_cell_lib_index = find_library_cell("CMP_EQ");
	cmp_gt_cell_lib_index = find_library_cell("CMP_GT");
   	xnor_cell_lib_index = find_library_cell("XNOR");
   	xor_cell_lib_index = find_library_cell("XOR");
    if(
			(not_cell_lib_index < 0) ||
			(and_cell_lib_index < 0) ||
			(or_cell_lib_index < 0) ||
			(xor_cell_lib_index < 0) ||
			(cmp_eq_cell_lib_index < 0) ||
			(cmp_gt_cell_lib_index < 0) ||
			(one_cell_lib_index < 0) ||
			(zero_cell_lib_index < 0) ||
			(xnor_cell_lib_index < 0)
	  )
	{
		assert(0);
	}
}

/*******************************************************************
 * MACRO setup stuff so we can index either with integer for string
 * or through string we can use hash for integer
 *******************************************************************/
STRING_CACHE *macro_numbers_sc;
#define MACRO_STRING_SIZE 50
char *macro_string[MACRO_STRING_SIZE] = {
/*0*/
"MACRO_NONE",
/*1*/
"MN_MEMORY",
/*2*/
"MN_COUNTER",
/*3*/
"MN_ADD_CARRY_NODE",
/*4*/
"MN_UNARY_SUB",
/*5*/
"MN_EQ",
/*6*/
"MN_NEQ",
/*7*/
"MN_GE",
/*8*/
"MN_GT",
/*9*/
"MN_LOG_AND",
/*10*/
"MN_LOG_OR",
/*11*/
"MN_LOG_NOT",
/*12*/
"MN_NOT",
/*13*/
"MN_AND",
/*14*/
"MN_OR",
/*15*/
"MN_XOR",
/*16*/
"MN_NAND",
/*17*/
"MN_NOR",
/*18*/
"MN_XNOR",
/*19*/
"MN_RED_AND",
/*20*/
"MN_RED_OR",
/*21*/
"MN_RED_XOR",
/*22*/
"MN_RED_NAND",
/*23*/
"MN_RED_NOR",
/*24*/
"MN_RED_XNOR",
/*25*/
"MN_SHIFT_LEFT",
/*26*/
"MN_SHIFT_RIGHT",
/*27*/
"MN_MUX",
/*28*/
"MN_FF",
/*29*/
"MN_FFR",
/*30*/  
"MN_REGISTER",
/*31*/
"MN_REGISTER_RESET",
/*32*/
"MN_FOUR_MULT",
/*33*/
"MN_TWO_MULT",
/*34*/
"MN_ADD_MULT",
/*35*/
"MN_MAC",
/*36*/
"MN_MULT_ADD_PACK",
/*37*/
"MN_IF",
/*38*/
"MN_CASE",
/*39*/
"MN_STATE_CASE",
/*40*/
"MN_CONST_CASE",
/*41*/
"VCC",
/*42*/
"GND",
/*43*/
"MN_BUF",
/*44*/  
"MN_ADD_SUB",
/*45*/  
"MN_COMPUTATIONS_GT",
/*46*/  
"MN_MULT",
/*47*/  
"MN_ADD",
/*48*/
"MN_SUB",
/*49*/
"MN_END_POINT"};

/*---------------------------------------------------------------------------------------------
 * (function: ou_initialize_macro_type_lookup )
 * 	Allows a string of a macro type to lookup the associated macro node identifying number
 *-------------------------------------------------------------------------------------------*/
void ou_initialize_macro_type_lookup()
{
	int i;
	int sc_idx;

	/* initialize the has function */
	macro_numbers_sc = sc_new_string_cache();

	//printf("%d -1 == %d\n", MACRO_STRING_SIZE, MN_END_POINT);

	assert(MACRO_STRING_SIZE - 1 == MN_END_POINT);

	for (i = 0; i < MN_END_POINT; i++)
	{
		/* add the next macro string into the hash */
		sc_idx = sc_add_string(macro_numbers_sc, macro_string[i]);
	    if(macro_numbers_sc->data[sc_idx] == NULL)
		{
			/* IF - record the number associated with this string */
			macro_numbers_sc->data[sc_idx] = (void*)i;
		}
		else
		{
			/* ELSE - the string has data */
			assert(FALSE);
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_lookup_macro_type )
 * 	this function returns the value of a macro string 
 *-------------------------------------------------------------------------------------------*/
short ou_lookup_macro_type(char *lookup_name)
{
	int sc_idx;
	int return_id = -1;

	/* add the next macro string into the hash */
	sc_idx = sc_add_string(macro_numbers_sc, lookup_name);
    if(macro_numbers_sc->data[sc_idx] == NULL)
	{
		/* IF - record the number associated with this string */
		assert(FALSE);
	}
	else
	{
		/* ELSE - the string has data */
		return_id = (int)macro_numbers_sc->data[sc_idx];
	}

	return return_id;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_lookup_macro_name )
 *-------------------------------------------------------------------------------------------*/
char *ou_lookup_macro_name(short number)
{
	return macro_string[number];
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_find_bit_width_of_address_size )
 * 	Given a an address size this function determines the number of addresses it can reference
 *-------------------------------------------------------------------------------------------*/
int ou_find_bit_width_of_address_size(int address_size)
{
	int temp_value = address_size-1;
	int i = 0;

	assert(address_size > 0);
	
	do
	{
		temp_value = temp_value >> 1;
		i ++;
	}
	while(temp_value != 0);

	return i;
}

/*---------------------------------------------------------------------------------------------
 * (function: find_library_cell )
 * Responsible for finding the index pointer into the library array so we can reference the
 * library cell *
 *-------------------------------------------------------------------------------------------*/
long
find_library_cell(char *key)
{
    long i;

    for(i = 0; current_library[i].key != NULL; i++)
	{
	    if(!strcmp(current_library[i].key, key))
		return i;
	}
    fprintf(stderr, "Could not find library cell for key \"%s\"\n", key);
    return -1;
}

/*---------------------------------------------------------------------------------------------
 * (function: find_logic_cell )
 * (paj_EDIF_MODULE2) This function converts an iverilog identifier into the key id in the library 
 *-------------------------------------------------------------------------------------------*/
long
find_logic_cell(long logic_type)
{
    char *key;

    switch (logic_type)
	{
	case IVL_LO_AND:
	    key = "AND";
	    break;
	case IVL_LO_BUF:
	    key = "BUF";
	    break;
	case IVL_LO_BUFIF0:
	    key = "BUFIF0";
	    break;
	case IVL_LO_BUFIF1:
	    key = "BUFIF1";
	    break;
	case IVL_LO_BUFZ:
	    key = "BUFZ";
	    break;
	case IVL_LO_NAND:
	    key = "NAND";
	    break;
	case IVL_LO_NOR:
	    key = "NOR";
	    break;
	case IVL_LO_NOT:
	    key = "NOT";
	    break;
	case IVL_LO_OR:
	    key = "OR";
	    break;
	case IVL_LO_XOR:
	    key = "XOR";
	    break;
	case IVL_LO_XNOR:
	    key = "XNOR";
	    break;
	case IVL_LO_PULLDOWN:
	    key = "ZERO";
	    break;
	case IVL_LO_PULLUP:
	    key = "ONE";
	    break;
	default:
	    D1(tabbed_printf(out, 0, "#paj uNSUPPORTED GATE OF TYPE %ld ENCOUNTERED\n",
		    logic_type););
	    fprintf(stderr, "Unsupported gate of type %ld encountered\n",
		    logic_type);
	    return -1;
	}
    return find_library_cell(key);
}

/*---------------------------------------------------------------------------------------------
 * (function: find_pad_cell )
 * Based on the pad type of a net find and return the library cell key *
 *-------------------------------------------------------------------------------------------*/
long find_pad_cell(ivl_signal_t net)
{
    char *pad;
    long i_p = -1;

	pad = (char*)ivl_signal_attr(net, "PAD");

    if(pad != NULL)
	{
	    switch (pad[0])
		{
		case 'i':
		    i_p = find_library_cell("IBUF");
		    break;
		case 'o':
		    i_p = find_library_cell("OBUF");
		    break;
		case 'b':
		    i_p = find_library_cell("BIBUF");
		    break;
		case 'c':
		    i_p = find_library_cell("GCLKBUF");
		    break;
		case 'r':
		    i_p = find_library_cell("RSBUF");
		    break;
		default:
		    i_p = -1;
			D1(tabbed_printf(out, 0, "#paj PAD DOES NOT EXIST\n"););
		}
	}
    return i_p;
}

/*
 * This function takes a signal name and mangles it into an equivalent
 * name that is suitable to the edif format.
 */
#define DIVISOR ((1<<31)-1)	/* it's prime */
#define MULTIPLE (27823485)

/*---------------------------------------------------------------------------------------------
 * (function: strhash )
 *-------------------------------------------------------------------------------------------*/
unsigned long strhash(const char *str)
{
    long i;
    unsigned long res;

    res = str[0];
    for(i = 1; str[i]; i++)
		res = (res * MULTIPLE + str[i]) % DIVISOR;
    return res;
}

char *mangle_buf = NULL;
long mangle_buf_size = 0;
/*---------------------------------------------------------------------------------------------
 * (function: mangle_odin_name )
 * Beware ! I traded off convenience for simplicity (static buffer)
   mangle_odin_name() should not be called more then once as an argument 
   to a function and should not be called until you are done using 
   a buffer. If you really need to work with several mangled names simultaneously
   create several char * variables and strdup mangle return values into them.
 *-------------------------------------------------------------------------------------------*/
char *mangle_odin_name(const char *name)
{
    long i;
    int oxtra_mangle = 0;

    if((strlen(name) * 2 + 20) >= mangle_buf_size)
	{
	    if(mangle_buf != NULL)
			ou_free(mangle_buf);
	    mangle_buf_size = (2 * strlen(name) + 20);
	    mangle_buf = calloc(mangle_buf_size, 1);
	}
    for(i = 0; name[i]; i++)
	{
	    if((name[i] >= 'a') && (name[i] <= 'z'))
		{
		    mangle_buf[i] = name[i] + ('A' - 'a');
		    oxtra_mangle = 1;
		    continue;
		}
	    if((name[i] >= 'A') && (name[i] <= 'Z'))
		{
		    mangle_buf[i] = name[i];
		    continue;
		}
	    if((name[i] >= '0') && (name[i] <= '9'))
		{
		    mangle_buf[i] = name[i];
		    continue;
		}
	    mangle_buf[i] = '_';
	    if(name[i] != '_')
			oxtra_mangle = 1;
	}
    if(oxtra_mangle)
		sprintf(mangle_buf + i, "_%08lX", strhash(name));
    else
		mangle_buf[i] = 0;
    return mangle_buf;
}

#define STRINGS 300

/*---------------------------------------------------------------------------------------------
 * (function: ou_flatten_odin_name )
 *  Flatten by way of getting rid of . with _
 *-------------------------------------------------------------------------------------------*/
char *ou_flatten_odin_name(char *name)
{
	int i;
	char new_char = '_';
	static char *new_string[STRINGS];
	static int allocator = -1;
	static int allocated_once = FALSE;

	assert(name != NULL);

	if (allocator == STRINGS/2) 
	{
		/* IF - we are at the half way point then free all the ones above that I will use */
		if (allocated_once == TRUE)
		{
			/* IF - have to wait until we have at least allocated all these strings once */
			for (i = STRINGS/2; i < STRINGS; i++)
			{
				ou_free(new_string[i]);
			}
		}	

		allocator ++;
	}
	else if (allocator == STRINGS - 1)
	{
		/* ELSE IF - we are at the last point then free all the ones I will use */
		for (i = 0; i < STRINGS/2; i++)
		{
			ou_free(new_string[i]);
		}
		allocated_once = TRUE;
		allocator = 0;
	}
	else
	{
		allocator ++;
	}

//	D0(tabbed_printf(out, 0, "# string allocate %d: %s\n", allocator, name););

	new_string[allocator] = (char*)ou_malloc(sizeof(char*)*(strlen(name) + 1), HETS_UTILS);
	
	/* go through the string converting all '.', '<', '>' to specified char */
	for (i = 0; i < strlen(name); i++)
	{
		if ((name[i] == '.') || (name[i] == '<') || (name[i] == '>'))
		{
			new_string[allocator][i] = new_char;
		}
		else
		{
			new_string[allocator][i] = name[i];
		}
	}

	new_string[allocator][i] = '\0';
	return new_string[allocator];
}

/*---------------------------------------------------------------------------------------------
 * (function: bitchar_to_idx )
 *-------------------------------------------------------------------------------------------*/
unsigned bitchar_to_idx(char bit)
{
      switch (bit) {
	  case '0':
	    return 0;
	  case '1':
	    return 1;
	  case 'x':
	    return 2;
	  case 'z':
	    return 3;
	  default:
	    assert(0);
	    return 0;
      }
}

/*---------------------------------------------------------------------------------------------
 * (function: pass_info_update )
 *-------------------------------------------------------------------------------------------*/
void pass_info_update(inflowmation *pass_info)
{
	pass_info->unique_count = pass_info->unique_count + 1;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_guess_which_signal_is_close_to )
 *-------------------------------------------------------------------------------------------*/
int ou_guess_which_signal_is_close_to(name_instance_pin_t *signal_list, int size_of_signal_list,  char *lower_case_comparison_string)
{
	char *temp_search_string;
	char *upper_case_comparison_string;
	int char_count;
	int i, j;
	int max_index = -1; 
	int max_char_count = -1;
	int last_found;
	int temp_found;	

	assert(strlen(lower_case_comparison_string) > 0);
	
	/* copy the string over */
	temp_search_string = strdup(lower_case_comparison_string);
	/* capitalize the first letter */
	temp_search_string[0] = toupper(temp_search_string[0]);
	/* create an upper case string */
	upper_case_comparison_string = strdup(lower_case_comparison_string);
	TO_UPPER(upper_case_comparison_string);

	/* go through all the signals in the list */
	for (i = 0; i < size_of_signal_list; i++)
	{
		if(
				/* check if substring appears in a signal */
				(strstr(ivl_signal_name(signal_list[i].signal), lower_case_comparison_string) != NULL)
				/* check if inverted form appears in a signal */
				|| (strstr(ivl_signal_name(signal_list[i].signal), upper_case_comparison_string) != NULL)		
				/* check if first letter capitalized is in a signal */
				|| (strstr(ivl_signal_name(signal_list[i].signal), temp_search_string) != NULL)
			)
		{
			/* IF these substrings are found in the signal then this signal is found */
			return i;
		}

		/* reinitialize the search characters */
		char_count = 0;
		last_found = 0;

		D0(tabbed_printf(out, 0, "# sting guess (%s) on signal %d:%s\n", lower_case_comparison_string, i, ivl_signal_name(signal_list[i].signal)););

		for (j = 0; j < strlen(lower_case_comparison_string); j++)
		{
			/* find the location of the first character */
			temp_found = (int)strchr(ivl_signal_name(signal_list[i].signal), lower_case_comparison_string[j]);
			
			if ((temp_found == 0) || (last_found > temp_found))
			{
				/* IF - this character is not found check for the upper case version */
	
				temp_found = (int)strchr(ivl_signal_name(signal_list[i].signal), upper_case_comparison_string[j]);	
	
				if ((temp_found == 0) || (last_found >= temp_found))
				{
					/* IF - uppercase letter can't be found either then this letter is not found in the string */
					continue;
				}
			}
	
			/* when we get here, the character has been found */
			last_found = temp_found;
	
			/* increment that we have found another character */
			char_count++;
		}

		D0(tabbed_printf(out, 0, "# string guess (%s) has %d common chars\n", lower_case_comparison_string, char_count););

		/* check if this string is better than the last for the characters that appear in it matching the match string */
		if (char_count > max_char_count)
		{
			max_index = i;
			max_char_count = char_count;
		}
	}
		
	/* free the temporary strings */
	ou_free(upper_case_comparison_string);
	ou_free(temp_search_string);
	
	/* finally determine if the threshold of match is good */
	if (max_char_count >= 2)
	{
		return max_index;
	}
	else
	{
		return -1;
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_name_without_tailing_pin_info( )
 *-------------------------------------------------------------------------------------------*/
char *ou_name_without_tailing_pin_info(char *name)
{
	int i;
	static char *without_pin_string_name[STRINGS];
	static int without_allocator = -1;
	static int without_allocated_once = FALSE;
	char long_line[4096];

	assert(name != NULL);

	if (without_allocator == STRINGS/2) 
	{
		/* IF - we are at the half way point then free all the ones above that I will use */
		if (without_allocated_once == TRUE)
		{
			/* IF - have to wait until we have at least allocated all these strings once */
			for (i = STRINGS/2; i < STRINGS; i++)
			{
				ou_free(without_pin_string_name[i]);
			}
		}	

		without_allocator ++;
	}
	else if (without_allocator == STRINGS - 1)
	{
		/* ELSE IF - we are at the last point then free all the ones I will use */
		for (i = 0; i < STRINGS/2; i++)
		{
			ou_free(without_pin_string_name[i]);
		}
		without_allocator = 0;
	}
	else
	{
		without_allocator ++;
	}

	/* go through the string converting all '<', '>' to specified char */
	for (i = 0; i < strlen(name); i++)
	{
		if ((name[i] == '<') || (name[i] == '>'))
		{
			break;
		}
		long_line[i] = name[i];
	}

	long_line[i] = '\0';

	without_pin_string_name[without_allocator] = ou_strdup(long_line, HETS_UTILS);
	
	D0(tabbed_printf(out, 0, "# string new name %d: %s\n", without_allocator, without_pin_string_name[without_allocator]););
	return without_pin_string_name[without_allocator];
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_malloc )
 *-------------------------------------------------------------------------------------------*/
void *ou_malloc(int bytes_to_alloc, int id)
{
	void *allocated = NULL;
	static short first_run = TRUE;
	int i;
	if (first_run == TRUE)
	{
		bytes_allocated = (long long int *)malloc(sizeof(long long int) * (1+NUM_ALLOC_IDS));
		for (i = 0; i < NUM_ALLOC_IDS+1; i++)
		{
			bytes_allocated[i] = 0;
		}
		first_run = FALSE;
	}

	allocated = malloc(bytes_to_alloc);
	if(allocated == NULL) 
	{
		fprintf(stderr,"MEMORY FAILURE\n"); 
		assert (0);
	}

	assert((id <= NUM_ALLOC_IDS) && (id >= 0));
	bytes_allocated[id] = bytes_allocated[id] + bytes_to_alloc;	
	bytes_allocated[NUM_ALLOC_IDS] = bytes_allocated[NUM_ALLOC_IDS] + bytes_to_alloc;	

	return(allocated);
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_malloc )
 *-------------------------------------------------------------------------------------------*/
void *ou_malloc_struct(int bytes_to_alloc, int id)
{
	void *allocated = NULL;
	static short first_run = TRUE;
#ifdef ALLOCATION_COUNT_MACRO
	static long int m_id = 0;
#endif
	int i;
	if (first_run == TRUE)
	{
		bytes_allocated = (long long int *)malloc(sizeof(long long int) * (1+NUM_ALLOC_IDS));
		for (i = 0; i < NUM_ALLOC_IDS+1; i++)
		{
			bytes_allocated[i] = 0;
		}
		first_run = FALSE;
	}

	allocated = malloc(bytes_to_alloc);
	if(allocated == NULL) 
	{
		fprintf(stderr,"MEMORY FAILURE\n"); 
		assert (0);
	}

	assert((id <= NUM_ALLOC_IDS) && (id >= 0));
	bytes_allocated[id] = bytes_allocated[id] + bytes_to_alloc;	
	bytes_allocated[NUM_ALLOC_IDS] = bytes_allocated[NUM_ALLOC_IDS] + bytes_to_alloc;	

#ifdef ALLOCATION_COUNT_MACRO
	*((long int*)allocated) = m_id;	

	for (i = 0; i < oxml_num_debug_nodes_level2[0]; i++)
	{
		if (oxml_debug_nodes[0][i] == m_id)
		{
			__asm("int3");
		}
	}

	m_id++;
#endif

	return(allocated);
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_realloc )
 *-------------------------------------------------------------------------------------------*/
void *ou_realloc(void *old_pointer, int bytes_to_alloc, int id)
{
	void *allocated = NULL;
	static short first_run = TRUE;
	int i;
	if (first_run == TRUE)
	{
		bytes_reallocated = (long long int *)malloc(sizeof(long long int) * (1+NUM_ALLOC_IDS));
		for (i = 0; i < NUM_ALLOC_IDS+1; i++)
		{
			bytes_reallocated[i] = 0;
		}
		first_run = FALSE;
	}

	allocated = realloc(old_pointer, bytes_to_alloc);
	if(allocated == NULL) 
	{
		fprintf(stderr,"MEMORY FAILURE\n"); 
		assert (0);
	}

	assert((id <= NUM_ALLOC_IDS) && (id >= 0));
	bytes_reallocated[id] = bytes_reallocated[id] + bytes_to_alloc;	
	bytes_reallocated[NUM_ALLOC_IDS] = bytes_reallocated[NUM_ALLOC_IDS] + bytes_to_alloc;	

	return(allocated);
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_strdup)
 *-------------------------------------------------------------------------------------------*/
char *ou_strdup(char *old_string, int id)
{
	char *copied;
	int bytes_to_alloc = strlen(old_string) + 1;
	static short first_run = TRUE;
	int i;
	if (first_run == TRUE)
	{
		bytes_strdup = (long long int *)malloc(sizeof(long long int) * (1+NUM_ALLOC_IDS));
		for (i = 0; i < NUM_ALLOC_IDS+1; i++)
		{
			bytes_strdup[i] = 0;
		}
		first_run = FALSE;
	}

	copied = strdup(old_string);

	assert((id <= NUM_ALLOC_IDS) && (id >= 0));
	bytes_strdup[id] = bytes_strdup[id] + bytes_to_alloc;	
	bytes_strdup[NUM_ALLOC_IDS] = bytes_strdup[NUM_ALLOC_IDS] + bytes_to_alloc;	

	return (copied);
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_display_alloc_details )
 *-------------------------------------------------------------------------------------------*/
void ou_display_alloc_details(FILE *out)
{
	int i;

	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		fprintf(out, "Malloc %d : %lld bytes\n", i, bytes_allocated[i]);
	}
	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		fprintf(out, "Realloc %d : %.lld bytes\n", i, bytes_reallocated[i]);
	}
	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		fprintf(out, "Strdup %d : %lld bytes\n", i, bytes_strdup[i]);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_display_alloc_details )
 *-------------------------------------------------------------------------------------------*/
void ou_display_alloc_details_now()
{
	int i;

	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		printf("Malloc %d : %lld bytes\n", i, bytes_allocated[i]);
	}
	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		printf("Realloc %d : %lld bytes\n", i, bytes_reallocated[i]);
	}
	for (i = 0; i < 1+ NUM_ALLOC_IDS; i++)
	{
		printf("Strdup %d : %lld bytes\n", i, bytes_strdup[i]);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_free )
 *-------------------------------------------------------------------------------------------*/
void ou_free(void *pointer)
{
	assert(pointer != NULL);
	free(pointer);
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_full_scope_name )
 *-------------------------------------------------------------------------------------------*/
char* ou_full_scope_name(ivl_scope_t net)
{
	char *parent_string;
	char *return_string;
	char *local_string = (char*)ivl_scope_basename(net);
	ivl_scope_t parent = ivl_scope_parent(net);

	if (parent) 
	{
		parent_string = ou_full_scope_name(parent);
		return_string = (char*)ou_malloc(strlen(parent_string) + strlen(local_string) + 2, HETS_UTILS);
		sprintf(return_string, "%s.%s", parent_string, local_string);
	}
	else
	{
		return_string = (char*)ou_malloc(strlen(local_string) + 1, HETS_UTILS);
		sprintf(return_string, "%s", local_string);
	}

	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_full_logic_name )
 *-------------------------------------------------------------------------------------------*/
char *ou_full_logic_name(ivl_net_logic_t net)
{
	char *scope_name = ou_full_scope_name(ivl_logic_scope(net));
	char *local_string = (char*)ivl_logic_basename(net);
	char *return_string;
	
	return_string = (char*)ou_malloc(strlen(scope_name) + strlen(local_string) + 2, HETS_UTILS);
	sprintf(return_string, "%s.%s", scope_name, local_string);

	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_full_lpm_name )
 *-------------------------------------------------------------------------------------------*/
char *ou_full_lpm_name(ivl_lpm_t net)
{
	char *scope_name = ou_full_scope_name(ivl_lpm_scope(net));
	char *local_string = (char*)ivl_lpm_basename(net);
	char *return_string;
	
	return_string = (char*)ou_malloc(strlen(scope_name) + strlen(local_string) + 2, HETS_UTILS);
	sprintf(return_string, "%s.%s", scope_name, local_string);

	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: ou_do_strings_match )
 *-------------------------------------------------------------------------------------------*/
short ou_do_strings_match(char *s1, char *s2)
{
	int length_s1 = strlen(s1);
	int length_s2 = strlen(s2);
	int i;
	short return_val = TRUE;
	
	if (length_s1 == length_s2)
	{
		for (i = 0; i < length_s1; i++)
		{
			if (s1[i] != s2[i])
			{
				return_val = FALSE;
				break;
			}
		}
	}
	else
	{
		return_val = FALSE;
	}
	
	return return_val;
}

/*---------------------------------------------------------------------------------------------
 * (function: onu_generate_path_without_trailing_file_name)
 *-------------------------------------------------------------------------------------------*/
char *ou_generate_path_without_trailing_file_name(char *path)
{
	int i;
	char *return_string;

	for (i = strlen(path)-1; i >= 0; i--)
	{
		if (path[i] == '/')	
		{
			/* found fir / and therefore this is the start of the path */
			break;
		}
	}

	return_string = (char*)ou_malloc(i+2, HETS_UTILS);
	if (i != -1)
	{
		strncpy(return_string, path, i+1);  
	}
	return_string[i+1] = '\0';

	return return_string;
}
