# Use an official PHP Apache runtime
FROM php:8.2-fpm

RUN apt-get update && apt-get install -y git
RUN apt-get update && apt-get install -y unzip
RUN apt-get update && apt-get install -y composer

# Install PostgreSQL client and its PHP extensions
RUN apt-get update \
    && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

# Set the working directory to /var/www/html
WORKDIR /var/www/html

# Copy the PHP code file in /app into the container at /var/www/html
COPY ../app .

RUN composer install

EXPOSE 80

CMD ["php", "artisan", "serve"]