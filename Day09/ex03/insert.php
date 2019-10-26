<?php

$file = fopen('list.csv', 'a+');
fputcsv($file, $_GET, ';');
fclose($file);
