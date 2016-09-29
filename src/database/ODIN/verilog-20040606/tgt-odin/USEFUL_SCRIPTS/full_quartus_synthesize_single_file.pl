#!/usr/bin/perl

################################################################################################
#
# AUTHOR: Peter Jamieson (paj)
# DATE: Started 01.23.2003
#
# DESCRITION:
# 	This script goes through a quartus flow based on the command line
#
# PARAMETERS:
#	1. The file list of benchmarks to execute
#	2. Path where benchmarks can be found
#	3. Path where to put ouput of benchmarks
#	4. A seed (integer)
#	5. The chip family (Stratix or StratixII)
#	6. A name to copy as.  This is for me to keep these large files backed up in a scratch directory
#
#	Sample usage: full_quartus_synthesize_single_file.pl sample_file.list . . 0 Stratix null
#
################################################################################################

################################################################################################
# GLOBALS
$QUARTUS_BIN = "/pkgs/altera/quartus/quartus4.1/linux/bin";
################################################################################################
# EXECUTABLE QUARTUS FILES
$QUARTUS_MAP = "quartus_map";
$QUARTUS_CDB = "quartus_cdb";
$QUARTUS_FIT = "quartus_fit";
$QUARTUS_TAN = "quartus_tan";

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
	print("usage: full_quartus_synthesize_single_file.pl [file list] [path where] [path to] [seed <int>] [chip family <Stratix/Stratix II>] [string_name]\n");
	print("You can pass \"null\" into string name if you don't want to copy the directory to scratch on monolake\n");
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

# go to the list dir
chdir("$ARGV[1]");

# skip first line 
$NEXT_FILE = <LIST_FILE>;

# read the next file on the list.
while ($NEXT_FILE = <LIST_FILE>)
{
	chop($NEXT_FILE);

	$FILE_WITH_DIR = "$ARGV[1]" . "/$NEXT_FILE";

	#printf ("file $NEXT_FILE in $FILE_WITH_DIR\n");

	# check if the file exists.
	if (-e $FILE_WITH_DIR)
	{
		# set up the regex buffer and extract the name without .v extension
		$_ = $NEXT_FILE;
		s/\.v//g;	
		$NAME_WITHOUT_EXTENSION = $_;

		# make the directory for this project
		if (chdir("$ARGV[2]/$NAME_WITHOUT_EXTENSION") != 1)
		{
			# IF - does not exist spit error
			mkdir("$ARGV[2]/$NAME_WITHOUT_EXTENSION");
			if (chdir("$ARGV[2]/$NAME_WITHOUT_EXTENSION") != 1)
			{
				printf("chdir failed");
				exit(0);
			}
		}
		# copy the verilog file
		$COMMAND="cp ../$FILE_WITH_DIR .";
		COMMANDS($COMMAND);

		# create the quartus project and synthesize the file 

		$COMMAND="$QUARTUS_BIN/$QUARTUS_MAP --source=$FILE_WITH_DIR --family=\"$ARGV[4]\" $NAME_WITHOUT_EXTENSION ";
		COMMANDS($COMMAND);
		$COMMAND="pwd";
		COMMANDS($COMMAND);
	# to make vqm files if we want
	#	$COMMAND="$QUARTUS_BIN/$QUARTUS_CDB $NAME_WITHOUT_EXTENSION --vqm=$NAME_WITHOUT_EXTENSION.vqm";
	#	COMMANDS($COMMAND);
		$COMMAND="pwd";
		COMMANDS($COMMAND);
		$COMMAND="$QUARTUS_BIN/$QUARTUS_FIT --seed=$ARGV[3] $NAME_WITHOUT_EXTENSION";
		COMMANDS($COMMAND);
		$COMMAND="$QUARTUS_BIN/$QUARTUS_TAN $NAME_WITHOUT_EXTENSION";
		COMMANDS($COMMAND);

		if ($ARGV[5] ne "null")
		{
			# don't do this if null.  local_machine needs to be replaced with the IP address of the machine your backing up on
			$COMMAND = "ssh local_machine cp -R $LOCAL_DIR/$NAME_WITHOUT_EXTENSION /scr/jamieson/MASS_BENCHMARK_BACKUP/".$NAME_WITHOUT_EXTENSION."_$ARGV[3]_$ARGV[4]_$ARGV[5]";
			COMMANDS($COMMAND);
			$COMMAND = "ssh local_machine /bin/rm -rf /scr/jamieson/MASS_BENCHMARK_BACKUP/".$NAME_WITHOUT_EXTENSION."_$ARGV[3]_$ARGV[4]_$ARGV[5]";
			COMMANDS($COMMAND);
		}

		$COMMAND="rm $NAME_WITHOUT_EXTENSION.v";
		COMMANDS($COMMAND);
		$COMMAND="rm -rf atom_netlists";
		COMMANDS($COMMAND);
		$COMMAND="rm -rf db";
		COMMANDS($COMMAND);

		if (chdir("$LOCAL_DIR") != 1)
		{
			printf("chdir ../ failed");
			exit(0);
		}
	}
	else
	{
		printf("File not found\n");
	}
}

sub COMMANDS 
{ 
	printf("\n");
	printf("--------------------------------------------------------------\n");
	print("$_[0]\n");
	system("$_[0]");
	printf("--------------------------------------------------------------\n");
	printf("\n");
}
