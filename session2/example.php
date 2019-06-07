<!DOCTYPE html>
<html>
<head>
	<title>Form example - Session 2</title>
</head>
<body>
	<?php 
	// echo $_GET['name'];
	 //echo "<br>";
	 //echo $_GET['password'];

	//isset: kiem tra bien co dc thiet lap hay khong
	//validate bang JS hay HTML5 thi goi la validate client
	//validate bang PHP thi goi la validate serve
	$errName = $errPass = '';
	if (isset($_REQUEST['register'])) {
		if ($_REQUEST['name'] == '') {
			$errName = 'Please input your name';
		} else {
			$errName = '';
		}
		if ($_REQUEST['password'] == '') {
			$errPass = 'Please input your password';
		} else {
			$errPass = '';
		}

		echo $_REQUEST['name'];
		echo "<br>";
		echo $_REQUEST['password'];
	}
	?>
	<h1>Register form</h1>
	<form action="#" name="Register" method="POST">
	<!-- <form action="#" name="Register" method="GET"> -->
	<!-- <form action="register.php" name="Register" method="POST">	 -->
		<p>Name: 
			<input type="text" name="name">
			<p class="error"><?php echo $errName; ?> </p>
		</p>
		<p>Password: 
			<input type="password" name="password">
			<p class="error"><?php echo $errPass; ?> </p>
		</p>
		<p><input type="submit" name="register" value="Register"></p>
	</form>
</body>
</html>

