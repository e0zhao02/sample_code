<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlShopClass="select * from shopclass where id={$id};";
	$resultShopClass=mysql_query($sqlShopClass);
	$rowShopClass=mysql_fetch_assoc($resultShopClass);
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit Category</b></p>
<form action="update.php" method="post">
<p>Category Name:<input type="text" name="name" value='<?php echo $rowShopClass['name']?>'></p>
<input type="hidden" name='id' value='<?php echo $id ?>'>
<p><input type="submit" value='Submit'><input type="reset" value="Reset"></p>
</form>
</body>
</html>
