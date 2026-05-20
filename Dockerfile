FROM webdevops/php-nginx:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV WEB_PORT=$PORT

WORKDIR /app

# Copier uniquement composer.json et composer.lock
COPY composer.json composer.lock ./

# Installer les dépendances SANS exécuter les scripts artisan
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

# Copier tout le projet
COPY . .

# Maintenant exécuter les scripts artisan
RUN composer run-script post-autoload-dump || true

# Permissions
RUN chmod -R 775 storage bootstrap/cache

# Storage link
RUN php artisan storage:link || true

# Optimisations Laravel
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

EXPOSE $PORT
