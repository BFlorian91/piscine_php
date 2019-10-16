#!/usr/bin/php
<?php

    if ($argv > 1)
        echo preg_replace("{[ \t]+}", ' ', $argv[1]) . PHP_EOL;