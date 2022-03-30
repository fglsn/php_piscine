#!/usr/bin/php
<?php

	$input = fopen('php://stdin', 'r');

	while ($input && !feof($input))
	{
		echo "Enter a number: ";
		$n = str_replace("\n", "", fgets($input));
		if ($n) {
			switch (n) {
				case is_numeric($n) && $n % 2 == 0:
					echo "The number $n is even\n";
					break;
				case is_numeric($n) && $n % 2 != 0:
					echo "The number $n is odd\n";
					break;
				case $n == '';
					echo "The number $n is odd\n";
					break;
				default:
					echo "'$n' is not a number\n";
			}
		}
	}
	echo "\n";
?>