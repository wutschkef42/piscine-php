<?php
include 'auth.php';
include 'basket_api.php';
session_start();	
if(!auth($_POST['login'], $_POST['passwd']))
{
	$_SESSION['logged_on_user'] = "";
	echo "login error: wrong username or password\n";
}
else
{
	if ($_SESSION['logged_on_user'] != "")
		save_basket($db_dir.$basket_store, $POST['login'], null);
	else
		save_basket($db_dir.$basket_store, $POST['login'], $_SESSION['basket']);
	$_SESSION['logged_on_user'] = $_POST['login'];
	var_dump(get_basket($db_dir.$basket_store, $POST['login']));
	//header('location: index.php');
}
?>


