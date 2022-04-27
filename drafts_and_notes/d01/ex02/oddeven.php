#!/usr/bin/php
<?php

	$stdin = fopen('php://stdin', 'r');

	while ($stdin && !feof($stdin))
	{
		echo "Enter a number: ";
		$n = fgets($stdin);
		if ($n) {
			$n = str_replace("\n", "", $n);
			if (is_numeric($n)) {
				$mod = $n % 2;
				switch ($mod) {
					case 0;
						echo "The number $n is even\n";
						break;
					case !0:
						echo "The number $n is odd\n";
						break;
				}
			}
			else {
				echo "'$n' is not a number\n";
			}
		}
	}
	echo "\n";
	fclose($stdin);
?>