# Use the official PHP image with PHP 8.1
FROM php:8.1-cli

# Install required PHP extensions
RUN apt-get update \
    && apt-get install -y \
        libzip-dev \
        libpq-dev \
        libicu-dev \
        libonig-dev \
        libcurl4-openssl-dev \
        libxml2-dev \
        librabbitmq-dev \
    && docker-php-ext-install \
        mbstring \
        curl \
        xml \
        bcmath \
        intl \
    && pecl install amqp \
    && docker-php-ext-enable amqp
RUN docker-php-ext-install zip;

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /app
COPY ./composer.json composer.lock vendor symfony.lock /app/

# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Set working directory

# Entrypoint script
CMD ["php", "bin/console", "messenger:consume"]