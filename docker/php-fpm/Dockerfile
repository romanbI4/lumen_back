FROM php:8.1-fpm

COPY wait-for-it.sh /usr/bin/wait-for-it

RUN chmod +x /usr/bin/wait-for-it

RUN apt-get update && \
    apt-get install -y --no-install-recommends libssl-dev zlib1g-dev curl git unzip netcat libxml2-dev libpq-dev libzip-dev && \
    pecl install apcu && \
    docker-php-ext-install pdo && docker-php-ext-enable pdo && \
    docker-php-ext-install -j$(nproc) zip opcache intl pdo_pgsql pgsql && \
    apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* &&  \
    docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql && \
    docker-php-ext-enable apcu pdo_pgsql sodium

COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www