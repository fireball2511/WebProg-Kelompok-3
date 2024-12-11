
# Use the official PHP image with Laravel support
FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y     git     unzip     libpq-dev     libzip-dev     && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy all project files to container
COPY . .

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set permissions for storage and bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Expose application port
EXPOSE 8000

# Run Laravel using PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
