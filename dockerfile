# Usa una imagen base de PHP con Apache
FROM php:8.0-apache

# Instala las extensiones necesarias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia el contenido de tu aplicación al contenedor
COPY . .

# Instala Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Instala las dependencias de Composer
RUN composer install --optimize-autoloader --no-dev

# Expone el puerto 80
EXPOSE 80

# Comando por defecto
CMD ["apache2-foreground"]
