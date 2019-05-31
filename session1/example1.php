<?php
	
	echo "<br>";
	for ($edge = 1; $edge <= 10; $edge ++) {
		for ($e = 1; $e <= $edge; $e ++) {
			echo "* ";
		}
		echo "<br>";
	}
	echo "<br>";
	for ($edge = 1; $edge <= 10; $edge ++) {
		for ($c = 1; $c <= 10 - $edge + 1 ; $c ++) {
			echo "&nbsp";
		}
		for ($s = 2; $s <= $edge +1; $s ++) {
			echo "* ";
		}
		
		echo "<br>";
	}

	echo "<br>";
	echo "<p class='excercise'>1. Cần có tổng 1.000.000 đồng từ 3 loại tiền 10.000 đồng, 20.000 đồng, 50.000 đồng. Lập chương trình để tìm ra tất cả các phương án có thể</p>";
	$count = 0;
		for( $i = 1; $i <= 100; $i++){
			for ($j = 1; $j <= 50 ; $j++){
				 for ($z=1; $z <= 20; $z++) { 
					if(($i*10000+$j*20000+$z*50000)==1000000){
						echo "Case ". $count. ":   "."(". $i.")". "    10.000VND   "."(". $j.")   "." 20.000VND "."(". $z. ")"."  50.000VND";
						$count++;
						echo "<br/>";
				}
			}
		}
	}
	echo "The sum of case:  ";
	echo $count;

	echo "</p>";


	echo "<br>";
	echo "<p> Bạn A gửi ngân hàng 20 triệu đồng, lãi suất 0.6%/tháng. Hỏi sau 3 năm, bạn A nhận được cả gốc lẫn lãi là bao nhiêu?";
	$s1 = 20000000;
	for ($i = 1; $i <= 3*12; $i ++) {
		$s1 = $s1 + $s1 * (0.6/100);
	}
	echo "<br> The sum: ";
	echo number_format($s1, 2);
	echo "</p>";

	echo "<br>";
	echo "<p> Bạn B gửi ngân hàng 150 triệu đồng. Lãi suất 0.7%/tháng. Cứ 3 tháng bạn B rút 3 triệu đồng, 3 tháng sau rút hơn 3 tháng trước 1 triệu đồng. Hỏi sau 3 năm, bạn B còn lại cả gốc lẫn lãi la bao nhiêu?";
	$s2 = 150000000;
	$r = 3000000;
	for ($i = 1; $i <= 3*4; $i ++) {
		$s2 = $s2 * pow(1 + (0.7/100), 3);
		$s2 = $s2 - $r;
		$r = $r + 1000000;
	}
	echo "<br>The sum: ";
	echo number_format($s2, 2);
	echo "</p>";
?>