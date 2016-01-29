<?php
	include '../public/common/acl.inc.php';
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Add Product</b></p>
<form action="insert.php" method="post" enctype="multipart/form-data">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>Product Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="text" name="price"></td>
		</tr>
		<tr>
			<td>Product Stock</td>
			<td><input type="text" name="stock"></td>
		</tr>
		<tr>
			<td>Product IsShelf</td>
			<td><input type="radio" name="shelf" value=1>On Shelf<input type="radio" name="shelf" value=0 checked>Off Shelf</td>
		</tr>
		<tr>
			<td>Product Image</td>
			<td><input type="file" name="img"></td>
		</tr>
		<tr>
			<td>Product Brand</td>
			<td>
				<select name="brand_id">
					<option>--Select Brand--</option>
					<?php
						include '../../public/common/config.inc.php';

						$sqlShopclass="select * from shopclass order by id;";
						$rstShopclass=mysql_query($sqlShopclass);
						while($rowShopclass=mysql_fetch_assoc($rstShopclass)){
							echo "<option disabled>{$rowShopclass['name']}</option>";
							$sqlBrand="select * from brand where shopclass_id={$rowShopclass['id']} order by id;";
							$rstBrand=mysql_query($sqlBrand);
							while($rowBrand=mysql_fetch_assoc($rstBrand))
								echo "<option value='{$rowBrand['id']}'>|--{$rowBrand['name']}</option>";
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<td><input type="submit" value='Submit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
</body>
</html>
