<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';

	$sqlOrderstat="select * from orderstat order by id;";
	$resultOrderstat=mysql_query($sqlOrderstat);
?>

<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../public/css/index.css' />
</head>
<body id='user'>
<?php
	echo "<p><b>View Order Status</b></p>";
	echo "<table width='700px' border='1px' cellspacing='0'>";
	echo "<tr>";
	echo "<th>ID</th>";
	echo "<th>Order Status</th>";
	echo "<th>Edit</th>";
	echo "<th>Delete</th>";
	echo "</tr>";

	while($rowOrderstat=mysql_fetch_array($resultOrderstat)){
		echo "<tr>";
		echo "<td>{$rowOrderstat['id']}</td>";
		echo "<td>{$rowOrderstat['name']}</td>";
		echo "<td><a href='edit.php?id={$rowOrderstat['id']}'>Edit</a></td>";
		echo "<td><a href='delete.php?id={$rowOrderstat['id']}'>Delete</a></td>";
		echo "</tr>";
	}

	echo "</table>";
?>
</body>
</html>
