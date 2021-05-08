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

	protected Services\Constants $constants;

	private $table = null;

	private function loadData()
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

	public function __construct($options = [])
	{
		$this->constants = new Services\Constants('classifier');

		$this->setOptions($options);
	}

	/**
	 * Get supported discipline keys for the currently selected options (edition, venueType and gender).
	 *
	 * @return array
	 */
	public function getSupportedDisciplineKeys()
	{
		return array_keys($this->constants() ?? []);
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

	protected function constants()
	{
		$edition = $this->options['edition'];
		$venueType = $this->options['venueType'];
		$gender = $this->options['gender'];

		$constants = $this->constants->edition($edition);

		return $constants[$venueType][$gender] ?? [];
	}
}
