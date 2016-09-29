#!/bin/bash

####################################################################################
#
# 08/07/2002 - This file is created to compile the ICARUS system for local machine
#
####################################################################################

# Compile the EDIF target module
cd tgt-odin
make
make install
cd ..

/bin/rm -f ivl
make
make install
