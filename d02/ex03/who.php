#!/usr/bin/php
<?php
	$utmpx = "/var/run/utmpx";
	date_default_timezone_set('Europe/Helsinki');

	if (is_readable($utmpx)) {
		$fp = fopen($utmpx, "r");
		while ($line = fread($fp, 628)) {
			$parsed = unpack("a256usr/i1tid/a32tty/i1pid/s1logintype/s1unknown/i1time", $line);
			//print_r($parsed);
			if ($parsed['logintype'] == 7) {

				$usr = str_pad(substr(trim($parsed['usr']), 0, 8), 8, " ") . " ";
				$tty = str_pad(substr(trim($parsed['tty']), 0, 8), 8, " ") . " ";
				$month = date("M", $parsed['time']);
				$day = str_pad(date("j", $parsed['time']), 3, " ", STR_PAD_LEFT) . " ";
				$time = date("H:i", $parsed['time']); //check when date > 10
				//echo $time . "\n";
				echo $usr . $tty . $month . $day . $time . "\n";
			}
		}
	}

	//unpack format charachters: https://www.php.net/manual/en/function.pack.php 
	//macos utmpx record: https://github.com/libyal/dtformats/blob/main/documentation/Utmp%20login%20records%20format.asciidoc#32-record
	//user, terminal id, terminal name, process id, logintype, unknown, timestamp
	//!!test layout of output on different machines and terminals!! -fixced

?>