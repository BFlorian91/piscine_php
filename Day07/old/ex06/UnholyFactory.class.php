<?php

class UnholyFactory
{
	private $schemas = array();

	public function absorb($fighter)
	{
		if (get_parent_class($fighter) != 'Fighter') {
			echo '(Factory can\'t absob this, it\'s not a Fighter)'.PHP_EOL;
		} else if (!in_array($fighter, $this->schemas)) {
			$this->schemas[$fighter->fighterType] = $fighter;
			echo '(Factory absorbed a fighter of type '.$fighter->fighterType.')'.PHP_EOL;
		} else {
			echo '(Factory already absorbed a fighter of type '.$fighter->fighterType.')'.PHP_EOL;
		}
	}

	public function fabricate($fighter)
	{
		if (array_key_exists($fighter, $this->schemas)) {
			echo '(Factory fabricates a fighter of type '.$fighter.')'.PHP_EOL;
			return ($this->schemas[$fighter]);
		} else {
			echo '(Factory hasn\'t absorbed any fighter of type '.$fighter.')'.PHP_EOL;
			return NULL;
		}
	}
}
