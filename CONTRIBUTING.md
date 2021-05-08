## Project

All calculators must implement `Support\CalculatorInterface`.

## Testing

We use composer to set up phpunit and autoloading.

```
composer install
```

The test script is also defined in composer.

```
composer test
```

The test script includes code coverage report which relies on xdebug. If you
don't have xdebug, you can run the tests directly.

```
vendor/bin/phpunit
```
