<?php

    function auth($login, $passwd) 
    {
        $accounts = unserialize(file_get_contents("../private/passwd"));
        if ($accounts) 
        {
            foreach ($accounts as $key => $val) 
                if ($val['login'] == $login && $val['passwd'] == hash("whirlpool", $passwd))
                {
                    if ($val['ban'] === 0)
                        return true;
                }
            return false;
        }
        return false;
    }