#!/usr/bin/env php
<?php
if ($argc != 2)
	return ;
 if (!preg_match("#([Ll]undi|[Mm]ardi|[Mm]ercredi|[Jj]eudi|[Vvendredi]|[Ss]amedi|[Dd]imanche) [0-9]{1,2} ([Jj]anvier|Ff]evrier|[Mm]ars|[Aa]vril|[Mm]ai|[Jj]uin|[Jj]uillet|[Aa]out|[Ss]eptembre|[Oo]ctrobre|[Nn]ovembre|[Dd]ecembre) [0-9]{4} [0-9]{2}:[0-9]{2}:[0-9]{2}#", $argv[1]))
 {
 	 echo "Wrong Format";
 	 return ;
 }

$split = explode(" ", $argv[1]);

$translate_month = array(
	"Janvier" => "1",
	"janvier" => "1",
	"Fevrier" => "2",
	"fevrier" => "2",
	"Mars" => "3",
	"mars" => "3",
	"Avril" => "4",
	"avril" => "4",
	"Mai" => "5",
	"mai" => "5",
	"Juin" => "6",
	"juin" => "6",
	"Juillet" => "7",
	"juillet" => "7",
	"Aout" => "8",
	"aout" => "8",
	"Septembre" => "9",
	"septembre" => "9",
	"Octobre" => "10",
	"octobre" => "10",
	"Novembre" => "11",
	"novembre" => "11",
	"Decembre" => "12",
	"decembre" => "12"
);

$month = $translate_month[$split[2]];
$day = $split[1];
$year = $split[3];
$time = $split[4];
$datetime = $month."/".$day."/".$year." ".$time;

echo (strtotime($datetime));

