#!/bin/bash
# initialize script for Computer Programming Lab

# initialize script creates the initial environment for the Computer Programming
# Lab by installing the server side dependencies for the lab and invokes the build script.
# Mention all the server-side dependencies of the lab in
# dependencies.txt

# Usage of the Script 

# To use initialize script, run the command
# initialize scripts/dependencies.txt 
# initialize script takes dependencies.txt as an argument and installs the
# packages mentioned in the dependencies.txt file. 

# exporting the proxy server
export http_proxy=http://proxy.iiit.ac.in:8080/

# updating the packages
yum update

# $1 is the shell variable for command-line argument. cd /var/www/build/

FILENAME=dependencies.txt

# reads the file given as an argument to the script line by line and
# installs the packages
cat $FILENAME | while read LINE
do
	echo $LINE
	yum install -y $LINE
done

# invoke the build script
./build.sh
