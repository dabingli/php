面向对象
	面向对象优势
		1.可读性 2.可重用性 3.稳定性 4.维护性 5.可测试性 6.可扩展性

	对象的两个主要特征
		1.对象的行为： 可以对对象施加那些操作：比如电视机的开关换频道
		2.对象的状态： 当施加那些方法时，对象如何相应 如电视机的外形、尺寸、颜色等

	如何抽象一个类
		1.类的声明
			简单格式
				[修饰符]class类名{//使用class关键字加空格后加上类名
					[成员属性]  //也叫成员便变量
					[成员方法]  //也叫成员函数
				}
			完整格式
				[修饰符]class类名[extends 父类][implements接口1[,接口2...]]{
					[成员属性]  //也叫成员便变量
					[成员方法]  //也叫成员函数
				}
		2.成员属性
			注意成员属性前面必须要有修饰词 (var/public/static/protected) 如果不知道使用什么修饰词，就可以使用var(关键字)，如果一旦有其它的修饰词就不要用var

			格式
				修饰符$变量名[=默认值]; //如：public $name = "zhangsan";

			注意： 成员属性不可以是带运算符的表达式、变量、方法或函数调用。

				错误格式
					public $var3 = 1+2;
					public $var4 = self::myStaticMethod();
					public $var5 = $myVar;
				正确格式
					public $var6 = 100; //普通数值(4个标量：整数、浮点数、布尔、字串)
					public $var7 = myConstant; //常量
					public $var8 = self::classContstat; //静态常量
					public $var9 = array(true, false)  //数组
			常用属性修饰符： public protected private static var(过时)

		3.成员方法

			成员方法格式

				[修饰符]function 方法名(参数...){
					[方法体]
					[return 返回值]
				}
			
			修饰符： public protected private static abstract final

			声明的成员方法必须和对象相关，不能是一些没意义的操作
				//下面声明了几个人的成员方法，通常将成员方法声明放在成员属性的下面
				public function say(){//人可以说话的方法
					echo "人在说话"; //方法体
				}
				pulic function fun(){//人可以走路的方法
					echo "人在走路"; //方法体
				}

	实例化对象
		$变量名 = new 类名();

	特殊引用$this
		只要是对象中的成员，就必须使用这个对象来访问到这个对象内部的属性和方法。
		
			class BoyFriend{
				//变量(成员属性)
				var $name = "gaoming";
				var $aga = 24;
				var $sex = "男";

				//函数(成员方法)
				function doFan(){
					return "{$this->name} 做饭的功能<br>";
				}

			}

			$bf1 = new BoyFriend();
			echo $bf1 -> doFan(); // gaoming 做饭的功能

	构造方法
		1.是对象创建完成以后，第一个自动调用的方法
		2.方法名称比较特殊  可以和类名相同的方法名

			class BoyFriend {
				public $name;
				function BoyFriend(){
					echo "#######<br>";
				}
			}

			$bf1 = new BoyFriend();  // ######

		3.给对象中的成员赋初值使用的

			class BoyFriend {
				public $name;
				public $age;
				public $sex;
				function BoyFriend($name, $age, $sex="男"){
					$this->name = $name;
					$this->age = $age;
					$this->sex = $sex;
					$this->dofan();
				}
				function dofan(){
					echo $this->name."年龄".$this->age."性别是".$this->sex;
				}
			}

			$bf1 = new BoyFriend("xiaoming", 18, "男");//xiaoming年龄18性别是男

			魔术方法__contruct();
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

				$bf1 = new BoyFriend("xiaoming", 18, "男");//xiaoming年龄18性别是男
	
	析构方法  __destruct()
		对象销毁之前最后调用的方法

