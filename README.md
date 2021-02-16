# Test

Git - https://github.com/bostil-support/Alexey-PHP-Developer-Test-Vue.js \
Url - https://offers.bostil-test.cf/

## Installation

- ```shell
  git clone git@github.com:dev-abramoff/test.git && cd test
  ```
- ```shell
  cp .env.docker .env
  ```
- ```shell
  docker run --rm \
    -v $(pwd):/opt \
    -w /opt \
    laravelsail/php80-composer:latest \
    composer install
  ```
- ```shell
  ./vendor/bin/sail up
  ```
- ```shell
  ./vendor/bin/sail artisan migrate
  ```
- ```shell
  ./vendor/bin/sail npm i
  ```
- ```shell
  ./vendor/bin/sail npm run prod
  ```

## Seeding data

Run `./vendor/bin/sail artisan db:seed` for seeding test data
or upload CSV file via site.


## Run application

Open  url [http://127.0.0.1](http://127.0.0.1) in your browser.
