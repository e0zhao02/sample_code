<?php
	class LoginAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new ManageModel());
		}

		public function _action() {
			switch($_GET['action']) {
				case 'login':
					$this->login();
					break;
				case 'logout':
					$this->logout();
					break;
			}
		}

		public function logout() {
			Tool::unSession();
			Tool::alertLocation(null, 'admin_login.php');
		}

		public function login() {
			if(isset($_POST['send'])) {
				if(Validate::checkLength($_POST['code'], 4, 'equals')) Tool::alertBack('validation code must be 4');
				if(Validate::checkEquals(strtolower($_POST['code']), $_SESSION['code'])) Tool::alertBack('wrong validation code');
				if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('username empty');
				if(Validate::checkLength($_POST['admin_user'], 2, 'min')) Tool::alertBack('username less than 2');
				if(Validate::checkLength($_POST['admin_user'], 20, 'max')) Tool::alertBack('username more than 20');
				if(Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('password empty');
				if(Validate::checkLength($_POST['admin_pass'], 6, 'min')) Tool::alertBack('password less than 6');

				$this->_model->admin_user=$_POST['admin_user'];
				$this->_model->admin_pass=md5($_POST['admin_pass']);
				$_login=$this->_model->getLoginManage();

				if($_login) {
					$_SESSION['admin']['admin_user']=$_login->admin_user;
					$_SESSION['admin']['level_name']=$_login->level_name;
					Tool::alertLocation(null, 'admin.php');
				}
				else
					Tool::alertBack('username or password not right');
			}
		}
	}
?>
