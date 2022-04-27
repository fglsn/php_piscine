#!/usr/bin/php
<?php

	$n1 = trim($argv[1]);
	$n2 = trim($argv[3]);
	$op = trim($argv[2]);
	echo $op;
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