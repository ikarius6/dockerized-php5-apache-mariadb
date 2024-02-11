# Use the official PHP 5.6 image
FROM php:5.6-apache

# Install required PHP extensions
RUN docker-php-ext-install -j$(nproc) mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Enable SSL
#RUN a2enmod ssl
#RUN a2ensite default-ssl
#RUN openssl req -subj '/CN=localhost/O=My Company Name LTD./C=US' -new -newkey rsa:2048 -days 365 -nodes -x509 -keyout /etc/ssl/private/ssl-cert-snakeoil.key -out /etc/ssl/certs/ssl-cert-snakeoil.pem
#COPY apache-config.conf /etc/apache2/sites-available/000-default.conf
# EXPOSE 443

# Use your custom mariadb/php confs
COPY my.cnf /etc/mysql/my.cnf
COPY php.ini /usr/local/etc/php/php.ini

RUN service apache2 restart
EXPOSE 80
