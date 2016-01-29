<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$id=$_GET['id'];
	$sqlUser="select * from user where id={$id};";
	$rstUser=mysql_query($sqlUser);
	$rowUser=mysql_fetch_assoc($rstUser);
?>
<!doctype html>
<html>
<head>
</head>
<body>
<p><b>Edit User</b></p>
<form action="update.php" method="post">
	<table border='1px' cellspacing='0'>
		<tr>
			<td>User Name:</td>
			<td><input type="text" name="username" value='<?php echo $rowUser['username']?>'></td>
		</tr>
		<tr>
			<td>Password:</td>
			<td><input type="password" name="password" value=''></td>
		</tr>
		<tr>
			<td>Confirm Password:</td>
			<td><input type="password" name="repassword" value=''></td>
		</tr>
		<tr>
			<td>Administrator:</td>
			<td>
				<?php
					if($rowUser['admin']) {
						echo "<input type='radio' name='isadmin' value='1' checked>Yes";
						echo "<input type='radio' name='isadmin' value='0'>No";
					}
					else {
						echo "<input type='radio' name='isadmin' value='1'>Yes";
						echo "<input type='radio' name='isadmin' value='0' checked>No";
					}
				?>
			</td>
		</tr>
		<tr>
			<input type="hidden" name='id' value='<?php echo $id ?>'>
			<td><input type="submit" value='Submit'></td>
			<td><input type="reset" value="Reset"></td>
		</tr>
	</table>
</form>
</body>
</html>
