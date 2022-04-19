#!/usr/bin/php
<?php
    function download($img_link, $img_file){
        $file = fopen($img_file, 'w+');
        $curl = curl_init($img_link);
        curl_setopt($curl, CURLOPT_FILE, $file);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl, CURLOPT_TIMEOUT, 2000);
        curl_exec($curl);
        curl_close($curl);
        fclose($file);
    }
    $link = $argv[1];
    if (!filter_var($link, FILTER_VALIDATE_URL))
        exit();
    $page = file_get_contents($link);
    if (preg_match_all('/<img\s+[^>]*src="([^"]*\.\w+)"[^>]*>/is', $page, $matches)){

		$folder = parse_url($link)['host'];
        mkdir($folder);
        foreach($matches[1] as $match)
            download($match, $folder.'/'.basename($match));
    }
?>