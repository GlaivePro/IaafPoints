<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$dir = __DIR__.'/../data/csv/youthguard/';
if (!is_dir($dir))
	mkdir($dir, recursive: true);

$files = new Files('youthguard');
foreach ($files->index() as $name => $input) {
	$output = fopen($dir.$name.'.csv', 'w');

	fputcsv($output, [
		'Gender',
		'Age group',
		'Discipline',
		'Result shift',
		'Conversion factor',
		'Exponent',
	]);

	$data = include $input;
	foreach ($data as $gender => $ageGroups)
		foreach ($ageGroups as $ageGroup => $disciplines)
			foreach ($disciplines as $discipline => $coefs)
				fputcsv($output, [
					$gender,
					$ageGroup,
					$discipline,
					$coefs['resultShift'],
					$coefs['conversionFactor'],
					$coefs['exponent'],
				]);
}
