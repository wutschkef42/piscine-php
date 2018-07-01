<?php
include('category_api.php');
include('constants.php');

if (!isset($_POST['category_name']) || !isset($_POST['add_category']))
{
	echo "add category error: ill-formatted post request\n";
	return ;
}
add_category($db_dir.$category_store, $_POST['category_name']);
header('Location: admin_panel.html');
