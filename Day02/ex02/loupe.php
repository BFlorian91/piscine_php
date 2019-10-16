#!/usr/bin/php
<?php

    if ($argc == 1)
        die();
    $preg = file_get_contents($argv[1]);

    $preg = preg_replace_callback('/title="(.*?)"/',
        function ($matches) {
            return 'title="' . strtoupper($matches[1]) . '"';
        }, $preg);
        var_dump($preg);