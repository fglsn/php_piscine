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
				printf("%-8s %-8s %s %2s %s\n", 
					trim($parsed['usr']), 
					trim($parsed['tty']),
					date("M", $parsed['time']),
					date("j", $parsed['time']),
					date("H:i", $parsed['time']));
			}
		}
	}

	//unpack format charachters: https://www.php.net/manual/en/function.pack.php 
	//macos utmpx record: https://github.com/libyal/dtformats/blob/main/documentation/Utmp%20login%20records%20format.asciidoc#32-record
	//user, terminal id, terminal name, process id, logintype, unknown, timestamp
	//!!test layout of output on different machines and terminals!! -fixced

?>