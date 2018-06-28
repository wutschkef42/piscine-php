#!/usr/bin/env php
<?php
$words = array();
foreach (array_slice($argv, 1) as $val)
{
	$words = array_merge($words, preg_split('/ +/', $val));
}
sort($words);
foreach ($words as $word)
{
	echo $word, "\n";
}
