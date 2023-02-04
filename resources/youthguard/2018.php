<?php

/**
 * @param array $constants
 *   Array containing coefficients to calculate points.
 *
 *   @type float $constants[gender][ageGroup][discipline]['resultShift']
 *   @type float $constants[gender][ageGroup][discipline]['conversionFactor']
 *   @type float $constants[gender][ageGroup][discipline]['exponent']
 */
return [
	'm' => [
		'u14' => [

		],
		'u16' => [
			'60m' => [
				'resultShift' => -10.7,
				'conversionFactor' => 68.6,
				'exponent' => 2,
			],
			'1000m' => [
				'resultShift' => -240,
				'conversionFactor' => 0.1139,
				'exponent' => 2,
			],
			'long_jump' => [
				'resultShift' => 2.2,
				'conversionFactor' => 0.14354*(100**1.4),
				'exponent' => 1.4,
			],
			'ball_throw' => [
				'resultShift' => 7,
				'conversionFactor' => 10.14,
				'exponent' => 1.08,
			],
		],
		'u18' => [
			'60m' => [
				'resultShift' => -10.7,
				'conversionFactor' => 68.6,
				'exponent' => 2,
			],
			'1500m' => [
				'resultShift' => -386,
				'conversionFactor' => 0.042,
				'exponent' => 2,
			],
			'long_jump' => [
				'resultShift' => 2.2,
				'conversionFactor' => 0.14354*(100**1.4),
				'exponent' => 1.4,
			],
			'ball_throw' => [
				'resultShift' => 7,
				'conversionFactor' => 10.14,
				'exponent' => 1.08,
			],
		],
	],
	'f' => [
		'u14' => [

		],
		'u16' => [
			'800m' => [
				'resultShift' => -264,
				'conversionFactor' => 0.0572,
				'exponent' => 2,
			],
			'long_jump' => [
				'resultShift' => 2.1,
				'conversionFactor' => 0.188807*(100**1.41),
				'exponent' => 1.41,
			],
			'ball_throw' => [
				'resultShift' => 3.8,
				'conversionFactor' => 15.9803,
				'exponent' => 1.04,
			],
			'60m' => [
				'resultShift' => -14,
				'conversionFactor' => 24.9,
				'exponent' => 2,
			],
		],
		'u18' => [
			'1000m' => [
				'resultShift' => -340.4,
				'conversionFactor' => 0.03473,
				'exponent' => 2,
			],
			'long_jump' => [
				'resultShift' => 2.1,
				'conversionFactor' => 0.188807*(100**1.41),
				'exponent' => 1.41,
			],
			'ball_throw' => [
				'resultShift' => 3.8,
				'conversionFactor' => 15.9803,
				'exponent' => 1.04,
			],
			'60m' => [
				'resultShift' => -14,
				'conversionFactor' => 24.9,
				'exponent' => 2,
			],
		],
	],
];
