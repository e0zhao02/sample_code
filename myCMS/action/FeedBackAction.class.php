<?php
	class FeedBackAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl);
		}

		public function _action() {
			$this->addComment();
			$this->setCount();
			$this->showComment();
		}

		private function addComment() {
			if(isset($_POST['send'])) {
				$_url="http://".$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"];
				if($_url==PREV_URL) {
					if(Validate::checkNull($_POST['content'])) Tool::alertBack('content empty');
					if(Validate::checkLength($_POST['content'], 255, 'max')) Tool::alertBack('content longer than 255');
					if(Validate::checkEquals(strtolower($_POST['code']), $_SESSION['code'])) Tool::alertBack('validate code must match');
				}
				else {
					if(Validate::checkNull($_POST['content'])) Tool::alertClose('content empty');
					if(Validate::checkLength($_POST['content'], 255, 'max')) Tool::alertClose('content longer than 255');
					if(Validate::checkEquals(strtolower($_POST['code']), $_SESSION['code'])) Tool::alertClose('validate code must match');
				}
				parent::__construct($this->_tpl, new CommentModel());
				$_cookie=new Cookie('user');
				if($_cookie->getCookie()) $this->_model->user=$_cookie->getCookie();
				else $this->_model->user='Guest';
				$this->_model->manner=$_POST['manner'];
				$this->_model->content=$_POST['content'];
				$this->_model->cid=$_GET['cid'];
				$this->_model->addComment()?Tool::alertLocation('succeed', 'feedback.php?cid='.$this->_model->cid):Tool::alertLocation('failed', 'feedback.php?cid='.$this->_model->cid);
			}
		}

		private function showComment() {
			if(isset($_GET['cid'])) {
				parent::__construct($this->_tpl, new CommentModel());
				$this->_model->cid=$_GET['cid'];
				$_content=new ContentModel();
				$_content->id=$_GET['cid'];
				if(!$_content->getOneContent()) Tool::alertBack('comment not existing');

				parent::page($this->_model->getCommentTotal());
				$_object=$this->_model->getAllComment();
				$_object2=$this->_model->getHotThreeComment();
				$_object3=$_content->getHotTwentyComment();
				$this->setObject($_object);
				$this->setObject($_object2);
				$this->_tpl->assign('titlec', $_content->getOneContent()->title);
				$this->_tpl->assign('info', $_content->getOneContent()->info);
				$this->_tpl->assign('id', $_content->getOneContent()->id);
				$this->_tpl->assign('cid', $this->_model->cid);
				$this->_tpl->assign('AllComment', $_object);
				$this->_tpl->assign('HotThreeComment', $_object2);
				$this->_tpl->assign('HotTwentyComment', $_object3);
			}
			else
				Tool::alertBack('illegal act');
		}

		private function setCount() {
			if(isset($_GET['cid']) && isset($_GET['id']) && isset($_GET['type'])) {
				parent::__construct($this->_tpl, new CommentModel());
				$this->_model->id=$_GET['id'];
				if(!$this->_model->getOneComment()) Tool::alertBack('this comment not existing');
				if($_GET['type']=='sustain') $this->_model->setSustain()?Tool::alertLocation('succeed', 'feedback.php?cid='.$_GET['cid']):Tool::alertLocation('fail', 'feedback.php?cid='.$_GET['cid']);
				if($_GET['type']=='oppose') $this->_model->setOppose()?Tool::alertLocation('succeed', 'feedback.php?cid='.$_GET['cid']):Tool::alertLocation('fail', 'feedback.php?cid='.$_GET['cid']);
			}
		}

		private function setObject(&$_object) {
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
		}
	}
?>
