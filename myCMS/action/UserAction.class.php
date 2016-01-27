<?php
	class UserAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new UserModel());
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
			parent::page($this->_model->getUserTotal());
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Member List');

			$_object=$this->_model->getAllUser();
			foreach($_object as $_value) {
				switch($_value->state) {
					case 0:
						$_value->state='disabled member';
						break;
					case 1:
						$_value->state='member to be approved';
						break;
					case 2:
						$_value->state='junior member';
						break;
					case 3:
						$_value->state='senior member';
						break;
					case 4:
						$_value->state='vip member';
						break;
				}
			}
			$this->_tpl->assign('AllUser', $_object);
		}

		private function add() {
			if(isset($_POST['send'])) {
				if(Validate::checkNull($_POST['user'])) Tool::alertBack('empty username');
				if(Validate::checkLength($_POST['user'], 2, 'min')) Tool::alertBack('username less than 2');
				if(Validate::checkLength($_POST['user'], 20, 'max')) Tool::alertBack('username more than 20');
				if(Validate::checkLength($_POST['pass'], 6, 'min')) Tool::alertBack('password less than 6');
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];

				$this->_model->user=$_POST['user'];
				$this->_model->pass=md5($_POST['pass']);
				$this->_model->email=$_POST['email'];
				$this->_model->face=$_POST['face'];
				$this->_model->state=$_POST['state'];

				if($this->_model->checkUser()) Tool::alertBack('duplicate username');
				if($this->_model->checkEmail()) Tool::alertBack('duplicate email');

				if($this->_model->addUser()) {
					Tool::alertLocation('succeed', 'user.php?action=show');
				}
				else
					Tool::alertBack('fail');
			}
			$this->_tpl->assign('add', true);
			$this->_tpl->assign('title', 'Add New Member');
			$this->_tpl->assign('prev_url', PREV_URL);
			$this->_tpl->assign('OptionFaceOne', range(1, 9));
			$this->_tpl->assign('OptionFaceTwo', range(10, 24));
			$this->state($_user->state);
		}

		private function update() {
			if(isset($_POST['send'])) {
				if(Validate::checkNull($_POST['pass'])) $this->_model->pass=$_POST['ppass'];
				else {
					if(Validate::checkLength($_POST['pass'], 6, 'min')) Tool::alertBack('password less than 6');
					$this->_model->pass=md5($_POST['pass']);
				}
				if(Validate::checkEmail($_POST['email'])) Tool::alertBack('wrong email format');
				$this->_model->question=$_POST['question'];
				$this->_model->answer=$_POST['answer'];
				$this->_model->id=$_POST['id'];
				$this->_model->email=$_POST['email'];
				$this->_model->face=$_POST['face'];
				$this->_model->state=$_POST['state'];
				$this->_model->updateUser()?Tool::alertLocation('succeed', $_POST['prev_url']):Tool::alertBack('fail');
			}
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$_user=$this->_model->getOneUser();
				if($_user) {
					$this->_tpl->assign('update', true);
					$this->_tpl->assign('title', 'Update Existing Member');
					$this->_tpl->assign('prev_url', PREV_URL);
					$this->_tpl->assign('id', $_user->id);
					$this->_tpl->assign('user', $_user->user);
					$this->_tpl->assign('email', $_user->email);
					$this->_tpl->assign('answer', $_user->answer);
					$this->_tpl->assign('facesrc', $_user->face);
					$this->_tpl->assign('pass', $_user->pass);
					$this->face($_user->face);
					$this->question($_user->question);
					$this->state($_user->state);
				}
				else
					Tool::alertBack('this member not existing');
			}
			else Tool::alertBack('illegal act');
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$this->_model->deleteUser()?Tool::alertLocation('Succeed', PREV_URL):Tool::alertBack('Fail');
			}
			else Tool::alertBack("illegal operation");
		}

		private function state($_state) {
			$_stateArr=array('disabled member', 'member to be approved', 'junior member', 'senior member', 'vip member');
			foreach($_stateArr as $_key=>$_value) {
				if($_state==$_key) $_checked='checked="checked"';
				$_html.='<input type="radio" name="state" '.$_checked.'value="'.$_key.'" />'.$_value;
				$_checked='';
			}
			$this->_tpl->assign('state', $_html);
		}

		private function question($_question) {
			$_questionArr=array("what's your father's name", "what's your mother's occupation", "what's your spouse's sex");
			foreach($_questionArr as $_value) {
				if($_value==$_question) $_selected='selected="selected"';
				$_html.='<option '.$_selected.'value="'.$_value.'">'.$_value.'</option>';
				$_selected='';
			}
			$this->_tpl->assign('question', $_html);
		}

		private function face($_face) {
			$_one=range(1, 9);
			$_two=range(10, 24);

			foreach($_one as $_value) {
				if('0'.$_value.'.png'==$_face) $_selected='selected="selected"';
				$_html.='<option'.$_selected.' value="0'.$_value.'.png">0'.$_value.'.png</option>';
				$_selected='';
			}

			foreach($_two as $_value) {
				if($_value.'.png'==$_face) $_selected='selected="selected"';
				$_html.='<option'.$_selected.' value="'.$_value.'.png">'.$_value.'.png</option>';
				$_selected='';
			}
			$this->_tpl->assign('face', $_html);
		}
	}
?>
