FROM php:8.2-apache

# Installer les extensions PHP nécessaires
RUN docker-php-ext-install pdo_mysql

# Activer le module rewrite
RUN a2enmod rewrite

# Ajouter la configuration Apache pour permettre l'utilisation de .htaccess
RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/ s/AllowOverride None/AllowOverride All/' /etc/apache2/apache2.conf

# Copier le projet dans le conteneur
COPY . /var/www/html/

# Exposer le port 80
EXPOSE 80

# Démarrer Apache en premier plan
CMD ["apache2-foreground"]
