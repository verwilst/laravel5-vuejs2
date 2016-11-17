## Initial setup

> docker run -it --rm -v $(pwd):/app -w /app verwilst/npm install

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli composer install

## How to run

> docker run --name myproject -it -d -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

> docker run --name myproject-gulp -it -d -v $(pwd):/app -w /app verwilst/gulp watch

## When MongoDB is needed

> docker run --name mongo -v $(pwd):/app -d mongo

> docker run --name myproject -it -d --link mongo:mongo -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MongoDB console is as easy as calling:

> docker exec -it mongo mongo admin

