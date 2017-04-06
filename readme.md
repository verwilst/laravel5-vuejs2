## Initial setup

Go into the webroot.

> docker run -it --rm -v $(pwd):/app -w /app verwilst/npm install

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli composer install

> cp -f .env.example .env

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli php artisan key:generate

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli php artisan jwt:secret

> docker run -it --rm -v $(pwd):/app -w /app verwilst/php7-cli php artisan l5-swagger:publish-assets

Make sure to chown all the data in your webroot to your own user, since docker sets ownership to added files to root.

> sudo chown $(id -un): . -R

## How to run

### Initial steps

> docker run --name myproject -it -d -v $(pwd):/app -w /app verwilst/php7-cli php artisan serve --host=0.0.0.0


The project is configured with Browsersync. Gulp watch creates a proxy that points to our myproject container, so we need to link to it. 
This also compiles app.css and app.js under public/{css,js}:

> docker run --name myproject-watch -it -d -v $(pwd):/app --link myproject:web -p 3000:3000 -w /app verwilst/npm run watch

The proxy listens on port 3000.

### Starting an existing app

> docker start mongo percona myproject myproject-watch

( Leaving off mongo and/or percona if you didn't create those docker containers ofcourse. )

You can now open your browser on http://127.0.0.1:3000 .

## When MongoDB is needed

> docker run --name mongo -d mongo

> docker run --name myproject -it -d --link mongo:mongo -v $(pwd):/app -w /app verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MongoDB console is as easy as calling:

> docker exec -it mongo mongo admin

In your app (.env, ... ), use 'mongo' as hostname for the Mongo server.

## When MySQL/Percona is needed

> docker run --name percona -e MYSQL_ALLOW_EMPTY_PASSWORD=true -d percona

> docker run --name myproject -it -d --link percona:percona -v $(pwd):/app -w /app verwilst/php7-cli php artisan serve --host=0.0.0.0

Using the MySQL console is as easy as calling:

> docker exec -it percona mysql

In your app (.env, ... ), use 'percona' as hostname for the MySQL server.

## API-only application

If you're using this project to build an API without a Vue.js frontend, you might be better off by not starting the myproject-watch container, but opening port 8000 on the 'myproject' container by adding -p 8000:8000, and browsing to http://127.0.0.1:8000 instead. That stops browsersync from constantly reloading /api/documentation.
