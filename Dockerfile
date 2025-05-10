FROM jenkins/jenkins:lts

USER root

# Install PHP 8.2, Composer, dan ekstensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    && docker-php-ext-install zip intl


# Pastikan Composer bisa dijalankan
RUN composer --version

USER jenkins
