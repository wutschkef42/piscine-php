#!/usr/bin/env php
<?php

$words = array();
foreach (array_slice($argv, 1) as $val)
{
	print_r($val);
	//$words = array_merge($words, preg_split('/ +/', $val));
}
//natcasesort($words);
/*foreach ($words as $word)
{
	echo $word, "\n";
}*/