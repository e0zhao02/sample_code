<!doctype html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../style/admin.css" />
<script src="../js/admin_top_nav.js"></script>
</head>
<body id='top'>

<nav>
<ul>
 <li class='yellow'><a href='../templates/sidebar.html' target="sidebar" id="nav1" class='selected' onclick="admin_top_nav(1)">Home</a></li>
 <li class='green'><a href='../templates/sidebarn.html' target="sidebar" id="nav2" onclick="admin_top_nav(2)">Content</a></li>
 <li class='red'><a href='../templates/sidebaru.html' id="nav3" target="sidebar" onclick="admin_top_nav(3)">Member</a></li>
 <li class='purple'><a href='../templates/system.html' id="nav4" target="sidebar" onclick="admin_top_nav(4)">System</a></li>
</ul>
</nav>

<p>Hi, <strong><?=$this->_vars['admin_user']?></strong>[ <?=$this->_vars['level_name']?> ] [ <a href='../' target="_blank">Home</a> ] [ <a href='admin_login.php?action=logout' target='_parent'>Logout</a> ]
</p>
</body>
</html>
