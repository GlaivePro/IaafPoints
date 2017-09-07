<?php

namespace GlaivePro\IaafPoints;

Class Classifier
{
	use OptionsTrait;
	
	/**
	 * @param array $options Allowed keys: 
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + venueType - 'outdoor', 'indoor', 'road' or 'trail'; 'field' for any field events
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	private $options = [
		'discipline' => null,
		'gender' => 'm',
		'venueType' => 'outdoor',
		'edition' => 'latvian2013',
	];
	
	private $table = null;
	
	private function loadData()
	{
		$this->table = null;
		
		$edition = $this->options['edition'];
		$venueType = $this->options['venueType'];
		$gender = $this->options['gender'];
		$discipline = $this->options['discipline'];
		
		if (!isset($this->constants[$edition][$venueType][$gender][$discipline]))
			return;
		
		$table = $this->constants[$edition][$venueType][$gender][$discipline];
		
		asort($table);
		
		if ('field' == $this->options['venueType'])
			arsort($table);
		
		$this->table = $table;
	}

	public function __construct($options = []) 
	{
		$this->setOptions($options);
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
	 * Get classification for given result
	 *
	 * @param float $result
	 *
	 * @return string
	 */
	public function getClassification($result)
	{
		if (!$result)
			return null;
		
		if (!$this->table)
			return null;
		
		if ('field' == $this->options['venueType'])
		{
			foreach ($this->table as $class => $threshold)
				if ($result >= $threshold)
					return $class;
		}
		else
			foreach ($this->table as $class => $threshold)
				if ($result <= $threshold)
					return $class;
		
		return 'none';
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
		'latvian2013' => [
			'field' =>[
				'm' => [
					'high_jump' => [
						'LM' => 2.25,
						'SM' => 2.15,
						'SMK' => 2.02,
						'I' => 1.9,
						'II' => 1.75,
						'III' => 1.65,
						'I j.' => 1.55,
						'II j.' => 1.45,
						'III j.' => 1.3,
					],
					'discus_throw_1.75kg' => [
						'SMK' => 53,
						'I' => 45.5,
						'II' => 37.5,
						'III' => 32,
						'I j.' => 28,
					],
				],
				'f' => [
				],
			],
			'outdoor' => [
				'm' => [
					'200m' => [
						'LM' => 20.7,
						'SM' => 21.34,
						'SMK' => 22.04,
						'I' => 23.14,
						'II' => 24.24,
						'III' => 25.94,
						'I j.' => 28.0,
						'II j.' => 29.2,
						'III j.' => 30.5,
					],
				],
				'f' => [
					'200m' => [
						'LM' => 22.95,
						'SM' => 24.24,
						'SMK' => 25.44,
						'I' => 26.84,
						'II' => 28.74,
						'III' => 31.24,
						'I j.' => 32.4,
						'II j.' => 24,
						'III j.' => 36,
					],
				],
			],
			'indoor' => [
				'm' => [
					'200m' => [
						'LM' => 21.1,
						'SM' => 21.84,
						'SMK' => 22.74,
						'I' => 23.64,
						'II' => 24.84,
						'III' => 26.54,
						'I j.' => 27.3,
						'II j.' => 28.6,
						'III j.' => 30,
					],
				],
				'f' => [
				],
			],
			'road' => [
				'm' => [
				],
				'f' => [
				],
			],
			'trail' => [
				'm' => [
				],
				'f' => [
				],
			],
		],
	];
}