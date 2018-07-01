<?php
function add_product($product_store, $product_name, $image_url, $price, $description)
{
	$products = unserialize(file_get_contents($product_store));
	$products[] = array('product_name' => $product_name, 'image_url' => $image_url,
						'price' => $price, 'description' => $description);
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
}

function list_products($product_store)
{
	$products = unserialize(file_get_contents($product_store));
	if (!$products)
		return ;
	foreach ($products as $product)
	{
		echo $product['product_name'].' - '.$product['image_url'].' - '.$product['price'].' - '.$product['description']."<br />";
	}
}