FROM php:7.4-fpm

RUN apt-get update && apt-get install -y \
    gnupg curl wget unzip git \
    libmcrypt-dev libpng-dev libmagickwand-dev \
    libzip-dev libonig-dev libxml2-dev \
    --no-install-recommends \
    && rm -rf /var/lib/apt/lists/*

# Install Node.js 18 LTS
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs

RUN pecl install imagick \
    && docker-php-ext-enable imagick

RUN docker-php-ext-install \
    mbstring pdo_mysql xml pcntl gd soap zip opcache

# Composer 1.x — Laravel 6 and its lock file predate Composer 2's plugin API changes.
# Several locked packages (ocramius/package-versions, jean85/pretty-package-versions)
# require composer-plugin-api ^1.0 which is incompatible with Composer 2.
RUN curl -sS https://getcomposer.org/installer | php -- --1 \
    && mv composer.phar /usr/local/bin/composer

WORKDIR /var/www
