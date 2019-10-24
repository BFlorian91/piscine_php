<?php

class Jaime extends Lannister
{
	public function sleepWith($x)
	{
		if (get_class($x) == 'Cersei')
			echo 'With pleasure, but only in a tower in Winterfell, then.'.PHP_EOL;
		else
			parent::sleepWith($x);
	}
}
