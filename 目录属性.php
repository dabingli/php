<?php
	/*
		解析目录路径

		1.注意： "c:/AppServer/www" 所有的程序中，不管是什么操作系统，全部都要使用"/"代表路径分割符号(php Apache)

	*/
	echo "解析目录路径<br>";
	echo "DIRECTORY_SEPARATOR 目录分割  PATH_SEPARATHOR 分号  PHP_EOL换行<br><br><br>";
	echo "aaa".DIRECTORY_SEPARATOR."bbb".DIRECTORY_SEPARATOR."ccc<br>";
	echo "aaa".PATH_SEPARATOR."bbb".PATH_SEPARATOR."ccc<br>";
	echo "aaa".PHP_EOL;
	echo "bbb".PHP_EOL;

	echo "<br><br><br>";
	echo "路径解析basename<br>";

	echo basename("./php_array.php")."<br>";
	echo basename("http://localhost:8081/php_array.php")."<br>";
	echo basename("http://localhost:8081/php_array.php", ".php")."<br>";

	echo dirname("../../aa/bb.php", ".php")."<br>";

	/*
		遍历目录
	*/

	echo "<hr>";
	echo "glob<br>";

	foreach(glob("php-5.6.31/*.php") as $filename){
		echo $filename."<br>";
	}

	echo "<br><br>";
	echo "遍历目录  opendir closedir readdir is_dir rewinddir(返回指针) <br><br>";
	//打开目录资源
	$dir = opendir("./php-5.6.31");

	while($filename = readdir($dir)){
		$filename = "./php-5.6.31/".$filename;
		//不要操作.和..
		if($filename != "." && $filename != ".."){
			//一定要注意路径
			if(is_dir($filename)){
				echo "目录：".$filename."<br>";
			}else{
				echo "文件:".$filename."<br>";
			}
		}
	}

	rewinddir($dir);


	//关闭目录资源
	closedir($dir);

	echo "<hr>";
	echo "统计目录中的个数和大小 disk_free_space disk_total_space<br>";
	$total = disk_total_space("/home");
	$free = disk_free_space("/home");
	echo "home的 总大小:".round($total/pow(2,30))."GB<br>";
	echo "home的可用空间:".round($free/pow(2,30))."GB<br>";

	echo "<br><br><br>";


	$dirn = 0; //目录数
	$filen = 0; //文件数

	//统计一个目录下的文件和目录的个数
	function getdirnum($file){
		global $dirn;
		global $filen;

		if(is_dir($file)){
			$dir = opendir($file);

			while($filename = readdir($dir)){
				if($filename != "." && $filename != ".."){
					$filename = $file."/".$filename;

					if(is_dir($filename)){
						$dirn++;
						getdirnum($filename);  //递归，就可以查看所有子目录
					}else{
						$filen++;
					}
				}

			}

			closedir($dir);
		}else{
			return 1;
		}
	}

	$dirname = "php-5.6.31";

	getdirnum($dirname);
	echo "目录".$dirname."<br>";
	echo "目录数：".$dirn."<br>";
	echo "文件数：".$filen."<br>";


	echo "<br><br><br>";
	echo "统计一个目录的大小<br>";
	$result = 0;
	function dirsize($file){
		global $result;
		if(is_dir($file)){
			$dir = opendir($file);

			while($filename = readdir($dir)){
				if($filename != "." && $filename != ".."){
					$filename = $file."/".$filename;
					if(is_dir($filename)){
						dirsize($filename);
					}else{
						$result += filesize($filename);
					}
				}
			}	

			closedir($dir);
		}else{
			return filesize($file)/pow(2, 10)."KB";
		}
		return $result;
	}

	$res = dirsize($dirname);
	echo "目录".$dirname."大小：".round($res/pow(2, 20))."MB<br>";

	echo "<hr>";
	echo "创建(mkdir) 删除(rm) 目录<br>";

