<?php
	session_start();
	include '../../../public/common/config.inc.php';

	$realname=$_POST['realname'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$id=$_POST['id'];

	$sqlRel="update contact set realname='$realname',address='$address',telephone='$telephone',email='$email' where id={$id};";
	if(mysql_query($sqlRel))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='edit.php'</script>";
?>
