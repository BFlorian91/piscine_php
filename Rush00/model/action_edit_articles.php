<?php

    require_once "basket_utils.php";

    $articles = get_products();
    if ($articles)
    {
        foreach ($articles as $key => $val)
        {
            if ($val['ref'] == $_POST['old_ref'])
            {
                $articles[$key] = [
                    'ref' => $_POST['ref'],
                    'category' => $_POST['category'],
                    'stock' => $_POST['stock'],
                    'img' => $_POST['42-login']
                 ];
                 if ($_POST['price'] <= 0)
                   $articles[$key]['price'] = 1;
                else
                   $articles[$key]['price'] = $_POST['price'];
            }
        }
         file_put_contents("../private/products.csv", serialize($articles));
    }
    header('location: ../view/articles.php');