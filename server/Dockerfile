FROM php:8.3-apache

# Abilita mod_rewrite per le URL pulite
RUN a2enmod rewrite

# Permetti l’uso dei file .htaccess nella directory del sito
RUN echo '<Directory /var/www/html>\n\
    AllowOverride All\n\
    Require all granted\n\
</Directory>' >> /etc/apache2/apache2.conf

# Imposta i permessi corretti (opzionale ma utile)
RUN chown -R www-data:www-data /var/www/html
