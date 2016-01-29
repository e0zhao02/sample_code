<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	$username=$_POST['username'];
	$password=md5($_POST['password']);
	$repassword=md5($_POST['repassword']);
	$regtime=time();

	if($password===$repassword){
		$sqlUser="insert into user(username, password, regtime) values('$username', '$password', '$regtime');";
		if(mysql_query($sqlUser))
			echo "<script>location='index.php'</script>";
		else
			echo "<script>location='add.php'</script>";
	}
	else
			echo "<script>location='add.php'</script>";
?>
