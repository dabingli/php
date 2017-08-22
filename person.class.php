<?php
	class Person{
		private $name;
		private $age;
		private $sex;

		function __construct($name='', $age=18, $sex='男'){
			$this->name = $name;
			$this->age = $age;
			$this->setSex($sex);
		}

		function __get($pro){
			echo "{$this->$pro} ###########<br>";
		}

		function __set($name, $value){
			if($name == 'age'){
				if($value < 0 || $value > 100){
					return;
				}
			}
			$this->$name = $value;
		}

		function setSex($sex){
			// if(!($sex == '男' || $sex ==  '女'))
			// 	return
			$this->sex = $sex;
		}

		function getAge(){
			if($this->age < 20){
				return $this->age;
			}else if($this->age < 30){
				return $this->age -5;
			}else if($this->age < 40){
				return $this->age - 10;
			}else{
				return 20;
			}
		}

		function say(){
			echo "我的名字是:{$this->name}, 我的年龄是：{$this->age}，我的性别是: {$this->sex}<br>";
		}

		function run(){
			$this->left();
			$this->right();
		}

		private function left(){
			echo '迈左腿<br>';
		}
		private function right(){
			echo '买右腿<br>';
		}

		function __destruct(){
			echo "{$this->name} 再见<br>";
		}
	}