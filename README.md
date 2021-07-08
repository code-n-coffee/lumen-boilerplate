## Lumen Boilerplate

Quick start developing with lumen + session

```
docker-compose up
docker-compose exec php bash
cp .env.example .env
composer install
chmod -R 777 storage
php artisan migrate
php artisan db:seed
```

http://localhost/ # version
http://localhost/protected # session protected endpoint example
http://localhost/auth # session authentication example
