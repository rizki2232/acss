FROM php:8.3-fpm

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libicu-dev \
    && docker-php-ext-install pdo pdo_mysql zip intl

COPY . .

RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer && \
    composer install

CMD php artisan serve --host=0.0.0.0 --port=8010
