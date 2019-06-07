<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
	<?php 
		$errA = $errB = '';
		if (isset($_POST['sum'])) {
			if ($_POST['numberA'] == '') {
				$errA = 'Please input a';
			} else {
				$errA = '';
			}
			if ($_POST['numberB'] == '') {
				$errB = 'Please input b';
			} else {
				$errB = '';
			}

			$a = $_POST['numberA'];
			echo "<br/>";
			$b = $_POST['numberB'];
			echo "<br/>";
			function Calculate($a, $b){
				if(is_numeric($a) && is_numeric($b)){
					$c = $a + $b;
					return $c;
			} else {
				echo "Please enter number!";
				}
			}
			echo calculate($_POST['numberA'],$_POST['numberB']);
		
		}	

	?>
	<form action="#" name="sum" method="POST">
		<p>Number a:
			<input type="text" name="numberA" value="<?php if(isset($_POST['numberA'])) {echo $_POST['numberA']; }?>"">
			<p class="error"><?php echo $errA; ?></p>
		</p>
		<p>Number b:
			<input type="text" name="numberB" value="<?php if(isset($_POST['numberB'])) {echo $_POST['numberB']; }?>"">
			<p class="error"><?php echo $errB; ?></p>
		</p>
		<p> 
			<input type="submit" name="sum" value="Sum" >
		</p>
	</form>
</body>
</html>