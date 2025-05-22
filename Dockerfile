FROM php:8.3-fpm

# Install dependencies dan ekstensi sistem
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip unzip git curl libicu-dev \
    mariadb-client \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd intl zip

# Install Node.js (LTS) dan npm
RUN curl -fsSL https://deb.nodesource.com/setup_lts.x | bash - && \
    apt-get install -y nodejs

# Verifikasi versi
RUN node -v && npm -v

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set workdir
WORKDIR /var/www

# Copy file Laravel ke container
COPY . .

# Install dependensi Laravel
RUN composer install

# Install frontend (opsional)
RUN if [ -f package.json ]; then npm install && npm run build; fi

# # Set permission
# RUN chown -R www-data:www-data /var/www \
#     && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Laravel setup: .env, key generate, migrate fresh with seed
# RUN cp .env.example .env && \
#     php artisan key:generate

CMD php artisan serve --host=0.0.0.0 --port=8000
