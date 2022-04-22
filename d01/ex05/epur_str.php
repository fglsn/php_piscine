#!/usr/bin/php
<?php
if ($argc == 2) {
	$str = $argv[1];
	$str = trim(preg_replace('/ +/', ' ', $str));
	echo $str . "\n";
}
?>
