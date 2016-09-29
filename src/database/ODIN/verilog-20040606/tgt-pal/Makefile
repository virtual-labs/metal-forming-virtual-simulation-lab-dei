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
#ident "$Id: Makefile.in,v 1.11 2004/02/10 19:25:01 steve Exp $"
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

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I$(srcdir)/..  -DHAVE_CONFIG_H -fPIC
CFLAGS = -Wall -g -O2
LDFLAGS = 

all: dep pal.tgt

dep:
	mkdir dep

%.o: %.c
	$(CC) $(CPPFLAGS) $(CFLAGS) -MD -c $< -o $*.o
	mv $*.d dep

O = imain.o dump_final.o emit_jed.o enables.o fit_log.o fit_reg.o pads.o

ifeq (@CYGWIN@,yes)
  TGTLDFLAGS=-L.. -livl
  TGTDEPLIBS=../libivl.a
else
  TGTLDFLAGS=
  TGTDEPLIBS=
endif


pal.tgt: $O $(TGTDEPLIBS)
	$(CC) -shared -o $@ $O $(TGTLDFLAGS) $(LDFLAGS) -lipal

clean:
	rm -rf *.o dep pal.tgt

distclean: clean
	rm -f Makefile

install: all installdirs $(libdir)/ivl/pal.tgt

$(libdir)/ivl/pal.tgt: ./pal.tgt
	$(INSTALL_PROGRAM) ./pal.tgt $(libdir)/ivl/pal.tgt


installdirs: ../mkinstalldirs
	$(srcdir)/../mkinstalldirs $(includedir) $(bindir) $(libdir)/ivl

uninstall:
	rm -f $(libdir)/ivl/pal.tgt


-include $(patsubst %.o, dep/%.d, $O)
