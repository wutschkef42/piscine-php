<?php

class NightsWatch implements IFighter
{
	private				$recruits;

	public function		recruit($cadet)
	{
		$this->recruits[] = $cadet;
	}

	public function		fight()
	{
		foreach ($this->recruits as $recruit)
		{
			if (method_exists($recruit, 'fight'))
				$recruit->fight();
		}
	}
}