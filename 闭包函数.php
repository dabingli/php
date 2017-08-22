<?php
/*
$a = 500;
	function one(){
		$a = 100;

		echo "111111111<br>";
		function two(){
			global $a;
			echo "222222 {$a} 222222<br>";
		}
		function three(){
			echo "33333333333333<br>";
		}

			$test = 123;
function abc(){
    global $test;
    echo "222222 {$test} 222222<br>";
}
		two();
		three();
		abc();
	}


	one();
*/
	function demo(){
		$a = 10;
		$b = 20;
		$var = function($str) use(&$a, &$b) {
			echo $str."<br>";
			$a++;
			echo $a."<br>";
			echo $b."<br>";
		};
		// $var("hello word");
		// echo "-----{$a}------";
		return $var;
	}

	$one = demo();
	$one("hello word");

