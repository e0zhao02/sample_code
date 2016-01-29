<?php
	session_start();
	include '../../../public/common/config.inc.php';
?>

<!doctype html>
<html>
<head>
<title><?=$_SESSION['username']?>'s Personal Page</title>
<link rel='stylesheet' href='../../public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include '../../public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='title'>
			<a href='/myShop/home/person/myorder.php'>View Orders</a> |
			<a href='/myShop/home/person/relation/index.php'>Contact</a> |
 			<a href='add.php'>Add Contact</a>
		</div>

		<div class='relation'>
			<form action='insert.php' method='post'>
				<table border='1px' cellspacing=0>
					<tr>
						<td>Name:</td>
						<td><input type='text' name='realname'></td>
					</tr>
					<tr>
						<td>Address:</td>
						<td><input type='text' name='address'></td>
					</tr>
					<tr>
						<td>Telephone:</td>
						<td><input type='text' name='telephone'></td>
					</tr>
					<tr>
						<td>Email:</td>
						<td><input type='text' name='email'></td>
					</tr>
					<tr>
						<td><input type='submit' value='Submit'></td>
						<td><input type='reset' value='Reset'></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<div class='nav'></div>
	<?php include '../../public/footer.php'; ?>
</div>
</body>
</html>
