<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$sqlUser='select * from user order by id;';

	$rstUser=mysql_query($sqlUser);
?>

<!doctype html>
<html>
<head>
<title>index</title>
<link rel='stylesheet' type='text/css' href='../public/css/index.css' />
</head>
<body id='user'>
	<p><b>View Users:</b></p>
	<table width='700px' border='1px' cellspacing='0'>
		<tr>
			<th>User ID</th>
			<th>UserName</th>
			<th>Registration Time</th>
			<th>Administrator</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		<?php
			while($rowUser=mysql_fetch_assoc($rstUser)){
				echo "<tr>";
				echo "<td>{$rowUser['id']}</td>";
				echo "<td>{$rowUser['username']}</td>";
				echo "<td>".date('Y-m-d H:m:s', $rowUser['regtime'])."</td>";
				echo "<td>{$rowUser['admin']}</td>";
				echo "<td><a href='edit.php?id={$rowUser['id']}'>Edit</a></td>";
				echo "<td><a href='delete.php?id={$rowUser['id']}'>Delete</a></td>";
				echo "</tr>";
			}
		?>
	</table>
</body>
</html>
