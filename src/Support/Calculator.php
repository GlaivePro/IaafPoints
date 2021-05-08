<?php

namespace GlaivePro\IaafPoints\Support;

use GlaivePro\IaafPoints\Services\Constants;

abstract class Calculator implements CalculatorInterface
{
	use ConstantsTrait;
	use OptionsTrait;

	protected Constants $constants;

	public function __construct($options = [])
	{
		$this->constants = new Constants(static::RESOURCES);

		$this->setOptions($options);
	}

	protected function loadData(): void
	{
		// optional hook, called after setOptions
	}

	/** Return the options-relevant constants keyed by discipline. */
	abstract protected function constants(): array;
}
