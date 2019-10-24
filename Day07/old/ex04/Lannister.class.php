<?php

class Lannister
{
	public function sleepWith($x)
	{
		if (get_parent_class($x) == 'Lannister')
			echo 'Not even if I\'m drunk !'.PHP_EOL;
		else
			echo 'Let\'s do this.'.PHP_EOL;
	}
}
