# Production (sans Redis Commander)
docker compose up -d --build

# Dev (avec Redis Commander sur :8081)
docker compose --profile dev up -d --build

# Migrations
docker compose exec app php artisan migrate --force

# Vider le cache
docker compose exec app php artisan config:cache
docker compose exec app php artisan route:cache
docker compose exec app php artisan view:cache
