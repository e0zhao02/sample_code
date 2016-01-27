<?php
	require substr(dirname(__FILE__), 0, -7).'/init.inc.php';

	if(isset($_POST['send'])) {
		$_fileupload=new FileUpload('pic', $_POST['MAX_FILE_SIZE']);
		$_path=$_fileupload->getPath();
		$_img=new Image($_path);
		$_img->thumb(100, 100);
		$_img->out();
		Tool::alertOpenerClose('thumbnail upload succeed', $_path);
	}
	else
		Tool::alertBack('file too size');
?>
