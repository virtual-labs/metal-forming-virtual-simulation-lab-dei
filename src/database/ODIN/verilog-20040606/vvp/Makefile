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
#ident "$Id: Makefile.in,v 1.60 2004/05/18 18:45:11 steve Exp $"
#
#
SHELL = /bin/sh

prefix = /usr/local
exec_prefix = ${prefix}
srcdir = .



bindir = ${exec_prefix}/bin
libdir = ${exec_prefix}/lib
mandir = ${prefix}/man
includedir = ${prefix}/include

libdir64 = ${exec_prefix}/lib

CC = gcc
HOSTCC = gcc
CXX = g++
INSTALL = /usr/bin/install -c
INSTALL_SCRIPT = ${INSTALL}
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644
STRIP = strip
RANLIB = ranlib
LEX = flex
YACC = bison

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I. -I.. -I $(srcdir) -I$(srcdir)/..  -DHAVE_CONFIG_H
CXXFLAGS = -Wall -g -O2
LDFLAGS = -rdynamic 
LIBS =  

dllib=-ldl

MDIR1 = -DMODULE_DIR1=\"$(libdir)/ivl/.\"
ifneq (x,x)
MDIR2 = -DMODULE_DIR2=\"$(libdir)/ivl/\"
endif

ifeq (,yes)
ALL32 = all32
INSTALL32 = install32
UNINSTALL32 = uninstall32
endif

all: dep vvp libvpi.a $(ALL32)

clean:
	rm -f *.o *~ parse.cc parse.cc.output parse.h lexor.cc tables.cc
	rm -rf dep vvp libvpi.a

distclean: clean
	rm -f Makefile config.status config.log config.cache config.h

check: all
	./vvp -M../vpi $(srcdir)/examples/hello.vvp | grep 'Hello, World.'

V = vpi_modules.o vpi_callback.o vpi_const.o vpi_event.o vpi_iter.o vpi_mcd.o \
vpi_priv.o vpi_scope.o vpi_real.o vpi_signal.o vpi_tasks.o vpi_time.o \
vpi_memory.o vpi_vthr_vector.o vpip_bin.o vpip_hex.o vpip_oct.o \
vpip_to_dec.o vpip_format.o vvp_vpi.o

O = main.o parse.o parse_misc.o lexor.o arith.o bufif.o compile.o \
functor.o fvectors.o npmos.o resolv.o stop.o symbols.o ufunc.o codes.o \
vthread.o schedule.o statistics.o tables.o udp.o memory.o force.o event.o \
logic.o delay.o words.o $V

ifeq (no,yes)
# Under Windows (mingw) I need to make the ivl.exe in two steps.
# The first step makes an ivl.exe that dlltool can use to make an
# export and import library, and the last link makes a, ivl.exe
# that really exports the things that the import library imports.
vvp libvpi.a: $O vvp.def
	$(CXX) -o vvp $(LDFLAGS) $O $(dllib) $(LIBS)
	dlltool --dllname vvp --def vvp.def \
		--output-lib libvpi.a --output-exp vvp.exp
	$(CXX) -o vvp vvp.exp $(LDFLAGS) $O $(dllib) $(LIBS)
else
libvpi.a: libvpi.c
	$(CC) -c $(srcdir)/libvpi.c
	rm -f libvpi.a
	ar cqv libvpi.a libvpi.o
	$(RANLIB) libvpi.a

vvp: $O 
	$(CXX) $(LDFLAGS) -o vvp $O $(LIBS) $(dllib)
endif

dep:
	mkdir dep

%.o: %.cc
	$(CXX) $(CPPFLAGS) $(MDIR1) $(MDIR2) $(CXXFLAGS) -MD -c $< -o $*.o
	mv $*.d dep/$*.d

%.o: %.c
	$(CC) $(CPPFLAGS) $(MDIR1) $(MDIR2) $(CFLAGS) -MD -c $< -o $*.o
	mv $*.d dep/$*.d

