FROM php:8.2-fpm-alpine as php

RUN apk update && \
    apk add --no-cache \
        curl \
        zip \
        unzip \
        git \
        yarn && \
    docker-php-ext-install pdo pdo_mysql

COPY . /var/www/html/
WORKDIR /var/www/html

COPY .env.example /var/www/html/.env

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install

RUN chmod -R 777 .

RUN chown -R www-data:www-data .

RUN php artisan key:generate && php artisan storage:link && yarn

RUN yarn build