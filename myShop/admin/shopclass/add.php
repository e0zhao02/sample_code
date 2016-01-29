<?php
	include '../public/common/acl.inc.php';
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Add Category</b></p>
<form action="insert.php" method="post">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>Category Name:</td>
			<td><input type="text" name="name"></td>
		</tr>
		<tr>
			<td><input type="submit" value='Submit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
</body>
</html>
