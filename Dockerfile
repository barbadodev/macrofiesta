# Usamos una imagen de PHP con Apache ya configurado
FROM php:8.2-apache

# Instalamos las librerías necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libpq-dev \
    zip \
    unzip \
    git \
    curl

# Habilitamos el módulo de reescritura de Apache para las rutas de Laravel
RUN a2enmod rewrite

# Instalamos extensiones de PHP para base de datos (PostgreSQL)
RUN docker-php-ext-install pdo_pgsql pdo_mysql mbstring exif pcntl bcmath gd

# Instalamos Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiamos los archivos de la app al contenedor
WORKDIR /var/www/html
COPY . .

# Instalamos las dependencias de Laravel
RUN composer install --no-dev --optimize-autoloader

# Damos permisos a las carpetas de Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Cambiamos el DocumentRoot de Apache a la carpeta /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/htdocs!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Exponemos el puerto 80
EXPOSE 80