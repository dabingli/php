<?php
/*
	回调函数:callback(即call then back 被主函数调用运算后返回主函数)，是指通过函数参数传提到其他代码的，某一块可执行代码的引用
	通俗的解释就是把函数作为参数进入另个函数中使用。

	在使用一个函数的时候，如果传一个变量，不能解决多大的问题，就需要传一个过程进入到函数中，改变函数的行为。

	在函数的调用时，在参数中传的不是一个变量或一个值，而是一个函数，就是回调函数。
*/

	$arr = array(1,5,8,9,3,2,6,7);

	function mycom($a, $b){
		if($a > $b)
			return 1;
		else if($a < $b)
			return -1;
		else
			return 0;
	}

	print_r($arr);
	echo "<br>";
	usort($arr, "mycom");
	print_r($arr);

	echo "<hr>";
	echo "制作回调函数<br>";

	// function demo($num, $n){
	// 	for($i=0; $i<$num; $i++){
	// 		if($i%$n == 0){
	// 			continue;
	// 		}
	// 		echo $i."<br>";
	// 	}
	// }
	// demo(100, 3);
	function demo($num, $n){
		for($i=0; $i<$num; $i++){
			if($n($i)){
				continue;
			}
			echo $i."<br>";
		}
	}

	function test($i){
		//包含5的倍数去掉
		// if($i%5 == 0)
		// 	return true;
		// else
		// 	return false;

		//回文数
		if($i == strrev($i))
			return true;
		else
			return false;
	}

	demo(50, "test");

	echo "<hr>";
	echo "回调函数(call_user_func_array)<br>";
	// function fun($one="1", $two="2", $three="3"){
	// 	echo "$one------$two-----------$three<br>";
	// }
	// call_user_func_array("fun", array(11, 22, 33, 44, 55));

	function demo1($num, $n){
		for($i=0; $i<$num; $i++){
			if(call_user_func_array($n, array($i))){
				continue;
			}
			echo $i."<br>";
		}
	}

	function test1($i){
		//回文数
		if($i == strrev($i))
			return true;
		else
			return false;
	}

	demo1(500, "test1");


