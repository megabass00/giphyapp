#!/usr/bin/env bash 

composer install

if [[ ! -f ./.env ]]; then
    #cp ./.env.example ./.env
    php artisan key:generate
fi

php artisan migrate:fresh --seed
php artisan storage:link

chmod -R 775 storage
chmod -R 775 bootstrap/cache