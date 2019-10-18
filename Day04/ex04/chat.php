<?php

    session_start();
    date_default_timezone_set('Europe/Paris');
    $chat = unserialize(file_get_contents('../private/chat'));
    foreach ($chat as $msg) {
        echo date("[H:i]", $msg['time']);
        echo ' <b>' . $msg['login'] . '</b>: ' . $msg['msg'] . '<br />' . PHP_EOL;
    }