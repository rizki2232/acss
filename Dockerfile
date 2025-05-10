FROM jenkins/jenkins:lts

USER root

# Tambah repository PHP 8.3 (ondrej/php) lalu install PHP 8.3 + ekstensi + Composer
RUN apt-get update && apt-get install -y \
    software-properties-common curl unzip git \
    && add-apt-repository ppa:ondrej/php -y \
    && apt-get update && apt-get install -y \
    php8.3 \
    php8.3-cli \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-zip \
    php8.3-intl \
    php8.3-curl \
    php8.3-mysql \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cek versi PHP & Composer
RUN php -v && composer --version

USER jenkins
