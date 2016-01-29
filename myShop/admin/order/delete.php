<?php
	include '../public/common/acl.inc.php';
	include "../../public/common/config.inc.php";

	$code=$_GET['code'];
	$sql="delete from orders where code={$code}";

	mysql_query($sql);
	echo "<script>location='index.php'</script>";
?>
