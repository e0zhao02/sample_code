<?php
	session_start();
	header('Content-Type:text/html;charset=utf-8');

	define('ROOT_PATH', dirname(__FILE__));
	require ROOT_PATH.'/config/profile.inc.php';
	date_default_timezone_set('America/New York');

	function __autoload($_className) {
		if(substr($_className, -6)=='Action')
			require ROOT_PATH.'/action/'.$_className.'.class.php';
		elseif(substr($_className, -5)=='Model')
			require ROOT_PATH.'/model/'.$_className.'.class.php';
		else
			require ROOT_PATH.'/includes/'.$_className.'.class.php';
	}

	$_cache=new Cache(array('code', 'ckeup', 'static', 'upload', 'register', 'feedback', 'search'));
	$_tpl=new Templates($_cache);

	require 'common.inc.php';
?>
