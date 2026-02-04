FROM php:8.2-apache
# PHP'nin MySQL ile konuşabilmesi için gerekli eklentiyi kuruyoruz
RUN docker-php-ext-install pdo pdo_mysql
COPY index.php /var/www/html/