<?php
include('category_api.php');
include('constants.php');

if (!isset($_POST['category_name']) || !isset($_POST['del_category']))
{
	echo "del category error: ill-formatted post request\n";
	return ;
}
del_category($db_dir.$category_store, $_POST['category_name']);