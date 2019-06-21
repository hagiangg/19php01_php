<!DOCTYPE html>
<html>
<head>
	<title>Register - Session 22</title>
	<style type="text/css">
		.error {
			color: red;
		}
		img {
			width: 150px;
		}
	</style>
</head>
<body>
	<?php

		$arrCity = array(
				'quangnam' => 'Quang Nam',
				'danang' => 'Da Nang',
				'hue' => 'Hue',
			);
		$arrGenderEn = array(
			'male' => 'Male',
			'female' => 'Female',
			'other' => 'Other',
		);
		$arrGenderVi = array(
			'male' => 'Nam',
			'female' => 'Nữ',
			'other' => 'Khác',
		);

		$errName = '';
		$errEmail = '';
		$errPhone = '';
		$errBirthday = '';
		$errCity = '';
		$errGender = '';

		$name = '';
		$email = '';
		$phone = '';
		$birthday = '';
		$gender = '';
		$city = '';

		//in ra gia tri hang doc
		//echo "<pre>";
		//var_dump($arrCity);

		$checkRegister = true;
		if (isset($_POST['register'])) {
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			$gender = isset($_POST['gender'])?$_POST['gender']:'';
			$birthday = $_POST['birthday'];
			$city = $_POST['city'];
			if ($name == '') {
				$errName = 'Please input your name';
				$checkRegister = false;
			}
			if ($email == '') {
				$errEmail = 'Please input your email';
				$checkRegister = false;
			}
			if ($phone == '') {
				$errPhone = 'Please input your phone';
				$checkRegister = false;
			}
			if ($gender == '') {
				$errGender = 'Please choose your gender';
				$checkRegister = false;
			}
			if ($city == '') {
				$errCity = 'Please choose your city';
				$checkRegister = false;
			}
			if ($birthday == '') {
				$errBirthday = 'Please choose your birthday';
				$checkRegister = false;
			}


			//in ra
			if ($checkRegister) {
				//upload avatar
				//echo "<pre>";
				//var_dump($_FILES['avatar']);
				//uniquid(): random giá trị
				if ($_FILES['avatar']['error'] == 0) {
					$avatarName = uniqid().'-'.$_FILES['avatar']['name'];
					$pathUpload = 'upload/'.$avatarName;
					move_uploaded_file($_FILES['avatar']['tmp_name'], $pathUpload);
				}
				echo "<p>English</p>";
				echo "Name: $name <br> Email: $email <br> City:";
				echo  $arrCity["$city"];
				echo " <br> Birthday: $birthday <br>Gender:";
				echo  $arrGenderEn["$gender"];
				echo "<br> Phone: $phone";

				echo "<p>Tiếng Việt</p>";
				echo "Tên: $name <br> Email: $email <br> Thành phố:";
				echo  $arrCity["$city"];
				echo " <br> Ngày sinh: $birthday <br>Gender:";
				echo  $arrGenderVi["$gender"];
				echo "<br> Số điện thoại: $phone";
			}
		}
	?>
	<h1>Register</h1>
	<form action="#" method="POST" enctype="multipart/form-data"> 
		<p>Name
			<input type="text" name="name" value="<?php echo $name ?>">
		</p>
		<p class="error"><?php echo $errName;?></p>
		<p>Avatar
			<input type="file" name="avatar" >
		</p>
		<p>Email
			<input type="text" name="email" value="<?php echo $email ?>">
		</p>
		<p class="error"><?php echo $errEmail;?></p>
		<p>Phone
			<input type="text" name="phone" value="<?php echo $phone ?>">
		</p>
		<p class="error"><?php echo $errPhone;?></p>
		<p>Gender
			<input type="radio" name="gender" value="male" <?php if($gender == 'male'){ echo "checked";} ?>>Male
			<input type="radio" name="gender" value="female" <?php if($gender == 'female'){ echo "checked";} ?>>Female
			<input type="radio" name="gender" value="other" <?php if($gender == 'other'){ echo "checked";} ?>>Other
		</p>
		<p class="error"><?php echo $errGender;?></p>
		<p>Birthday
			<input type="date" name="birthday" value="<?php echo $birthday ?>">
		</p>
		<p class="error"><?php echo $errBirthday;?></p>
		<p>City
			<select name="city">
				<option value="" <?php echo $city == ''?"selected":'';?>>Please choose city</option>
				<option value="danang" <?php echo $city == 'danang'?"selected":'';?>>Da Nang</option>
				<option value="quangnam" <?php echo $city == 'quangnam'?"selected":'';?>>Quang Name</option>
				<option value="hue" <?php echo $city == 'hue'?"selected":'';?>>Hue</option>
			</select>
		</p>
		<p class="error"><?php echo $errCity;?></p>
		<p><input type="submit" name="register" value="Register"></p>
	</form>
</body>
</html>

