#!/usr/bin/env php
<?php
if ($argc < 2)
	return ;
$str = $argv[1];
$words = preg_split('/ +/', $str);
if (count($words) == 0)
	return ;
if (count($words) == 1)
{
	echo $words[0];
	return ;
}
$output = $words[1];
foreach(array_slice($words, 2) as $word)
{
	$output = $output." ".$word;	
}
$output = $output." ".$words[0];
echo $output;