<?php
	include 'oop.php';
	class Customer extends User {
		
	}
	$customer = new Customer();
	echo $customer->email;
	echo '<br>';
	
?>