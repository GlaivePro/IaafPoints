<?php

namespace GlaivePro\IaafPoints\Services;

class Constants
{
	protected Files $files;
	protected array $editions;

	public function __construct(string $resource)
	{
		$this->files = new Files($resource);
	}

	public function editions(): array
	{
		return array_keys($this->files->index());
	}

	public function edition(string $edition): array
	{
		// Cache loaded constants
		$this->editions[$edition] ??= $this->loadEdition($edition);

		return $this->editions[$edition];
	}

	protected function loadEdition(string $edition): array
	{
		$files = $this->files->index();

		$file = $files[$edition] ?? '';

		if (!file_exists($file))
			throw new \Exception('Edition '.$edition.' does not exist');

		return include($file);
	}
}
