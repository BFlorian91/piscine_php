#!/usr/bin/php
<?php

    if ($argc > 1) {
        $str = trim($argv[1]);
        while (strstr($str, "  "))
            $str = str_replace("  ", " ", $str);
        $array = explode(" ", $str);
        array_push($array, $array[0]);
        unset($array[0]);
        $str = implode(" ", $array);
        if (empty($str))
            die();
        echo $str . PHP_EOL;
    }