<?php
	class Templates {
		private $_vars=array();
		private $_config=array();
		private $_cache=null;

		public function __construct($_cache) {
			if(!is_dir(TPL_DIR) || !is_dir(TPL_C_DIR) || !is_dir(CACHE))
				exit('ERROR, template dir or template_c dir or cache dir not existing. Please add them manually');

			$_sxe=simplexml_load_file(ROOT_PATH.'/config/profile.xml');
			$_tagLib=$_sxe->xpath('/root/taglib');

			foreach($_tagLib as $_tag) $this->_config["$_tag->name"]=$_tag->value;

			$this->_cache=$_cache;
		}

		public function assign($_var, $_value) {
			if(isset($_var) && !empty($_var)) $this->_vars[$_var]=$_value;
			else exit('ERROR: please set template variable');
		}

		public function cache($_file) {
			$_tplFile=TPL_DIR.$_file;
			if(!file_exists($_tplFile)) exit('ERROR: template file not existing');

			if(!empty($_SERVER["QUERY_STRING"])) $_file.=$_SERVER["QUERY_STRING"];

			$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
			$_cacheFile=CACHE.md5($_file).$_file.'.html';

			if(IS_CACHE) {
				if(file_exists($_cacheFile) && file_exists($_parFile)) {
					if(filemtime($_parFile) >= filemtime($_tplFile) && filemtime($_cacheFile) >= filemtime($_parFile)) {
						include $_cacheFile;
						exit();
					}
				}
			}
		}

		public function display($_file) {
			$_tpl=$this;
			$_tplFile=TPL_DIR.$_file;
			if(!file_exists($_tplFile)) exit('ERROR: template file not existing');

			if(!empty($_SERVER["QUERY_STRING"])) $_file_query.=$_SERVER["QUERY_STRING"];

			$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';
			$_cacheFile=CACHE.md5($_file).$_file.$_file_query.'.html';

			if(!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)) {
				require_once ROOT_PATH.'/includes/Parser.class.php';

				$_parser=new Parser($_tplFile);
				$_parser->compile($_parFile);
			}

			include $_parFile;

			if(IS_CACHE && !$this->_cache->noCache()) {
				file_put_contents($_cacheFile, ob_get_contents());
				ob_end_clean();
				include $_cacheFile;
			}
		}

		public function create($_file) {
			$_tplFile=TPL_DIR.$_file;
			if(!file_exists($_tplFile)) exit('ERROR: template file not existing');

			$_parFile=TPL_C_DIR.md5($_file).$_file.'.php';

			if(!file_exists($_parFile) || filemtime($_parFile) < filemtime($_tplFile)) {
				require_once ROOT_PATH.'/includes/Parser.class.php';

				$_parser=new Parser($_tplFile);
				$_parser->compile($_parFile);
			}

			include $_parFile;
		}
	}
?>
