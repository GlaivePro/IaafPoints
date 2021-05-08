<?php

namespace GlaivePro\IaafPoints\Support;

interface CalculatorInterface
{
	/** Get supported formula editions. Sorted starting with the most recent. */
	public function getSupportedEditionKeys(): array;

	/** Get supported discipline keys for the currently selected options. */
	public function getSupportedDisciplineKeys(): array;

	/** Get current options. */
	public function getOptions(): array;

	/** Set options. You can also pass options to constructor. */
	public function setOptions(array $options): void;
}
