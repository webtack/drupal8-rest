#!/usr/bin/bash
cd web/
drush cim sync -y
drush cr
cd ..
