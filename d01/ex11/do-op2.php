#!/usr/bin/php
<?php
	if ($argc != 2) {
		echo "Incorrect Parameters\n";
		exit (1);
	}
	
	$arr = preg_split("/([\%\/\*\-\+])/", $argv[1], -1, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
	for ($i = 0; $i < count($arr); $i++) {
		$arr[$i] = trim($arr[$i]);
	}

	if (count($arr) != 3 || !is_numeric($arr[0]) || !is_numeric($arr[2])) {
		echo "Syntax Error\n";
		exit (1);
	}

	$n1 = $arr[0];
	$n2 = $arr[2];
	$op = $arr[1];

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
		if ($n2 == 0)
			echo "Division by 0 - big nono\n";
		else
			echo ($n1 / $n2) . "\n";
	}
	else if ($op == '%') {
		if ($n2 == 0)
			echo "Division by 0 - big nono\n";
		else
			echo ($n1 % $n2) . "\n";
	}

?>