FROM php:7.2-fpm

RUN apt-get update && apt-get install -y gnupg \
  && curl -sL https://deb.nodesource.com/setup_9.x | bash -

RUN apt-get install -y \
  libmcrypt-dev libmagickwand-dev \
  mysql-client gnupg wget nodejs unzip \
  --no-install-recommends

RUN pecl install imagick

RUN docker-php-ext-enable imagick \
  && docker-php-ext-install mbstring pdo_mysql xml pcntl gd soap zip

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
  && php -r "if (hash_file('SHA384', 'composer-setup.php') === '48e3236262b34d30969dca3c37281b3b4bbe3221bda826ac6a9a62d6444cdb0dcd0615698a5cbe587c3f0fe57a54d8f5') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;" \
  && php composer-setup.php \
  && php -r "unlink('composer-setup.php');" \
  && mv composer.phar /usr/local/bin/composer

# Additional options we can install through docker-php-ext-install are --
# bcmath bz2 calendar ctype curl dba dom enchant exif fileinfo filter ftp gd gettext gmp hash iconv imap interbase intl json ldap mbstring mysqli oci8 odbc opcache pcntl pdo pdo_dblib pdo_firebird pdo_mysql pdo_oci pdo_odbc pdo_pgsql pdo_sqlite pgsql phar posix pspell readline recode reflection session shmop simplexml snmp soap sockets sodium spl standard sysvmsg sysvsem sysvshm tidy tokenizer wddx xml xmlreader xmlrpc xmlwriter xsl zend_test zip
