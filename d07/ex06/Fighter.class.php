<?php

class Fighter
{
	private			$fighter_type;

	public function	__construct($fighter_type)
	{
		$this->fighter_type = $fighter_type;
	}

	public function	getFighterType()
	{
		return ($this->fighter_type);
	}
}