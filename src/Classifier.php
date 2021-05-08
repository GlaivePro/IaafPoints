<?php

namespace GlaivePro\IaafPoints;

class Classifier extends Support\Calculator
{
	protected const RESOURCES = 'classifier';

	/**
	 * @param array $options Allowed keys:
	 *  + edition - string - use getSupportedEditionKeys() method for array of available options
	 *  + gender - 'f' or 'm'
	 *  + venueType - 'outdoor', 'indoor', 'road' or 'trail'; 'field' for any field events
	 *	+ discipline - string - after setting other options use getSupportedDisciplineKeys() method for array of available options
	 */
	protected $options = [
		'discipline' => null,
		'gender' => 'm',
		'venueType' => 'outdoor',
		'edition' => 'latvian2018',
	];

	protected $table = null;

	protected function loadData(): void
	{
		$this->table = null;

		$discipline = $this->options['discipline'];

		$table = $this->constants()[$discipline] ?? null;

		if (!$table)
			return;

		asort($table);

		if ('field' == $this->options['venueType'])
			arsort($table);

		$this->table = $table;
	}

	/**
	 * Get classification for given result
	 *
	 * @param float $result
	 *
	 * @return string
	 */
	public function evaluate($result)
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
	 * @deprecated
	 */
	public function getClassification($result)
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
