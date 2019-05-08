# Weather app API
See https://github.com/krzysztof-ciszewski/weather-spa for frontend

### Project set up
* ```cp .docker/.env.dist .docker/.env```(adjust if needed)
* ```cp .env.dev .env.dev.local```(adjust if needed)
* ```cd .docker && docker-compose up -d```
* ```docker-compose exec php bin/console doctrine:database:create```
* ```docker-compose exec php bin/console doctrine:schema:update```

### Tests
```docker-compose exec php bin/phpspec run```
