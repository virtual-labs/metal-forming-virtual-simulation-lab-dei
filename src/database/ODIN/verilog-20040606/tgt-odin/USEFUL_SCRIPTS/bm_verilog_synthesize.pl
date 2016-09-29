#!/usr/bin/perl

################################################################################################
#
# AUTHOR: Peter Jamieson (paj)
# DATE: Started 01.23.2003
#
# DESCRITION:
# 	This script executes each of the benchmarks through the verilog compiler.
#
# PARAMETERS:
#	1. The file list of benchmarks to execute
#	2. Path where benchmarks can be found
#	3. Path wher to put ouput of benchmarks
#	4. Interactive option (y or n)
#	5. With valgrind option (y or n) // defunct
#
#	Sample:  bm_verilog_synthesize.pl sample_file_list.list . . n n
#
################################################################################################

################################################################################################
# GLOBALS
################################################################################################
# WORKSPACE intialized in .cshrc
$CAD_DIR="$ENV{WORKSPACE}/CAD_FLOW";

# Directory Locations for all the CAD programs
$VERILOG_SYNTH="$CAD_DIR/VERILOG/VERILOG_COMPILER/verilog-20040606/driver/iverilog";

#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------
# MAIN SCRIPT:
#	DESCRIPTION:
#-----------------------------------------------------------------------------------------------
#-----------------------------------------------------------------------------------------------

# check the parametes.  Note PERL does not consider the script itself a parameter.
$program_specified_arguments = 6;
$number_arguments = @ARGV;
if ($number_arguments != $program_specified_arguments)
{
	print("usage: bm_verilog_synthesize.pl [file list - first line is comment] [path where] [path to] [Interactive (y/n)] [With Valgrind (y/n)\n");
	exit(-1);
}

$LOCAL_DIR=`pwd`;
chop($LOCAL_DIR);

# check if where exists 
if (chdir("$ARGV[1]") != 1)
{
	print("The where directory $ARGV[1] does not exist\n");
	exit(-1);
}

# check if to exists.  If it doesn't, create it.
if (chdir("$ARGV[2]") != 1)
{
	# IF - does not exist then create directory
	mkdir("$ARGV[2]");
}

# check if to exists.  If it doesn't, create it.
if (chdir("$ARGV[5]") != 1)
{
	# IF - does not exist then create directory
	mkdir("$ARGV[5]");
}

# open the list file.
if(!(-e $ARGV[0]))
{
	print("file $ARGV[0] be opened\n");
	exit(-1);
}
if((!(-e $ARGV[0])) || (open (LIST_FILE, "$ARGV[0]") != 1))
{
	print("file $ARGV[0] cannot be opened\n");
	exit(-1);
}

# check if we want to execute with valgrind 	
if ($ARGV[4] eq "y")
{
	$VALGRIND="valgrind -v --gdb-attach=yes";
}
else
{
	$VALGRIND="";
}

# go to the list dir
chdir("$ARGV[1]");

# skip first line 
$NEXT_FILE = <LIST_FILE>;

