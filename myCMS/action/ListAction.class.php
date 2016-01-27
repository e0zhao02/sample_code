<?php
	class ListAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl);
		}

		public function _action() {
			$this->getNav();
			$this->getListContent();
		}

		private function getListContent() {
			if(isset($_GET['id'])) {
				parent::__construct($this->_tpl, new ContentModel());

				$_nav=new NavModel();
				$_nav->id=$_GET['id'];
				$_navid=$_nav->getNavChildId();
				if($_navid) $this->_model->nav=Tool::objArrOfStr($_navid, 'id');
				else $this->_model->nav=$_nav->id;

				parent::page($this->_model->getListContentTotal(), ARTICLE_SIZE);

				$_object=$this->_model->getListContent();
				Tool::subStr($_object, 'info', 120);
				Tool::subStr($_object, 'title', 50);
				if($_object) { foreach($_object as $_value) { if(empty($_value->thumbnail)) $_value->thumbnail='images/none.jpg'; } }
				$this->_tpl->assign('AllListContent', $_object);

				$_object=$this->_model->getMonthNavRec();
				$this->setObject($_object);
				$this->_tpl->assign('MonthNavRec', $_object);

				$_object=$this->_model->getMonthNavHot();
				$this->setObject($_object);
				$this->_tpl->assign('MonthNavHot', $_object);

				$_object=$this->_model->getMonthNavPic();
				$this->setObject($_object);
				$this->_tpl->assign('MonthNavPic', $_object);
			}
			else Tool::alertBack('illegal act');
		}

		private function setObject(&$_object) {
			if($_object) {
				Tool::subStr($_object, 'title', 25);
				Tool::objDate($_object, 'date');
			}
		}

		private function getNav() {
			if(isset($_GET['id'])) {
				$_nav=new NavModel();
				$_nav->id=$_GET['id'];
				if($_nav->getOneNav()) {
					if($_nav->getOneNav()->nnav_name) $_nav1='<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt; ';
					$_nav2='<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
					$this->_tpl->assign('nav', $_nav1.$_nav2);

					$this->_tpl->assign('childnav', $_nav->getAllChildFrontNav());
				}
				else Tool::alertBack('this navigation not existing');
			}
			else
				Tool::alertBack('illegal act');
		}
	}
?>
