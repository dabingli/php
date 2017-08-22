<?php
/*
	单态设计模式，最适合php使用这个设计模式
	1.如果想让一个类，只能有一个对象，就要先让这个类，不能创建对象，将构造方法private
*/
	class Person{
		static $obj = null;

		private function __construct(){

		}

		static function getObj(){
			if(is_null(self::$obj))
				self::$obj = new self;
			return self::$obj;
		}

		function __destruct(){
			echo '#########<br>';
		}

		function say(){
			echo "shuohua<br>";
		}
	}

	$p = Person::getObj();
	$p = Person::getObj();
	$p = Person::getObj();
	$p = Person::getObj();
	$p = Person::getObj();
	$p = Person::getObj();
	$p = Person::getObj();
	$p->say();