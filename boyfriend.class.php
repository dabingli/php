<?php
	/*
		属性
			性别：男
			年龄：25
			身高：175cm
			眼睛：大

		行为
			做饭
			做家务

		class 类名 {
		

		}
	*/
	class BoyFriend {
		public $name;
		public $age;
		public $sex;
		function __construct($name, $age, $sex="男"){
			$this->name = $name;
			$this->age = $age;
			$this->sex = $sex;
			$this->dofan();
		}
		function dofan(){
			echo $this->name."年龄".$this->age."性别是".$this->sex;
		}
	}

	$bf1 = new BoyFriend("xiaoming", 18, "男");
