FROM php:7.4-fpm
# RUN  apk update && apk upgrade
RUN  apt-get update;
RUN apt-get install nano;
RUN  apt-get install -y libicu-dev zlib1g-dev g++;
RUN  docker-php-ext-install mysqli
RUN  docker-php-ext-install intl
RUN  docker-php-ext-install pdo_mysql

