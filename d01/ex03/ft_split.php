<?php
function ft_split(string $str)
{
	$out = preg_split('/ +/', $str);
	sort($out);
	return ($out);
}