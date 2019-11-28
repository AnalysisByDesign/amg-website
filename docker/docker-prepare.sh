#!/bin/bash

docker-compose exec app npm install
docker-compose exec app npm update
docker-compose exec app composer install
docker-compose exec app composer update

docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate --step --seed