tables.cc: $(srcdir)/draw_tt.c
	$(HOSTCC) -o draw_tt $(srcdir)/draw_tt.c
	./draw_tt > tables.cc
	rm draw_tt

ifeq (,yes)

all32: bin32 vvp32

bin32:
	mkdir bin32

bin32/%.o: %.cc
	$(CXX) -m32 -DSIZEOF_UNSIGNED_LONG=4 $(CPPFLAGS) $(MDIR2) $(CXXFLAGS) -MD -c $< -o $@

bin32/%.o: %.c
	$(CC) -m32 $(CPPFLAGS) $(MDIR2) $(CFLAGS) -MD -c $< -o $@

bin32/lexor.o: lexor.cc parse.h

vvp32: $(addprefix bin32/,$O) bin32/libvpi.a
	$(CXX) -m32 $(LDFLAGS) -o vvp32 $(addprefix bin32/,$O) $(LIBS) $(dllib)

bin32/libvpi.a: libvpi.c
	$(CC) -m32 $(CPPFLAGS) $(CFLAGS) -o bin32/libvpi.o -c $(srcdir)/libvpi.c
	rm -f bin32/libvpi.a
	ar cqv bin32/libvpi.a bin32/libvpi.o
	$(RANLIB) bin32/libvpi.a

-include $(patsubst bin32/%.o, bin32/%.d, $(addprefix bin32/,$O))
endif

lexor.o: lexor.cc parse.h

parse.o: parse.cc

tables.o: tables.cc

parse.cc: $(srcdir)/parse.y
	$(YACC) --verbose -t -d -o parse.cc $(srcdir)/parse.y

parse.h: parse.cc
	mv parse.cc.h parse.h 2>/dev/null || mv parse.hh parse.h

lexor.cc: $(srcdir)/lexor.lex
	$(LEX) -s -olexor.cc $(srcdir)/lexor.lex

vvp.pdf: $(srcdir)/vvp.man
	man -t $(srcdir)/vvp.man | ps2pdf - vvp.pdf

ifeq (no,yes)
INSTALL_DOC = $(prefix)/vvp.pdf $(mandir)/man1/vvp.1
INSTALL_DOCDIR = $(mandir)/man1
all: vvp.pdf
else
INSTALL_DOC = $(mandir)/man1/vvp.1
INSTALL_DOCDIR = $(mandir)/man1
endif

Makefile: Makefile.in config.status
	./config.status


install: all installdirs $(bindir)/vvp $(libdir64)/libvpi.a $(INSTALL_DOC) $(INSTALL32)

$(bindir)/vvp: ./vvp
	$(INSTALL_PROGRAM) ./vvp $(bindir)/vvp

$(libdir64)/libvpi.a : ./libvpi.a
	$(INSTALL_DATA) libvpi.a $(libdir64)/libvpi.a

$(mandir)/man1/vvp.1: $(srcdir)/vvp.man
	$(INSTALL_DATA) $(srcdir)/vvp.man $(mandir)/man1/vvp.1

$(prefix)/vvp.pdf: vvp.pdf
	$(INSTALL_DATA) vvp.pdf $(prefix)/vvp.pdf

installdirs: $(srcdir)/mkinstalldirs
	$(srcdir)/mkinstalldirs $(bindir) $(libdir) $(libdir64) $(INSTALL_DOCDIR)


ifeq (,yes)
install32: all32 $(libdir)/libvpi.a $(bindir)/vvp32

$(libdir)/libvpi.a: bin32/libvpi.a
	$(INSTALL_DATA) bin32/libvpi.a $(libdir)/libvpi.a

$(bindir)/vvp32: ./vvp32
	$(INSTALL_PROGRAM) ./vvp32 $(bindir)/vvp32

uninstall32:
	rm -f $(libdir)/libvpi.a
	rm -f $(bindir)/vvp32
endif

uninstall: $(UNINSTALL32)
	rm -f $(bindir)/vvp
	rm -f $(libdir64)/libvpi.a
	rm -f $(mandir)/man1/vvp.1

-include $(patsubst %.o, dep/%.d, $O)
