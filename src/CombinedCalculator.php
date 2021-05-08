<?php

namespace GlaivePro\IaafPoints;

class CombinedCalculator extends Support\Calculator
{
	protected const RESOURCES = 'combined';

	/**
	 * @param array $options Allowed keys:
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + electronicMeasurement = true or false
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	protected $options = [
		'discipline' => null,
		'gender' => 'm',
		'electronicMeasurement' => true,
		'edition' => '2001',
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
	 * @deprecated
	 */
	public function getPoints($results = null)
	{
		if (!is_array($results))
			return $this->evaluate($results);

		return $this->evaluateMany($results);
	}

	/** Calculate points for result */
	public function evaluate($result)
	{
		if (!$result)
			return null;

		return $this->calculatePoints($result, $this->options['discipline']);
	}

	/** Calculate points for many results keyed by discipline. */
	public function evaluateMany(array $results = null)
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

		$constants = $this->constants->edition($edition);

		return $constants[$gender] ?? [];
	}
}
