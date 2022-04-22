#!/usr/bin/php
<?php
	if ($argc == 2 && is_readable($argv[1])) {
		$content = file_get_contents($argv[1]) or exit(1);
		$content = preg_replace_callback('/(<a )(.*)(>)(.*)(<\/a>)/is', function($magnify) {
			echo "1: UPPER CALLBACK:\n";
			print_r($magnify);
			$magnify[0] = preg_replace_callback('/( title=\")(.*?)(\")/ism', function($magnify) {
						echo "2: SECOND -NESTED- CALLBACK:\n";
						print_r($magnify);
						return ($magnify[1].strtoupper($magnify[2]).$magnify[3]);
					}, $magnify[0]);
			$magnify[0] = preg_replace_callback("/(>)(.*?)(<)/s", function($magnify) {
				echo "3: LAST CALLBACK\n";
				print_r($magnify);
				return ($magnify[1].strtoupper($magnify[2]).$magnify[3]);
				}, $magnify[0]);
			return ($magnify[0]);
		}, $content);
		echo $content . "\n";
	}
	// s dot matches newline
	// m treat as multi-line string
	// i case insensitive
?>