<?php
	include 'basket_utils.php';

	function get_total()
	{
		$basket = get_basket();
		foreach ($basket as $key => $value) 
			$ret += ($value['price'] * $value['stock']);
		return ($ret);
	}
?>