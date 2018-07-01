<?php
$path = "./db/";
$file = $path."passwd";

if (!file_exists($path))
	mkdir($path, 0755, true);
if (!$_POST['login'] || !$_POST['passwd'] || !$_POST['submit'] || $_POST['submit'] != "OK")
{
	echo "sign up error: post request ill-formatted\n";
	return ;
}
$accounts = array();
if (file_exists($file))
	$accounts = unserialize(file_get_contents($file));
foreach ($accounts as $account)
{
	if ($account["login"] === $_POST["login"])
	{
		echo "sign up error: username exists. please choose another one.\n";
		return ;
	}
}
$accounts[] = array("login" => $_POST["login"], "passwd" => hash("ripemd160", $_POST["passwd"]));
file_put_contents($file, serialize($accounts));
header('Location: index.php');
?>

