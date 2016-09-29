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
#ident "$Id: Makefile.in,v 1.6 2004/02/10 19:25:00 steve Exp $"
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

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I. -I$(srcdir)/.. -DVERSION='"$(VERSION)"'  -DHAVE_CONFIG_H
CFLAGS = -Wall -g -O2
LDFLAGS = 

all: iverilog-vpi

clean:
	rm -f *.o
	rm -f iverilog-vpi

distclean: clean
	rm -f Makefile

O = main.o res.o

iverilog-vpi: $O
	$(CC) $(LDFLAGS) $O -o iverilog-vpi 


main.o: main.c
	$(CC) $(CPPFLAGS) $(CFLAGS) -c $(srcdir)/main.c

# Windows specific...
res.o: res.rc
	windres -i res.rc -o res.o
#

install: all installdirs $(bindir)/iverilog-vpi

$(bindir)/iverilog-vpi: ./iverilog-vpi
	$(INSTALL_PROGRAM) ./iverilog-vpi $(bindir)/iverilog-vpi

installdirs: ../mkinstalldirs
	$(srcdir)/../mkinstalldirs $(bindir)

uninstall:
	rm -f $(bindir)/iverilog-vpi
