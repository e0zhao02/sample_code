<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
</head>
<body id='main'>

<div class="map">
Manage Home &gt;&gt; Backend Home
</div>

<table cellspacing='0'>
 <tr><th><strong>Shortcut Operation</strong></th></tr>
 <tr><td><input type='button' onclick="javascript:location.href='main.php?action=delcache'" value='clear cache' />(cache folder has <strong><?=$this->_vars['cacheNum']?></strong> files)</td></tr>
</table>
</body>
</html>
