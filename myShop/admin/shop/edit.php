<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlShop="select * from shop where id={$id};";
	$rstShop=mysql_query($sqlShop);
	$rowShop=mysql_fetch_assoc($rstShop);
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit Product</b></p>
<form action="update.php" method="post" enctype="multipart/form-data">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>Product Name:</td>
			<td><input type="text" name="name" value='<?=$rowShop['name']?>'></td>
		</tr>
		<tr>
			<td>Product Price</td>
			<td><input type="text" name="price" value='<?=$rowShop['price']?>'></td>
		</tr>
		<tr>
			<td>Product Stock</td>
			<td><input type="text" name="stock" value='<?=$rowShop['stock']?>'></td>
		</tr>
		<tr>
			<td>Product IsShelf</td>
			<td>
				<?php
					if($rowShop['shelf']) {
						echo "<input type='radio' name='shelf' value=1 checked>On Shelf";
						echo "<input type='radio' name='shelf' value=0>Off Shelf";
					}
					else {
						echo "<input type='radio' name='shelf' value=1>On Shelf";
						echo "<input type='radio' name='shelf' value=0 checked>Off Shelf";
					}
				?>
			</td>
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
							while($rowBrand=mysql_fetch_assoc($rstBrand)) {
								if($rowShop['brand_id']==$rowBrand['id'])
									echo "<option value='{$rowBrand['id']}' selected>|--{$rowBrand['name']}</option>";
								else
									echo "<option value='{$rowBrand['id']}'>|--{$rowBrand['name']}</option>";
							}
						}
					?>
				</select>
			</td>
		</tr>
		<tr>
			<input type="hidden" name="id" value="<?=$rowShop['id']?>">
			<input type="hidden" name="oldimage" value="<?=$rowShop['image'] ?>">
			<td><input type="submit" value='Submit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
	<p><b>Resized Image</b></p>
	<p><img src="../../public/uploads/s_<?=$rowShop['image']?>" style="border:2px dashed #ccc"></p>
</body>
</html>
