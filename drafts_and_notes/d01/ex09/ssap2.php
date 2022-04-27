#!/usr/bin/php 
<?php
function compare_char($a, $b)
{
	if (ctype_alpha($a)) {
		if (ctype_alpha($b))
			return $a <=> $b;
		else
			return -1;
	}
	else if (is_numeric($a)) {
		if (ctype_alpha($b))
			return 1;
		else if (is_numeric($b))
			return $a <=> $b;
		else
			return -1;
	}
	if (ctype_alnum($b))
		return 1;
	else
		return $a <=> $b;
}

function compare_str($str1, $str2) {
	$str1 = strtolower($str1);
	$str2 = strtolower($str2);
	$len1 = strlen($str1);
	$len2 = strlen($str2);
	$len = min($len1, $len2);
	for ($i = 0; $i < $len; $i++) {
		if (compare_char($str1[$i], $str2[$i]) == 1)
			return (1);
		else if (compare_char($str1[$i], $str2[$i]) == -1)
			return (-1);
	}
	return $len1 <=> $len2;
}

if ($argc > 1) {
	$arr = array();
	for($i = 1; $i < $argc; $i++)
		$arr = array_merge($arr, explode(" ", $argv[$i]));
	$arr = array_merge(array_diff($arr, array('')));
	//print_r($arr);
	usort($arr, "compare_str");
	foreach ($arr as $word) {
		echo $word . "\n";
	}
}
// ./ssap2.php 123 1234 a A abc Abcde ZzZzzzz a1z a1zzz
// ./ssap2.php toto tutu 4234 "_hop A2l+ XXX" ## "194837 AhAhAh"   ?? ## in terminal  ??
// ./ssap2.php toto tutu 4234 "_hop A2l+ XXX" "##" "1948372 AhAhAh"
?>