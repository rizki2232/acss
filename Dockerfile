FROM jenkins/jenkins:lts

USER root

RUN apt-get update && apt-get install -y \
    php php-cli php-mbstring php-xml php-curl php-mysql unzip curl git \
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

USER jenkins
