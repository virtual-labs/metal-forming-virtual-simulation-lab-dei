/*************************************************************
	Created 01/02/2002 (paj)

	This file contains some macro string functions
*************************************************************/
#include "string_functions.h"
#include "lib_includes.h"
/************************
DEFINES
************************/

/************************
PROTOTYPE
************************/

/*-------------------------------------------------------------------------
---------------------------------------------------------------------------
---------------------------------------------------------------------------
looks through the string for a specified character and returns the
integer spot where it is
---------------------------------------------------------------------------
---------------------------------------------------------------------------
-------------------------------------------------------------------------*/
int read_string_for_next_occurence(char *s_to_check, char c_to_find, int current_spot)
{
	int i;
	int string_length=strlen(s_to_check);

	/* check if the arguments are off */
	if (string_length < current_spot)
	{
		return -1;
	}	

	/* go through the characters searching for the one we're looking for */	
	for (i = current_spot; i < string_length; i++)
	{
		if(s_to_check[i] == c_to_find)
		{
			return (i);
		}
	}
	return (-1);
}	


/*-------------------------------------------------------------------------
---------------------------------------------------------------------------
---------------------------------------------------------------------------
eliminates spaces in a string.  Also, collapses the string if there
are spaces in between, but I'm assuming this is for front and tail spaces
---------------------------------------------------------------------------
---------------------------------------------------------------------------
-------------------------------------------------------------------------*/
char *eliminate_spaces(char *original_string, int size_of_string)
{
	int i;
	int new_size = size_of_string;
	char *new_string;
	int count = 0;

	/* determine the size of the new string */
	for (i = 0; i < size_of_string; i++)
	{
		/* for every space decrease the size of the string */
		if (original_string[i] == ' ')
		{
			new_size --;
		}
	}

	/* allocate the new string */
	new_string = (char*)paj_alloc(new_size+1);

	/* copy over the strings without spaces */
	for (i = 0; i < size_of_string; i++)
	{
		if(original_string[i] != ' ')
		{
			new_string[count] = original_string[i];
			count++;
		}
	}
	new_string[count] = '\0';

	return (new_string);
}
