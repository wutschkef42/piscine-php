<?php
session_start();
include 'product_api.php';
include 'constants.php';

function count_qty($products, $product)
{
	$qty = 0;
	if (!$products || !$product)
		return (0);
	foreach ($products as $p)
	{
		if ($p === $product)
			$qty = $qty + 1;
	}
	return ($qty);
}

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

<html>
<body>
<h1>Basket</h1>
<a href="/index.php">Home</a>
<?php
	if ($_SESSION['logged_on_user'] && $_SESSION['logged_on_user'] != "")
		echo "<a href='logout.php'>  Log out  </a>";
	else
	{
			echo "<a href='signup.html'>  Sign up  </a>";
			echo "<a href='login.html'>  Log in</a>";
	}
?>
<?php
if (!$_SESSION['basket'])
	return ;
$products = unserialize(file_get_contents($db_dir.$product_store));

foreach($_SESSION['basket'] as $product)
{
	$qty = count_qty($_SESSION['basket'], $product);
	$price = get_price($products, $product, $qty);
	$html = "<p>Product: <strong>".$product."</strong>, Quantity: <strong>".$qty."</strong>, Price: <strong>".$price."</strong></p>";
	echo $html;
}
?>
<a href="validate.php">Confirm order</a>
</body>
</html>