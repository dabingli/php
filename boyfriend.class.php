<?php
	class Person{
		private $name;

		function __construct($name, $age){
			$this->name = $name;
		}

		function __isset($proname){
			echo "$proname  #########<br>";
		}

	}
	$preson = new Person('小明', 20);

