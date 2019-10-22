<?php
    session_start();
    if ($_POST['oldpw'] && $_POST['newpw']) 
    {
        if (!$_POST['newpw']) 
        {
            echo("ERROR" . PHP_EOL);
            return;
        }
        
        $accounts = unserialize(file_get_contents("../private/passwd"));
        
        if ($accounts) 
        {
            $user_exist = false;
            foreach ($accounts as $key => $val) 
            {
                if ($val["login"] == $_SESSION["loggued_on_user"]) 
                {
                    if ($val["passwd"] == hash("whirlpool", $_POST["oldpw"])) 
                    {
                        $user_exist = true;
                        $accounts[$key]["passwd"] = hash("Whirlpool", $_POST["newpw"]);
                    }
                }
            }
            if ($user_exist) 
            {
                file_put_contents("../private/passwd", serialize($accounts));
                header("location: /index.php");
            } else 
                echo("ERROR" . PHP_EOL);
        } 
        else
            echo("ERROR" . PHP_EOL);
    } 
    else
        echo("ERROR" . PHP_EOL);