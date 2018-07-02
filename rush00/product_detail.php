<html>
<body>
<h1>Product Detail Page</h1>
<?php
	if ($_SESSION['logged_on_user'] && $_SESSION['logged_on_user'] != "")
		echo "<a href='logout.php'>  Log out  </a>";
	else
	{
			echo "<a href='signup.html'>  Sign up  </a>";
			echo "<a href='login.html'>  Log in</a>";
	}
?>
<a href="basket_list.php">  Cart  </a>
<br />
<br />
<?php
include('constants.php');
$products = unserialize(file_get_contents($db_dir.$product_store));
foreach ($products as $k => $p)
	{
		if ($p['product_name'] === $_GET['product_name'])
		{
			$html = "<div class='product'><img src='".$p['image_url']."'><p><strong>".$p['product_name']."</strong><br />Price: ".$p['price']."<br /></div><br />";
			echo $html;
			$html = "<a href='basket.php?product_name=".$p['product_name']."'>Add to cart</a><br />";
			echo $html;
		}
	}
?>

</body>
</html>