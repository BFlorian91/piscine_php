<?php
	function substract_stock($ref, $products, $quantity)
	{
		if (!$products)
			return (-1);
		foreach ($products as $key => $value)
		{
			if ($value['ref'] == $ref)
			{
				if (($value['stock'] - $quantity) < 0)
					return (-1);
				$products[$key]['stock'] -= $quantity;
				file_put_contents("../private/products.csv", serialize($products));
				return ($products[$key]['price']);
			}
		}
		return (-1);
	}

	function add_stock($ref, $products, $quantity)
	{
		if (!$products)
			return (1);
		foreach ($products as $key => $value)
		{
			if ($value['ref'] == $ref)
			{
				$products[$key]['stock'] += $quantity;
				file_put_contents("../private/products.csv", serialize($products));
				return (0);
			}
		}
		return (1);
	}
?>