# choose between interactive or non interactive mode
if ($ARGV[3] eq "y")
{
	# IF - Interactive.

	printf("Interactive Mode\n");
	# read the next file on the list.
	while ($NEXT_FILE = <LIST_FILE>)
	{
		chop($NEXT_FILE);

		$FILE_WITH_DIR = "$ARGV[1]" . "/$NEXT_FILE";

		#	printf ("file $NEXT_FILE in $FILE_WITH_DIR\n");

		# check if the file exists.
		if (-e $FILE_WITH_DIR)
		{
			# set up the regex buffer and extract the name without .v extension
			$_ = $NEXT_FILE;
			s/\.v//g;	
			$NAME_WITHOUT_EXTENSION = $_;

			# ask the user if he/she wishes to synthesize the file
			printf("--------------------------------------------------------------\n");
			printf("Would you like to sythesize $NEXT_FILE ? (y/n/q)\n");

			# read input an chop of newline char
			$READ_USER_INPUT = <STDIN>;
			chop($READ_USER_INPUT);
			if ($READ_USER_INPUT eq "y")
			{
				# synthisize
				$COMMAND="$VALGRIND $VERILOG_SYNTH -todin-paj_vpr -o$ARGV[2]/$NAME_WITHOUT_EXTENSION.v $ARGV[1]/$NEXT_FILE > $ARGV[2]/$NAME_WITHOUT_EXTENSION.stdout";
				print("$COMMAND\n");
				printf("--------------------------------------------------------------\n");
				printf("\n");
				system("$COMMAND");
				# delete rename on first line, all lines with #, and conver . to _
#				$COMMAND = "sed -e \"1,1s/(rename//\" -e \"1,1s/\\\".*//\" -e \"/#.*/D\" -e \"s/\\./_/g\" $ARGV[2]/$NAME_WITHOUT_EXTENSION.v > $ARGV[2]/$NAME_WITHOUT_EXTENSION.edf";
				system("$COMMAND");
				$READ_STOP = <STDIN>;
				$COMMAND="vim $ARGV[2]/$NAME_WITHOUT_EXTENSION.stdout";
				system("$COMMAND");
				$COMMAND="vim $ARGV[2]/$NAME_WITHOUT_EXTENSION.v";
				system("$COMMAND");
			}
			elsif ($READ_USER_INPUT eq "q")
			{
				exit(0);
			}
		}
		else
		{
			printf("File not found\n");
		}
	}
}
else
{
	# ELSE - Non interactive

	# read the next file on the list.
	while ($NEXT_FILE = <LIST_FILE>)
	{
		chop($NEXT_FILE);

		$FILE_WITH_DIR = "$ARGV[1]" . "/$NEXT_FILE";

		#	printf ("file $NEXT_FILE in $FILE_WITH_DIR\n");

		# check if the file exists.
		if (-e $FILE_WITH_DIR)
		{
			# set up the regex buffer and extract the name without .v extension
			$_ = $NEXT_FILE;
			s/\.v//g;	
			$NAME_WITHOUT_EXTENSION = $_;

			# ask the user if he/she wishes to synthesize the file
			printf("--------------------------------------------------------------\n");
			# synthisize
			$COMMAND="$VALGRIND $VERILOG_SYNTH -v -todin-paj_vpr $ARGV[1]/$NEXT_FILE -o $ARGV[2]/$NAME_WITHOUT_EXTENSION.v >& $ARGV[2]/$NAME_WITHOUT_EXTENSION.stdout";
			printf("$COMMAND\n");
			COMMANDS($COMMAND);
 
			# delete rename on first line, all lines with #, and conver . to _
#			$COMMAND = "sed -e \"1,1s/(rename//\" -e \"1,1s/\\\".*//\" -e \"/#.*/D\" -e \"s/\\./_/g\" $ARGV[2]/$NAME_WITHOUT_EXTENSION.v > $ARGV[5]/$NAME_WITHOUT_EXTENSION.edf";
#			COMMANDS($COMMAND);
#			$COMMAND="/bin/rm -f $ARGV[2]/$NAME_WITHOUT_EXTENSION.v_log_file";
#			COMMANDS($COMMAND);
#			printf("If the line below has (design * then the compilation was successful\n");
#			$COMMAND="grep \"(design\" $ARGV[5]/$NAME_WITHOUT_EXTENSION.v_log_file";
#			COMMANDS($COMMAND);
			printf("If the line below has endmodule then the compilation was successful for VQM\n");
			$COMMAND="grep \"endmodule\" $ARGV[2]/$NAME_WITHOUT_EXTENSION.v";
			COMMANDS($COMMAND);
		}
		else
		{
			printf("File not found\n");
		}
	}
}

sub COMMANDS 
{ 
#	printf("\n");
#	printf("--------------------------------------------------------------\n");
#	print("$_[0]\n");
	system("$_[0]");
#	printf("--------------------------------------------------------------\n");
#	printf("\n");
}
