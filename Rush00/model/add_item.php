<?php

	include_once 'basket_utils.php';

	function is_already_in_basket($ref, $basket, $quantite)
	{
		foreach ($basket as $key => $value) 
		{	
			if ($value['ref'] == $ref)
			{
				$basket[$key]['stock'] += $quantite;
				fill_basket($basket);
				return (1);
			}
		}
		return (0);
	}

	function add_item($ref, $quantite, $price)
	{
		if ($price == -1)
			$price = substract_stock($ref, get_products($ref), 1);
		$basket = get_basket();
		if ($price == -1)
		{
			header("Location: ../view/out_of_stock.php");
			exit ;
		}
		if ($basket)
		{
			if (is_already_in_basket($ref, $basket, $quantite))
				return ;
		}
		$basket[] = array('ref' => $ref, 'price' => $price, 'stock' => $quantite);
		fill_basket($basket);
	}
?>