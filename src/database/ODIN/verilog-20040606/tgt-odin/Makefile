# Generated automatically from Makefile.in by configure.
#
#    This source code is free software; you can redistribute it
#    and/or modify it in source code form under the terms of the GNU
#    Library General Public License as published by the Free Software
#    Foundation; either version 2 of the License, or (at your option)
#    any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU Library General Public License for more details.
#
#    You should have received a copy of the GNU Library General Public
#    License along with this program; if not, write to the Free
#    Software Foundation, Inc.,
#    59 Temple Place - Suite 330
#    Boston, MA 02111-1307, USA
#
#
#
SHELL = /bin/sh

VERSION = 0.0

prefix = /root/Temp/ODIN/verilog-20040606/tgt-odin/PETER_BIN   
#prefix = /home/Peter/PROGRAMS/verilog-20040606/tgt-odin/PETER_BIN
exec_prefix = ${prefix}
srcdir = SRC

bindir = ${exec_prefix}/bin
libdir = ${exec_prefix}/lib
includedir = $(prefix)/include

INCLUDE_DIR = -I /root/Temp/ODIN/verilog-20040606/tgt-odin/PETER_LIB/include -I /root/Temp/libxml2-2.6.0/include
#INCLUDE_DIR = -I/home/Peter/PROGRAMS/verilog-20040606/tgt-odin/PETER_LIB/include -I/home/Peter/PROGRAMS/libxml2-2.6.12/BIN/include/libxml2

CC = gcc
CXX = c++
INSTALL = /usr/bin/install -c
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644

#CPPFLAGS = -finstrument-functions -O3 -DHAVE_CONFIG_H 
#CPPFLAGS = -finstrument-functions -g -DHAVE_CONFIG_H
CPPFLAGS = -g -DHAVE_CONFIG_H
#CXXFLAGS = -g -O2
LDFLAGS = ../PETER_LIB/include

all: odin.tgt

%.o: %.c 
#	@[ -d dep ] || mkdir dep
	$(CC) -Wall -I$(srcdir)/../.. $(CPPFLAGS) -c $< -o $*.o $(INCLUDE_DIR)
#	$(CC) -Wall -I$(srcdir)/../.. $(CPPFLAGS)  -MD -c $< -o $*.o
#	mv $*.d dep

#LIBS = -LPETER_LIB/ -lpeters -lz -lpthread -lm
LIBS = -LPETER_LIB/ -lpeters -L/root/Temp/libxml2-2.6.0 -lz -lpthread -lm
#LIBS = -LPETER_LIB/ -lpeters -L/home/Peter/PROGRAMS/libxml2-2.6.12/BIN/lib -lxml2 -lz -lpthread -lm

OBJS = \
	$(srcdir)/odin.o \
	$(srcdir)/odin_lpm.o \
	$(srcdir)/odin_logic.o \
	$(srcdir)/odin_signal.o \
	$(srcdir)/odin_eval_stmt.o \
	$(srcdir)/odin_eval_expr.o \
	$(srcdir)/odin_utils.o \
	$(srcdir)/odin_debug.o \
	$(srcdir)/odin_cell_define_utils.o \
	$(srcdir)/odin_cell_stmt_define_utils.o \
	$(srcdir)/odin_cell_module_define_utils.o \
	$(srcdir)/odin_net_utils.o \
	$(srcdir)/odin_IR_lookup.o \
	$(srcdir)/odin_hl_flatten.o \
	$(srcdir)/odin_functions.o \
	$(srcdir)/odin_ds1_graph_utils.o \
	$(srcdir)/odin_FLAT_netlist.o \
	$(srcdir)/odin_QUARTUS_LPM_graph_utils.o \
	$(srcdir)/odin_memory_utils.o \
	$(srcdir)/odin_logic_simulation.o \
	$(srcdir)/odin_hetero_utils.o \
	$(srcdir)/odin_levelizer_and_propogater.o \
	$(srcdir)/odin_node_utils.o \
	$(srcdir)/odin_expression_optimizations.o \
	$(srcdir)/odin_partial_mapper.o \
	$(srcdir)/odin_soft_mapping.o \
	$(srcdir)/odin_xml_parser_device_lib.o \
	$(srcdir)/odin_xml_parser_config_files.o \
	$(srcdir)/odin_TFE_identification.o \
	$(srcdir)/odin_binding.o \
	$(srcdir)/odin_node_and_cell_utils.o \
	$(srcdir)/odin_node_display.o \
	$(srcdir)/odin_finite_state_machine.o \
	$(srcdir)/odin_collect_stats.o \
	$(srcdir)/odin_BLIF_output.o \
	$(srcdir)/generic_traversal_of_IR.o \
	$(srcdir)/generic_traversal_of_IR_for_lpm_signal_module_links.o \
	$(srcdir)/generic_traversal_stats.o \
	$(srcdir)/string_cache.o

