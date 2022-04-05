#!/usr/bin/php
<?php

//Call first link
//Take content of html
//Find all IMGs by matching regexes
//Find links to imgs
//Create directory using given argv[1] without http(s): prefix
//find name of image (after last slash in string plus dot and extention)
//Download imgs to created directory

function curl_call($url) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FAILONERROR, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 50);
	curl_setopt($curl, CURLOPT_HEADER, TRUE);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$output = curl_exec($curl);
	curl_close($curl);
	return $output;
}

function filename($link) {
	$pos = strripos($link, "/");
	$link = substr($link, $pos + 1);
	//echo $link . "\n";
	return ($link);
}

function save_image($name) {
	$url = ‘http://somedomain.com/images/’.$name.‘.jpg’;
	$data = makeCurlCall($url);
	file_put_contents(‘photos/’.$name.‘.jpg’, $data);
	}
	$i = 1;
	$l = 10;
	while ($i < $l) {
	$html = makeCurlCall(‘http://somedomain.com/id/’.$i.‘/’);
	getImages($html);
	$i += 1;
}

function filename($img_tags) {
	foreach ($img_tags[1] as $img_link) {
		$img_name = filename($img_link);
	}
}


function find_tags($html) {
	$img_tags = array();
	preg_match_all('/<img\s+[^>]*src="([^"]*)"[^>]*>/is', $html, $img_tags);
	if (count($img_tags[0]) != 0)
		return($img_tags);
	else
		exit;
}

if ($argc == 2) {
	$url = $argv[1];
	$html = curl_call($url);
	$folder = folder_name($html);
	$img_tags = find_tags($html);
	save_image($img_name, $link, $folder);
}

?>
