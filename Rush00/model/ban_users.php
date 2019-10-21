<?php

    if (file_exists("../private/passwd"))
    {
        $ban_user = unserialize(file_get_contents("../private/passwd"));
        if ($_POST['submit'] === "ban" || $_POST['submit'] === "unban")
        {
            foreach ($ban_user as $key => $val)
            {
                if ($val['login'] === $_POST['login'])
                {
                    if ($_POST['submit'] === "ban") 
                        $ban_user[$key]['ban'] = 1;
                    else
                        $ban_user[$key]['ban'] = 0;
                    file_put_contents("../private/passwd", serialize($ban_user));
                    header("location: ../view/users.php");
                }
            }
        }
    }