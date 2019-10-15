#!/usr/bin/php
<?php

    function error_($error_code)
    {
        die($error_code == 1 ? 'Incorrect Parameters' . PHP_EOL : 'Syntax Error' . PHP_EOL);
    }

    function calculate($array)
    {
        switch ($array[1]) {
            case "+":
                echo $array[0] + $array[2] . PHP_EOL;
                break;
            case "-":
                echo $array[0] - $array[2] . PHP_EOL;
                break;
            case "*":
                echo $array[0] * $array[2] . PHP_EOL;
                break;
            case "/":
                echo $array[0] / $array[2] . PHP_EOL;
                break;
            case "%":
                echo $array[0] % $array[2] . PHP_EOL;
                break;
        }
    }

    if ($argc != 2)
        error_(1);
    trim($argv[1]);
    $array = sscanf($argv[1], "%d %c %d %s");
	if (!is_numeric($array[0]) || !$array[1] || !is_numeric($array[2]) || $array[3])
		error_(2);
	if (($array[0] == 0 || $array[2] == 0) && ($array[1] == '/' || $array[1] == '%'))
        die('0'.PHP_EOL);
    calculate($array);
