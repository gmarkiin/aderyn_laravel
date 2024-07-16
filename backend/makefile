#!/usr/bin/make

# choco install make

.DEFAULT_GOAL := help

##@ Initialize work

init: ## Start a new development environment
	cp .env.example .env
	$(MAKE) dev
	@sleep 10
	$(MAKE) install
	$(MAKE) keys
	$(MAKE) migrate

##@ Docker actions

dev: ## Start containers detached
	docker compose up -d

keys: ## Generate secret keys
	docker compose exec nginx-aderyn_laravel bash -c "su -c 'php artisan key:generate' application"

logs: ## Show the output logs
	docker compose logs

log: ## Open the logs and follow the news
	docker compose logs --follow

restart: ## Restart the app container
	docker compose down
	docker compose up -d

up: ## Put the project UP
	docker compose up -d

down: ## Put the project DOWN
	docker compose down

unlog: ## Clear log file
	docker compose exec nginx-aderyn_laravel bash -c "echo '' > storage/logs/laravel.log"

tinker: ## Start tinker
	docker compose exec --user application nginx-aderyn_laravel bash -c "php artisan tinker"

##@ Bash shortcuts

bash: ## Enter bash nginx container
	docker compose exec --user application nginx-aderyn_laravel bash

nginx: ## Enter bash nginx container
	docker compose exec --user application nginx-aderyn_laravel bash

mysql: ## Enter bash mysql container
	docker compose exec mysql-aderyn_laravel bash

##@ Database tools

migration: ## Create migration file
	docker compose exec --user application nginx-aderyn_laravel bash -c "composer create-project laravel/laravel backend"

migrate: ## Perform migrations
	docker compose exec --user application nginx-aderyn_laravel php artisan migrate

fresh: ## Perform migrations
	docker compose exec --user application nginx-aderyn_laravel php artisan migrate:fresh

rollback: ## Rollback migration
	docker compose exec --user application nginx-aderyn_laravel php artisan migrate:rollback

backup: ## Export database
	docker compose exec mysql-aderyn_laravel bash -c "/var/www/app/.scripts/backup.sh"

##@ Composer

install: ## Composer install dependencies
	docker compose exec nginx-aderyn_laravel bash -c "su -c \"composer install\" application"

update: ## Composer install dependencies
	docker compose exec --user application nginx-aderyn_laravel bash -c "composer update"

autoload: ## Run the composer dump
	docker compose exec --user application nginx-aderyn_laravel bash -c "composer dump-autoload"

##@ General commands

route: ## List the routes of the app
	docker compose exec --user application nginx-aderyn_laravel php artisan route:list
