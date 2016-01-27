<!doctype html>
<html>
<head>
<link rel='stylesheet' type='text/css' href='../style/admin.css' />
<script src='../js/admin_login.js'></script>
</head>
<body>
<form method='post' name='login' action='?action=login' id='adminLogin'>
 <fieldset>
  <legend>CMS Backend System</legend>
  <label>Username:<input type='text' name='admin_user' class='text'/></label>
  <label>Password:<input type='password' name='admin_pass' class='text'/></label>
  <label>Security Code:(case-insensative)<input type='text' name='code' class='text'/></label>
  <label><img src='../config/code.php' onclick="javascript:this.src='../config/code.php?tm='+Math.random();"/></label>
  <input type='submit' value="login" class='submit' onclick='return checkLogin();' name='send'/>
 </fieldset>
</form>
</body>
</html>
