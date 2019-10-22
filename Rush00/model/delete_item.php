<?php	
	function delete_item($ref, $bool)
	{
		if ($bool) 
			$basket = get_basket();
		else
			$basket = unserialize(file_get_contents("../private/unsuscribe"));
		if ($basket)
		{
			foreach ($basket as $key => $value) 
			{	
				if ($value['ref'] == $ref)
				{
					if ($basket[$key]['stock'] >= 1)
						add_stock($ref, get_products($ref), $basket[$key]['stock']);
					unset($basket[$key]);
					if ($bool)
						fill_basket($basket);
					else
						file_put_contents("../private/unsuscribe", serialize($basket));
					return;
				}
			}
		}
	}
?>