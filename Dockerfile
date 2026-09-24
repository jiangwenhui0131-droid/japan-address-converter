FROM php:8.2-cli

RUN apt-get update && apt-get install -y \
    git \
    unzip \
    build-essential \
    autoconf \
    libsqlite3-dev \
    libzip-dev \
    libonig-dev \
    mecab \
    mecab-ipadic-utf8 \
    libmecab-dev \
    && docker-php-ext-install \
    pdo_sqlite \
    zip \
    mbstring \
    && git clone --depth 1 https://github.com/nihongodera/php-mecab.git /tmp/php-mecab \
    && cd /tmp/php-mecab/mecab \
    && phpize \
    && ./configure \
        --with-php-config=/usr/local/bin/php-config \
        --with-mecab=/usr/bin/mecab-config \
    && make -j"$(nproc)" \
    && make install \
    && docker-php-ext-enable mecab \
    && rm -rf /tmp/php-mecab \
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

CMD ["sh", "-c", "php artisan serve --host=0.0.0.0 --port=${PORT:-10000}"]