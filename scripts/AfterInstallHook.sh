#!/bin/bash
set -e
cd /opt/bitnami/projects/appapi
ls
# sudo cp /opt/bitnami/projects/appapi/scripts/appapi-vhost.conf /opt/bitnami/apache2/conf/vhosts/
sudo chown -R daemon:daemon /opt/bitnami/projects/appapi/storage/**/*
sudo chmod -R 777 /opt/bitnami/projects/appapi/
/opt/bitnami/php/bin/php artisan migrate --force
/opt/bitnami/php/bin/php artisan db:seed
/opt/bitnami/php/bin/php artisan update:permissions
/opt/bitnami/php/bin/php artisan update:districts
/opt/bitnami/php/bin/php artisan scribe:generate
sudo /opt/bitnami/ctlscript.sh restart apache
