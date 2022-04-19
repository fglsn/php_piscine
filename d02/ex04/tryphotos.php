#!/usr/bin/php
<?php

if ($argc == 2) {
	$url = $argv[1];
	if (filter_var($url, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED) === false) {
		echo "Not valid link\n";
		exit();
	}
	if (!$html = file_get_contents($url)) {
		echo "Problem with getting content\n";
	}
	$img_tags = find_tags($html);
	print_r($img_tags);
	$folder = makefolder($url);
	get_files($img_tags, $folder);
}

function find_tags($html) {
	$img_tags = array();
	preg_match_all('/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is', $html, $img_tags);
	if (count($img_tags[0]) != 0)
		return $img_tags;
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

function get_files($img_tags, $folder) {
	foreach ($img_tags[1] as $img_link) {
		$img_name = filename($img_link);
		save_image($img_name, $img_link, $folder);
	}
}

function filename($link) {
	$pos = strripos($link, "/");
	$link = substr($link, $pos + 1);
	//echo $link . "\n";
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

?>