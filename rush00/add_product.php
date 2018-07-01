<?php
include('product_api.php');
include('constants.php');

if (!isset($_POST['product_name']) || !isset($_POST['price']) || !isset($_POST['image_url']) || !isset($_POST['description']) || !isset($_POST['add_product']))
{
	echo "add product error: ill-formatted post request\n";
	return ;
}
add_product($db_dir.$product_store, $_POST['product_name'], $_POST['image_url'], $_POST['price'], $_POST['description']);
header('Location: admin_panel.html');
