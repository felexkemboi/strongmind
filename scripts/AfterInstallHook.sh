#!/bin/bash
set -e
cd /opt/bitnami/projects/appapi
ls
sudo cp /opt/bitnami/projects/appapi/scripts/appapi-vhost.conf /opt/bitnami/apache2/conf/vhosts/
sudo chown -R daemon:daemon /opt/bitnami/projects/appapi/storage/**/*
sudo chmod -R 777 /opt/bitnami/projects/appapi/
/opt/bitnami/php/bin/php artisan migrate --force
sudo /opt/bitnami/ctlscript.sh restart apache
