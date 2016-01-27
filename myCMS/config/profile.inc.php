<?php
	define('DB_HOST', 'localhost');
	define('DB_USER', 'root');
	define('DB_PASS', '02111979');
	define('DB_NAME', 'myCMS');

	define('GPC', get_magic_quotes_gpc());
	define('PAGE_SIZE', 10);
	define('ARTICLE_SIZE', 3);
	define('PREV_URL', $_SERVER['HTTP_REFERER']);
	define('NAV_SIZE', 10);
	define('UPDIR', '/uploads/');

	define('TPL_DIR', ROOT_PATH.'/templates/');
	define('TPL_C_DIR', ROOT_PATH.'/templates_c/');
	define('CACHE', ROOT_PATH.'/cache/');
?>
