FROM php:8.4.8-apache

COPY php30hr /var/www/html/
RUN docker-php-ext-install pdo_mysql
WORKDIR /var/www/html/
RUN chown -R www-data:www-data /var/www/html

CMD ["apache2-foreground"]