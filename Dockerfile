FROM php:8.2-cli

# Cài các extension cần thiết
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql

# Cài Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy toàn bộ project vào container
WORKDIR /app
COPY . .

# Cài dependencies
RUN composer install --no-dev --optimize-autoloader

# Copy file .env
COPY .env.example .env

# Generate APP_KEY
RUN php artisan key:generate

# Mở port
EXPOSE 8000

# Chạy server
CMD php artisan serve --host=0.0.0.0 --port=$PORT