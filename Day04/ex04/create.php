<?php

    if ($_POST['login'] && $_POST['passwd'] && $_POST['submit'] == 'OK') {
        
        $user['login'] = $_POST['login'];
        $user['passwd'] = hash('Whirlpool', $_POST['passwd']);

        if (!file_exists('../private')) {
            mkdir('../private');
        }
        if (!file_exists('../private/passwd')) {
            file_put_contents('../private/passwd', null);
        }
        $accounts= unserialize(file_get_contents('../private/passwd'));
        if ($accounts) {
            $exist = false;
            foreach ($accounts as $key => $val) {
                if ($val['login'] == $user['login']) {
                    $exist = true;
                }
            }
        }
        if ($exist) {
            echo 'ERROR' . PHP_EOL;
        } else {
            $accounts[] = $user;
            file_put_contents('../private/passwd', serialize($accounts));
            echo 'OK' . PHP_EOL;
        }
    } else {
        echo 'ERROR' . PHP_EOL;
    }