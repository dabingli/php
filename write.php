<?php
	include "serialization.php";
	//对象
	$p = new Person('张三', 10, '男');
	//将对象串行话
	$str = serialize($p);
	//将字符串保存在文件夹obj
	file_put_contents("objstr.txt", $str);

	echo '对象转完字符串，保存到文件中成功';
