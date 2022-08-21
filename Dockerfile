FROM php:8.0-apache
RUN apt-get update \
&& apt-get install -y \
g++ \
libicu-dev \
libpq-dev \
libzip-dev \
libcurl4-openssl-dev \
pkg-config \
libssl-dev \
zip \
zlib1g-dev \
&& docker-php-ext-install \
intl \
opcache \
pdo \
pdo_mysql \
mysqli
RUN a2enmod rewrite
