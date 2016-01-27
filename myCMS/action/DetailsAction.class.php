<?php
	class DetailsAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl);
		}

		public function _action() {
			$this->getDetails();
		}

		private function getDetails() {
			if(isset($_GET['id'])) {
				parent::__construct($this->_tpl, new ContentModel());
				$this->_model->id=$_GET['id'];
				if(!$this->_model->setContentCount()) Tool::alertBack('article not existing');
				$_content=$this->_model->getOneContent();
				$_comment=new CommentModel();
				$_comment->cid=$this->_model->id;
				$this->_tpl->assign('id', $_content->id);
				$this->_tpl->assign('titlec', $_content->title);
				$this->_tpl->assign('date', $_content->date);
				$this->_tpl->assign('source', $_content->source);
				$this->_tpl->assign('author', $_content->author);
				$this->_tpl->assign('info', $_content->info);
				$this->_tpl->assign('tag', $_content->tag);
				$this->_tpl->assign('content', Tool::unHtml($_content->content));
				$this->getNav($_content->nav);
				if(IS_CACHE) $this->_tpl->assign('count', '<script>getContentCount();</script>');
				else $this->_tpl->assign('count', $_content->count);

				$this->_tpl->assign('comment', $_comment->getCommentTotal());
				$_object=$_comment->getNewThreeComment();
				if($_object) {
					foreach($_object as $_value) {
						switch($_value->manner) {
							case -1:
								$_value->manner='disagree';
								break;
							case 0:
								$_value->manner='no opinion';
								break;
							case 1:
								$_value->manner='agree';
								break;
						}
						if(empty($_value->face)) $_value->face='00.png';
						if(!empty($_value->oppose)) $_value->oppose='-'.$_value->oppose;
					}
				}
				$this->_tpl->assign('NewThreeComment', $_object);

				$this->_model->nav=$_content->nav;

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
				Tool::subStr($_object, 'title', 30);
				Tool::objDate($_object, 'date');
			}
		}

		private function getNav($_id) {
			$_nav=new NavModel();
			$_nav->id=$_id;
			if($_nav->getOneNav()) {
				if($_nav->getOneNav()->nnav_name) $_nav1='<a href="list.php?id='.$_nav->getOneNav()->iid.'">'.$_nav->getOneNav()->nnav_name.'</a> &gt; ';
				$_nav2='<a href="list.php?id='.$_nav->getOneNav()->id.'">'.$_nav->getOneNav()->nav_name.'</a>';
				$this->_tpl->assign('nav', $_nav1.$_nav2);

				$this->_tpl->assign('childnav', $_nav->getAllChildFrontNav());
			}
			else Tool::alertBack('this navigation not existing');
		}
	}
?>
