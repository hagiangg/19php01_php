<?php
	include 'oop.php';
	class Student extends User {
		function addUser() {
			echo "test add Student";
		}
	}
	$testKeThua = new Student();
	echo $testKeThua->email;
	echo '<br>';
	$testKeThua->addUser();
?>