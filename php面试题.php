1.以下哪一句不会吧john新增到users阵列
1)$users[] = 'john';
2)array_add($users, 'john');
3)array_push($users, 'john');
4)$users ||= 'john';



--------------------
1)和3)可以
2)没有这个函数
4)语法错误

2.sort()、assort()和 ksort()有什么分别？它们分别在什么情况下使用？


----
sort()
根据阵列中元素的值，以英文字母顺序排序，索引键会由0到n-1重新编号。主要是当阵列索引键的值无关疼痒时用来把阵列排序

assort()
php没有assort()函数，所以应该是asort()
asort()
与sort()一样把阵列的元素按英文字母顺序来排列，不同的是所有索引键都获得保留，特别适合替联想阵列排序

ksort()
根据阵列中索引键的值，以英文字母顺序排序，特别适合用于希望把索引键排序的联想阵列


3.一下的代码会产生什么？为什么

$num = 10;
function multiply(){
	$num = $num * 10;
}
multiply();
echo $num;

--------
由于函数multiply()没有指定$num为全局变量(例如global $num或者 $_GLOBALS['num']),所以$num的值为10


4.reference跟一个正规的变量有什么分别？如何pass by reference? 在什么情况下我们需要这样做？


Reference传送的变量的地址而非它的值，所以在函数中改变一个变量的值时，整个应用都见到这个变量的新值

一个正规变量传送给函数的是它的值，当函数改变这个变量的值时，只有这个函数才见到新值，应用的其他部分仍然见到旧指

$myVariable = "it's value";
Myfunction(&$myVariable); //以reference传送参数以reference传送参数给函数，可以使函数改变了的变量，即使在函数结束后仍然保留新值


5.哪些函数可以用来在现正执行的脚本中插入函数库


php函数库不外乎include() include_once() require() require_once，但细心再想，"涵式库"也应该包括com物件和.net函数库，所以我们的答案也要分别包括com_load和dotnet_locd，下次有人提起"函式库"的时候，别忘记这两个涵式


6.foo()与@foo()有什么分别

foo()会执行这个函数，任何解义错误、语法错误、执行错误都会在页面上显示出来
@foo()在执行这个函数时，会隐藏所有上述的错误信息

很多应用程序都使用@mysql_connect()和@mysql_query来隐藏mysql的错误讯息


7.你如何替php的应用程序帧错

我并不常这样做，我曾经试过很多不同的帧错工具，在linux系统中设定设写工具一点也不容易。

PHP-advanced PHP Debugger或称 PHP-APD,第一步是执行以下的指令安装：

pear install apd 安装后在你的脚本的开头位置加入以下的语句开始帧错

apd_set_pprof_trace();执行完毕，打开一下档案来查阅执行日志

apd.dumpdir

你也可以使用pprofp来格式化日志



8."==="是什么？石举一个"=="是真但"==="是假的例子

"==="是给即可以送回布尔值"假"，也可以送回一个布尔值却可以赋与"假"值的涵式，strpos()和strrpos()便是例子


