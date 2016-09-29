
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

/* This file contains the functionality that parses the device file, which describes the technology for the given FPGA targeted by Odin.
 * Maunly, this functionality has been written to parse details for Stratix chips and the functionality in the DSP block.  I then 
 * use this information to do the partial mapping matching stage.  Again, I love the simplicity and ease of XML parsing and the 
 * libxml library has treated me well.
 */ 
#include <stdio.h>
#include <stdlib.h>
#include <string.h>
#include <stdarg.h>
#include <time.h>

#include "libxml/parser.h"
#include "libxml/tree.h"

#include "debug.h"
#include "string_cache.h"
#include "ivl_target.h"
#include "odin_types.h"
#include "odin_globals.h"
#include "odin_utils.h"
#include "odin_node_utils.h"
#include "odin_soft_mapping.h"
#include "odin_xml_parser_device_lib.h"

device_library_t current_device_arch;
tfe_t **available_targets;
int num_available_targets;
tfe_t **matching_targets;
int num_matching_targets;

STRING_CACHE *devices_sc;
STRING_CACHE *tfes_sc;
STRING_CACHE *primitives_sc;

/*---------------------------------------------------------------------------------------------
 * (function:  oxmlpdl_init)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_init()
{
	/* Create hashes */
	/* NOTE: these hashes are mainly here so we can initialize things before they are actually
	 * parsed in the XML.  In other words, we make pointers to skeletons that will be filled
	 * later */
	devices_sc = sc_new_string_cache();
	tfes_sc = sc_new_string_cache();
	primitives_sc = sc_new_string_cache();

	/* initialize global lists */
	available_targets = NULL;
	num_available_targets = 0;
	matching_targets = NULL;
	num_matching_targets = 0;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_uninit)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_uninit()
{
	sc_free_string_cache(devices_sc);
	sc_free_string_cache(tfes_sc);
	sc_free_string_cache(primitives_sc);
}

/*---------------------------------------------------------------------------------------------
 * (function: odlxmlp_parse_tech_library)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_parse_tech_library(char *lib_path)
{
    xmlDoc *doc = NULL;
    xmlNode *root_element = NULL;

    /* this initialize the library and check potential ABI mismatches between the version it was compiled for and the actual shared library used. */
    LIBXML_TEST_VERSION

    /*parse the file and get the DOM */
    doc = xmlParseFile(lib_path);

    if (doc == NULL) 
	{
       	D2(printf("error: could not parse file LIB file\n"););
    }

    /*Get the root element node */
    root_element = xmlDocGetRootElement(doc);

	/* DEBUG traversal */
   	D0( oxmlpdl_print_xml_file(root_element, 0););

	/* init the string caches */
	oxmlpdl_init();

	/* parse in the XML to data structs */
	oxmlpdl_highest_level_parse(root_element);

	/* given the data struct test and spit it out */
	oxmlpdl_data_struct_traverse();

	/* clean the caches */
	oxmlpdl_uninit();

    /*free the document */
    xmlFreeDoc(doc);

    /* Free the global variables that may have been allocated by the parser.  */
    xmlCleanupParser();
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_allocate_device_tfe_t)
 *-------------------------------------------------------------------------------------------*/
device_tfe_t *oxmlpdl_allocate_device_tfe_t(char *name, int number)
{
	device_tfe_t *return_device_tfe = (device_tfe_t*)ou_malloc_struct(sizeof(device_tfe_t), HETS_XML_PARSER_DEVICE_LIB);

	return_device_tfe->name = name;
	return_device_tfe->num_of_this_device = number;
	return_device_tfe->targets = NULL;
	return_device_tfe->num_of_targets_for_this_device = NULL;
	return_device_tfe->num_targets = 0;

	return (return_device_tfe);
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_allocate_tfe_t)
 *-------------------------------------------------------------------------------------------*/
tfe_t *oxmlpdl_allocate_tfe_t(char *name)
{
	tfe_t *return_tfe = (tfe_t*)ou_malloc_struct(sizeof(tfe_t), HETS_XML_PARSER_DEVICE_LIB);

	return_tfe->name = name;
	return_tfe->macro_type = MACRO_NONE;
	return_tfe->macro_id_seed_type = MACRO_NONE;
	return_tfe->tfe_type = -1;

	/* now add to the available targets list */
	available_targets = (tfe_t**)ou_realloc(available_targets, sizeof(tfe_t*)*(num_available_targets+1), HETS_XML_PARSER_DEVICE_LIB);
	available_targets[num_available_targets] = return_tfe;
	num_available_targets ++;

	return (return_tfe);
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_allocate_primitive_t)
 *-------------------------------------------------------------------------------------------*/
primitive_t *oxmlpdl_allocate_primitive_t()
{
	primitive_t *return_primitive = (primitive_t*)ou_malloc_struct(sizeof(primitive_t), HETS_XML_PARSER_DEVICE_LIB);
	
	return_primitive->num_input_ports = 0;
	return_primitive->input_port_names = NULL;
	return_primitive->input_port_width = NULL;
	return_primitive->num_output_ports = 0;
	return_primitive->output_port_names = NULL;
	return_primitive->output_port_width = NULL;
	return_primitive->timing_delay = -1;

	return return_primitive;
}


