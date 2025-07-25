# Initialize

## Create the environment file

```bash
cp --update=none .env.example .env
```

Then change `DB_HOST`, `DB_NAME`, `DB_USERNAME`, and `DB_PASSWORD` according to your requirements.

## Setup

> **If you have installed php and mysql locally, please use this setup.**

Install composer dependencies:

```bash
composer install
```

Create database tables:

```bash
php install.php
```

Start the php webserver:
```bash
php -S localhost:8000 -t public/
```

Now open [http://localhost:8000](http://localhost:8000) in your preferred browser.

## Alternative: Setup via Docker

> **If you have installed Docker, please use this setup.**

```bash
docker compose up -d
```

```bash
docker compose exec -it app bash -c "composer install"
```

```bash
docker compose exec -it app bash -c "php install.php"
```

Now open [http://localhost:8000](http://localhost:8000) in your preferred browser.
