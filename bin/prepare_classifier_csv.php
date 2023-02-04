<?php

require_once __DIR__.'/../vendor/autoload.php';

use GlaivePro\IaafPoints\Services\Files;

$dir = __DIR__.'/../data/csv/classifier/';
if (!is_dir($dir))
	mkdir($dir, recursive: true);

$files = new Files('classifier');
foreach ($files->index() as $name => $input) {
	$output = fopen($dir.$name.'.csv', 'w');

	fputcsv($output, [
		'Type',
		'Gender',
		'Discipline',
		'Classification',
		'Threshold',
	]);

	$data = include $input;
	foreach ($data as $type => $genders)
		foreach ($genders as $gender => $disciplines)
			foreach ($disciplines as $discipline => $classes)
				foreach ($classes as $class => $threshold)
					fputcsv($output, [
						$type,
						$gender,
						$discipline,
						$class,
						$threshold,
					]);
}
