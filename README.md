# AnalyseMy.Golf — Old Site (Reference)

Laravel 6 + Laravel Spark app. Kept running locally as a reference during the new Laravel 12 rebuild.
**Do not develop on this codebase** — it is reference only.

---

## Prerequisites

- Docker Desktop running
- Apple Silicon Mac: already handled (`platform: linux/amd64` set in docker-compose)
- A Laravel Spark license token (from https://spark.laravel.com/dashboard)

---

## First-time setup

### 1. Copy the environment file
```bash
cp website/.env.example website/.env
```

### 2. Build the Docker images
```bash
make build
```
This compiles the PHP 7.4 + Node 18 image. Takes a few minutes on first run.

### 3. Start the containers
```bash
make up
```

Starts: PHP-FPM app, Nginx, MySQL 5.7, phpMyAdmin.

### 4. Configure Spark credentials
```bash
make spark-auth
```
You will be prompted for your Spark email and token. The token is found at:
**https://spark.laravel.com/dashboard** → API Token

### 5. Install PHP dependencies
```bash
make composer-install
```
Downloads all packages including `laravel/spark-aurelius` from the private Spark registry.

### 6. Generate app key
```bash
make key
```

### 7. Run migrations and seed the database
```bash
make migrate-seed
```
Creates all tables and loads fake data: 5 UK golf clubs, 12 players, 6 events, 72 rounds.

### 8. Build frontend assets
```bash
make npm-build
```

---

## The site is now running

| URL | What |
|-----|------|
| http://localhost:8080 | The app |
| http://localhost:8095 | phpMyAdmin (user: `homestead`, pass: `secret`) |

Log in with any seeded user — email format `firstname.lastname@example.com`, password `password`.

---

## Daily use (after first-time setup)

```bash
make up      # start containers
make down    # stop containers
make logs    # tail all logs
make shell   # bash into the PHP container
make mysql   # MySQL CLI
make fresh   # wipe DB and re-seed from scratch
```

Full command list: `make help`

---

## Troubleshooting

### `composer install` fails — lock file incompatible
The lock file was generated with Composer 1. The Dockerfile pins Composer 1.x (`--1` flag).
If you see this after a fresh `make build`, check the image rebuilt correctly:
```bash
make build   # force rebuild with --no-cache
make up
make composer-install
```

### MySQL won't start
Delete the data volume and let it reinitialise:
```bash
make down
rm -rf data/dbdata
make up
```

### Spark auth lost after container rebuild
Spark credentials are stored inside the container and lost on rebuild. Re-run:
```bash
make spark-auth
```

---

## What's in this repo

```
amg-website/
  Makefile              ← all commands live here
  README.md             ← you are here
  docker/
    docker-compose.yml
    configs/
      app.dockerfile    ← PHP 7.4-fpm + Node 18 + Composer 1.x
      web.dockerfile    ← Nginx 1.24
      vhost.conf        ← Nginx vhost → PHP-FPM
  website/              ← Laravel 6 application root
    .env.example        ← copy to .env before starting
    database/
      migrations/       ← 33 migration files
      seeds/            ← 6 seeders with realistic UK golf data
```
