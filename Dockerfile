# PHP FPM
FROM php:8.2-fpm

# extensions
RUN apt-get update && apt-get install -y \
    libpq-dev libzip-dev unzip nginx supervisor \
    && docker-php-ext-install pdo pdo_mysql zip

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Laravel
WORKDIR /var/www/html
COPY . .
RUN composer install && chown -R www-data:www-data /var/www/html

# port
EXPOSE 9000

CMD ["php-fpm"]
