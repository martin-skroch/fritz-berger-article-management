FROM php:8.4-apache

ENV CONTAINER_USER=fritz
ENV DOCUMENT_ROOT=/var/www/html/public

# Install dependencies
RUN apt-get update && apt-get install -y zip unzip git

# Install extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Apache-Konfiguration überschreiben
RUN sed -ri -e 's!/var/www/html!${DOCUMENT_ROOT}!g' /etc/apache2/sites-available/000-default.conf && \
    sed -ri -e 's!/var/www/!${DOCUMENT_ROOT}/../!g' /etc/apache2/apache2.conf

# Add group and user
RUN groupadd --force -g 1000 ${CONTAINER_USER} && \
    useradd -ms /bin/bash --no-user-group -g 1000 -u 1000 ${CONTAINER_USER}

# Install composer
COPY --from=composer:lts /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Set the user
USER ${CONTAINER_USER}
