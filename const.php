<?php
/*
	define('常量名', '值')


	const 修饰成员属性为常量，只能修饰成员属性
	类中
	1.常量建议使用大写，不能使用$
	2.常量一定要在声明时就给好初值
	3.常量的访问方式和static访问的方式相同，但只能读
*/
	class Demo{
		const SEX = '男';

		static function say(){
			echo '我的性别是：'.self::SEX.'<br>';
		}
	}

	echo Demo::SEX;
	echo '<br>';
	echo Demo::say();
