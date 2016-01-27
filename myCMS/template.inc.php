<?php
	header('Content-Type:text/html;charset=utf-8');

	define('ROOT_PATH', dirname(__FILE__));
	define('TPL_DIR', ROOT_PATH.'/templates/');
	define('TPL_C_DIR', ROOT_PATH.'/templates_c/');
	define('CACHE', ROOT_PATH.'/cache/');
	define('IS_CACHE', false);

	IS_CACHE ? ob_start() : null;

	require ROOT_PATH.'/includes/Templates.class.php';
	$_tpl=new Templates();
?>
