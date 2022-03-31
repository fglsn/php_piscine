#!/usr/bin/php 
<?php

function swap(&$a, &$b) {
	list($a, $b) = [$b, $a];
}

	if ($argc > 1) {
		$array = array();
		$str = trim(preg_replace('/ +/', ' ', $argv[1]));
		$array = explode(" ", $str);
		swap($array[0], $array[count($array) - 1]);
		foreach($array as $word) {
			echo $word . " ";
		}
		echo "\n";
	}

?>