<?php
    session_start();
    if ($_SESSION['loggued_on_user'] !== "admin")
        header("Location: ../view/access_denied.php");

    if ($_POST["login"]) 
    {
        $accounts = unserialize(file_get_contents("../private/passwd"));
        if ($accounts) 
        {
            foreach ($accounts as $key => $val) 
            {
                if ($val['login'] == $_POST['login'])
                {
                    $accounts[$key]['passwd'] = hash("whirlpool", "kjs!@afjeif$5*ljk4#kl@kfjsjljsfj@fsklfjsd-flskfj=?!!");
                    file_put_contents('../private/passwd', serialize($accounts));
                    header('Location: /view/admin.php');
                    exit;
                }    
            }
        ?>
            <p>username doesn't exist in database</p>
            <a href="/view/admin.php">back</a>
        <?php 
        }
    }