/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_add_to_match_list)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_add_to_match_list(tfe_t *new_addition)
{
	/* now add to the available targets list */
	matching_targets = (tfe_t**)ou_realloc(matching_targets, sizeof(tfe_t*)*(num_matching_targets+1), HETS_XML_PARSER_DEVICE_LIB);
	matching_targets[num_matching_targets] = new_addition;
	num_matching_targets ++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_get_specified_tag_text_if_exists)
 * 	This function grabs XML text under the knowledge that there should be text.
 *-------------------------------------------------------------------------------------------*/
char* oxmlpdl_get_specified_tag_text_if_exists(xmlNode * a_node, char *specified_tag)
{
	xmlNode *cur_node = NULL;
	char *return_string = NULL;

	/* get the name of the device */	
	for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, specified_tag) == 0)
		{
			return_string = oxmlpdl_get_child_text(cur_node->children);
			D2(printf("get_spec_tag_text since exists: %s\n", return_string););
		}
	}

	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_get_specified_tag_text)
 * 	This function grabs XML text under the knowledge that there should be text.
 *-------------------------------------------------------------------------------------------*/
char* oxmlpdl_get_specified_tag_text(xmlNode * a_node, char *specified_tag)
{
	xmlNode *cur_node = NULL;
	char *return_string = NULL;

	/* get the name of the device */	
	for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, specified_tag) == 0)
		{
			return_string = oxmlpdl_get_child_text(cur_node->children);
			D2(printf("get_spec_tag_text: %s\n", return_string););
		}
	}
	assert(return_string != NULL);

	return return_string;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_get_child_text)
 * 	This function grabs XML text under the knowledge that there should be text.
 *-------------------------------------------------------------------------------------------*/
char* oxmlpdl_get_child_text(xmlNode * a_node)
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
 * (function: oxmlpdl_generate_device_info)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_generate_device_info(xmlNode * a_node)
{
    xmlNode *cur_node = NULL;
	xmlNode *device_nodes = NULL;
	xmlChar *device_name = NULL;
	xmlChar *number_of_device_string = NULL;
	int sc_idx;
	device_tfe_t *current_device;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "device_family_name") == 0)
		{
			/* IF - device grab the device name */
			current_device_arch.device_family_name = oxmlpdl_get_child_text(cur_node->children);
    		D2(printf("device_family_name:%s\n", current_device_arch.device_family_name););
		}
		else if (strcmp(cur_node->name, "device_name") == 0)
		{
			/* ELSE - this is a device name which needs to be recorded */
			current_device_arch.device_name = oxmlpdl_get_child_text(cur_node->children);
    		D2(printf("device_name:%s\n", current_device_arch.device_name););
		}
		else if (strcmp(cur_node->name, "devices") == 0)
		{
			/* ELSE - load in all the devices */

			current_device_arch.num_devices = 0;
    		for (device_nodes = cur_node->children; device_nodes; device_nodes = device_nodes->next) 
			{
				if (strcmp(device_nodes->name, "device") == 0)
				{
					/* allocate a new device */
					current_device_arch.devices = (device_tfe_t**)ou_realloc(current_device_arch.devices, sizeof(device_tfe_t*)*(current_device_arch.num_devices+1), HETS_XML_PARSER_DEVICE_LIB);
	
					/* get the name of the device */	
					device_name = oxmlpdl_get_specified_tag_text(device_nodes->children, "device_name");
	
					/* get the number */
					number_of_device_string = oxmlpdl_get_specified_tag_text(device_nodes->children, "number");

					/* based on the device name, check if it is in the string cache of devices */
					sc_idx = sc_add_string(devices_sc, device_name);
				    if(devices_sc->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* create the device structure which should be created later in the parsing */
						current_device = oxmlpdl_allocate_device_tfe_t(device_name, atoi(number_of_device_string));
						devices_sc->data[sc_idx] = (void*)current_device;
					}
					else
					{
						/* ELSE - the string has data */
						/* device is already created so just record the pointer */
						current_device = (device_tfe_t*)devices_sc->data[sc_idx];
					}
					/* free the number string since it isn't needed anymore */
					ou_free(number_of_device_string);

					/* initilize the devices structure now that we have everything */
					current_device_arch.devices[current_device_arch.num_devices] = current_device;

					current_device_arch.num_devices++;
				}
			}
		}
    }
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_generate_match_library)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_generate_match_library(xmlNode * a_node)
{
	xmlNode *cur_node = NULL;
	xmlNode *device_nodes = NULL;
	xmlNode *configs = NULL;
	xmlChar *device_name = NULL;
	int sc_idx;
	device_tfe_t *current_device;
	xmlChar *tfe_name = NULL;
	xmlChar *number_tfe_string = NULL;
	tfe_t *current_tfe;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "device") == 0)
		{
			/* IF - for each device */
    		for (device_nodes = cur_node->children; device_nodes; device_nodes = device_nodes->next) 
			{
				if (strcmp(device_nodes->name, "name") == 0)
				{
					/* IF - this is the name of the device, check that this device was created and proceed */
					/* get the name of the device */	
					device_name = oxmlpdl_get_child_text(device_nodes->children);
   					D2(printf("device: %d device_name:%s\n", current_device_arch.num_devices, device_name););

					/* based on the device name, check if it is in the string cache of devices */
					sc_idx = sc_add_string(devices_sc, device_name);
				    if(devices_sc->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* should be created */
						assert(FALSE);
					}
					else
					{
						/* ELSE - the string has data */
						/* device is already created so just record the pointer */
						current_device = (device_tfe_t*)devices_sc->data[sc_idx];
						assert(current_device->name != NULL);
						assert(current_device->num_of_this_device != 0);
					}
				}
				else if (strcmp(device_nodes->name, "internal_configurations") == 0)
				{
					/* ELSE - this is the list of tfe that this device contains */

					/* go through each tfe and record the info and create the details */
    				for (configs = device_nodes->children; configs; configs = configs->next) 
					{
						if(strcmp(configs->name, "config") == 0)
						{
							/* IF - this is one of the config */

							/* allocate space for the new target */
							current_device->targets = (tfe_t**)ou_realloc(current_device->targets, sizeof(tfe_t*)*(current_device->num_targets+1), HETS_XML_PARSER_DEVICE_LIB);
							current_device->num_of_targets_for_this_device = (int*)ou_realloc(current_device->num_of_targets_for_this_device, sizeof(int)*(current_device->num_targets+1), HETS_XML_PARSER_DEVICE_LIB);

							/* get the name of the device */	
							tfe_name = oxmlpdl_get_specified_tag_text(configs->children, "target_name");
		
							/* get the number */
							number_tfe_string = oxmlpdl_get_specified_tag_text(configs->children, "number");
	
							/* based on the device name, check if it is in the string cache of devices */
							sc_idx = sc_add_string(tfes_sc, tfe_name);
						    if(tfes_sc->data[sc_idx] == NULL)
							{
								/* IF - the string is not in the hash */
									/* create the device structure which should be created later in the parsing */
								current_tfe = oxmlpdl_allocate_tfe_t(tfe_name);
								tfes_sc->data[sc_idx] = (void*)current_tfe;
							}
							else
							{
								/* ELSE - the string has data */
								/* device is already created so just record the pointer */
								current_tfe = (tfe_t*)tfes_sc->data[sc_idx];
							}
	
							/* record the current target */
							current_device->targets[current_device->num_targets] = current_tfe;
							current_device->num_of_targets_for_this_device[current_device->num_targets]= atoi(number_tfe_string);
	
							/* free the number string since it isn't needed anymore */
							ou_free(number_tfe_string);
	
							current_device->num_targets ++;
						}
					}
				}
			}
		}
	}
}