INCLUDES = \
	$(srcdir)/config.h \
	$(srcdir)/debug.h \
	$(srcdir)/string_cache.h \
	$(srcdir)/odin_types.h \
	$(srcdir)/odin_globals.h \
	$(srcdir)/odin_utils.h \
	$(srcdir)/odin_lpm.h \
	$(srcdir)/odin_logic.h \
	$(srcdir)/odin_signal.h \
	$(srcdir)/odin_eval_stmt.h \
	$(srcdir)/odin_cell_define_utils.h \
	$(srcdir)/odin_eval_expr.h \
	$(srcdir)/odin_net_utils.h \
	$(srcdir)/odin_IR_lookup.h \
	$(srcdir)/odin_hl_flatten.h \
	$(srcdir)/odin_functions.h \
	$(srcdir)/odin_FLAT_netlist.h \
	$(srcdir)/odin_ds1_graph_utils.h \
	$(srcdir)/odin_QUARTUS_LPM_graph_utils.h \
	$(srcdir)/odin_memory_utils.h \
	$(srcdir)/odin_logic_simulation.h \
	$(srcdir)/odin_levelizer_and_propogater.h \
	$(srcdir)/odin_node_utils.h \
	$(srcdir)/odin_expression_optimizations.h \
	$(srcdir)/odin_partial_mapper.h \
	$(srcdir)/odin_soft_mapping.h \
	$(srcdir)/odin_xml_parser_device_lib.h \
	$(srcdir)/odin_xml_parser_config_files.h \
	$(srcdir)/odin_TFE_identification.h \
	$(srcdir)/odin_binding.h \
	$(srcdir)/odin_node_and_cell_utils.h \
	$(srcdir)/odin_node_display.h \
	$(srcdir)/odin_finite_state_machine.h \
	$(srcdir)/odin_collect_stats.h \
	$(srcdir)/odin_BLIF_output.h \
	$(srcdir)/generic_traversal_of_IR.h \
	$(srcdir)/generic_traversal_of_IR_for_lpm_signal_module_links.h \
	$(srcdir)/generic_traversal_stats.h \
	$(srcdir)/odin.h

ifeq (no,yes)
  TGTLDFLAGS=-L.. -livl
  TGTDEPLIBS=../libivl.a
else
  TGTLDFLAGS=
  TGTDEPLIBS=
endif

AR = ar
LIB_FLAGS = rcs

odin.tgt: $(OBJS) $(TGTDEPLIBS) libodin.a
	$(CC) -ggdb -shared -o $@ $(OBJS) $(TGTLDFLAGS) $(LIBS) $(INCLUDE_DIR)

libodin.a:$(OBJS) 
	$(AR) $(LIB_FLAGS) $@ $(OBJS)

clean:
	rm -f $(OBJS) *.bck *.bak core
	#rm -f *.o dep/*.d *.bck *.bak core

#install: all installdirs $(libdir)/ivl/odin.tgt \
	$(includedir)/vpi_user.h
install: all installdirs

#$(libdir)/ivl/odin.tgt: ./odin.tgt
#	$(INSTALL_DATA) ./odin.tgt $(libdir)/ivl/odin.tgt

installdirs: ../mkinstalldirs
	$(srcdir)/../../mkinstalldirs $(includedir) $(bindir) $(libdir)/ivl

uninstall:
	rm -f $(libdir)/ivl/odin.tgt


#-include $(patsubst %.o, dep/%.d, $(OBJS))
