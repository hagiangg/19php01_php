<?php
	$server = 'localhost'; //$server = '127.0.0.1'
	$username = 'root'; //username default
	$password = ''; //password default
	$database = '19php01_demo1'; //ket noi den database nay

	//thuc hien ket noi 
	$connect = mysqli_connect($server, $username, $password, $database);
	//var_dump($connect);

	//kiem tra ket noi database
	if ($connect === FALSE) {
		echo "Connect Fail".mysqli_connect_error();
	}
	//  else {
	// 	echo "connect success!";
	// }

	//du lieu chen vao user
	$name = 'yen';
	$email = 'yen@gmail.com';
	$phone = '098765432';
	$avatar = 'p.jpg';
	$city = 'quangnam';
	$gender = 'female';
	

	//cau lenh insert du lieu
	$sql = "INSERT INTO user (name,email,phone,avatar,city,gender) VALUES ('$name', '$email', '$phone', 'avatar', '$city', '$gender')" ;
	//echo $sql;

	//thuc hien cau lenh
	if (mysqli_query($connect, $sql) === TRUE) {
		echo "Register success";
	} else {
		echo "Register fail";
	}

?>