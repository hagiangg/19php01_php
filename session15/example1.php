<?php
	$t = 1;
	for ($i = 1; $i <= 4; $i ++) {
		for ($j = $i; $j > 0; $j --) {
			echo $t ." ";
			$t ++;
		}
		echo "<br>";
	}
?>