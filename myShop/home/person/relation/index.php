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
		<table width='980px' border='1px' cellspacing=0>
		<tr>
			<th>Name</th>
			<th>Address</th>
			<th>Telephone</th>
			<th>Email</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			$sqlRel="select * from contact where user_id={$_SESSION['user_id']};";
			$rstRel=mysql_query($sqlRel);
			while($rowRel=mysql_fetch_assoc($rstRel)) {
				echo "<tr>";
				echo "<td>{$rowRel['realname']}</td>";
				echo "<td>{$rowRel['address']}</td>";
				echo "<td>{$rowRel['telephone']}</td>";
				echo "<td>{$rowRel['email']}</td>";
				echo "<td><a href='edit.php?id={$rowRel['id']}'>Edit</a></td>";
				echo "<td><a href='delete.php?id={$rowRel['id']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
		</table>
		</div>
	</div>
	<div class='nav'></div>
	<?php include '../../public/footer.php'; ?>
</div>
</body>
</html>
