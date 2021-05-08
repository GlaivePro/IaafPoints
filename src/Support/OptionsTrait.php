<?php

namespace GlaivePro\IaafPoints\Support;

trait OptionsTrait
{
	/**
	 * Get current options
	 *
	 * @return array
	 */
	public function getOptions(): array
	{
		return $this->options;
	}

	/**
	 * Set options. You can also pass options to constructor.
	 *
	 * @param array $options See property $options on classes to see the available keys
	 */
	public function setOptions(array $options): void
	{
		foreach ($options as $option => $value)
			if (array_key_exists($option, $this->options))
				$this->options[$option] = $value;

		$this->loadData();
	}
}
