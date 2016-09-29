This is the readme file describing some of the details about Odin.  Odin is a Verilog RTL Synthesis tool intended for research in HDL synthesis
for FPGAs.  There are lots of problems with Odin including the front-end it uses "Icarus", but hopefully, these tools will get better over time
with both your contributions, and as I find and fix bugs.

Since this software is intended for reaserach and developers, the setup of
Odin is not simple and push button.  Many of the steps are present to help
make Odin easier to debug.

INSTALLING: 
To install odin you don't really have to do much except follow the following
steps to get things up and running.  Once you have a basic installation,
you'll be able to change the code in Odin, recompile, and test your new
theories.  Most of these stages are to eliminate the dynamic loading that
Icarus does (this helps debugging), and updating the paths which are
hard-coded in a variety of places.  

1. cp -R TOOLS/VERILOG_COMPILER/verilog-20040606/ ODIN
2. Makefile tgt-odin - change directories for -I, -L and prefix
3. verilog.../BIN/lib/ivl/odin-paj_vpr.conf needs propoer directories.
4. peter_peter_compile_script_and_config_local.bash and peter_compile_script_local.bash need to have directories where install 
5. Change line in verilog-20040606/Makefile from:
"$(CXX) $(LDFLAGS) -o ivl $O $(dllib)"
to:
"$(CXX) $(CXXFLAGS)  $(LDFLAGS) -finstrument-functions -o ivl $O $(dllib)
-Ltgt-odin -lodin -Ltgt-odin/PETER_LIB/ -lpeters -lm
-L/nfs/eecg/q/grads10/jamieson/PROGRAMMING_TOOLS/libxml2-2.6.2/PETER_BIN/lib
-lxml2 -lz -lpthread"
where:
"-L/nfs/eecg/q/grads10/jamieson/PROGRAMMING_TOOLS/libxml2-2.6.2/PETER_BIN/lib"
should be defined as the location of your libxml2 library.
6. cd tgt-odin/ && make clean && make && cd .. && make clean && ./peter_compile_script_and_config_local.bash
7. Test on SAMPLE_FILES

TESTING:
Go into the SAMPLE_FILES directory, and the REAME.txt file there provides a
basic test you can run.

DETAILS ABOUT ODIN:
I have attempted to make Odin a self-documented piece of software.  This may
or may not be true.  Additionally, there will be an academic paper describing
Odin.  I can't release this information until I know the paper will be
published (this stuff is part of my PhD thesis work, so these papers are
important).  Also, there should be an Odin_document.pdf, which I will add to
that describes various things about setting up and using Odin.  Hopefully,
these details plus your feedback will help improve the quality of describing
Odin.

CONTACT:
All the Odin related work has been designed by Peter Jamieson.  That's me.
I've attempted to make this a quality piece of software, but this tool has
always been a battle.  Hopefully, opening this design to the public will
improve both my design and give me some feedback.  Feel free to contact me at
jamieson.peter@gmail.com.  I will get back to you as soon as I can with a
response to your inquiry.
