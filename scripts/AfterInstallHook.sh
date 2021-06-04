#!/bin/bash
set -e
cd /opt/bitnami/projects/appapi
ls
sudo cp /opt/bitnami/projects/appapi/scripts/appapi-vhost.conf /opt/bitnami/apache2/conf/vhosts/
sudo chown daemon:daemon /opt/bitnami/projects/appapi/storage/**/*
/opt/bitnami/php/bin/php artisan scribe:generate
/opt/bitnami/php/bin/php artisan migrate --force
sudo /opt/bitnami/ctlscript.sh restart apache
