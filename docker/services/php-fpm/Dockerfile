FROM php:5.6-fpm

MAINTAINER "Christoph Kluge" <work@christoph-kluge.eu>

RUN /usr/sbin/adduser -u 1000 --disabled-password --gecos "" development

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libmcrypt-dev \
        zlib1g-dev \
    && apt-get clean \
    && apt-get autoclean

RUN docker-php-ext-install mbstring mcrypt pdo_mysql && \
    pecl install xdebug && \
    pecl clear-cache

COPY config/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY conf.d/*.ini /usr/local/etc/php/conf.d/