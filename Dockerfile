FROM php:8.2-apache

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Set the working directory
WORKDIR /var/www/html

# Install dependencies for PHP extensions and system tools
RUN apt-get update && apt-get install -y \
    git curl unzip zip sqlite3 libzip-dev libpq-dev libsqlite3-dev \
    && docker-php-ext-configure zip \
    && docker-php-ext-install pdo pdo_sqlite zip

# Install Composer globally
RUN curl -sS https://getcomposer.org/installer | php && \
    mv composer.phar /usr/local/bin/composer

# Copy the project files into the container
COPY . .

# Copy the Apache config
COPY apache.conf /etc/apache2/sites-available/000-default.conf

RUN touch /var/www/html/database/database.sqlite && \
    chown -R www-data:www-data /var/www/html/database

# After copying the Laravel project
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 775 storage bootstrap/cache

# Install PHP dependencies with Composer
RUN composer install --no-dev --no-interaction --optimize-autoloader

# Set permissions (optional but recommended)
RUN chown -R www-data:www-data /var/www/html && \
    chmod -R 755 /var/www/html

# Copy the entrypoint script
COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN chmod +x /usr/local/bin/entrypoint.sh

# Use the script as the container entrypoint
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]

    
# Expose Apache port
EXPOSE 80
