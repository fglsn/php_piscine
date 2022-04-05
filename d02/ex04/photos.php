#!/usr/bin/php
<?php

function save_img($url, $file){
	$fp = fopen($file, 'w+');

	$curl = curl_init($url);
	// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false); // enable if you want
	curl_setopt($curl, CURLOPT_FILE, $fp);          // output to file
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_TIMEOUT, 1000);      // some large value to allow curl to run for a long time
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0');
	// curl_setopt($curl, CURLOPT_VERBOSE, true);   // Enable this line to see debug prints
	curl_exec($curl);

	curl_close($curl);                              // closing curl handle
	fclose($fp);  
}

if ($argc == 2) {
	$url = $argv[1];
	$content = file_get_contents($url);

	
	save_img($argv[1], "local_image1.svg");
}

?>