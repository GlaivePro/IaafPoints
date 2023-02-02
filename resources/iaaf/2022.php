<?php

/**
 * @param array $constants
 *   Array containing coefficients to calculate points.
 *
 *   @type float $constants['edition']['venueType']['gender']['discipline']['resultShift']
 *   @type float $constants['edition']['venueType']['gender']['discipline']['conversionFactor']
 *   @type float $constants['edition']['venueType']['gender']['discipline']['pointShift']
 */
return [
	'outdoor' => [
		'm' => [
			/*****************/
			/* TRACK RUNNING */
			/*****************/
			'100m' => [
				'resultShift' => -17,
				'conversionFactor' => 24.63,
				'pointShift' => 0,
			],
			'200m' => [
				'resultShift' => -35.5,
				'conversionFactor' => 5.08,
				'pointShift' => 0,
			],
			'300m' => [
				'resultShift' => -57.2,
				'conversionFactor' => 1.83,
				'pointShift' => 0,
			],
			'400m' => [
				'resultShift' => -79,
				'conversionFactor' => 1.021,
				'pointShift' => 0,
			],
			'500m' => [
				'resultShift' => -104,
				'conversionFactor' => 0.585,
				'pointShift' => 0,
			],
			'600m' => [
				'resultShift' => -129.5,
				'conversionFactor' => 0.3857,
				'pointShift' => 0,
			],
			'800m' => [
				'resultShift' => -182,
				'conversionFactor' => 0.198,
				'pointShift' => 0,
			],
			'1000m' => [
				'resultShift' => -237.5,
				'conversionFactor' => 0.1123,
				'pointShift' => 0,
			],
			'1500m' => [
				'resultShift' => -385,
				'conversionFactor' => 0.04066,
				'pointShift' => 0,
			],
			'1mile' => [
				'resultShift' => -415,
				'conversionFactor' => 0.0351,
				'pointShift' => 0,
			],
			'2000m' => [
				'resultShift' => -528,
				'conversionFactor' => 0.02181,
				'pointShift' => 0,
			],
			'3000m' => [
				'resultShift' => -840,
				'conversionFactor' => 0.00815,
				'pointShift' => 0,
			],
			'2miles' => [
				'resultShift' => -904.8,
				'conversionFactor' => 0.00703,
				'pointShift' => 0,
			],
			'5000m' => [
				'resultShift' => -1440,
				'conversionFactor' => 0.002778,
				'pointShift' => 0,
			],
			'10000m' => [
				'resultShift' => -3150,
				'conversionFactor' => 0.000524,
				'pointShift' => 0,
			],
			/***********/
			/* HURDLES */
			/***********/
			'110mh' => [
				'resultShift' => -25.8,
				'conversionFactor' => 7.66,
				'pointShift' => 0,
			],
			'400mh' => [
				'resultShift' => -95.5,
				'conversionFactor' => 0.546,
				'pointShift' => 0,
			],
			'2000mSt' => [
				'resultShift' => -660,
				'conversionFactor' => 0.01023,
				'pointShift' => 0,
			],
			'3000mSt' => [
				'resultShift' => -1020,
				'conversionFactor' => 0.004316,
				'pointShift' => 0,
			],
			/**********/
			/* RELAYS */
			/**********/
			'4x100m' => [
				'resultShift' => -69.5,
				'conversionFactor' => 1.236,
				'pointShift' => 0,
			],
			'4x200m' => [
				'resultShift' => -144,
				'conversionFactor' => 0.29767,
				'pointShift' => 0,
			],
			'4x400m' => [
				'resultShift' => -334,
				'conversionFactor' => 0.0505,
				'pointShift' => 0,
			],
			/****************/
			/* ROAD RUNNING */
			/****************/
			'5km' => [
				'resultShift' => -1440,
				'conversionFactor' => 0.002778,
				'pointShift' => 0,
			],
			'10km' => [
				'resultShift' => -3150,
				'conversionFactor' => 0.000524,
				'pointShift' => 0,
			],
			'15km' => [
				'resultShift' => -4868,
				'conversionFactor' => 0.0002162,
				'pointShift' => 0,
			],
			'10miles' => [
				'resultShift' => -5250,
				'conversionFactor' => 0.0001852,
				'pointShift' => 0,
			],
			'20km' => [
				'resultShift' => -6702,
				'conversionFactor' => 0.00010856,
				'pointShift' => 0,
			],
			'half_marathon' => [
				'resultShift' => -7140,
				'conversionFactor' => 0.0000947,
				'pointShift' => 0,
			],
			'25km' => [
				'resultShift' => -8726,
				'conversionFactor' => 0.0000616,
				'pointShift' => 0,
			],
			'30km' => [
				'resultShift' => -10824,
				'conversionFactor' => 0.0000389,
				'pointShift' => 0,
			],
			'marathon' => [
				'resultShift' => -16200,
				'conversionFactor' => 0.00001645,
				'pointShift' => 0,
			],
			'100km' => [
				'resultShift' => -48600,
				'conversionFactor' => 0.000001765,
				'pointShift' => 0,
			],
			/****************/
			/* RACE WALKING */
			/****************/
			'3kmW' => [
				'resultShift' => -1605,
				'conversionFactor' => 0.001318,
				'pointShift' => 0,
			],
			'5kmW' => [
				'resultShift' => -2700,
				'conversionFactor' => 0.000467,
				'pointShift' => 0,
			],
			'10kmW' => [
				'resultShift' => -5550,
				'conversionFactor' => 0.0001137,
				'pointShift' => 0,
			],
			'15kmW' => [
				'resultShift' => -8430,
				'conversionFactor' => 0.0000498,
				'pointShift' => 0,
			],
			'20kmW' => [
				'resultShift' => -11400,
				'conversionFactor' => 0.00002735,
				'pointShift' => 0,
			],
			'30kmW' => [
				'resultShift' => -19110,
				'conversionFactor' => 0.00000893,
				'pointShift' => 0,
			],
			'35kmW' => [
				'resultShift' => -22800,
				'conversionFactor' => 0.00000614,
				'pointShift' => 0,
			],
			'50kmW' => [
				'resultShift' => -37200,
				'conversionFactor' => 0.000002124,
				'pointShift' => 0,
			],
			/*********/
			/* FIELD */
			/*********/
			'high_jump' => [
				'resultShift' => 11.534,
				'conversionFactor' => 32.29,
				'pointShift' => -5000,
			],
			'pole_vault' => [
				'resultShift' => 39.39,
				'conversionFactor' => 3.042,
				'pointShift' => -5000,
			],
			'long_jump' => [
				'resultShift' => 48.41,
				'conversionFactor' => 1.929,
				'pointShift' => -5000,
			],
			'triple_jump' => [
				'resultShift' => 98.63,
				'conversionFactor' => 0.4611,
				'pointShift' => -5000,
			],
			'shot_put' => [
				'resultShift' => 687.7,
				'conversionFactor' => 0.042172,
				'pointShift' => -20000,
			],
			'discus_throw' => [
				'resultShift' => 2232.6,
				'conversionFactor' => 0.004007,
				'pointShift' => -20000,
			],
			'hammer_throw' => [
				'resultShift' => 2649.4,
				'conversionFactor' => 0.0028462,
				'pointShift' => -20000,
			],
			'javelin_throw' => [
				'resultShift' => 2886.8,
				'conversionFactor' => 0.0023974,
				'pointShift' => -20000,
			],
			/************/
			/* COMBINED */
			/************/
			'decathlon' => [
				'resultShift' => 71170,
				'conversionFactor' => 0.00000097749,
				'pointShift' => -5000,
			],
		],
		'f' => [
			/*****************/
			/* TRACK RUNNING */
			/*****************/
			'100m' => [
				'resultShift' => -22,
				'conversionFactor' => 9.92,
				'pointShift' => 0,
			],
			'200m' => [
				'resultShift' => -45.5,
				'conversionFactor' => 2.242,
				'pointShift' => 0,
			],
			'300m' => [
				'resultShift' => -77,
				'conversionFactor' => 0.7,
				'pointShift' => 0,
			],
			'400m' => [
				'resultShift' => -110,
				'conversionFactor' => 0.335,
				'pointShift' => 0,
			],
			'600m' => [
				'resultShift' => -184,
				'conversionFactor' => 0.1192,
				'pointShift' => 0,
			],
			'800m' => [
				'resultShift' => -250,
				'conversionFactor' => 0.0688,
				'pointShift' => 0,
			],
			'1000m' => [
				'resultShift' => -330,
				'conversionFactor' => 0.0382,
				'pointShift' => 0,
			],
			'1500m' => [
				'resultShift' => -540,
				'conversionFactor' => 0.0134,
				'pointShift' => 0,
			],
			'1mile' => [
				'resultShift' => -580,
				'conversionFactor' => 0.01165,
				'pointShift' => 0,
			],
			'2000m' => [
				'resultShift' => -750,
				'conversionFactor' => 0.006766,
				'pointShift' => 0,
			],
			'3000m' => [
				'resultShift' => -1200,
				'conversionFactor' => 0.002539,
				'pointShift' => 0,
			],
			'2miles' => [
				'resultShift' => -1296.3,
				'conversionFactor' => 0.002157,
				'pointShift' => 0,
			],
			'5000m' => [
				'resultShift' => -2100,
				'conversionFactor' => 0.000808,
				'pointShift' => 0,
			],
			'10000m' => [
				'resultShift' => -4500,
				'conversionFactor' => 0.0001712,
				'pointShift' => 0,
			],
			/***********/
			/* HURDLES */
			/***********/
			'100mh' => [
				'resultShift' => -30,
				'conversionFactor' => 3.98,
				'pointShift' => 0,
			],
			'400mh' => [
				'resultShift' => -130,
				'conversionFactor' => 0.208567,
				'pointShift' => 0,
			],
			'2000mSt' => [
				'resultShift' => -880,
				'conversionFactor' => 0.0045,
				'pointShift' => 0,
			],
			'3000mSt' => [
				'resultShift' => -1510,
				'conversionFactor' => 0.001323,
				'pointShift' => 0,
			],
			/**********/
			/* RELAYS */
			/**********/
			'4x100m' => [
				'resultShift' => -98,
				'conversionFactor' => 0.3895,
				'pointShift' => 0,
			],
			'4x200m' => [
				'resultShift' => -212,
				'conversionFactor' => 0.0795,
				'pointShift' => 0,
			],
			'4x400m' => [
				'resultShift' => -480,
				'conversionFactor' => 0.01562,
				'pointShift' => 0,
			],
			/****************/
			/* ROAD RUNNING */
			/****************/
			'10km' => [
				'resultShift' => -4500,
				'conversionFactor' => 0.0001742,
				'pointShift' => 0,
			],
			'15km' => [
				'resultShift' => -6905,
				'conversionFactor' => 0.0000732,
				'pointShift' => 0,
			],
			'10miles' => [
				'resultShift' => -7438,
				'conversionFactor' => 0.000063,
				'pointShift' => 0,
			],
			'20km' => [
				'resultShift' => -9357,
				'conversionFactor' => 0.0000396,
				'pointShift' => 0,
			],
			'half_marathon' => [
				'resultShift' => -9900,
				'conversionFactor' => 0.0000353,
				'pointShift' => 0,
			],
			'25km' => [
				'resultShift' => -12144,
				'conversionFactor' => 0.0000228,
				'pointShift' => 0,
			],
			'30km' => [
				'resultShift' => -15123,
				'conversionFactor' => 0.00001426,
				'pointShift' => 0,
			],
			'marathon' => [
				'resultShift' => -22800,
				'conversionFactor' => 0.00000595,
				'pointShift' => 0,
			],
			'100km' => [
				'resultShift' => -61200,
				'conversionFactor' => 0.000000874,
				'pointShift' => 0,
			],
			/****************/
			/* RACE WALKING */
			/****************/
			'3kmW' => [
				'resultShift' => -1871,
				'conversionFactor' => 0.000881,
				'pointShift' => 0,
			],
			'5kmW' => [
				'resultShift' => -3140,
				'conversionFactor' => 0.0003246,
				'pointShift' => 0,
			],
			'10kmW' => [
				'resultShift' => -6437,
				'conversionFactor' => 0.0000779,
				'pointShift' => 0,
			],
			'20kmW' => [
				'resultShift' => -13200,
				'conversionFactor' => 0.0000187,
				'pointShift' => 0,
			],
			'30kmW' => [
				'resultShift' => -21545,
				'conversionFactor' => 0.0000069,
				'pointShift' => 0,
			],
			'50kmW' => [
				'resultShift' => -39952,
				'conversionFactor' => 0.00000196,
				'pointShift' => 0,
			],
			/*********/
			/* FIELD */
			/*********/
			'high_jump' => [
				'resultShift' => 10.574,
				'conversionFactor' => 39.34,
				'pointShift' => -5000,
			],
			'pole_vault' => [
				'resultShift' => 34.83,
				'conversionFactor' => 3.953,
				'pointShift' => -5000,
			],
			'long_jump' => [
				'resultShift' => 49.24,
				'conversionFactor' => 1.966,
				'pointShift' => -5000,
			],
			'triple_jump' => [
				'resultShift' => 105.53,
				'conversionFactor' => 0.4282,
				'pointShift' => -5000,
			],
			'shot_put' => [
				'resultShift' => 657.53,
				'conversionFactor' => 0.0462,
				'pointShift' => -20000,
			],
			'discus_throw' => [
				'resultShift' => 2227.3,
				'conversionFactor' => 0.0040277,
				'pointShift' => -20000,
			],
			'hammer_throw' => [
				'resultShift' => 2540,
				'conversionFactor' => 0.0030965,
				'pointShift' => -20000,
			],
			'javelin_throw' => [
				'resultShift' => 2214.9,
				'conversionFactor' => 0.004073,
				'pointShift' => -20000,
			],
			/************/
			/* COMBINED */
			/************/
			'heptathlon' => [
				'resultShift' => 55990,
				'conversionFactor' => 0.000001581,
				'pointShift' => -5000,
			],
		],
	],
	'indoor' => [
		'm' => [
			/*****************/
			/* TRACK RUNNING */
			/*****************/
			'50m' => [
				'resultShift' => -9.2,
				'conversionFactor' => 95.8,
				'pointShift' => 0,
			],
			'55m' => [
				'resultShift' => -10,
				'conversionFactor' => 78.9,
				'pointShift' => 0,
			],
			'60m' => [
				'resultShift' => -10.7,
				'conversionFactor' => 68.6,
				'pointShift' => 0,
			],
			'200m' => [
				'resultShift' => -36,
				'conversionFactor' => 5.04,
				'pointShift' => 0,
			],
			'300m' => [
				'resultShift' => -58,
				'conversionFactor' => 1.803,
				'pointShift' => 0,
			],
			'400m' => [
				'resultShift' => -80.6,
				'conversionFactor' => 0.981,
				'pointShift' => 0,
			],
			'500m' => [
				'resultShift' => -106,
				'conversionFactor' => 0.565,
				'pointShift' => 0,
			],
			'600m' => [
				'resultShift' => -131,
				'conversionFactor' => 0.39,
				'pointShift' => 0,
			],
			'800m' => [
				'resultShift' => -184,
				'conversionFactor' => 0.1974,
				'pointShift' => 0,
			],
			'1000m' => [
				'resultShift' => -240,
				'conversionFactor' => 0.1139,
				'pointShift' => 0,
			],
			'1500m' => [
				'resultShift' => -386,
				'conversionFactor' => 0.042,
				'pointShift' => 0,
			],
			'1mile' => [
				'resultShift' => -415,
				'conversionFactor' => 0.0369,
				'pointShift' => 0,
			],
			'2000m' => [
				'resultShift' => -528,
				'conversionFactor' => 0.0226,
				'pointShift' => 0,
			],
			'3000m' => [
				'resultShift' => -840,
				'conversionFactor' => 0.008322,
				'pointShift' => 0,
			],
			'2miles' => [
				'resultShift' => -907,
				'conversionFactor' => 0.00721,
				'pointShift' => 0,
			],
			'5000m' => [
				'resultShift' => -1440,
				'conversionFactor' => 0.0029,
				'pointShift' => 0,
			],
			/***********/
			/* HURDLES */
			/***********/
			'50mh' => [
				'resultShift' => -12.35,
				'conversionFactor' => 34.2,
				'pointShift' => 0,
			],
			'55mh' => [
				'resultShift' => -13.35,
				'conversionFactor' => 30.07,
				'pointShift' => 0,
			],
			'60mh' => [
				'resultShift' => -14.6,
				'conversionFactor' => 23.9,
				'pointShift' => 0,
			],
			/**********/
			/* RELAYS */
			/**********/
			'4x200m' => [
				'resultShift' => -144,
				'conversionFactor' => 0.312,
				'pointShift' => 0,
			],
			'4x400m' => [
				'resultShift' => -340,
				'conversionFactor' => 0.0489,
				'pointShift' => 0,
			],
			/*********/
			/* FIELD */
			/*********/
			'high_jump' => [
				'resultShift' => 11.534,
				'conversionFactor' => 32.29,
				'pointShift' => -5000,
			],
			'pole_vault' => [
				'resultShift' => 39.39,
				'conversionFactor' => 3.042,
				'pointShift' => -5000,
			],
			'long_jump' => [
				'resultShift' => 48.41,
				'conversionFactor' => 1.929,
				'pointShift' => -5000,
			],
			'triple_jump' => [
				'resultShift' => 98.63,
				'conversionFactor' => 0.4611,
				'pointShift' => -5000,
			],
			'shot_put' => [
				'resultShift' => 687.7,
				'conversionFactor' => 0.042172,
				'pointShift' => -20000,
			],
			/************/
			/* COMBINED */
			/************/
			'heptathlon' => [
				'resultShift' => 53175,
				'conversionFactor' => 0.000001752,
				'pointShift' => -5000,
			],
		],
		'f' => [
			/*****************/
			/* TRACK RUNNING */
			/*****************/
			'50m' => [
				'resultShift' => -12.1,
				'conversionFactor' => 33.03,
				'pointShift' => 0,
			],
			'55m' => [
				'resultShift' => -13.15,
				'conversionFactor' => 27.68,
				'pointShift' => 0,
			],
			'60m' => [
				'resultShift' => -14,
				'conversionFactor' => 24.9,
				'pointShift' => 0,
			],
			'200m' => [
				'resultShift' => -47.5,
				'conversionFactor' => 1.962,
				'pointShift' => 0,
			],
			'300m' => [
				'resultShift' => -79,
				'conversionFactor' => 0.6595,
				'pointShift' => 0,
			],
			'400m' => [
				'resultShift' => -112,
				'conversionFactor' => 0.3224,
				'pointShift' => 0,
			],
			'500m' => [
				'resultShift' => -150.5,
				'conversionFactor' => 0.1714,
				'pointShift' => 0,
			],
			'600m' => [
				'resultShift' => -190.35,
				'conversionFactor' => 0.1063,
				'pointShift' => 0,
			],
			'800m' => [
				'resultShift' => -264,
				'conversionFactor' => 0.0572,
				'pointShift' => 0,
			],
			'1000m' => [
				'resultShift' => -340.4,
				'conversionFactor' => 0.03473,
				'pointShift' => 0,
			],
			'1500m' => [
				'resultShift' => -540,
				'conversionFactor' => 0.01365,
				'pointShift' => 0,
			],
			'1mile' => [
				'resultShift' => -585.5,
				'conversionFactor' => 0.01154,
				'pointShift' => 0,
			],
			'2000m' => [
				'resultShift' => -752.2,
				'conversionFactor' => 0.00685,
				'pointShift' => 0,
			],
			'3000m' => [
				'resultShift' => -1200,
				'conversionFactor' => 0.00259,
				'pointShift' => 0,
			],
			'2miles' => [
				'resultShift' => -1296.3,
				'conversionFactor' => 0.002202,
				'pointShift' => 0,
			],
			'5000m' => [
				'resultShift' => -2100,
				'conversionFactor' => 0.000825,
				'pointShift' => 0,
			],
			/***********/
			/* HURDLES */
			/***********/
			'50mh' => [
				'resultShift' => -15.3,
				'conversionFactor' => 16.2,
				'pointShift' => 0,
			],
			'55mh' => [
				'resultShift' => -16.8,
				'conversionFactor' => 13.19,
				'pointShift' => 0,
			],
			'60mh' => [
				'resultShift' => -18.2,
				'conversionFactor' => 11.16,
				'pointShift' => 0,
			],
			/**********/
			/* RELAYS */
			/**********/
			'4x200m' => [
				'resultShift' => -212,
				'conversionFactor' => 0.0826,
				'pointShift' => 0,
			],
			'4x400m' => [
				'resultShift' => -484,
				'conversionFactor' => 0.0155,
				'pointShift' => 0,
			],
			/*********/
			/* FIELD */
			/*********/
			'high_jump' => [
				'resultShift' => 10.574,
				'conversionFactor' => 39.34,
				'pointShift' => -5000,
			],
			'pole_vault' => [
				'resultShift' => 34.83,
				'conversionFactor' => 3.953,
				'pointShift' => -5000,
			],
			'long_jump' => [
				'resultShift' => 49.24,
				'conversionFactor' => 1.966,
				'pointShift' => -5000,
			],
			'triple_jump' => [
				'resultShift' => 105.53,
				'conversionFactor' => 0.4282,
				'pointShift' => -5000,
			],
			'shot_put' => [
				'resultShift' => 657.53,
				'conversionFactor' => 0.0462,
				'pointShift' => -20000,
			],
			/************/
			/* COMBINED */
			/************/
			'pentathlon' => [
				'resultShift' => 41033,
				'conversionFactor' => 0.0000029445,
				'pointShift' => -5000,
			],
		],
	],
];
