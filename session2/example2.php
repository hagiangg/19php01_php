<!DOCTYPE html>
<html>
<head>
	<title>Form Register</title>
</head>
<body>
	<?php 
		$errName = $errEmail = $errPhone = $errGender = $errAddress = $errBirth = '';
		if (isset($_POST['register'])) {
			if ($_POST['name'] == '') {
				$errName = 'Please input your name';
			} else {
				$errName = '';
			}
			if ($_POST['email'] == '') {
				$errEmail = 'Please input your email';
			} else {
				$errEmail = '';
			}
			if ($_POST['phone'] == '') {
				$errPhone = 'Please input your phone';
			} else {
				$errPhone = '';
			}
			if (empty($_POST["gender"])) {
			    $errGender = "Please select your gender";
			  } else {
			    $errGender = "";
			  }

			if ($_POST['address'] == '') {
				$errAddress = 'Please input your address';
			} else {
				$errAddress = '';
			}
			if ($_POST['birthday'] == '') {
				$errBirth = 'Please input your birthday';
			} else {
				$errBirth = '';
			}
			function test_input($data) {
			    $data = stripslashes($data);
			    $data = htmlspecialchars($data);
			    return $data;
			}
	
			echo $_POST['name'];
			echo "<br>";
			echo $_POST['email'];
			echo "<br>";
			echo $_POST['phone'];
			echo "<br>";
			echo $_POST['gender'];
			echo "<br>";
			echo $_POST['address'];
			echo "<br>";
			echo $_POST['birthday'];
		}
	?>
	<h1>Form Register</h1>
	<form action="#" name="register" method="POST">
		<p>Name: 
			<input type="text" name="name" value="<?php if(isset($_POST['name'])) {echo $_POST['name']; }?>">
			<p class="error"><?php echo $errName; ?> </p>
		</p>
		<p>Email: 
			<input type="text" name="email" value="<?php if(isset($_POST['email'])) {echo $_POST['email']; }?>">
			<p class="error"><?php echo $errEmail; ?> </p>
		</p>
		<p>Phone number: 
			<input type="text" name="phone" value="<?php if(isset($_POST['phone'])) {echo $_POST['phone']; }?>">
			<p class="error"><?php echo $errPhone; ?> </p>
		</p>
		<p>Gender: 
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="Male"> Male
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="Female"> Female
			<input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?> value="Other"> Other
			<p class="error"><?php echo $errGender; ?> </p>
		</p>
		<p>Address: 
			<input type="text" name="address" value="<?php if(isset($_POST['address'])) {echo $_POST['address']; }?>">
			<p class="error"><?php echo $errAddress; ?> </p>
		</p>
		<p>Birthday: 
			<input type="date" name="birthday" value="<?php if(isset($_POST['birthday'])) {echo $_POST['birthday']; }?>">
			<p class="error"><?php echo $errBirth; ?> </p>
		</p>

		<p><input type="submit" name="register" value="Register"></p>
	</form>
	
</body>
</html>