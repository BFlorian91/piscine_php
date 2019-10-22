<?php

    $articles = unserialize(file_get_contents('../private/products.csv'));
    foreach ($articles as $key => $val)
    {
        if ($val['ref'] == $_POST['ref'])
        {
            unset($articles[$key]);
            file_put_contents("../private/products.csv", serialize($articles));
            header('location: /view/articles.php');
            exit;
        }
    }
    // temporaire
    echo "Articles doesn't exist";
    header('location: /view/articles.php');