FROM php:8.2-apache
LABEL maintainer="LeoGalda"

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
        zlib1g-dev \
        libicu-dev \
        libxml2-dev \
        libpq-dev
        
COPY --from=composer /usr/bin/composer /usr/bin/composer        

COPY  docker/000-default.conf /etc/apache2/sites-available/000-default.conf
COPY  docker/php.ini "$PHP_INI_DIR/php.ini"

ENV COMPOSER_ALLOW_SUPERUSER 1

COPY  . /var/www/html/
WORKDIR /var/www/html/

RUN chown -R www-data:www-data /var/www/html
RUN composer install