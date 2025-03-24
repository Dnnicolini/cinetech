FROM php:8.4-apache

RUN docker-php-ext-install pdo pdo_mysql

RUN a2enmod rewrite

WORKDIR /var/www/html

COPY . /var/www/html

RUN chmod -R 777 /var/www/html/public/uploads

EXPOSE 80
