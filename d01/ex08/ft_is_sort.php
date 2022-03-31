<?php

function ft_is_sort($arr) {

	$arr1 = $arr;
	sort($arr1);
	$count = count($arr);
	for ($i = 0; $i < $count; $i++)
	{
		if ($arr[$i] != $arr1[$i]) {
			return (false);
		}
	}
	return (true);
}

?>