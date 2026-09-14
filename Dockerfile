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
    && pecl install swoole \
    && docker-php-ext-enable swoole \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader
RUN mkdir -p storage/framework/cache \
    storage/framework/sessions \
    storage/framework/views \
    bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

CMD php artisan octane:start --server=swoole --host=0.0.0.0 --port=$PORT
