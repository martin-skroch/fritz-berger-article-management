FROM php:8.4-apache

# Install git
RUN apt-get update && apt-get install -y zip unzip git

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Apache-Konfiguration überschreiben
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf && \
    sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}/../!g' /etc/apache2/apache2.conf

# Install composer
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

# Set working directory and permissions
WORKDIR /var/www/html

# Set recommended PHP config
# COPY php.ini /usr/local/etc/php/

# Optional: Enable error reporting in development
