<?php
	session_start();

	if(!$_SESSION['login'] || !$_SESSION['admin'])
		echo "<script>location='/myShop/admin/login/index.php'</script>";
?>
