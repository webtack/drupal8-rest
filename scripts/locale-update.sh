#!/usr/bin/bash
chmod 775 web/sites/default/files/translations
cd web/
drush locale-check
drush locale-update
cd ..
