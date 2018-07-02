<?php
session_start();

$_SESSION['logged_on_user'] = '';
$_SESSION['basket'] = array();
header('Location: index.php');
?>
