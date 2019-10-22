<?php
	include 'basket_utils.php';
	include 'add_item.php';
	include 'substract_item.php';
	include 'stock_manager.php';
	include 'delete_item.php';
	include 'purchase_basket.php';

	session_start();
	if (!file_exists("../private"))
		mkdir("../private", 0755);

	if ($_POST['submit'] === "add to card")
	{
		add_item($_POST['ref'], 1, -1);
		header("location: ../index.php");
	}
	else if ($_POST['submit'] === "+")
	{
		add_item($_POST['ref'], 1, -1);
		header("location: ../view/basket.php");
	}
	else if ($_POST['submit'] === "-")
	{
		substract_item($_POST['ref']);
		header("location: ../view/basket.php");
	}
	else if ($_POST['submit'] === "delete")
	{
		delete_item($_POST['ref'], 1);
		header("location: ../view/basket.php");
	}
	else if ($_POST['submit'] === "purchase")
	{
		if (purchase_basket())
			header("location: ../view/thx_for_purchase.php");
		else
			header("location: ../view/have_to_be_log.php");
	}
	else if ($_POST['submit'] === "empty")
	{
		empty_basket(1);
		header("location: ../view/basket.php");
	}
?>