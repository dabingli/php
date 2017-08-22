<?php
	/*
		数组的键/值操作函数
	*/
	echo "数组的键/值操作函数<br>array_values()<br>";
	$arr = ["one"=>1, "two"=>2, "three"=>3, "four"=>4, "five"=>5, "six"=>6];
	print_r($arr);
	echo "<br>";
	print_r(array_values($arr));