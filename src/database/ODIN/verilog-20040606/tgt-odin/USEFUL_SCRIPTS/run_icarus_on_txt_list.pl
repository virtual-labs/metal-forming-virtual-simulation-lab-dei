#!/usr/bin/perl

################################################################################################
#
# AUTHOR: Peter Jamieson (paj)
#
# DESCRITION:
#	This file uses another script to run all the benchmarks
#
# PARAMETERS:
#
################################################################################################

################################################################################################
# INCLUDES
################################################################################################

################################################################################################
# DEFINITIONS
################################################################################################

################################################################################################
# GLOBALS
################################################################################################

#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
# MAIN SCRIPT:
#	DESCRIPTION:
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------

# location of overall script and benchmark dir
$SCRIPT="./";
$BM_LOCATION="/jayar/r/r0/jamieson/ODIN/verilog-20040606/tgt-odin/MICROBENCHMARKS";
$SCRIPT_FILE1="SCRIPT_verilog_files.txt";

# check the parametes.  Note PERL does not consider the script itself a parameter.
$program_specified_arguments = 0;
$number_arguments = @ARGV;
if ($number_arguments != $program_specified_arguments)
{
	print("usage: exec_run_bms.pl\n");
	exit(-1);
}

# rund script in non-interactive mode...last to arguments are for interactive and valgrind 
$COMMAND = "$SCRIPT/bm_verilog_synthesize.pl $BM_LOCATION/$SCRIPT_FILE1 $BM_LOCATION $BM_LOCATION/ICARUS_VERSIONS n n $BM_LOCATION/ICARUS_VERSIONS";
print("$COMMAND\n\n\n\n");
system("$COMMAND");

$COMMAND = "/bin/rm -f $LOCATION/ICARUS_VERSIONS/*.log $LOCATION/ICARUS_VERSIONS/*.edf";
print("$COMMAND\n\n\n\n");
system("$COMMAND");
