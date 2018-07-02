<?php
include 'constants.php';
session_start();
if ($_SESSION['logged_on_user'] != 'root')
{
	echo "Error: no admin\n";
	return ;
}
function list_orders($order_store)
{
	$orders = unserialize(file_get_contents($order_store));
	if (!$orders)
	{
		echo "currently no orders\n";
		return ;
	}
	foreach ($orders as $order)
	{
		foreach ($order as $k => $v)
		{
			if ($v[0])
			{
				echo "Customer: <strong>".$k."</strong><br />";
				echo "Product: ".$v[0]."<br /><br />";				
			}
		}
	}
}
?>
<h1>Orders</h1>
<?php
list_orders($db_dir.$order_store);
?>