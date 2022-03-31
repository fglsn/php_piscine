#!/usr/bin/php 
<?php

	if ($argc > 1) {
		$arr = array();
		for($i = 1; $i < $argc; $i++)
		{
			$arr = array_merge($arr, explode(" ", $argv[$i]));
		}
		$arr = array_merge(array_diff($arr, array('')));
		sort($arr);
		foreach ($arr as $word) {
			echo $word . "\n";
		}
	}

?>