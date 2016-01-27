<?php
	class Model {
		public function multi($_sql) {
			$_db=DB::getDB();
			$_db->multi_query($_sql);
			DB::unDB($_result=null, $_db);
			return true;
		}

		public function nextid($_table) {
			$_sql="show table status like '$_table'";
			$_object=$this->one($_sql);
			return $_object->Auto_increment;
		}

		protected function total($_sql) {
			$_db=DB::getDB();
			$_result=$_db->query($_sql);
			$_total=$_result->fetch_row();
			DB::unDB($_result, $_db);
			return $_total[0];
		}

		protected function one($_sql) {
			$_db=DB::getDB();
			$_result=$_db->query($_sql);
			$_objects=$_result->fetch_object();
			DB::unDB($_result, $_db);
			return Tool::htmlString($_objects);
		}

		protected function all($_sql) {
			$_db=DB::getDB();
			$_result=$_db->query($_sql);
			$_html=array();
			while(!!$_objects=$_result->fetch_object())
				$_html[]=$_objects;
			DB::unDB($_result, $_db);
			return Tool::htmlString($_html);

		}

		protected function aud($_sql) {
			$_db=DB::getDB();
			$_db->query($_sql);
			$_affected_rows=$_db->affected_rows;
			DB::unDB($_result=null, $_db);
			return $_affected_rows;
		}
	}
?>
