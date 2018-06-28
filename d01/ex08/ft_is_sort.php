<?php
function ft_is_sort(array $tab)
{
	$sorted = $tab;
	natsort($sorted);
	$assoc = array_combine($tab, $sorted);
	foreach($assoc as $expected => $actual)
	{
		if (strcmp($expected, $actual) != 0)
			return (0);
	}
	return (1);
}
