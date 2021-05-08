<?php

namespace GlaivePro\IaafPoints;

trait OptionsTrait
{
	// Must be set on class
	// protected $resourceDir;

	protected $files;

	/**
	 * Get current options
	 *
	 * @return array
	 */
	public function getOptions()
	{
		return $this->options;
	}

	/**
	 * Set options. You can also pass options to constructor.
	 *
	 * @param array $options See property $options on classes to see the available keys
	 */
	public function setOptions(array $options)
	{
		foreach ($options as $option => $value)
			if (array_key_exists($option, $this->options))
				$this->options[$option] = $value;

		$this->loadData();
	}

	/**
	 * Get supported formula editions. Sorted starting with the most recent.
	 *
	 * @return array
	 */
	public function getSupportedEditionKeys()
	{
		$editions = $this->constants->editions();
		natsort($editions);
		return array_reverse($editions);
	}
}
