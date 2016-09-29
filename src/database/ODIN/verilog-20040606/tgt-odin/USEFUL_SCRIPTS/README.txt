In this directory I've included some of the scripts that you might find useful.  Basically, there are three scripts that you can use here.  
For each of these scripts, you'll probably need to update hard-coded directories to your local directories.  Also, these scripts are provided 
as an aid, without waranty.  They simply might be helpful.

Script description:
bm_verilog_synthesize.pl - is a script that can compile a number of individual verilog designs quickly.  The rule is that these designs need to be
							self-constained in one verilog file.  You can create these files by running the preprocessor in Icarus "ivlpp" with all
							the verilog files in the design to create one preprossed verilog file.  With these single verilog file benchmarks, you can
							then run Odin over all them.  
full_quartus_synthesize_single_file.pl - This is a similar batch processing script that puts verilog designs that are contained in one verilog file through
										the Quartus cadflow.
split_up_verilog_file_into_modules.pl - This is kind of a cool script that takes designs that are encapsulated in one file, and breaks it up into a set of
										all hierarchies.  What I mean here is that it makes all the hierarchical trees in the Verilog design so that
										a bunch of verilog files are created that describe all the pieces of the design.  I use this so I can check
										how different pieces of a design are doing with Odin to pin-point what parts of the design Odin is not mapping
										well.
