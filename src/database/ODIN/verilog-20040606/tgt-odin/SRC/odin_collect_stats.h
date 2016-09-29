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

void ocs_init ();
void ocs_traverse_and_count ();
void ocs_record_multiplier(int size_a, int size_b, int size_output);
void ocs_dump_stats (FILE *out) ;
void ocs_record_multiplexer(int size_a);
void ocs_count_and_print_multiplexer_sizes(FILE *out);
void ocs_record_hard_binding(short match_type);
