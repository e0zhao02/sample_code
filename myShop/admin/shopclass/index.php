<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$sqlShopClass='select * from shopclass order by id;';

	$resultShopClass=mysql_query($sqlShopClass);
?>

<!doctype html>
<html>
<head>
<title>index</title>
<link rel='stylesheet' type='text/css' href='../public/css/index.css' />
</head>
<body id='user'>
	<p><b>View Categories:</b></p>
	<table width='700px' border='1px' cellspacing='0'>
		<tr>
			<th>Category ID</th>
			<th>Category Name</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			while($rowShopClass=mysql_fetch_assoc($resultShopClass)){
				echo "<tr>";
				echo "<td>{$rowShopClass['id']}</td>";
				echo "<td>{$rowShopClass['name']}</td>";
				echo "<td><a href='edit.php?id={$rowShopClass['id']}'>Edit</a></td>";
				echo "<td><a href='delete.php?id={$rowShopClass['id']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
