FROM composer:2.2.3 AS build

WORKDIR /app

COPY . .

RUN composer install --no-dev

FROM php:8.0.13-fpm

WORKDIR /app

COPY --from=build /app .

CMD ["php", "artisan", "serve", "--host", "0.0.0.0", "--port", "8080"]
