<?php
/**
	继承扩展 extends
*/
	class Persons{
		protected $name;
		protected $age;
		protected $sex;

		function __construct($name='zhangsan', $age=19, $sex='男'){
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
		}

		function say(){
			echo "我的名字是：{$this->name}，我的性别是：{$this->sex}，我的年龄是：{$this->age}.<br>";
		}

		function eat(){
			echo '11111<br>';
		}

		function run(){

		}
	}
	class Student extends Persons{
		var $school;
		function __construct($name, $age, $sex, $school){
			parent::__construct($name, $age, $sex);
			$this->school = $school;
		}

		function study(){

		}
		function say(){
			// Persons::say();
			parent::say();
			echo "我的学校是 {$this->school}<br>";
		}
	}

	class Teacher extends Student{
		var $gz;
		function jiao(){
			echo "我的名字是：{$this->name}，我的性别是：{$this->sex}，我的年龄是：{$this->age}。";
		}

	}

	$s = new Student('高小明',30, '男', '南天');

	$s->say();
