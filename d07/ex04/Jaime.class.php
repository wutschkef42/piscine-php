<?php

class Jaime extends Lannister
{
	public function	sleepWith($partner)
	{
		switch(get_parent_class($partner))
		{
			case "Lannister":
				if (get_class($partner) === "Tyrion")
					print( "Not even if I'm drunk !" . PHP_EOL );
				else
					print( "With pleasure, but only in a tower in Winterfell, then." . PHP_EOL );
				break ;
			case "Stark":
				print( "Let's do this." . PHP_EOL );
				break ;
		}
	}
}