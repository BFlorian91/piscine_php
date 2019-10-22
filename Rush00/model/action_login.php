<?php
    include "basket_utils.php";
    include "action_merge_basket.php";
    include "action_auth.php";

    session_start();


    if ($_POST["login"] && $_POST["passwd"] && auth($_POST["login"], $_POST["passwd"])) 
    {
        $_SESSION["loggued_on_user"] = $_POST["login"];
        $check = check_baskets();
        if ($check == 1)
            header("location: ../view/unlog_basket.php");
        else if ($check == 2)
            merge_basket();
        else
            header('location: /index.php');
    } 
    else 
    {
        $_SESSION["loggued_on_user"] = "";
        header("location: ../index.php");
    }