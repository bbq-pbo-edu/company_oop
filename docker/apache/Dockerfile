FROM php:8.3-apache

RUN    docker-php-ext-install  pdo pdo_mysql
COPY project.conf /etc/apache2/sites-available
RUN a2ensite project.conf
RUN a2enmod rewrite