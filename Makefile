# AnalyseMy.Golf — Old Site (amg-website)
# Usage: make <target>

COMPOSE = docker compose -f docker/docker-compose.yml
APP     = $(COMPOSE) exec amg-app

.PHONY: help up down build logs shell status \
        spark-auth composer-install composer-update \
        key migrate seed migrate-seed fresh db-reset \
        npm-build npm-prod tinker mysql

help:
	@echo ""
	@echo "  AnalyseMy.Golf — Old Site"
	@echo ""
	@echo "  FIRST TIME SETUP:"
	@echo "    1. cp website/.env.example website/.env"
	@echo "    2. make build"
	@echo "    3. make up"
	@echo "    4. make spark-auth       ← enter Spark email + token when prompted"
	@echo "    5. make composer-update  ← regenerates lock file, installs deps"
	@echo "    6. make key"
	@echo "    7. make migrate-seed"
	@echo ""
	@echo "  DAILY COMMANDS:"
	@echo "    make up          Start all containers"
	@echo "    make down        Stop all containers"
	@echo "    make logs        Tail container logs"
	@echo "    make shell       Shell into PHP app container"
	@echo "    make migrate     Run migrations"
	@echo "    make seed        Run database seeders"
	@echo "    make fresh       Drop all tables, re-migrate, re-seed"
	@echo "    make npm-build   Compile frontend assets"
	@echo ""
	@echo "  URLS:"
	@echo "    App:        http://localhost:8080"
	@echo "    phpMyAdmin: http://localhost:8095"
	@echo ""

up:
	$(COMPOSE) up -d

down:
	$(COMPOSE) down

build:
	$(COMPOSE) build --no-cache

logs:
	$(COMPOSE) logs -f

status:
	$(COMPOSE) ps

shell:
	$(APP) bash

# Configure Spark private repo credentials inside the container.
# Get your token from: https://spark.laravel.com/dashboard
spark-auth:
	@echo ""
	@echo "  Enter your Laravel Spark credentials."
	@echo "  Token is at: https://spark.laravel.com/dashboard"
	@echo ""
	@read -p "  Spark email: " email; \
	 read -p "  Spark token: " token; \
	 $(APP) composer config http-basic.spark.laravel.com $$email $$token
	@echo ""
	@echo "  ✓ Spark auth saved. Run: make composer-update"
	@echo ""

# First-time install: regenerates lock file for current PHP version + pulls Spark.
composer-update:
	$(APP) composer update --no-interaction --prefer-dist

# Subsequent installs (after lock file is committed and up to date).
composer-install:
	$(APP) composer install --no-interaction

key:
	$(APP) php artisan key:generate

migrate:
	$(APP) php artisan migrate --force

seed:
	$(APP) php artisan db:seed --force

migrate-seed: migrate seed

fresh:
	$(APP) php artisan migrate:fresh --seed --force

# Drop and recreate the whole DB (handles views/procedures that migrate:fresh misses)
db-reset:
	docker exec amg-db mysql -uroot -psecret -e "DROP DATABASE amg_master; CREATE DATABASE amg_master CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
	$(APP) php artisan migrate --force
	$(APP) php artisan db:seed --force

npm-build:
	$(APP) bash -c "NODE_OPTIONS=--openssl-legacy-provider npm install && NODE_OPTIONS=--openssl-legacy-provider npm run dev"

npm-prod:
	$(APP) bash -c "NODE_OPTIONS=--openssl-legacy-provider npm install && NODE_OPTIONS=--openssl-legacy-provider npm run production"

tinker:
	$(APP) php artisan tinker

# Connect directly to MySQL
mysql:
	docker exec -it amg-db mysql -uhomestead -psecret amg_master
