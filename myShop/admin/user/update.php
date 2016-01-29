<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$repassword=md5($_POST['repassword']);
	$id=$_POST['id'];
	$isadmin=$_POST['isadmin'];

	if($password===$repassword){
		$sqlUser="update user set username='$username', password='$password', admin={$isadmin} where id={$id};";
		if(mysql_query($sqlUser))
			echo "<script>location='index.php'</script>";
		else
			echo "<script>location='edit.php'</script>";
	}
	else
			echo "<script>location='edit.php'</script>";
?>
