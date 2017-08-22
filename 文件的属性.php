<?php
	/*
		获取文件属性	
	
	*/
	function getFile($filename){
		//文件是否存在
		if(file_exists($filename)){
			echo "这个文件存在<br>";

			//获取文件的类型
			geFileType($filename);

			if(is_dir($filename)){
				echo "这是目录<br>";
			}

			if(is_file($filename)){
				echo "这是文件<br>";
				echo "文件大小".tosize(filesize($filename))."<br>";
			}

			//获取文件权限
			if(is_readable($filename)){
				echo "文件可读<br>";
			}

			
			if(is_writable($filename)){
				echo "文件可写<br>";
			}

			if(is_executable($filename)){
				echo "文件可执行<br>";
			}
			//创建时间
			echo date("Y-m-d H:i:s", filectime($filename))."<br>";
			//访问时间
			echo date("Y-m-d H:i:s", fileatime($filename))."<br>";

			//修改时间
			echo date("Y-m-d H:i:s", filemtime($filename))."<br>";


		}else{
			echo "这个文件不存在<br>";
		}
	}
	//文件大小转换
	function tosize($size){
		$s = $size;
		$dw = "";

		if($size > pow(2, 40)){
			$s = $size/pow(2, 40);
			$dw = "TB";
		}else if($size > pow(2, 30)){
			$s = $size/pow(2, 30);
			$dw = "GB";
		}else if($size > pow(2, 20)){
			$s = $size/pow(2, 20);
			$dw = "MB";
		}else if($size > pow(2, 10)){
			$s = $size/pow(2, 10);
			$dw = "KB";
		}else{
			$s = $size;
			$dw = "types";
		}
		return $s.$dw;
	}

	//获取文件类型
	function geFileType($filename){
		//fifo,char,dir,block,link,file
		switch(filetype($filename)){
			case 'dir':
				echo "这是一个目录<br>";
				break;
			case 'char':
				echo "这是一个字符设置<br>";
				break;
			case 'block':
				echo "这是一个块设备<br>";
				break;
			case 'link':
				echo "这是一个链接<br>";
				break;
			case 'file':
				echo "这是一个文件<br>";
				break;
			default:
				echo "未知类型<br>";
		}
	}


	getFile("./日历.php");