<?php

function delete_product($ref)
{
    if (file_exists('./private/products.csv'))
        if ($file = unserialize(file_get_contents('./private/products.csv')))
            foreach ($file as $key => $value)
                if ($file[$key]['ref'] == $ref)
                    unset($file[$key]);
        file_put_contents('./private/products.csv', serialize($file));
}

function plus_stock($stock)
{
    if (file_exists('./private/products.csv'))
        if ($file = unserialize(file_get_contents('./private/products.csv')))
            foreach ($file as $key => $value)
                if ($file[$key]['stock'] == $stock && $file[$key]['ref'] == $_POST['ref'])
                    {
                        $file[$key]['stock'] += 1;
                    }
        file_put_contents('./private/products.csv', serialize($file));
}

function minus_stock($stock)
{
    if (file_exists('./private/products.csv'))
        if ($file = unserialize(file_get_contents('./private/products.csv')))
            foreach ($file as $key => $value)
                if ($file[$key]['stock'] == $stock && $file[$key]['ref'] == $_POST['ref'] && $file[$key]['stock'] > 0)
                    {
                        $file[$key]['stock'] -= 1;
                    }
        file_put_contents('./private/products.csv', serialize($file));
}

function delete_category($category)
{
    if (file_exists('./private/products.csv'))
    if ($file = unserialize(file_get_contents('./private/products.csv')))  
    foreach ($file as $key => $value)
        {
            if ($file[$key]['category'] == $category)
            {
                unset($file[$key]);
              $file = array_filter($file);
            }
        }
    file_put_contents('./private/products.csv', serialize($file));
}

function delete_user($login)
{
    if (file_exists('./private/passwd'))
        if ($file_members = unserialize(file_get_contents('./private/passwd')))
            foreach ($file_members as $key => $value)
                if ($file_members[$key]['login'] == $login)
                    unset($file_members[$key]);
        file_put_contents('./private/passwd', serialize($file_members));
}



if ($_POST['delete'] == 'delete')
    delete_product($_POST['ref']);
if ($_POST['plus'] == '+')
    plus_stock($_POST['stock']);
if ($_POST['minus'] == '-')
    minus_stock($_POST['stock']);
if ($_POST['delete_category'] == 'delete_category')
    delete_category($_POST['category']);
    if ($_POST['delete_user'] == 'delete_user')
        delete_user($_POST['login']);

header("Location: admin.php");
exit;
?>