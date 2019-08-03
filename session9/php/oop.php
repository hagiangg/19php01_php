<?php
	class User {
		public $name;
		public $email = 'asd@gmail.com';
		function addUser() {
			echo "Add user";
		}
		function editUser($old) {
			echo $this->email;
		}
	}
	$user = new User();
	$user->addUser();
	echo '<br>';
	echo $user->email;
	echo '<br>';
	$test = $user->editUser('25');
	echo $test;
	echo '<br>';
	$test2 = $user->editUser();
	echo $test2;
?>