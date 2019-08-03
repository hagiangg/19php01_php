<?php
	include 'user.php';
	class Customer extends User {
		public $addressCus;
		public $code;
		function payment() {
			echo "Payment";
		}
		function history() {
			echo "The history of buying";
		}
	}
	$testKeThua = new Customer();
	echo $testKeThua->edit();
	echo '<br>';
	$testKeThua->view();
?>