<?php

class Dice
{
	private	$sides;

	public function	__construct()
	{
		$this->sides = 6;
	}

	public function	throw()
	{
		return (rand(1,$this->sides));
	}
}