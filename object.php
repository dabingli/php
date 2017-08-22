<?php
	include "boyfriend.class.php";
	include "person.class.php";


	$bf1 = new BoyFriend();
	$bf1->name = 'lisi';

	$bf2 = new BoyFriend();
	$bf2->name = 'zhangsan';
	
	echo $bf1 -> sex.'<br>';
	echo $bf2 -> height.'<br>';
	echo $bf1 -> name.'<br>';
	echo $bf2 -> name.'<br>';

	echo '<br><br>';

	echo $bf1->doFan('niu','yang');
	echo '<hr>';
	echo ' 特殊的对象引用 $this ';

	$th = new BoyFriend();
	$th2 = new BoyFriend();
	$th -> name = '张三';
	$th2 -> name = '李四';

	echo '<hr>';
	echo '以下的用BoyFriend2对象<br>';
	echo '__construct(构造函数),__destruct(析构函数)<br>';

	$xg = new BoyFriend1('张三');
	$xg1 = new BoyFriend1('李四');

	echo $xg1->doFan();

	$xg = null;
	$xg1 = null;

	echo '<hr>';
	echo '魔术方法__get(),__set()<br>';

	$per = new Person('里斯', 40, '男');
	$per->name;
	$per->age;
	$per->sex;

	$per->name = "王";
	$per->age = 33;
	$per->sex = '女';

	$per = null;

	echo '<hr>';
	echo ' PHP常见的关键字  instanceof(用于检测当前对象实例是否属于某个类的)   final(可以修饰类;可以修饰方法)  static(修饰属性和方法)<br>';
	$p = new Person('里斯1', 40, '男');

	if($p instanceof Person){
		echo "属于Person对象<br>";
	}else{
		echo "不属于这个类<br>";
	}

	$p = null;