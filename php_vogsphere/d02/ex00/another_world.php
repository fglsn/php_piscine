#!/usr/bin/php
<?php

if ($argc > 1) {
	$str = $argv[1];
	$str = trim(preg_replace('/[ \t]+/', ' ', $str));
	echo $str . "\n";
}

?>