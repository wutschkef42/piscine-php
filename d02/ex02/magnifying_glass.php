#!/usr/bin/env php
<?php
if ($argc != 2)
	return ;


/* open and read input html file */

$fd = fopen($argv[1], "r") or die("Cannot open file: ".$argv[1]);
$page = fread($fd,filesize($argv[1]));


/* regex patterns */

$pattern_title = "/title=\"([\s\S]*?)\"/";
$pattern_anchor = "/<a[\s]+([^>]+)>((?:.(?!\<\/a\>))*.)<\/a>/";


$page = preg_replace_callback(
	$pattern_title,
	function ($matches) {
		return "title=\"".strtoupper($matches[1])."\"";
	},
	$page

);

$page = preg_replace_callback(
	$pattern_anchor,
	function($matches) {
		$allcap="";
		$parts = preg_split("/(<|>)/", $matches[2]);
		$i = 0;
		foreach($parts as $part)
		{
			if ($i % 2 == 0)
				$allcap = $allcap.strtoupper($part);
			else
				$allcap = $allcap."<".$part.">";
			$i++;
		}
		return (preg_replace("/".$matches[2]."/", $allcap, $matches[0]));
	},
	$page
);

echo $page;
