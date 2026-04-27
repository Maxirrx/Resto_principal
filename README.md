# Production
bien faire le .env (mettre le cache a null, )

docker compose up -d --build

docker compose exec app php artisan migrate:fresh --seed