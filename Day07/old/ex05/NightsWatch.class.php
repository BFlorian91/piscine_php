<?php

class NightsWatch
{
	private $fighters = array();

	public function recruit($x)
	{
		array_push($this->fighters, $x);
	}

	public function fight()
	{
		foreach ($this->fighters as $fighter) {
			if (array_key_exists('IFighter', class_implements($fighter)))
				$fighter->fight();
		}
	}
}
