SHELL := /bin/bash

setup-env:
	@bash ./.docker/bin/setup-env.sh || exit 1

setup-hosts:
	@sudo bash ./.docker/bin/setup-hosts.sh || exit 1

build:
	docker-compose build --no-cache $(ARGS)

composer-install:
	docker run --rm --interactive --tty \
     --user $(id -u):$(id -g) \
      --volume $(PWD):/app \
      composer install

setup: setup-env setup-hosts build composer-install

docker-up:
	docker-compose up -d

up: composer-install docker-up

docker-down:
	docker-compose down

composer-update:
	docker run --rm --interactive --tty \
     --user $(id -u):$(id -g) \
      --volume $(PWD):/app \
      composer update

composer:
	docker run --rm --interactive --tty \
     --user $(id -u):$(id -g) \
      --volume $(PWD):/app \
      composer $(ARGS)

console:
	docker exec -it php-fpm bin/console $(ARGS)