/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_create_primitive)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_create_primitive(tfe_t *current_tfe)
{
	primitive_t *primitive_val;

	/* allocate a primitive object */
	primitive_val = oxmlpdl_allocate_primitive_t();

	/* store the info about the primitive in the structure */
	current_tfe->tfe_type = PRIMITIVE;
	current_tfe->t_t.primitive.primitive = primitive_val;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_generate_primitive)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_generate_primitive(xmlNode * a_node, tfe_t *current_tfe, short macro_type)
{
	xmlNode *cur_node = NULL;
	xmlNode *port_node = NULL;
	primitive_t *primitive_val;
	int total_pins;
	int port_width;

	assert((current_tfe->tfe_type == PRIMITIVE) && (current_tfe->t_t.primitive.primitive != NULL));

	/* get primitive_val since we know it should exist */
	primitive_val = current_tfe->t_t.primitive.primitive;

	/* store the macro type */
	primitive_val->macro_type = macro_type;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "input_ports") == 0)
		{
			/* IF - is an input port list */

			total_pins = 0;

    		for (port_node = cur_node->children; port_node; port_node = port_node->next) 
			{
				if (strcmp(port_node->name, "port") == 0)
				{
					primitive_val->input_port_names = (char**)ou_realloc(primitive_val->input_port_names, sizeof(char*)*(primitive_val->num_input_ports+1), HETS_XML_PARSER_DEVICE_LIB);
					primitive_val->input_port_width = (int*)ou_realloc(primitive_val->input_port_width, sizeof(int)*(primitive_val->num_input_ports+1), HETS_XML_PARSER_DEVICE_LIB);
			
					port_width = atoi(oxmlpdl_get_specified_tag_text(port_node->children, "width"));
					primitive_val->input_port_names[primitive_val->num_input_ports] = oxmlpdl_get_specified_tag_text(port_node->children, "name");
					primitive_val->input_port_width[primitive_val->num_input_ports] = port_width;

					total_pins += port_width;

					primitive_val->num_input_ports++;
				}
			}
			primitive_val->total_input_pins = total_pins;
		}
		else if (strcmp(cur_node->name, "output_ports") == 0)
		{
			/* ELSE IF - is an output port list */

			total_pins = 0;

    		for (port_node = cur_node->children; port_node; port_node = port_node->next) 
			{
				if (strcmp(port_node->name, "port") == 0)
				{
					primitive_val->output_port_names = (char**)ou_realloc(primitive_val->output_port_names, sizeof(char*)*(primitive_val->num_output_ports+1), HETS_XML_PARSER_DEVICE_LIB);
					primitive_val->output_port_width = (int*)ou_realloc(primitive_val->output_port_width, sizeof(int)*(primitive_val->num_output_ports+1), HETS_XML_PARSER_DEVICE_LIB);
			
					port_width = atoi(oxmlpdl_get_specified_tag_text(port_node->children, "width"));
					primitive_val->output_port_names[primitive_val->num_output_ports] = oxmlpdl_get_specified_tag_text(port_node->children, "name");
					primitive_val->output_port_width[primitive_val->num_output_ports] = port_width;

					total_pins += port_width;

					primitive_val->num_output_ports++;
				}
			}
			primitive_val->total_output_pins = total_pins;
		}
		else if (strcmp(cur_node->name, "timing_delay") == 0)
		{
			/* ELSE IF - is timing delay */
			primitive_val->timing_delay = atoi(oxmlpdl_get_child_text(cur_node->children));
	    	D2(printf("timing_delay:%d\n", primitive_val->timing_delay););
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_init_tfe_node)
 * 	initialize this tfe to be graph type
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_init_tfe_node(tfe_t *current_tfe)
{
	current_tfe->tfe_type = GRAPH;
	current_tfe->t_t.graph.nodes = NULL;
	current_tfe->t_t.graph.num_nodes = 0;
	current_tfe->t_t.graph.seed_node = NULL;
	current_tfe->t_t.graph.flip_flops = NULL;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_add_node_to_tfe)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_add_node_to_tfe(node_t* node, tfe_t *current_tfe)
{
	current_tfe->t_t.graph.nodes = (node_t**)ou_realloc(current_tfe->t_t.graph.nodes, sizeof(node_t*)*(current_tfe->t_t.graph.num_nodes + 1), HETS_XML_PARSER_DEVICE_LIB);
	current_tfe->t_t.graph.nodes[current_tfe->t_t.graph.num_nodes] = node;
	current_tfe->t_t.graph.num_nodes++;
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_generate_graph)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_generate_graph(xmlNode * a_node, tfe_t *current_tfe)
{
	xmlNode *cur_node = NULL;
	xmlNode *bus_nodes = NULL;
	char *instance_name;
	char *ref_name;
	char *port_name;
	char *is_seed_node;
	STRING_CACHE *local_instance_hash;
	int sc_idx;
	tfe_t *related_tfe;
	primitive_t *current_primitive;
	node_t *created_node;
	int i;
	node_t **all_graphs_ffs = NULL;
	int num_all_graph_ffs = 0;

	/* initialize a local hash */
	local_instance_hash = sc_new_string_cache();

	/* upodate this tfe as a graph type node */
	oxmlpdl_init_tfe_node(current_tfe);

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "node_primitive") == 0)
		{
			/* IF - node defined = a node which is a single primitive */
			
			/* find/define the associated primitive which is instance_name and reference name where ref_name points to a primitive target */
			instance_name = oxmlpdl_get_specified_tag_text(cur_node->children, "instance_name");
			ref_name = oxmlpdl_get_specified_tag_text(cur_node->children, "ref_name");
			is_seed_node = oxmlpdl_get_specified_tag_text_if_exists(cur_node->children, "is_seed_node");

			/* find the ref_name in the primitive list */
			sc_idx = sc_add_string(primitives_sc, ref_name);
		    if(primitives_sc->data[sc_idx] == NULL)
			{
				/* IF - the string is not in the hash */
				assert(FALSE);
			}
			else
			{
				/* ELSE - grab the primitive */
				related_tfe = (tfe_t*)primitives_sc->data[sc_idx];
			}

			current_primitive = related_tfe->t_t.primitive.primitive;

			created_node = onu_allocate_macro_node_for_match (related_tfe->macro_type, 
															current_primitive->total_input_pins, 
															current_primitive->input_port_width, 
															current_primitive->num_input_ports, 
															current_primitive->total_output_pins,
															NULL,
															NULL,
															current_primitive->num_output_ports,
															instance_name);


			/* add the node to the tfe */
			oxmlpdl_add_node_to_tfe(created_node, current_tfe);

			if (is_seed_node != NULL)
			{
				/* IF - this is the seed node of the graph, then record this in the tfe struct */
				assert(strcmp(is_seed_node, "yes") == 0);	
				current_tfe->t_t.graph.seed_node = created_node;
			}

			/* add this instance to a hash */
			sc_idx = sc_add_string(local_instance_hash, instance_name);
		    if(local_instance_hash->data[sc_idx] == NULL)
			{
				/* IF - the string is not in the hash */
				/* it shouldn't be so add it */
				local_instance_hash->data[sc_idx] = (void*)created_node;
			}
			else
			{
				/* ELSE - trouble since we have multi instances in tech library for same target */
				assert(FALSE);
			}
		}
		else if (strcmp(cur_node->name, "node_array_primitive") == 0)
		{
			/* ELSE IF - node_array which is creates a macro block of a primitive */
			int *new_input_ports;
			int array_size;

			instance_name = oxmlpdl_get_specified_tag_text(cur_node->children, "instance_name");
			ref_name = oxmlpdl_get_specified_tag_text(cur_node->children, "ref_name");
			array_size = atoi(oxmlpdl_get_specified_tag_text(cur_node->children, "number"));
			is_seed_node = oxmlpdl_get_specified_tag_text_if_exists(cur_node->children, "is_seed_node");

			/* find the ref_name in the primitive list */
			sc_idx = sc_add_string(primitives_sc, ref_name);
		    if(primitives_sc->data[sc_idx] == NULL)
			{
				/* IF - the string is not in the hash */
				assert(FALSE);
			}
			else
			{
				/* ELSE - grab the primitive */
				related_tfe = (tfe_t*)primitives_sc->data[sc_idx];
			}

			current_primitive = related_tfe->t_t.primitive.primitive;

			/* update the input port width since this is a macro node */
			if (array_size > 1)
			{
				new_input_ports = (int*)ou_malloc(sizeof(int)*current_primitive->num_input_ports, HETS_XML_PARSER_DEVICE_LIB);

				/* for each entry in the prvious port list increase by the array size */
				for (i = 0; i < current_primitive->num_input_ports; i++)
				{
					new_input_ports[i] = current_primitive->input_port_width[i] * array_size;
				}	
			}

			/* create the node */
			created_node = onu_allocate_macro_node_for_match (related_tfe->macro_type, 
															current_primitive->total_input_pins * array_size, 
															new_input_ports,
															current_primitive->num_input_ports, 
															current_primitive->total_output_pins * array_size,
															NULL,
															NULL,
															current_primitive->num_output_ports,
															instance_name);

			/* add the node to the tfe */
			oxmlpdl_add_node_to_tfe(created_node, current_tfe);

			if (is_seed_node != NULL)
			{
				/* IF - this is the seed node of the graph, then record this in the tfe struct */
				assert(strcmp(is_seed_node, "yes") == 0);	
				current_tfe->t_t.graph.seed_node = created_node;
			}

			if (related_tfe->macro_type == MN_FF)
			{
				/* IF - this is a ff then record it in the ff list */
				all_graphs_ffs = (node_t**)ou_realloc(all_graphs_ffs, sizeof(node_t*)*(num_all_graph_ffs + 1), HETS_XML_PARSER_DEVICE_LIB);
				all_graphs_ffs[num_all_graph_ffs] = created_node;
				num_all_graph_ffs++;
			}

			/* add this instance to a hash */
			sc_idx = sc_add_string(local_instance_hash, instance_name);
		    if(local_instance_hash->data[sc_idx] == NULL)
			{
				/* IF - the string is not in the hash */
				/* it shouldn't be so add it */
				local_instance_hash->data[sc_idx] = (void*)created_node;
			}
			else
			{
				/* ELSE - trouble since we have multi instances in tech library for same target */
				assert(FALSE);
			}

			ou_free(new_input_ports);
		}
		else if (strcmp(cur_node->name, "bus_edge") == 0)
		{
			node_t *from = NULL;
			int width_from;
			node_t *to = NULL;
			int width_to;
			int index;

			/* ELSE IF - describes a joining between to nodes.  Port to Port for the entire width of the port */
    		for (bus_nodes = cur_node->children; bus_nodes; bus_nodes = bus_nodes->next) 
			{
				if (strcmp(bus_nodes->name, "from") == 0)
				{
					instance_name = oxmlpdl_get_specified_tag_text(bus_nodes->children, "instance_name");
					port_name = oxmlpdl_get_specified_tag_text(bus_nodes->children, "port_name");

					/* add this instance to a hash */
					sc_idx = sc_add_string(local_instance_hash, instance_name);
				    if(local_instance_hash->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* if node does not exist we have a problem */
						assert(FALSE);
					}
					else
					{
						/* ELSE - store this as the from */
						from = (node_t*)local_instance_hash->data[sc_idx];
					}

					/* get the output size of from */
					width_from = from->n_t.hetero_node.width; 
				}
				else if (strcmp(bus_nodes->name, "to") == 0)
				{
					instance_name = oxmlpdl_get_specified_tag_text(bus_nodes->children, "instance_name");
					port_name = oxmlpdl_get_specified_tag_text(bus_nodes->children, "port_name");

					/* add this instance to a hash */
					sc_idx = sc_add_string(local_instance_hash, instance_name);
				    if(local_instance_hash->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* if node does not exist we have a problem */
						assert(FALSE);
					}
					else
					{
						/* ELSE - store this as the from */
						to = (node_t*)local_instance_hash->data[sc_idx];
					}

					/* get the width of the input of to */
					width_to = to->n_t.hetero_node.width_a;

					assert(from != NULL);

					if (strcmp(port_name, "a") == 0)
					{
						/* IF - this is port a then join on the port a side */
						assert(width_from == width_to);
						/* join the nodes together */
						for (i = 0; i < width_to; i++)
						{
							osm_join_gate_nodes(from, i, to, i);
						}
					}
					else if (strcmp(port_name, "b") == 0)
					{
						/* ELSE IF - this is port b then join on the port b side by incrementing by width a */
						assert(width_from == width_to);
						/* join the nodes together */
						for (i = 0; i < width_to; i++)
						{
							index = i + width_to;

							osm_join_gate_nodes(from, i, to, index);
						}
					}
					else
					{
						assert(FALSE);
					}
				}
			}
		}
	}

	/* once the graph has been completely analysed, then post process any flip flops */
	if (num_all_graph_ffs > 0)
	{
		/* IF - there exist some ffs, then setup the tfe structure to hold the flip flop info */
		current_tfe->t_t.graph.flip_flops = (ffs_t*)ou_malloc_struct(sizeof(ffs_t), HETS_XML_PARSER_DEVICE_LIB);
		current_tfe->t_t.graph.flip_flops->num_input_mn_ffs = 0;
		current_tfe->t_t.graph.flip_flops->num_output_mn_ffs = 0;
		current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs = 0;
		current_tfe->t_t.graph.flip_flops->input_mn_ffs = NULL;
		current_tfe->t_t.graph.flip_flops->output_mn_ffs = NULL;
		current_tfe->t_t.graph.flip_flops->inout_mn_ffs = NULL;

		for (i = 0; i < num_all_graph_ffs; i++)
		{
			if (all_graphs_ffs[i]->input_pins[0]->input_node == NULL)
			{
				/* IF - this mn_ff has no input node, than it is an input ff */
				current_tfe->t_t.graph.flip_flops->input_mn_ffs = (node_t**)ou_realloc(current_tfe->t_t.graph.flip_flops->input_mn_ffs, 
																				sizeof(node_t**)*(current_tfe->t_t.graph.flip_flops->num_input_mn_ffs + 1), 
																				HETS_XML_PARSER_DEVICE_LIB);
				current_tfe->t_t.graph.flip_flops->input_mn_ffs[current_tfe->t_t.graph.flip_flops->num_input_mn_ffs] = all_graphs_ffs[i];
				current_tfe->t_t.graph.flip_flops->num_input_mn_ffs++;
			}		
			else if (all_graphs_ffs[i]->output_pins[0]->num_output_pins_level_2 == 0)
			{
				/* ELSE IF - an input exists, but no output then this is an output ff */
				current_tfe->t_t.graph.flip_flops->output_mn_ffs = (node_t**)ou_realloc(current_tfe->t_t.graph.flip_flops->output_mn_ffs,
																				sizeof(node_t**)*(current_tfe->t_t.graph.flip_flops->num_output_mn_ffs + 1), 
																				HETS_XML_PARSER_DEVICE_LIB);
				current_tfe->t_t.graph.flip_flops->output_mn_ffs[current_tfe->t_t.graph.flip_flops->num_output_mn_ffs] = all_graphs_ffs[i];
				current_tfe->t_t.graph.flip_flops->num_output_mn_ffs++;
			}
			else
			{
				/* ELSE - both input and output exist, so this is an inout */
				current_tfe->t_t.graph.flip_flops->inout_mn_ffs = (node_t**)ou_realloc(current_tfe->t_t.graph.flip_flops->inout_mn_ffs,
																				sizeof(node_t**)*(current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs + 1), 
																				HETS_XML_PARSER_DEVICE_LIB);
				current_tfe->t_t.graph.flip_flops->inout_mn_ffs[current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs] = all_graphs_ffs[i];
				current_tfe->t_t.graph.flip_flops->num_inout_mn_ffs++;
			}
		}
	}

	/* free the recording structure */
	if (all_graphs_ffs != NULL)
	{
		ou_free(all_graphs_ffs);
	}

	sc_free_string_cache(local_instance_hash);
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_generate_targets)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_generate_targets(xmlNode * a_node)
{
	xmlNode *cur_node = NULL;
	xmlNode *target_node = NULL;
	xmlChar *tfe_name = NULL;
	xmlChar *macro_name = NULL;
	xmlChar *matchable = NULL;
	tfe_t *current_tfe = NULL;
	int sc_idx;
	short macro_number = -1;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
		if (strcmp(cur_node->name, "target") == 0)
		{
			/* IF - this a target */

    		for (target_node = cur_node->children; target_node; target_node = target_node->next) 
			{
				if (strcmp(target_node->name, "name") == 0)
				{
					/* IF - this is the name then grab the text and find it in the hash */
					/* get the name of the device */	
					tfe_name = oxmlpdl_get_child_text(target_node->children);
	    			D2(printf("tfe_name:%s\n", tfe_name););

					/* based on the device name, check if it is in the string cache of devices */
					sc_idx = sc_add_string(tfes_sc, tfe_name);
				    if(tfes_sc->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* create the device */
						current_tfe = oxmlpdl_allocate_tfe_t(tfe_name);
						tfes_sc->data[sc_idx] = (void*)current_tfe;
					}
					else
					{
						/* ELSE - the string has data */
						/* device is already created so just record the pointer */
						current_tfe = (tfe_t*)tfes_sc->data[sc_idx];
					}
				}
				else if (strcmp(target_node->name, "associated_macro_name") == 0)
				{
					/* ELSE IF - this is the associated macro name */
					macro_name = oxmlpdl_get_child_text(target_node->children);
	    			D2(printf("macro_name:%s\n", macro_name););

					macro_number = ou_lookup_macro_type(macro_name);
	    			D2(printf("macro_number:%d\n", macro_number););

					/* store the macro number */
					current_tfe->macro_type = macro_number;
				}
				else if (strcmp(target_node->name, "seed_macro_type") == 0)
				{
					/* ELSE IF - this is the associated macro name */
					macro_name = oxmlpdl_get_child_text(target_node->children);
	    			D2(printf("seed_macro_name:%s\n", macro_name););

					macro_number = ou_lookup_macro_type(macro_name);
	    			D2(printf("seed_macro_number:%d\n", macro_number););

					/* store the macro number */
					current_tfe->macro_id_seed_type = macro_number;
				}
				else if (strcmp(target_node->name, "matchable") == 0)
				{
					/* ELSE IF - check the matchability of a tfe */

					matchable = oxmlpdl_get_child_text(target_node->children);
   					D2(printf("matchable:%s\n", matchable););

					if (strcmp(matchable, "TRUE") == 0)
					{
						/* IF - this node is matchable, add it to the matchable list */
						oxmlpdl_add_to_match_list(current_tfe);
					}
				}
				else if (strcmp(target_node->name, "primitive") == 0)
				{
					/* ELSE IF - this is part of the primitive library */
					assert(tfe_name != NULL);

					/* based on the tfe name, check if it is in the string cache of devices. */
					sc_idx = sc_add_string(primitives_sc, tfe_name);
				    if(primitives_sc->data[sc_idx] == NULL)
					{
						/* IF - the string is not in the hash */
						/* need to create/allocate the primitive */
						oxmlpdl_create_primitive(current_tfe);
						primitives_sc->data[sc_idx] = (void*)current_tfe;
					}

					/* initialize the primitive */
					oxmlpdl_generate_primitive(target_node->children, current_tfe, macro_number);
				}
				else if (strcmp(target_node->name, "graph") == 0)
				{
					/* ELSE IF - this is the graph part of the tfe.  Parse the graph */
					oxmlpdl_generate_graph(target_node->children, current_tfe);
				}
			}
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: odlxmlp_highest_level_parse)
 * 	Decides between the high-level categories so each can be built
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_highest_level_parse(xmlNode * a_node)
{
    xmlNode *top_node = NULL;
    xmlNode *cur_node = NULL;

    for (top_node = a_node; top_node; top_node = top_node->next) 
	{
		if (strcmp(top_node->name, "fpga_architecture") == 0)
		{
			/* IF - Make sure this is the top node */

		    for (cur_node = top_node->children; cur_node; cur_node = cur_node->next) 
			{
		        if (cur_node->type == XML_ELEMENT_NODE) 
				{
					/* IF - these top level nodes should be lements */
					if (strcmp(cur_node->name, "device_info") == 0)
					{
						/* IF - device info like family name, available devices etc. */
			        	oxmlpdl_generate_device_info(cur_node->children);
					}
					else if (strcmp(cur_node->name, "match_library") == 0)
					{
						/* ELSE IF - this is the match library which specifies a multi-mode tfe */
			        	oxmlpdl_generate_match_library(cur_node->children);
					}
					else if (strcmp(cur_node->name, "target_functional_elements") == 0)
					{
						/* ELSE IF - this is the tfes */
			        	oxmlpdl_generate_targets(cur_node->children);
					}
					else if (strcmp(cur_node->name, "primitives") == 0)
					{
						/* ELSE IF - this is the tfes */
			        	oxmlpdl_generate_targets(cur_node->children);
					}
		        }
		    }
		}
	}
}

/*---------------------------------------------------------------------------------------------
 * (function: odlxmlp_print_file)
 * 	Print the tags and there level
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_print_xml_file(xmlNode * a_node, int level)
{
    xmlNode *cur_node = NULL;
	xmlChar *word;

	level ++;

    for (cur_node = a_node; cur_node; cur_node = cur_node->next) 
	{
        if (cur_node->type == XML_ELEMENT_NODE) 
		{
           	D2(printf("node type: Element, name: %s at level %d\n", cur_node->name, level););
	        oxmlpdl_print_xml_file(cur_node->children, level);
        }
		else if (cur_node->type == XML_TEXT_NODE)
		{
			if (xmlIsBlankNode(cur_node) == FALSE)
			{
				word = xmlNodeGetContent(cur_node);
    	       	D2(printf("\tnode type: Element, name: %s text content:%s\n", cur_node->name, word););
				ou_free(word);
			}
		}
    }
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_data_struct_traverse)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_data_struct_traverse()
{
	oxmlpdl_DS_traverse_device_arch(current_device_arch);

	oxmlpdl_DS_traverse_matching_targets();
}


/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_device_arch)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_device_arch(device_library_t current_device_arch)
{
	int i;

	tabbed_spaces(TAB); 
	D2(fprintf(out, "DEVICE LIBRARY ARCHITECTURE\nDevice name:%s\nDevice family name:%s\n", current_device_arch.device_name, current_device_arch.device_family_name););

	/* now look at the devices available to the device library */
	for (i = 0; i < current_device_arch.num_devices; i++)
	{
		oxmlpdl_DS_traverse_device(current_device_arch.devices[i]);	
	}

	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_device)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_device(device_tfe_t *current_device_tfe)
{
	int i;

	tabbed_spaces(TAB); 

	D2(fprintf(out, "device %s appears %d times\n", current_device_tfe->name, current_device_tfe->num_of_this_device););

	/* show the targets and there instances */
	for (i = 0; i < current_device_tfe->num_targets; i++)
	{
		D2(fprintf(out, "\ttarget %s has %d instances in this device\n", current_device_tfe->targets[i]->name, current_device_tfe->num_of_targets_for_this_device[i]););
	}
	
	tabbed_spaces(BAT); 
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_matching_targets)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_matching_targets()
{
	int i;

	tabbed_spaces(TAB); 

	D2(fprintf(out, "MATCHABLE TARGETS\n"););

	for (i = 0; i < num_matching_targets; i++)
	{
		oxmlpdl_DS_traverse_tfe(matching_targets[i]);
	}

	tabbed_spaces(BAT); 
}


