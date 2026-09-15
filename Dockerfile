FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libsqlite3-dev \
    libzip-dev \
    libonig-dev \
    && docker-php-ext-install \
    pdo_sqlite \
    zip \
    mbstring \
    && rm -rf /var/lib/apt/lists/*

# PHP upload settings
RUN printf "upload_max_filesize=128M\npost_max_size=128M\n" > /usr/local/etc/php/conf.d/uploads.ini

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN touch database/database.sqlite

RUN composer install --no-dev --optimize-autoloader --prefer-dist --no-progress --no-interaction

RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache

RUN chmod -R 777 storage bootstrap/cache

CMD php artisan serve --host=0.0.0.0 --port=${PORT:-10000}