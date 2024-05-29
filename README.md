# setup

# backend
```bash
cd backend
composer update
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
php artisan serve
```
add this in .env file
```bash
APP_SECRET_KEY=secret_key_hehe_or_somn
```

# frontend
make sure u have installed vue cli
```bash
cd frontend
npm install
npm run serve
```
