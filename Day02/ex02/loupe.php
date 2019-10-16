#!/usr/bin/php
<?php

    if ($argc == 1)
        die();
    $preg = file_get_contents($argv[1]);

    function callback_title($param)
    {
        return "title=\"" . strtoupper($param[1]) . "\"";
    }

    function callback_link($param) 
    {
        return preg_replace_callback('/>.*</Ux', function($param) {
            return strtoupper($param[0]);
        }, $param[0]);
    }
    
   $preg = preg_replace_callback('/title=\"((.*?)+)\"/', 'callback_title', $preg);
   $preg = preg_replace_callback('/ <a [^>]+(.*?)<\/a>/siU', 'callback_link', $preg);
    
   echo $preg;