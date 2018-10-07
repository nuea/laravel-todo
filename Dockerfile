FROM php:7.2.2-fpm

RUN apt-get update -y && apt-get install -y libmcrypt-dev openssl git unzip zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install pdo mbstring

RUN mkdir /app

COPY . /app

WORKDIR /app

RUN composer install

RUN php artisan migrate