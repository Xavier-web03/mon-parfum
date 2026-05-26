FROM webdevops/php-nginx:8.2

ENV WEB_DOCUMENT_ROOT=/app/public
ENV WEB_PORT=$PORT

WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY . .

RUN composer run-script post-autoload-dump || true
RUN chmod -R 775 storage bootstrap/cache
RUN php artisan storage:link || true
RUN php artisan config:cache || true
RUN php artisan route:cache || true
RUN php artisan view:cache || true

RUN php artisan migrate --force || true

CMD php artisan migrate --force && php artisan serve --host=0.0.0.0 --port=$PORT
