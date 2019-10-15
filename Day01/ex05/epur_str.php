#!/usr/bin/php

<?php

    if ($argc != 2)
        die();
    $str = trim($argv[1]);
    while (strstr($str, "  "))
        $str = str_replace("  ", " ", $str);
    echo $str;