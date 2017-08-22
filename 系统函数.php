<?php
	/*
		
	*/
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