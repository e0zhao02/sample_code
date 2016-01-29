<?php
	include 'public/common/acl.inc.php';
?>

<!doctype html>
<html>
<head>
</head>
<frameset rows="100,*">
	<frame frameborder=0 scrolling=no src="frame/top.php">
	<frameset cols="200,*">
		<frame frameborder=0 scrolling=no src="frame/left.php">
		<frame frameborder=0 name="view_frame" src='frame/right.php'>
	</frameset>
</frameset>
</html>
