#!/usr/bin/bash
cp config/settings/settings-dev.php web/sites/default/settings.php
cp config/settings/settings.local.php web/sites/default/
rm web/sites/development.services.yml
cp config/settings/development.services.yml web/sites/
chmod 644 web/sites/default/settings.php
chmod 644 web/sites/development.services.yml