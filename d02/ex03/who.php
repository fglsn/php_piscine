#!/usr/bin/php
<?php
	$strangers = shell_exec('who');
	echo "$strangers";

	//https://www.geeksforgeeks.org/php-shell_exec-vs-exec-function/
?>