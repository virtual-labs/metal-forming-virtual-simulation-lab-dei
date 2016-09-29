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
#ident "$Id: Makefile.in,v 1.10 2004/03/11 06:06:59 steve Exp $"
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

vpidir = ${exec_prefix}/lib/ivl/.

strip_dynamic=@strip_dynamic@

CC = gcc
INSTALL = /usr/bin/install -c
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644

CPPFLAGS = -DHAVE_CVS_IDENT=1 -I$(srcdir) -I$(srcdir)/.. -I..  -DPACKAGE_NAME=\"\" -DPACKAGE_TARNAME=\"\" -DPACKAGE_VERSION=\"\" -DPACKAGE_STRING=\"\" -DPACKAGE_BUGREPORT=\"\" -DSTDC_HEADERS=1 -DHAVE_SYS_TYPES_H=1 -DHAVE_SYS_STAT_H=1 -DHAVE_STDLIB_H=1 -DHAVE_STRING_H=1 -DHAVE_MEMORY_H=1 -DHAVE_STRINGS_H=1 -DHAVE_INTTYPES_H=1 -DHAVE_STDINT_H=1 -DHAVE_UNISTD_H=1 -DHAVE_MALLOC_H=1 -DSIZEOF_UNSIGNED_LONG_LONG=8 -DSIZEOF_UNSIGNED_LONG=4 -DSIZEOF_UNSIGNED=4 -DHAVE_DLFCN_H=1  -fPIC
CFLAGS = -Wall -g -O2
LDFLAGS = 
STRIP = strip

SHARED = -shared

all:

ifeq (,yes)
vpidir32 = $(libdir)/ivl/
ALL32 = all32
INSTALL32 = install32
UNINSTALL32 = uninistall32
include $(srcdir)/enable_vvp32.mk
endif

all: dep cadpli.vpl $(ALL32)

# No specific check operations.
check: all

dep:
	mkdir dep

%.o: %.c
	$(CC) $(CPPFLAGS) $(CFLAGS) -MD -c $<
	mv $*.d dep

O = cadpli.o

SYSTEM_VPI_LDFLAGS = -L../vvp -lvpi
ifeq (no,yes)
    SYSTEM_VPI_LDFLAGS += 
endif

cadpli.vpl: $O ../vvp/libvpi.a ../libveriuser/libveriuser.o
	$(CC) -shared -o $@ $O ../libveriuser/libveriuser.o $(SYSTEM_VPI_LDFLAGS)

clean:
	rm -rf *.o dep cadpli.vpl

distclean: clean
	rm -f Makefile config.status config.log config.cache

install: all installdirs $(vpidir)/cadpli.vpl $(INSTALL32)

$(vpidir)/cadpli.vpl: ./cadpli.vpl
	$(INSTALL_PROGRAM) ./cadpli.vpl $(vpidir)/cadpli.vpl

installdirs: ../mkinstalldirs
	$(srcdir)/../mkinstalldirs $(vpidir)

uninstall: $(UNINSTALL32)
	rm -f $(vpidir)/cadpli.vpl

ifeq (,yes)
include $(srcdir)/enable_vvp32.mk
endif

-include $(patsubst %.o, dep/%.d, $O)
