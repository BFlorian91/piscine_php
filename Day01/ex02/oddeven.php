#!/usr/bin/php

<?php

while (1) {
    echo "Entrez un nombre: ";
    $user = fgets(STDIN);
    if (!$user) {
        echo PHP_EOL;
        break;
    }
    $number = trim($user);
    if (!is_numeric($number))
        echo "'" . $number . "' n'est pas un chiffre" . PHP_EOL;
    else if ($number % 2)
        echo "Le chiffre " . $number . " est Impair" . PHP_EOL;
    else
        echo "Le chiffre " . $number . " est Pair" . PHP_EOL;
}