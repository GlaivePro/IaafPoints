<?php

/**
 * @param array $constants
 *   Array containing coefficients to calculate points.
 *
 *   @type float $constants['edition']['gender']['discipline']['resultShift']
 *   @type float $constants['edition']['gender']['discipline']['conversionFactor']
 *   @type float $constants['edition']['gender']['discipline']['exponent']
 */
return [
	'field' =>[
		'm' => [
			'high_jump' => [
				'LM' => 2.25,
				'SM' => 2.15,
				'SMK' => 2.02,
				'I' => 1.90,
				'II' => 1.75,
				'III' => 1.65,
				'I j.' => 1.55,
				'II j.' => 1.45,
				'III j.' => 1.30,
			],
			'pole_vault' => [
				'LM' => 5.50,
				'SM' => 5.00,
				'SMK' => 4.50,
				'I' => 4.10,
				'II' => 3.50,
				'III' => 3.00,
				'I j.' => 2.60,
				'II j.' => 2.00,
				'III j.' => 1.80,
			],
			'long_jump' => [
				'LM' => 8.00,
				'SM' => 7.60,
				'SMK' => 7.10,
				'I' => 6.60,
				'II' => 6.10,
				'III' => 5.55,
				'I j.' => 5.00,
				'II j.' => 4.60,
				'III j.' => 4.00,
			],
			'triple_jump' => [
				'LM' => 16.85,
				'SM' => 16.20,
				'SMK' => 15.30,
				'I' => 14.20,
				'II' => 13.20,
				'III' => 12.00,
				'I j.' => 11.50,
				'II j.' => 10.50,
				'III j.' => 10.00,
			],
			'discus_throw_2' => [		//weight of tool in kg
				'LM' => 61.00,
				'SM' => 54.50,
				'SMK' => 49.00,
				'I' => 44.00,
				'II' => 37.00,
				'III' => 30.00,
			],
			'discus_throw_1.75' => [	//weight of tool in kg
				'SMK' => 53.00,
				'I' => 45.50,
				'II' => 37.50,
				'III' => 32.00,
				'I j.' => 28.00,
			],
			'discus_throw_1.5' => [		//weight of tool in kg
				'SMK' => 58.00,
				'I' => 52.00,
				'II' => 43.00,
				'III' => 37.00,
				'I j.' => 30.00,
				'II j.' => 25.00,
			],
			'discus_throw_1' => [		//weight of tool in kg
				'I' => 58.00,
				'II' => 50.00,
				'III' => 43.00,
				'I j.' => 35.00,
				'II j.' => 32.00,
				'III j.' => 28.00,
			],
			'hammer_throw_7.26' => [	//weight of tool in kg
				'LM' => 74.00,
				'SM' => 67.00,
				'SMK' => 60.00,
				'I' => 54.00,
				'II' => 47.00,
				'III' => 38.00,
			],
			'hammer_throw_6' => [		//weight of tool in kg
				'SM' => 72.00,
				'SMK' => 64.00,
				'I' => 59.00,
				'II' => 52.00,
				'III' => 43.00,
				'I j.' => 36.00,
				'II j.' => 31.00,
			],
			'hammer_throw_5' => [		//weight of tool in kg
				'SMK' => 68.00,
				'I' => 64.00,
				'II' => 57.00,
				'III' => 47.00,
				'I j.' => 38.00,
				'II j.' => 32.00,
				'III j.' => 28.00,
			],
			'hammer_throw_4' => [		//weight of tool in kg
				'I' => 68.00,
				'II' => 60.00,
				'III' => 53.00,
				'I j.' => 43.00,
				'II j.' => 37.00,
				'III j.' => 30.00,
			],
			'hammer_throw_3' => [		//weight of tool in kg
				'II' => 65.00,
				'III' => 60.00,
				'I j.' => 50.00,
				'II j.' => 40.00,
				'III j.' => 32.00,
			],
			'javelin_throw_800' => [	//weight of tool in grams
				'LM' => 82.00,
				'SM' => 73.00,
				'SMK' => 68.00,
				'I' => 62.00,
				'II' => 54.00,
				'III' => 48.00,
			],
			'javelin_throw_700' => [	//weight of tool in grams
				'SMK' => 67.00,
				'I' => 61.00,
				'II' => 55.00,
				'III' => 45.00,
				'I j.' => 40.00,
				'II j.' => 35.00,
			],
			'javelin_throw_600' => [	//weight of tool in grams
				'I' => 64.00,
				'II' => 56.00,
				'III' => 48.00,
				'I j.' => 45.00,
				'II j.' => 41.00,
				'III j.' => 35.00,
			],
			'javelin_throw_400' => [	//weight of tool in grams
				'I j.' => 47.00,
				'II j.' => 40.00,
				'III j.' => 30.00,
			],
			'shot_put_7.26' => [		//weight of tool in kg
				'LM' => 19.00,
				'SM' => 17.20,
				'SMK' => 15.60,
				'I' => 14.00,
				'II' => 12.00,
				'III' => 10.00,
			],
			'shot_put_6' => [		//weight of tool in kg
				'SMK' => 17.20,
				'I' => 15.50,
				'II' => 13.00,
				'III' => 11.50,
				'I j.' => 9.60,
				'II j.' => 8.60,
			],
			'shot_put_5' => [		//weight of tool in kg
				'SMK' => 17.50,
				'I' => 16.50,
				'II' => 15.00,
				'III' => 12.80,
				'I j.' => 10.00,
				'II j.' => 9.00,
				'III j.' => 8.00,
			],
			'shot_put_4' => [		//weight of tool in kg
				'II' => 14.50,
				'III' => 13.00,
				'I j.' => 11.00,
				'II j.' => 10.00,
				'III j.' => 9.00,
			],
			'shot_put_3' => [		//weight of tool in kg
				'III' => 12.00,
				'I j.' => 10.00,
				'II j.' => 9.00,
				'III j.' => 8.00,
			],
			'decathlon' => [
				'LM' => 7950,
				'SM' => 7300,
				'SMK' => 6600,
				'I' => 6000,
				'II' => 5000,
				'III' => 4100,
			],
			'decathlon_u20' => [
				'SM' => 7300,
				'SMK' => 6500,
				'I' => 6000,
				'II' => 5000,
				'III' => 4000,
			],
			'decathlon_u18' => [
				'SMK' => 6700,
				'I' => 6200,
				'II' => 5300,
				'III' => 4300,
				'I j.' => 3300,
				'II j.' => 2600,
				'III j.' => 2400,
			],
			'nonathlon_u16' => [
				'SMK' => 6000,
				'I' => 5300,
				'II' => 4700,
				'III' => 3800,
				'I j.' => 3000,
				'II j.' => 2600,
				'III j.' => 2200,
			],
			'octathlon_u16' => [
				'SMK' => 5200,
				'I' => 4500,
				'II' => 3900,
				'III' => 3300,
				'I j.' => 2800,
				'II j.' => 2400,
				'III j.' => 2200,
			],
			'heptathlon' => [
				'LM' => 5800,
				'SM' => 5200,
				'SMK' => 4750,
				'I' => 4000,
				'II' => 3400,
				'III' => 2800,
				'I j.' => 2400,
				'II j.' => 2100,
				'III j.' => 2000,
			],
			'heptathlon_u20' => [
				'SMK' => 4050,
				'I' => 3550,
				'II' => 2950,
				'III' => 2300,
				'I j.' => 2000,
				'II j.' => 1700,
				'III j.' => 1300,
			],
			'heptathlon_u18' => [
				'SMK' => 4050,
				'I' => 3550,
				'II' => 2950,
				'III' => 2300,
				'I j.' => 2000,
				'II j.' => 1700,
				'III j.' => 1300,
			],
			'heptathlon_u16' => [
				'I' => 4300,
				'II' => 3850,
				'III' => 3350,
				'I j.' => 2850,
				'II j.' => 2400,
				'III j.' => 1800,
			],
			'pentathlon' => [
				'SMK' => 3600,
				'I' => 3200,
				'II' => 2700,
				'III' => 2200,
				'I j.' => 1950,
				'II j.' => 1650,
				'III j.' => 1250,
			],
		],
		'f' => [
			'high_jump' => [
				'LM' => 1.90,
				'SM' => 1.83,
				'SMK' => 1.75,
				'I' => 1.65,
				'II' => 1.50,
				'III' => 1.40,
				'I j.' => 1.30,
				'II j.' => 1.25,
				'III j.' => 1.20,
			],
			'pole_vault' => [
				'LM' => 4.10,
				'SM' => 3.70,
				'SMK' => 3.40,
				'I' => 3.15,
				'II' => 2.80,
				'III' => 2.40,
				'I j.' => 2.20,
				'II j.' => 2.00,
				'III j.' => 1.80,
			],
			'long_jump' => [
				'LM' => 6.60,
				'SM' => 6.25,
				'SMK' => 5.80,
				'I' => 5.50,
				'II' => 5.20,
				'III' => 4.70,
				'I j.' => 4.20,
				'II j.' => 3.90,
				'III j.' => 3.60,
			],
			'triple_jump' => [
				'LM' => 14.00,
				'SM' => 13.40,
				'SMK' => 12.80,
				'I' => 11.80,
				'II' => 11.20,
				'III' => 10.40,
				'I j.' => 10.00,
				'II j.' => 9.20,
				'III j.' => 8.50,
			],
			'discus_throw_1' => [		//weight of tool in kg
				'LM' => 58.00,
				'SM' => 53.00,
				'SMK' => 46.00,
				'I' => 42.00,
				'II' => 36.00,
				'III' => 29.50,
				'I j.' => 24.00,
				'II j.' => 20.00,
			],
			'discus_throw_0.75' => [	//weight of tool in kg
				'SMK' => 49.00,
				'I' => 44.00,
				'II' => 38.00,
				'III' => 32.00,
				'I j.' => 27.00,
				'II j.' => 23.00,
				'III j.' => 20.00,
			],
			'hammer_throw_4' => [		//weight of tool in kg
				'LM' => 68.00,
				'SM' => 57.00,
				'SMK' => 47.00,
				'I' => 40.00,
				'II' => 35.00,
				'III' => 29.00,
				'I j.' => 25.00,
				'II j.' => 20.00,
			],
			'hammer_throw_3' => [		//weight of tool in kg
				'SM' => 62.00,
				'SMK' => 53.00,
				'I' => 47.00,
				'II' => 39.00,
				'III' => 34.00,
				'I j.' => 29.00,
				'II j.' => 25.00,
				'III j.' => 20.00,
			],
			'hammer_throw_2' => [		//weight of tool in kg
				'I' => 52.00,
				'II' => 44.00,
				'III' => 39.00,
				'I j.' => 34.00,
				'II j.' => 29.00,
				'III j.' => 25.00,
			],
			'javelin_throw_600' => [	//weight of tool in grams
				'LM' => 60.00,
				'SM' => 54.00,
				'SMK' => 48.00,
				'I' => 43.00,
				'II' => 35.00,
				'III' => 30.00,
				'I j.' => 25.00,
			],
			'javelin_throw_500' => [	//weight of tool in grams
				'SM' => 50.00,
				'SMK' => 44.00,
				'I' => 38.00,
				'II' => 27.00,
				'III' => 22.00,
				'I j.' => 18.00,
			],
			'javelin_throw_400' => [	//weight of tool in grams
				'I' => 45.00,
				'II' => 38.00,
				'III' => 35.00,
				'I j.' => 30.00,
				'II j.' => 25.00,
				'III j.' => 20.00,
			],
			'shot_put_4' => [		//weight of tool in kg
				'LM' => 17.50,
				'SM' => 15.00,
				'SMK' => 14.00,
				'I' => 12.50,
				'II' => 10.50,
				'III' => 8.50,
				'I j.' => 7.20,
				'II j.' => 6.50,
			],
			'shot_put_3' => [		//weight of tool in kg
				'SMK' => 15.20,
				'I' => 14.00,
				'II' => 12.00,
				'III' => 9.70,
				'I j.' => 8.00,
				'II j.' => 7.00,
				'III j.' => 6.00,
			],
			'shot_put_2' => [		//weight of tool in kg
				'II' => 12.50,
				'III' => 11.00,
				'I j.' => 9.50,
				'II j.' => 8.00,
				'III j.' => 7.00,
			],
			'heptathlon' => [
				'LM' => 5850,
				'SM' => 5250,
				'SMK' => 4600,
				'I' => 4000,
				'II' => 3200,
				'III' => 2400,
				'I j.' => 2000,
				'II j.' => 1600,
			],
			'heptathlon_u18' => [
				'SMK' => 4700,
				'I' => 4250,
				'II' => 3400,
				'III' => 2700,
				'I j.' => 2200,
				'II j.' => 1800,
				'III j.' => 1600,
			],
			'heptathlon_u16' => [
				'I' => 4000,
				'II' => 3300,
				'III' => 2600,
				'I j.' => 2200,
				'II j.' => 2000,
				'III j.' => 1800,
			],
			'pentathlon' => [
				'LM' => 4500,
				'SM' => 3850,
				'SMK' => 3400,
				'I' => 3000,
				'II' => 2400,
				'III' => 2000,
				'I j.' => 1600,
				'II j.' => 1300,
				'III j.' => 1000,
			],
			'pentathlon_u20' => [
				'SMK' => 3500,
				'I' => 3200,
				'II' => 2800,
				'III' => 2600,
				'I j.' => 2000,
				'II j.' => 1800,
				'III j.' => 1600,
			],
			'pentathlon_u18' => [
				'SMK' => 3500,
				'I' => 3200,
				'II' => 2800,
				'III' => 2600,
				'I j.' => 2000,
				'II j.' => 1800,
				'III j.' => 1600,
			],
			'pentathlon_u16' => [
				'I' => 2900,
				'II' => 2400,
				'III' => 1900,
				'I j.' => 1700,
				'II j.' => 1400,
				'III j.' => 1200,
			],
		],
	],
	'outdoor' => [
		'm' => [
			'30m' => [
				'III' => 4.54,
				'I j.' => 4.5,
				'II j.' => 4.7,
				'III j.' => 5.0,
			],
			'60m' => [
				'LM' => 6.70,
				'SM' => 6.84,
				'SMK' => 7.04,
				'I' => 7.24,
				'II' => 7.44,
				'III' => 7.84,
				'I j.' => 7.9,
				'II j.' => 8.5,
				'III j.' => 8.9,
			],
			'100m' => [
				'LM' => 10.34,
				'SM' => 10.64,
				'SMK' => 10.94,
				'I' => 11.34,
				'II' => 11.94,
				'III' => 12.64,
				'I j.' => 13.0,
				'II j.' => 13.6,
				'III j.' => 14.2,
			],
			'200m' => [
				'LM' => 20.74,
				'SM' => 21.34,
				'SMK' => 22.04,
				'I' => 23.14,
				'II' => 24.24,
				'III' => 25.94,
				'I j.' => 28.0,
				'II j.' => 29.2,
				'III j.' => 30.5,
			],
			'300m' => [
				'SMK' => 34.04,
				'I' => 35.54,
				'II' => 37.54,
				'III' => 40.24,
				'I j.' => 43.4,
				'II j.' => 46.2,
				'III j.' => 49.0,
			],
			'400m' => [
				'LM' => 45.90,
				'SM' => 47.50,
				'SMK' => 49.34,
				'I' => 50.94,
				'II' => 53.94,
				'III' => 57.94,
				'I j.' => 60.2,
				'II j.' => 64.0,
				'III j.' => 66.0,
			],
			'600m' => [
				'SMK' => 79.00,
				'I' => 82.50,
				'II' => 88.00,
				'III' => 96.00,
				'I j.' => 102.0,
				'II j.' => 110.0,
				'III j.' => 118.0,
			],
			'800m' => [
				'LM' => 106.50,
				'SM' => 109.50,
				'SMK' => 114.00,
				'I' => 118.00,
				'II' => 129.00,
				'III' => 140.00,
				'I j.' => 150.00,
				'II j.' => 165.0,
				'III j.' => 175.0,
			],
			'1000m' => [
				'LM' => 138.00,
				'SM' => 141.00,
				'SMK' => 147.00,
				'I' => 155.00,
				'II' => 167.00,
				'III' => 180.00,
				'I j.' => 195.0,
				'II j.' => 210.0,
				'III j.' => 220.0,
			],
			'1500m' => [
				'LM' => 218.00,
				'SM' => 227.00,
				'SMK' => 235.00,
				'I' => 244.00,
				'II' => 260.00,
				'III' => 280.00,
				'I j.' => 300.0,
				'II j.' => 325.0,
				'III j.' => 340.0,
			],
			'3000m' => [
				'LM' => 472.00,
				'SM' => 485.00,
				'SMK' => 506.00,
				'I' => 535.00,
				'II' => 570.00,
				'III' => 620.00,
				'I j.' => 660.0,
				'II j.' => 720.0,
				'III j.' => 750.0,
			],
			'5000m' => [
				'LM' => 810.00,
				'SM' => 840.00,
				'SMK' => 875.00,
				'I' => 920.00,
				'II' => 985.00,
				'III' => 1070.00,
				'I j.' => 1130.0,
				'II j.' => 1230.0,
			],
			'10000m' => [
				'LM' => 1700.00,
				'SM' => 1770.00,
				'SMK' => 1860.00,
				'I' => 1950.00,
				'II' => 2070.00,
				'III' => 2250.00,
			],
			'4x100m' => [
				'LM' => 39.10,
				'SM' => 41.24,
				'SMK' => 42.74,
				'I' => 44.24,
				'II' => 46.24,
				'III' => 49.24,
				'I j.' => 50.9,
				'II j.' => 53.2,
				'III j.' => 56.0,
			],
			'4x400m' => [
				'LM' => 184.30,
				'SM' => 189.00,
				'SMK' => 196.00,
				'I' => 204.00,
				'II' => 216.00,
				'III' => 232.14,
				'I j.' => 240.0,
				'II j.' => 252.0,
				'III j.' => 264.0,
			],
			'400m+300m+200m+100m' => [
				'I' => 120.00,
				'II' => 125.00,
				'III' => 130.00,
				'I j.' => 140.00,
				'II j.' => 145.0,
				'III j.' => 150.0,
			],
			'60mh_106.7' => [		//height of hurdles in cm
				'LM' => 7.75,
				'SM' => 8.10,
				'SMK' => 8.44,
				'I' => 8.94,
				'II' => 9.44,
				'III' => 10.14,
			],
			'60mh_99.1' => [		//height of hurdles in cm
				'SMK' => 8.34,
				'I' => 8.74,
				'II' => 9.24,
				'III' => 9.94,
			],
			'60mh_91.4' => [		//height of hurdles in cm
				'SMK' => 8.24,
				'I' => 8.44,
				'II' => 8.94,
				'III' => 9.74,
				'I j.' => 10.2,
				'II j.' => 10.8,
			],
			'60mh_83.8' => [		//height of hurdles in cm
				'I' => 8.64,
				'II' => 8.94,
				'III' => 9.84,
				'I j.' => 10.3,
				'II j.' => 11.0,
				'III j.' => 12.0,
			],
			'110mh_106.7' => [		//height of hurdles in cm
				'LM' => 13.70,
				'SM' => 14.34,
				'SMK' => 15.14,
				'I' => 16.04,
				'II' => 17.04,
				'III' => 18.54,
			],
			'110mh_99.1' => [		//height of hurdles in cm
				'SMK' => 14.84,
				'I' => 15.54,
				'II' => 16.54,
				'III' => 18.14,
			],
			'110mh_91.4' => [		//height of hurdles in cm
				'SMK' => 14.64,
				'I' => 15.14,
				'II' => 16.04,
				'III' => 17.74,
				'I j.' => 18.8,
				'II j.' => 20.0,
			],
			'110mh_83.8' => [		//height of hurdles in cm
				'I' => 15.44,
				'II' => 16.14,
				'III' => 17.64,
				'I j.' => 19.5,
				'II j.' => 21.5,
				'III j.' => 22.5,
			],
			'300mh' => [		//height of hurdles in cm
				'SMK' => 38.74,
				'I' => 40.74,
				'II' => 43.24,
				'III' => 47.24,
				'I j.' => 50.0,
				'II j.' => 52.0,
			],
			'400mh' => [		//height of hurdles in cm
				'LM' => 49.50,
				'SM' => 52.64,
				'SMK' => 55.14,
				'I' => 58.64,
				'II' => 62.64,
				'III' => 68.14,
				'I j.' => 71.0,
				'II j.' => 76.0,
			],
			'300mh_91.4' => [	//height of hurdles in cm
				'SMK' => 38.74,
				'I' => 40.74,
				'II' => 43.24,
				'III' => 47.24,
				'I j.' => 50.0,
				'II j.' => 52.0,
			],
			'400mh_91.4' => [	//height of hurdles in cm
				'LM' => 49.50,
				'SM' => 52.64,
				'SMK' => 55.14,
				'I' => 58.64,
				'II' => 62.64,
				'III' => 68.14,
				'I j.' => 71.0,
				'II j.' => 76.0,
			],
			'1500mSt' => [		//height of hurdles in cm
				'SMK' => 252.00,
				'I' => 276.00,
				'II' => 294.00,
				'III' => 320.00,
				'I j.' => 336.0,
				'II j.' => 357.0,
				'III j.' => 383.0,
			],
			'2000mSt' => [		//height of hurdles in cm
				'SM' => 345.00,
				'SMK' => 360.00,
				'I' => 380.00,
				'II' => 406.00,
				'III' => 443.00,
				'I j.' => 460.0,
				'II j.' => 520.0,
			],
			'3000mSt' => [		//height of hurdles in cm
				'LM' => 510.00,
				'SM' => 530.00,
				'SMK' => 560.00,
				'I' => 590.00,
				'II' => 630.00,
				'III' => 685.00,
			],
			'1500mSt_91.4' => [	//height of hurdles in cm
				'SMK' => 252.00,
				'I' => 276.00,
				'II' => 294.00,
				'III' => 320.00,
				'I j.' => 336.0,
				'II j.' => 357.0,
				'III j.' => 383.0,
			],
			'2000mSt_91.4' => [	//height of hurdles in cm
				'SM' => 345.00,
				'SMK' => 360.00,
				'I' => 380.00,
				'II' => 406.00,
				'III' => 443.00,
				'I j.' => 460.0,
				'II j.' => 520.0,
			],
			'3000mSt_91.4' => [	//height of hurdles in cm
				'LM' => 510.00,
				'SM' => 530.00,
				'SMK' => 560.00,
				'I' => 590.00,
				'II' => 630.00,
				'III' => 685.00,
			],
		],
		'f' => [
			'30m' => [
				'III' => 5.14,
				'I j.' => 5.0,
				'II j.' => 5.2,
				'III j.' => 5.5,
			],
			'60m' => [
				'LM' => 7.25,
				'SM' => 7.50,
				'SMK' => 7.74,
				'I' => 8.04,
				'II' => 8.44,
				'III' => 9.04,
				'I j.' => 9.1,
				'II j.' => 9.4,
				'III j.' => 9.8,
			],
			'100m' => [
				'LM' => 11.34,
				'SM' => 11.84,
				'SMK' => 12.34,
				'I' => 12.84,
				'II' => 13.64,
				'III' => 14.84,
				'I j.' => 15.2,
				'II j.' => 16.0,
				'III j.' => 17.0,
			],
			'200m' => [
				'LM' => 22.95,
				'SM' => 24.24,
				'SMK' => 25.44,
				'I' => 26.84,
				'II' => 28.74,
				'III' => 31.24,
				'I j.' => 32.4,
				'II j.' => 34.0,
				'III j.' => 36.0,
			],
			'300m' => [
				'SMK' => 39.24,
				'I' => 41.24,
				'II' => 44.24,
				'III' => 48.24,
				'I j.' => 50.0,
				'II j.' => 53.0,
				'III j.' => 56.0,
			],
			'400m' => [
				'LM' => 52.00,
				'SM' => 54.14,
				'SMK' => 57.14,
				'I' => 59.64,
				'II' => 64.14,
				'III' => 70.14,
				'I j.' => 75.0,
				'II j.' => 80.0,
				'III j.' => 82.0,
			],
			'600m' => [
				'SMK' => 92.00,
				'I' => 97.00,
				'II' => 104.50,
				'III' => 115.00,
				'I j.' => 130.0,
				'II j.' => 140.0,
				'III j.' => 145.0,
			],
			'800m' => [
				'LM' => 122.14,
				'SM' => 127.64,
				'SMK' => 132.14,
				'I' => 142.14,
				'II' => 155.14,
				'III' => 175.14,
				'I j.' => 185.0,
				'II j.' => 198.0,
				'III j.' => 215.0,
			],
			'1000m' => [
				'LM' => 156.50,
				'SM' => 164.00,
				'SMK' => 174.00,
				'I' => 185.00,
				'II' => 200.00,
				'III' => 220.00,
				'I j.' => 235.0,
				'II j.' => 250.0,
				'III j.' => 275.0,
			],
			'1500m' => [
				'LM' => 250.00,
				'SM' => 260.00,
				'SMK' => 275.00,
				'I' => 288.00,
				'II' => 310.00,
				'III' => 342.00,
				'I j.' => 363.0,
				'II j.' => 390.0,
				'III j.' => 405.0,
			],
			'3000m' => [
				'LM' => 535.00,
				'SM' => 560.00,
				'SMK' => 585.00,
				'I' => 625.00,
				'II' => 680.00,
				'III' => 750.00,
				'I j.' => 795.0,
				'II j.' => 870.0,
			],
			'5000m' => [
				'LM' => 930.00,
				'SM' => 970.00,
				'SMK' => 1030.00,
				'I' => 1095.00,
				'II' => 1175.00,
				'III' => 1290.00,
			],
			'10000m' => [
				'LM' => 1960.00,
				'SM' => 2040.00,
				'SMK' => 2160.00,
				'I' => 2280.00,
				'II' => 2490.00,
				'III' => 2700.00,
			],
			'4x100m' => [
				'LM' => 43.35,
				'SM' => 45.24,
				'SMK' => 48.24,
				'I' => 51.04,
				'II' => 54.24,
				'III' => 58.74,
				'I j.' => 61.0,
				'II j.' => 64.0,
				'III j.' => 68.0,
			],
			'4x400m' => [
				'LM' => 206.14,
				'SM' => 218.14,
				'SMK' => 227.14,
				'I' => 240.14,
				'II' => 256.14,
				'III' => 280.14,
				'I j.' => 292.0,
				'II j.' => 305.0,
				'III j.' => 320.0,
			],
			'400m+300m+200m+100m' => [
				'I' => 135.00,
				'II' => 142.00,
				'III' => 150.00,
				'I j.' => 160.0,
				'II j.' => 170.0,
				'III j.' => 190.0,
			],
			'60mh_83.8' => [		//height of hurdles in cm
				'LM' => 8.10,
				'SM' => 8.54,
				'SMK' => 8.94,
				'I' => 9.54,
				'II' => 10.34,
				'III' => 11.34,
			],
			'60mh_76.2' => [		//height of hurdles in cm
				'SMK' => 9.04,
				'I' => 9.34,
				'II' => 9.74,
				'III' => 10.64,
				'I j.' => 11.2,
				'II j.' => 12.5,
				'III j.' => 13.0,
			],
			'100mh_83.8' => [		//height of hurdles in cm
				'LM' => 13.20,
				'SM' => 14.00,
				'SMK' => 15.04,
				'I' => 16.14,
				'II' => 17.64,
				'III' => 19.54,
			],
			'100mh_76.2' => [		//height of hurdles in cm
				'SMK' => 14.64,
				'I' => 15.24,
				'II' => 16.24,
				'III' => 18.24,
				'I j.' => 20.0,
				'II j.' => 22.0,
				'III j.' => 23.5,
			],
			'300mh' => [
				'I' => 46.64,
				'II' => 50.14,
				'III' => 55.14,
				'I j.' => 59.0,
				'II j.' => 65.0,
			],
			'400mh' => [
				'LM' => 56.30,
				'SM' => 60.14,
				'SMK' => 63.64,
				'I' => 67.64,
				'II' => 73.14,
				'III' => 80.14,
				'I j.' => 85.0,
				'II j.' => 100.0,
			],
			'300mh_76.2' => [		//height of hurdles in cm
				'I' => 46.64,
				'II' => 50.14,
				'III' => 55.14,
				'I j.' => 59.0,
				'II j.' => 65.0,
			],
			'400mh_76.2' => [		//height of hurdles in cm
				'LM' => 56.30,
				'SM' => 60.14,
				'SMK' => 63.64,
				'I' => 67.64,
				'II' => 73.14,
				'III' => 80.14,
				'I j.' => 85.0,
				'II j.' => 100.0,
			],
			'1500mSt' => [
				'SMK' => 290.00,
				'I' => 315.00,
				'II' => 332.00,
				'III' => 355.00,
				'I j.' => 380.0,
				'II j.' => 397.0,
				'III j.' => 417.0,
			],
			'2000mSt' => [
				'SM' => 400.00,
				'SMK' => 420.00,
				'I' => 435.00,
				'II' => 456.00,
				'III' => 480.00,
				'I j.' => 510.0,
			],
			'3000mSt' => [
				'LM' => 600.00,
				'SM' => 630.00,
				'SMK' => 660.00,
				'I' => 690.00,
				'II' => 730.00,
				'III' => 800.00,
			],
			'1500mSt_76.2' => [		//height of hurdles in cm
				'SMK' => 290.00,
				'I' => 315.00,
				'II' => 332.00,
				'III' => 355.00,
				'I j.' => 380.0,
				'II j.' => 397.0,
				'III j.' => 417.0,
			],
			'2000mSt_76.2' => [		//height of hurdles in cm
				'SM' => 400.00,
				'SMK' => 420.00,
				'I' => 435.00,
				'II' => 456.00,
				'III' => 480.00,
				'I j.' => 510.0,
			],
			'3000mSt_76.2' => [		//height of hurdles in cm
				'LM' => 600.00,
				'SM' => 630.00,
				'SMK' => 660.00,
				'I' => 690.00,
				'II' => 730.00,
				'III' => 800.00,
			],
		],
	],
	'indoor' => [
		'm' => [
			'30m' => [
				'III' => 4.54,
				'I j.' => 4.5,
				'II j.' => 4.7,
				'III j.' => 5.0,
			],
			'60m' => [
				'LM' => 6.7,
				'SM' => 6.84,
				'SMK' => 7.04,
				'I' => 7.24,
				'II' => 7.44,
				'III' => 7.84,
				'I j.' => 7.9,
				'II j.' => 8.5,
				'III j.' => 8.9,
			],
			'200m' => [
				'LM' => 21.10,
				'SM' => 21.84,
				'SMK' => 22.74,
				'I' => 23.64,
				'II' => 24.84,
				'III' => 26.54,
				'I j.' => 27.3,
				'II j.' => 28.6,
				'III j.' => 30.0,
			],
			'300m' => [
				'SMK' => 34.74,
				'I' => 36.24,
				'II' => 38.24,
				'III' => 40.84,
				'I j.' => 44.0,
				'II j.' => 46.5,
				'III j.' => 49.0,
			],
			'400m' => [
				'LM' => 46.80,
				'SM' => 47.94,
				'SMK' => 49.94,
				'I' => 52.64,
				'II' => 55.14,
				'III' => 58.94,
				'I j.' => 61.0,
				'II j.' => 64.0,
				'III j.' => 67.0,
			],
			'600m' => [
				'SMK' => 82.64,
				'I' => 86.64,
				'II' => 91.14,
				'III' => 97.64,
				'I j.' => 101.5,
				'II j.' => 106.5,
				'III j.' => 115.0,
			],
			'800m' => [
				'LM' => 108.50,
				'SM' => 111.14,
				'SMK' => 116.64,
				'I' => 122.14,
				'II' => 131.14,
				'III' => 142.14,
				'I j.' => 150.0,
				'II j.' => 170.0,
				'III j.' => 190.0,
			],
			'1000m' => [
				'LM' => 120.00,
				'SM' => 144.0,
				'SMK' => 150.00,
				'I' => 157.00,
				'II' => 169.00,
				'III' => 182.00,
				'I j.' => 192.0,
				'II j.' => 207.0,
				'III j.' => 224.0,
			],
			'1500m' => [
				'LM' => 220.00,
				'SM' => 228.00,
				'SMK' => 237.00,
				'I' => 250.00,
				'II' => 267.00,
				'III' => 292.00,
				'I j.' => 307.0,
				'II j.' => 340.0,
				'III j.' => 357.0,
			],
			'3000m' => [
				'LM' => 475.00,
				'SM' => 488.00,
				'SMK' => 509.00,
				'I' => 538.00,
				'II' => 573.00,
				'III' => 623.00,
				'I j.' => 653.0,
				'II j.' => 693.0,
			],
			'4x200m' => [
				'SMK' => 89.00,
				'I' => 92.00,
				'II' => 98.00,
				'III' => 105.50,
				'I j.' => 108.0,
				'II j.' => 113.0,
				'III j.' => 120.0,
			],
			'4x400m' => [
				'LM' => 186.00,
				'SM' => 192.00,
				'SMK' => 200.00,
				'I' => 208.00,
				'II' => 220.00,
				'III' => 236.00,
				'I j.' => 244.0,
				'II j.' => 256.0,
				'III j.' => 268.0,
			],
			'60mh_106.7' => [		//height of hurdles in cm
				'LM' => 7.75,
				'SM' => 8.1,
				'SMK' => 8.44,
				'I' => 8.94,
				'II' => 9.44,
				'III' => 10.14,
			],
			'60mh_99.1' => [		//height of hurdles in cm
				'SMK' => 8.34,
				'I' => 8.74,
				'II' => 9.24,
				'III' => 9.94,
			],
			'60mh_91.4' => [		//height of hurdles in cm
				'SMK' => 8.24,
				'I' => 8.44,
				'II' =>8.94,
				'III' => 9.74,
				'I j.' => 10.2,
				'II j.' => 10.8,
			],
			'60mh_83.8' => [		//height of hurdles in cm
				'I' => 18.64,
				'II' => 8.94,
				'III' => 9.84,
				'I j.' => 10.3,
				'II j.' => 11.0,
				'III j.' => 12.0,
			],
			'1500mSt' => [
				'I' => 270.00,
				'II' => 288.00,
				'III' => 314.00,
				'I j.' => 330.0,
				'II j.' => 350.0,
				'III j.' => 385.0,
			],
			'2000mSt' => [
				'SM' => 335.00,
				'SMK' => 350.00,
				'I' => 370.00,
				'II' => 395.00,
				'III' => 435.00,
				'I j.' => 450.0,
			],
			'3000mSt' => [
				'SM' => 518.00,
				'SMK' => 547.00,
				'I' => 575.00,
				'II' => 615.00,
				'III' => 670.00,
			],
			'1500mSt_76.2' => [		//height of hurdles in cm
				'I' => 270.00,
				'II' => 288.00,
				'III' => 314.00,
				'I j.' => 330.0,
				'II j.' => 350.0,
				'III j.' => 385.0,
			],
			'2000mSt_76.2' => [		//height of hurdles in cm
				'SM' => 335.00,
				'SMK' => 350.00,
				'I' => 370.00,
				'II' => 395.00,
				'III' => 435.00,
				'I j.' => 450.0,
			],
			'3000mSt_76.2' => [		//height of hurdles in cm
				'SM' => 518.00,
				'SMK' => 547.00,
				'I' => 575.00,
				'II' => 615.00,
				'III' => 670.00,
			],
		],
		'f' => [
			'30m' => [
				'III' => 5.14,
				'I j.' => 5.0,
				'II j.' => 5.2,
				'III j.' => 5.5,
			],
			'60m' => [
				'LM' => 7.25,
				'SM' => 7.5,
				'SMK' => 7.74,
				'I' => 8.04,
				'II' => 8.44,
				'III' => 9.04,
				'I j.' => 9.1,
				'II j.' => 9.4,
				'III j.' => 9.8,
			],
			'200m' => [
				'LM' => 23.50,
				'SM' => 24.54,
				'SMK' => 26.04,
				'I' => 27.44,
				'II' => 29.24,
				'III' => 31.74,
				'I j.' => 33.0,
				'II j.' => 34.5,
				'III j.' => 36.5,
			],
			'300m' => [
				'SMK' => 39.74,
				'I' => 42.24,
				'II' => 45.24,
				'III' => 49.24,
				'I j.' => 52.0,
				'II j.' => 54.0,
				'III j.' => 57.0,
			],
			'400m' => [
				'LM' => 53.00,
				'SM' => 55.14,
				'SMK' => 57.64,
				'I' => 61.14,
				'II' => 65.14,
				'III' => 71.14,
				'I j.' => 74.0,
				'II j.' => 78.0,
				'III j.' => 83.0,
			],
			'600m' => [
				'SMK' => 95.64,
				'I' => 100.64,
				'II' => 108.14,
				'III' => 117.14,
				'I j.' => 123.0,
				'II j.' => 129.0,
				'III j.' => 138.0,
			],
			'800m' => [
				'LM' => 124.00,
				'SM' => 129.00,
				'SMK' => 134.64,
				'I' => 143.64,
				'II' => 156.64,
				'III' => 176.64,
				'I j.' => 186.5,
				'II j.' => 199.5,
				'III j.' => 216.5,
			],
			'1000m' => [
				'LM' => 158.00,
				'SM' => 166.00,
				'SMK' => 177.00,
				'I' => 187.00,
				'II' => 202.00,
				'III' => 222.00,
				'I j.' => 237.0,
				'II j.' => 252.0,
				'III j.' => 277.0,
			],
			'1500m' => [
				'LM' => 252.00,
				'SM' => 261.50,
				'SMK' => 277.00,
				'I' => 292.00,
				'II' => 317.00,
				'III' => 347.00,
				'I j.' => 367.0,
				'II j.' => 392.0,
				'III j.' => 432.0,
			],
			'3000m' => [
				'LM' => 540.00,
				'SM' => 565.00,
				'SMK' => 591.00,
				'I' => 633.00,
				'II' => 688.00,
				'III' => 753.00,
				'I j.' => 798.0,
				'II j.' => 873.0,
			],
			'4x200m' => [
				'SM' => 96.00,
				'SMK' => 102.00,
				'I' => 107.00,
				'II' => 115.00,
				'III' => 125.00,
				'I j.' => 131.0,
				'II j.' => 137.0,
				'III j.' => 145.0,
			],
			'4x400m' => [
				'LM' => 200.00,
				'SM' => 220.00,
				'SMK' => 230.00,
				'I' => 244.00,
				'II' => 260.00,
				'III' => 284.00,
				'I j.' => 296.0,
				'II j.' => 312.0,
			],
			'60mh_83.8' => [		//height of hurdles in cm
				'LM' => 8.1,
				'SM' => 8.54,
				'SMK' => 8.94,
				'I' => 9.54,
				'II' => 10.34,
				'III' => 11.34,
			],
			'60mh_76.2' => [		//height of hurdles in cm
				'SMK' => 9.04,
				'I' => 9.34,
				'II' => 9.74,
				'III' => 10.64,
				'I j.' => 11.2,
				'II j.' => 12.5,
				'III j.' => 13.0,
			],
			'1500mSt' => [
				'I' => 313.00,
				'II' => 331.00,
				'III' => 347.00,
				'I j.' => 370.0,
				'II j.' => 390.0,
			],
			'2000mSt' => [
				'SM' => 378.00,
				'SMK' => 400.00,
				'I' => 420.00,
				'II' => 440.00,
				'III' => 455.00,
				'I j.' => 470.0,
				'II j.' => 500.0,
			],
			'3000mSt' => [
				'SM' => 610.00,
				'SMK' => 640.00,
				'I' => 680.00,
				'II' => 735.00,
				'III' => 790.00,
			],
			'1500mSt_76.2' => [		//height of hurdles in cm
				'I' => 313.00,
				'II' => 331.00,
				'III' => 347.00,
				'I j.' => 370.0,
				'II j.' => 390.0,
			],
			'2000mSt_76.2' => [		//height of hurdles in cm
				'SM' => 378.00,
				'SMK' => 400.00,
				'I' => 420.00,
				'II' => 440.00,
				'III' => 455.00,
				'I j.' => 470.0,
				'II j.' => 500.0,
			],
			'3000mSt_76.2' => [		//height of hurdles in cm
				'SM' => 610.00,
				'SMK' => 640.00,
				'I' => 680.00,
				'II' => 735.00,
				'III' => 790.00,
			],
		],
	],
	'road' => [
		'm' => [
			'5km' => [
				'SMK' => 900,
				'I' => 930,
				'II' => 975,
				'III' => 1050,
				'I j.' => 1110,
				'II j.' => 1170,
			],
			'10km' => [
				'LM' => 1700,
				'SM' => 1770,
				'SMK' => 1860,
				'I' => 1950,
				'II' => 2040,
				'III' => 2220,
			],
			'15km' => [
				'SMK' => 2820,
				'I' => 2940,
				'II' => 3090,
				'III' => 3360,
			],
			'half_marathon' => [
				'LM' => 3750,
				'SM' => 3930,
				'SMK' => 4080,
				'I' => 4320,
				'II' => 4560,
				'III' => 4980,
			],
			'marathon' => [
				'LM' => 8040,
				'SM' => 8520,
				'SMK' => 8880,
				'I' => 9420,
				'II' => 10800,
				'III' => 13200,
			],
			'50km' => [
				'LM' => 11100,
				'SM' => 11700,
				'SMK' => 12600,
				'I' => 13800,
				'II' => 15000,
				'III' => 16200,
			],
			'100km' => [
				'LM' => 25200,
				'SM' => 27000,
				'SMK' => 28800,
				'I' => 32400,
				'II' => 36000,
				'III' => 43200,
			],
			'24h' => [
				'LM' => 250,
				'SM' => 240,
				'SMK' => 220,
				'I' => 200,
				'II' => 180,
				'III' => 160,
			],
			'1kmW' => [
				'I' => 245,
				'II' => 275,
				'III' => 285,
				'I j.' => 300,
				'II j.' => 315,
				'III j.' => 340,
			],
			'2kmW' => [
				'I' => 510,
				'II' => 560,
				'III' => 600,
				'I j.' => 650,
				'II j.' => 710,
				'III j.' => 750,
			],
			'3kmW' => [
				'LM' => 690,
				'SM' => 735,
				'SMK' => 765,
				'I' => 810,
				'II' => 870,
				'III' => 960,
				'I j.' => 1020,
				'II j.' => 1080,
				'III j.' => 1140,
			],
			'5kmW' => [
				'LM' => 1200,
				'SM' => 1260,
				'SMK' => 1320,
				'I' => 1380,
				'II' => 1500,
				'III' => 1650,
				'I j.' => 1800,
				'II j.' => 1890,
				'III j.' => 1980,
			],
			'10000mW' => [
				'LM' => 2460,
				'SM' => 2580,
				'SMK' => 2730,
				'I' => 2850,
				'II' => 3150,
				'III' => 3450,
				'I j.' => 3660,
				'II j.' => 3900,
			],
			'10kmW' => [
				'LM' => 2460,
				'SM' => 2580,
				'SMK' => 2730,
				'I' => 2850,
				'II' => 3150,
				'III' => 3450,
				'I j.' => 3660,
				'II j.' => 3900,
			],
			'20000mW' => [
				'LM' => 5010,
				'SM' => 5460,
				'SMK' => 5820,
				'I' => 6240,
				'II' => 6720,
				'III' => 36000,
			],
			'20kmW' => [
				'LM' => 5010,
				'SM' => 5460,
				'SMK' => 5820,
				'I' => 6240,
				'II' => 6720,
				'III' => 36000,
			],
			'30kmw' => [
				'LM' => 7620,
				'SM' => 8400,
				'SMK' => 9000,
				'I' => 9900,
				'II' => 10800,
				'III' => 36000,
			],
			'50kmw' => [
				'LM' => 14400,
				'SM' => 15600,
				'SMK' => 17100,
				'I' => 18900,
				'II' => 36000,
			],
		],
		'f' => [
			'5km' => [
				'SMK' => 1035,
				'I' => 1095,
				'II' => 1170,
				'III' => 1260,
				'I j.' => 1320,
				'II j.' => 1410,
			],
			'10km' => [
				'LM' => 1960,
				'SM' => 2040,
				'SMK' => 2160,
				'I' => 2280,
				'II' => 2430,
				'III' => 2640,
			],
			'15km' => [
				'SMK' => 3300,
				'I' => 3480,
				'II' => 3780,
				'III' => 4140,
			],
			'half_marathon' => [
				'LM' => 4410,
				'SM' => 4620,
				'SMK' => 4860,
				'I' => 5160,
				'II' => 5520,
				'III' => 6000,
			],
			'marathon' => [
				'LM' => 9300,
				'SM' => 10080,
				'SMK' => 10800,
				'I' => 11520,
				'II' => 12600,
				'III' => 14400,
			],
			'50km' => [
				'LM' => 13500,
				'SM' => 14400,
				'SMK' => 15300,
				'I' => 16200,
				'II' => 17100,
				'III' => 18000,
			],
			'100km' => [
				'LM' => 30600,
				'SM' => 32400,
				'SMK' => 36000,
				'I' => 39600,
				'II' => 43200,
				'III' => 50400,
			],
			'24h' => [
				'LM' => 220,
				'SM' => 200,
				'SMK' => 180,
				'I' => 160,
				'II' => 140,
				'III' => 120,
			],
			'1kmW' => [
				'I' => 285,
				'II' => 300,
				'III' => 320,
				'I j.' => 330,
				'II j.' => 345,
				'III j.' => 360,
			],
			'2kmW' => [
				'SMK' => 560,
				'I' => 595,
				'II' => 630,
				'III' => 690,
				'I j.' => 780,
				'II j.' => 815,
				'III j.' => 830,
			],
			'3kmW' => [
				'LM' => 780,
				'SM' => 820,
				'SMK' => 880,
				'I' => 940,
				'II' => 1000,
				'III' => 1080,
				'I j.' => 1130,
				'II j.' => 1200,
				'III j.' => 1320,
			],
			'5kmW' => [
				'LM' => 1320,
				'SM' => 1410,
				'SMK' => 1500,
				'I' => 1590,
				'II' => 1710,
				'III' => 1860,
				'I j.' => 1980,
				'II j.' => 2090,
				'III j.' => 2200,
			],
			'10000mW' => [
				'LM' => 2730,
				'SM' => 2910,
				'SMK' => 3120,
				'I' => 3300,
				'II' => 3540,
				'III' => 3900,
				'I j.' => 4080,
				'II j.' => 4320,
			],
			'10kmW' => [
				'LM' => 2730,
				'SM' => 2910,
				'SMK' => 3120,
				'I' => 3300,
				'II' => 3540,
				'III' => 3900,
				'I j.' => 4080,
				'II j.' => 4320,
			],
			'20000mW' => [
				'LM' => 5700,
				'SM' => 6120,
				'SMK' => 6420,
				'I' => 6900,
				'II' => 7500,
				'III' => 36000,
			],
			'20kmW' => [
				'LM' => 5700,
				'SM' => 6120,
				'SMK' => 6420,
				'I' => 6900,
				'II' => 7500,
				'III' => 36000,
			],
		],
	],
	'trail' => [
		'm' => [
			'0.8km' => [
				'I j.' => 150,
				'II j.' => 160,
				'III j.' => 170,
			],
			'1km' => [
				'II' => 165,
				'III' => 180,
				'I j.' => 185,
				'II j.' => 190,
				'III j.' => 200,
			],
			'1.5km' => [
				'II' => 265,
				'III' => 294,
				'I j.' => 320,
				'II j.' => 340,
			],
			'2km' => [
				'II' => 365,
				'III' => 395,
				'I j.' => 405,
				'II j.' => 430,
				'III j.' => 445,
			],
			'3km' => [
				'SMK' => 508,
				'I' => 530,
				'II' => 570,
				'III' => 610,
				'I j.' => 640,
				'II j.' => 680,
				'III j.' => 700,
			],
			'5km' => [
				'SMK' => 880,
				'I' => 920,
				'II' => 980,
				'III' => 1050,
				'I j.' => 1100,
				'II j.' => 1140,
				'III j.' => 1200,
			],
			'6km' => [
				'SMK' => 1070,
				'I' => 1125,
				'II' => 1200,
				'III' => 1320,
				'I j.' => 1500,
			],
			'8km' => [
				'SMK' => 1460,
				'I' => 1520,
				'II' => 1620,
				'III' => 1740,
				'I j.' => 1800,
			],
			'10km' => [
				'SMK' => 1845,
				'I' => 1935,
				'II' => 2070,
				'III' => 2280,
			],
			'12km' => [
				'SMK' => 2260,
				'I' => 2355,
				'II' => 2540,
				'III' => 2790,
			],
			'14km' => [
				'SMK' => 2660,
				'I' => 2790,
				'II' => 3000,
				'III' => 3300,
			],
		],
		'f' => [
			'0.5km' => [
				'SMK' => 76,
				'I' => 81,
				'II' => 87,
				'III' => 95,
				'I j.' => 102,
				'II j.' => 110,
				'III j.' => 120,
			],
			'1km' => [
				'SMK' => 173,
				'I' => 183,
				'II' => 195,
				'III' => 213,
				'I j.' =>220,
				'II j.' => 255,
				'III j.' => 270,
			],
			'1.5km' => [
				'SMK' => 277,
				'I' => 292,
				'II' => 315,
				'III' => 350,
				'I j.' => 380,
				'II j.' => 410,
				'III j.' => 430,
			],
			'2km' => [
				'SMK' => 380,
				'I' => 405,
				'II' => 435,
				'III' => 470,
				'I j.' => 492,
				'II j.' => 520,
			],
			'3km' => [
				'SMK' => 590,
				'I' => 630,
				'II' => 680,
				'III' => 750,
				'I j.' => 765,
				'II j.' => 810,
			],
			'4km' => [
				'SMK' => 810,
				'I' => 865,
				'II' => 930,
				'III' => 1010,
				'I j.' => 1040,
				'II j.' => 1100,
			],
			'5km' => [
				'SMK' => 1020,
				'I' => 1090,
				'II' => 1170,
				'III' => 1310,
				'I j.' => 1410,
			],
			'6km' => [
				'SMK' => 1260,
				'I' => 1340,
				'II' => 1440,
				'III' => 1620,
			],
		],
	],
];