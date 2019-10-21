<?php
    session_start();

    if ($_POST["login"]) 
    {
        $accounts = unserialize(file_get_contents("../private/passwd"));
        if ($accounts) 
        {
            foreach ($accounts as $key => $val) 
            {
                if ($val['login'] == $_POST['login'])
                {
                    unset($accounts[$key]);
                    file_put_contents('../private/passwd', serialize($accounts));
                    header('Location: /view/users.php');
                    exit;
                }    
            }
        ?>
            <p>username doesn't exist in database</p>
            <a href="/view/admin.php">back</a>
        <?php 
        }
    }