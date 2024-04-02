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


# Install Symfony CLI
RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

# Set working directory
WORKDIR /app
COPY docker-entrypoint.sh /usr/local/bin/

# Set entrypoint script as executable
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 8001 for Symfony server
EXPOSE 8001
# Entry point
ENTRYPOINT ["docker-entrypoint.sh"]
