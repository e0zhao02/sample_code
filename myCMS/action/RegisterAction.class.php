<?php
	class RegisterAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl);
		}

		public function _action() {
			switch($_GET['action']) {
				case 'reg':
					$this->reg();
					break;
				case 'login':
					$this->login();
					break;
				case 'logout':
					$this->logout();
					break;
				default:
					Tool::alertBack('illegal act');
			}
		}

		private function logout() {
			$_cookie=new Cookie('user');
			$_cookie->unCookie();
			Tool::alertLocation(null, 'register.php?action=login');
		}

		private function reg() {
			if(isset($_POST['send'])) {
				parent::__construct($this->_tpl, new UserModel());
				if(Validate::checkNull($_POST['user'])) Tool::alertBack('empty username');
				if(Validate::checkLength($_POST['user'], 2, 'min')) Tool::alertBack('username less than 2');
				if(Validate::checkLength($_POST['user'], 20, 'max')) Tool::alertBack('username more than 20');
				if(Validate::checkLength($_POST['pass'], 6, 'min')) Tool::alertBack('password less than 6');
				$this->_model->user=$_POST['user'];
				$this->_model->pass=md5($_POST['pass']);
				$this->_model->email=$_POST['email'];
				$this->_model->face=$_POST['face'];
				$this->_model->state=1;
				$this->_model->time=time();
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];
				if($this->_model->checkUser()) Tool::alertBack('duplicate username');
				if($this->_model->checkEmail()) Tool::alertBack('duplicate email address');
				if($this->_model->addUser()) {
					$_cookie=new Cookie('user', $this->_model->user, 0);
					$_cookie->setCookie();
					$_cookie=new Cookie('face', $this->_model->face, 0);
					$_cookie->setCookie();

					Tool::alertLocation('succeed', './');
				}
				else
					Tool::alertBack('fail');
			}

			$this->_tpl->assign('reg', true);
			$this->_tpl->assign('OptionFaceOne', range(1, 9));
			$this->_tpl->assign('OptionFaceTwo', range(10, 24));
		}

		public function login() {
			if(isset($_POST['send'])) {
				parent::__construct($this->_tpl, new UserModel());
				$this->_model->user=$_POST['user'];
				$this->_model->pass=md5($_POST['pass']);
				if(!!$_user=$this->_model->checkLogin()) {
					$_cookie=new Cookie('user', $_user->user, $_POST['time']);
					$_cookie->setCookie();
					$_cookie=new Cookie('face', $_user->face, $_POST['time']);
					$_cookie->setCookie();

					$this->_model->id=$_user->id;
					$this->_model->time=time();
					$this->_model->setLaterUser();
					Tool::alertLocation(null, './');
				}
				else Tool::alertBack('wrong username or password');
			}
			$this->_tpl->assign('login', true);
		}
	}
?>
