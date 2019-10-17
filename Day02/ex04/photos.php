#!/usr/bin/php
<?php

    function get_data($url)
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $res = curl_exec($curl);
        curl_close($curl);
        return $res;
    }

    // Get content
    $content = get_data($argv[1]);
    // Parse url for create folder
    $folder = preg_replace('#^https?://#', '', $argv[1]);
    $folder = explode('/', $folder)[0];
    mkdir($folder);
    // Parse URL of Images
    preg_match_all('/<img(.*?)src="(.*?)"/', $content, $matches);
    foreach ($matches[2] as $url) {
        echo $url . "\n" . PHP_EOL;
        $img = get_data($url);
        $name = explode('/', $url);
        // take the name of image at the index - 1
        $name = $name[count($name) - 1];
        file_put_contents("./" . $folder . "/" . $name, $img);
    }