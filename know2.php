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

	封装
		封装性是面向对象编程中的三大特性之一，封装就是把对象中的成员属性和成员方法加上访问修饰符，使其尽可能隐藏对象的内部细节，以达到对成员的访问控制(切记不是拒绝访问)

		这是php5的新特性，但却是OOP语言的一个好的特性。而且大多数OOP语言都已支持此特性

		php5支持如下3中访问修饰符
			public (公有的 默认的)
			private(私有的)
			protected(受保护的)

		将一些"特殊的方法"，加上一个关键词 privated 修饰,  就不能拿到这个对象之后，用对象中private所有内容，但对象自己中的其他成员可以使用，因为是自己使用自己的成员

			class Person {
				function eat(){
					$this->say();
				}
				private function say(){
					echo "说话";
				}
			}
			$preson = new Person();
			$person->eat();//说话

		魔术封装
			魔术方法
				__get()
					1.自动调用，是在直接访问私有成员时自动调用
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

						if(isset($preson->name)){ 
							echo "cunzai";	
						}else{
							echo "bucunzai";
						}
							//  name #########
									bucunzai
				__set()
					1.自动调用，是在直接设置私有属性值时自动调用
						class Person{
							private $name;

							function __set($name, $value){
								echo "{$name}---{$value}<br>";
							}

						}
						$preson = new Person('小明', 20);
						$preson->name = "wangming"; //name---wangming

				__isset()
					在使用isset()判断一个私有属性是否存在时，自动调用__isset()魔术方法，参数则是属性名称
					class Person{
						public $name;

						function __construct($name, $age){
							$this->name = $name;
						}

					}
					$preson = new Person('小明', 20);
					if(isset($person->name)){ 
						echo "cunzai";	
					}else{
						echo "bucunzai";
					} // cunzai

				__unset()

		类的继承  基类(父类)  源生类(子类)

			扩展 extends

				1.子类使用extends继承父类 子类可以将父类所有内容继承过来
					
					class Person{
						function say(){
							echo "1111<br>";
						}
					}
					class Student extends Person{

					}

					$s = new Student();
					$s->say(); // 1111

				2. private 这个是私有的，只能自己用，不能别人用，包括子类用

				3.protected 这个是保护的权限，只能自己或子类用

					class Person{
						protected $name;

						function __construct($name){
							$this->name = $name;
						}
					}

					class Student extends Person{
						var $school;
						function say(){
							echo "{$this->name} 111<br>";
						}
					}

					$s = new Student("xiaoming");
					$s->say();//xiaoming 111

				4.public 这个是公开的权限，所有都可以使用

			继承中的重载(覆盖)
				在子类中可以写和父类同名的方法

					1.简单

						class Person{
							function say(){
								echo "1111<br>";
							}
						}

						class Student extends Person{
							function say(){
								echo "1111<br>";
								echo "22222<br>";
							}
						}

						$s = new Student("xiaoming");
						$s->say();// 1111   2222

					2.调用父类相同的方法

						class Person{
							function say(){
								echo "1111<br>";
							}
						}

						class Student extends Person{
							function say(){
								Person::say();
								echo "22222<br>";
							}
						}

						$s = new Student("xiaoming");
						$s->say(); // 1111  222

					3.更高一级的 parent::成员

						重要：只要是子类的构造方法，去覆盖父类的构造方法，一定要在子类的最上面调用一下父类被覆盖的方法

						权限的问题： 子类只能大于或等于父类的权限、不能小于

						class Person{
							protected $name;
							function __construct($name){
								$this->name = $name;
							}
							function say(){
								echo "1111<br>";
							}
						}

						class Student extends Person{
							function __construct($name, $age){
								parent::__construct($name);
								$this->age = $age;
							}
							function say(){
								parent::say();
								echo "姓名：{$this->name},年龄：{$this->age} 22222<br>";
							}
						}


						$s = new Student("xiaoming", 20);
						$s->say();//  1111
												  姓名：xiaoming,年龄：20 22222

			php关键字
				instanceof 操作符(关键字)
					instanceof操作符用于检测当前对象实例是否属于某一个类的类型
					
					class Person{
					
					}

					$p = new Person("gaoming", 30);
					if($p instanceof Person){
						echo "是<br>";
					}else{
						echo '否<br>';
					}  //是

				final 修饰
					在PHP中final不定义常量，所以就不会使用，也不能使用final来修饰成员属性

					1.final可以修饰类 -- 这个类不能去扩展，不能由子类(不让别人去扩展，这个类是最终的类时)

						final class Person{}

					2.final可以修饰方法 -- 这个方法，也就不能在子类中覆盖(不能让子类改这个方法，或扩展这个方法的功能时)

						class Person{
							final function eat(){}
						}

				static 静态关键字 --可以修饰属性和方法，不能修饰类

					1.使用static修饰的成员属性，存在内存的初始化静态段
					2.可以被所有一个类的对象共用
					3.第一次用到类(类名第一次出现)，类在加载到内存时，就已经将静态的成员加载到内存
					4.静态的成员一定要使用类来访问
						
						1.在外部取值
							class Person{
								public $name = "zhangsan";
								public static $country = "China";
								function __construct($name){
									$this->name = $name;
								}
							}

							echo Person::$country; // China
							echo Person::$name;	//报错
						2.在内部调用

							class Person{
								public $name;
								public static $country = "China";
								function __construct($name = "zhangsan"){
									$this->name = $name;
								}
								function say(){
									echo "我叫 {$this->name} , 我的国家 ".Person::$country;
								}
							}

							$per = new Person();
							$per->say();//我叫 zhangsan , 我的国家 China

						3.在内部调用 优化 用self替换类名、

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
							$per->say(); //我叫 zhangsan , 我的国家 China

					5.静态成员一旦被加载，只有脚本结束才释放


		设计模式

122.112.212.194:8010
