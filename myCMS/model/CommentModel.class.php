<?php
	class CommentModel extends Model {
		private $user;
		private $manner;
		private $content;
		private $cid;
		private $states;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function setStates() {
			foreach($this->states as $_key=>$_value) {
				if(!is_numeric($_value)) continue;
				if($_value>0) $_value=1;
				if($_value<0) $_value=0;
				$_sql.="update cms_comment set state='$_value' where id='$_key';";
			}
			return parent::multi($_sql);
		}

		public function setStateOK() {
			$_sql="update cms_comment set state=1 where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}
		public function setStateCancel() {
			$_sql="update cms_comment set state=0 where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function getHotThreeComment() {
			$_sql="select c.id, c.cid, c.user, c.manner, c.content, c.date, c.sustain, c.oppose, u.face from cms_comment c left join cms_user u on c.user=u.user where c.cid='$this->cid' and c.sustain+c.oppose>0 order by c.sustain+c.oppose desc limit 0,3;";
			return parent::all($_sql);
		}

		public function getNewThreeComment() {
			$_sql="select c.id, c.cid, c.user, c.manner, c.content, c.date, c.sustain, c.oppose, u.face from cms_comment c left join cms_user u on c.user=u.user where c.cid='$this->cid' order by c.date desc limit 0,3;";
			return parent::all($_sql);
		}

		public function getCommentListTotal() {
			$_sql="select count(*) from cms_comment;";
			return parent::total($_sql);
		}

		public function getCommentTotal() {
			$_sql="select count(*) from cms_comment where cid='$this->cid';";
			return parent::total($_sql);
		}

		public function getOneComment() {
			$_sql="select id from cms_comment where id='$this->id' limit 1;";
			return parent::one($_sql);
		}

		public function setSustain() {
			$_sql="update cms_comment set sustain=sustain+1 where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function setOppose() {
			$_sql="update cms_comment set oppose=oppose+1 where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function getCommentList() {
			$_sql="select c.id, c.cid, c.user, c.content, c.content full, c.state, c.state num, ct.title from cms_comment c, cms_content ct where c.cid=ct.id order by c.date desc $this->limit;";
			return parent::all($_sql);
		}

		public function getAllComment() {
			$_sql="select c.id, c.cid, c.user, c.manner, c.content, c.date, c.sustain, c.oppose, u.face from cms_comment c left join cms_user u on c.user=u.user where c.cid='$this->cid' order by c.date desc $this->limit;";
			return parent::all($_sql);
		}

		public function addComment() {
			$_sql="insert into cms_comment(user, manner, content, cid, date) values('$this->user', '$this->manner', '$this->content', '$this->cid', now());";
			return parent::aud($_sql);
		}

		public function deleteComment() {
			$_sql="delete from cms_comment where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}
	}
?>
