#!/bin/bash

#
# CONFIG
#

# The current mysql connection information
SHOST="production@app02.fbr.clh.no"
DUSER="production"
DNAME="production2"

# The current URL/sitename for Wordpress instance
OHOST="www.forbrukerradet.no"

# Output names
FNOW=`date +"%Y%m%d_%H%M%S"`
FNAME="${DNAME}_${FNOW}.sql"

#
# MAIN
#

echo "Enter DATABASE password for $DUSER@$DNAME on $SHOST (input is hidden):"
read -s dbpasswd

echo "... connecting with SSH and saving to $FNAME"
ssh $SHOST "mysqldump -u $DUSER -p${dbpasswd} $DNAME" > $FNAME

echo "Enter NEW HOSTNAME for site:"
read nhostname
sed -i.bak s/$OHOST/$nhostname/g $FNAME
