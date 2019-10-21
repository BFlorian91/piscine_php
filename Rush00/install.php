<?php
	if (!file_exists("./private"))
	{
		mkdir('./private');
		
		$set_passwd[] = array('login' => "admin", 'passwd' => hash('whirlpool', "admin"), 'ban' => 0);
		file_put_contents("./private/passwd", serialize($set_passwd));

		$set_products[] = array('ref' => "Florian", 'category' => "Garçon", 'price' => 1, 'stock' => 9999, 'img' => "flbeaumo");
		$set_products[] = array('ref' => "Anne", 'category' => "Fille", 'price' => 2, 'stock' => 99999, 'img' => "aquan");
		$set_products[] = array('ref' => "Tigre", 'category' => "Garçon", 'price' => 3, 'stock' => 71, 'img' => "tigre");
		$set_products[] = array('ref' => "Gheram", 'category' => "Garçon", 'price' => 5, 'stock' => 7, 'img' => "ghtouman");
		file_put_contents("./private/products.csv", serialize($set_products));
	}
	header("Location: index.php");
?>