<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$dir = __DIR__.'/../data/csv/combined/';
if (!is_dir($dir))
	mkdir($dir, recursive: true);

$files = new Files('combined');
foreach ($files->index() as $name => $input) {
	$output = fopen($dir.$name.'.csv', 'w');

	fputcsv($output, [
		'Gender',
		'Discipline',
		'Result shift',
		'Conversion factor',
		'Exponent',
	]);

	$data = include $input;
	foreach ($data as $gender => $disciplines)
		foreach ($disciplines as $discipline => $coefs)
			fputcsv($output, [
				$gender,
				$discipline,
				$coefs['resultShift'],
				$coefs['conversionFactor'],
				$coefs['exponent'],
			]);
}
