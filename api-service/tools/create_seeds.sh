#!/usr/bin/env bash 

php artisan iseed users
php artisan iseed giphies
php artisan iseed tags
php artisan iseed giphy_tag

# php artisan migrate:fresh --seed

