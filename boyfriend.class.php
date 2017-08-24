<?php
	class Person{
		public $name;
		public $age;
		public $sex;

		function __construct($name="", $age=0, $sex="男"){
			$this->name = $name;
			$this->age = $name;
			$this ->sex = $sex;
		}
		private function say(){
			echo "说话<br>";
		}
		function eat(){
			echo "吃饭<br>";
		} 
		function __destruct(){
			echo "再见  {$this->name} <br>";
		}
	}
	$preson = new Person('小明', 20);
	$preson->say();
	$preson->eat();