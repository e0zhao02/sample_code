<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlBrand="select * from brand where id={$id};";
	$resultBrand=mysql_query($sqlBrand);
	$rowBrand=mysql_fetch_assoc($resultBrand);

	$sqlShopclass="select * from shopclass order by id;";
	$resultShopclass=mysql_query($sqlShopclass);
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit Brand</b></p>
<form action="update.php" method="post">
<p>Brand Name:<input type="text" name="name" value='<?php echo $rowBrand['name']?>'></p>
<p>Category:
	<select name="shopclass_id">
		<option>--Category--</option>
		<?php
		while($rowShopclass=mysql_fetch_assoc($resultShopclass)){
			if($rowBrand[shopclass_id]==$rowShopclass[id])
				echo "<option selected value='{$rowShopclass[id]}'>{$rowShopclass['name']}</option>";
			else
				echo "<option value='{$rowShopclass[id]}'>{$rowShopclass['name']}</option>";
		}
		?>
	</select></p>
<input type="hidden" name='id' value='<?php echo $id ?>'>
<p><input type="submit" value='Submit'><input type="reset" value="Reset"></p>
</form>
</body>
</html>
