#!/bin/bash
# Build script for Computer Programming Lab 

# Build Script runs the makefile and copies the build folder to localhost. The script is invoked by initialize script.  

# runs the makefile
cd ..
cd src
make all
cd ..

# copy the build folder to localhost
cp -r build/ /var/www/html

# change permissions for build folder in localhost
chmod 777 /var/www/html/build/ -R
cd /var/www/html/build/
firefox index.html
