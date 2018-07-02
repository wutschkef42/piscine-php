<html>
<body>
<h1>Basket</h1>
<?php
foreach($_SESSION['basket'] as $product)
{
	$html = "<p>".$product."</p>";
	echo $html;
}
?>



</body>
</html>