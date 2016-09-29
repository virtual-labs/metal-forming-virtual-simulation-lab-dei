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
#ident "$Id: Makefile.in,v 1.165 2004/03/17 17:06:44 steve Exp $"
#
#
SHELL = /bin/sh

# This version string is only used in the version message printed
# by the compiler. It reflects the assigned version number for the
# product as a whole. Most components also print the CVS Name: token
# in order to get a more automatic version stamp as well.
VERSION = 0.7

prefix = /usr/local
exec_prefix = ${prefix}
srcdir = .

SUBDIRS =  vpi vvp tgt-vvp tgt-fpga libveriuser cadpli



bindir = ${exec_prefix}/bin
libdir = ${exec_prefix}/lib
includedir = ${prefix}/include
mandir = ${prefix}/man

libdir64 = ${exec_prefix}/lib

dllib=-ldl
strip_dynamic=

CC = gcc
CXX = g++
INSTALL = /usr/bin/install -c
INSTALL_SCRIPT = ${INSTALL}
INSTALL_PROGRAM = ${INSTALL}
INSTALL_DATA = ${INSTALL} -m 644
STRIP = strip
LEX = flex
YACC = bison

CPPFLAGS = -DHAVE_CVS_IDENT=1 -DHAVE_CONFIG_H -I. -I$(srcdir) 
CXXFLAGS = -Wall -g -O2
PICFLAGS = -fPIC
LDFLAGS = -rdynamic 

# The TARGETS variable lists the target modules that can be build and
# installed. Some of them depend on external things, so are only
# compiled if the prerequisites are installed.
TARGETS = tgt-null

all: dep ivl
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) $@); done
	for tgt in $(TARGETS); do (cd $$tgt ; $(MAKE) $@); done
	for dir in vpi ivlpp tgt-verilog tgt-stub; \
	    do (cd $$dir ; $(MAKE) $@); done
	cd driver ; $(MAKE) VERSION=$(VERSION) $@

# In the windows world, the installer will need a dosify program to
# dosify text files.
ifeq (no,yes)
all: dep dosify.exe
dosify.exe: dosify.c
	$(CC) -o dosify.exe dosify.c
endif

# This rule rules the compiler in the trivial hello.vl program to make
# sure the basics were compiled properly.
check: all
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) check); done
	driver/iverilog -B. -BPivlpp -tcheck -ocheck.vvp $(srcdir)/examples/hello.vl
	vvp/vvp -M- -M./vpi ./check.vvp | grep 'Hello, World'

clean:
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) $@); done
	for tgt in $(TARGETS); do (cd $$tgt ; $(MAKE) $@); done
	for dir in vpi ivlpp tgt-verilog tgt-stub driver; \
	    do (cd $$dir ; $(MAKE) $@); done
	rm -f *.o parse.cc parse.cc.output parse.h lexor.cc 
	rm -f lexor_keyword.cc libivl.a libvpi.a iverilog-vpi syn-rules.cc*
	rm -rf dep ivl

distclean: clean
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) $@); done
	for tgt in $(TARGETS); do (cd $$tgt ; $(MAKE) $@); done
	for dir in vpi ivlpp tgt-verilog tgt-stub driver; \
	    do (cd $$dir ; $(MAKE) $@); done
	rm -f Makefile config.status config.log config.cache config.h

TT = t-dll.o t-dll-api.o t-dll-expr.o t-dll-proc.o t-xnf.o
FF = cprop.o nodangle.o synth.o synth2.o syn-rules.o xnfio.o

O = main.o async.o design_dump.o dup_expr.o elaborate.o elab_expr.o \
elab_lval.o elab_net.o elab_anet.o elab_pexpr.o elab_scope.o \
elab_sig.o emit.o eval.o eval_attrib.o \
eval_tree.o expr_synth.o functor.o lexor.o lexor_keyword.o link_const.o \
load_module.o netlist.o netmisc.o net_assign.o \
net_design.o net_event.o net_expr.o net_force.o net_func.o \
net_link.o net_modulo.o net_nex_input.o net_nex_output.o \
net_proc.o net_scope.o net_udp.o net_variable.o pad_to_width.o \
parse.o parse_misc.o pform.o pform_dump.o \
set_width.o symbol_search.o sync.o sys_funcs.o \
verinum.o verireal.o target.o targets.o \
Attrib.o HName.o LineInfo.o Module.o PData.o PDelays.o PEvent.o \
PExpr.o PGate.o \
PTask.o PUdp.o PFunction.o PWire.o Statement.o StringHeap.o \
$(FF) $(TT)

