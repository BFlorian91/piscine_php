#!/usr/bin/php
<?php

    if ($argc == 1)
        die();
    unset($argv[0]);
    $str = implode(" ", $argv);
    $str = trim($str);
    while (strstr($str, "  "))
        $str = str_replace("  ", " ", $str);
    $array = explode(" ", $str);
    sort($array);
    foreach ($array as $val) {
        echo $val . PHP_EOL;
    }