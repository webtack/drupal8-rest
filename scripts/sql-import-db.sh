#!/usr/bin/bash
cd web/
drush sql-drop -y
drush sqlc < ../config/database/db.sql
cd ..