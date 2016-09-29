
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

/* This file contains the code that parses XML input files I use for creating dynamic debug points and optimizations that Odin may or may not run.
 * I really like how I can build xml files and parse them with ease, and that's why I use this stuff.  The XML files are really simple tree like
 * structures that the code parses in a depth first.
 */
#include <stdlib.h>
#include <string.h>
#include "libxml/parser.h"
#include "libxml/tree.h"

#include "debug.h"

#include "odin_types.h"
#include "odin_globals.h"
#include "odin_xml_parser_config_files.h"

int oxml_num_debug_nodes;
int *oxml_num_debug_nodes_level2;
int **oxml_debug_nodes;

int num_optimization_on_off;
short *optimization_on_off;

int current_num_debug_nodes;

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_get_child_text)
 * 	This function grabs XML text under the knowledge that there should be text.
 *-------------------------------------------------------------------------------------------*/
char* oxmlcf_get_child_text(xmlNode * a_node)
{
	xmlNode *cur_node = NULL;
	xmlChar *return_word = NULL;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		assert(return_word == NULL);
		assert((cur_node->type == XML_TEXT_NODE)&&(xmlIsBlankNode(cur_node) == FALSE));

		/* Get the word */
		return_word = xmlNodeGetContent(cur_node);
	}

	return (return_word);
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_get_specified_tag_text)
 * 	This function grabs XML text under the knowledge that there might be text.
 *-------------------------------------------------------------------------------------------*/
char* oxmlcf_get_specified_tag_text(xmlNode * a_node, char *specified_tag)
{
	xmlNode *cur_node = NULL;
	char *return_string = NULL;

	/* get the name of the device */	
	for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, specified_tag) == 0)
		{
			return_string = oxmlcf_get_child_text(cur_node->children);
			D2(printf("get_spec_tag_text: %s\n", return_string););
		}
	}
	assert(return_string != NULL);

	return return_string;
}


/*---------------------------------------------------------------------------------------------
 * (function:  oxmlcf_debug_init)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_debug_init()
{
	/* initialize global lists */
	oxml_num_debug_nodes = 0;
	oxml_num_debug_nodes_level2 = NULL;
	oxml_debug_nodes = NULL;

	current_num_debug_nodes = 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_debug_uninit)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_debug_uninit()
{
	int i;
	
	for (i = 0; i < oxml_num_debug_nodes; i++)
	{
		if (oxml_debug_nodes[i] != NULL)
			free(oxml_debug_nodes[i]);
		if (oxml_num_debug_nodes_level2 != NULL)
			free(oxml_num_debug_nodes_level2);
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: odlxmlp_parse_debug_config_file)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_parse_debug_config_file(char *file_path)
{
    xmlDoc *doc = NULL;
    xmlNode *root_element = NULL;

    /* this initialize the library and check potential ABI mismatches between the version it was compiled for and the actual shared library used. */
    LIBXML_TEST_VERSION

    /*parse the file and get the DOM */
    doc = xmlParseFile(file_path);

    if (doc == NULL) 
	{
       	D2(printf("error: could not parse config file\n"););
    }

    /*Get the root element node */
    root_element = xmlDocGetRootElement(doc);

	/* init the string caches */
	oxmlcf_debug_init();

	/* parse in the XML to data structs */
	oxmlcf_highest_level_parse_debug_file(root_element);

    /*free the document */
    xmlFreeDoc(doc);

    /* Free the global variables that may have been allocated by the parser.  */
    xmlCleanupParser();
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_highest_level_parse_debug_file)
 * 	Decides between the high-level categories so each can be built
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_highest_level_parse_debug_file(xmlNode * a_node)
{
    xmlNode *top_node = NULL;
    xmlNode *cur_node = NULL;
	int i;

    for (top_node = a_node; top_node; top_node = top_node->next) 
	{
		if (strcmp(top_node->name, "debug_info") == 0)
		{
			/* IF - Make sure this is the top node */

		    for (cur_node = top_node->children; cur_node; cur_node = cur_node->next) 
			{
		        if (cur_node->type == XML_ELEMENT_NODE) 
				{
					/* IF - these top level nodes should be lements */
					if (strcmp(cur_node->name, "node_set") == 0)
					{
						/* IF - this is a new node set */
						assert(current_num_debug_nodes < oxml_num_debug_nodes);
			        	oxmlcf_parse_node_set(cur_node->children);
						current_num_debug_nodes++;
					}
					else if (strcmp(cur_node->name, "num_node_sets") == 0)
					{
						oxml_num_debug_nodes = atoi(oxmlcf_get_child_text(cur_node->children));
						oxml_num_debug_nodes_level2 = (int *)malloc(sizeof(int)*oxml_num_debug_nodes);
						for (i = 0; i < oxml_num_debug_nodes; i++)
						{
							oxml_num_debug_nodes_level2[i] = 0;
						}
						oxml_debug_nodes = (int **)malloc(sizeof(int*)*oxml_num_debug_nodes);
					}
		        }
		    }
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_parse_node_set)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_parse_node_set(xmlNode * a_node)
{
    xmlNode *cur_node = NULL;
    xmlNode *cur_cur_node = NULL;
	int index = 0;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "num_nodes") == 0)
		{
			/* IF - the number of nodes is being specified */
			oxml_num_debug_nodes_level2[current_num_debug_nodes] = atoi(oxmlcf_get_child_text(cur_node->children));
			oxml_debug_nodes[current_num_debug_nodes] = (int*)malloc(sizeof(int)*oxml_num_debug_nodes_level2[current_num_debug_nodes]);
		}
		else if (strcmp(cur_node->name, "nodes") == 0)
		{
			/* ELSE - this is a listing of nodes */
    		for (cur_cur_node = cur_node->children; cur_cur_node; cur_cur_node = cur_cur_node->next) 
			{
				if (strcmp(cur_cur_node->name, "node_num") == 0)
				{
					assert(index <= oxml_num_debug_nodes_level2[current_num_debug_nodes] - 1);
					oxml_debug_nodes[current_num_debug_nodes][index] = atoi(oxmlcf_get_child_text(cur_cur_node->children));
					index ++;
				}
			}
		}
    }
}

