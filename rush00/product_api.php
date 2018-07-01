<?php
function add_product($product_store, $product_name, $image_url, $price, $description, $categories)
{
	$products = unserialize(file_get_contents($product_store));
	$products[] = array('product_name' => $product_name, 'image_url' => $image_url,
						'price' => $price, 'description' => $description, 'categories' => $categories);
	file_put_contents($product_store, serialize($products));
}

function del_product($product_store, $product_name)
{
	$products = unserialize(file_get_contents($product_store));
	foreach ($products as $key => &$product)
	{
		if ($product['product_name'] === $product_name)
			unset($products[$key]);
	}
	unset($product);
	file_put_contents($product_store, serialize($products));
	delete_category_associations($product_store, $category_name);
}

function list_products($product_store)
{
	$products = unserialize(file_get_contents($product_store));
	if (!$products)
		return ;
	foreach ($products as $product)
	{
		echo $product['product_name'].' - '.$product['image_url'].' - '.$product['price'].' - '.$product['description'].' - '."<br />";
		foreach ($product['categories'] as $cat)
		{
			echo $cat." / ";
		}
		echo "<br /><br />";
	}
}

function delete_category_associations($category_store, $product_name)
{
	$categories = unserialize(file_get_contents($category_store));
	foreach ($categories as $key => &$cat)
	{
		$categories[$key]['products'] = delete_product_reference($categories[$key]['products'], $product_name);
	}
	file_put_contents($category_store, serialize($categories));
}

function delete_product_reference($products, $product_name)
{
	$new_products = array();
	foreach ($products as $prod)
	{
		if ($prod != $product_name)
			$new_products[] = $prod;
	}
	return $new_products;
}
