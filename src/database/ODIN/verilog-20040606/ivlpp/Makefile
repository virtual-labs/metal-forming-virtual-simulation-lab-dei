#
#    This source code is free software; you can redistribute it
#    and/or modify it in source code form under the terms of the GNU
#    Library General Public License as published by the Free Software
#    Foundation; either version 2 of the License, or (at your option)
#    any later version. In order to redistribute the software in
#    binary form, you will need a Picture Elements Binary Software
#    License.
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
#ident "$Id: Makefile.in,v 1.16 2004/02/10 19:25:00 steve Exp $"
#
#
SHELL = /bin/sh

VERSION = 0.0

prefix = /usr/local
exec_prefix = ${prefix}
srcdir = .



bindir = ${exec_prefix}/bin
libdir = ${exec_prefix}/lib
includedir = $(prefix)/include

CC = gcc
INSTALL = /usr/bin/install -c
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I. -I.. -I$(srcdir)/.. -I$(srcdir)  -DHAVE_CONFIG_H
CFLAGS = -Wall -g -O2
LDFLAGS =  

all: ivlpp

clean:
	rm -f *.o lexor.c parse.c parse.h parse.output ivlpp

distclean: clean
	rm -f Makefile

O = main.o lexor.o parse.o

ivlpp: $O
	$(CC) $(LDFLAGS) $O -o ivlpp 

lexor.c: lexor.lex
	flex -s -olexor.c $(srcdir)/lexor.lex

parse.h parse.c: parse.y
	bison --verbose -t -d -o parse.c $(srcdir)/parse.y

install: all installdirs $(libdir)/ivl/ivlpp

$(libdir)/ivl/ivlpp: ivlpp
	$(INSTALL_PROGRAM) ./ivlpp $(libdir)/ivl/ivlpp

installdirs: ../mkinstalldirs
	$(srcdir)/../mkinstalldirs $(libdir)/ivl

uninstall:
	rm -f $(libdir)/ivl/ivlpp

lexor.o: lexor.c parse.h globals.h
main.o: main.c globals.h
parse.o: parse.c
