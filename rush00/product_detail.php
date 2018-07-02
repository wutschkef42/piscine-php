<html>
<body>
<h1>Product Detail Page</h1>
<a href="index.php">Home</a>
<a href="signup.html">Sign up</a>    
<a href="login.html">Log in</a>
<br />
<br />
<?php
include('constants.php');
$products = unserialize(file_get_contents($db_dir.$product_store));
foreach ($products as $k => $p)
	{
		if ($p['product_name'] === $_GET['product_name'])
		{
			$html = "<div class='product'><img src='".$p['image_url']."'><a href='product_detail.php?product_name=".$p['product_name']."'>".$p['product_name']."</a></div><br />";
			echo $html;
		}
	}
?>

</body>
</html>