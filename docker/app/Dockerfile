FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    bash git curl zip unzip \
    libpq-dev oniguruma-dev libzip-dev \
    fcgi autoconf g++ make linux-headers

RUN docker-php-ext-install \
    pdo pdo_pgsql pgsql mbstring zip bcmath pcntl opcache

RUN pecl install redis \
    && docker-php-ext-enable redis \
    && rm -rf /tmp/pear


RUN apk del autoconf g++ make linux-headers

RUN echo "opcache.enable=1" >> /usr/local/etc/php/conf.d/opcache.ini

RUN sed -i 's|listen = 127.0.0.1:9000|listen = 9000|' /usr/local/etc/php-fpm.d/www.conf

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY composer.json composer.lock* ./

COPY . .

RUN chown -R www-data:www-data storage bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 9000

COPY entrypoint.sh /entrypoint.sh
RUN chmod +x /entrypoint.sh

ENTRYPOINT ["/entrypoint.sh"]

CMD ["php-fpm"]
