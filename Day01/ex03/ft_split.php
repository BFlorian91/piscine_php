#!/usr/bin/php

<?php

    function ft_split($str)
    {
        while (strstr($str, "  "))
            $str = str_replace("  ", " ", $str);
        $str = trim($str);
        $array = explode(" ", $str);
        sort($array);
        return ($array);
    }