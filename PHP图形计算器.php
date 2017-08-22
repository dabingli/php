<!DOCTYPE html>
<html>
<head>
	<title>简单的图形计算器</title>
	<meta charset="utf-8">
</head>
<body>
	<center>
		<h1>简单的图形计算器</h1>
		<a href="PHP图形计算器.php?action=rect">矩形</a>  &nbsp;&nbsp;||  &nbsp;&nbsp;
		<a href="PHP图形计算器.php?action=triangle">三角形</a>
	</center>
	<hr><br>
	<?php 
		//设置自动加载这个程序需要的类文件
		function __autoload($classname){
			include strtolower($classname).".class.php";
		}
		//半段用户是否有选择单击一个形状链接
		if(!empty($_GET['action'])){
			//第一步，创建形状对象
			$classname = ucfirst($_GET['action']);

			$shape = new $classname($_POST);
			//第二步，调用形状的对象中的界面
			$shape->view();

			//第三步，用户是否提交了对应图形界面的表单
			if(isset($_POST['dosubmit'])){
				//第四步，查看用户输入的数据是否正确
				if($shape->yan($_POST)){
				//计算图形的周长和面积
					echo $shape->name."周长为".$shape->zhou()."<br>";
					echo $shape->name."面积为".$shape->area()."<br>";
				}
			}

		}else{
			echo '请选择一个要计算的图形<br>';
		}
	?>
</body>
</html>