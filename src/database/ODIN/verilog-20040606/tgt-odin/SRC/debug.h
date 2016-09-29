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

#ifndef __DEBUG_H
#define __DEBUG_H
/********************************************************************
 *     Created 29/01/2002 paj
 *
 *         File holds debugging switches.
 *********************************************************************/
#include "config.h"

#define BP __asm__("int3");

//#define DBUG
/**************************
 * DEFINES
 ***************************/
/* This is a little trick that allows you to print debug comments out, but turn them off without deleting them.  
 * I'm pretty well dependant on GDB now, and don't use these techniques anymore */
#ifdef DBUG
#define D0(x) {fflush(out);x}
#define D1(x) {fflush(out);x}
#define D2(x) {fflush(out);x}
#define D3(x) {fflush(out);x}
#define D4(x) {fflush(out);x}
#define D5(x) {fflush(out);x}
#else
#define D0(x) {}
#define D1(x) {}
#define D2(x) {}
#define D3(x) {}
#define D4(x) {}
#define D5(x) {}
#endif

//#define NAME(x) {fflush(out);printf("NAMING %d %s -|", __LINE__, __FILE__);x;printf("|-\n");}
#define NAME(x) {}

/* Dedine assert as you like it.  I like it breaking into GDB so I can look at why the assert failed */
//#define assert(x) {if(!(x)) {fprintf(stderr, "ASSERT FAIL %d %s\n", __LINE__, __FILE__); while(!(x)){}}}
#define assert(x) {if(!(x)){__asm("int3");}}

/**************************
 * PROTOTYPES
 ***************************/
void tabbed_printf(FILE *target, int spaces, const char* fmt, ...);
void tabbed_spaces_set(int spaces);
void tabbed_spaces(int spaces);

#endif
