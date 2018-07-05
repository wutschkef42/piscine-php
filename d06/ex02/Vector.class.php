<?php

Class Vector
{
	public static			$verbose = FALSE;
	
	private					$_x;
	private					$_y;
	private					$_z;
	private					$_w;

	public static function	doc()
	{
		return (file_get_contents("Vector.doc.txt"));
	}

	public function			__construct($vts)
	{
		$dest = $vts['dest'];
		if (isset($vts['orig']))
			$orig = $vts['orig'];
		else
			$orig = new Vertex(array('x' => 0, 'y' => 0, 'z' => 0, 'w' => 1));

		$this->_x = $dest->getCoordX() - $orig->getCoordX();
		$this->_y = $dest->getCoordY() - $orig->getCoordY();
		$this->_z = $dest->getCoordZ() - $orig->getCoordZ();
		$this->_w = $dest->getCoordW() - $orig->getCoordW();


		if (static::$verbose)
			echo $this . " constructed\n";
	}

	public function			__destruct()
	{
		if (static::$verbose)
			echo $this . " destructed\n";
	}

	public function			__toString()
	{
		return(sprintf("Vector( x:%.2f, y:%.2f, z:%.2f, w:%.2f )",
			$this->_x, $this->_y, $this->_z, $this->_w));
	}

	public function			getCoordX()
	{
		return ($this->_x);
	}

	public function			getCoordY()
	{
		return ($this->_y);
	}

	public function			getCoordZ()
	{
		return ($this->_z);
	}

	public function			getCoordW()
	{
		return ($this->_w);
	}

	public function			magnitude()
	{
		return(sqrt(pow($this->_x, 2) + pow($this->_y, 2) + pow($this->_z, 2)));
	}

	public function			normalize()
	{
		$scale = $this->magnitude();
		if ($scale === 1)
		{
			$args['x'] = $this->_x;
			$args['y'] = $this->_y;
			$args['z'] = $this->_z;
			return (new Vector(array('dest' => new Vertex($args))));
		}
		$args['x'] = $this->_x / $scale;
		$args['y'] = $this->_y / $scale;
		$args['z'] = $this->_z / $scale;
		return (new Vector(array('dest' => new Vertex($args))));
	}

	public function			add($v)
	{
		$args['x'] = $this->_x + $v->getCoordX();
		$args['y'] = $this->_y + $v->getCoordY();
		$args['z'] = $this->_z + $v->getCoordZ();
		return (new Vector(array('dest' => new Vertex($args))));
	}

	public function			sub($v)
	{
		$args['x'] = $this->_x - $v->_x;
		$args['y'] = $this->_y - $v->_y;
		$args['z'] = $this->_z - $v->_z;
		return (new Vector(array('dest' => new Vertex($args))));
	}

	public function			opposite()
	{
		return ($this->scalarProduct(-1));
	}

	public function			scalarProduct($k)
	{
		$args['x'] = $this->_x * $k;
		$args['y'] = $this->_y * $k;
		$args['z'] = $this->_z * $k;
		return (new Vector(array('dest' => new Vertex($args))));
	}

	public function			dotProduct($v)
	{
		return ($this->_x * $v->_x + $this->_y * $v->_y + $this->_z * $v->_z);
	}

	public function			cos($v)
	{
		return ($this->dotProduct($v) / ($this->magnitude() * $v->magnitude()));
	}

	private function		sin($v)
	{
		return (sqrt(1 - pow($this->cos($v), 2)));
	}

	public function			crossProduct($v)
	{
		$args['x'] = $this->_y * $v->getCoordZ() - $this->_z * $v->getCoordY();
		$args['y'] = $this->_z * $v->getCoordX() - $this->_x * $v->getCoordZ();
		$args['z'] = $this->_x * $v->getCoordY() - $this->_y * $v->getCoordX();
		return (new Vector(array('dest' => new Vertex($args))));
	}
}