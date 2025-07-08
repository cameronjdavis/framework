```bash
composer install
php console

./vendor/bin/phpunit tests
./vendor/bin/phpcs --standard=PSR12 src tests
./vendor/bin/phpcbf --standard=PSR12 src tests
./vendor/bin/phpstan analyse src tests --level 7
```
