#!/usr/bin/php
<?php
	if ($argc == 2 && is_readable($argv[1])) {
		$content = file_get_contents($argv[1]);
		$content = preg_replace_callback('/(<a )(.*)(>)(.*)(<\/a>)/i', function($matches) {
			$matches[0] = preg_replace_callback('/( title=\")(.*?)(\")/i', function ($matches) {
						return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
					},
					$matches[0]);
			$matches[0] = preg_replace_callback("/(>)(.*?)(<)/si", function($matches) {
				return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
				}, $matches[0]);
		
			return ($matches[0]);
		}, $content);
		echo ($content);
	}
?>