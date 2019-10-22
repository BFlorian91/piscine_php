<?php
	//include 'basket_utils.php';
	//include 'stock_manager.php';

	function substract_item($ref)
	{
		$basket = get_basket();
		add_stock($ref, get_products($ref), 1);
		if ($basket)
		{
			foreach ($basket as $key => $value) 
			{	
				if ($value['ref'] == $ref)
				{
					if ($basket[$key]['stock'] >= 1)
						$basket[$key]['stock'] -= 1;
					fill_basket($basket);
					return;
				}
			}
		}
	}
?>