<?php
	require substr(dirname(__FILE__), 0, -6).'/init.inc.php';
	Validate::checkSession();

	global $_tpl;
	$_user=new UserAction($_tpl);
	$_user->_action();
	$_tpl->display('user.tpl');
?>
