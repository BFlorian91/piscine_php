<?php
	include 'add_item.php';
	include 'stock_manager.php';
	include_once 'purchase_basket.php';
	
	session_start();
	
	function merge_basket()
	{
		if (file_exists("../private/unsuscribe"))
			$basket = unserialize(file_get_contents("../private/unsuscribe"));
		if ($basket)
		{
			foreach ($basket as $key => $value)
				add_item($value['ref'], $value['stock'], $value['price']);
		}
		if (file_exists("../private/unsuscribe"))
			unlink("../private/unsuscribe");
		header("location: ../index.php");
	}

	if ($_POST['submit'] === "OUI")
		merge_basket();
	if ($_POST['submit'] === "NON")
	{
		empty_basket(0);
		if (file_exists("../private/unsuscribe"))
			unlink("../private/unsuscribe");
		header("location: ../index.php");
	}
?>