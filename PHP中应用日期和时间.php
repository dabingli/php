<?php
	/*
		时间戳
		1.是一个整数
		2.1970-01-01 到当前的秒数
		2017-07-26 11, 11, 11
		02/14/2017 11:11:11
	*/

	$t = time()-24*60*60*7;
	echo date("y-m-d H:i:s", $t)."<br>";
	echo date("y-m-d")."<br>";
	echo date("Y-m-d H:i:s")."<br>";

	echo "<hr>";
	echo "mktime <br>";
	$y = 1988;
	$m = 2;
	$d = 7;
	$t = mktime(0, 0, 0, $m, $d, $y);

	$dtime = time();

	echo floor(($dtime - $t) /60/60/24);

	echo "<br><br>";
	echo "strtotime<br>";
	$a = "2017-11-12 11:11:11";
	$b = "2017-12-12";

	echo strtotime($a)."<br>";
	echo floor((strtotime($b) - strtotime($a))/(60*60*24))."<br>";

	echo "<br>";
	echo "microtime<br>";

	$start = microtime(true);
	for($i=0; $i < 1000; $i++){

	}
	$end = microtime(true);

	$result = $end - $start;

	echo $result;