<?php

function	type_exists($type, $known_fighter_types)
{
	if (!$known_fighter_types)
		return (0);
	foreach ($known_fighter_types as $known)
	{
		if ($known === $type)
			return (1);
	}
	return (0);
}

class UnholyFactory
{
	private static			$known_fighter_types;

	public function			absorb($f)
	{
		if (!(get_parent_class($f) === "Fighter"))
			print( "(Factory can't absorb this, it's not a fighter)" . PHP_EOL );
		else if (type_exists($f->getFighterType(), $this->known_fighter_types))
			print( "(Factory already absorbed a fighter of type " . $f->getFighterType() . ")" . PHP_EOL );
		else
		{
			$this->known_fighter_types[] = $f->getFighterType();
			print( "(Factory absorbed a fighter of type " . $f->getFighterType() . ")" . PHP_EOL );
		}
	}

	public function	fabricate($rf)
	{
		if (!type_exists($rf, $this->known_fighter_types))
		{
			print( "(Factory hasn't absorbed any fighter of type " . $rf . ")" . PHP_EOL );
			return (NULL);
		}
		switch ($rf)
		{
			case "foot soldier":
				print( "(Factory fabricates a fighter of type foot soldier)" . PHP_EOL);
				return (new Footsoldier());
			case "archer":
				print( "(Factory fabricates a fighter of type archer)" . PHP_EOL );
				return (new Archer());
			case "assassin":
				print( "(Factory fabricates a fighter of type assassin)" . PHP_EOL );
				return (new Assassin());
		}
		return (NULL);
	}
}