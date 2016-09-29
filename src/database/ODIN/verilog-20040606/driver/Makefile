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
#ident "$Id: Makefile.in,v 1.23 2004/02/10 19:25:00 steve Exp $"
#
#
SHELL = /bin/sh

VERSION = 0.7

prefix = /usr/local
exec_prefix = ${prefix}
srcdir = .



bindir = $(exec_prefix)/bin
libdir = $(exec_prefix)/lib
includedir = $(prefix)/include
mandir = ${prefix}/man

dllib=-ldl

CC = gcc
INSTALL = /usr/bin/install -c
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I. -I.. -I$(srcdir)/.. -I$(srcdir) -DVERSION='"$(VERSION)"'  -DHAVE_CONFIG_H
CFLAGS = -Wall -g -O2
LDFLAGS = 

all: iverilog

clean:
	rm -f *.o lexor.c parse.c parse.h parse.output
	rm -f cflexor.c cfparse.c cfparse.h cfparse.output
	rm -f iverilog

distclean: clean
	rm -f Makefile

O = main.o substit.o cflexor.o cfparse.o

iverilog: $O
	$(CC) $(LDFLAGS) $O -o iverilog 

cflexor.c: cflexor.lex
	flex -s -Pcf -ocflexor.c $(srcdir)/cflexor.lex

cfparse.h cfparse.c: cfparse.y
	bison --verbose -t -d -o cfparse.c --name-prefix=cf $(srcdir)/cfparse.y


main.o: main.c globals.h
	$(CC) $(CPPFLAGS) $(CFLAGS) -c -DIVL_ROOT='"${exec_prefix}/lib/ivl"'  -DIVL_INC='"${prefix}/include"' -DIVL_LIB='"${exec_prefix}/lib"' -DDLLIB='"-ldl"' $(srcdir)/main.c

build_string.o: build_string.c globals.h
cflexor.o: cflexor.c cfparse.h cfparse_misc.h globals.h
cfparse.o: cfparse.c globals.h cfparse_misc.h

iverilog.ps: $(srcdir)/iverilog.man
	man -t $(srcdir)/iverilog.man > iverilog.ps

iverilog.pdf: iverilog.ps
	ps2pdf iverilog.ps iverilog.pdf

ifeq (no,yes)
INSTALL_DOC = $(prefix)/iverilog.pdf $(mandir)/man1/iverilog.1
INSTALL_DOCDIR = $(mandir)/man1
all: iverilog.pdf
else
INSTALL_DOC = $(mandir)/man1/iverilog.1
INSTALL_DOCDIR = $(mandir)/man1
endif

install: all installdirs $(bindir)/iverilog $(INSTALL_DOC)

$(bindir)/iverilog: ./iverilog
	$(INSTALL_PROGRAM) ./iverilog $(bindir)/iverilog

$(mandir)/man1/iverilog.1: $(srcdir)/iverilog.man
	$(INSTALL_DATA) $(srcdir)/iverilog.man $(mandir)/man1/iverilog.1

$(prefix)/iverilog.pdf: iverilog.pdf
	$(INSTALL_DATA) iverilog.pdf $(prefix)/iverilog.pdf

installdirs: ../mkinstalldirs
	$(srcdir)/../mkinstalldirs $(bindir) $(INSTALL_DOCDIR)

uninstall:
	rm -f $(bindir)/iverilog
	rm -f $(mandir)/man1/iverilog.1
