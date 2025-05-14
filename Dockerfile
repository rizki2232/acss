FROM php:8.2-fpm

WORKDIR /var/www

# Install dependencies untuk ekstensi PHP yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libicu-dev \
    zip unzip git curl \
    && docker-php-ext-install pdo pdo_mysql intl zip

# Copy semua file project ke dalam container
COPY . .

# Install Composer dan dependency project
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer install
