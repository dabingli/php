<?php
	/*

	*/

	interface USB{
		const WIDTH = 12;
		const HEIGHT = 3;

		function load();
		function run();
		function stop();
	}

	class Cumputer {
		function useUSB(USB $usb){
			$usb -> load();
			$usb -> run();
			$usb -> stop();
		}
	}

	class Mouse implements USB{
		function load(){
			echo '加载鼠标成功<br>';
		}

		function run(){
			echo '运行鼠标功能<br>';
		}

		function stop(){
			echo '鼠标工作结束<br>';
		}

	}

	class Worker {
		function work(){
			$c = new Cumputer();

			$m = new Mouse();

			$c->useUSB($m);
		}
	}

	$w = new Worker;

	$w->work();