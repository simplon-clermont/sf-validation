# Validators in Symfony
A simple SF 4.4 example to show how to use validators with either entities or forms.

## Requirements

[Composer](https://getcomposer.org/) is needed to install Symfony components.

A MySQL server with a user allowed to create a database (or a user with access to an existing database).

## Installation

    $> git clone https://github.com/simplon-clermont/sf-validation.git <directory>
    $> cd <directory>
    $> composer install
    $> echo "DATABASE_URL=mysql://<db_username>:<db_password>@127.0.0.1:3306/<db_database>" > .env.local
    $> php bin/console doctrine:database:create
    $> php bin/console doctrine:migrations:migrate

Then go to `http://<your-server>/<directory>/public/newsletter/subscribe`

## Background

This example was build using the following commands:
* `symfony new --version=lts --full`
* `php bin/console doctrine:database:create`
* `php bin/console make:entity`
* `php bin/console make:migration`
* `php bin/console doctrine:migration:migrate`
* `php bin/console make:controller`
* `php bin/console make:form`