<?php
include 'constants.php';
session_start();

$orders = unserialize(file_get_contents($db_dir.$order_store));
$orders[] = array($_SESSION['logged_on_user'] => $_SESSION['basket']);
file_put_contents($db_dir.$order_store, serialize($orders));
$_SESSION['basket'] = array();
header('Location: index.php');
?>