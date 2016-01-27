<?php
	class FileUpload {
		private $error;
		private $maxsize;
		private $type;
		private $typeArr=array('image/jpeg', 'image/pjpeg', 'image/png', 'image/x-png', 'image/gif');
		private $path;
		private $today;
		private $name;
		private $tmp;
		private $linkpath;
		private $linktoday;

		public function __construct($_file, $_maxsize) {
			$this->error=$_FILES[$_file]['error'];
			$this->maxsize=$_maxsize/1024;
			$this->type=$_FILES[$_file]['type'];
			$this->path=ROOT_PATH.UPDIR;
			$this->linktoday=date('Ymd').'/';
			$this->today=$this->path.$this->linktoday;
			$this->name=$_FILES[$_file]['name'];
			$this->tmp=$_FILES[$_file]['tmp_name'];
			$this->checkError();
			$this->checkType();
			$this->checkPath();
			$this->moveUpload();
		}

		public function getPath() {
			$_path=$_SERVER["SCRIPT_NAME"];
			$_dir=dirname(dirname($_path));
			if($_dir=='\\') $_dir='/';
			$this->linkpath=$_dir.$this->linkpath;
			return $this->linkpath;
		}

		private function moveUpload() {
			if(is_uploaded_file($this->tmp)) {
				if(!move_uploaded_file($this->tmp, $this->setNewName())) Tool::alertBack('upload failed');
			}
			else Tool::alertBack('tmp file not exists');
		}

		private function setNewName() {
			$_nameArr=explode('.', $this->name);
			$_postfix=$_nameArr[count($_nameArr)-1];
			$_newname=date('YmdHis').mt_rand(100, 1000).'.'.$_postfix;
			$this->linkpath=UPDIR.$this->linktoday.$_newname;
			return $this->today.$_newname;
		}

		private function checkPath() {
			if(!is_dir($this->path) || !is_writeable($this->path))
				if(!mkdir($this->path)) Tool::alertBack('mkdir failed');
			if(!is_dir($this->today) || !is_writeable($this->today))
				if(!mkdir($this->today)) Tool::alertBack('mkdir failed');
		}

		private function checkType() {
			if(!in_array($this->type, $this->typeArr)) Tool::alertBack('wrong upload file type');
		}

		private function checkError() {
			if(!empty($this->error)) {
				switch($this->error) {
					case 1:
						Tool::alertBack('file size exceeds limit');
						break;
					case 2:
						Tool::alertBack('file size exceeds '.$this->maxsize.'kb');
						break;
					case 3:
						Tool::alertBack('only part uploaded');
						break;
					case 4:
						Tool::alertBack('no file uploaded');
						break;
					default:
						Tool::alertBack('unknown error');
				}
			}
		}
	}
?>
