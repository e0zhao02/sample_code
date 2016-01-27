<?php
	class ManageModel extends Model {
		private $id;
		private $admin_user;
		private $admin_pass;
		private $level;
		private $last_ip;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function setLoginCount() {
			$_sql="update cms_manage set login_count=login_count+1, last_ip='$this->last_ip', last_time=now() where admin_user='$this->admin_user' limit 1;";
			return parent::aud($_sql);
		}

		public function getManageTotal() {
			$_sql="select count(*) from cms_manage";
			return parent::total($_sql);
		}

		public function getLoginManage() {
			$_sql="select m.admin_user, l.level_name from cms_manage m, cms_level l where m.level=l.id and m.admin_user='$this->admin_user' and m.admin_pass='$this->admin_pass' limit 1;";
			return parent::one($_sql);
		}

		public function getOneManage() {
			$_sql="select id, admin_user, admin_pass, level from cms_manage where level='$this->level' or id='$this->id' or admin_user='$this->admin_user' limit 1;";
			return parent::one($_sql);
		}

		public function getAllManage() {
			$_sql="select m.id, m.admin_user, m.login_count, m.last_ip, m.last_time, l.level_name from cms_manage as m, cms_level as l where l.id=m.level order by m.id desc $this->limit;";
			return parent::all($_sql);
		}

		public function addManage() {
			$_sql="insert into cms_manage(admin_user, admin_pass, level, reg_time) values('$this->admin_user', '$this->admin_pass', '$this->level', now());";
			return parent::aud($_sql);
		}

		public function updateManage() {
			$_sql="update cms_manage set admin_pass='$this->admin_pass', level='$this->level' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function deleteManage() {
			$_sql="delete from cms_manage where id='$this->id' limit 1";
			return parent::aud($_sql);
		}
	}
?>
