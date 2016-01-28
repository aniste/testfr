#!/bin/bash

SHOST="production@app02.fbr.clh.no"
SPATH="/home/production/wordpress/public"

echo "Syncing uploads..."
rsync -avz --delete $SHOST:$SPATH/wp-content/uploads/* public/wp-content/uploads/

echo "Syncing plugins..."
rsync -avz --delete $SHOST:$SPATH/wp-content/plugins/* public/wp-content/plugins/
rsync -avz --delete $SHOST:$SPATH/wp-content/mu-plugins/* public/wp-content/mu-plugins/
