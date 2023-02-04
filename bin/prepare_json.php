<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$targetDir = __DIR__.'/../data/json/';

$resources = ['iaaf', 'classifier', 'combined', 'youthguard'];

foreach ($resources as $resource) {
	$files = new Files($resource);

	$dir = $targetDir.$resource.'/';
	if (!is_dir($dir))
		mkdir($dir, recursive: true);

	foreach ($files->index() as $name => $file) {
		$data = include $file;

		file_put_contents(
			$dir.$name.'.json',
			json_encode($data, JSON_PRETTY_PRINT),
		);
	}
}
