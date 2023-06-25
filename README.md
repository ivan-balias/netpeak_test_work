## Запуск бекенду

#### `cd backend/`
#### `docker-compose -f docker-compose.dev.yml up --build`
#### `docker-compose exec backend_php-fpm_1 php artisan migrate`
#### `docker-compose exec backend_php-fpm_1 php artisan db:seed`

### Тестування 
#### `php artisan test`

## Запуск фронтенду

#### `cd frontend/`
#### `npm run start`
