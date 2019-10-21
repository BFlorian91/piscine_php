<?php

	session_start();
	
	function fill_basket($ref)
	{
		if ($ref)
		{
			if (!file_exists("./private"))
				mkdir("./private", '0755');
			if (file_exists("./private/basket") && file_exists('./private/products.csv'))
			{	
				$file = unserialize(file_get_contents("./private/basket"));
				$item = unserialize(file_get_contents("./private/products.csv"));
				if ($file && $item)
				{	
					foreach ($item as $key => $value) 
					{
						if ($value['ref'] == $ref)
						{
							if ($item[$key]['stock'] == 0)
							{
								header("Location: index.php");
								exit ;
							}
							$item[$key]['stock'] -= 1;
							file_put_contents("./private/products.csv", serialize($item));
						}
					}
					foreach ($file as $key => $value) 
					{	
						if ($value['ref'] == $ref)
						{
							$file[$key]['stock'] += 1;
							file_put_contents("./private/basket", serialize($file));
							header("Location: index.php");
							exit ;
						}
					}
				}
			}
			if (!file_exists("./private/basket") && file_exists('./private/products.csv'))
			{
				$item = unserialize(file_get_contents("./private/products.csv"));
				foreach ($item as $key => $value) 
				{
					if ($value['ref'] == $ref)
					{
						if ($item[$key]['stock'] == 0)
						{
							header("Location: index.php");
							exit ;
						}
						$item[$key]['stock'] -= 1;
						file_put_contents("./private/products.csv", serialize($item));
						break ;
					}
				}
			}
			$file[] = array('ref' => $_POST['ref'], 'price' => $item[$key]['price'], 'stock' => 1);
			file_put_contents('./private/basket', serialize($file));
			header("Location: index.php");
			exit ;
		}
	}

	function pull_one_basket($ref)
	{
		if ($ref)
		{
			if (!file_exists("./private"))
				mkdir("./private", '0755');
			if (file_exists("./private/basket") && file_exists('./private/products.csv'))
			{	
				$file = unserialize(file_get_contents("./private/basket"));
				$item = unserialize(file_get_contents("./private/products.csv"));
				if ($file && $item)
				{	
					foreach ($item as $key => $value) 
					{
						if ($value['ref'] == $ref)
						{
							$item[$key]['stock'] += 1;
							file_put_contents("./private/products.csv", serialize($item));
						}
					}
					foreach ($file as $key => $value) 
					{	
						if ($value['ref'] == $ref)
						{	
							$file[$key]['stock'] -= 1;
							if ($file[$key]['stock'] == 0)
							{
								unset($file[$key]);
								$file = array_filter($file);
							}
							file_put_contents("./private/basket", serialize($file));
						}
					}
				}
			}
		}
	}
	function delete_products($ref)
	{
		if (file_exists("./private/basket"))
		{	
			$file = unserialize(file_get_contents("./private/basket"));
			if ($file)
				foreach ($file as $key => $value) 
					if ($value['ref'] == $ref)
						$number = $file[$key]['stock'];
		}
		//echo $number;
		while ($number > 0)
		{
			pull_one_basket($ref);
			$number--;
		}
	}

	function empty_basket()
	{
		if (file_exists("./private/basket"))
		{	
			$file = unserialize(file_get_contents("./private/basket"));
			if ($file)
				foreach ($file as $key => $value) 
					delete_products($file[$key]['ref']);
		}
	}

	function purchase_basket()
	{
		session_start();

		if (!file_exists("./private"))
				mkdir("./private", '0755');
		if (file_exists("./private/basket") && $_SESSION['loggued_on_user'])
		{
			if (file_exists("./private/purchase.csv"))
				$purchase = unserialize(file_get_contents("./private/purchase.csv"));
			$file = unserialize(file_get_contents("./private/basket"));
			foreach ($file as $elem)
				$purchase[] = $elem;
			$purchase[] = "purchase";
			file_put_contents("./private/purchase.csv", serialize($purchase));
			$file = array();	
			file_put_contents('./private/basket', serialize($file));
			header("Location: index.php");
			exit ;
		}
	}


	if ($_POST['plus'])
		fill_basket($_POST['ref']);
	else if ($_POST['minus'])
		pull_one_basket($_POST['ref']);
	else if ($_POST['delete'])
		delete_products($_POST['ref']);
	if ($_POST['empty'])
		empty_basket();
	if ($_POST['purchase'])
		purchase_basket();

	header("Location: index.php");
	exit ;
?>
























