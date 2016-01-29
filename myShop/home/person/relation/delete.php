<?php
	include "../../../public/common/config.inc.php";
	$id=$_GET['id'];
	$sql="delete from contact where id={$id}";

	mysql_query($sql);
	echo "<script>location='index.php'</script>";
?>
