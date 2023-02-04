<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$dir = __DIR__.'/../data/csv/iaaf/';
if (!is_dir($dir))
	mkdir($dir, recursive: true);

$files = new Files('iaaf');
foreach ($files->index() as $name => $input) {
	$output = fopen($dir.$name.'.csv', 'w');

	fputcsv($output, [
		'Venue type',
		'Gender',
		'Discipline',
		'Result shift',
		'Conversion factor',
		'Point shift',
	]);

	$data = include $input;
	foreach ($data as $venueType => $genders)
		foreach ($genders as $gender => $disciplines)
			foreach ($disciplines as $discipline => $coefs)
				fputcsv($output, [
					$venueType,
					$gender,
					$discipline,
					$coefs['resultShift'],
					$coefs['conversionFactor'],
					$coefs['pointShift'],
				]);
}
