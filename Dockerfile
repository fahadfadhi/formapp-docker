# Use official PHP 8.1-fpm image (industry level, stable)
FROM php:8.1-fpm

# Install mysqli and other PHP extensions
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Copy application files to container
WORKDIR /var/www/html

COPY . .

# Set permissions (optional, depends on your setup)
RUN chown -R www-data:www-data /var/www/html

EXPOSE 9000

CMD ["php-fpm"]

