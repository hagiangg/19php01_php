<?php
	class User {
		public $name;
		public $email;
		public $password;
		public $phone;
		public $address;
		public function add() {
			echo "Add user";
		}
		public function edit() {
			echo "Edit user";
		}
		public function register() {
			echo "Register";
		}
		public function login() {
			echo "Login";
		}
		public function view() {
			echo "View";
		}
		public function list() {
			echo "List";
		}
	}
	$user = new User();
	$user->add();
	echo '<br>';
	$test1 = $user->edit();
	echo '<br>'.$test1;
?>