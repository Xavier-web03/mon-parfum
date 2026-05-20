FROM webdevops/php-nginx:8.2

# Dossier de travail
WORKDIR /app

# Copier uniquement composer.json pour accélérer le cache
COPY composer.json composer.lock ./

# Installer les dépendances PHP
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

# Copier le reste du projet
COPY . .

# Donner les permissions nécessaires
RUN chmod -R 775 storage bootstrap/cache

# Lier le storage
RUN php artisan storage:link || true

# Optimiser Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache

# Exécuter les migrations (si possible)
RUN php artisan migrate --force || true

# Exposer le port
EXPOSE 80

# Nginx + PHP-FPM démarrent automatiquement dans cette image
