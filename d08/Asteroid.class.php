<?php

// Asteroids are round, hence dimensions 3x3
class Asteroid extends Obstacle
{
	public function		__construct()
	{
		parent::__construct();
		$this->width = 3;
		$this->height = 3;
	}
}