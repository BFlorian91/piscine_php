<?php

    if (isset($_POST['login']) && isset($_POST['oldpw']) && isset($_POST['newpw'])) {
        if (!$_POST['newpass'] && $_POST['submit'] != "OK")
            echo("ERROR" . PHP_EOL);
        
        $accounts = unserialize(file_get_contents("../private/passwd"));
        
        if ($accounts) {
            $user_exist = false;
            foreach ($accounts as $key => $val) {
                if ($val["login"] == $_POST["login"]) {
                    if ($val["passwd"] == hash("whirlpool", $_POST["oldpw"])) {
                        $user_exist = true;
                        $accounts[$key]["passwd"] = hash("Whirlpool", $_POST["newpw"]);
                    }
                }
            }
            if ($user_exist) {
                file_put_contents("../private/passwd", serialize($accounts));
                echo("OK" . PHP_EOL);
            } else {
                echo("ERROR" . PHP_EOL);
            }
        } else {
            echo("ERROR" . PHP_EOL);
        }
    } else {
        echo("ERROR" . PHP_EOL);
    }