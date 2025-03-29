FROM php:8.4-fpm-alpine

ARG XDEBUG_VERSION=3.4.2
RUN apk add --no-cache --virtual .build-deps \
       ${PHPIZE_DEPS} linux-headers \
    && pecl install xdebug-${XDEBUG_VERSION} || { echo "XDebug installation failed!"; exit 1; }

COPY config/php.ini /usr/local/etc/php/php.ini
COPY config/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

RUN mkdir -p /var/log/php-fpm && \
    chown -R www-data:www-data /var/log/php-fpm && \
    chmod -R 755 /var/log/php-fpm

RUN apk del -f .build-deps \
    && rm -rf /tmp/pear

COPY config/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

WORKDIR /app
