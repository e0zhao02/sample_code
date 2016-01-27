<?php
	class CommentAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new CommentModel());
		}

		public function _action() {
			switch($_GET['action']) {
				case 'show':
					$this->show();
					break;
				case 'state':
					$this->state();
					break;
				case 'states':
					$this->states();
					break;
				case 'delete':
					$this->delete();
					break;
				default:
					Tool::alertBack('illegal act');
			}
		}

		private function show() {
			parent::page($this->_model->getCommentListTotal());
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Comment List');
			$_object=$this->_model->getCommentList();
			Tool::subStr($_object, 'content', 30);
			if($_object) {
				foreach($_object as $_value) {
					if(empty($_value->state)) $_value->state='<span class="red">[uncensored]</span> | <a href="comment.php?action=state&type=ok&id='.$_value->id.'">pass </a>';
					else $_value->state='<span class="green">[censored]</span> | <a href="comment.php?action=state&type=cancel&id='.$_value->id.'">cancel</a>';
				}
			}
			$this->_tpl->assign('CommentList', $_object);
		}

		private function state() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				if(!$this->_model->getOneComment()) Tool::alertBack('this comment not existing');

				if($_GET['type']=='ok') {
					if($this->_model->setStateOK()) Tool::alertLocation(null, PREV_URL);
					else Tool::alertBack('censor failed');
				}
				elseif($_GET['type']=='cancel') {
					$this->_model->setStateCancel()?Tool::alertLocation(null, PREV_URL):Tool::alertBack('cancel fail');
				}
				else Tool::alertBack('illegal act');
			}
			else Tool::alertBack('illegal act');
		}

		private function states() {
			if(isset($_POST['send'])) {
				$this->_model->states=$_POST['states'];
				if($this->_model->setStates()) Tool::alertLocation(null, PREV_URL);
			}
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$this->_model->deleteComment()?Tool::alertLocation('Succeed', PREV_URL):Tool::alertBack('Fail');
			}
			else Tool::alertBack("illegal operation");
		}
	}
?>
