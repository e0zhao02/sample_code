<?php
	define('IS_CACHE', false);

	global $_tpl, $_cache;

	if(IS_CACHE && !$_cache->noCache()) {
		ob_start();
		$_tpl->cache(Tool::tplName().'.tpl');
	}

	$_nav=new NavAction($_tpl);
	$_nav->showfront();

	$_cookie=new Cookie('user');
	if(IS_CACHE) $_tpl->assign('header', '<script>getHeader();</script>');
	else {
		if($_cookie->getCookie()) $_tpl->assign('header', 'Hello '.$_cookie->getCookie().', <a href="register.php?action=logout">Logout</a>');
		else $_tpl->assign('header', '<a href="register.php?action=reg" class="user">Register</a> <a href="register.php?action=login" class="user">Login</a>');
	}
?>
