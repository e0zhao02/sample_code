<?php
	class LevelAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new LevelModel());
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
			parent::page($this->_model->getLevelTotal());
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Level List');
			$this->_tpl->assign('AllLevel', $this->_model->getAllLimitLevel());
		}

		private function add() {
			if(isset($_POST['send'])) {
				$this->_model->level_name=$_POST['level_name'];
				if($this->_model->getOneLevel()) Tool::alertBack('this level registered already');

				$this->_model->level_info=$_POST['level_info'];
				$this->_model->addLevel()?Tool::alertLocation('Succeed', 'level.php?action=show'):Tool::alertBack('Fail');
			}
			$this->_tpl->assign('add', true);
			$this->_tpl->assign('title', 'Add New Level');
			$this->_tpl->assign('prev_url', PREV_URL);
		}

		private function update() {
			if(isset($_POST['send'])) {
				$this->_model->id=$_POST['id'];
				$this->_model->level_name=$_POST['level_name'];
				$this->_model->level_info=$_POST['level_info'];
				$this->_model->updateLevel()?Tool::alertLocation('Succeed', $_POST['prev_url']):Tool::alertBack('You did not make any change. please click return to list');
			}
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_level=$this->_model->getOneLevel();
				is_object($_level)?true:Tool::alertBack('wrong id');
				$this->_tpl->assign('id', $_level->id);
				$this->_tpl->assign('level_name', $_level->level_name);
				$this->_tpl->assign('level_info', $_level->level_info);
				$this->_tpl->assign('prev_url', PREV_URL);
				$this->_tpl->assign('update', true);
				$this->_tpl->assign('title', 'Update Existing Level');
			}
			else Tool::alertBack('illegal act');
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_manage=new ManageModel();
				$_manage->level=$this->_model->id;
				if($_manage->getOneManage()) Tool::alertBack('this level could not be deleted. please delete user first');
				$this->_model->deleteLevel()?Tool::alertLocation('Succeed', PREV_URL):Tool::alertBack('Fail');
			}
			else Tool::alertBack("illegal operation");
		}
	}
?>
