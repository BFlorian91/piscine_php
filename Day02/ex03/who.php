#!/usr/bin/php
<?php

    date_default_timezone_set("Europe/Paris");

    $users = [];
    $fd = fopen("/var/run/utmpx", "r");
    while ($line = fread($fd, 628)) {
        $line = unpack("a256user/a4id/a32line/ipid/itype/I2time", $line);
        if (strcmp($line['type'], "7") == 0)
            array_push($users, $line);
    }
    foreach ($users as $user) {
        echo $user['user'] . ' ';
        echo $user['line'] . ' ';
        echo date("M j H:i", $user['time1']) . PHP_EOL;
    }