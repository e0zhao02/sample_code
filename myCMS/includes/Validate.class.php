<?php
	class Validate {
		static public function checkNull($_date) {
			if(trim($_date)=='') return true;
			return false;
		}

		static public function checkLength($_date, $_length, $_flag) {
			if($_flag=='min') {
				if(mb_strlen(trim($_date), 'utf-8')<$_length) return true;
				return false;
			} elseif($_flag=='max') {
				if(mb_strlen(trim($_date), 'utf-8')>$_length) return true;
				return false;
			} elseif($_flag=='equals') {
				if(mb_strlen(trim($_date), 'utf-8')!=$_length) return true;
				return false;
			}
			else
				Tool::alertBack('Error:wrong parameter');
		}

		static public function checkEquals($_date, $_otherdate) {
			if(trim($_date)!=trim($_otherdate)) return true;
			return false;
		}

		static public function checkEmail($_data) {
			if(!preg_match('/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/', $_data)) return true;
			return false;
		}

		static public function checkSession() {
			if(!isset($_SESSION['admin'])) Tool::alertBack('illegal login');
		}
	}
?>
