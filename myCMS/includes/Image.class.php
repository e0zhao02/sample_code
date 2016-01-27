<?php
	class Image {
		private $file;
		private $width;
		private $height;
		private $type;
		private $img;

		public function __construct($_file) {
			$this->file=$_SERVER['DOCUMENT_ROOT'].$_file;
			list($this->width, $this->height, $this->type)=getimagesize($this->file);
			$this->img=$this->getFromImg($this->file, $this->type);
		}

		public function thumb($new_width=0, $new_height=0) {
			if(empty($new_width) && empty($new_height)) {
				$new_width=$this->width;
				$new_height=$this->height;
			}

			if(!is_numeric($new_width) || !is_numeric($new_height)) {
				$new_width=$this->width;
				$new_height=$this->height;
			}

			$_n_w=$new_width;
			$_n_h=$new_height;

			$_cut_width=0;
			$_cut_height=0;

			if($this->width<$this->height) $new_width=($new_height/$this->height)*$this->width;
			else $new_height=($new_width/$this->width)*$this->height;

			if($new_width<$_n_w) {
				$r=$_n_w/$new_width;
				$new_width*=$r;
				$new_height*=$r;
				$_cut_height=($new_height-$_n_h)/2;
			}

			if($new_height<$_n_h) {
				$r=$_n_h/$new_height;
				$new_width*=$r;
				$new_height*=$r;
				$_cut_width=($new_width-$_n_w)/2;
			}

			$new=imagecreatetruecolor($_n_w, $_n_h);
			imagecopyresampled($new, $img, 0, 0, $_cut_width, $_cut_height, $new_width, $new_height, $width, $height);
		}

		private function getFromImg($_file, $_type) {
			switch($_type) {
				case 1:
					$img=imagecreatefromgif($_file);
					break;
				case 2:
					$img=imagecreatefromjpeg($_file);
					break;
				case 3:
					$img=imagecreatefrompng($_file);
					break;
				default:
					Tool::alertBack('this image type not supported');
			}
			return $img;
		}

		public function out() {
			//header('Content-Type:image/jpeg');
			imagejpeg($this->img, $this->file);
			imagedestroy($this->img);
		}
	}
?>
