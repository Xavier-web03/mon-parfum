FROM php:8.2-fpm

# Installer les dépendances système
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    zip \
    libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql zip

# Installer Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Dossier de travail
WORKDIR /app

# Copier le projet
COPY . .

# Installer les dépendances Laravel
RUN composer install --no-dev --optimize-autoloader

# Mettre en cache la config
RUN php artisan config:cache

# Créer le lien storage
RUN php artisan storage:link || true

# Donner les permissions nécessaires
RUN chmod -R 775 storage bootstrap/cache

# Exécuter automatiquement les migrations (Render Free)
RUN php artisan migrate --force || true

# Lancer PHP-FPM (PAS php artisan serve)
CMD ["php-fpm"]
