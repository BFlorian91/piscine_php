#!/usr/bin/php
<?php

    if ($argc < 3)
        die();
    $key = $argv[1];
    unset($argv[0], $argv[1]);
    foreach ($argv as $args) {
        $values = explode(':', $args);
        if (strstr($key, $values[0]))
            die($values[1].PHP_EOL);
    }