FROM node:12.13.0-alpine as node
FROM php:7.4.1-fpm-alpine

COPY ./docker/php/php.ini /usr/local/etc/php/php.ini
COPY --from=composer:2.0 /usr/bin/composer /usr/bin/composer

RUN apk update \
    && apk add \
    git \
    zip \
    unzip \
    vim \
    autoconf \
    build-base \
    && docker-php-ext-install pdo_mysql bcmath \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk add --no-cache --virtual g++
RUN apk add --no-cache libstdc++ && apk add --no-cache libgcc

COPY --from=node /usr/local/bin/node /usr/local/bin/
COPY --from=node /usr/local/lib/node_modules/ /usr/local/lib/node_modules/

RUN ln -s /usr/local/bin/node /usr/local/bin/nodejs \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npm \
    && ln -s /usr/local/lib/node_modules/npm/bin/npm-cli.js /usr/local/bin/npx

WORKDIR /var/www/html

# npmのエラーはこちらで解決:http://hpscript.com/blog/docker%E3%81%AEphp-node%E3%83%9E%E3%83%AB%E3%83%81%E3%83%93%E3%83%AB%E3%83%89%E3%81%A7symbol-not-found/
# 参考にしたページ：https://yutaro-blog.net/2021/04/29/docker-laravel-vuejs-2/