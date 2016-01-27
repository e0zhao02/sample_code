<?php
	class ContentModel extends Model {
		private $id;
		private $title;
		private $nav;
		private $attr;
		private $tag;
		private $keyword;
		private $thumbnail;
		private $info;
		private $source;
		private $author;
		private $content;
		private $commend;
		private $gold;
		private $count;
		private $color;
		private $sort;
		private $readlimit;
		private $inputkeyword;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function searchKeywordContentTotal() {
			$_sql="select count(*) from cms_content c, cms_nav n where c.nav=n.id and c.keyword like '%$this->inputkeyword%';";
			return parent::total($_sql);
		}

		public function searchTitleContentTotal() {
			$_sql="select count(*) from cms_content c, cms_nav n where c.nav=n.id and c.title like '%$this->inputkeyword%';";
			return parent::total($_sql);
		}

		public function searchKeywordContent() {
			$_sql="select c.id, c.title, c.nav, c.title t, c.attr, c.date, c.keyword, c.info, c.gold, c.thumbnail, c.count, n.nav_name from cms_content c, cms_nav n where c.nav=n.id and c.keyword like '%$this->inputkeyword%' order by c.date desc $this->limit;";
			return parent::all($_sql);
		}

		public function searchTitleContent() {
			$_sql="select c.id, c.title, c.nav, c.title t, c.attr, c.date, c.keyword, c.info, c.gold, c.thumbnail, c.count, n.nav_name from cms_content c, cms_nav n where c.nav=n.id and c.title like '%$this->inputkeyword%' order by c.date desc $this->limit;";
			return parent::all($_sql);
		}

		public function getNewNavList() {
			$_sql="select id, title, date from cms_content where nav in (select id from cms_nav where pid='$this->nav') order by date desc limit 0, 11;";
			return parent::all($_sql);
		}

		public function getNewList() {
			$_sql="select id, title, date from cms_content order by date desc limit 11;";
			return parent::all($_sql);
		}

		public function getNewTop() {
			$_sql="select id, title, info from cms_content where attr like '%top%' order by date desc limit 1;";
			return parent::one($_sql);
		}

		public function getNewTopList() {
			$_sql="select id, title, info from cms_content where attr like '%top%' order by date desc limit 1, 4;";
			return parent::all($_sql);
		}

		public function getPicList() {
			$_sql="select id, title, thumbnail from cms_content where thumbnail<>'' order by date desc limit 0, 4;";
			return parent::all($_sql);
		}

		public function getMonthCommentList() {
			$_sql="select ct.id, ct.title, ct.date from cms_content ct where month(now())=date_format(ct.date, '%c') order by (select count(*) from cms_comment c where c.cid=ct.id) desc limit 0, 6;";
			return parent::all($_sql);
		}

		public function getMonthHotList() {
			$_sql="select id, title, date from cms_content where month(now())=date_format(date, '%c') order by count desc limit 0, 6;";
			return parent::all($_sql);
		}

		public function getNewRecList() {
			$_sql="select id, title, date from cms_content where attr like '%rec%' order by date desc limit 0, 6;";
			return parent::all($_sql);
		}

		public function getMonthNavHot() {
			$_sql="select ct.id, ct.title, ct.date from cms_content ct where month(now())=date_format(date, '%c') and ct.nav in ($this->nav) order by (select count(*) from cms_comment c where c.cid=ct.id) desc limit 0, 10;";
			return parent::all($_sql);
		}

		public function getMonthNavRec() {
			$_sql="select id, title, date from cms_content where attr like '%rec%' and month(now())=date_format(date, '%c') and nav in ($this->nav) order by date desc limit 0, 10;";
			return parent::all($_sql);
		}

		public function getMonthNavPic() {
			$_sql="select id, title, date from cms_content where thumbnail<>'' and month(now())=date_format(date, '%c') and nav in ($this->nav) order by date desc limit 0, 10;";
			return parent::all($_sql);
		}

		public function getHotTwentyComment() {
			$_sql="select ct.id, ct.title from cms_content ct order by (select count(*) from cms_comment c where c.cid=ct.id) desc limit 0,20;";
			return parent::all($_sql);
		}

		public function setContentCount() {
			$_sql="update cms_content set count=count+1 where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function getListContentTotal() {
			$_sql="select count(*) from cms_content c, cms_nav n where c.nav=n.id and c.nav in ($this->nav);";
			return parent::total($_sql);
		}

		public function getListContent() {
			$_sql="select c.id, c.title, c.nav, c.title t, c.attr, c.keyword, c.date, c.info, c.gold, c.thumbnail, c.count, n.nav_name from cms_content c, cms_nav n where c.nav=n.id and c.nav in ($this->nav) order by c.date desc $this->limit;";
			return parent::all($_sql);
		}

		public function getOneContent() {
			$_sql="select id, title, nav, attr, content, info, date, count, author, source, thumbnail, tag, color, keyword, sort, readlimit, commend, gold from cms_content where id='$this->id';";
			return parent::one($_sql);
		}

		public function addContent() {
			$_sql="insert into cms_content(title,nav,info,thumbnail,source,author,tag,keyword,attr,content,commend,count,gold,color,sort,readlimit,date) values('$this->title','$this->nav','$this->info','$this->thumbnail','$this->source','$this->author','$this->tag','$this->keyword','$this->attr','$this->content','$this->commend','$this->count','$this->gold','$this->color','$this->sort','$this->readlimit',now());";
			return parent::aud($_sql);
		}

		public function updateContent() {
			$_sql="update cms_content set title='$this->title',nav='$this->nav',info='$this->info',thumbnail='$this->thumbnail',source='$this->source',author='$this->author',tag='$this->tag',keyword='$this->keyword',attr='$this->attr',content='$this->content',commend='$this->commend',count='$this->count',gold='$this->gold',color='$this->color',sort='$this->sort',readlimit='$this->readlimit' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function deleteContent() {
			$_sql="delete from cms_content where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}
	}
?>
