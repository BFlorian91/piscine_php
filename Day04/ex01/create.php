<?php

    if (isset($_POST["login"]) && isset($_POST["passwd"]) && isset($_POST["submit"])) {
        if (!$_POST["passwd"] || $_POST["submit"] != "OK")
            die("ERROR" . PHP_EOL);
        $user["login"] = $_POST["login"];
        $user["passwd"] = hash("Whirlpool", $_POST["passwd"]);

        if (!file_exists("../private"))
            mkdir("../private");
        if (file_exists("../private/passwd")) {
            $accounts[] = unserialize("../private/passwd");
            foreach ($accounts as $account) {
                if ($account["login"] == $user["login"])
                    die("ERROR" . PHP_EOL);
            }
        }
        $i = 0;
        foreach ($accounts as $account)
            $i++;
        $accounts[$i] = $user;
        file_put_contents("../private/passwd", serialize($accounts));
        die("OK" . PHP_EOL);
    }