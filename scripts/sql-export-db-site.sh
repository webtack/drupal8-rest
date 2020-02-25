#!/usr/bin/bash
cd web/
drush cr
drush sql-dump > ../config/database/db-site.sql
cd ..
