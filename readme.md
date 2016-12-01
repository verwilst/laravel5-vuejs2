## Initial setup

Go into the webroot.

> docker run -it --rm -v $(pwd):/app -w /app verwilst/npm install

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli composer install

Make sure to chown all the data in your webroot to your own user, since docker sets ownership to added files to root.

> sudo chown verwilst: . -R

## How to run

### Initial steps

> docker run --name myproject -it -d -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

You can now open your browser on http://127.0.0.1:8000 .

The project is configured to support live reloading. The browser opens a websocket to port 35729, so make sure it's accessible:

> docker run --name myproject-gulp -it -d -v $(pwd):/app -p 35729:35729 -w /app verwilst/gulp watch

### Starting an existing app

> docker start mongo percona myproject myproject-gulp

( Leaving off mongo and/or percona if you didn't create those docker containers ofcourse. )

## When MongoDB is needed

> docker run --name mongo -d mongo

> docker run --name myproject -it -d --link mongo:mongo -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MongoDB console is as easy as calling:

> docker exec -it mongo mongo admin

In your app (.env, ... ), use 'mongo' as hostname for the Mongo server.

## When MySQL/Percona is needed

> docker run --name percona -e MYSQL_ALLOW_EMPTY_PASSWORD=true -d percona

> docker run --name myproject -it -d --link percona:percona -v $(pwd):/app -w /app -p 8000:8000 verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MySQL console is as easy as calling:

> docker exec -it percona mysql

In your app (.env, ... ), use 'percona' as hostname for the MySQL server.

