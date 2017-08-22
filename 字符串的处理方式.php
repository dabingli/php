<?php
/*
	字符串的声明
	1.可以使用双引号，也可以使用单引号
	2. <<<   定界符

	分割、匹配、查找、替换
*/

	echo count("aaaaaaaaaaa").'<br>';
	echo count("").'<br>';
	echo strlen("aaaaaaaaaaa").'<br>';
	echo strlen(100).'<br>';

	echo '<hr>';
	$str = 'hello';
	echo $str[0].$str[1].'<br>';
	echo $str{0}.$str{3}.'<br>';

	echo '<hr>';
	echo ' 去除空格(trim, rtrim, ltrim)<br>';
	$str = 'hello word!';
	echo $str.'<br>';
	echo rtrim($str, '!');
	$str = '  hello word  ';
	echo $str.'------'.strlen($str).'<br>';
	echo $str.'------'.strlen(rtrim($str)).'<br>';
	echo $str.'------'.strlen(ltrim($str)).'<br>';
	echo $str.'------'.strlen(trim($str)).'<br>';
	echo '<br><br><br>';

	$str = '  hello word8671i9o  ';
	echo $str.'----'.strlen($str).'<br>';
	$nstr = trim($str, '8671i9o ');
	echo $nstr.'----'.strlen($nstr).'<br>';

	echo '<hr>';
	echo '字符串填补(str_pad)<br>';
	$str = 'lamp';
	echo $str.'----'.strlen($str).'<br>';
	$nstr = str_pad($str, 10);
	echo $nstr.'----'.strlen($nstr).'<br><br><br>';
	$nstr = str_pad($str, 10, '#');
	echo $nstr.'----'.strlen($nstr).'<br>';

	echo '<hr>';
	echo '和及大小写转换函数<br>';
	echo 'strtolower--将字符串变成小写，strtoupper--将字符串变成大写，ucfirst--将第一个字符改成大写， ucwords--将字符串每个字dingier字母改成大写<br><br>';

	$str = 'this is a test Apache MySQL PHP';
	echo $str."<br>";
	echo strtolower($str)."<br>";
	echo strtoupper($str)."<br>";
	echo ucfirst($str)."<br>";
	echo ucwords($str)."<br>";

	echo '<hr>';
	echo '字符串格式化函数(htmlspecialchars)<br>';
	$str = '<form action="" method="post">';
	$str .= 'title: <input type="text" name="title" value="" />';
	$str .= '<input type="submit" name="submit" value="提交">';
	$str .= '</form>';

	echo $str;

	echo '<hr>';
	echo '字符串比较函数strcmp(区分大小写), strcasecmp(不区分大小写)<br>';

	/*
		1.使用等好比较字符串
			注意，如果是不区分大小写的进行比较，两个比较的字符串要么都转成大写，要么转成小写
		2.字符比较
			strcmp()、strcasecmp()
		3.按自然顺序比较
			strnatcmp()
			strnatcasecmp()
	*/
		$str1 = 'abc';
		$str2 = 'abc';

		if(strtolower($str1) == strtolower($str2)){
			echo '相等<br>';
		}else{
			echo '不相等<br>';
		}

		if(strcmp($str1, $str2) == 0){
			echo '相等<br>';
		}else{
			echo '不相等<br>';
		}

		switch(strcmp($str1, $str2)){
			case 0:
				echo "第一个字符串$str1 等于 第二个字符串 $str2 <br>"; break;
			case -1:
				echo "第一个字符串$str1 小于 第二个字符串 $str2 <br>"; break;
			case 1:
				echo "第一个字符串$str1 大于 第二个字符串 $str2 <br>"; break;
		}

	echo '<hr>';
	echo '字符串面试题<br>';
	echo '1.不用PHP函数,用方法写一个反转字符串的函数<br>';

	$str = '1231';
	echo strrev($str);
	function rever_str ($str){
		$len = strlen($str);
		// if($len == 1)
		// 	return $str;
		$nstr = '';
		for($i=$len-1;$i>=0;$i--){
			$nstr .= $str[$i];
		}
		return $nstr;
	}

	echo $str;
	echo '<br>';
	echo rever_str($str);

	echo '<br><br>';
	echo '写一个函数，将一个字符串(如：1234567890)，转换成(如1,234,567,890)没3位用逗号隔开的形式<br>';

	$str = '1234567890';
	// echo number_format($str);
	function nformat($str){
		$len = strlen($str);

		$k = $len % 3;
		$nstr = '';
		for($i=0;$i<$len;$i++){
			if($i%3 == $k && $i != 0){
				$nstr .= ',';
			}

			$nstr .= $str[$i];
		}
		return $nstr;

	}
	echo $str.'<br>';

	echo nformat($str);

	echo '<br><br>';

	echo '3.请写一个获取文件扩展名的函数<br>';

	$file = '你好.txt';

	function text_name($url){
		if(strstr($url, '?')){
			//如果有问号格式的文件，将问号前的取出
			list($file) = explode('?', $url);
		}else{
			$file = $url;
		}
		
		//取出文件名
		$loc = strrpos($file, '/')+1;
		$filename = substr($file, $loc);

		//取出扩展名
		$arr = explode('.', $filename);

		return array_pop($arr);
	}

	echo text_name('http://www.baidu.com/aaa/init.inc.php?a=b&c=d').'<br>';
	echo text_name('http://www.baidu.com/aaa/init.inc.php').'<br>';
	echo text_name('/aaa/init.inc.php').'<br>';
	echo '<br><br>';
	echo '4.写出一个函数，算出两个文件相对路径<br>';
	echo '如 $a = "/a/b/c/d/e.php" $b="/a/b/12/34/c.php" <br>';
	echo '计算出$b相对与$a的相对位置 应该是 ../../c/d <br>';

	$a = "/a/b/c/d/e.php";
	$b = "/a/b/12/34/c.php";

	function abspath($a, $b){
		$path = "";
		//第一步去除公共的目录
		$a = dirname($a);
		$b = dirname($b);

		$a = trim($a, '/');
		$b = trim($b, '/');


		$a = explode('/', $a);
		$b = explode('/', $b);

		// $a = explode('/', trim(dirname($a), '/'));
		$num = max(count($a), count($b));
		for($i=0;$i<$num;$i++){
			if($a[$i] == $b[$i]){
				unset($a[$i]);
				unset($b[$i]);
			}else{
				break;
			}
		}

		//第二步，回到同级目录，进入另一个目录
		$path = str_repeat("../", count($b)).implode("/", $a);

		return $path;
	}

	echo abspath($a, $b);

	echo '<hr>';
	echo '字符串的匹配与查找之<br>';

	/*
		分割、匹配、查找、替换
		1.字符串处理函数  (处理快，但有一些处理不到)
		2.正则表达式函数  功能强大，但效率要低


		注意：如果可以直接使用字符串处理函数处理的字符串，就不要使用正则


		匹配查找
			strstr stristr  strpos strrpos stripos substr

		正则匹配查找
			preg_match() preg_match_all() preg_grep()
	*/
	echo '匹配查找 strstr stristr  strpos strrpos stripos substr <br>';
	$str = "this is a test";
	if(strstr($str, 'test')){
		echo "存在<br>";
	}else{
		echo '不存在<br>';
	}

	if(strpos($str, 'test')){
		echo "存在<br>";
	}else{
		echo '不存在<br>';
	}
	echo '<br><br>';

	echo '例子<br>';

	function getFileName($url){
		$loc = strrpos($url, "/")+1;

		return substr($url, $loc);
	}	

	echo getFileName("http://www.baidu.com/aa/demo.php")."<br>";
	echo getFileName("../images/ilog.gif")."<br>";
	echo '<br><br>';
	echo '正则匹配查找<br>';

	$str = "this 5 is 8 a 9 test";

	if(preg_match("/\d/", $str, $arr)){
		echo "存在<br>";
	}else{
		echo '不存在<br>';
	}
	echo "<br><br>";
	echo "字符串的匹配与查找之(preg_match_all与preg_grep)<br>";

	echo "<br><br>";
	echo "字符串的分割与连接(explode、implode join、preg_split)<br>";

	$str = "this is a test";
	$str1 = "this is a test.
			hello word.
			nihao,
	";
	print_r(explode(" ", $str));
	print_r(preg_split('/[.,? ]/', $str1));

	echo '<br><br><br>';
	echo '字符串的替换(str_replace)<br>';

	$num = 0;
	$str = 'http://www.baidu.com/php/aa/demo.php';
	$nstr = str_replace('php', 'java', $str, $num);
	echo $nstr.'<br>';
	echo "替换的次数为：{$num} 次<br>";
	$str = "这是一个正常的风格句子，你但是里面有一些不能显示的文字<br>";
	$nstr = str_replace(array("正常","风格","里面"), "**", $str);
	echo $str;
	echo $nstr."<br>";

	echo "<br><br><br>";
	echo "字符串的替换(preg_replace)<br>";

	$str = "在人们心目中，圣安东尼奥马刺队绝对不是一支大手笔的球队。他们很少去引进已经成名的大牌球星，更倾向于自己通过选秀来培养。而马刺的主教练波波维奇绝对是<b>活成</b>人精的老家伙，<font color='red'>追求的是简单</font>实用、物美价廉";
	$html = "/\<[\/?!]*?[^\<\>]*?\>/is";
	$newstr = preg_replace($html, "", $str);
	echo $str."<br>";
	echo $newstr."<br>";

	echo "<br><br><br>";
	echo "字符串中正则的其它函数preg_replace_callback, preg_last_error<br>";

	$text = "今天是2017-10-25,明年的2018-10-25好哈1";
	echo $text."<br>";

	$reg = "/(\d{4})(-\d{2}-\d{2})/";

	function myfun($m){
		return ($m[1]+1).$m[2];
	}
	echo preg_replace_callback($reg, 'myfun', $text)."<br>";



	echo "<hr><br><br><br>";
	$email = 'test@test.com@jb51.net'; 
	$domain = strstr($email, '@'); 
	echo "strstr 测试结果 $domain<br>"; 
	$domain = strrchr($email, '@'); 
	echo "strrchr 测试结果 $domain<br>"; 
