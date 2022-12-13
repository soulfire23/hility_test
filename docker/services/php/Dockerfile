FROM php:8.1-fpm-alpine

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache $PHPIZE_DEPS \
        libzip-dev \
        zip \
        bzip2-dev \
        freetype-dev \
        imagemagick-dev \
        libwebp-dev \
        libpng-dev \
        libjpeg-turbo-dev \
        zlib-dev \
        && pecl install xdebug imagick \
        && docker-php-ext-install pdo pdo_mysql zip bz2 gd exif \
        && docker-php-ext-enable zip bz2 xdebug gd imagick \
        && docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg --with-webp \
        && rm -rf /tmp/* \
