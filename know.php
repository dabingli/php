一、回调函数--usrot($arr, "mycom")
	在使用一个函数的时候，如果传一个变量，不能解决多大的问题，就需要传一个过程进入到函数中，改变函数的行为。
	在函数的调用时，在参数中传的不是一个变量或一个值，而是一个函数，就是回调函数。

	1.普通的写法
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
	usort($arr, "mycom");
	print_r($arr);

	2.call_user_func_array()

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

	3.class类的写法


	class Test{
		function one($i){
			//回文数
			if($i == strrev($i))
				return true;
			else
				return false;
		}
		static function two($i){
			if(preg_match('/3/', $i))
				return true;
			else
				return false;
		}
	}

	function demo1($num, $n){
		for($i=0; $i<$num; $i++){
			if(call_user_func_array($n, array($i))){
				continue;
			}
			echo $i."<br>";
		}
	}
	//$test = new Test();
	//$test->one();
	//Test::two();
	demo1(100, array("new Test()", "one"));
	demo2(100, array("Test", "two"))

二、什么是回文数
	字符串正读和反读一样
	1.函数写回文数
	$arr == strrev($arr) ? 回文数 : 不是回文数

	2.自写函数
	function palindromicNumber($min, $max){
		for($i=$min; $i<$max; $i++){
			$len = strlen($i); 		//获取数字长度
			$k = intval($len/2) + 1; //获取中间位数
			$flag = 1; //标记
			for($j=0; $j<$k; $j++){
				if(substr($i, $j, 1) != substr($i, $len-$j-1, 1)){//从数字两边到中间一个一个进行比对，然后左边向右边移动一位，右边向左边移动一位，直到中间的一位或者两位，如果出现不相等，则不是回文书，将$flag设为0,跳出
					$flag = 0;
					break;
				}
			}
			if($flag == 1){//根据$flag的值判断是否为回文数，是则输出
				echo $i."是回文数<br>";
			}
		}
	}
	palindromicNumber(1, 500);

三、系统函数

	1.系统函数区分文件和目录

	$dirname = "../php";
	function fordir($dirname){
		//打开目录资源
		$dir = opendir($dirname);

		while($file = readdir($dir)){
			if($file != '.' && $file != '..'){
				$file = $dirname."/".$file;
				if(is_dir($file)){
					echo "目录:{$file}<br>";
				}else{
					echo "文件:{$file}<br>";
				}
			}
		}

		//关闭
		closedir($dir);
	}
	fordir($dirname);

	2.递归函数
		自己在满足某种特定情况下调用自己

		$dirname = "../php";
		function fordir($dirname){
			//打开目录资源
			$dir = opendir($dirname);

			while($file = readdir($dir)){
				if($file != '.' && $file != '..'){
					$file = $dirname."/".$file;
					if(is_dir($file)){
						echo "目录:{$file}<br>";
						fordir($file);
					}else{
						echo "文件:{$file}<br>";
					}
				}
			}

			//关闭
			closedir($dir);
		}
		fordir($dirname);

	3.加载自定义函数库(include include_once require reqiorie_once)区别
		1）加载失败的处理方式不同
			include()会产生警告，而require()则导致一个致命错误(出现错误，脚本停止执行)
			require():如果不存在，会报出一个fatal error.脚本停止执行
			include():如果文件不存在，会给一个warning，但脚本会继续执行
			这里特别要注意的是:使用include()文件不存在时，脚本继续执行，这种情况只出现在php4.3.5之前
		2）php性能
			对include()来说，在include()执行时文件每次都要进行读取和评估
			而对于require_once()来说，文件只处理一次(实际上，文件内容替换了require)
		3) 二种方式提供不同的使用弹性。

		require 的使用方法如 require("./inc.php"); 。通常放在 PHP 程式的最前面，PHP 程式在执行前，就会先读入 require 所指定引入的档案，使它变成 PHP 程式网页的一部份。

		include 使用方法如 include("./inc/.php"); 。一般是放在流程控制的处理区段中。PHP 程式网页在读到 include 的档案时，才将它读进来。这种方式，可以把程式执行时的流程简单化。

	四、匿名函数
		匿名函数也叫闭包函数，允许临时创建一个没有指定名称的函数。经常作用回调函数参数的值。

		注意：匿名函数结尾一定要加 ; 结束

		$var = function($a, $b, $c){
			echo $a+$b+$c;
		};

		$var(1, 2, 3);

		var_dump($var); 	//object(Closure)
	五、闭包函数
		php闭包实现主要是靠匿名函数
		将匿名函数在普通函数中当作参数传入，也可以被返回。这就实现了一个简单的闭包

		通俗的说：子函数可以使用父函数中的局部变量，这种行为就叫闭包

		闭包的两个特点
			1.作为一个函数变量的引用，当函数返回时，其处于激活状态
			2.一个闭包就是当一个函数返回时，一个没有释放资源的栈区。

			其实闭包亮点可以合成一点，就是闭包函数返回时，该函数内部变量处于激活状态，函数在栈区仍然保留。
		

		链接闭包和外界变量的关键字: USE
			闭包可以保存所在代码块上下文的一些变量和值。php在默认情况下，匿名函数不能调用所在代码块的上下文变量，而需要通过使用use关键字

		1)函数1
		function demo(){
			$a = 10;
			$b = 20;
			$var = function($str) use($a, $b) {
				echo $str."<br>";
				echo $a."<br>";
				echo $b."<br>";
			};
			$var("hello word");
		}

		demo();

		2）函数2
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
		$one("aaaaaaaaaa");
		$one("333333");

		闭包函数的特点
			1）闭包外层是个函数
			2）闭包内部都有函数
			3）闭包会return内部函数
			4）闭包返回的函数内部不能有return(因为这样就真的结束了)
			5）执行闭包后，闭包内部变量会存在而闭包内部函数的内部变量不会存在。
	六、 PHP超全局数组
		$_SERVER $_GET $_POST $_SESSION $_FILES $_ERQUIRE $_ENV $_COOKIE $GLOBALS
		$_SERVER 		//服务器变量
		$_ENV 			//环境变量

	七、获取IP
		function getIp(){
			if(!empty($_SERVER['HTTP_CLIENT_IP'])){
				return $_SERVER['HTTP_CLIENT_IP'];
			}else if(!empyt($_SERVER['HTTP_X_FORWARDED_FOR'])){
				return $_SERVER['HTTP_X_FORWARDED_FOR'];
			}else if(!empty($_SERVER['REMOTE_ADDR'])){
				return $_SERVER['REMOTE_ADDR'];
			}else{
				return '未知IP';
			}
		}
		getIp();
	八、PHP常用数组函数的分类
		数组的键/值操作函数
			array_values 返回数组中的值

				$arr=["os"=>linux, "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP"]
				array_values($arr);   //[linux, Apache, MySQL, PHP]

				应用
					list($os, $webserver, $db, $language) = array_values($arr);
					echo $os."<br>";
					echo $webserver."<br>";


			array_keys  返回数组的下标

				$arr=["os"=>linux, "webserver"=>"Apache", "webse"=>"apache", "db"=>"MySQL", "language"=>"PHP"]
				array_keys($arr);   //[os, webserver, db, language]

				array_keys($arr, "Apache") 	//webserver, webse
				array_keys($arr, "Apache", true) 	//webserver

		统计数组元素的个数与唯一性
		使用回调函数处理数组的函数
		数组的排序函数
		拆分、合并、分解与结合
		数组与数据结构
		其他游泳的数组处理函数