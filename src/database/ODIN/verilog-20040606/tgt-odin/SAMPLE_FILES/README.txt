This directory provides one sample verilog design, and some scripts that will map the verilog file into a Odin mapped verilog file.  This should
test out if Odin is working, and also provide you with some ideas on how to Debug any changes you make to Odin.

Testing:
1. Go to ODIN/verilog-20040606/tgt-odin/SAMPLE_FILES
2. Update the propoer path in config_file.txt for the location of ODIN on your
system.
3. run "exec_ivlpp.bash bm_expr_all_mod.v"
4. run "exec_ivl.bash"
5. At this point if everything has run properly you should see a
temp.synthesized.v file which is the structural verilog version of
bm_expr_all_mod.v.  This temp.synthesized.v can be inputted into Quartus.

The scripts exec_ivlpp.bash, exec_ivl.bash, and exec_ivl_gdb.bash are the
basic scripts I use for running Odin on Verilog designs.  exec_ivlpp.bash is
the preprocessor.  exec_ivl.bash and exec_ivl_gdb.bash run the synthesis tool,
and the later is my entrance script to gdb.  For the gdb execution note that
the .gdbinit file contains the arguments that are passed to gdb.
