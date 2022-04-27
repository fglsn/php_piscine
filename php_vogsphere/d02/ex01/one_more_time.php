#!/usr/bin/php 
<?php

function check_format($date) {
	$pattern = '/[A-Za-z][a-zàâçéèêëîïôûùüÿñæœ]+ \d{1,2} [A-Za-z][a-zàâçéèêëîïôûùüÿñæœ]+ \d{4} \d{2}:\d{2}:\d{2}/';
	if (!preg_match($pattern, $date)) {
		echo "Wrong Format\n";
		exit();
	}
}

function parse_date($date) {
	$time_format = '%A %d %B %Y %H:%M:%S';
	$parsed_date = strptime($date, $time_format);
	if (!$parsed_date) {
		echo "Wrong Format\n";
		exit();
	}
	else {
		$result = mktime($parsed_date['tm_hour'], $parsed_date['tm_min'], $parsed_date['tm_sec'],
		 $parsed_date['tm_mon'] + 1, $parsed_date['tm_mday'], $parsed_date['tm_year'] + 1900);
		if (date("w", $result) == $parsed_date['tm_wday'])
			echo $result . "\n";
		else
			echo "Wrong Format\n";
	}
}

if ($argc == 2) {
	setlocale($LC_TIME, "fr_FR"); 
	date_default_timezone_set('Europe/Paris');
	check_format($argv[1]);
	parse_date($argv[1]);
}
?>