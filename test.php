<?php
	// include "boyfriend.class.php";
	
	interface USB{
		const WIDTH = 12;
		const HEIGHT = 3;

		//加载
		function load();
		//运行
		function run();
		//停止
		function stop();
	}

	class Cumputer {
		function useUSB(USB $usb){
			$usb->load();
			$usb->run();
			$usb->stop();
		}
	}

	class Mouse implements USB{
		function load(){
			echo "加载鼠标成功<br>";
		}
		function run(){
			echo "运行鼠标功能<br>";
		}
		function stop(){
			echo "鼠标工作结束<br>";
		}
	}

	class KeyPress implements USB{
		function load(){
			echo "加载键盘成功<br>";
		}
		function run(){
			echo "运行键盘成功<br>";
		}
		function stop(){
			echo "停止键盘工作<br>";
		}
	}

	class Worker{
		function work(){
			$c = new Cumputer;

			$m = new Mouse;

			$k = new KeyPress;

			$c->useUSB($m);
			$c->useUSB($k);

		}
	}

	$w = new Worker();
	$w->work();
