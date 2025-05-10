FROM jenkins/jenkins:lts

USER root

# Install PHP 8.2, Composer, dan ekstensi yang dibutuhkan
RUN apt-get update && apt-get install -y \
    php8.2 \
    php8.2-cli \
    php8.2-mbstring \
    php8.2-xml \
    php8.2-curl \
    php8.2-zip \
    php8.2-intl \
    php8.2-mysql \
    php8.2-bcmath \
    php8.2-soap \
    unzip \
    curl \
    git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Pastikan Composer bisa dijalankan
RUN composer --version

USER jenkins
