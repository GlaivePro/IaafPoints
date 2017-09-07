<?php

$codeDir = __DIR__ . DIRECTORY_SEPARATOR .'src';

require_once $codeDir. DIRECTORY_SEPARATOR .'OptionsTrait.php';

foreach (scandir($codeDir) as $file)
	if (strpos($file, '.php'))
		require_once $codeDir. DIRECTORY_SEPARATOR .$file;