<?php
	for ($i=0; $i < 100; $i++) { 
		if($i >= 10)
			break;
		
		echo "你好啊<br>";
	}

	echo "<hr>";
	echo "递归<br>";

	function test($i){
		echo $i."<br>";
		if($i > 0){
			return test($i-1);
		}else{
			echo "----------------<br>";
		}
		echo $i."<br>";
	}
	test(10);

	echo "<hr>";
	echo "匿名函数<br>";
	$test = function($a,$b,$c){
		return $a+$b+$c;
	};
	echo $test(1,2,4);

	echo "<hr>";
	echo "闭包函数<br>";

	function demo(){
		$a = 10;
		$b = 20;
		$one = function($str) use (&$a, &$b){
			echo $str."<br>";
			$a++;
			echo $a."<br>";
			echo $b."<br>";

		};
		// $one('hello word');
		return $one;
	}
	$var = demo();
	$var("hello word");
	$var("this is a text");

	echo "<hr>";
	echo "数组<br>";

	$arr['one'] = 1;
	$arr['two'] = 2;
	$arr['tree'] = 3;

	print_r($arr);

	echo "<hr>";
	echo "猴子选大王<br>";

	function xdw($m, $n){
		$arr = [];
		$a = 'a';

		for($i=0;$i<$m;$i++){
			$arr[] = $a++;
		}

		$i = 0;
		while(count($arr) > 1){
			if($i%$n == 0){
				unset($arr[$i]);
			}else{
				$arr[] = $arr[$i];
				unset($arr[$i]);
			}
			$i++;
		}
		return $arr;
	}

	print_r(xdw(30, 3));


	echo "<hr>";
	echo "二维数组的声明与应用<br>";

	$arr = [
		['name'=> 'zs', 'age'=>20, 'sex'=>'男', 'email'=> 'aaa@bbb.com'],
		['name'=> 'ls', 'age'=>21, 'sex'=>'男', 'email'=> 'bbb@bbb.com'],
		['name'=> 'ws', 'age'=>22, 'sex'=>'女', 'email'=> 'ccc@bbb.com'],
	];

	print_r($arr);

	echo "<hr>";
	echo "数组的遍历<br><br><br>";
	echo "1.使用for循环遍历数组<br>";
	echo "2.使用foreach循环遍历数组<br>";
	echo "2.使用list(),each()循环遍历数组<br><br><br>";

	echo "for遍历数组<br>";
	$arr = ["aa", "bb", "cc", "dd", "ee", "ff", "hh"];
	$num = count($arr);
	for($i=0;$i<$num;$i++){
		echo $arr[$i]."<br>";
	}

	echo "<br><br>";
	echo "foreach遍历一维数组<br>";
	$arr = ["aa", "bb", "three"=>"cc", "dd", "ee", 9=>"ff", "hh"];
	foreach ($arr as $key => $value) {
		echo "--{$key}-------{$value}---<br>";
	}

	echo "foreach遍历一维数组<br>";
	$arr = [
		'name'=>'四班',
		'price'=>800,
		['name'=> 'zs', 'age'=>20, 'sex'=>'男', 'email'=> 'aaa@bbb.com'],
		['name'=> 'ls', 'age'=>21, 'sex'=>'男', 'email'=> 'bbb@bbb.com'],
		['name'=> 'ws', 'age'=>22, 'sex'=>'女', 'email'=> 'ccc@bbb.com'],
	];
	echo '<table border="1" width="800" align="center">';
	echo '<caption><h1>数组转化为表格</h1></caption>';

	foreach($arr as $key => $row){
		echo '<tr>';
		if(is_array($row)){
			foreach($row as $value){
				echo '<td>'.$value.'</td>';
			}
		}else{
			echo '<td colspan="4">'.$key.':'.$row.'</td>';
		}
		echo '</tr>';
	}

	echo '</table>';


	echo "<hr>";
	echo "使用list( )、each( )和while循环遍历数组<br>";

	$arr = ['one', 'two', 'three', 'four', 'five'];
	while($tmp = each($arr)){
		print_r($tmp);
		echo "<br>";
	}
	echo "<br><br><br>";


	reset($arr);
	while(list($key, $val) = each($arr)){
		echo $val;
		echo "<br>";
	}

	echo "<hr>";
	echo "使用数组的内部指针控制函数遍历数组<br>";
	echo "next(), prev(), end(), reset() <br>";
	
	$arr = ['one'=>'妹子', 'two'=>'峰哥', 'three'=>'你好', 'four'=>'在哪'];
	echo '当前的位置:'.key($arr).'=>'.current($arr).'<br>';
	// next($arr);
	end($arr);
	prev($arr);
	echo '当前的位置:'.key($arr).'=>'.current($arr).'<br>';

	echo "<hr>";
	echo "PHP超全局数组（预定义变量）<br>";
	echo "$_SERVER $_ENV $_GET $_POST $_FILES $_REQUEST $_COOKIE $_SESSION $_GLOBALS<br>";

	foreach($_SERVER as $key => $value){
		echo $key.'==>'.$value.'<br>';
	}

	echo "<hr>";
	echo "服务器变量$_SERVER和环境变量$_ENV<br>";

	echo '<pre>';
	print_r($_SERVER);
	echo '</pre>';

	echo '<br><br><br>';
	echo '获取客户端ip<br>';
	
	

	function getIp(){
		if(!empty($_SERVER['HTTP_CLIENT_IP'])){
			$cip = $_SERVER["HTTP_CLIENT_IP"];
		}elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
			$cip = $_SERVER["HTTP_X_FORWARDED_FOR"];
		}elseif(!empty($_SERVER['REMOTE_ADDR'])){
			$cip = $_SERVER["REMOTE_ADDR"];
		}else{
			$cip = "无法获取ip地址";
		}
		return $cip;
	}
	echo getIp();

	echo "<hr>";
	echo "PHP常用数组函数的分类<br>";


	echo "<hr>";
	echo "排序<br>";

	$arr = [21,22,13,34,25,16,37,28,9];

	function arr_sort($arr){
		if(!is_array($arr) || empty($arr))
			return  [];
		//获取数组长度
		$len = count($arr);
		//如果数组中只有一个元素，直接返回这个数组
		if($arr <= 1)
			return $arr;

		$key[0] = $arr[0];
		$left = [];
		$right = [];

		for($i=1;$i<$len;$i++){
			if($arr[$i] <= $key[0]){
				$left[] = $arr[$i];
			}else{
				$right[] = $arr[$i];
			}
		}

		$left = arr_sort($left);
		$right = arr_sort($right);
		return array_merge($left, $key, $right);

	}

	print_r($arr);
	echo '<br>';

	$narr = arr_sort($arr);
	
	print_r($narr);
	echo '<br>';

	echo "<hr>";
	echo "PHP数组的排序函数<br>";

	$arr = [3,1,49,12,22,2,4,1,9];
	print_r($arr);
	echo '<br>';
	sort($arr);
	print_r($arr);
	echo '<br>';
	echo '<br>';
	echo '<br>';

	$data = [
		['id'=>1,'name'=>'aa','age'=>10],
		['id'=>2,'name'=>'bb','age'=>30],
		['id'=>3,'name'=>'cc','age'=>20],
		['id'=>4,'name'=>'dd','age'=>40],
	];
	print_r($data);
	echo '<br>';
	$ages = [];
	foreach($data as $value){
		$ages[] = $value['age'];
	}

	array_multisort($ages, $data);

	print_r($data);
	echo '<br>';

	echo "<hr>";
	echo "PHP拆分、合并、分解与结合数组函数(array_slice, array_splice, array_combine)<br>";
	
	$arr = ['a', 'b', 'c', 'd'];

	$narr = array_slice($arr, 1);
	print_r($narr);
	echo '<br>';
	$zarr = array_slice($arr, -2, 2);
	print_r($arr);
	echo '<br>';
	echo '<br><br><br><br>';

	$zarr = array_splice($arr, -2, 2, 'hello word');
	print_r($arr);
	echo '<br><br><br><br>';

	$a = ['os', 'webserver', 'db', 'language'];
	$b = ['linux', 'nginx', 'MySQL', 'PHP'];

	$new_arr = array_combine($a, $b);

	print_r($new_arr);
	echo '<br><br>';
	echo '合并 array_merge';
	echo '<br>';

	$a = ['a', 'b', 'c'];
	$b = [10, 11, 12];

	$c = array_merge($a, $b);
	var_dump($c);
	$arr = [10,12,13,14,15];
	$brr = [1,10,15,20];

	echo '<br>交集 array_intersect';
	echo '<br>';

	$c = array_intersect($arr, $brr);
	var_dump($c);
	echo '<br>';

	echo '差集 array_diff';
	echo '<br>';

	$c = array_diff($arr, $brr);
	var_dump($c);
	echo '<br>';

	echo '<hr>';
	echo 'PHP数组与数据结构的函数(array_push,array_pop,array_unshift,)<br>';

	$arr = array();

	array_push($arr, 'ni');
	array_push($arr, 'hao');
	array_push($arr, 'a');
	array_pop($arr);
	print_r($arr);
	echo '<br><br><br>';
	$dl = [];
	array_unshift($dl, '1');
	array_unshift($dl, '2');
	array_unshift($dl, '3');
	print_r($dl);
	echo '<br>';
	array_shift($dl);
	print_r($dl);

	echo '<br><br><br>';
	echo 'PHP其他有用的数组处理函数(array_rand--随机, shuffle--打乱, array_sum--和, range--范围数组, array_fill--填充)<br>';

	$arr = ['a', 'b', 'c', 'd'];
	var_dump(array_rand($arr));
	echo '<br><br>';
	shuffle($arr);
	print_r($arr);
	echo '<br><br>';
	$result = [1,2,3,4];
	echo array_sum($result);

	echo '<br><br>';

	$arr = range(0,10);
	print_r($arr);

	echo '<br><br>';
	$arr = array_fill(0, 5, 'hello');
	print_r($arr);
