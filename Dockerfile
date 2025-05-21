FROM php:8.3-fpm

# Install dependencies dan ekstensi sistem yang dibutuhkan
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    libicu-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Install Node.js (LTS) dan npm
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get install -y nodejs

# Verifikasi versi
RUN node -v && npm -v

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY . .

RUN composer install

# Install NPM dependencies (jika ada package.json)
RUN if [ -f package.json ]; then npm install; fi

# Laravel setup: .env, key generate, migrate fresh with seed
RUN cp .env.example .env && \
    php artisan key:generate && \
    npm run build && \
    docker compose up --build

CMD php artisan serve --host=0.0.0.0 --port=8000
