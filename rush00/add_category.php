<?php
include('category_api.php');
include('constants.php');

if (!isset($_POST['category_name']) || !isset($_POST['products']) || !isset($_POST['add_category']))
{
	echo "add category error: ill-formatted post request\n";
	return ;
}
$products = explode(',', $_POST['products']);
add_category($db_dir.$category_store, $_POST['category_name'], $products);
header('Location: admin_panel.php');
