<?php
function add_category($category_store, $category_name)
{
	$categories = unserialize(file_get_contents($category_store));
	$categories[] = array('category_name' => $category_name);
	file_put_contents($category_store, serialize($categories));
}

function del_category($category_store, $category_name)
{
	$categories = unserialize(file_get_contents($category_store));
	foreach ($categories as $key => &$category)
	{
		if ($category['category_name'] === $category_name)
			unset($categories[$key]);
	}
	unset($category);
	file_put_contents($category_store, serialize($categories));
}

function list_categories($category_store)
{
	$categories = unserialize(file_get_contents($category_store));
	if (!$categories)
		return ;
	foreach ($categories as $category)
	{
		echo $category['category_name']."<br />";
	}
}
?>
