<?php
include('product_api.php');
include('constants.php');

if (!isset($_POST['product_name']) || !isset($_POST['del_product']))
{
	echo "del product error: ill-formatted post request\n";
	return ;
}
del_product($db_dir.$product_store, $db_dir.$category_store, $_POST['product_name']);
header('Location: admin_panel.php');
