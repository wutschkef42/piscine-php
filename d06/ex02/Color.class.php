<?php

class Color
{
	public static	$verbose = FALSE;

	public 			$red;
	public			$green;
	public			$blue;
	
	
	public static function	doc()
	{
		return (file_get_contents("Color.doc.txt"));
	}

	public function			__construct($rgb)
	{
		if (isset($rgb['rgb']))
		{
			$rgb_int = intval($rgb['rgb']);
			$r = ($rgb_int >> 16) & 0xFF;
			$g = ($rgb_int >> 8) & 0xFF;
			$b = $rgb_int & 0xFF;
			$this->_loadColor($r, $g, $b);
		}
		else
		{
			$this->_loadColor($rgb['red'], $rgb['green'], $rgb['blue']);
		}
		if (static::$verbose)	
			echo $this . " constructed.\n";
	}

	public function			__destruct()
	{
		if (static::$verbose)
			echo $this . " destructed.\n";

	}

	public function 		__toString()
	{
		return (sprintf("Color( red: %3d, green: %3d, blue: %3d )",
			$this->red, $this->green, $this->blue));
	}


	public function 		add($col)
	{
		$new['red'] = $this->red + $col->red;
		$new['green'] = $this->green + $col->green;
		$new['blue'] = $this->blue + $col->blue;
		return (new Color($new));
	}

	public function 		sub($col)
	{
		$new['red'] = $this->red - $col->red;
		$new['green'] = $this->green - $col->green;
		$new['blue'] = $this->blue - $col->blue;		
		return (new Color($new));
	}

	public function 		mult($f)
	{
		$new['red'] = $this->red * $f;
		$new['green'] = $this->green * $f;
		$new['blue'] = $this->blue * $f;
		return (new Color($new));
	}

	private function		_loadColor($r, $g, $b)
	{
		$this->red = intval($r);
		$this->green = intval($g);
		$this->blue = intval($b);
	}
}