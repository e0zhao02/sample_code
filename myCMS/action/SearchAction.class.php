<?php
	class SearchAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl, new ContentModel());
		}

		public function _action() {
			$this->searchTitle();
			$this->searchKeyword();
			$this->searchTag();
		}

		private function searchTitle() {
			if($_GET['type']==1) {
				if(empty($_GET['inputkeyword'])) Tool::alertBack('search keyword empty');
				$this->_model->inputkeyword=$_GET['inputkeyword'];

				parent::page($this->_model->searchTitleContentTotal(), ARTICLE_SIZE);
				$_object=$this->_model->searchTitleContent();
				if($_object) {
					foreach($_object as $_value) {
						if(empty($_value->thumbnail)) $_value->thumbnail='images/none.jpg';
						$_value->title=str_replace($this->_model->inputkeyword, '<span class="red">'.$this->_model->inputkeyword.'</span>', $_value->title);
					}
				}
				$this->_tpl->assign('SearchContent', $_object);
			}
		}

		private function searchKeyword() {
			if($_GET['type']==2) {
				if(empty($_GET['inputkeyword'])) Tool::alertBack('search keyword empty');
				$this->_model->inputkeyword=$_GET['inputkeyword'];

				parent::page($this->_model->searchKeywordContentTotal(), ARTICLE_SIZE);
				$_object=$this->_model->searchKeywordContent();
				if($_object) {
					foreach($_object as $_value) {
						if(empty($_value->thumbnail)) $_value->thumbnail='images/none.jpg';
						$_value->keyword=str_replace($this->_model->inputkeyword, '<span class="red">'.$this->_model->inputkeyword.'</span>', $_value->keyword);
					}
				}
				$this->_tpl->assign('SearchContent', $_object);
			}
		}

		private function searchTag() {
			if($_GET['type']==3) {}
		}
	}
?>