/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_tfe)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_tfe(tfe_t* current_tfe)
{
	tabbed_spaces(TAB); 

	D2(fprintf(out, "tfe %s is a %s with seed type %s", current_tfe->name, macro_string[current_tfe->macro_type], macro_string[current_tfe->macro_id_seed_type]););

	if (current_tfe->tfe_type == PRIMITIVE)
	{
		oxmlpdl_DS_traverse_tfe_primitive(current_tfe);
	}
	else if (current_tfe->tfe_type == GRAPH)
	{
		oxmlpdl_DS_traverse_tfe_graph(current_tfe);
	}
	else
	{
		assert(FALSE);
	}

	tabbed_spaces(BAT); 

}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_tfe_primitive)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_tfe_primitive(tfe_t* current_tfe)
{

	D2(
	primitive_t *current_prim = current_tfe->t_t.primitive.primitive;
	fprintf(out, "tfe primitive is a %s with %d inputs, %d outputs, and %d time delay\n", macro_string[current_prim->macro_type], 
																						current_prim->num_input_ports,
																						current_prim->num_output_ports,
																						current_prim->timing_delay););
}

/*---------------------------------------------------------------------------------------------
 * (function: oxmlpdl_DS_traverse_tfe_graph)
 *-------------------------------------------------------------------------------------------*/
