#!/usr/bin/php

<?php

include("ft_split.php");

$f = fopen( 'php://stdin', 'r' );

$line = fgets( $f ); 

print_r(ft_split($line));
fclose($f);
?>