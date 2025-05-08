FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev zip unzip git curl sqlite3 \
    && docker-php-ext-install pdo pdo_sqlite zip

# Enable mod_rewrite for Apache and set the default DirectoryIndex
RUN a2enmod rewrite && \
    echo "DirectoryIndex public/index.php" >> /etc/apache2/apache2.conf

# Set the document root to the public directory
RUN sed -i 's|DocumentRoot /var/www/html|DocumentRoot /var/www/html/public|' /etc/apache2/sites-available/000-default.conf

# Copy Laravel app to the container
COPY . /var/www/html

# Set working directory to the Laravel root
WORKDIR /var/www/html

# Install Composer and Laravel dependencies
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Expose port 80
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
