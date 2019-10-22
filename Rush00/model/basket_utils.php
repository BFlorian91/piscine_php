<?php
	function get_basket()
	{
		session_start();
		if ($_SESSION['loggued_on_user'] != NULL)
		{	
			if (file_exists("../private/".$_SESSION['loggued_on_user']))
				return (unserialize(file_get_contents("../private/".$_SESSION['loggued_on_user'])));
		}
		else
			if (file_exists("../private/unsuscribe"))
				return (unserialize(file_get_contents("../private/unsuscribe")));
	}

	function get_products()
	{
		if (file_exists('../private/products.csv'))
			return (unserialize(file_get_contents("../private/products.csv")));
	}

	function fill_basket($basket)
	{

		if ($_SESSION['loggued_on_user'] != NULL)
			file_put_contents("../private/".$_SESSION['loggued_on_user'], serialize($basket));
		else
			file_put_contents("../private/unsuscribe", serialize($basket));
	}

	function delete_basket()
	{
		session_start();
		if ($_SESSION['loggued_on_user'] != NULL)
		{	
			if (file_exists("../private/".$_SESSION['loggued_on_user']))
				unlink("../private/".$_SESSION['loggued_on_user']);
		}
		else
			if (file_exists("../private/unsuscribe"))
				unlink("../private/unsuscribe");
	}

	function check_baskets()
	{
		session_start();
		if ($_SESSION['loggued_on_user'] != NULL)
		{
			if (file_exists("../private/".$_SESSION['loggued_on_user']))
				$session = unserialize(file_get_contents("../private/".$_SESSION['loggued_on_user']));
		}
		if (file_exists("../private/unsuscribe"))
			$unsuscribe = unserialize(file_get_contents("../private/unsuscribe"));
		if ($session != NULL && $unsuscribe != NULL)
			return (1);
		if ($unsuscribe != NULL)
			return (2);
		return (3);
	}
?>