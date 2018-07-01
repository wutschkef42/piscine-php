<?php
session_start();
if (!$_SESSION['logged_on_user'] || $_SESSION['logged_on_user'] === "")
{
	echo "ERROR\n";
	return ;
}
echo $_SESSION['logged_on_user'];
?>
