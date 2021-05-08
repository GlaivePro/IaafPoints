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

	protected Services\Constants $constants;

	private function loadData()
	{
		//
	}

	public function __construct($options = [])
	{
		$this->constants = new Services\Constants('combined');

		$this->setOptions($options);
	}

	/**
	 * Get supported discipline keys for the currently selected options (edition and gender).
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

		if (!$this->options['electronicMeasurement'])  //hand time corrections
		{
			//For sprints & hurdles up to 200m
			if (in_array($discipline, ['60m', '100m', '200m', '60mh', '100mh', '110mh']))
				$result += 0.24;

			//For sprints & hurdles up to 500m
			if (in_array($discipline, ['400m']))
				$result += 0.14;
		}


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

		$constants = $this->constants->edition($edition);

		return $constants[$gender] ?? [];
	}
}
