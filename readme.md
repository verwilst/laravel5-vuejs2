## Initial setup

> docker run -it --rm -v `pwd`:/app -w /app verwilst/npm install

> docker run -it --rm -v `pwd`:/app -w /app verwilst/php7-cli composer install

> docker run -it --rm -v `pwd`:/app -w /app -p 8000:8000 verwilst/php7-cli php artisan key:generate

## How to run

> docker run --rm -it -v `pwd`:/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

> docker run --rm -it -v `pwd`:/app -w /app verwilst/gulp watch

## When MongoDB is needed

docker run --name mongo -d mongo

> docker run --rm -it --link mongo:mongo -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MongoDB console is as easy as calling:

> docker exec -it mongo mongo admin

