<?php
	class DB {
		static public function getDB() {
			$_mysqli=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

			if(mysqli_connect_errno()) {
				echo "connection error";
				exit;
			}
			return $_mysqli;
		}

		static  public function unDB(&$_result, &$_db) {
			if(is_object($_result)) {
				$_result->free();
				$_result=null;
			}
			if(is_object($_db)) {
				$_db->close();
				$_db=null;
			}
		}
	}
?>
