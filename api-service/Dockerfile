FROM php:7.2-apache

RUN apt-get update && apt-get install -y libmcrypt-dev git \ 
    mysql-client zip unzip libmagickwand-dev --no-install-recommends \ 
    && pecl install imagick \
    && pecl install mcrypt-1.0.1 \
    && pecl install xdebug \
    && docker-php-ext-enable imagick \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install pdo_mysql \
    && php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

RUN a2enmod rewrite && service apache2 restart

WORKDIR /var/www