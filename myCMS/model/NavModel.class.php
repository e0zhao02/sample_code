<?php
	class NavModel extends Model {
		private $id;
		private $nav_name;
		private $nav_info;
		private $pid;
		private $sort;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function getFourNav() {
			$_sql="select id, nav_name from cms_nav where pid=0 order by sort limit 0, 4;";
			return parent::all($_sql);
		}

		public function getAllNavChildId() {
			$_sql="select id from cms_nav where pid<>0;";
			return parent::all($_sql);
		}

		public function getNavChildId() {
			$_sql="select id from cms_nav where pid='$this->id';";
			return parent::all($_sql);
		}

		public function setNavSort() {
			foreach($this->sort as $_key=>$_value) {
				if(!is_numeric($_value)) continue;
				$_sql.="update cms_nav set sort='$_value' where id='$_key';";
			}
			return parent::multi($_sql);
		}

		public function getFrontNav() {
			$_sql="select id, nav_name from cms_nav where pid=0 order by sort limit 0, ".NAV_SIZE.";";
			return parent::all($_sql);
		}

		public function getOneNav() {
			$_sql="select n1.id, n1.nav_name, n1.nav_info, n2.id as iid, n2.nav_name as nnav_name from cms_nav n1 left join cms_nav n2 on n1.pid=n2.id where n1.id='$this->id' or n1.nav_name='$this->nav_name' limit 1;";
			return parent::one($_sql);
		}

		public function getNavTotal() {
			$_sql="select count(*) from cms_nav where pid=0;";
			return parent::total($_sql);
		}

		public function getNavChildTotal() {
			$_sql="select count(*) from cms_nav where pid=$this->id;";
			return parent::total($_sql);
		}

		public function getAllNav() {
			$_sql="select id, nav_name, nav_info, sort from cms_nav where pid=0 order by sort $this->limit;";
			return parent::all($_sql);
		}

		public function getAllChildNav() {
			$_sql="select id, nav_name, nav_info, sort from cms_nav where pid='$this->id' order by sort $this->limit;";
			return parent::all($_sql);
		}

		public function getAllFrontNav() {
			$_sql="select id, nav_name, nav_info, sort from cms_nav where pid=0 order by sort;";
			return parent::all($_sql);
		}

		public function getAllChildFrontNav() {
			$_sql="select id, nav_name, nav_info, sort from cms_nav where pid='$this->id' order by sort;";
			return parent::all($_sql);
		}

		public function addNav() {
			$_sql="insert into cms_nav(nav_name, nav_info, pid, sort) values ('$this->nav_name', '$this->nav_info', '$this->pid', ".parent::nextid('cms_nav').");";
			return parent::aud($_sql);
		}

		public function deleteNav() {
			$_sql="delete from cms_nav where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function updateNav() {
			$_sql="update cms_nav set nav_name='$this->nav_name', nav_info='$this->nav_info' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}
	}
?>
