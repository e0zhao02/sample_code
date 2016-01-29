<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$sqlOrders='select orders.id,orders.code,user.username,orders.time,orderstat.name from user,orders,orderstat where orders.user_id=user.id and orders.orderstat_id=orderstat.id group by orders.code order by orders.id;';
	$rstOrders=mysql_query($sqlOrders);
?>

<!doctype html>
<html>
<head>
<title>index</title>
<link rel='stylesheet' type='text/css' href='../public/css/index.css'/>
<head>
<body id='user'>
	<p><b>View Orders:</b></p>
	<table width='700px' border='1px' cellspacing='0'>
		<tr>
			<th>ID</th>
			<th>Order No.</th>
			<th>Order User</th>
			<th>Order Time</th>
			<th>Order Status</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			while($rowOrders=mysql_fetch_assoc($rstOrders)){
				echo "<tr>";
				echo "<td>{$rowOrders['id']}</td>";
				echo "<td><a href='shopinfo.php?code={$rowOrders['code']}'>{$rowOrders['code']}</a></td>";
				echo "<td>{$rowOrders['username']}</td>";
				echo "<td>".date('Y-m-d H:i:s', $rowOrders['time'])."</td>";
				echo "<td>{$rowOrders['name']}</td>";
				echo "<td><a href='edit.php?id={$rowOrders['id']}'>Edit</a></td>";
				echo "<td><a href='delete.php?code={$rowOrders['code']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
