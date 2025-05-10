FROM jenkins/jenkins:lts

USER root

# Install tools dan PHP 8.3 + Composer
RUN apt-get update && apt-get install -y \
    curl \
    php8.3 \
    php8.3-cli \
    php8.3-mbstring \
    php8.3-xml \
    php8.3-zip \
    php8.3-intl \
    php8.3-curl \
    php8.3-mysql \
    unzip \
    git \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Cek versi
RUN php -v && composer --version

USER jenkins
