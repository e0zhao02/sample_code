<?php
	class ContentAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new ContentModel());
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
			$this->_tpl->assign('show', true);
			$this->_tpl->assign('title', 'Article List');
			$this->nav();

			$_nav=new NavModel();
			if(empty($_GET['nav'])) {
				$_id=$_nav->getAllNavChildId();
				$this->_model->nav=Tool::objArrOfStr($_id, 'id');
			}
			else {
				$_nav->id=$_GET['nav'];
				if(!$_nav->getOneNav()) Tool::alertBack('nav not existing');
				$this->_model->nav=$_nav->id;
			}

			parent::page($this->_model->getListContentTotal());

			$_object=$this->_model->getListContent();
			Tool::subStr($_object, 'title', 20, null);
			$this->_tpl->assign('SearchContent', $_object);
		}

		private function add() {
			if(isset($_POST['send'])) {
				$this->getPost();
				$this->_model->addContent()?Tool::alertLocation('succeed', '?action=show'):Tool::alertBack('fail');
			}

			$this->_tpl->assign('add', true);
			$this->_tpl->assign('title', 'Add New Article');
			$this->_tpl->assign('prev_url', PREV_URL);
			$this->nav();
		}

		private function update() {
			if(isset($_POST['send'])) {
				$this->_model->id=$_POST['id'];
				$this->getPost();
				$this->_model->updateContent()?Tool::alertLocation('succeed', $_POST['prev_url']):Tool::alertBack('You did not make any change. please click return to list');
			}
			if(isset($_GET['id'])) {
				$this->_tpl->assign('update', true);
				$this->_tpl->assign('title', 'Update Existing Article');
				$this->_model->id=$_GET['id'];
				$_content=$this->_model->getOneContent();
				if($_content) {
					$this->_tpl->assign('id', $_content->id);
					$this->_tpl->assign('titlec', $_content->title);
					$this->_tpl->assign('tag', $_content->tag);
					$this->_tpl->assign('keyword', $_content->keyword);
					$this->_tpl->assign('thumbnail', $_content->thumbnail);
					$this->_tpl->assign('source', $_content->source);
					$this->_tpl->assign('author', $_content->author);
					$this->_tpl->assign('content', $_content->content);
					$this->_tpl->assign('info', $_content->info);
					$this->_tpl->assign('count', $_content->count);
					$this->_tpl->assign('gold', $_content->gold);
					$this->_tpl->assign('prev_url', PREV_URL);
					$this->nav($_content->nav);
					$this->attr($_content->attr);
					$this->color($_content->color);
					$this->sort($_content->sort);
					$this->readlimit($_content->readlimit);
					$this->commend($_content->commend);
				}
				else
					Tool::alertBack('article not existing');
			}
			else Tool::alertBack('illegal act');
		}

		private function delete() {
			if(isset($_GET['id'])) {
				$this->_model->id=$_GET['id'];
				$this->_model->deleteContent()?Tool::alertLocation('succeed', PREV_URL):Tool::alertBack('fail');
			}
			else
				Tool::alertBack('illegal act');
		}

		private function getPost() {
			if(isset($_POST['attr'])) $this->_model->attr=implode(',', $_POST['attr']);
			else $this->_model->attr='no';
			$this->_model->title=$_POST['title'];
			$this->_model->nav=$_POST['nav'];
			$this->_model->info=$_POST['info'];
			$this->_model->source=$_POST['source'];
			$this->_model->keyword=$_POST['keyword'];
			$this->_model->thumbnail=$_POST['thumbnail'];
			$this->_model->tag=$_POST['tag'];
			$this->_model->author=$_POST['author'];
			$this->_model->content=$_POST['content'];
			$this->_model->commend=$_POST['commend'];
			$this->_model->count=$_POST['count'];
			$this->_model->gold=$_POST['gold'];
			$this->_model->color=$_POST['color'];
			$this->_model->sort=$_POST['sort'];
			$this->_model->readlimit=$_POST['readlimit'];
		}

		private function commend($_commend) {
			$_commendArr=array(1=>"allow comment", 0=>"forbid comment");
			foreach($_commendArr as $_key=>$_value) {
				if($_key==$_commend) $_checked='checked="checked"';
				$_html.='<input type="radio" '.$_checked.' name="commend" value="'.$_key.'" />'.$_value;
				$_checked='';
			}
			$this->_tpl->assign('commend', $_html);
		}

		private function readlimit($_readlimit) {
			$_readlimitArr=array(0=>'Open to Public', 1=>'Junior Member', 2=>'Middle Member', 3=>'Senior Member', 4=>'VIP Member');
			foreach($_readlimitArr as $_key=>$_value) {
				if($_key==$_readlimit) $_selected='selected="selected"';
				$_html.='<option '.$_selected.' value="'.$_key.'">'.$_value.'</option>';
				$_selected='';
			}
			$this->_tpl->assign('readlimit', $_html);
		}

		private function sort($_sort) {
			$_sortArr=array(0=>'default', 1=>'On Top One Day', 2=>'On Top One Week', 3=>'On Top One Month', 4=>'On Top One Year');
			foreach($_sortArr as $_key=>$_value) {
				if($_key==$_sort) $_selected='selected="selected"';
				$_html.='<option '.$_selected.' value="'.$_key.'" style="color:'.$_key.';">'.$_value.'</option>';
				$_selected='';
			}
			$this->_tpl->assign('sort', $_html);
		}

		private function color($_color) {
			$_colorArr=array(''=>'default', 'red'=>'red', 'blue'=>'blue', 'orange'=>'orange');
			foreach($_colorArr as $_key=>$_value) {
				if($_key==$_color) $_selected='selected="selected"';
				$_html.='<option '.$_selected.' value="'.$_key.'" style="color:'.$_key.';">'.$_value.'</option>';
				$_selected='';
			}
			$this->_tpl->assign('color', $_html);
		}

		private function attr($_attr) {
			$_attrArr=array('top', 'recommend', 'bold', 'goto');
			$_attrS=explode(',', $_attr);
			$_attrNo=array_diff($_attrArr, $_attrS);

			if($_attrS[0]!='on') {
				foreach($_attrS as $_value) $_html.='<input type="checkbox" checked="checked" name="attr[]" value="'.$_value.'" />'.$_value;
			}
			foreach($_attrNo as $_value)
				$_html.='<input type="checkbox" name="attr[]" value="'.$_value.'" />'.$_value;
			$this->_tpl->assign('attr', $_html);
		}

		private function nav($_n=0) {
			$_nav=new NavModel();
			foreach($_nav->getAllFrontNav() as $_object) {
				$_html.='<optgroup label="'.$_object->nav_name.'">'."\r\n";
				$_nav->id=$_object->id;
				if(!!$_childnav=$_nav->getAllChildFrontNav()) {
					foreach($_childnav as $_object) {
						if($_n==$_object->id) $_html.='<option selected="selected" value="'.$_object->id.'">'.$_object->nav_name.'</option>'."\r\n";
						else $_html.='<option value="'.$_object->id.'">'.$_object->nav_name.'</option>'."\r\n";
					}
				}
				$_html.='</optgroup>';
			}
			$this->_tpl->assign('nav', $_html);
		}
	}
?>
