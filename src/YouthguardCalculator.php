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

	protected Services\Constants $constants;

	private function loadData()
	{
		//
	}

	public function __construct($options = [])
	{
		$this->constants = new Services\Constants('youthguard');

		$this->setOptions($options);
	}

	/**
	 * Get supported discipline keys for the currently selected options (edition, ageGroup and gender).
	 *
	 * @return array
	 */
	public function getSupportedDisciplineKeys()
	{
		return array_keys($this->constants() ?? []);
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

		$constants = $this->constants()[$discipline] ?? null;

		if (!$constants)
			return;

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

	protected function constants()
	{
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		$ageGroup = $this->options['ageGroup'];

		$constants = $this->constants->edition($edition);

		return $constants[$gender][$ageGroup] ?? [];
	}
}
