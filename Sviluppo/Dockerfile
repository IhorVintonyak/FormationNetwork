# Usa l'immagine ufficiale PHP con Apache
FROM php:8.2-apache

# Installa le estensioni necessarie
RUN docker-php-ext-install pdo pdo_mysql

# Abilita mod_rewrite (utile per routing, anche futuro)
RUN a2enmod rewrite

# Copia i file del progetto nella cartella root del server Apache
COPY ./ /var/www/html/

# Imposta i permessi
RUN chown -R www-data:www-data /var/www/html

# Espone la porta 80
EXPOSE 80