Makefile: Makefile.in config.h.in config.status
	./config.status


ifeq (no,yes)
# Under Windows (mingw) I need to make the ivl.exe in two steps.
# The first step makes an ivl.exe that dlltool can use to make an
# export and import library, and the last link makes a, ivl.exe
# that really exports the things that the import library imports.
ivl: $O ivl.def
	$(CXX) -o ivl $O $(dllib) 	
	dlltool --dllname ivl --def ivl.def \
		--output-lib libivl.a --output-exp ivl.exp
	$(CXX) -o ivl ivl.exp $O $(dllib) 
else
ivl: $O
	$(CXX) $(LDFLAGS) -o ivl $O $(dllib)

endif

ifeq (no,yes)
SUBDIRS += driver-vpi
else
all: dep iverilog-vpi

iverilog-vpi: iverilog-vpi.sh
	sed -e 's;@SHARED@;-shared;' -e 's;@PIC@;-fPIC;' \
	    -e 's;@INCLUDEDIR@;${prefix}/include;' \
	    -e 's;@LIBDIR64@;${exec_prefix}/lib;' \
	    -e 's;@VPIDIR1@;.;' -e 's;@VPIDIR2@;;' \
	    -e 's;@LIBDIR@;${exec_prefix}/lib;' $< > $@
	chmod +x $@
endif

dep:
	mkdir dep

%.o: %.cc
	$(CXX) $(CPPFLAGS) $(CXXFLAGS) -MD -c $< -o $*.o
	mv $*.d dep/$*.d


lexor.o: lexor.cc parse.h

parse.o: parse.cc

parse.cc: $(srcdir)/parse.y
	$(YACC) --verbose -t -p VL -d -o parse.cc $(srcdir)/parse.y

parse.h: parse.cc
	mv parse.cc.h parse.h 2>/dev/null || mv parse.hh parse.h

syn-rules.cc: $(srcdir)/syn-rules.y
	$(YACC) --verbose -p syn_ -o syn-rules.cc $(srcdir)/syn-rules.y

lexor.cc: $(srcdir)/lexor.lex
	$(LEX) -PVL -s -olexor.cc $(srcdir)/lexor.lex

lexor_keyword.o: lexor_keyword.cc parse.h

lexor_keyword.cc: lexor_keyword.gperf
	gperf -o -i 7 -C -k 1-3,$$ -L ANSI-C -H keyword_hash -N check_identifier -t $(srcdir)/lexor_keyword.gperf > lexor_keyword.cc || (rm -f lexor_keyword.cc ; false)

iverilog-vpi.ps: $(srcdir)/iverilog-vpi.man
	man -t $(srcdir)/iverilog-vpi.man > iverilog-vpi.ps

iverilog-vpi.pdf: iverilog-vpi.ps
	ps2pdf iverilog-vpi.ps iverilog-vpi.pdf

ifeq (no,yes)
INSTALL_DOC = $(prefix)/iverilog-vpi.pdf $(mandir)/man1/iverilog-vpi.1
INSTALL_DOCDIR = $(mandir)/man1
all: dep iverilog-vpi.pdf
else
INSTALL_DOC = $(mandir)/man1/iverilog-vpi.1
INSTALL_DOCDIR = $(mandir)/man1
endif

ifeq (no,yes)
WIN32_INSTALL = $(prefix)/hello.vl $(prefix)/sqrt.vl $(prefix)/sqrt-virtex.v $(prefix)/QUICK_START.txt
else
WIN32_INSTALL = $(bindir)/iverilog-vpi
endif

XNF_INSTALL = $(libdir)/ivl/xnf.conf $(libdir)/ivl/xnf-s.conf

install: all installdirs $(libdir)/ivl/ivl  $(includedir)/ivl_target.h $(includedir)/_pli_types.h $(includedir)/vpi_user.h $(includedir)/acc_user.h $(includedir)/veriuser.h $(WIN32_INSTALL) $(INSTALL_DOC) $(XNF_INSTALL)
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) $@); done
	for tgt in $(TARGETS); do (cd $$tgt ; $(MAKE) $@); done
	for dir in vpi ivlpp driver; \
	    do (cd $$dir ; $(MAKE) $@); done

