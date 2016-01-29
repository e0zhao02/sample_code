<?php
	include '../public/common/acl.inc.php';
	session_start();
?>

<!doctype html>
<html>
<head>
<link type="text/css" rel="stylesheet" href="../public/css/index.css"/>
</head>
<body>
<div class="left">
<div class="lefttop"><img src='../public/images/msn.jpg'/><span> Hello, <?=$_SESSION['username']?><a href='../login/logout.php' target="_top">[logout]</a></span></div>
<ul>
<span>User Management</span>
<li><a href="../user/index.php" target="view_frame">View Users</a></li>
<li><a href="../user/add.php" target="view_frame">Add Users</a></li>
</ul>
<ul>
<span>Category Management</span>
<li><a href="../shopclass/index.php" target="view_frame">View Categories</a></li>
<li><a href="../shopclass/add.php" target="view_frame">Add Categories</a></li>
</ul>
<ul>
<span>Brand Management</span>
<li><a href="../brand/index.php" target="view_frame">View Brands</a></li>
<li><a href="../brand/add.php" target="view_frame">Add Brands</a></li>
</ul>
<ul>
<span>Product Management</span>
<li><a href="../shop/index.php" target="view_frame">View Products</a></li>
<li><a href="../shop/add.php" target="view_frame">Add Products</a></li>
</ul>
<ul>
<span>Order Status</span>
<li><a href="../orderstat/index.php" target="view_frame">View Order Status</a></li>
<li><a href="../orderstat/add.php" target="view_frame">Add Order Status</a></li>
</ul>
<ul>
<span>Order Management</span>
<li><a href="../order/index.php" target="view_frame">View Orders</a></li>
</ul>
</div>
</body>
</html>
