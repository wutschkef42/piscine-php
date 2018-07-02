<?php
// products to add will come through get request with product name as parameter
session_start();
//echo $_GET['product_name'];
if ($_GET['product_name'] && $_GET['product_name'] != "")
	$_SESSION['basket'][] = $_GET['product_name'];
header('Location: basket_list.php')
?>

