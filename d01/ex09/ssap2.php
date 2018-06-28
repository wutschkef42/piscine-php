#!/usr/bin/env php
<?php
$words = array();
foreach (array_slice($argv, 1) as $val)
{
	$words = array_merge($words, preg_split('/ +/', $val));
}

$alpha = array();
$numeric = array();

foreach ($words as $word)
{
	if (ctype_alpha($word[0]))
	{
		array_push($alpha, $word);
		$words = array_diff($words, array($word));
	}
	if (is_numeric($word))
	{
		array_push($numeric, $word);
		$words = array_diff($words, array($word));	
	}
}

var_dump($words);
var_dump($alpha);
var_dump($numeric);

usort($alpha, "strcmp");
rsort($numeric, SORT_NUMERIC);
sort($words);

$alpha = array_merge($alpha, $numeric);
$alpha = array_merge($alpha, $words);

var_dump($alpha);