<?php

class Obstacle
{
	// minimum margin between obstacle and grid borders
	define ("MARGIN", 10);

	// coordinates of obstacle's top left cell on board (game zone)
	private	$pos_x;
	private	$pos_y;

	// obstacle dimensions
	private	$width;
	private	$height;


	public function		__construct($grid_width, $grid_height)
	{
		$this->pos_x = rand(constant("MARGIN"), $grid_width - ($this->width + constant("MARGIN")));
		$this->pos_y = rand(constant("MARGIN"), $grid_height - ($this->height + constant("MARGIN")));

	}
}