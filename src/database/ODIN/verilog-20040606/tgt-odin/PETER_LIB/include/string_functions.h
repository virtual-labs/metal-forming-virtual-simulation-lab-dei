/*************************************************************
	Created 01/02/2002 (paj)

*************************************************************/
#ifndef STRING_FUNCTIONS_H
#define STRING_FUNCTIONS_H

#include <strings.h>

/************************
DEFINES
************************/

/************************
PROTOTYPE
************************/
char *eliminate_spaces(char *original_string, int size_of_string);
int read_string_for_next_occurence(char *s_to_check, char c_to_find, int current_spot);
	
#endif 
