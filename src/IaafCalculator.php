<?php

namespace GlaivePro\IaafPoints;

class IaafCalculator extends Support\Calculator
{
	protected const RESOURCES = 'iaaf';

	/**
	 * @param array $options Allowed keys:
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + electronicMeasurement = true or false
	 *  + venueType - 'indoor' or 'outdoor'
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	protected $options = [
		'discipline' => null,
		'gender' => 'm',
		'electronicMeasurement' => true,
		'venueType' => 'outdoor',
		'edition' => '2017',
	];

	protected $resultShift;
	protected $conversionFactor;
	protected $pointShift;

	protected function loadData(): void
	{
		$this->resultShift = $this->conversionFactor = $this->pointShift = null;

		$discipline = $this->options['discipline'];

		$constants = $this->constants()[$discipline] ?? null;

		if (!$constants)
			return;

		$this->resultShift = $constants['resultShift'];
		$this->conversionFactor = $constants['conversionFactor'];
		$this->pointShift = $constants['pointShift'];
	}

	/**
	 * Calculate points for given result.
	 *
	 * @param float $result Result in meters, seconds or points (depending on discipline).
	 *
	 * @return int
	 */
	public function evaluate($result)
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
	 * @deprecated
	 */
	public function getPoints($result)
	{
		return $this->evaluate($result);
	}

	protected function constants(): array
	{
		$edition = $this->options['edition'];
		$venueType = $this->options['venueType'];
		$gender = $this->options['gender'];

		$constants = $this->constants->edition($edition);

		return $constants[$venueType][$gender] ?? [];
	}
}
