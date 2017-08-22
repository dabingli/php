<?php
/*
	属性
		性别: 男
		年龄：24
		身高：175cm
		眼睛：大
	行为
		做饭
		做家务
	
	class 类名 {
	
	}
	注意：在类的成员属性前面一定要有一个修饰词，如果不知道使用什么修饰词使用 var(关键词)，如果一旦有其他的修饰词就不要有var 

	只要是对象中的成员，就必须使用这个对象来访问到这个对象内部的属性和方法
*/
	class BoyFriend{
		//变量(成员属性)
		var $name;
		var $age;
		var $sex;
		var $height;
		var $eye;

		//函数(成员方法)
		public function doFan($rou='肉', $cai='菜'){
			return "$this->name 做饭的功能<br>";
		}

		static function doJW(){
			return '做家务的功能<br>';
		}

		function zhengQ(){
			return '挣钱的功能<br>';
		}

	}

	class BoyFriend1{
		//变量(成员属性)
		private $name;
		private $age;
		private $sex;
		private $height;
		private $eye;

		function __construct($name='李四', $sex='男', $height='174cm', $eye='big'){
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
			$this->height = $height;
			$this->eye = $eye;
		}
		//魔术方法
		function __get($name){
			return 123; 
		}
		//函数(成员方法)
		function doFan($rou='肉', $cai='菜'){
			return "$this->name 做饭-{$rou}- {$cai}-的功能<br>";
		}

		function doJW(){
			return '做家务的功能<br>';
		}

		function zhengQ(){
			return '挣钱的功能<br>';
		}

		function __destruct(){
			echo "<br> {$this->name} 再见<br>";
		}

	}
