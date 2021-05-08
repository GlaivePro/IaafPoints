<?php

namespace GlaivePro\IaafPoints;

class YouthguardCalculator extends Support\Calculator
{
	protected const RESOURCES = 'youthguard';

	/**
	 * @param array $options Allowed keys:
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + ageGroup = 'u14', 'u16' or 'u18'
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	protected $options = [
		'discipline' => null,
		'gender' => 'm',
		'ageGroup' => 'u18',
		'edition' => '2018',
	];

	/**
	 * Calculate points for given result
	 *
	 * @param float $result
	 * @param string $discipline
	 *
	 * @return int
	 */
	protected function calculatePoints($result, $discipline)
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
	 * @deprecated
	 */
	public function getPoints($results = null)
	{
		if (!is_array($results))
			return $this->evaluate($results);

		return $this->evaluateMany($results);
	}

	/** Calculate points for result */
	public function evaluate($result = null)
	{
		if (!$result)
			return null;

		return $this->calculatePoints($result, $this->options['discipline']);
	}

	/** Calculate points for many results keyed by discipline. */
	public function evaluateMany(array $results)
	{
		if (!$results)
			return null;

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

	protected function constants(): array
	{
		$edition = $this->options['edition'];
		$gender = $this->options['gender'];
		$ageGroup = $this->options['ageGroup'];

		$constants = $this->constants->edition($edition);

		return $constants[$gender][$ageGroup] ?? [];
	}
}