/*---------------------------------------------------------------------------------------------
 * (function:  oxmlcf_optimization_init)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_optimization_init()
{
	/* initialize global lists */
	num_optimization_on_off = 0;
	optimization_on_off = NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_optimization_uninit)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_optimization_uninit()
{
	if (optimization_on_off != NULL)
	{
		free(optimization_on_off);
	}	
}

/*---------------------------------------------------------------------------------------------
 * (function: odlxmlp_parse_optimization_file)
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_parse_optimization_file(char *file_path)
{
    xmlDoc *doc = NULL;
    xmlNode *root_element = NULL;

    /* this initialize the library and check potential ABI mismatches between the version it was compiled for and the actual shared library used. */
    LIBXML_TEST_VERSION

    /*parse the file and get the DOM */
    doc = xmlParseFile(file_path);

    if (doc == NULL) 
	{
       	D2(printf("error: could not parse optimization file\n"););
    }

    /*Get the root element node */
    root_element = xmlDocGetRootElement(doc);

	/* init the string caches */
	oxmlcf_optimization_init();

	/* parse in the XML to data structs */
	oxmlcf_highest_level_parse_optimization_file(root_element);

    /*free the document */
    xmlFreeDoc(doc);

    /* Free the global variables that may have been allocated by the parser.  */
    xmlCleanupParser();
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlcf_highest_level_parse_optimization_file)
 * 	Decides between the high-level categories so each can be built
 *-------------------------------------------------------------------------------------------*/
void oxmlcf_highest_level_parse_optimization_file(xmlNode * a_node)
{
    xmlNode *top_node = NULL;
    xmlNode *cur_node = NULL;

    for (top_node = a_node; top_node; top_node = top_node->next) 
	{
		if (strcmp(top_node->name, "optimizations_on_off") == 0)
		{
			/* IF - Make sure this is the top node */

		    for (cur_node = top_node->children; cur_node; cur_node = cur_node->next) 
			{
				/* IF - these top level nodes should be text */
				if (strcmp(cur_node->name, "optimization") == 0)
				{
					/* IF - this is a optimization */

					/* allocate a new spot in the aray */
					optimization_on_off = (short*)realloc(optimization_on_off, sizeof(short)*(num_optimization_on_off + 1));

					if (strcmp(oxmlcf_get_child_text(cur_node->children), "yes") == 0)
					{
						/* IF - this optimization is on then record it */
						optimization_on_off[num_optimization_on_off] = TRUE;
					}
					else
					{
						/* ELSE - record that this optimization is off */
						optimization_on_off[num_optimization_on_off] = FALSE;
					}	
					
					/* record that there is another optimization read in */
					num_optimization_on_off ++;
		        }
		    }
		}
	}
}
