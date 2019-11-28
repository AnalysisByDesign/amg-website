#!/bin/bash
# --------------------------------------------------------------------------------
# Script name  : template.sh
# Author       : Dave Rix (dave@analysemy.golf)
# Created      : 201x-xx-xx
# Description  : This is a template console script to be used as a basis for new
#              : shell scripts for useful tools and utilities to be run purely
#              : from the console - this does not have email out capabilities
# History      :
#  201x-xx-xx  : DAR - Initial script
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# Variable Declaration and includes
# --------------------------------------------------------------------------------
# Include bash function library first
basePath=`git rev-parse --show-toplevel`
funcPath="${basePath}/funcs"
. ${funcPath}/funcs_bash

scriptDesc="AmG Template"
email="dave@analysemy.golf"

# --------------------------------------------------------------------------------
# Set some defaults
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# Local functions
# --------------------------------------------------------------------------------
function AmG_RemoveTemp() {
	# Remove temp files if there are any
	doNothing=Y
}

function Script_Usage() {

	cat << EOF

usage: $0 OPTIONS server

OPTIONS can be:
        -h                Show this message
        -v                Verbose output
        -d                Dry-run

EOF

	# If we have called the usage statement, then something has gone wrong
	# so we can remove the lock file ready for the next run!
	AmG_Cleanup 1
}

# Now set up a trap to catch any errors and cause the exit early function to be
# called we will trap the following codes HUP, INT, QUIT, KILL
trap AmG_Exit_Early 1 2 3 9
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# Check which options have been passed in
# --------------------------------------------------------------------------------
while getopts ":dhvs:" OPTION
do
	case $OPTION in
		d)
			dryRun="Y"
			;;
		h)
			Script_Usage
			;;
		v)
			verbose="Y"
			;;
		?)
			Script_Usage
			;;
	esac
done
shift $((OPTIND - 1))

# Now check the server list that has been passed in...
loginPath=$1
server=`mysql_config_editor print --login-path=${loginPath} | grep host | awk '{print $3}'`
if [ "" = "${server}" ]
then
	AmG_Message "You have not supplied a MySQL loginPath"
	AmG_Message "Valid options are;"
	mysql_config_editor print --all | grep -E "^\[" | sed "s/\[/    /g" | sed "s/\]//g" | sort -u
	AmG_Cleanup 1
fi
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# We are ready to start, so check and set the lock file
# --------------------------------------------------------------------------------
AmG_Message "Starting ${scriptName} for server ${server}..."
AmG_ObtainLock
AmG_Verbose "Verbose logging  = ${verbose}"
AmG_Verbose "Dry-run          = ${dryRun}"
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# DO USEFUL STUFF HERE...
# --------------------------------------------------------------------------------

sleep 5

# --------------------------------------------------------------------------------
# Logging, analysis, email, etc.
# --------------------------------------------------------------------------------

# --------------------------------------------------------------------------------
# All done, so tidy stuff up a bit before exiting...
AmG_Cleanup
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------
#      SCRIPT END
# --------------------------------------------------------------------------------
# --------------------------------------------------------------------------------

