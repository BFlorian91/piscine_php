#!/usr/bin/php
<?php

    function error_() {
        die ("Wrong Format !". PHP_EOL);
    }

    if ($argc < 2)
        die();

    date_default_timezone_set('Europe/Paris');

    $preg = preg_match('/^([Ll]undi|[Mm]ardi|[Mm]ercredi|[jJ]eudi|[vV]endredi|[sS]amedi|[dD]imanche) ([0-9]|1[0-9]|2[0-9]|3[0-1]) ([jJ]anvier|[fF]evrier|[mM]ars|[aA]vril|[mM]ai|[jJ]uin|[jJ]uillet|[aA]out|[sS]eptembre|[oO]ctobre|[nN]ovembre|[dD]ecembre) ([0-9]{4}) (([01][0-9]|2[0-3]):([0-5][0-9]):([0-5][0-9]))$/', $argv[1], $matches);
    if (!$preg)
        error_();
    $months = [
        'janvier' => 'january',
        'fevrier' => 'february',
        'mars' => 'march',
        'avril' => 'april',
        'mai' => 'may',
        'juin' => 'june',
        'juillet' => 'july',
        'aout' => 'august',
        'septembre' => 'september',
        'octobre' => 'october',
        'novembre' => 'november',
        'decembre' => 'december'
    ];

    $month = false;
    foreach ($months as $key => $value) {
        if (strtolower($matches[3]) == $key) {
            $month = $value;
        }
    }
    if (!$month)
        error_();
    $times = $matches[4] . "-" . $month . "-" . $matches[2] . " " . $matches[5];
    $times = strtotime($times);
    if (empty($times))
        error_();
    echo $times;