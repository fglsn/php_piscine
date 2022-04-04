#!/usr/bin/php

function	
<?php
	if ($argc == 2 && is_readable($argv[1])) {
		$content = file_get_contents($argv[1]) or exit(1);
		$content = preg_replace_callback('/(<a )(.*)(>)(.*)(<\/a>)/is', function($magnify) {
			// echo "1:\n" . print_r($magnify);
			// print_r($magnify);
			$magnify[0] = preg_replace_callback('/( title=\")(.*?)(\")/im', function($magnify) {
						// echo "2:\n";
						// print_r($magnify);
						return ($magnify[1].strtoupper($magnify[2]).$magnify[3]);
					}, $magnify[0]);
			$magnify[0] = preg_replace_callback("/(>)(.*?)(<)/s", function($magnify) {
				// echo "3:\n";
				// print_r($magnify);
				return ($magnify[1].strtoupper($magnify[2]).$magnify[3]);
				}, $magnify[0]);
			return ($magnify[0]);
		}, $content);
		echo $content . "\n";
	}
?>