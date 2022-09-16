# API

The API will be here.

Refer to the [Getting Started Guide](https://api-platform.com/docs/distribution) for more information.


# Command Tool

## Init APi platform
#[ApiResource]


## Creer entity
docker compose exec php bin/console make:entity

## Creer fixture
docker compose exec php composer require orm-fixtures --dev
docker compose exec php bin/console make:fix
docker compose exec php bin/console d:f:l -n (purge auto)


## Serialisation