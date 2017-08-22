<?php
	echo "123<br>";
	$age = $people = 10;
	echo $age."<br>";
	$_age = isset($age);
	echo $_age."<br>";
	var_dump(empty($age));
	echo "<br>";
	$c = &$age;
	echo $c;
	echo "<br>";
	$a = 0;
	$b = 0;
	if($a = 3 || $b = 3){
		$a++;
		$b++;
	}
	var_dump($a);
	var_dump($b);
	echo $a."====".$b;
	echo "<br>";
	$c = 3 + 5*5;
	echo $c;
	echo "<hr>";
	$floor = 2;
	switch ($floor) {
		case '1':
			echo 'diyiceng<br>';
			break;
		case '2':
			echo "dierceng<br>";
			break;
		default:
			echo "error_log";
			break;
	}