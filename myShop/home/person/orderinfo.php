<?php
	session_start();
	include '../../public/common/config.inc.php';

	$code=$_GET['code'];
?>

<!doctype html>
<html>
<head>
<title><?=$_SESSION['username']?>'s Personal Page</title>
<link rel='stylesheet' href='../public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include '../public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='title'>
			<a href='/myShop/home/person/myorder.php'>View Orders</a> |
			<a href='/myShop/home/person/relation/index.php'>Contact</a>
		</div>
		<div class='orders'>
			<table width='970px' border='1px' cellspacing='0'>
				<tr>
					<th>Order Id</th>
					<th>Product Name</th>
					<th>Product Image</th>
					<th>Product Num.</th>
					<th>Product Price</th>
				</tr>
				<?php
					$sqlOrders="select orders.id, shop.name, shop.image, orders.num, orders.price from orders,shop where orders.code={$code} and orders.shop_id=shop.id order by orders.id;";
					$rstOrders=mysql_query($sqlOrders);
					while($rowOrders=mysql_fetch_assoc($rstOrders)){
						echo "<tr>";
						echo "<td>{$rowOrders['id']}</td>";
						echo "<td>{$rowOrders['name']}</td>";
						echo "<td><img src='../../public/uploads/s_{$rowOrders['image']}'></td>";
						echo "<td>{$rowOrders['num']}</td>";
						echo "<td>{$rowOrders['price']}</td>";
						echo "</tr>";
					}
				?>
			</table>
		</div>
	</div>
	<div class='nav'></div>
	<?php include '../public/footer.php'; ?>
</div>
</body>
</html>
