#!/usr/bin/php
<?php

$str = $argv[1];
$str = trim(preg_replace('/ +/', ' ', $str));
echo $str . "\n";

?>
