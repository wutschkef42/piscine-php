#!/usr/bin/env php
<?php
if ($argc != 2)
	return ;
$c_session = curl_init();
curl_setopt($c_session, CURLOPT_URL, $argv[1]);
curl_setopt($c_session, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c_session, CURLOPT_HEADER, false);
$result = curl_exec($c_session);



$matches = array();
$pattern = "/img\s*src\s*=\s*\"(.+?)\"/";
preg_match_all($pattern, $result, $matches);
print_r($matches);

