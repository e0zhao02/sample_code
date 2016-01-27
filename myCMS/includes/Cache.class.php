<?php
	class Cache {
		private $flag;

		public function __construct($_noCache) {
			$this->flag=in_array(Tool::tplName(), $_noCache);
		}

		public function noCache() {
			return $this->flag;
		}

		public function _action() {
			switch($_GET['type']) {
				case 'details':
					$this->details();
					break;
				case 'header':
					$this->header();
					break;
				case 'index':
					$this->index();
					break;
			}
		}

		public function details() {
			$_content=new ContentModel();
			$_content->id=$_GET['id'];
			$this->setContentCount($_content);
			$this->getContentCount($_content);
		}

		public function index() {
			$_cookie=new Cookie('user');
			$_user=$_cookie->getCookie();
			$_cookie=new Cookie('face');
			$_face=$_cookie->getCookie();

			if($_user && $_face) {
				$_member.='<h2>Member Info</h2>';
				$_member.='<div class="a">Hello, Welcome <strong>'.Tool::subStr($_user, null, 8, null).'</strong></div>';
				$_member.='<div class="b">';
				$_member.='<img src="image/'.$_face.'" />';
				$_member.='<a href="###">Personal</a>';
				$_member.='<a href="###">My Comment</a>';
				$_member.='<a href="register.php?action=logout">Logout</a>';
				$_member.='</div>';
			}
			else {
				$_member.='<h2>Member Login</h2>';
				$_member.='<form method="post" name="login" action="register.php?action=login">';
				$_member.='<label>Username: <input type="text" name="user" class="text" /></label>';
				$_member.='<label>Password: <input type="password" name="pass" class="text" /></label>';
				$_member.='<label class="yzm">Validation: <input type="text" name="code" class="text code" /><img src="config/code.php" onclick=javascript:this.src="config/code.php?tm="+Math.random(); class="code" /></label>';
				$_member.='<p><input type="submit" name="send" value="login" class="submit" /><a href="register.php?action=reg">Register</a><a href="###">Forgot Password?</a></p>';
				$_member.='</form>';
			}

			echo "function getIndexLogin() {document.write('$_member');}";
		}

		public function header() {
			$_cookie=new Cookie('user');
			if($_cookie->getCookie()) echo "function getHeader() {document.write('{$_cookie->getCookie()}, Hi! <a href=\"register.php?action=logout\">Logout</a>');}";
			else echo "function getHeader() {document.write('<a href=\"register.php?action=reg\" class=\"user\">Register</a><a href=\"register.php?action=login\" class=\"user\">Login</a>');}";
		}

		private function setContentCount(&$_content) {
			$_content->setContentCount();
		}

		private function getContentCount(&$_content) {
			$_count=$_content->getOneContent()->count;
			echo "function getContentCount() {document.write('$_count');}";
		}
	}
?>
