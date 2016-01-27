<?php
	class LevelModel extends Model {
		private $id;
		private $level_name;
		private $level_info;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function getLevelTotal() {
			$_sql="select count(*) from cms_level;";
			return parent::total($_sql);
		}

		public function getOneLevel() {
			$_sql="select id, level_name, level_info from cms_level where id='$this->id' or level_name='$this->level_name' limit 1;";
			return parent::one($_sql);
		}

		public function getAllLevel() {
			$_sql="select id, level_name, level_info from cms_level order by id desc;";
			return parent::all($_sql);
		}

		public function getAllLimitLevel() {
			$_sql="select id, level_name, level_info from cms_level order by id desc $this->limit;";
			return parent::all($_sql);
		}

		public function addLevel() {
			$_sql="insert into cms_level(level_name, level_info) values('$this->level_name', '$this->level_info');";
			return parent::aud($_sql);
		}

		public function updateLevel() {
			$_sql="update cms_level set level_name='$this->level_name', level_info='$this->level_info' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function deleteLevel() {
			$_sql="delete from cms_level where id='$this->id' limit 1";
			return parent::aud($_sql);
		}
	}
?>
