<?php
	echo phpinfo();
	if(extension_loaded('gd')){
		echo "可以使用gd<br>";
	}else{
		echo "不可以是是GD<br>";
	}