FROM composer AS composer
FROM php:8.2.21-fpm as php

LABEL maintainer="Artem Tsyhanov"

ARG WWWGROUP

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
# Install PHP extensions
RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions zip

RUN groupadd --force -g $WWWGROUP blog
RUN useradd -ms /bin/bash --no-user-group -g $WWWGROUP -u 1337 blog

COPY --from=composer /usr/bin/composer /usr/local/bin/composer

WORKDIR /app

RUN apt-get -y autoremove \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

FROM php as development

RUN apt-get update \
    && apt-get install -y --no-install-recommends git gosu

RUN install-php-extensions \
    xdebug

COPY ./dev-entrypoint.sh /usr/local/bin/entrypoint

ENTRYPOINT ["/usr/local/bin/entrypoint"]
