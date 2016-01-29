<?php
	session_start();
	include '../public/common/config.inc.php';
?>

<!doctype html>
<html>
<head>
<link rel='stylesheet' href='public/css/index.css' type='text/css'>
<script>
function show_products(brand_id, shopclass_id) {
        var oSpan=document.getElementsByClassName('products');

	if(shopclass_id==11) var oShop=document.getElementsByClassName('shopshow')[0];
	if(shopclass_id==12) var oShop=document.getElementsByClassName('shopshow')[1];
	if(shopclass_id==13) var oShop=document.getElementsByClassName('shopshow')[2];
	if(shopclass_id==15) var oShop=document.getElementsByClassName('shopshow')[3];

	var xmlhttp=new XMLHttpRequest();

        xmlhttp.onreadystatechange=function()
        {
                if(xmlhttp.readyState==4 && xmlhttp.status==200)
                {
                        oShop.innerHTML=xmlhttp.responseText;
                }
        };
        xmlhttp.open("GET","getproduct.php?q="+brand_id+"&p="+shopclass_id,true);
        xmlhttp.send();
}
</script>
</head>
<body>
<div id='main'>
	<?php include 'public/header.php'; ?>
	<div class='nav'></div>
        <div class='adv'><img src='public/images/adheader.jpg'></div>
	<div class='nav'></div>
	<div id='content'>
		<?php
			$sqlShopclass="select * from shopclass order by id;";
			$rstShopclass=mysql_query($sqlShopclass);
			$i=0;
			while($rowShopclass=mysql_fetch_assoc($rstShopclass)){
		?>
		<div class='shopclass'>
			<a name="<?php echo $i+1;?>f"></a>
			<div class='title'>
				<span class='class'><?=$i+1?>F <?=$rowShopclass['name']?></span>
				<?php
					$sqlBrand="select * from brand where shopclass_id={$rowShopclass['id']} order by id;";
					$rstBrand=mysql_query($sqlBrand);
				?>
				<span class='brand'>
					<?php
						$j=0;
						while($rowBrand=mysql_fetch_assoc($rstBrand)){
							if($j<1) $brand_id=$rowBrand['id'];
					?>
					<span class='products' onclick="show_products(<?=$rowBrand['id']?>, <?=$rowShopclass['id']?>)"><?=$rowBrand['name']?></span>
					<?php
						$j++;
						}
					?>
					<a href='brandlist.php?shopclass_id=<?=$rowShopclass['id']?>' class='more'>More</a>
				</span>
			</div>

			<div class='shopshow'>
			<?php
				if($rowShopclass['id']==$_GET['shopclass_id']) $brand_id=$_GET['brand_id'];
				else $brand_id=$brand_id;

				$sqlShop="select * from shop where brand_id={$brand_id} order by rand() limit 4;";
				$rstShop=mysql_query($sqlShop);
				while($rowShop=mysql_fetch_assoc($rstShop)){
					if($rowShop['shelf']) {
			?>
				<div class='shop'>
					<a href="shopinfo.php?shopclass_id=<?=$rowShopclass['id']?>&shop_id=<?=$rowShop['id'] ?>"><img src="../public/uploads/s_<?=$rowShop['image']?>"></a>
				</div>
			<?php
					}
				}
			?>
			</div>
		</div>
		<?php
			$i++;
			}
		?>
	</div>
	<div class='nav'></div>
        <div class='adv'><img src='public/images/adfooter.png'></div>
	<div class='nav'></div>
	<?php include 'public/footer.php'; ?>
</div>
</body>
</html>
