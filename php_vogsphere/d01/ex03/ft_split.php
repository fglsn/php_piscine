<?php
function ft_split($str) {
	$arr = explode(" ", $str);
	sort($arr);
	$arr = array_merge(array_diff($arr, array('')));
	return ($arr);
}
?>