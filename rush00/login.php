<?php
include 'auth.php';
include 'constants.php';
session_start();
if(!auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['logged_on_user'] = "";
	echo "login error: wrong username or password\n";
}
else
{
	$_SESSION['logged_on_user'] = $_POST['login'];
	header('location: index.php');
}



