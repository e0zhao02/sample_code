<?php
	class UserModel extends Model {
		private $id;
		private $user;
		private $pass;
		private $email;
		private $question;
		private $answer;
		private $face;
		private $state;
		private $time;
		private $limit;

		private function __set($_key, $_value) {
			$this->$_key=Tool::mysqlString($_value);
		}

		private function __get($_key) {
			return $this->$_key;
		}

		public function updateUser() {
			$_sql="update cms_user set pass='$this->pass', face='$this->face', question='$this->question', answer='$this->answer', state='$this->state' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function getOneUser() {
			$_sql="select id, user, pass, face, email, question, answer, state from cms_user where id='$this->id' limit 1;";
			return parent::one($_sql);
		}

		public function deleteUser() {
			$_sql="delete from cms_user where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function getUserTotal() {
			$_sql="select count(*) from cms_user;";
			return parent::total($_sql);
		}

		public function getAllUser() {
			$_sql="select id, user, email, state from cms_user order by date desc $this->limit;";
			return parent::all($_sql);
		}

		public function getLaterUser() {
			$_sql="select user, face from cms_user order by time desc limit 0, 6;";
			return parent::all($_sql);
		}

		public function setLaterUser() {
			$_sql="update cms_user set time='$this->time' where id='$this->id' limit 1;";
			return parent::aud($_sql);
		}

		public function checkUser() {
			$_sql="select id from cms_user where user='$this->user' limit 1;";
			return parent::one($_sql);
		}

		public function checkEmail() {
			$_sql="select id from cms_user where email='$this->email' limit 1;";
			return parent::one($_sql);
		}

		public function checkLogin() {
			$_sql="select id, user, pass, face from cms_user where user='$this->user' and pass='$this->pass' limit 1;";
			return parent::one($_sql);
		}

		public function addUser() {
			$_sql="insert into cms_user(user, pass, email, question, answer, face, state, time, date) values('$this->user', '$this->pass', '$this->email', '$this->question', '$this->answer', '$this->face', '$this->state', '$this->time', now());";
			return parent::aud($_sql);
		}
	}
?>
