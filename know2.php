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
			为完成某一种特定功能，最好的方法

			单态(单例|单件)设计模式
				1.如果想让一个类，只能有一个对象，就要先让这个类，不能创建对象，将构造方法私有化
				2.可以在类的内部使用一个静态方法，来创建对象 
					1.普通方法
						class Person{

							static $obj = null;

							private function __construct(){

							}
							static function getObj(){
								//如果第一次调用时，没有对象则创建，以后调用时，直接使用第一次创建对象
								if(is_null(self::$obj))
									self::$obj = new Person;

								return self::$obj;
							}

							function say(){
								echo "aa<br>";
							}

							function __destruct(){
								echo "####<br>";
							}
							
						}

						$per = Person::getObj();
						$per = Person::getObj();
						$per->say(); // aa  ####

					2.进一步优化 对象内部可以用self代替

						class Person{

							static $obj = null;

							private function __construct(){

							}
							static function getObj(){
								//如果第一次调用时，没有对象则创建，以后调用时，直接使用第一次创建对象
								if(is_null(self::$obj))
									self::$obj = new self;

								return self::$obj;
							}

							function say(){
								echo "aa<br>";
							}

							function __destruct(){
								echo "####<br>";
							}
							
						}

						$per = Person::getObj();
						$per = Person::getObj();
						$per->say(); // aa  ####

			const 关键字
				类中使用const声明常量
					const 修饰的成员属性为常量， 只能修饰成员属性
					final	修饰类和方法
					static 修饰方法和属性

					1.常量建议使用大写，不能使用$
					2.常量一定要在声明时就给好初值
					3.常量的访问方式和static的访问方式,但只能读
						1.在类外部使用   类名::常量名
							class Demo{
								const SEX = "男";
							}

							echo Demo::SEX;//男
						2.在类的内部  self::常量名

								class Demo{
									const SEX = "男";
									function say(){
										echo "我的性别是：".self::SEX;
									}
								}

								$d = new Demo();
								$d->say(); //我的性别是：男

		魔术方法
			__construct()	
			__destruct()
			__set()
			__get()
			__isset()
			__unset()

			1.自动调用，但不同的魔术方法，有自己的调用时机
			2.都是以 __ 开始的方法
			3.所有的魔术方法，方法名都是固定的
			4.如果不写，就不存在，也就没有默认的功能

			__toString()
				了解这个对象的基本信息
				1.是在直接使用 echo print printf 输出一个对象引用时，自动调用这个方法
				2.将对象的基本信息放在 __toString() 方法内部，形成字符串返回
				3.__toString()方法中，不能有参数，而且必须返回字符串

				class Person{
					public $name;
					public $age;
					public $sex;

					function __construct($name,$age,$sex){
						$this->name = $name;
						$this->age = $age;
						$this->sex = $sex;
					}
					function say(){

					}

					function __toString(){
						return "aaa";
					}
				}

				$p = new Person("zhangsan", 10, "男");

				echo $p; // aaa

				print new Person("aa", 10, "女"); // aaa

			__clone() 克隆对象
				1.使用clone这个关键字，复制这个对象

				class Person{
					function __destruct(){
						echo "11<br>";
					}
				}

				$p = new Person("zhangsan", 10, "男");
				$p2 = clone $p; 
				// 11 11

				2.在克隆对象时自动调用

					class Person{
						function __clone(){
							echo "@@@<br>";
						}
					}

					$p = new Person("zhangsan", 10, "男");
					$p2 = clone $p; //@@@

				3.作用：构造方法一样，是对新克隆的对象进行初始化

				4.在这个方法中$this代表的是副本($p2)，给所有副本属性初始化

					class Person{
						public $name;
						function __construct($name){
							$this->name = $name;
						}
						function say(){
							echo "我是：{$this->name}<br>";
						}
						function __clone(){
							$this->name = "克隆的zhangsan";
						}
					}

					$p = new Person("zhangsan", 10, "男");
					$p->say(); //我是：zhangsan
					$p2 = clone $p;
					$p2->say(); //我是：克隆的zhangsan
			
			__call() 方法处理错误调用

				1.就是在调用一个对象中不存在的方法时，自动调用的方法
				2.有两个参数，第一个参数是，调用的不存在的方法的方法名;第二个参数是，调用的这个方法的参数

					class Person{
						public $name;
						function __construct($name){
							$this->name = $name;
						}
						function say(){
							echo "我是：{$this->name}<br>";
						}
						function __call($method, $args){
							echo "对不起，你调用的方法 {$method}(), 参数为 ";
							print_r($args);
							echo "不存在！<br>";
						}

					}

					$p = new Person("zhangsan", 10, "男");
					$p->eat("肉", "米"); //对不起，你调用的方法 eat(), 参数为 Array ( [0] => 肉 [1] => 米 ) 不存在！
					$p->run("gogo"); //对不起，你调用的方法 run(), 参数为 Array ( [0] => gogo ) 不存在！

				3.作用：可以写提示，但这个不是主要功能，将方法功能相似的，但方法名还要不同的，就可以采用这个方式来完成

					class Person{
						public $name;
						public $marr = array("aaa", "bbb", "ccc", "ddd");
						function __construct($name){
							$this->name = $name;
						}
						function say(){
							echo "我是：{$this->name}<br>";
						}
						function __call($method, $args){
							if(in_array($method, $this->marr)){
								echo $args[0]."<br>";
							}else{
								echo "你调用的方法{$method}不存在<br>";
							}
						}

					}

					$p = new Person("zhangsan", 10, "男");
					$p->aaa("aaa");  // aaa
					$p->bbb("gogo"); // gogo
					$p->ccc("ccc"); // ccc

			serialize() 对象串行化(序列化) -- 将对象转换成字符串 
				1.将对象转化成字符串(不用看懂) --- 串行化 serialize()
					__sleep() --在串行化时，自动调用
					作用：可以设置需要设置串行化的对象的属性
				只要在这个方法中，返回一个数组，在数组中生命了哪个属性名，哪个属性就会被串行化，没有在这个数组中的就不被串行化，如果不加数组就都被串行化

					class Person{
						public $name;
						public $age;
						public $sex;
						function __sleep(){
							echo "只串行化name和sex<br>";
							return array("name", "sex");
						}
						function say(){
							echo "你好<br>";
						}
					}

					$p = new Person("zhangsan", 10, "男");

					$str = serialize($p); //只串行化name和sex

				2.将字符串转回对象 -- 反串行化 unserialize()
					__wakeup() --在反串行化时自动调用的方法
					作用：对象串行化回来的对象，进行初始化用的和__construct()与__clone作用相似


				注意(串行化的时机)
					1.将对象在网络中传输
					2.将对象持久保存
				
				序列化(串行化)
					include "hello.php";
					$p = new Person();
					$str = serialize($p);

					file_put_contents("objstr.txt", $str);

				反序列化(反串行化)

					includes "hello.php";

					//读出字符串从文件中
					$str = file_get_contents("objstr.txt");

					//反串行化
					$p = unserialize($str);

	    数组的串行化 json --javascript object  

	    	json_encode()
	    	json_decode()

	  	eval()函数 -- 检查并执行php代码
	  		$str = "echo 'abc';";
	  		eval($str); // abc

	  	var_dump() 输出打印格式信息
	  		$arr = array("one"=>1, "two"=>2, "three"=>3);
	  		var_dump($arr); //array(3) { ["one"]=> int(1) ["two"]=> int(2) ["three"]=> int(3) }

	  	var_export() 打印各个类型信息并转换成字符串

	  	  $arr = array("one"=>1, "two"=>2, "three"=>3);
	  	  var_export($arr);array ( 'one' => 1, 'two' => 2, 'three' => 3, )
	  	  $brr = var_export($arr, true);
	  	  echo $brr;array ( 'one' => 1, 'two' => 2, 'three' => 3, )

	   	__set_state()  方法，就是在使用var_export()方法时，导出一个类的信息时自动调用

	   		class Person{
	   			function __set_state($arr){
	   				$p = new Person("lisi", 30, "nv");

	   				return $p;
	   			}
	   			function __construct($name, $age, $sex){
	   				echo "我的名字：{$name}, 我的年龄：{$age}，我的性别：{$sex}";
	   			}
	   		}

	   		$p = new Person("张三", 20, "男");

	   		eval('$b = '.var_export($p, true).';');

	   		var_dump($b); //我的名字：lisi, 我的年龄：30，我的性别：nvobject(Person)#2 (0) { }

	   	__invoke() 在创建实例后，可以直接调用对象
				1.普通的
					class Person{
						function __invoke(){
							echo "hello word!<br>";
						}
					}

					$p = new Person("张三", 20, "男");

					$p(); //hello word!

				2.添加参数
					class Person{
						function __invoke($a, $b, $c){
							echo "{$a}hello {$b} word!{$c}<br>";
						}
					}

					$p = new Person("张三", 20, "男");

					$p(1, 2, 3); //1hello 2 word!3

			__callstatic() 调用静态方法不存在时，自动调用的魔术方法

				class Person{
					public $arr = array("www", "bbb");
					static function __callStatic($method, $args){
						echo "你调用的方法{$method}() 不存在";
					}
				}

				Person::hello(); // 你调用的方法hello() 不存在

				2.参数
					class Person{
						public $arr = array("www", "bbb");
						static function __callStatic($method, $args){
							echo "你调用的方法{$method}(".implode(',', $args).") 不存在";
						}
					}

					Person::hello(1, 2, 3); //你调用的方法hello(1,2,3) 不存在

			__autolode() 自动加载
				只要在这个脚本中，需要加载类的时候(必须用到类名)，就会自动调用这个方法

				function __autoload($classname){
					include strtolower($classname).".class.php";
				}
			
			抽象方法和抽象类  abstract
				1.什么是抽象方法
					定义：一个方法如果没有方法体(一个方法，不使用 "{}",直接使用分好结束的方法，才是没有方法提的方法)，则这个方法就是抽象方法

					1)声明一个方法，不使用{}，而直接分号结束
					2)如果是抽象方法，必须 abstract(抽象关键字来修饰)

					abstract function say();

				2.什么是抽象类
					1)如果一个类中有一个方法是抽象方法，则这个类是抽象类
					2)如果声明一个抽象类，则这个类必须使用 abstract 关键字

					abstract class Person{}

				abstract class Person{
					abstract function say();
				}

				注意1：
					1.只要使用 abstract 修饰的类，就是抽象类
					2.抽象类是一种特殊的类，特殊在哪里(在抽象类中可以有抽象方法)
					3.除了在抽象类中可以有抽象方法，以外，和正常的类一样
						abstract class Person{
							public $name;
							abstract function say();
							abstract function eat();
							function say(){
								echo "111111<br>";
							}
						}
				注意2：
					1.抽象类不能实例化对象(抽象类不能创建对象)
          2.如果看见抽象类，就必须写这个类的子类，将抽象类中的抽象方法覆盖(加上方法体)
          3.子类必须全部实现(覆盖重写)抽象方法，这个子类才能创建对象，如果只实现部分，那么还有抽象类方法，则类也就必须是抽象类

				抽象方法作用
					抽象方法就是规定了，子类必须有这个方法的实现，功能教给子类。

					只写出结构，而没有实现，实现交给具体的子类(按自己的功能)去实现

				抽象类的作用
					就是要求子类的结构，所以抽象类就是规范

				实现方法

					abstract class Person{
						abstract function say();
						abstract function eat();
					}

					class student extends Person {
						function say(){

						}
						function eat(){
							
						}
					}	
      
      php接口规范
      	接口是一种特殊的抽象类，接口也是一种特殊特殊的类

      	1.抽象类和接口中都有抽象方法
      	2.抽象类和接口都不能创建实例对象
      	3.抽象类和接口使用意义也就是作用相同(定义一种规范)

      	接口和抽象类相比，特殊在哪里
      		1.接口中的方法，必须全部是抽象方法。
      			在接口中的抽象方法不需要使用 abstract
      		2.接口中的成员属性，必须是常量
      		3.所有的权限必须是pubulic(公有的)
      		4.声明接口不使用class,而是使用 interface

      	实现方法：
      		interface Demo{
      			const NAME = "计算机";
      			const ARGS = 20;
      			function test();
      			function test1();
      		}

					1.方法
      		class test extends Demo{
						function test(){

						}
						function test1(){

						}
      		}

      		2.方法
      		echo Demo::NAME; //计算机

      	接口应用的一些细节
      		1.可以使用extends让一个接口继承另一个接口(接口和接口 -- 只有扩展新抽象类，没有覆盖的关系)
      			interface Demo{
      				const NAME = "计算机";
      				const ARGS = 20;
      				function test();
      			}
      			interface Test extends Demo{
      				function test2();	
      			}

      		2.可以使用一个类来实现接口中的全部方法，也可以使用一个抽象类，来实现接口中的部分方法
      			(类与接口，抽象类与接口 -- 覆盖-- 重写，实现接口的中的抽象方法)

      		3.就不要使用extends这个关键子，使用implements实现

      			interface Demo{
      				const NAME = "计算机";
      				const ARGS = 20;
      				function test();
      			}
      			abstract class Test implements Demo{

      			}
					
					4.一个类可以在继承另一个类的同时，使用implements实现一个接口，可以实现多个接口(一定要先继承，再实现接口)

	      		extends 继承(扩展)，这个在php中，一个类只能有一个父类

		      		interface Demo{
		      			const NAME = "计算机";
		      			const ARGS = 20;
		      			function test();
		      		}
		      		class Word(){
		      			
		      		}
		      		abstract class Test extends Word implements Demo{

		      		}

		      5.实现多个接口只需要,分割

		      	interface Demo{
		      		const NAME = "计算机";
		      		const ARGS = 20;
		      		function test();
		      	}
		      	interface Demo1{
		      		function test2();
		      	}
		      	class Word(){
		      		
		      	}
		      	abstract class Test extends Word implements Demo,Demo1{

		      	}
			
			php面象对象的特性多态
				多态特性
					1.程序扩展准备
				  
				  技术
				  	1.必须有继承关系，父类最好是接口(interface)或抽象类(abstract)

				实现方法

					interface USB{
						const WIDTH = 12;
						const HEIGHT = 3;

						//加载
						function load();
						//运行
						function run();
						//停止
						function stop();
					}

					class Cumputer {
						function useUSB(USB $usb){
							$usb->load();
							$usb->run();
							$usb->stop();
						}
					}

					class Mouse implements USB{
						function load(){
							echo "加载鼠标成功<br>";
						}
						function run(){
							echo "运行鼠标功能<br>";
						}
						function stop(){
							echo "鼠标工作结束<br>";
						}
					}

					class KeyPress implements USB{
						function load(){
							echo "加载键盘成功<br>";
						}
						function run(){
							echo "运行键盘成功<br>";
						}
						function stop(){
							echo "停止键盘工作<br>";
						}
					}

					class Worker{
						function work(){
							$c = new Cumputer;

							$m = new Mouse;

							$k = new KeyPress;

							$c->useUSB($m);
							$c->useUSB($k);

						}
					}

					$w = new Worker();
					$w->work();
					// 	加载鼠标成功
				      运行鼠标功能
				      鼠标工作结束
				      加载键盘成功
				      运行键盘成功
				      停止键盘工作