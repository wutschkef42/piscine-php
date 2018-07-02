<?php
session_start();
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
	
		<?php
				if ($_SESSION['logged_on_user'] && $_SESSION['logged_on_user'] != "")
					echo "<a href='logout.php'>  Log out  </a>";
				else
				{
						echo "<a href='signup.html'>  Sign up  </a>";
						echo "<a href='login.html'>  Log in  </a>";
				}
				if ($_SESSION['logged_on_user'] === 'root')
				{
					echo "<a href='view_orders.php'>  Order List  </a>";
					echo "<a href='admin_panel.php'>  Admin Panel  </a>";
				}
		?>
		<a href="basket_list.php">  Cart  </a>
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
		<h2>Categories</h2>
		<ul>
		<?php
		include('constants.php');
		$categories = unserialize(file_get_contents($db_dir.$category_store));
		foreach($categories as $cat)
		{
			$html = "<li><a href='category_detail.php?category_name=".$cat['category_name']."'>".$cat['category_name']."</a</li>";
			echo $html;
		}
		?>
		</ul>
	</body>
</html>