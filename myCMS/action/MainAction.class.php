<?php
	class MainAction extends Action {
		public function __construct(&$_tpl) {
			parent::__construct($_tpl);
		}

		public function _action() {
			if($_GET['action']=='delcache') $this->delCache();
			$this->cacheNum();
		}

		private function cacheNum() {
			$_dir=ROOT_PATH.'/cache/';
			$_num=sizeof(scandir($_dir));
			$this->_tpl->assign('cacheNum', $_num-2);
		}

		private function delCache() {
			$_dir=ROOT_PATH.'/cache/';

			if(!$_dh=@opendir($_dir)) return;
			while(false !== ($_obj=readdir($_dh))) {
				if($_obj=='.' || $_obj=='..') continue;
				@unlink($_dir.'/'.$_obj);
			}
			closedir($_dh);
			Tool::alertLocation('succeed', 'main.php');
		}
	}
?>
