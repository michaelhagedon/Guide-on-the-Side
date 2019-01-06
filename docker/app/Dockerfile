FROM php:7.0-apache
RUN requirements="libmcrypt-dev g++ libicu-dev libmcrypt4 libicu52 libpng-dev" \
    && apt-get update && apt-get install -y $requirements \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install mbstring \
    && docker-php-ext-install intl \
    && docker-php-ext-install gd \
    && requirementsToRemove="libmcrypt-dev g++ libicu-dev" \
    && apt-get purge --auto-remove -y $requirementsToRemove \
    && rm -rf /var/lib/apt/lists/*

RUN curl -sSL https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer \
    && apt-get update \
    && apt-get install -y zlib1g-dev git \
    && docker-php-ext-install zip \
    && apt-get purge -y --auto-remove zlib1g-dev \
    && rm -rf /var/lib/apt/lists/* \
    && echo  "log_errors = On " > /usr/local/etc/php/conf.d/php-errors.ini \
    && echo  "error_log = /dev/stderr" >> /usr/local/etc/php/conf.d/php-errors.ini

RUN echo `ls /var/www/html/`

RUN a2enmod rewrite

RUN usermod -u 1000 www-data
