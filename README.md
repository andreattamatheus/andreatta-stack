# Andreatta Stack

Personal website where I use to test different techniques and ideas.

## Screenshots

![App Screenshot](https://www.matheusandreatta.com/andreatta-stack/img/posts/img-github.png)

## Demo

Insert gif or link to demo

https://www.matheusandreatta.com/andreatta-stack/home

## DOCKER Installation

Just run the docker:

```bash
docker compose up -d
```

## LARAVEL Installation

Install Laravel dependencies using Composer - Build and optimize Laravel application files

```bash
composer install --no-interaction && php artisan optimize
```

Set permissions for storage and bootstrap folders in Laravel application directory

```bash
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap
```

Set permissions for the resources folder

```bash
chmod -R 777 /var/www/html/resources
```

Expose port 8000 for the Laravel application

```bash
php artisan key:generate
```

The app is running in the port 8000

## Running Tests

To run tests, run the following command

```bash
  php artisan test
```

## Environment Variables

To run this project, you will need to add the following environment variables to your .env file

All of them you can get in Github.
Follow the instruction to integrate with socialite.

-   `GITHUB_CLIENT_ID`
-   `GITHUB_CLIENT_SECRET`
-   `GITHUB_TOKEN`
-   `GITHUB_USERNAME`
-   `GITHUB_PASSWORD`

## Authors

-   [@andreattamatheus](https://www.github.com/andreattamatheus)
