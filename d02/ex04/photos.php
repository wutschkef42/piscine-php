#!/usr/bin/env php
<?php

function get_name($img){
        preg_match("/^.*?([^\/]+)$/", $img, $matches);
        if (substr($matches[1], -1) === "\"" || substr($matches[1], -1) === "'")
            return (substr($matches[1], 0, -1));
        return ($matches[1]);
    }

function create_dir($url){
    $url = preg_replace("/^.*?:\/\//", '', $url);
    if (file_exists($url) && is_dir($url))
        return ($url);
    mkdir($url);
    return ($url);
}

function get_page($url)
{
	$c_session = curl_init();
	curl_setopt($c_session, CURLOPT_URL, $url);
	curl_setopt($c_session, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($c_session, CURLOPT_HEADER, false);
	$page = curl_exec($c_session);
	curl_close($c_session);
	return ($page);
}

function get_images($page, $url)
{
	preg_match_all("/<img[^>]+src=([^\s>]+)/i", $page, $matches);
    foreach ($matches[1] as $k => $v){
        $matches[1][$k] = trim($v, "\"");
        if (!preg_match("/^http(s?):\/\//", $matches[1][$k])){
            if (preg_match("/^\//", $matches[1][$k])){
                preg_match("/^(http(s?):\/\/)([^\/]+)/", $url, $url_matches);
                $matches[1][$k] = $url_matches[1]."".$url_matches[3]."".$matches[1][$k];
            } else {
                $matches[1][$k] = $url."".$matches[1][$k];
            }
        }
    }
    return ($matches);
}

function download_images($imgs, $folder) {
        foreach ($imgs[1] as $img) {
            $curl = curl_init($img);
            curl_setopt($curl, CURLOPT_HEADER, 0);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($curl, CURLOPT_BINARYTRANSFER,1);
            $raw = curl_exec($curl);
            curl_close ($curl);
            $fp = fopen($folder."/".get_name($img),'w');
            fwrite($fp, $raw);
            fclose($fp);
        }
    }


if ($argc != 2)
	return ;
$page = get_page($argv[1]);
$images = get_images($page, $argv[1]);
$dir = create_dir($argv[1]);
download_images($images, $dir);
