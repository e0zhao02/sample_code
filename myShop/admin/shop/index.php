<?php
	include "../public/common/acl.inc.php";
	include '../../public/common/config.inc.php';
	$sqlShop='select shop.*, brand.name as bname from shop, brand where shop.brand_id=brand.id order by shop.id;';

	$rstShop=mysql_query($sqlShop);
?>

<!doctype html>
<html>
<head>
<title>index</title>
<link rel='stylesheet' type='text/css' href='../public/css/index.css' />
</head>
<body id='user'>
	<p><b>View Products:</b></p>
	<table width='1000px' border='1px' cellspacing='0'>
		<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Product Stock</th>
			<th>Is Shelf</th>
			<th>Product Image</th>
			<th>Product Brand</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			while($rowShop=mysql_fetch_assoc($rstShop)){
				echo "<tr>";
				echo "<td>{$rowShop['id']}</td>";
				echo "<td>{$rowShop['name']}</td>";
				echo "<td>{$rowShop['price']}</td>";
				echo "<td>{$rowShop['stock']}</td>";
				if($rowShop['shelf']) echo "<td>On Shelf</td>";
				else echo "<td>Off Shelf</td>";
				echo "<td><img src='../../public/uploads/s_{$rowShop['image']}' width='100px' height='100px'></td>";
				echo "<td>{$rowShop['bname']}</td>";
				echo "<td><a href='edit.php?id={$rowShop['id']}&image={$rowShop['image']}'>Edit</a></td>";
				echo "<td><a href='delete.php?id={$rowShop['id']}&image={$rowShop['image']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
