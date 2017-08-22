<?php
	$text = "在我老家的庭院里有一http://www.google.com棵苹果树，长得粗壮、高大，结的果实叫“花皮子”苹果，苹果皮上花花点点的点缀着一块红、一块白的，大概因此而得名吧。这花皮子苹果长得个大、好看，可吃起来皮硬、味酸，在我儿时的记忆中留下了很深的印象，可不http://www.lamp.com知为什么，我把老家庭院里的树几乎写了个遍，却没有写过http://www.baidu.com那棵花皮子苹果树。今天忽又想起了它，觉得不写写它感情上有点过不去，因它http://www.sogou.com与我有缘，还有些不为人知的感情故事。";
	$str = "/http\:\/\/www(.*?)(org|com|net)/i";
	/*
		1.正则表达式，就是一个匹配的模式
		2.正则表达式本身，就是一个字符串(中有一些语法规则，特殊字符)

		正则表达式这个字符串，一定要在对应的函数中使用(分割的函数，替换的函数)
	*/

	echo '<hr>';
	echo ' 正则表达式语法介绍<br>';
	/*
		定界符号：多种都可以，常用 //
		原子：最少的一个匹配单位 (放在定界符中)，在一个正则表达式中，至少要有一个原子
		元字符：元字符不能单独使用的，修饰原子，是用来扩展原子功能的和限定功能 (写在定界符号中)

		模式修正符号：修正，对模式(正则)修正，(写在定界符号外面，写在右边)
	*/
	$str = 'aaaaa952aaaa5aaaaaaaa777aaaa3aaaaaa';
	$reg = "/\d/i";

	echo $str.'<br>';

	echo preg_replace($reg, "#", $str).'<br>';

	print_r(preg_split($reg, $str));

	echo '<br>';

	if(preg_match_all($reg, $str, $arr)){
		echo "正则表达式<b>{$reg}</b>和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
	}else{
		echo "没有匹配上<br>";
	}

	echo '<hr>';
	echo '正则表达式中的原子<br>';
	/*
		原子：
			1.打印字符(a-z A-Z 0-9 !@#$%^&*()) 和非打印字符

			\ 转义字符
			1) 可以将有意义的字符转义成没有意的字符(将有意义变成原子)
			2) 可以将没有意义的字符转成有意义的原子
			3) 所有没有有意义的字符，加上转义也没有意义的， \@可加可不加

			非打印字符
				\cx       匹配有x指明的控制字符。如\cM匹配一个Control-M或回车符。x的值必须为A~Z或a~z之一
				\f        匹配一个换页符。等价于 \x0c或 \cL
				\n        匹配一个换行符。等价于 \x0a或 \cJ
				\r 		  匹配一个回车符。等价于 \x0d或 \cM
				\t        匹配一个制表符。等价于 \x09或 \cI
				\v        匹配一个垂直制表符。等价于 \x0b 或 \cK

			2.所有的数字，所有的字，所有的空白，所有的字母，所有特殊符号
				\d   	  代表所有数字
				\D        代表非数字
				
				\w        代表任意一个字  a-z A-Z 0-9 _
				\W  	  代表任意一个非字 除了(a-z A-Z 0-9 _) 之外的所有字符

				\s  	  代表空白
				\S   	  代表非空白

			3.自定义原子表

				
	*/
	$str = 'this ^ is a test';
	$reg = "/\^/";

	if(preg_match_all($reg, $str, $arr)){
		echo "正则表达式<b>{$reg}</b>和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
	}else{
		echo "没有匹配上<br>";
	}

	echo '<hr>';
	echo '正则表达式中的元字符<br>';
	/*
		元字符：不能在正则表达式中单独使用，用来修饰原子的

		*  		匹配0次、1次或多次其前的原子 {0,}
		+ 		修改其前面的原子可以出现一次或多次，不能没有，至少要出现1次 {1,}
		?   	修饰其前面的原子可以出现0次或1次	{0,1}
		{m} 	{3}修饰前面的原子只能出现m次(多一次和少一次都不行)	
		{n, m} 	{2,5}修饰前面的原子出现的个数在n和m之间，包括n和m
		{n,} 	{2,}修饰前面的原子可以出现至少n次
		|  		是或的关系表示它两边的原子，只要有一个出现就可以，但是， | 优先级是最低的
		^或 \A  表示必须以什么开始，这个必须写在正则表达式最前面
		$或 \Z  表示必须以什么结束，必须写在正则表达式最后面
		\b 		单词边界
		\B 		不是单词边界的部分
		() 		第一个作用，改变优先级;第二个作用，将小原子变成大原子;第三个作用，子模式整个表达式是一个大的模式，小括号中是每个独立子模式;第四个作用，反向引用
	*/

	$str = 'this gogle is a test';
	$reg = "/go?gle/";
	if(preg_match($reg, $str, $arr)){
		echo "正则<b>{$reg}</b>,和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
	}else{
		echo "匹配失败<br>";
	}

	echo '<hr>';
	echo '模式修正符<br>';
	/*
		模式修正符号(单个字符)
		1.模式修正符号要写在定界符号外，放在右边 "/go*gle/i"
		2.模式修正符号，一个字符是一个功能，可以组合使用 "/go*gle/ieu"

		作用:
			模式修正符号可以修正正则表达式的解释，或扩充了正则表达式的功能

		i 		不区分大小写
		m 		视多行， 在使用 ^ 或 $ 这两个符号是，每一行都满足都可以
		s 		修正正则表达式中的 . 可以匹配换行符号
		x 		修正正则表达式，可以忽略空白符号
		U 		(.*,.+)正则表达式比较贪婪  .*? .+?
	*/ 
	$str = 'this is a te
	st';
	$str = 'this <b>is</b> a <b>WebServer</b> test';
	$reg = "/te.+st/s";
	$reg = "/web server/isx";
	if(preg_match($reg, $str, $arr)){
		echo "正则<b>{$reg}</b>,和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
	}else{
		echo "匹配失败<br>";
	}

	echo '<hr>';
	echo '如何自己编写正则表达式<br>';
	/*
		正则表达式的编写
			1.就是一种语言，开发思想放进去
			2.列需求
	*/
	$str = "
		这是http://www.lampbrother.net
		这是http://www.baidu.com
		这是https://www.lampborther.net
		这是ftp://www.baidu.com<br>
	";
	$reg = '/(https?|ftp)\:\/\/www\.(.*?)\.(net|com|cn)/';
	if(preg_match_all($reg, $str, $arr)){
		echo '<pre>';
		echo "正则<b>{$reg}</b>,和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
		echo '</pre>';
	}else{
		echo "匹配失败<br>";
	}
	echo '<hr>';
	echo '编写email正则表达式<br>';

	$str = "
		这是meizi@lampbro_ther.net
		这是mei-zi@lampbr12other.com
		这是mei*zi@lampbrother.cn
		这是mei_zi@lampbrother.org
	";

	$reg = '/\w+([*-_]\w*)*@\w+([*-_]\w*)*\.(net|com|org|cn)/i';

	if(preg_match_all($reg, $str, $arr)){
		echo '<pre>';
		echo "正则<b>{$reg}</b>,和字符串<b>{$str}</b> 匹配成功<br>";
		print_r($arr);
		echo '</pre>';
	}else{
		echo "匹配失败<br>";
	}