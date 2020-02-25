#!/usr/bin/bash
# copy bootstrap
mkdir web/themes/custom/rgb/bootstrap
mkdir web/themes/custom/rgb/bootstrap/fonts
mkdir web/themes/custom/rgb/bootstrap/less
mkdir web/themes/custom/rgb/bootstrap/js
cp -r vendor/twbs/bootstrap/fonts/* web/themes/custom/rgb/bootstrap/fonts
cp -r vendor/twbs/bootstrap/less/* web/themes/custom/rgb/bootstrap/less
cp -r vendor/twbs/bootstrap/js/* web/themes/custom/rgb/bootstrap/js