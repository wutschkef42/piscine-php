<?php
session_start();
if(!$_SESSION['logged_on_user'])
	echo "ERROR\n";
$chat = unserialize(file_get_contents("../private/chat"));
if (!$chat)
	return;
foreach ($chat as $msg)
{
	echo "[".date('H:i', $msg['time'])."] <b>".$msg['login']."</b>: ".$msg['msg']."<br />";
}