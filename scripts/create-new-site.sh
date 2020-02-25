#!/usr/bin/bash
if [ -n "$1" ]
then
cd web
drush site-install --locale=ru --account-name=admin --account-pass=admin --db-url="mysql://mysql:mysql@localhost/$1" -y
else
echo "ERROR: Failed to sign Database name. Please use the command <start-project {DATABASE}>"
exit 1 # terminate and indicate error
fi
