FROM php:8.3-apache

# Instalar extensões do PHP necessárias
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

# Instalar mais extensões conforme necessário
RUN docker-php-ext-install pdo pdo_mysql

# Ativar módulos necessários
RUN a2enmod proxy proxy_fcgi rewrite

# Configurar diretório de trabalho
WORKDIR /var/www/html

# Usuário do Apache
RUN usermod -u 1000 www-data

# Permissões
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

# Expor porta
EXPOSE 80

# Iniciar Apache
CMD ["apache2-foreground"]