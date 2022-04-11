#!/usr/bin/php
<?php
include("ft_is_sort.php");

//$tab = array("!/@#;", "42", "Hello World", "hi", "zZzZzZz");
//$tab[] = "What are you doing now ?";
//$tab = array("fwf", "fwgwgwg", "123", 3434);

//$tab = array("1", "2", "3", "4", "5");
//$tab = array(1, 2, 3, 4);
//$tab = array("A", "B", "C", "DE", "a");
//$tab = array();
//$tab = array(3);
//$tab = array("3");

if (ft_is_sort($tab))
	echo "The array is sorted\n";
else
	echo "The array is not sorted\n"

?>