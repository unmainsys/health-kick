FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libmcrypt-dev \
        libpng-dev \
        libicu-dev \
        libpq-dev \
        libxpm-dev \
        libvpx-dev \
        zip \
        git \
        unzip \
        supervisor \
        nano \
        build-essential \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

RUN docker-php-ext-configure opcache --enable-opcache && docker-php-ext-install opcache

RUN pecl install apcu && docker-php-ext-enable apcu

RUN apt-get clean && pecl install redis && docker-php-ext-enable redis

### Dev only requirements
RUN apt-get update && apt-get install -y \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY --from=composer /usr/bin/composer /usr/bin/composer
### Dev only end

COPY www.conf /usr/local/etc/php-fpm.d/www.conf

COPY opcache.ini /usr/local/etc/php/conf.d/opcache.ini

COPY supervisord.conf /etc/supervisor/conf.d/supervisord.conf

WORKDIR /var/www

CMD ["/usr/bin/supervisord", "-c", "/etc/supervisor/conf.d/supervisord.conf"]

