<?php
	include '../public/common/acl.inc.php';
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Add Order Status</b></p>
<form action="insert.php" method="post">
	<p>Status Name:<input type="text" name="name"></p>
	<p><input type="submit" value="Add"><input type="reset" value="Reset">
</form>
</body>
</html>
