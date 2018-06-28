#!/usr/bin/env php
<?php
if ($argc < 3)
	return ;
$key = $argv[1];
$value = "";
$key_value_maps = array_splice($argv, 2);
foreach ($key_value_maps as $map)
{
	$split = explode(":", $map);
	if ($split[0] === $key)
		$value = $split[1];
}
echo $value;