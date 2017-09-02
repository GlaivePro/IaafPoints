<?php

namespace GlaivePro\IaafPoints;

Class IaafCalculator
{
	private $options = [
		'discipline' => null,
		'gender' => 'm',
		'electronicMeasurement' => true,
		'venueType' => 'outdoor',
		'edition' => '2017',
	];
	
	private $resultShift = null;
	private $conversionFactor = null;
	private $pointShift = null;
	
	private function loadConstants()
	{
		$this->resultShift = $this->conversionFactor = $this->pointShift = null;
		
		$edition = $this->options['edition'];
		$venueType = $this->options['venueType'];
		$gender = $this->options['gender'];
		$discipline = $this->options['discipline'];
		
		if (!isset($this->constants[$edition][$venueType][$gender][$discipline]))
			return;
		
		$constants = $this->constants[$edition][$venueType][$gender][$discipline];
		
		$this->resultShift = $constants['resultShift'];
		$this->conversionFactor = $constants['conversionFactor'];
		$this->pointShift = $constants['pointShift'];
	}

	public function __construct($options = []) 
	{
		$this->setOptions($options);
	}
	
	/**
	 * Get current options
	 *
	 * @return array
	 */
	public function getOptions()
	{
		return $this->options;
	}
	
	/**
	 * Set options. You can also pass options to constructor.
	 *
	 * @param array $options Allowed keys: 
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + electronicMeasurement = true or false
	 *  + venueType - 'indoor' or 'outdoor'
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	public function setOptions(array $options)
	{	
		foreach ($options as $option => $value)
			if (array_key_exists($option, $this->options))
				$this->options[$option] = $value;
			
		$this->loadConstants();
	}
	
	/**
	 * Get supported IAAF Scoring table editions. Sorted starting with the most recent.
	 *
	 * @return array 
	 */
	public function getSupportedEditionKeys()
	{
		$editions = array_keys($this->constants);
		natsort($editions);
		return array_reverse($editions);
	}
	
	/**
	 * Get supported discipline keys for the currently selected options (edition, venueType and gender).
	 *
	 * @return array 
	 */
	public function getSupportedDisciplineKeys()
	{
		$edition = $this->options['edition'];
		$venueType = $this->options['venueType'];
		$gender = $this->options['gender'];
		
		if (!isset($this->constants[$edition][$venueType][$gender]))
			return [];
		
		return array_keys($this->constants[$edition][$venueType][$gender]);
	}
	/**
	 * Calculate points for given result.
	 *
	 * @param float $result Result in meters, seconds or points (depending on discipline).
	 *
	 * @return int
	 */
	public function getPoints($result)
	{
		if (!$result)
			return null;
		
		if (null === $this->resultShift || null === $this->conversionFactor || null === $this->pointShift)
			return null;
		
		if (!$this->options['electronicMeasurement'])  //hand time corrections
		{
			//For sprints & hurdles up to 200m
			if (in_array($this->options['discipline'], ['50m', '55m', '60m', '100m', '200m', '50mh', '55mh', '60mh', '100mh', '110mh']))
				$result += 0.24;
				
			//For sprints & hurdles up to 500m
			if (in_array($this->options['discipline'], ['300m', '400m', '500m', '400mh']))
				$result += 0.14;
		}
		
		$shiftedResult = $result + $this->resultShift;
		
		// for some (track) disciplines the resultShift is subtracting "0 points etalon" and shifted result above 0 means no points are awarded
		if ($this->resultShift < 0 && $shiftedResult >= 0)
			return 0;
		
		$points = ($this->conversionFactor * $shiftedResult * $shiftedResult) + $this->pointShift;
		
		if ($points <= 0)
			return 0;
		
		return floor($points);
	}
	
	/**
	 * @param array $constants
	 *   Array containing coefficients to calculate points.
	 *   
	 *   @type array $constants['edition']['venueType']['gender']['discipline']['resultShift']
	 *   @type array $constants['edition']['venueType']['gender']['discipline']['conversionFactor']
	 *   @type float $constants['edition']['venueType']['gender']['discipline']['pointShift']
	 */
	private $constants = [
		'2017' => [
			'outdoor' => [
				'm' => [
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
					'400m' => [
						'resultShift' => -79,
						'conversionFactor' => 1.021,
						'pointShift' => 0,
					],
					'800m' => [
						'resultShift' => -182,
						'conversionFactor' => 0.198,
						'pointShift' => 0,
					],
					'1500m' => [
						'resultShift' => -385,
						'conversionFactor' => 0.04066,
						'pointShift' => 0,
					],
					'3000m' => [
						'resultShift' => -840,
						'conversionFactor' => 0.00815,
						'pointShift' => 0,
					],
					'5000m' => [
						'resultShift' => -1440,
						'conversionFactor' => 0.002778,
						'pointShift' => 0,
					],
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
					'3000mSt' => [
						'resultShift' => -1020,
						'conversionFactor' => 0.004316,
						'pointShift' => 0,
					],
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
						'resultShift' => 2669.4,
						'conversionFactor' => 0.0028038,
						'pointShift' => -20000,
					],
					'javelin_throw' => [
						'resultShift' => 2886.8,
						'conversionFactor' => 0.0023974,
						'pointShift' => -20000,
					],
				],
				'f' => [
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
					'400m' => [
						'resultShift' => -110,
						'conversionFactor' => 0.335,
						'pointShift' => 0,
					],
					'800m' => [
						'resultShift' => -250,
						'conversionFactor' => 0.0688,
						'pointShift' => 0,
					],
					'1500m' => [
						'resultShift' => -540,
						'conversionFactor' => 0.0134,
						'pointShift' => 0,
					],
					'3000m' => [
						'resultShift' => -1200,
						'conversionFactor' => 0.002539,
						'pointShift' => 0,
					],
					'5000m' => [
						'resultShift' => -2100,
						'conversionFactor' => 0.000808,
						'pointShift' => 0,
					],
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
					'3000mSt' => [
						'resultShift' => -1510,
						'conversionFactor' => 0.001323,
						'pointShift' => 0,
					],
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
				],
			],
			'indoor' => [
				'm' => [
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
					'conversionFactor' => 0.1975,
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
					'conversionFactor' => 0.007211,
					'pointShift' => 0,
				],
				'5000m' => [
					'resultShift' => -1440,
					'conversionFactor' => 0.0029,
					'pointShift' => 0,
				],
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
				'heptathlon' => [
					'resultShift' => 53209,
					'conversionFactor' => 0.00000175,
					'pointShift' => -5000,
				],
				],
				'f' => [
					
				],
			],
		],
	];
}