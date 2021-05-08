<?php

namespace GlaivePro\IaafPoints\Services;

class Files
{
	protected const BASE = __DIR__.'/../../resources/';

	protected string $dir;

	protected array $index;

	public function __construct(string $resource)
	{
		$this->dir = static::BASE.$resource.'/';

		$this->index = $this->listFiles($this->dir);
	}

	/** Get constant file list. */
	public function index(): array
	{
		return $this->index;
	}

	protected function listFiles(): array
	{
		$files = [];

		foreach (scandir($this->dir) as $file)
			if (strpos($file, '.php'))
				$files[basename($file, '.php')] = $this->dir.$file;

		return $files;
	}
}
