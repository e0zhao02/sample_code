<?php
	include '../public/common/acl.inc.php';
	include '../../public/common/config.inc.php';
	include '../../public/common/functions.inc.php';

	$id=$_POST['id'];
	$name=$_POST['name'];
	$price=$_POST['price'];
	$stock=$_POST['stock'];
	$shelf=$_POST['shelf'];
	$brand_id=$_POST['brand_id'];
	$oldimage=$_POST['oldimage'];
	$boldimage='../../public/uploads/'.$oldimage;
	$soldimage='../../public/uploads/s_'.$oldimage;

	$imgname=$_FILES['img']['name'];
	$imgpath=pathinfo($imgname);
	$imgext=$imgpath[extension];
	$src=$_FILES['img']['tmp_name'];
	$image=time().'_'.mt_rand().'.'.$imgext;
	$dst='../../public/uploads/'.$image;

	if($_FILES['img']['error']===0) {
		$sqlShop="update shop set name='{$name}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}',image='{$image}' where id={$id};";
		if(mysql_query($sqlShop)) {
			if(move_uploaded_file($src, $dst)){
				thumb($dst, 200, 140);
				unlink($boldimage);
				unlink($soldimage);
				echo "<script>location='index.php'</script>";
			}
			else
				echo "<script>location='edit.php?id={$id}&image={$oldimage}'</script>";
		}
		else
			echo "<script>location='edit.php?id={$id}&image={$oldimage}'</script>";

	} elseif($_FILES['img']['error']===4) {
		$sqlShop="update shop set name='{$name}',price='{$price}',stock='{$stock}',shelf='{$shelf}',brand_id='{$brand_id}',image='{$oldimage}' where id={$id};";
		if(mysql_query($sqlShop))
			echo "<script>location='index.php'</script>";
		else
			echo "<script>location='edit.php?id={$id}&image={$oldimage}'</script>";
	} else
			echo "<script>location='edit.php?id={$id}&image={$oldimage}'</script>";
?>
