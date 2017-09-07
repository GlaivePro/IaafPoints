<?php

namespace GlaivePro\IaafPoints;

Class CombinedCalculator
{
	use OptionsTrait;
	
	/**
	 * @param array $options Allowed keys: 
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + electronicMeasurement = true or false
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	private $options = [
		'discipline' => null,
		'gender' => 'm',
		'electronicMeasurement' => true,
		'edition' => '2001',
	];

	public function __construct($options = []) 
	{
		$this->setOptions($options);
	}
	
	/**
	 * Get supported discipline keys for the currently selected options (edition and gender).
	 *
	 * @return array 
	 */
	public function getSupportedDisciplineKeys()
	{
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		
		if (!isset($this->constants[$edition][$gender]))
			return [];
		
		return array_keys($this->constants[$edition][$gender]);
	}
	
	/**
	 * Calculate points for given result
	 *
	 * @param mixed $results
	 *
	 * @return array
	 */
	private function calculatePoints($result, $discipline)
	{
		if (!$result)
			return null;
		
		if (!$this->options['electronicMeasurement'])  //hand time corrections
		{
			//For sprints & hurdles up to 200m
			if (in_array($discipline, ['60m', '100m', '200m', '60mh', '100mh', '110mh']))
				$result += 0.24;
				
			//For sprints & hurdles up to 500m
			if (in_array($discipline, ['400m']))
				$result += 0.14;
		}
		
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		
		if (!isset($this->constants[$edition][$gender][$discipline]))
			return null;
		
		$constants = $this->constants[$edition][$gender][$discipline];
		
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
	 *   @type float $constants['edition']['gender']['discipline']['resultShift']
	 *   @type float $constants['edition']['gender']['discipline']['conversionFactor']
	 *   @type float $constants['edition']['gender']['discipline']['exponent']
	 */
	private $constants = [
		'2001' => [
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
		],
	];
}