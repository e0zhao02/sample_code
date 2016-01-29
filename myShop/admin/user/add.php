<?php
	include '../public/common/acl.inc.php';
?>

<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Add User</b></p>
<form action="insert.php" method="post">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>User Name:</td>
			<td><input type="text" name="username"></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password"></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="repassword"></td>
		</tr>
		<tr>
			<td><input type="submit" value='Submit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
</body>
</html>
