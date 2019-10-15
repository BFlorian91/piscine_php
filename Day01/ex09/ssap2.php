#!/usr/bin/php

<?php

    function ft_is_alpha($str)
    {
        return ($str >= 'a' && $str <= 'z' || $str >= 'A' && $str <= 'Z');
    }

    function ft_ssap($argc, $argv)
    {
        if ($argc == 1)
            die();
        unset($argv[0]);
        $str = implode(" ", $argv);
        while (strstr($str, "  "))
            $str = str_replace("  ", " ", $str);
        $array = explode(" ", $str);
        return ($array);
    }

    function ft_display($num, $alpha, $other)
    {
        foreach ($alpha as $str) {
            if ($str != '')
                echo $str . PHP_EOL;
        }
        foreach ($num as $nb) {
            if ($str != '')
                echo $nb . PHP_EOL;
        }
        foreach ($other as $oth) {
            if ($oth != '')
                echo $oth . PHP_EOL;
        }
    }

    $array = ft_ssap($argc, $argv);
    $alpha = [];
    $num = [];
    $other = [];
    foreach ($array as $value) {
        if (ft_is_alpha($value[0]))
            array_push($alpha, $value);
        else if (is_numeric($value[0]))
            array_push($num, $value);
        else
            array_push($other, $value);
    }
    $sort_array = [];
    natcasesort($num);
    natcasesort($alpha);
    natcasesort($other);
    ft_display($num, $alpha, $other);
    