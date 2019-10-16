#!/usr/bin/php
<?php

    function ft_split($str)
    {
        $array = explode(" ", $str);
        $res = array_filter($array, 'strlen');
        sort($res);
        return ($res);
    }