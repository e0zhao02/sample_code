<?php
	class Page {
		private $total;
		private $pagesize;
		private $limit;
		private $page;
		private $pagenum;
		private $url;
		private $bothnum;

		public function __construct($_total, $_pagesize) {
			$this->total=$_total?$_total:1;
			$this->pagesize=$_pagesize;
			$this->pagenum=ceil($this->total/$this->pagesize);
			$this->page=$this->setPage();
			$this->limit="limit ".($this->page-1)*$this->pagesize.", $this->pagesize";
			$this->url=$this->setUrl();
			$this->bothnum=2;
		}

		private function __get($_key) {
			return $this->$_key;
		}

		private function setPage() {
			if(!empty($_GET['page'])) {
				if($_GET['page']>0) {
					if($_GET['page']>$this->pagenum) return $this->pagenum;
					else return $_GET['page'];
				}
				else return 1;
			}
			else return 1;
		}

		private function setUrl() {
			$_url=$_SERVER['REQUEST_URI'];
			$_par=parse_url($_url);

			if(isset($_par['query'])) {
				parse_str($_par['query'], $_query);
				unset($_query['page']);
				$_url=$_par['page'].'?'.http_build_query($_query);
			}
			return $_url;
		}

		private function pageList() {
			for($i=$this->bothnum;$i>=1;$i--) {
				$_page=$this->page-$i;
				if($_page<1) continue;
				$_pagelist.=" <a href='".$this->url."&page=".$_page."'>".$_page."</a> ";
			}

			$_pagelist.='<span class="me">'.$this->page.'</span>';

			for($i=1;$i<=$this->bothnum;$i++) {
				$_page=$this->page+$i;
				if($_page>$this->pagenum) break;
				$_pagelist.=" <a href='".$this->url."&page=".$_page."'>".$_page."</a> ";
			}
			return $_pagelist;
		}

		private function first() {
			if($this->page>$this->bothnum+1) return " <a href='".$this->url."'>1</a> ... ";
		}

		private function prev() {
			if($this->page==1) return '<span class="disabled">Prev Page</span>';
			return " <a href='".$this->url."&page=".($this->page-1)."'>Prev Page</a> ";
		}

		private function next() {
			if($this->page==$this->pagenum) return '<span class="disabled">Next Page</span>';
			return " <a href='".$this->url."&page=".($this->page+1)."'>Next Page</a> ";
		}

		private function last() {
			if($this->pagenum-$this->page>$this->bothnum) return " ...<a href='".$this->url."&page=$this->pagenum'>".$this->pagenum."</a> ";
		}

		public function showpage() {
			$_page.=$this->first();
			$_page.=$this->pageList();
			$_page.=$this->last();
			$_page.=$this->prev();
			$_page.=$this->next();

			return $_page;
		}
	}
?>
