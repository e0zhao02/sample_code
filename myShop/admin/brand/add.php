<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$sqlShopclass="select * from shopclass order by id;";
	$resultShopclass=mysql_query($sqlShopclass);

?>

<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Add Brand</b></p>
<form action="insert.php" method="post">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>Brand Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td>Category Name:</td>
			<td><select name="shopclass_id">
				<option>--Select Category--</option>
				<?php
					while($rowShopclass=mysql_fetch_assoc($resultShopclass))
						echo "<option value='{$rowShopclass[id]}'>{$rowShopclass[name]}</option>";
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
