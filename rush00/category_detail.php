<html>
<body>
<h1>Category Detail Page</h1>
<a href="index.php">Home</a>
<a href="signup.html">Sign up</a>    
<a href="login.html">Log in</a>
<br />
<br />
<?php
include('constants.php');
include('category_api.php');
$product_names = get_products_by_category($db_dir.$category_store, $_GET['category_name']);
if (!$product_names)
	return ;
foreach ($product_names as $pname)
	{
		echo "<a href='product_detail.php?product_name=".$pname."'>".$pname."</a><br />";

	}
?>

</body>
</html>