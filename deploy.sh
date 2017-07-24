#!/usr/bin/env bash

echo "Create Supervisor log folder"
mkdir -p /var/log/supervisor

echo "Copying .worker.conf to /etc/supervisor/conf.d/worker.conf"
sudo cp ./.worker.conf /etc/supervisor/conf.d/worker.conf

echo "Restart Supervisor config"
sudo supervisorctl reread
sudo supervisorctl update

echo "Restart Queue"
php artisan queue:restart