void oxmlpdl_DS_traverse_tfe_graph(tfe_t* current_tfe)
{
	int i, j;
	node_t *current_node;

	tabbed_spaces(TAB); 

	D2(fprintf(out, "tfe graph consists of %d nodes\n", current_tfe->t_t.graph.num_nodes););

	for (i = 0; i < current_tfe->t_t.graph.num_nodes; i++)
	{
		current_node = current_tfe->t_t.graph.nodes[i];
		D2(fprintf(out, "node %s\n", current_node->unique_name););

		tabbed_spaces(TAB); 

		if (current_node->input_pins[0]->input_node != NULL)
		{
			/* IF - the a port is hooked up to something */
			D2(fprintf(out, "input port A goes to %s\n", current_node->input_pins[0]->input_node->unique_name); );
		}

		if (current_node->n_t.hetero_node.width_b != 0)
		{
			/* IF -  this node has an A and a B port */
			if ((current_node->num_input_pins > current_node->n_t.hetero_node.width_a) && 
					(current_node->input_pins[current_node->n_t.hetero_node.width_a]->input_node != NULL))
			{
				/* IF - the b port is hooked up to something */
				D2(fprintf(out, "input port B goes to %s\n", current_node->input_pins[current_node->n_t.hetero_node.width_a]->input_node->unique_name); );
			}
		}

		for (j = 0; j < current_node->output_pins[0]->num_output_pins_level_2; j++)
		{
			if (current_node->output_pins[0]->output_nodes[j] != NULL)
			{
				D2(fprintf(out, "output fan out %d goes to %s\n", j,  current_node->output_pins[0]->output_nodes[j]->unique_name); );
			}
		}

		tabbed_spaces(BAT); 
	}

	tabbed_spaces(BAT); 
}

