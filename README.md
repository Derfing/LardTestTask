Steps for reproduce via docker

git clone https://github.com/your-repo/laravel-docker.git
cd laravel-docker
cp .env.example .env
docker-compose up -d --build
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --seed
