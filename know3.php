命名空间
	1.常量
	2.函数
	3.类


	namespace 
		1.普通

			namespace myslef;
			
			function var_dump($a){
				echo $a;
			}

			var_dump(100); //100
			echo "<br>";

			\var_dump(100); //int(100)

		2.include
			boyfriend.class.php

				function one(){
					echo "11<br>";
				}
				function two(){
					echo "22<br>";
				}


			test.php
				namespace myslef;

				include "boyfriend.class.php";

				function one(){
					echo "aa<br>";
				}

				function two(){
					echo "bb<br>";
				}
				
				one(); //aa
				
				\one(); //11

		3.define
			boyfriend.class.php

				define("ROOT", "111");

			test.php
				namespace myslef;

				namespace myslef;

				include "boyfriend.class.php";

				define("myslef/ROOT", "2222");

				echo ROOT."<br>"; // 111


	namespace 来声明

		namespace myself;

		const AAA = 1;
		class Demo{
				static function one(){
					echo "11<br>";
				}

		}

		function test(){
			echo "22<br>";
		}

		test(); //22

		\myself\test();//22

	在namespace声明命名空间的代码上面，不能有任何PHP代码和HTML内容除了(declare)输出，声明命名空间只能第一条

		declare(enconding='utf-8');
		//声明一个名字空间，前缀为myself
		namespace myself;

		const AAA = 1;
		class Demo{
				static function one(){
					echo "11<br>";
				}

		}

		function test(){
			echo "22<br>";
		}

		test();

		\myself\test();