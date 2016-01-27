<?php
	class NavAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new NavModel());
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
				case 'addchild':
					$this->addchild();
					break;
				case 'showchild':
					$this->showchild();
					break;
				case 'sort':
					$this->sort();
					break;
				default:
					Tool::alertBack('illegal act');
			}
		}

		public function showfront() {
			$this->_tpl->assign('FrontNav', $this->_model->getFrontNav());
		}

		private function sort() {
			if(isset($_POST['send'])) {
				$this->_model->sort=$_POST['sort'];
				if($this->_model->setNavSort()) Tool::alertLocation(null, PREV_URL);
			}
		}

		private function addchild() {
			if(isset($_POST['send'])) {
				$this->add();
			}

			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_nav=$this->_model->getOneNav();
				is_object($_nav)?true:Tool::alertBack('wrong id');
				$this->_tpl->assign('id', $_nav->id);
				$this->_tpl->assign('addchild', true);
				$this->_tpl->assign('title', 'Add New Subclass');
				$this->_tpl->assign('prev_name', $_nav->nav_name);
				$this->_tpl->assign('prev_url', PREV_URL);
			}
		}

		private function showchild() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_nav=$this->_model->getOneNav();
				is_object($_nav)?true:Tool::alertBack('wrong id');
				parent::page($this->_model->getNavChildTotal());
				$this->_tpl->assign('id', $_nav->id);
				$this->_tpl->assign('showchild', true);
				$this->_tpl->assign('title', 'Sub-Navigation List');
				$this->_tpl->assign('prev_name', $_nav->nav_name);
				$this->_tpl->assign('prev_url', PREV_URL);
				$this->_tpl->assign('AllChildNav', $this->_model->getAllChildNav());
			}
		}

		private function show() {
			parent::page($this->_model->getNavTotal());
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Navigation List');
			$this->_tpl->assign('AllNav', $this->_model->getAllNav());
		}

		private function add() {
			if(isset($_POST['send'])) {
				//Validate:: from LevelAction
				$this->_model->nav_name=$_POST['nav_name'];
				$this->_model->nav_info=$_POST['nav_info'];
				$this->_model->pid=$_POST['pid'];
				if($this->_model->pid) $_returnurl='nav.php?action=showchild&id='.$this->_model->pid;
				else $_returnurl='nav.php?action=show';
				if($this->_model->getOneNav()) Tool::alertBack('this navigation name taken');
				$this->_model->addNav()?Tool::alertLocation('Succeed', $_returnurl):Tool::alertBack('fail');
			}

			$this->_tpl->assign('add', true);
			$this->_tpl->assign('title', 'Add New Navigation');
			$this->_tpl->assign('prev_url', PREV_URL);
		}

		private function update() {
			if(isset($_POST['send'])) {
			//Validate::from above
				$this->_model->id=$_POST['id'];
				$this->_model->nav_name=$_POST['nav_name'];
				$this->_model->nav_info=$_POST['nav_info'];
				$this->_model->updateNav()?Tool::alertLocation('succeed', $_POST['prev_url']):Tool::alertBack("You did not make any change. please click return to list");
			}
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_nav=$this->_model->getOneNav();
				is_object($_nav)?true:Tool::alertBack('wrong id');
				$this->_tpl->assign('id', $_nav->id);
				$this->_tpl->assign('nav_name', $_nav->nav_name);
				$this->_tpl->assign('nav_info', $_nav->nav_info);
				$this->_tpl->assign('prev_url', PREV_URL);
				$this->_tpl->assign('update', true);
				$this->_tpl->assign('title', 'Update Existing Navigation');
			} else
				Tool::alertBack('illegal act');
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$this->_model->deleteNav()?Tool::alertLocation('succeed', PREV_URL):Tool::alertBack('fail');
			}
			else
				Tool::alertBack('illegal act');
		}
	}
?>
