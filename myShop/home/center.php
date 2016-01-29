<?php
	session_start();
	include '../public/common/config.inc.php';
?>

<!doctype html>
<html>
<head>
<title><?=$_SESSION['username']?>'s Personal Page</title>
<link rel='stylesheet' href='public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include 'public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='title'>
			<a href='person/myorder.php'>View Orders</a> |
			<a href='person/relation/index.php'>Contact</a>
		</div>
	</div>
	<div class='nav'></div>
	<?php include 'public/footer.php'; ?>
</div>
</body>
</html>
