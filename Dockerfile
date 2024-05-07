# Usar una imagen base de PHP
FROM php:8.1-apache

ENV APACHE_SERVERNAME localhost

# Instalar dependencias adicionales de PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite

# Instala composer
#RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
#RUN composer install --no-dev

# Copiar los archivos de la aplicación Laravel al contenedor
COPY . /var/www/html/

#RUN composer install
# Establecer los permisos adecuados en los archivos de la aplicación
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

#RUN apt-get install node
#RUN npm install
# Exponer el puerto 80
EXPOSE 80

# Comando por defecto para iniciar el servidor web
CMD ["apache2-foreground"]

