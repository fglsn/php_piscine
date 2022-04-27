#!/usr/bin/php
<?php
	if ($argc != 2) {
		echo "Incorrect Parameters\n";
		exit (1);
	}
	
	$check = sscanf($argv[1], "%d %c %d %s");
	//print_r($check);
	if (count($check) != 4 || !is_numeric($check[0]) || !is_numeric($check[2]) || $check[3]) {
		echo "Syntax Error\n";
		exit (1);
	}

	$n1 = $check[0];
	$n2 = $check[2];
	$op = $check[1];

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
	else 
		echo "Syntax Error\n";
?>