$(bindir)/iverilog-vpi: ./iverilog-vpi
	$(INSTALL_SCRIPT) ./iverilog-vpi $(bindir)/iverilog-vpi

$(libdir)/ivl/ivl: ./ivl
	$(INSTALL_PROGRAM) ./ivl $(libdir)/ivl/ivl
	$(STRIP) $(strip_dynamic) $(libdir)/ivl/ivl

$(libdir)/ivl/xnf-s.conf: $(srcdir)/xnf-s.conf
	$(INSTALL_DATA) $(srcdir)/xnf-s.conf $(libdir)/ivl/xnf-s.conf

$(libdir)/ivl/xnf.conf: $(srcdir)/xnf.conf
	$(INSTALL_DATA) $(srcdir)/xnf.conf $(libdir)/ivl/xnf.conf

$(includedir)/ivl_target.h: $(srcdir)/ivl_target.h
	$(INSTALL_DATA) $(srcdir)/ivl_target.h $(includedir)/ivl_target.h

$(includedir)/_pli_types.h: _pli_types.h
	$(INSTALL_DATA) $< $(includedir)/_pli_types.h

$(includedir)/vpi_user.h: $(srcdir)/vpi_user.h
	$(INSTALL_DATA) $(srcdir)/vpi_user.h $(includedir)/vpi_user.h

$(includedir)/acc_user.h: $(srcdir)/acc_user.h
	$(INSTALL_DATA) $(srcdir)/acc_user.h $(includedir)/acc_user.h

$(includedir)/veriuser.h: $(srcdir)/veriuser.h
	$(INSTALL_DATA) $(srcdir)/veriuser.h $(includedir)/veriuser.h

$(mandir)/man1/iverilog-vpi.1: $(srcdir)/iverilog-vpi.man
	$(INSTALL_DATA) $(srcdir)/iverilog-vpi.man $(mandir)/man1/iverilog-vpi.1

$(prefix)/iverilog-vpi.pdf: iverilog-vpi.pdf
	$(INSTALL_DATA) iverilog-vpi.pdf $(prefix)/iverilog-vpi.pdf

# In windows installations, put a few examples and the quick_start
# into the destination directory.
ifeq (no,yes)
$(prefix)/hello.vl: $(srcdir)/examples/hello.vl
	./dosify.exe $(srcdir)/examples/hello.vl tmp.vl
	mv tmp.vl $(prefix)/hello.vl

$(prefix)/sqrt.vl: $(srcdir)/examples/sqrt.vl
	./dosify.exe $(srcdir)/examples/sqrt.vl tmp.vl
	mv tmp.vl $(prefix)/sqrt.vl

$(prefix)/sqrt-virtex.v: $(srcdir)/examples/sqrt-virtex.v
	./dosify.exe $(srcdir)/examples/sqrt-virtex.v tmp.vl
	mv tmp.vl $(prefix)/sqrt-virtex.v

$(prefix)/QUICK_START.txt: $(srcdir)/QUICK_START.txt
	./dosify.exe $(srcdir)/QUICK_START.txt tmp.txt
	mv tmp.txt $(prefix)/QUICK_START.txt
endif

installdirs: mkinstalldirs
	$(srcdir)/mkinstalldirs $(bindir) $(includedir) $(libdir)/ivl \
	    $(mandir) $(mandir)/man1

uninstall:
	for dir in $(SUBDIRS); do (cd $$dir ; $(MAKE) $@); done
	for tgt in $(TARGETS); do (cd $$tgt ; $(MAKE) $@); done
	for dir in vpi ivlpp driver; \
	    do (cd $$dir ; $(MAKE) $@); done
	for f in xnf.conf xnf-s.conf ivl; \
	    do rm -f $(libdir)/ivl/$$f; done
	-rmdir $(libdir)/ivl
	for f in verilog iverilog-vpi gverilog; \
	    do rm -f $(bindir)/$$f; done
	for f in ivl_target.h vpi_user.h _pli_types.h acc_user.h veriuser.h; \
	    do rm -f $(includedir)/$$f; done
	rm -f $(mandir)/man1/iverilog-vpi.1


-include $(patsubst %.o, dep/%.d, $O)
-include $(patsubst %.o, dep/%.d, vpithunk.o)
