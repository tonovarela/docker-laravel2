
FROM php:8.1-apache 
ENV APACHE_SERVERNAME localhost
# Instalar dependencias adicionales de PHP
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    nodejs \
    npm \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \          
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql zip
    

# Habilitar el módulo de reescritura de Apache
RUN a2enmod rewrite


ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

COPY . /var/www/html/
COPY --from=composer /usr/bin/composer /usr/bin/composer


ENV COMPOSER_ALLOW_SUPERUSER =1
WORKDIR /var/www/html/





# RUN npm install

# Establecer los permisos adecuados en los archivos de la aplicación
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Comando por defecto para iniciar el servidor web
 RUN composer install

 RUN npm install



#CMD ["apache2-foreground" ]






