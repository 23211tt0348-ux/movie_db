FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libxml2-dev \
    libonig-dev \
    zip \
    unzip \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

RUN pecl install apcu \
    && docker-php-ext-enable apcu

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd mysqli

WORKDIR /var/www

COPY . /var/www

RUN chown -R www-data:www-data /var/www

CMD ["php-fpm"]

EXPOSE 9000
