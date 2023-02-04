<?php

/**
 * @param array $constants
 *   Array containing coefficients to calculate points.
 *
 *   @type float $constants[gender][discipline]['resultShift']
 *   @type float $constants[gender][discipline]['conversionFactor']
 *   @type float $constants[gender][discipline]['exponent']
 */
return [
	'm' => [
		'60m' => [
			'resultShift' => -11.5,
			'conversionFactor' => 58.015,
			'exponent' => 1.81,
		],
		'100m' => [
			'resultShift' => -18,
			'conversionFactor' => 25.4347,
			'exponent' => 1.81,
		],
		'200m' => [
			'resultShift' => -38,
			'conversionFactor' => 5.8425,
			'exponent' => 1.81,
		],
		'400m' => [
			'resultShift' => -82,
			'conversionFactor' => 1.53775,
			'exponent' => 1.81,
		],
		'1000m' => [
			'resultShift' => -305.5,
			'conversionFactor' => 0.08713,
			'exponent' => 1.85,
		],
		'1500m' => [
			'resultShift' => -480,
			'conversionFactor' => 0.03768,
			'exponent' => 1.85,
		],
		'60mh' => [
			'resultShift' => -15.5,
			'conversionFactor' => 20.5173,
			'exponent' => 1.92,
		],
		'110mh' => [
			'resultShift' => -28.5,
			'conversionFactor' => 5.74352,
			'exponent' => 1.92,
		],
		'high_jump' => [
			'resultShift' => 0.75,
			'conversionFactor' => 0.8465*(100**1.42),
			'exponent' => 1.42,
		],
		'pole_vault' => [
			'resultShift' => 1,
			'conversionFactor' => 0.2797*(100**1.35),
			'exponent' => 1.35,
		],
		'long_jump' => [
			'resultShift' => 2.2,
			'conversionFactor' => 0.14354*(100**1.4),
			'exponent' => 1.4,
		],
		'shot_put' => [
			'resultShift' => 1.5,
			'conversionFactor' => 51.39,
			'exponent' => 1.05,
		],
		'discus_throw' => [
			'resultShift' => 4,
			'conversionFactor' => 12.91,
			'exponent' => 1.1,
		],
		'javelin_throw' => [
			'resultShift' => 7,
			'conversionFactor' => 10.14,
			'exponent' => 1.08,
		],
	],
	'f' => [
		'100m' => [
			'resultShift' => -21,
			'conversionFactor' => 17.857,
			'exponent' => 1.81,
		],
		'200m' => [
			'resultShift' => -42.5,
			'conversionFactor' => 4.99087,
			'exponent' => 1.81,
		],
		'400m' => [
			'resultShift' => -91.7,
			'conversionFactor' => 1.34285,
			'exponent' => 1.81,
		],
		'800m' => [
			'resultShift' => -254,
			'conversionFactor' => 0.11193,
			'exponent' => 1.88,
		],
		'60mh' => [
			'resultShift' => -17,
			'conversionFactor' => 20.0479,
			'exponent' => 1.835,
		],
		'100mh' => [
			'resultShift' => -26.7,
			'conversionFactor' => 9.23076,
			'exponent' => 1.835,
		],
		'high_jump' => [
			'resultShift' => 0.75,
			'conversionFactor' => 1.84523*(100**1.348),
			'exponent' => 1.348,
		],
		'pole_vault' => [
			'resultShift' => 1,
			'conversionFactor' => 0.44125*(100**1.35),
			'exponent' => 1.35,
		],
		'long_jump' => [
			'resultShift' => 2.1,
			'conversionFactor' => 0.188807*(100**1.41),
			'exponent' => 1.41,
		],
		'shot_put' => [
			'resultShift' => 1.5,
			'conversionFactor' => 56.0211,
			'exponent' => 1.05,
		],
		'discus_throw' => [
			'resultShift' => 3,
			'conversionFactor' => 12.3311,
			'exponent' => 1.1,
		],
		'javelin_throw' => [
			'resultShift' => 3.8,
			'conversionFactor' => 15.9803,
			'exponent' => 1.04,
		],
	],
];
