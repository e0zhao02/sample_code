<?php
	session_start();
	include '../public/common/config.inc.php';
?>

<!doctype html>
<html>
<head>
<link rel='stylesheet' href='public/css/index.css' type='text/css'>
</head>
<body>
<div id='main'>
	<?php include 'public/header.php'; ?>
	<div class='nav'></div>
	<div id='content'>
		<div class='shopclass'>
			<div class='title'>
				<span class='brandlist'>
					<a href='index.php'>Home</a> >> Brand:
					<?php
						$shopclass_id=$_GET['shopclass_id'];
						$sqlBrand="select * from brand where shopclass_id={$shopclass_id} order by id;";
						$rstBrand=mysql_query($sqlBrand);
						$i=0;
						while($rowBrand=mysql_fetch_assoc($rstBrand)){
							if($i<1) $brand_id=$rowBrand['id'];
							echo "<a href='brandlist.php?shopclass_id={$shopclass_id}&brand_id={$rowBrand['id']}'>{$rowBrand['name']}</a> ";
							$i++;
						}
					?>
				</span>
			</div>
			<div class='shopshow2'>
				<?php
					$brand_id=$_GET['brand_id']?$_GET['brand_id']:$brand_id;

					$length=8;
					$page=$_GET['p']?$_GET['p']:1;
					$offset=($page-1)*$length;

					$sqlCount="select count(*) from shop where brand_id={$brand_id};";
					$resultCount=mysql_query($sqlCount);
					$rowCount=mysql_fetch_row($resultCount);
					$total=$rowCount[0];

					$totpage=ceil($total/$length);
					$prevpage=$page-1;
					if($page>=$totpage) $nextpage=$totpage;
					else $nextpage=$page+1;

					$sqlShop="select * from shop where brand_id={$brand_id} order by id limit {$offset}, {$length};";
					$rstShop=mysql_query($sqlShop);
					while($rowShop=mysql_fetch_assoc($rstShop)){
						if($rowShop['shelf']){
							echo "<div class='shop'>";
							echo "<a href='shopinfo.php?shopclass_id={$shopclass_id}&shop_id={$rowShop['id']}'><img src='../public/uploads/s_{$rowShop['image']}'></a>";
							echo "</div>";
						}
					}
				?>
			<div class='cfloat'></div>
			</div>
			<div class='pages'>
			<?php
				$url=$_SERVER['REQUEST_URI'];
				echo "<a href='{$url}&p=1'>First Page</a> | <a href='{$url}&p={$prevpage}'>Previous Page</a>";
				echo " | <a href='{$url}&p={$nextpage}'>Next Page</a> | <a href='{$url}&p={$totpage}'>Last Page</a> | ";
				echo "Current:{$page}/{$totpage} | Total:{$totpage}Page(s)";
			?>
			</div>
		</div>
	</div>
	<div class='nav'></div>
	<?php include 'public/footer.php'; ?>
</div>
</body>
</html>
