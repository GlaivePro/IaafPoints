# Examples

This page contains some down-to-earth examples of how one would use the package.

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
	$points = $calculator->evaluate($time);

	$result['iaaf_points'] => $points;
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
$points100m = $ladiesCalculator->evaluate(10.7);

// reconfigure again
$ladiesCalculator->setOptions(['discipline' => '60m']);
$points60m = $ladiesCalculator->evaluate(10.7);  // You'll get different points now
```

You should explicitly select options because the default values might change in
the upcoming versions. Exception is the `electronicMeasurement`. It will be
`true` by default. And it only matters for track events up to 500 m.

### How to change the edition

The IAAF Scoring tables are updated from time to time. If you want to know the
supported editions, ask your calculator:

```php
$editions = $calculator->getSupportedEditionKeys();

// the editions are ordered starting with the most recent
// choose the freshest like this
$calculator->setOptions([ 'edition' => $editions[0] ]);
```

But in fact the classifier is the only calculator that currently has more than
a single edition.

### How to pass disciplines?

You can request the array of supported disciplines for the current edition,
venueType and gender like this:

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

## How do I use the combined events calculator?

Basic example:

```php
// Start by creating a calculator

$options = [
	'gender' => 'm',
	'discipline' => '200m',
];

$calculator = new \GlaivePro\IaafPoints\CombinedCalculator($options);

// Pass result and receive points
$points = $calculator->evaluate(21.61);  //get 922

// Or pass array of results in different events to receive scores and total
$results = [
	'200m' => 21.61,
	'long_jump' => 7.35,
	'shot_put' => 16.55,
];

$points = $calculator->evaluateMany($results);

// $points = ['200m' => 922, 'long_jump' => 898, 'shot_put' => 885, 'total' => 2705];
```

See the previous chapter on details about disciplines.

Currently only the 2001 edition of combined events scoring is implemented and
no other editions are planned for now.

## How do I use classifier?

In general it's very similar to the main IAAF scores calculator but it returns
classes (like grandmaster) instead of points.

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
	$class = $classifier->evaluate($time);

	$result['class'] => $class;
}
```

One important difference is that the classes in field disciplines are not
differentiated by venue type therefore they have their own venue type that you
have to set explicitly.

```php
$classifier->setOptions(['venueType' => 'field', 'discipline' => 'shot_put']);

$class = $classifier->evaluate(16.32);
```

The classification system is not a part of IAAF scores, it is nation specific
(and only few nations have one at all). Therefore the editions are marked in
`latvian2013` style.
