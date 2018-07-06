<?php

class Tyrion extends Lannister
{
	public function	sleepWith($partner)
	{
		switch(get_parent_class($partner))
		{
			case "Lannister":
				print( "Not even if I'm drunk !" . PHP_EOL );
				break ;
			case "Stark":
				print( "Let's do this." . PHP_EOL );
				break ;
		}
	}
}