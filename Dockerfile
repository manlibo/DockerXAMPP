FROM php:8.0.0-apache

ARG DEBIAN_FRONTEND=noninteractive

RUN apk add docker-php-ext-install mysqli
RUN apk update
RUN apk add libzip-dev
RUN apk add zlib1g-dev
RUN apk add docker-php-ext-install zip
RUN install a2enmond rewrite

