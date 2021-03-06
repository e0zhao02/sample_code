<?php
	class Tool {
		static public function alertLocation($_info, $_url) {
			if(!empty($_info)) {
				echo "<script>location.href='$_url';</script>";
				exit();
			}
			else {
				header('Location:'.$_url);
				exit();
			}
		}

		static public function alertBack($_info) {
			echo "<script>alert('$_info');history.back();</script>";
			exit();
		}

		static public function alertClose($_info) {
			echo "<script>alert('$_info');close();</script>";
			exit();
		}

		static public function alertOpenerClose($_info, $_path) {
			echo "<script>alert('$_info');</script>";
			echo "<script>opener.document.content.thumbnail.value='$_path';</script>";
			echo "<script>opener.document.content.pic.style.display='block';</script>";
			echo "<script>opener.document.content.pic.src='$_path';</script>";
			echo "<script>window.close();</script>";
			exit();
		}

		static public function tplName() {
			$_str=explode('/', $_SERVER["SCRIPT_NAME"]);
			$_str=explode('.', $_str[count($_str)-1]);
			return $_str[0];
		}

		static public function unHtml($_str) {
			return htmlspecialchars_decode($_str);
		}

		static public function objDate(&$_object, $_field) {
			if($_object) { foreach($_object as $_value) $_value->$_field=date('m-d', strtotime($_value->$_field)); }
		}

		static public function objArrOfStr(&$_object, $_field) {
			if($_object) {
				foreach($_object as $_value) $_html.=$_value->$_field.',';
			}
			return substr($_html, 0, strlen($_html)-1);
		}

		static public function subStr(&$_object, $_field, $_length, $_encoding=null) {
			if($_object) {
				if(is_array($_object)) {
					foreach($_object as $_value) {
						if(strlen($_value->$_field)>$_length)
							$_value->$_field=substr($_value->$_field, 0, $_length).'...';
					}
				}
				else {
					if(strlen($_object)>$_length) return substr($_object, 0, $_length).'...';
					else return $_object;
				}
			}
		}

		static public function htmlString($_date) {
			if(is_array($_date)) {
				foreach($_date as $_key=>$_value) $_string[$_key]=Tool::htmlString($_value);
			}
			elseif(is_object($_date)) {
				foreach($_date as $_key=>$_value) $_string->$_key=Tool::htmlString($_value);
			}
			else
				$_string=htmlspecialchars($_date);

			return $_string;
		}

		static public function mysqlString($_date) {
			return !GPC? mysql_real_escape_string($_date):$_date;
		}

		static public function unSession() {
			if(session_start()) session_destroy();
		}
	}
?>
