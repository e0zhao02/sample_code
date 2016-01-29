<?php
	session_start();
	include '../../public/common/config.inc.php';
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
					<th>Id</th>
					<th>Order No.</th>
					<th>Order Time</th>
					<th>Order Status</th>
				</tr>
				<?php
					$sqlOrders="select orders.id, orders.code, orders.time, orderstat.name from orders, orderstat where orders.orderstat_id=orderstat.id and orders.user_id={$_SESSION['user_id']} group by orders.code order by orders.id;";
					$rstOrders=mysql_query($sqlOrders);
					while($rowOrders=mysql_fetch_assoc($rstOrders)){
						echo "<tr>";
						echo "<td>{$rowOrders['id']}</td>";
						echo "<td><a href='orderinfo.php?code={$rowOrders['code']}'>{$rowOrders['code']}</a></td>";
						echo "<td>".date('Y-m-d H:i:s', $rowOrders['time'])."</td>";
						echo "<td>{$rowOrders['name']}</td>";
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
