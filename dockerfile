FROM php:8.2-apache
WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    libssl-dev \
    zlib1g-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_mysql mysqli

COPY . .

RUN chown -R www-data:www-data /var/www/html