<?php

namespace GlaivePro\IaafPoints;

Class YouthguardCalculator
{
	use OptionsTrait;
	
	/**
	 * @param array $options Allowed keys: 
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + ageGroup = 'u14', 'u16' or 'u18'
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	private $options = [
		'discipline' => null,
		'gender' => 'm',
		'ageGroup' => 'u18',
		'edition' => '2018',
	];
	
	private function loadData()
	{
		//
	}

	public function __construct($options = []) 
	{
		$this->setOptions($options);
	}
	
	/**
	 * Get supported discipline keys for the currently selected options (edition, ageGroup and gender).
	 *
	 * @return array 
	 */
	public function getSupportedDisciplineKeys()
	{
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		$ageGroup = $this->options['ageGroup'];
		
		if (!isset($this->constants[$edition][$gender][$ageGroup]))
			return [];
		
		return array_keys($this->constants[$edition][$gender][$ageGroup]);
	}
	
	/**
	 * Calculate points for given result
	 *
	 * @param float $result
	 * @param string $discipline
	 *
	 * @return int
	 */
	private function calculatePoints($result, $discipline)
	{
		if (!$result)
			return null;
		
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		$ageGroup = $this->options['ageGroup'];
		
		if (!isset($this->constants[$edition][$gender][$ageGroup][$discipline]))
			return null;
		
		$constants = $this->constants[$edition][$gender][$ageGroup][$discipline];
		
		$resultShift = $constants['resultShift'];
		$conversionFactor = $constants['conversionFactor'];
		$exponent = $constants['exponent'];
		
		$shiftedResult = $result - $resultShift;
		if ($resultShift < 0)
			$shiftedResult = -($result + $resultShift);
		
		if ($shiftedResult < 0)
			return 0;
		
		$points = $conversionFactor * ($shiftedResult**$exponent);
		
		return floor($points);
	}
	
	
	/**
	 * Calculate points for result or array of results
	 *
	 * @param mixed $results
	 *
	 * @return array
	 */
	public function getPoints($results = null)
	{
		if (!$results)
			return null;
		
		if (!is_array($results))
			return $this->calculatePoints($results, $this->options['discipline']);
	
		$total = 0;
		foreach ($results as $discipline => $result)
		{
			$points = $this->calculatePoints($result, $discipline);
			$results[$discipline] = $points;
			$total += $points;
		}
		
		$results['total'] = $total;
		
		return $results;
	}
	
	/**
	 * @param array $constants
	 *   Array containing coefficients to calculate points.
	 *   
	 *   @type float $constants['edition']['gender']['discipline']['ageGroup']['resultShift']
	 *   @type float $constants['edition']['gender']['discipline']['ageGroup']['conversionFactor']
	 *   @type float $constants['edition']['gender']['discipline']['ageGroup']['exponent']
	 */
	private $constants = [
		'2018' => [
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
		],
	];
}