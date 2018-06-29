#!/usr/bin/env php
<?php
if ($argc != 2)
	return ;


/* open and read input html file */

$fd = fopen($argv[1], "r") or die("Cannot open file: ".$argv[1]);
$page = fread($fd,filesize($argv[1]));


$page = preg_replace_callback("/(<a )(.*?)(>)(.*)(<\/a>)/si", function($matches) {
    $matches[0] = preg_replace_callback("/( title=\")(.*?)(\")/mi", function($matches) {
        return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
    }, $matches[0]);

    $matches[0] = preg_replace_callback("/(>)(.*?)(<)/si", function($matches) {
        return ($matches[1]."".strtoupper($matches[2])."".$matches[3]);
    }, $matches[0]);

    return ($matches[0]);
}, $page);
echo $page;