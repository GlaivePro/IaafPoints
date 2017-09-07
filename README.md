# IaafPoints

PHP library to calculate IAAF scoring points of athletics and IAAF scoring points for combined events.

## Table of Contents

- [How do I get this?](#how-do-i-get-this)
    - [Composer](#composer)
    - [Getting files manually](#getting-files-manually)
- [How do I use IAAF points calculator?](#how-do-i-use-iaaf-points-calculator)
    - [What is the edition?](#what-is-the-edition)
    - [How to pass disciplines?](#how-to-pass-disciplines)
- [How do I use combined events calculator?](#how-do-i-use-combined-events-calculator)
- [How are the IAAF points calculated?](#how-are-the-points-calculated)
    - [Track events](#track-events)
    - [General formula](#general-formula)
- [Changelog](#changelog)
- [License](#license)

## How do I get this in my app?

### Composer

Execute `composer require glaivepro/iaafpoints`.

### Getting files manually

If, for some reason you can't or don't want to use composer, the code that does the actual job resides inside `src/` directory.

## How do I use IAAF points calculator?

Basic example:

```php
// Start by creating a calculator

$options = [
	'venueType' => 'outdoor',
	'gender' => 'm',
	'discipline' => '100m',
];

$calculator = new \GlaivePro\IaafPoints\IaafCalculator($options);

// Use your calculator

$results = [
	[	'athlete' => 'john',
		'time' => 12.77,],
	[	'athlete' => 'peter',
		'time' => 11.63,],
];

foreach ($results as $result)
{
	$time = $result['time'];
	
	// for track pass seconds, for field pass meters, for combined pass points
	$points = $calculator->getPoints($time);
	
	$result['time'] => $points;
}
```

You can set and retrieve options later:

```php
$gentlemenCalculator = new \GlaivePro\IaafPoints\IaafCalculator(['gender' => 'm']);

$options = $gentlemenCalculator->getOptions();

/*
	Here's an example of what you'll get:
	
	[	'edition' => '2017',              // edition of IAAF scoring tables
		'venueType' => 'outdoor',         // indoor or outdoor
		'gender' => 'm',                  // 'm' or 'f'
		'electronicMeasurement' => true,  // set to false for hand times
		'discipline' => '100m',           // discipline
	];
*/

// create another calculator without specifying options
$ladiesCalculator = new \GlaivePro\IaafPoints\IaafCalculator;

// set options now
$ladiesCalculator->setOptions($options);

// change gender to ladies
$ladiesCalculator->setOptions(['gender' => 'f']);
$points100m = $ladiesCalculator->getPoints(10.7);

// reconfigure again
$ladiesCalculator->setOptions(['discipline' => '60m']);
$points60m = $ladiesCalculator->getPoints(10.7);  // You'll get different points now
```

You should explicitly select options because the default values might change in the upcoming versions. Exception is the `electronicMeasurement`. It will be `true` by default. And it only matters for track events up to 500 m.

### What is the edition?

The IAAF Scoring tables are updated from time to time. If you want to know the supported editions, ask your calculator:

```php
$editions = $calculator->getSupportedEditionKeys();

// the editions are ordered starting with the most recent
// choose the freshest like this
$calculator->setOptions([ 'edition' => $editions[0] ]);
```

### How to pass disciplines?

You can request the array of supported disciplines for the current edition, venueType and gender like this:

```php
$disciplines = $calculator->getSupportedDisciplineKeys();
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

## How do I use combined events calculator?

Basic example:

```php
// Start by creating a calculator

$options = [
	'gender' => 'm',
	'discipline' => '200m',
];

$calculator = new \GlaivePro\IaafPoints\CombinedCalculator($options);

// Pass result and receive points
$points = $calculator->getPoints(21.61);  //get 922

// Or pass array of results in different events to receive scores and total
$results = [
	'200m' => 21.61, 
	'long_jump' => 7.35, 
	'shot_put' => 16.55,
];

$points = $calculator->getPoints($results);

// $points = ['200m' => 922, 'long_jump' => 898, 'shot_put' => 885, 'total' => 2705];
```

See the previous chapter on details about disciplines. 

Currently only the 2001 edition of combined events scoring is implemented and no other editions are planned for now.
 
## How do I use classifier?

In general it's very similar to the main IAAF scores calculator but it returns classes (like grandmaster) instead of points.

```php
// Start by creating a classifier

$options = [
	'venueType' => 'outdoor',
	'gender' => 'm',
	'discipline' => '100m',
];

$classifier = new \GlaivePro\IaafPoints\Classifier($options);

// Use your calculator

$results = [
	[	'athlete' => 'john',
		'time' => 12.77,],
	[	'athlete' => 'peter',
		'time' => 11.63,],
];

foreach ($results as $result)
{
	$time = $result['time'];
	
	// for track pass seconds, for field pass meters, for combined pass points
	$class = $classifier->getPoints($time);
	
	$result['class'] => $class;
}
```

One important difference is that the classes in field disciplines are not differentiated by venue type therefore they have their own venue type that you have to set explicitly.

```php
$classifier->setOptions(['venueType' => 'field', 'discipline' => 'shot_put']);

$class = $classifier->getClass(16.32);
```

The classification system is not a part of IAAF scores, it is nation specific (and only some nations have such at all). Therefore the editions are marked in `latvian2013` style.

## How are the IAAF points calculated?

### Track events

It's simpler to grasp this starting with the simpler cases.

In track events the result is measured against a reference time. Your improvement with respect to the reference is then squared and multiplied by a certain factor that converts squared seconds to points.

Let's consider 100m outdoor men as an example. The reference time for this event is 17 seconds in the 2017 edition. 

Suppose John ran the distance in 11.78 seconds. That is 5.22 seconds better than the reference time. John's result is equivalent to 24.63 * 5.22^2 = 952 points (we round the decimals down to the nearest integer). The 24.63 is a coefficient specific to this event.

The formula for track events can be expressed like this: `points = floor(conversionFactor * (reference - result)^2)`.

### General formula

The other events have one more event-dependant coefficient. 

First, the result is shifted by a number (similar to comparing with reference in track events).

The shifted result is then squared and multiplied by a factor. And this is then shited by another number.

The formula can be expressed like this: `points = floor(conversionFactor * (result + resultShift)^2 + pointShift)`.

This formula can (and is) also be used for track events by setting `resultShift = -reference` and `pointShift = 0`.

## Changelog

It's [here](CHANGELOG.md).

## License

This package is licensed under the [MIT license](LICENSE.md).