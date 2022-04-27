#!/usr/bin/php
<?php
	if ($argc != 4) {
		echo "Incorrect Parameters\n";
		exit (1);
	}
	$n1 = trim($argv[1]);
	$n2 = trim($argv[3]);
	$op = trim($argv[2]);

	if ($op == '+') {
		echo ($n1 + $n2) . "\n";
	}
	else if ($op == '-') {
		echo ($n1 - $n2) . "\n";
	}
	else if ($op == '*') {
		echo ($n1 * $n2) . "\n";
	}
	else if ($op == '/') {
		echo ($n1 / $n2) . "\n";
	}
	else if ($op == '%') {
		echo ($n1 % $n2) . "\n";
	}
?>