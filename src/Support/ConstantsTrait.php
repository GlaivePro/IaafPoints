<?php

namespace GlaivePro\IaafPoints\Support;

trait ConstantsTrait
{
	public function getSupportedEditionKeys(): array
	{
		$editions = $this->constants->editions();
		natsort($editions);
		return array_reverse($editions);
	}

	public function getSupportedDisciplineKeys(): array
	{
		return array_keys($this->constants() ?? []);
	}
}
