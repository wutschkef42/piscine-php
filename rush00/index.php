<?php
include('install.php');

function get_price($products, $product, $qty)
{
	$price = 0;
	if (!$products || !$product)
		return (0);
	foreach ($products as $k => $p)
	{
		if ($p['product_name'] === $product)
		{
			$price = $p['price'];
		}
	}
	return ($price * $qty);
}

?>
<!doctype html>
<html>
	<head>
		<title>42 Store</title>
		<link href="style.css" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>Landing page</h1>
		<a href="signup.html">Sign up</a>    
		<a href="login.html">Log in</a>
		<?php
			if ($_SESSION['logged_on_user'] = "")
				echo "<a href='logout.php'>Log out</a>";
		?>
		<a href="basket_list.php">Cart</a>
		<h2>Products</h2>
		<?php
		include('constants.php');
		$products = unserialize(file_get_contents($db_dir.$product_store));
		foreach($products as $product)
		{
			$html = "<div class='product'><img src='".$product['image_url']."'><p>Price: ".get_price($products, $product['product_name'], 1)."<a href='product_detail.php?product_name=".$product['product_name']."'>".$product['product_name']."</a></div><br />";
			echo $html;
		}
		?>

	</body>
</html>