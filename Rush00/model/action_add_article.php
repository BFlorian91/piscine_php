<?php
   require_once "stock_manager.php";

   $articles = unserialize(file_get_contents('../private/products.csv'));
   if ($articles)
      add_stock($_POST['ref'], $articles, $_POST['stock']);
   header('location: /view/articles.php');