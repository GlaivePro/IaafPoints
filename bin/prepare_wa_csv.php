<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$targetDir = __DIR__.'/../data/csv/';

/**
 * Print WA point coefs
 */
$files = new Files('iaaf');

$dir = $targetDir.'iaaf/';
if (!is_dir($dir))
	mkdir($dir, recursive: true);

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
