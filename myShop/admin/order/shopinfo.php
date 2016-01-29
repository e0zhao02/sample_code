<?php
	include '../public/common/acl.inc.php';
	include "../../public/common/config.inc.php";

	$code=$_GET['code'];
	$sqlOrder="select shop.id,shop.name,shop.image,orders.num,shop.price from orders,shop where orders.shop_id=shop.id and orders.code='{$code}' order by orders.id;";
	$rstOrder=mysql_query($sqlOrder);
?>

<!doctype html>
<html>
<head>
</head>
<body>
	<p><b>View Order Products</b></p>
	<table width='700px' border='1px' cellspacing=0>
		<tr>
			<th>Product Id</th>
			<th>Product Name</th>
			<th>Product Image</th>
			<th>Product Num</th>
			<th>Product Price</th>
		</tr>
		<?php
			while($rowOrder=mysql_fetch_assoc($rstOrder)){
				echo "<tr>";
				echo "<td>{$rowOrder[id]}</td>";
				echo "<td>{$rowOrder[name]}</td>";
				echo "<td><img src='../../public/uploads/s_{$rowOrder[image]}' width='100px' height='70px'></td>";
				echo "<td>{$rowOrder[num]}</td>";
				echo "<td>{$rowOrder[price]}</td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
