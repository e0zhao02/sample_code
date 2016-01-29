<?php
	session_start();
	include '../public/common/config.inc.php';

	$q=$_GET['q'];
	$p=$_GET['p'];
	$sqlShop="select * from shop where brand_id={$q} order by rand() limit 4;";
	$rstShop=mysql_query($sqlShop);
	while($rowShop=mysql_fetch_assoc($rstShop)) {
		if($rowShop['shelf']) {
			echo "<div class='shop'>";
			echo "<a href='shopinfo.php?shopclass_id=$p&shop_id=$rowShop[id]'><img src='../public/uploads/s_$rowShop[image]'/></a>";
			echo "</div>";
		}
	}
?>
