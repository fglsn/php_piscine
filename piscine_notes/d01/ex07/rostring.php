#!/usr/bin/php 
<?php

	if ($argc > 1) {
		$str = trim(preg_replace('/ +/', ' ', $argv[1]));
		$arr = explode(" ", $str);
		$first = array_shift($arr);
		$arr[count($arr) + 1] = $first;
		for ($i = 0; $i < count($arr) - 1; $i++) {
			echo $arr[$i] . " ";
		}
		echo $arr[count($arr)] . "\n";
	}

?>