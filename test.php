<?php
	// include "boyfriend.class.php";
	class Person{
		public $name;
		public static $country = "China";
		function __construct($name = "zhangsan"){
			$this->name = $name;
		}
		function say(){
			echo "我叫 {$this->name} , 我的国家 ".self::$country;
		}
	}

	$per = new Person();
	$per->say();

	
