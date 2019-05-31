<link rel="stylesheet" type="text/css" href="example.css">

<?php
	echo "<h1>Hello World!</h1>";
?>
<p>Hi man</p>
<?php 
	$userName = "admin";
	echo $userName;
	//document.write(userName);
	/*
	document.write(userName);
	*/
	$x = 7;
	$y = 8;
	echo "<br>";
	echo $x + $y;
	echo "<br>";
	echo $x - $y;
	echo "<br>";
	echo $x * $y;
	echo "<br>";
	echo $x / $y;

	/*
		* sum Number function
		* Description Summary 2 number
		* created by
		* created 2019-05-25
	*/
	function sumNumber($a, $b) {
		return $a + $b;
	}

	echo "</br>";
	echo sumNumber(22, 54);

	echo "<br>";
	$i = 5;
	if ($i % 2) {
		echo "i la so le";
	} else {
		echo $i . "la so chan";
	}

	echo "<br>";
	for ($i = 1; $i <= 10; $i ++) {
		echo $i; 
		echo "<br>";
	}
	echo "<br>";
	$n = 5;
	while ($n < 10) {
		echo $n;
		$n ++;
		echo "<br>";
	}

	echo "<br>";
	$m = 5;
	do {
		echo $m;
		$m++;
		echo "<br>";
	} while ($m < 10);

	/*
		*Hien thi cac so trong khoang 200-250 ma chia het cho 3
		*Ve ban co vua bang cong lap for
	*/

	echo "<br>";
	for ($i = 200; $i <= 250; $i++) {
		if ($i % 3 == 0) {
			echo $i . "<br>";
		}
	}

	echo "<br>Ban co vua";
	for ($row = 1; $row <= 8; $row ++) {
		echo "<br>";
		echo "<div class = 'line'>";
		for ($col = 1; $col <= 8; $col ++) {
			$total = $row + $col;
			if ($total % 2 == 0) {
				echo "<div class = 'black'></div>";
			} else {
				echo "<div class = 'red'></div>";
			}
		}
		echo "</div>";
	}

	echo "<br>";
	for ($edge = 1; $edge <= 10; $edge ++) {
		for ($e = 1; $e <= $edge; $e ++) {
			echo "* ";
		}
		echo "<br>";
	}
	echo "<br>";
	for ($edge = 1; $edge <= 10; $edge ++) {
		for ($c = 2; $c <= 10 - $edge + 1 ; $c ++) {
			echo " ";
		}
		for ($s = $edge; $s <= 10; $s ++) {
			echo "* ";
		}
		
		echo "<br>";
	}
?>
