<?php
	require substr(dirname(__FILE__), 0, -7).'/init.inc.php';

	if(isset($_GET['type'])) {
		$_fileupload=new FileUpload('upload', $_POST['MAX_FILE_SIZE']);
		$_ckefn=$_GET['CKEditorFuncNum'];
		$_path=$_fileupload->getPath();
		echo "<script>window.parent.CKEDITOR.tools.callFunction($_ckefn, \"$_path\", 'image upload succeed');</script>";
		exit();
	}
	else
		Tool::alertBack('upload failed');
?>
