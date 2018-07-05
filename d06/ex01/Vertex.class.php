<?php

require_once("Color.class.php");

class Vertex 
{
	public static	$verbose = FALSE;

	private			$_x;
	private			$_y;
	private			$_z;
	private			$_w;
	private 		$_c;

	public static function	doc()
	{
		return (file_get_contents("Vertex.doc.txt"));
	}

	public function			__construct($vtx)
	{
		$this->_x = $vtx['x'];
		$this->_y = $vtx['y'];
		$this->_z = $vtx['z'];
		$this->_w = (isset($vtx['w'])) ? $vtx['w'] : 1.0;
		if (isset($vtx['color']))
			$this->_c = $vtx['color'];
		else
			$this->_c = new Color(array("rgb" => 0xFFFFFF));
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
		$str = sprintf("Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f",
			$this->_x, $this->_y, $this->_z, $this->_w);
		if (static::$verbose)
			$str .= ", " . $this->_c;
		$str .= " )";
		return ($str);
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

	public function			getColor()
	{
		return ($this->_c);
	}

	public function			setCoordX($x)
	{
		$this->_x = $x;
	}

	public function			setCoordY($y)
	{
		$this->_y = $y;	
	}

	public function			setCoordZ($z)
	{
		$this->_z = $z;
	}

	public function			setCoordW($w)
	{
		$this->_w = $w;
	}

	public function			setColor($c)
	{
		$this->_c = $c;
	}		
}
?>