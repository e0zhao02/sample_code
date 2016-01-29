<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	include '../../public/common/functions.inc.php';

	$name=$_POST['name'];
	$price=$_POST['price'];
	$stock=$_POST['stock'];
	$shelf=$_POST['shelf'];
	$brand_id=$_POST['brand_id'];

	$imgname=$_FILES['img']['name'];
	$imgpath=pathinfo($imgname);
	$imgext=$imgpath[extension];
	$src=$_FILES['img']['tmp_name'];
	$image=time().'_'.mt_rand().'.'.$imgext;
	$dst='../../public/uploads/'.$image;

	if(move_uploaded_file($src, $dst)){
		thumb($dst, 200, 140);
		$sqlShop="insert into shop(name,price,stock,shelf,image,brand_id) values('{$name}',$price,$stock,$shelf,'{$image}',$brand_id)";
		mysql_query($sqlShop);
		echo "<script>location='index.php'</script>";
	}
?>
