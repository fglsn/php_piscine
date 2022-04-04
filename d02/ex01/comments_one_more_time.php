#!/usr/bin/php 
<?php

setlocale($LC_TIME, "fr_FR"); //or all? 
date_default_timezone_set('Europe/Paris');

if ($argc == 2) {
	$pattern = '/[A-Za-z][a-z]+ \d{1,2} [A-Za-z][a-z]+ \d{4} \d{2}:\d{2}:\d{2}/';
	$match = array($match);
	preg_match($pattern, $argv[1], $match);
	print_r($match);
	$form = '%A %d %B %Y %X';
	$res = strptime($argv[1], $form); //will not work on php >= 8.0
	if (!$res) {
		echo "Wrong Format\n";
		exit();
	}
	else {
		echo mktime($res['tm_hour'], $res['tm_min'], $res['tm_sec'], $res['tm_mon'] + 1, $res['tm_mday'], $res['tm_year'] + 1900);
	}
}

//$print_r($res);
// man mktime https://www.php.net/manual/en/function.mktime
// man strptime https://www.php.net/manual/en/function.strptime.php
//"Mardi 12 Novembre 2013 12:02:21"  == 1384254141
//"vendredi 1 avril 2022 20:22:21" == 1648837341
//"dimanche 30 janvier 1994 16:15:34" == 759942934



//not valid "vendredi 1avril2022 20:22:21"
?>

