# contact form

## setup

```bash
$ cp .env .env.local
$ composer install && npm install
$ npm run build
```

## run

```bash
$ docker compose up
$ php bin/console doctrine:migrations:migrate
$ php bin/console doctrine:fixtures:load
$ symfony server:start
```
