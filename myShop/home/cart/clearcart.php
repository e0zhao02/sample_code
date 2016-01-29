<?php
	session_start();

	unset($_SESSION['shops']);
	echo "<script>location='index.php'</script>";
?>
