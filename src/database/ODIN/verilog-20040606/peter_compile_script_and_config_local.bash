#!/bin/bash

####################################################################################
#
# 08/07/2002 - This file is created to compile the ICARUS system for local machine
#
####################################################################################

# condigure the iverilog and compile for your local directory
./configure --prefix=/jayar/r/r0/jamieson/ODIN/verilog-20040606/BIN
make
make install

# Compile the EDIF target module
cd tgt-odin
make
make install
cd ..

