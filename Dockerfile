FROM php:8.1-apache
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
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf