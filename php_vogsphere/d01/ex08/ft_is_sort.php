<?php
function ft_is_sort($arr) {
		$arr1 = $arr;
		sort($arr1);
		if ($arr != $arr1)
			return (false);
		return (true);
	}
?>