FROM php:8.4-apache

RUN docker-php-ext-install pdo pdo_mysql

# Ativar módulos do Apache
RUN a2enmod rewrite headers

# Definir o DocumentRoot para a pasta public/
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Ajustar permissões
WORKDIR /var/www/html
COPY . /var/www/html
RUN chown -R www-data:www-data /var/www/html && chmod -R 755 /var/www/html
RUN chown -R www-data:www-data /var/www/html/public && chmod -R 755 /var/www/html/public

EXPOSE 80
