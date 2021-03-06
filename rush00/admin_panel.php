<?php
session_start();
if ($_SESSION['logged_on_user'] != 'root')
{
	echo "Error: no admin\n";
	return ;
}
?>
<!doctype html>
<html>
<head>
	<title>Admin Panel</title>
</head>
<body>
	<form action="add_product.php" method="POST">
		<legend>Add Product</legend>
		<label for="product_name">Product Name</label>
		<input type="text" name="product_name" id="product_name"> <br />
		<label for="price">Price</label>
		<input type="text" name="price" id="price"> <br />
		<label for="image_url">Image URL</label>
		<input type="text" name="image_url" id="image_url"> <br />
		<label for="description">Description</label>
		<input type="textarea" name="description" id="description"> <br />
		<label for="categories">Categories (comma-separated)</label>
		<input type="text" name="categories" id="categories"> <br />
		<label for="add_product">Add Product</label>
		<input type="submit" name="add_product" id="add_product"> <br />
	</form>
	<br />
	<form action="del_product.php" method="POST">
		<legend>Delete Product</legend>
		<label for="product_name">Product Name</label>
		<input type="text" name="product_name" id="product_name"> <br />
		<label for="del_product">Delete Product</label>
		<input type="submit" name="del_product" id="del_product"> <br />
	</form>
	<br />
	<form action="list_products.php" method="GET">
		<label for="list_products">List Products</label>
		<input type="submit" name="list_products" id="list_products"> <br />
	</form>

	<br />
	<br />
	
	<form action="add_category.php" method="POST">
		<legend>Add Category</legend>
		<label for="category_name">Category Name</label>
		<input type="text" name="category_name" id="category_name"> <br />
		<label for="products">Products (comma-separated)</label>
		<input type="text" name="products" id="products"> <br />
		<label for="add_category">Add Category</label>
		<input type="submit" name="add_category" id="add_category"> <br />
	</form>
	<br />
	<form action="del_category.php" method="POST">
		<legend>Delete Category</legend>
		<label for="category_name">Category Name</label>
		<input type="text" name="category_name" id="category_name"> <br />
		<label for="del_category">Delete Category</label>
		<input type="submit" name="del_category" id="del_category"> <br />
	</form>
	<br />
	<form action="list_categories.php" method="GET">
		<label for="list_categories">List Categories</label>
		<input type="submit" name="list_categories" id="list_categories"> <br />
	</form>
</body>

</html>