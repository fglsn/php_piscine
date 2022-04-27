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
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_FAILONERROR, 1);
	curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 50);
	curl_setopt($curl, CURLOPT_HEADER, TRUE);
	curl_setopt($curl, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');
	$output = curl_exec($curl);
	if (!$output) {
		echo "Problem with fetching data from site. Is the link valid?\n";
		exit(1);
	}
	curl_close($curl);
	return $output;
}

function filename($link) {
	$pos = strripos($link, "/");
	$link = substr($link, $pos + 1);
	return ($link);
}

function save_image($name, $url, $folder) {
	$curl = curl_init();
	curl_setopt($curl, CURLOPT_HEADER, false);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($curl, CURLOPT_URL, $url);
	curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US)");
	$raw = curl_exec($curl);
	curl_close($curl);
	$fp = fopen($folder."/".$name,'w');
	fwrite($fp, $raw);
	fclose($fp);
}

function get_files($img_tags, $folder) {
	foreach ($img_tags[1] as $img_link) {
		$img_name = filename($img_link);
		save_image($img_name, $img_link, $folder);
	}
}

function find_tags($html) {
	$img_tags = array();
	preg_match_all('/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is', $html, $img_tags);
	if (count($img_tags[0]) != 0)
		return($img_tags);
	exit;
}

function makefolder($url){
	$url = preg_replace("/^.*?:\/\//", '', $url);
	if (file_exists(strtok($url, '/')) && is_dir(strtok($url, '/')))
		return (strtok($url, '/'));
	$url = strtok($url, '/');
	mkdir($url);
	return ($url);
}

if ($argc == 2) {
	$url = $argv[1];
	$html = curl_call($url);
	$img_tags = find_tags($html);
	$folder = makefolder($url);
	get_files($img_tags, $folder);
}

// for tests:
// https://www.webdesignerdepot.com/2018/01/8-sites-that-work-just-fine-without-js-thank-you/

?>
