FROM php:7.4-apache

WORKDIR /var/www/html

# Mod Rewrite
RUN a2enmod rewrite

RUN apt-get update -y && apt-get install -y libicu-dev libpq-dev unzip zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql

RUN docker-php-ext-install gettext intl pdo pdo_pgsql