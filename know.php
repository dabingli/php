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

	1.系统函数区分文件和目录opendir readdir is_dir closedir

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

					//如果键值是关联数组的则重新排序
					$arr = [0=>"linux", 5=>"php","linux","php", "mysql"];
					print_r($arr); //Array ( [0] => linux [5] => php [6] => linux [7] => php [8] => mysql ) 
					echo "<br>";
					print_r(array_values($arr)); //Array ( [0] => linux [1] => php [2] => linux [3] => php [4] => mysql )


			array_keys  返回数组的下标

				$arr=["os"=>linux, "webserver"=>"Apache", "webse"=>"apache", "db"=>"MySQL", "language"=>"PHP"]
				array_keys($arr);   //[os, webserver, db, language]

				array_keys($arr, "Apache") 	//webserver, webse
				array_keys($arr, "Apache", true) 	//webserver

			in_array  检查数组中是否存在某个值

				$arr=["os"=>linux, "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP"]
				if(in_array('linux', $arr)){
					echo "在数组中";
				}else{
					echo "不再数组中";
				}

				in_array('linux', $arr，true) 		//类型是否相等
				in_array(array("a", "b"), $arr)
			
			array_search 在数组中搜索给定的值，如果成功则返回相应的键名
				
				$arr=["os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP"];
				echo array_search("linux", $arr); // os

			array_key_exists 函数检查某个数组中是否存在指定的键名，如果键名存在则返回 true，如果键名不存在则返回 false

				$arr=["os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP", "home"=>null];
				if(array_key_exists('os', $arr)){echo "在数组中";}else{echo "不再数组中";}		//在数组中
				if(array_key_exists('home', $arr)){echo "在数组中";}else{echo "不再数组中";}		//在数组中

			isset() 判断村不存在 ---空值判断不了

				$arr=["os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP", "home"=>null];
				if(isset("os")){echo "存在"}else{echo "不存在"} 	//存在
				if(isset("home")){echo "存在"}else{echo "不存在"} 	//不存在

			array_flip  交换数组中的键和值

				$arr=["os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP"];
				print_r($arr); // Array ( [os] => linux [webserver] => Apache [db] => MySQL [language] => PHP ) 
				print_r(array_flip($arr));//Array ( [linux] => os [Apache] => webserver [MySQL] => db [PHP] => language )

			array_reverse  反转
				$arr=["os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "language"=>"PHP"];
				print_r(array_reverse($arr));//Array ( [language] => PHP [db] => MySQL [webserver] => Apache [os] => linux )

				$arr=["linux", "Apache", "MySQL", "PHP"];
				print_r(array_reverse($arr));//Array ( [0] => PHP [1] => MySQL [2] => Apache [3] => linux )
				print_r(array_reverse($arr, true));//Array ( [3] => PHP [2] => MySQL [1] => Apache [0] => linux )

		统计数组元素的个数与唯一性

			count 计算数组的个数

				$str="123asdf";
				echo count($str);	//1
				
				$str="";
				echo count($str);	//1

				$arr=["linux", "Apache", "MySQL", "PHP"];
				echo count($arr);	//4

				统计二位数组
				$web = array(
					"lamp"=>array("os"=>"linux", "webserver"=>"Apache", "db"=>"MySQL", "langue"=>"PHP"),
					"javaEE"=>array("os"=>"Unix", "webserver"=>"Fomcat", "db"=>"Oracle", "langue"=>"JSP")
				);
				echo count($web); //2
				echo count($web, 1) //10
			
			array_count_values 统计数组中值出现的次数
				
				$lamp = array("os"=>"linux","linux","linux", "webserver"=>"Apache","Apache", "db"=>"MySQL", "langue"=>"PHP");

				print_r(array_count_values($lamp));//Array ( [linux] => 3 [Apache] => 2 [MySQL] => 1 [PHP] => 1 )

			array_unique 删除数组中重复的值

				$lamp = array("os"=>"linux","linux","linux", "webserver"=>"Apache","Apache", "db"=>"MySQL", "langue"=>"PHP");

				print_r(array_unique($lamp));//Array ( [os] => linux [webserver] => Apache [db] => MySQL [langue] => PHP )

		使用回调函数处理数组的函数
			array_filter  过滤数组
				$arr = array(1,2,3,4,false,5,6,"",7,null,8,9,-1,-2,-3,-4,0);

				print_r($arr);Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => [5] => 5 [6] => 6 [7] => [8] => 7 [9] => [10] => 8 [11] => 9 [12] => -1 [13] => -2 [14] => -3 [15] => -4 [16] => 0 ) 

				print_r(array_filter($arr));//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [5] => 5 [6] => 6 [8] => 7 [10] => 8 [11] => 9 [12] => -1 [13] => -2 [14] => -3 [15] => -4 )

				function myfun($value){
					if($value>=0)
						return true;
					else
						return false;
				}

				print_r(array_filter($arr, "myfun"));//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => [5] => 5 [6] => 6 [7] => [8] => 7 [9] => [10] => 8 [11] => 9 [16] => 0 )

				print_r(array_filter($arr, function($value){
					return !($value%2 == 0);		//去掉2的倍数
				}));//Array ( [0] => 1 [2] => 3 [5] => 5 [8] => 7 [11] => 9 [12] => -1 [14] => -3 )

				print_r(array_values(array_filter($arr, function($value){ //键值重新排序
					return !($value%2 == 0);		//去掉2的倍数
				}))); //Array ( [0] => 1 [1] => 3 [2] => 5 [3] => 7 [4] => 9 [5] => -1 [6] => -3 )

			array_walk 对数组中的每个成员应用用户函数

				$arr = array(1,2,3,4,5);
				function myfun(&$value){
					return $value = $value*$value;
				}
				print_r($arr);//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 ) 
				echo "<br>";
				array_walk($arr, "myfun");
				print_r($arr);//Array ( [0] => 1 [1] => 4 [2] => 9 [3] => 16 [4] => 25 )

				获取下标

					$arr = array("one"=>1,"two"=>2,"three"=>3,"four"=>4,"five"=>5);
					print_r($arr);
					echo "<br>";
					array_walk($arr, function(&$value, $key){
						$value = $key.$value;
					});
					print_r($arr); //Array ( [one] => one1 [two] => two2 [three] => three3 [four] => four4 [five] => five5 )
						
					-----

					$arr = array("one"=>1,"two"=>2,"three"=>3,"four"=>4,"five"=>5);
					print_r($arr);
					echo "<br>";
					array_walk($arr, function(&$value, $key, $str){
						$value = $str.$key.$value;
					}, "####");
					print_r($arr); //Array ( [one] => ####one1 [two] => ####two2 [three] => ####three3 [four] => ####four4 [five] => ####five5 )
			
			array_map  将回调函数作用到给定数组的单元上(第一个是函数)
				单数组
					$arr = array(1,2,3,4,5);
					print_r($arr);//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 ) 
					echo "<br>";

					function myfun($value){
						return $value*$value*$value;
					}

					$rarr = array_map("myfun", $arr);

					print_r($rarr);//Array ( [0] => 1 [1] => 8 [2] => 27 [3] => 64 [4] => 125 )
				多数组
					$arr = array(1,2,3,4,5);
					$brr = array("one", "two", "three", "four", "five");
					print_r($arr);//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 [4] => 5 ) 
					echo "<br>";

					function myfun($value, $bvalue){
						return $value.$bvalue;
					}

					$rarr = array_map("myfun", $arr, $brr);

					print_r($rarr);//Array ( [0] => 1one [1] => 2two [2] => 3three [3] => 4four [4] => 5five )

				为空
					$arr = array(1,2,3,4,5);
					$brr = array("one", "two", "three", "four", "five");

					$rarr = array_map(null, $arr, $brr);

					print_r($rarr);

					返回为
						Array
						(
						    [0] => Array
						        (
						            [0] => 1
						            [1] => one
						        )

						    [1] => Array
						        (
						            [0] => 2
						            [1] => two
						        )

						    [2] => Array
						        (
						            [0] => 3
						            [1] => three
						        )

						    [3] => Array
						        (
						            [0] => 4
						            [1] => four
						        )

						    [4] => Array
						        (
						            [0] => 5
						            [1] => five
						        )

						)
			

		数组的排序函数

			冒泡排序for循环
				1.排序
					$arr = array(0,1,2,3,4,5,6,7,8,9);
					for($i=0;$i<count($arr)-1;$i++){
						for($j=0;$j<count($arr)-1;$j++){
							if($arr[$j]<$arr[$j+1]){
								$tmp = $arr[$j];
								$arr[$j] = $arr[$j+1];
								$arr[$j+1] = $tmp;
							}
						}
						print_r($arr);
						echo "<br>";
					}
				2.优化 将count($arr)提取出来
					$arr = array(0,1,2,3,4,5,6,7,8,9);
					$len = count($arr);
					for($i=0;$i<$len-1;$i++){
						for($j=0;$j<$len-1;$j++){
							if($arr[$j]<$arr[$j+1]){
								$tmp = $arr[$j];
								$arr[$j] = $arr[$j+1];
								$arr[$j+1] = $tmp;
							}
						}
						print_r($arr);
						echo "<br>";
					}
				3.让循环递减
					$arr = array(0,1,2,3,4,5,6,7,8,9);
					$len = count($arr);
					for($i=0;$i<$len-1;$i++){
						for($j=0;$j<$len-$i-1;$j++){
							if($arr[$j]<$arr[$j+1]){
								$tmp = $arr[$j];
								$arr[$j] = $arr[$j+1];
								$arr[$j+1] = $tmp;
							}
							echo $arr[$j]."&nbsp;";
						}
						echo "<br>";
						print_r($arr);
						echo "<br>";
					}
				4.函数封装
					$arr = array(0,1,2,3,4,5,6,7,8,9);
					function mysort($arr){
						$len = count($arr);
						for($i=0;$i<$len-1;$i++){
							for($j=0;$j<$len-$i-1;$j++){
								if($arr[$j]<$arr[$j+1]){
									$tmp = $arr[$j];
									$arr[$j] = $arr[$j+1];
									$arr[$j+1] = $tmp;
								}
							}
						}
						return $arr;
					}

					print_r($arr); //Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 [7] => 7 [8] => 8 [9] => 9 ) 
					echo "<br>";
					print_r(mysort($arr));//Array ( [0] => 9 [1] => 8 [2] => 7 [3] => 6 [4] => 5 [5] => 4 [6] => 3 [7] => 2 [8] => 1 [9] => 0 )
				5.最终版mysort(&$arr)
					$arr = array(0,1,2,3,4,5,6,7,8,9);
					function mysort(&$arr){
						$len = count($arr);
						for($i=0;$i<$len-1;$i++){
							for($j=0;$j<$len-$i-1;$j++){
								if($arr[$j]<$arr[$j+1]){
									$tmp = $arr[$j];
									$arr[$j] = $arr[$j+1];
									$arr[$j+1] = $tmp;
								}
							}
						}
					}

					print_r($arr);//Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 [7] => 7 [8] => 8 [9] => 9 ) 
					echo "<br>";
					
					mysort($arr);
					print_r($arr);//Array ( [0] => 9 [1] => 8 [2] => 7 [3] => 6 [4] => 5 [5] => 4 [6] => 3 [7] => 2 [8] => 1 [9] => 0 )
			二分排序
				$arr = array(20,18,33,17,44,13,22,25,11,34,19,66);

				function qsort($arr){
					if(!is_array($arr) || empty($arr))
						return array();
					//获取数组的长度
					$len = count($arr);
					//如果数组中只有一个元素，直接返回这个数组
					if($len<=1)
						return $arr;

					$key[0] = $arr[0];
					
					$left = array();
					$right = array();

					for($i=1; $i<$len; $i++){
						if($arr[$i] <= $key[0]){
							$left[] = $arr[$i];
						}else{
							$right[] = $arr[$i];
						}
					}

					$left = qsort($left);
					$right = qsort($right);

					return array_merge($left, $key, $right);

				}


				print_r($arr);//Array ( [0] => 20 [1] => 18 [2] => 33 [3] => 17 [4] => 44 [5] => 13 [6] => 22 [7] => 25 [8] => 11 [9] => 34 [10] => 19 [11] => 66 ) 
				echo "<br>";
				print_r(qsort($arr));//Array ( [0] => 11 [1] => 13 [2] => 17 [3] => 18 [4] => 19 [5] => 20 [6] => 22 [7] => 25 [8] => 33 [9] => 34 [10] => 44 [11] => 66 )

			

			sort 对数组排序(升序)
				1.数字排序

					$arr = array(20,18,33,17,44,13,22,25,11,34,19,66);

					print_r($arr); //Array ( [0] => 20 [1] => 18 [2] => 33 [3] => 17 [4] => 44 [5] => 13 [6] => 22 [7] => 25 [8] => 11 [9] => 34 [10] => 19 [11] => 66 ) 
					echo "<br>";

					sort($arr);
					print_r($arr);//Array ( [0] => 11 [1] => 13 [2] => 17 [3] => 18 [4] => 19 [5] => 20 [6] => 22 [7] => 25 [8] => 33 [9] => 34 [10] => 44 [11] => 66 )

				2.字母顺序排序
					$arr = array("one", "two", "three", "four", "five");

					print_r($arr);//Array ( [0] => one [1] => two [2] => three [3] => four [4] => five ) 
					echo "<br>";
					sort($arr);
					print_r($arr);//Array ( [0] => five [1] => four [2] => one [3] => three [4] => two )	

				补充
					$arr = array("a", "10", "b", 20);

					sort($arr);
					print_r($arr);//Array ( [0] => 10 [1] => a [2] => b [3] => 20 )

			rsort 对数组逆向排序(降序)
				1.数字顺序
					$arr = array(20,18,33,17,44,13,22,25,11,34,19,66);

					print_r($arr); //Array ( [0] => 20 [1] => 18 [2] => 33 [3] => 17 [4] => 44 [5] => 13 [6] => 22 [7] => 25 [8] => 11 [9] => 34 [10] => 19 [11] => 66 ) 
					echo "<br>";

					rsort($arr);
					print_r($arr);//Array ( [0] => 66 [1] => 44 [2] => 34 [3] => 33 [4] => 25 [5] => 22 [6] => 20 [7] => 19 [8] => 18 [9] => 17 [10] => 13 [11] => 11 )
				
				2.字母顺序排序
					$arr = array("one", "two", "three", "four", "five");

					print_r($arr);//Array ( [0] => one [1] => two [2] => three [3] => four [4] => five ) 
					echo "<br>";
					rsort($arr);
					print_r($arr);//Array ( [0] => two [1] => three [2] => one [3] => four [4] => five )

			ksort 对数组的键值进行排序
				1.数字
					$lamp = array(1=>"linux", 10=>"apache", 9=>"mysql", 6=>"php");

					print_r($lamp);//Array ( [1] => linux [10] => apache [9] => mysql [6] => php ) 
					echo '<br>';

					ksort($lamp);
					print_r($lamp);//Array ( [1] => linux [6] => php [9] => mysql [10] => apache )

				2.字母
					$lamp = array("p"=>"linux", "a"=>"apache", "d"=>"mysql", "l"=>"php");

					print_r($lamp);//Array ( [p] => linux [a] => apache [d] => mysql [l] => php ) 
					echo '<br>';

					ksort($lamp);
					print_r($lamp);//Array ( [a] => apache [d] => mysql [l] => php [p] => linux )

			krsort 对数组的键值进行逆向排序
				1.数字
					$lamp = array(1=>"linux", 10=>"apache", 9=>"mysql", 6=>"php");

					print_r($lamp);//Array ( [1] => linux [10] => apache [9] => mysql [6] => php ) 
					echo '<br>';

					ksort($lamp);
					print_r($lamp);//Array ( [10] => apache [9] => mysql [6] => php [1] => linux )

				2.字母
					$lamp = array("p"=>"linux", "a"=>"apache", "d"=>"mysql", "l"=>"php");

					print_r($lamp);//Array ( [p] => linux [a] => apache [d] => mysql [l] => php ) 
					echo '<br>';

					ksort($lamp);
					print_r($lamp);//Array ( [p] => linux [l] => php [d] => mysql [a] => apache )

			asort 对数组进行排序并保留索引
				
				$lamp = array("p"=>"linux", "a"=>"apache", "d"=>"mysql", "l"=>"php");

				print_r($lamp);//Array ( [p] => linux [a] => apache [d] => mysql [l] => php ) 
				echo '<br>';

				asort($lamp);
				print_r($lamp);//Array ( [a] => apache [p] => linux [d] => mysql [l] => php ) 
				echo '<br>';

				sort($lamp);
				print_r($lamp);//Array ( [0] => apache [1] => linux [2] => mysql [3] => php )

			arsort 对数组进行降序并保留索引
				
				$lamp = array("p"=>"linux", "a"=>"apache", "d"=>"mysql", "l"=>"php");

				print_r($lamp);//Array ( [p] => linux [a] => apache [d] => mysql [l] => php ) 
				echo '<br>';

				arsort($lamp);
				print_r($lamp);//Array ( [l] => php [d] => mysql [p] => linux [a] => apache ) 
				echo '<br>';

				rsort($lamp);
				print_r($lamp);//Array ( [0] => php [1] => mysql [2] => linux [3] => apache )

			array_multisort 对多个数组或多维数组进行排序

				$arr = array("a", 10, "b", 20);
				$brr = array(1, 4, 3, 2);

				array_multisort($arr, $brr);

				print_r($arr);//Array ( [0] => a [1] => b [2] => 10 [3] => 20 ) 
				echo '<br>';
				print_r($brr);//Array ( [0] => 1 [1] => 3 [2] => 2 [3] => 4 )

				常量 SORT_DESC --降序  SORT_ASC --升序

					SORT_DESC

						$arr = array("a", 10, "b", 20);
						$brr = array(1, 4, 3, 2);

						array_multisort($arr,SORT_DESC, $brr);

						print_r($arr);//Array ( [0] => 20 [1] => 10 [2] => b [3] => a ) 
						echo '<br>';
						print_r($brr);//Array ( [0] => 2 [1] => 4 [2] => 3 [3] => 1 )

					SORT_DESC与SORT_ASC一起用
						$arr = array("a", 10, "b", 10);
						$brr = array(1, 4, 3, 2);

						array_multisort($arr,SORT_DESC, $brr, SORT_DESC);

						print_r($arr);//Array ( [0] => 10 [1] => 10 [2] => b [3] => a ) 
						echo '<br>';
						print_r($brr);//Array ( [0] => 4 [1] => 2 [2] => 3 [3] => 1 ) 
						echo '<br>';

						array_multisort($arr,SORT_DESC, $brr, SORT_ASC);
						print_r($arr);//Array ( [0] => 10 [1] => 10 [2] => b [3] => a ) 
						echo '<br>';
						print_r($brr);//Array ( [0] => 2 [1] => 4 [2] => 3 [3] => 1 )

					多维数组排序
						按年龄排序
							$data = array(
								array("id"=>1, "name"=>"aa", "age"=>10),
								array("id"=>2, "name"=>"ww", "age"=>20),
								array("id"=>3, "name"=>"cc", "age"=>20),
								array("id"=>4, "name"=>"dd", "age"=>40)
							);

							$age = array();
							foreach($data as $value){
								$age[] = $value["age"];
							}

							print_r($age);//Array ( [0] => 10 [1] => 20 [2] => 20 [3] => 40 )

							array_multisort($age, $data);
							echo '<pre>';
							print_r($data);//
							echo '</pre>';
										Array
										(
										    [0] => Array
										        (
										            [id] => 1
										            [name] => aa
										            [age] => 10
										        )

										    [1] => Array
										        (
										            [id] => 2
										            [name] => ww
										            [age] => 20
										        )

										    [2] => Array
										        (
										            [id] => 3
										            [name] => cc
										            [age] => 20
										        )

										    [3] => Array
										        (
										            [id] => 4
										            [name] => dd
										            [age] => 40
										        )

										)
						年龄排序有重复的在按姓名排序
							$data = array(
								array("id"=>1, "name"=>"aa", "age"=>10),
								array("id"=>2, "name"=>"ww", "age"=>20),
								array("id"=>3, "name"=>"cc", "age"=>20),
								array("id"=>4, "name"=>"dd", "age"=>40)
							);

							$age = array();
							$names = array();
							foreach($data as $value){
								$age[] = $value["age"];
								$names[] = $value['name'];
							}

							print_r($age);//Array ( [0] => 10 [1] => 20 [2] => 20 [3] => 40 ) 
							echo '<br>';
							print_r($names);//Array ( [0] => aa [1] => ww [2] => cc [3] => dd )

							array_multisort($age, $names, $data);
							echo '<pre>';
							print_r($data);
							echo '</pre>';
										Array
										(
										    [0] => Array
										        (
										            [id] => 1
										            [name] => aa
										            [age] => 10
										        )

										    [1] => Array
										        (
										            [id] => 3
										            [name] => cc
										            [age] => 20
										        )

										    [2] => Array
										        (
										            [id] => 2
										            [name] => ww
										            [age] => 20
										        )

										    [3] => Array
										        (
										            [id] => 4
										            [name] => dd
										            [age] => 40
										        )

										)
							按名字导序
								$data = array(
									array("id"=>1, "name"=>"aa", "age"=>10),
									array("id"=>2, "name"=>"ww", "age"=>20),
									array("id"=>3, "name"=>"cc", "age"=>20),
									array("id"=>4, "name"=>"dd", "age"=>40)
								);

								$age = array();
								$names = array();
								foreach($data as $value){
									$age[] = $value["age"];
									$names[] = $value['name'];
								}

								print_r($age);
								echo '<br>';
								print_r($names);

								array_multisort($age, SORT_DESC, $names, SORT_DESC, $data);
								echo '<pre>';
								print_r($data);
								echo '</pre>';
										Array
										(
										    [0] => Array
										        (
										            [id] => 4
										            [name] => dd
										            [age] => 40
										        )

										    [1] => Array
										        (
										            [id] => 2
										            [name] => ww
										            [age] => 20
										        )

										    [2] => Array
										        (
										            [id] => 3
										            [name] => cc
										            [age] => 20
										        )

										    [3] => Array
										        (
										            [id] => 1
										            [name] => aa
										            [age] => 10
										        )

										)
		拆分、合并、分解与结合
				array_slice  	从数组中取出一段
					$arr = array("a", "b", "c", "d", "e");

					print_r($arr);//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e ) 
					echo '<br>';
					
					$narr = array_slice($arr, 2);
					print_r($narr);//Array ( [0] => c [1] => d [2] => e )

					echo '<br>';
					$narr = array_slice($arr, 2, 4);
					print_r($narr);//Array ( [0] => c [1] => d )
					$narr = array_slice($arr, 2, 4, true);
					print_r($narr);//Array ( [2] => c [3] => d [4] => e )

				array_splice 将数组一部分去掉或代替
					$arr = array("a", "b", "c", "d", "e");

					print_r($arr);//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e ) 
					echo '<br>';

					array_splice($arr, 2);
					print_r($arr);//Array ( [0] => a [1] => b )

					代替
						1.字符串
							$arr = array("a", "b", "c", "d", "e");

							print_r($arr);//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e ) 
							echo '<br>';

							array_splice($arr, 2, 2, "hello");
							print_r($arr);//Array ( [0] => a [1] => b [2] => hello [3] => e )

						2.数组
							$arr = array("a", "b", "c", "d", "e");

							print_r($arr);//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e ) 
							echo '<br>';

							array_splice($arr, 2, 2, array("hello", "word", "this"));
							print_r($arr);//Array ( [0] => a [1] => b [2] => hello [3] => word [4] => this [5] => e )
			array_combine  创建一个数组，用一个数组的值为其键名，另一个数组作为其值
				$a = array('os', 'webserver', 'db', 'langue');
				$b = array('Linux', "Apache", "MySQL", "PHP"); 

				$arr = array_combine($a, $b);
				print_r($arr); //Array ( [os] => Linux [webserver] => Apache [db] => MySQL [langue] => PHP )


			+号合并数组 
				//下标相同的会覆盖，是前面覆盖后面的
				$a = array("a", "b", "c");
				$b = array(10, 11, 12);

				$c = $a + $b;

				print_r($c);//Array ( [0] => a [1] => b [2] => c )

			array_merge  合并一个或多个数组
				索引数组
					$a = array("a", "b", "c");
					$b = array(10, 11, 12);

					$c = array_merge($a, $b);

					print_r($c);//Array ( [0] => a [1] => b [2] => c [3] => 10 [4] => 11 [5] => 12 )

					下标相同的索引数组
						$a = array("a", 5=>"b", "c");
						$b = array(10, 5=>11, 12);

						$c = array_merge($a, $b);

						print_r($c);//Array ( [0] => a [1] => b [2] => c [3] => 10 [4] => 11 [5] => 12 )
					
					下标相同的关联数组
						$a = array("a", "abc"=>"b", "c");
						$b = array(10, "abc"=>11, 12);

						$c = array_merge($a, $b);

						print_r($c);//Array ( [0] => a [abc] => 11 [1] => c [2] => 10 [3] => 12 )

					一个数字从新索引和 array_values 相同
						$a = array("a", 5=>"b", "c");

						$c = array_merge($a);
						$d = array_values($a);

						print_r($c);// Array ( [0] => a [1] => b [2] => c )
						print_r($d);// Array ( [0] => a [1] => b [2] => c )

			array_intersect 计算数组的交集
				$a = array(10,11,12,13,14);
				$b = array(5,6,12,15,14);

				$c = array_intersect($a, $b);
				print_r($c);//Array ( [2] => 12 [4] => 14 )

					数组开头去掉相同的
						$a = array(5,6,10,11,12,13,14);
						$b = array(5,6,12,15,14);

						//$count = (count($a) >= count($b)) ? count($b) : count($a);
						$count = min(count($a), count($b));

						$narr = array();
						for($i=0; $i<$count; $i++){
							if($a[$i] == $b[$i]){
								$narr[] = $a[$i];
							}else{
								break;
							}
						}

						print_r($narr);//Array ( [0] => 5 [1] => 6 )

			array_diff 计算差集
				$a = array(5,6,10,11,12,13,14);
				$b = array(5,6,12,15,14);

				$narr = array_diff($a, $b);
				print_r($narr);//Array ( [2] => 10 [3] => 11 [5] => 13 )
		数组与数据结构
			array_push  追加数组
				$arr = array();
				array_push($arr,"1", 4, 5, 6);

				print_r($arr);//Array ( [0] => 1 [1] => 4 [2] => 5 [3] => 6 )

			array_pop 弹出
				$arr = array();
				array_push($arr,"1", 4, 5, 6);

				print_r($arr);//Array ( [0] => 1 [1] => 4 [2] => 5 [3] => 6 ) 
				echo '<br>';
				echo array_pop($arr);//6
				echo '<br>';
				print_r($arr);//Array ( [0] => 1 [1] => 4 [2] => 5 )

			array_unshift  在数组前追加
				$arr = array(1,2,3,4);
				array_unshift($arr, 5,8,9);

				print_r($arr);//Array ( [0] => 5 [1] => 8 [2] => 9 [3] => 1 [4] => 2 [5] => 3 [6] => 4 )

			array_shift  前面弹出
				$arr = array(1,2,3,4);
				print_r($arr);//Array ( [0] => 1 [1] => 2 [2] => 3 [3] => 4 ) 
				echo '<br>';
				echo array_shift($arr);//1
				echo '<br>';
				print_r($arr);//Array ( [0] => 2 [1] => 3 [2] => 4 )
		其他有用的数组处理函数

			array_rand 随机从数组中取出一个或多个单元
				$arr = array("a", "b", "c", "d");

				var_dump(array_rand($arr));//随机下标如int(2)
				
				var_dump(array_rand($arr, 3));//array(3) { [0]=> int(1) [1]=> int(2) [2]=> int(3) }

				面试题
					以下代码的执行后是，$result值为:

					<?php 
						$srcArray = array('a','b','c','d');
						$randValue=array_rand($srcArray);
						$result=is_string($randValue);
					?>
					A: a  B: false  C: ture b  D: b   E: c

		  shuffle 打乱数组

		  	$arr = array("a", "b", "c", "d");
		  	shuffle($arr);
		  	print_r($arr);//随机 如：Array ( [0] => c [1] => a [2] => d [3] => b )
	    
	    array_sum  求出数组和
        字符串
	      	$arr = array("a", "b", "c", "d");
	        $b = array_sum($arr);

	        echo $b; //0
        数字

          $arr = array(1, 2, 3, 4);
          $b = array_sum($arr);

          echo $b;//10

      range  包含指令范围
	      1.数字
	        $arr = range(0, 10);
	        $barr = range(0, 10, 3);

	        print_r($arr);//Array ( [0] => 0 [1] => 1 [2] => 2 [3] => 3 [4] => 4 [5] => 5 [6] => 6 [7] => 7 [8] => 8 [9] => 9 [10] => 10 )
	        print_r($brr);//Array ( [0] => 0 [1] => 3 [2] => 6 [3] => 9 )
        2.字符

          $arr = range("a", "f");

          print_r($arr);//Array ( [0] => a [1] => b [2] => c [3] => d [4] => e [5] => f )

      array_fill   填充

        $arr = array_fill(0, 10, "hello php");

        print_r($barr);//Array ( [0] => hello php [1] => hello php [2] => hello php [3] => hello php [4] => hello php )


					
