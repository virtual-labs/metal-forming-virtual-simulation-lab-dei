This file describes the software package you have dowloaded.  So far you've figured out how to untar the file,
so this file will guide you to what's in this development package.

This software includes both Icarus and Odin.  Icarus is the front-end Verilog parser software that Odin uses.  Odin
is a back-end synthesis tool that targets FPGAs.

The first directory from the point of this README files is the verilog-xxxxx.  This is the location of Icarus software
and all the targets that Icarus supports.  The reason we include this software is it has been slightly modified to 
be a piece of software that statically loads Odin exclusively.  This is slightly different than Icarus's orignial
design, which dynamically loaded target back-ends.

Off of the Icarus directory is the tgt-odin directory.  This directory contains Odin.  There are lots of README files,
a manual, and source and Makefiles.  I recommend you go to this directory next to figure out how to setup and install
Odin.

by Peter Jamieson (March 2005)
