# Usage

This page explains the usage and strives to thoroughly, but concisely document
the available API. You might also be interested in some use recipes and
[examples](examples.md) or [explanation](iaaf.md) of the IAAF scoring system.

See [contributing](../CONTRIBUTING.md) if you are interested in changing or
developing this package. It is [MIT licensed](../LICENSE.md).

And we keep a [changelog](../CHANGELOG.md).

## Table of Contents

- [Installation](#installation)
- [Usage](#usage)
    - [Disciplines](#disciplines)
    - [Edition](#edition)
    - [Interface](#interface)
- [Calculators](#calculators)

## Installation

Use composer:

```sh
composer require glaivepro/iaafpoints
```

## Usage

This package provides mutliple calculators that all provide the same interface.
Here's a quick example:

```php
// Calculator and use-case specific options.
$options = [
	'gender' => 'm',
	'venueType' => 'outdoor',
	'discipline' => '200m',
];

// Create a calculator instance
$calculator = new \GlaivePro\IaafPoints\IaafCalculator($options);

// Evaluate a result getting some points or a class assigned to result.
$points = $calculator->evaluate(21.61);
// 980

// Update options
$calculator->setOptions(['gender' => 'f']);
$points = $calculator->evaluate(21.61);
// 1279
```

You don't have to set options on constructor. But you should at least specify
gender and discipline before you evaluate a result.

```php
// Create a calculator instance
$calculator = new \GlaivePro\IaafPoints\IaafCalculator;

$calculator->setOptions(['gender' => 'f', 'discipline' => '200m']);
$points = $calculator->evaluate(21.61);
// 1279
```

See some more examples [here](examples.md).

### Disciplines

The keys to specify disciplines are different for different calculators. You
can list the available keys like this.

```php
$calculator->getSupportedDisciplineKeys();
```

Generally the keys are strings constructed like this:
 - `60m`, `100m` up to `10000m`, `1mile`, `2miles` etc. for track running;
 - `10km`, `10miles`, `marathon` and `half_marathon` for road running
 - `4x100m`, `4x200m` etc. for relays
 - `60mh`, `110mh` etc. for hurdles
 - `2000mSt`, `3000mSt` for steeplechase
 - `high_jump`, `pole_vault`, `long_jump`, `triple_jump`, `shot_put`, `discus_throw`, `hammer_throw`, `javelin_throw`
 - `pentathlon`, `heptathlon`, `decathlon`
 - `5kmW`, `20kmw` etc. for race walks

You can also look up the keys by inspecting the files in the `resources`
directory of this package.

### Editions

The formulas and coefficients used in evaluating the results are updated from
time to time. These versions are called `editions` and by default each
calculator uses the most recent of the available editions.

You can specify editions in options.

```php
$classifier = new \GlaivePro\IaafPoints\Classifier;

$options = $classifier->getOptions();
/* $options = [
	'discipline' => null,
	'gender' => 'm',
	'venueType' => 'outdoor',
	'edition' => 'latvian2018',
] */

$editions = $classifier->getSupportedEditionKeys();
/* $editions = [
	'latvian2018',
	'latvian2013',
] */

// Load the old (2013-2017) classification.
$classifier->setOptions(['edition' => 'latvian2013']);
```

### Interface

All calculators support the following methods.

```php
// Constructor. Creates a calulator instance. Options array is optional.
$calculator = new \GlaivePro\IaafPoints\IaafCalculator($options);

// List supported formula editions. Sorted starting with the most recent.
$calculator->getSupportedEditionKeys();

// List supported discipline keys according to currently selected options (venueType, gender etc.).
$calculator->getSupportedDisciplineKeys();

// Get an array of current options. All the options that a calculator uses
// are initialized even if you have never specified them.
$calculator->getOptions();

// Set options via a key => value array. Options that are not included will
// remain as they were before.
$calculator->setOptions($options);

// Get a score assigned to a result.
$calculator->evaluate($result);
```

The only thing that's different between calculators is the set of options that
they receive. And the internal logic, of course.

## Calculators

### GlaivePro\IaafPoints\IaafCalculator

This calculator produces IAAF scoring points of athletics. It accepts the
following options with the defaults as set here:

```php
[
	// Discipline key like '100m', 'long_jump', ...
	'discipline' => null,
	// Gender key: 'm' or 'f'.
	'gender' => 'm',
	// Whether electronic measurement or hand time was used.
	'electronicMeasurement' => true,
	// Venue type: 'outdoor' or 'indoor'.
	'venueType' => 'outdoor',
	// Edition, only '2017' is supported at the moment of writing.
	'edition' => '2017',
];
```

### GlaivePro\IaafPoints\Combined

This calculator produces IAAF scoring points for combined events. It accepts
the following options with the defaults as set here:

```php
[
	// Discipline key like '100m', 'long_jump', ...
	'discipline' => null,
	// Gender key: 'm' or 'f'.
	'gender' => 'm',
	// Whether electronic measurement or hand time was used.
	'electronicMeasurement' => true,
	// Edition, only '2001' is supported at the moment of writing.
	'edition' => '2001',
];
```

This calculator provides one additional method for evaluating the score for
multiple events at once. It's called `evaluateMany` and used as follows.

```php
$results = [
	'200m' => 21.61,
	'long_jump' => 7.35,
	'shot_put' => 16.55,
];

$calculator = new \GlaivePro\IaafPoints\CombinedCalculator([ 'gender' => 'm']);
$points = $this->calculator->evaluateMany($results);

/* $points = [
	'200m' => 922,
	'long_jump' => 898,
	'shot_put' => 885,
	'total' => 2705,
] */
```

### GlaivePro\IaafPoints\Classifier

This calculator assigns classes (first class, master, grand master etc.). It
accepts the following options with the defaults as set here:

```php
[
	// Discipline key like '100m', 'long_jump', also 'javelin_throw_600', '60mh_99.1' with equipment specified.
	'discipline' => null,
	// Gender key: 'm' or 'f'.
	'gender' => 'm',
	// Venue type: 'field', 'road', 'track' (trail), 'indoor' (track events), 'outdoor' (track events).
	'venueType' => 'outdoor',
	// Edition, 'latvian2013', 'latvian2018' at the moment of writing.
	'edition' => 'latvian2018',
];
```

### GlaivePro\IaafPoints\YouthguardClassifier

This calculator is a variantion of combined event calculator for some specific
youth competitions in Latvia. It accepts the following options with the
defaults as set here:

```php
[
	// Discipline key like '60m', 'long_jump', 'ball_throw', ...
	'discipline' => null,
	// Gender key: 'm' or 'f'.
	'gender' => 'm',
	// Age group: 'u14', 'u16', 'u18'.
	'ageGroup' => 'u18',
	// Edition, only '2018' is supported at the moment of writing.
	'edition' => '2018',
];
```

This calculator provides one additional method for evaluating the score for
multiple events at once. It's called `evaluateMany` and used as follows.

```php
$results = [
	'60m' => 7.61,
	'long_jump' => 7.35,
	'ball_throw' => 56.55,
];

$calculator = new \GlaivePro\IaafPoints\YouthguardCalculator([ 'gender' => 'm']);
$points = $this->calculator->evaluateMany($results);

/* $points = [
	'60m' => 654,
	'long_jump' => 898,
	'ball_throw' => 686,
	'total' => 2238,
] */
```
