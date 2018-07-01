<?php
include('constants.php');


function init_user_store($dir, $name)
{
	if (!file_exists($dir))
		mkdir($dir);
	if (!file_exists($dir.$name))
		file_put_contents($dir.$name, null);
}

function init_product_store($dir, $name)
{
	if (!file_exists($dir))
		mkdir ($dir);
	if (!file_exists($dir.$name))
		file_put_contents($dir.$name, null);
}

init_user_store($db_dir, $user_store);
init_product_store($db_dir, $product_store);
	
?>