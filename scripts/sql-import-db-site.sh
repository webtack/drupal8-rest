#!/usr/bin/bash
cd web/
drush sql-drop -y
drush sqlc < ../config/database/db-site.sql
drush cr
cd ..