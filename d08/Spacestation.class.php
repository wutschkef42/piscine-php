<?php

// Spacestations are long, hence dimensions 5x2
class Spacestation extends Obstacle
{
	public function		__construct()
	{
		parent::__construct();
		$this->width = 5;
		$this->height = 2;
	}
}