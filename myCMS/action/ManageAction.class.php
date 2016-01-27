<?php
	class ManageAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new ManageModel());
		}

		public function _action() {
			switch($_GET['action']) {
				case 'show':
					$this->show();
					break;
				case 'add':
					$this->add();
					break;
				case 'update':
					$this->update();
					break;
				case 'delete':
					$this->delete();
					break;
				default:
					Tool::alertBack('illegal act');
			}
		}

		private function show() {
			parent::page($this->_model->getManageTotal());
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Administrator List');
			$this->_tpl->assign('AllManage', $this->_model->getAllManage());
		}

		private function add() {
			if(isset($_POST['send'])) {
				if(Validate::checkNull($_POST['admin_user'])) Tool::alertBack('username empty');
				if(Validate::checkLength($_POST['admin_user'], 2, 'min')) Tool::alertBack('username less than 2');
				if(Validate::checkLength($_POST['admin_user'], 20, 'max')) Tool::alertBack('username more than 20');
				if(Validate::checkNull($_POST['admin_pass'])) Tool::alertBack('password empty');
				if(Validate::checkLength($_POST['admin_pass'], 6, 'min')) Tool::alertBack('password less than 6');
				if(Validate::checkEquals($_POST['admin_pass'], $_POST['admin_notpass'])) Tool::alertBack('password not match');

				$this->_model->admin_user=$_POST['admin_user'];
				if($this->_model->getOneManage()) Tool::alertBack('this username registered already');

				$this->_model->admin_pass=md5($_POST['admin_pass']);
				$this->_model->level=$_POST['level'];
				$this->_model->addManage()?Tool::alertLocation('Succeed', 'manage.php?action=show'):Tool::alertBack('Fail');
			}
			$this->_tpl->assign('add', true);
			$this->_tpl->assign('title', 'Add New Administrator');
			$this->_tpl->assign('prev_url', PREV_URL);

			$_level=new LevelModel();
			$this->_tpl->assign('AllLevel', $_level->getAllLevel());
		}

		private function update() {
			if(isset($_POST['send'])) {
				$this->_model->id=$_POST['id'];
				if(trim($_POST['admin_pass'])=='') $this->_model->admin_pass=$_POST['pass'];
				else {
					if(Validate::checkLength($_POST['admin_pass'], 6, 'min')) Tool::alertBack('password less than 6');
					$this->_model->admin_pass=md5($_POST['admin_pass']);
				}
				$this->_model->level=$_POST['level'];
				$this->_model->updateManage()?Tool::alertLocation('Succeed', $_POST['prev_url']):Tool::alertBack('You did not make any change. please click return to list');
			}
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				is_object($this->_model->getOneManage())?true:Tool::alertBack('wrong id');
				$this->_tpl->assign('id', $this->_model->getOneManage()->id);
				$this->_tpl->assign('level', $this->_model->getOneManage()->level);
				$this->_tpl->assign('admin_user', $this->_model->getOneManage()->admin_user);
				$this->_tpl->assign('admin_pass', $this->_model->getOneManage()->admin_pass);
				$this->_tpl->assign('update', true);
				$this->_tpl->assign('title', 'Update Existing Administrator');
				$this->_tpl->assign('prev_url', PREV_URL);

				$_level=new LevelModel();
				$this->_tpl->assign('AllLevel', $_level->getAllLevel());
			}
			else Tool::alertBack('illegal act');
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$this->_model->deleteManage()?Tool::alertLocation('Succeed', PREV_URL):Tool::alertBack('Fail');
			}
			else Tool::alertBack("illegal operation");
		}
	}
?>
