FROM webdevops/php-nginx:8.2

# Configurer Nginx pour écouter sur le port Render
ENV WEB_DOCUMENT_ROOT=/app/public
ENV WEB_PORT=$PORT

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist

COPY . .

RUN chmod -R 775 storage bootstrap/cache
RUN php artisan storage:link || true
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan view:cache
RUN php artisan migrate --force || true

EXPOSE $PORT
