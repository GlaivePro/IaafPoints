## Project

All calculators must implement `Support\CalculatorInterface`.

Aim for 100% line coverage in tests. If you can't reach a line in a test, why
have the line at all?

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

## TODO

Any improvements will be seriously considered for merging into the package.

Well thought out improvements to documentation would be greatly appreciated.

Additional editions for any of the calculators will be accepted as long as
those are actual scoring systems used somewhere.

Regarding inclusion of additional calculators — we will have to weight
relevance against the burden of maintenance.
