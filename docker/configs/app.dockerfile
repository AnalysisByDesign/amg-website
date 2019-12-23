FROM php:7.2-fpm

RUN apt-get update && apt-get install -y gnupg \
  && curl -sL https://deb.nodesource.com/setup_9.x | bash -

RUN apt-get install -y \
  libmcrypt-dev libmagickwand-dev \
  gnupg wget nodejs unzip \
  --no-install-recommends

RUN pecl install imagick

RUN docker-php-ext-enable imagick \
  && docker-php-ext-install mbstring pdo_mysql xml pcntl gd soap zip

RUN EXPECTED_SIGNATURE="$(wget -q -O - https://composer.github.io/installer.sig)" \
  && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && ACTUAL_SIGNATURE="$(php -r "echo hash_file('sha384', 'composer-setup.php');")" \
  && if [ "$EXPECTED_SIGNATURE" != "$ACTUAL_SIGNATURE" ]; then echo 'ERROR: Invalid installer signature'; exit 1; fi \
  && php composer-setup.php --quiet \
  && rm composer-setup.php \
  && mv composer.phar /usr/local/bin/composer

# Additional options we can install through docker-php-ext-install are --
# bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv imap interbase intl json ldap mbstring mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline recode reflection session shmop simplexml snmp soap sockets sodium spl standard sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zend_test zip
