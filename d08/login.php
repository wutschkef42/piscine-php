<?php
include 'auth.php';
session_start();	
if(!auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['logged_on_user'] = "";
	echo "ERROR\n";
	header('Location: login.html');
}
else
{
	$_SESSION['logged_on_user'] = $_POST['login'];
	header('Location: board.html');
}

