#!/usr/bin/php
<?php

    if ($argc != 4)
        die("Incorrect Parameters" . PHP_EOL);
    $array = array_values(array_map("trim", $argv));
    unset($array[0]);
    switch ($array[2]) {
        case "+":
            echo $array[1] + $array[3] . PHP_EOL;
            break;
        case "-":
            echo $array[1] - $array[3] . PHP_EOL;
            break;
        case "*":
            echo $array[1] * $array[3] . PHP_EOL;
            break;
        case "/":
            echo $array[1] / $array[3] . PHP_EOL;
            break;
        case "%":
            echo $array[1] % $array[3] . PHP_EOL;
            break;
    }
