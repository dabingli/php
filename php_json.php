<?php
	echo '数组串行化(json)<br>';
	$arr = ['name'=> '张三', 'age'=> 18, 'sex'=> '男'];

	//串行化
	$str = json_encode($arr);

	//反串行化
	$narr = json_decode($str);

	echo $str;

	echo '<br>';
	print_r($narr);
	$str1 = "echo 'nihao';";
	eval($str1);