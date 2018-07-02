<html>
<body>
<?php
include('constants.php');
$products = unserialize(file_get_contents($db_dir.$product_store));
foreach($products as $product)
{
	$html = "<a href='basket.php?product_name=".$product['product_name']."'>".$product['product_name']."</a><br />";
	echo $html;
}
?>

</body>
</html>