if(strspos("abc", "a") == true){//这部分永不会被执行，因为"a"的位置是0,换算成布尔值是"假"}
if(strpos("abc", "a") === true){//这部分会被执行，因为"==="保证函数strpos()的送会值不会换算成布尔值}


9.你会如何定义一个没有成员涵式或特性的myclass?

class myclass{}

10.如何产生一个myclass的物件?

$obj = new myclass();

11.在类别内如何取这个类别的特性以及改变他的值?


使用 $this->propertyName,例如：

class myClass{
	private propertyName;

	function __construct(){
		$this->propertyName = "value";

	}
}

12.include和include_once有什么分别?require又如何


三者都是用来在脚本中插入其他档案，视乎 url_allow_fopen是否核准，这个档案可以从提同内部或外部取得。但他们之间也有细微的分别：

include(): 这个涵式允许你在脚本中把同一个档案插入多次，如果档案不存在，他会发出系统警告并继续执行脚本。

include_once() 它跟include()的功能相似，正如它的名字所示，在脚本的执行期间，有关档案只会被插入一次

require() 跟include()差不多，他也是用来在脚本中插入其他档案，但如果档案不存在，他会发出系统警告，这个警告会导致错误，另脚本终止执行

13.以下那一函数可以把浏览器转向另一个页面

redir()
这不是一个php函数，会导致执行错误

header()
这个是正确答案，header()用来插入head资料，可以用来使浏览器转向到另外一个页面，例如：
header("Location: http://www.baidu.com/")

location()
这个不是一个php函数，会导致错误

redirect()
这个不是php函数，会导致执行错误

14.以下哪一个函数可以用来开启档案以便读/写

fget()
这不是php函数

file_open()
这不是php函数

fopen()
这是正确答案，fopen()可以用来开启档案以便读/写，事实上这个函数还有很多选项

open_file()
这个不是php函数

15.mysql_fetch_row()和mysql_fetch_array()有什么分别

mysql_fetch_row()把数据库的一列储存在一个以零为基础的阵列中，第一栏在阵列的索引0,第二栏在索引1,如此类推。mysql_fetch_assoc() 把数据库的一列储存在一个关联阵列中，阵列的索引就是栏位名称，例如我的数据库查询送回"first_name" "last_name" "email"三个栏位，阵列的索引便是"first_name" "last_name" "email"。mysql_fetch_array()可以同时送回mysql_fetch_row()和mysql_fetch_assoc()的值


16.下面的代码用来做什么

$date = "08/26/2003";

print ereg_replace("([0-9]+)/([0-9]+)/([0-9]+)", "\\2/\\1/\\3",$date);

这是把一个日期从MM/DD/YYYY的格式转为DD/MM/YYYY格式。我的一个好朋友告诉我可以把这个正则表达式拆解为以下的语句，对于如此简单的表示是来说去其实无须拆解，纯粹为了解决方便：

// 对应一个或更多 0-9，后面紧随一个斜号$regExpression = "([0-9]+)/";// 应一个或更多 0-9，后面紧随另一个斜号$regExpression .= "([0-9]+)/";// 再次对应一个或更多 0-9$regExpression .= "([0-9]+)";至于 \\2/\\1/\\3 则是用来对应括号，第一个括号对的是月份，第二个括号对应的是日期，第三个括号对应的是年份。

17.给你一行文字$string，你会如何编写一个正则表达式，把$string内的标签除去


首先，php有内建函数strip_tags()除去HTML标签，为何要自行编写正则表达式？

$stringOfText = "
	this is a test
";

$preg = "/\<(.*?)\>(.*?)<\/(.*?)\>/";

echo preg_replace($preg, "\\2", $stringOfText);

有人说也可以使用 /(<[^>]*>)/ $expression = "/(<[^>]*>)/";echo preg_replace($expression, "", $stringOfText);

18.PHP和Perl分辨阵列和散列表的方法有什么差异？

Perl所有阵列变量都是以@开头，例如：@myArray, php则沿用$作为所有变量开头，例如#myArray

至于Perl表示散列用%，例如%myHash， php则没有分别，仍是使用 $，例如$myHash

19.你如何利用php解决HTTP的无状态本质

最主要是俩各选择session和cookie。使用session的方法是在每页的开始加上session_start()，然后利用$_SESSION散列来表示储存session变量。至于cookie你只需记者一个原则，在输出任何文字之前调用set_cookie()函数，此外只需使用$_COOKIE散列表便可以储存所有cookie变量


20.GD函数库用来做什么

自从PHP4.3.0版本后GD便内建在php系统中。这个函数库让你处理和显示各式的图档，它的另外一个常见用途是制作所图档。GD以外的另一个选择是ImageMagick，但这个函数库并不内建与php之中，必须由系统管理员安装在服务器上。


21.试写出几个输出一段HTML代码的方法

echo "my srring $varible";

echo << HTML
	dsjiwefw
HTML;
