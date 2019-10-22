<?php
	include_once 'delete_item.php';

	function empty_basket($bool)
	{
		if ($bool)
			$basket = get_basket();
		else
			$basket = unserialize(file_get_contents("../private/unsuscribe"));
		if ($basket)
		{
			foreach ($basket as $key => $value)
				delete_item($value['ref'], $bool);
			if ($bool)
				delete_basket();
		}
	}

	function purchase_basket()
	{
		session_start();
		if ($_SESSION['loggued_on_user'] != NULL)
		{
			delete_basket();
			return (1);
		}
		else
			return (0);
	}
?>
