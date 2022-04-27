#!/usr/bin/php
<?php
if($argc > 2)
{
	$key = trim($argv[1]);
	foreach ($argv as $value)
	{
		$arr = explode(":", $value);
		//print_r($arr);
		if ($arr[0] == $key)
			$result = $arr[1];
	}
	if ($result)
		echo $result."\n";
}

?>