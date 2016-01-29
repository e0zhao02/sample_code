<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlOrderstat="select * from orderstat where id={$id};";
	$resultOrderstat=mysql_query($sqlOrderstat);
	$rowOrderstat=mysql_fetch_assoc($resultOrderstat);
?>

<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit Order Status</b></p>
<form action='update.php' method='post'>
<p>Status Name:<input type="text" name="name" value="<?=$rowOrderstat['name']?>"></p>
<input type="hidden" name="id" value='<?=$id ?>'>
<p><input type="submit" value="Edit"><input type="reset" value="Reset">
</form>
</body>
</html>
