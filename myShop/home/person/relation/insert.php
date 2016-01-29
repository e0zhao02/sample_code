<?php
	session_start();
	include '../../../public/common/config.inc.php';

	$realname=$_POST['realname'];
	$address=$_POST['address'];
	$telephone=$_POST['telephone'];
	$email=$_POST['email'];
	$user_id=$_SESSION['user_id'];

	$sqlRel="insert into contact(realname, address, telephone, email, user_id) values('{$realname}','{$address}','{$telephone}','{$email}',$user_id);";
	if(mysql_query($sqlRel))
		echo "<script>location='index.php'</script>";
	else
		echo "<script>location='add.php'</script>";
?>
