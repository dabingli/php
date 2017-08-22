<?php
	$year = isset($_GET['year']) ? $_GET['year'] : date("Y"); //获取当前的年
	$month = isset($_GET['month']) ? $_GET['month'] : date("m"); //当前的月
	$day = isset($_GET['day']) ? $_GET['day'] : date("d"); //当前的日
	//当年当月的天数
	$days = date("t", mktime(0, 0, 0, $month, 1, $year));
	//获取当月的第一天是星期几
	$startweek = date("w", mktime(0, 0, 0, $month, 1, $year));

	echo "今天是{$year}年{$month}月{$day}日<br>";

	echo '<table border="1" width="500" align="center" >';
	echo '<tr>';

	echo '<th style="background:#cccccc">日</th>';
	echo '<th style="background:#cccccc">一</th>';
	echo '<th style="background:#cccccc">二</th>';
	echo '<th style="background:#cccccc">三</th>';
	echo '<th style="background:#cccccc">四</th>';
	echo '<th style="background:#cccccc">五</th>';
	echo '<th style="background:#cccccc">六</th>';

	echo '</tr>';
	echo '<tr>';
	for($i=0; $i< $startweek; $i++){
		echo '<td>#</td>';
	}
	for($j=1;$j <= $days; $j++){
		$i++;
		echo "<td>{$j}</td>";

		if($i%7 == 0){
			echo '</tr><tr>';
		}
	}

	while($i%7!==0){
		echo '<td>#</td>';
		$i++;
	}

	echo '</tr>';
	echo '</table>';


echo "<hr>";

$arr=array(  
array('id'=>1,'name'=>'河南省','pid'=>0),  
array('id'=>2,'name'=>'信阳市','pid'=>1),  
array('id'=>3,'name'=>'开封市','pid'=>1),  
array('id'=>6,'name'=>'广州市','pid'=>4),  
array('id'=>4,'name'=>'广东省','pid'=>0),  
array('id'=>5,'name'=>'深圳市','pid'=>4),  
);  
function digui($data,$pid=0)  
{  
    $arr=array();  
    foreach($data as $v){  
        if($v['pid']==$pid){  
            $arr[]=$v;  
            $arr=array_merge($arr,digui($data,$v['id']));  
        }  
    }  
    return $arr;  
}
echo "<pre>";
var_dump(digui($arr));
echo "</pre>";
echo "<br><br></br>";  
function  diedai($data,$id=0)  
{  
     $task=array($id);//任务表此时放进的$id是为了找儿子，然后再儿子中找孙子，  
     $tree=array();//地区表  
    while(!empty($task))  
    {  
        $flag=false;  
        foreach($data as $k=>$v)  
        {  
            if($v['pid']==$id)  
            {  
                $tree[]=$v;//把找到的项放进$tree数组  
                array_push($task,$v['id']);//每次把找到的儿子的id加进来  
                $id=$v['id'];//每次把$id设成刚加进来的一项的id  
                unset($data[$k]);//把找到的项删除，此处类似排除法  
                $flag=true;//执行这一步说明上面的$id找到儿子了，如果为false说明这一if语句根本没执行同时说明最后  
                //的$id没儿子，然后执行下面的if语句，把$id设为倒数第二项  
            }  
        }  
        if($flag==false)  
        {//当执行这一步时 说明上一步的foreach没执行也就是说明$task最后一项没找到孩子  
            array_pop($task);//删除最后一项  
            $id=end($task);//把$id设为倒数第二项，放到上面的foreach里去执行，找倒数第二项的儿子  
        }  
  
    }  
    return $tree;  
}
echo "<pre>";
var_dump(diedai($arr));  
echo "</pre>";
echo "<hr>";
$status=true; 
$x = 1;
while($status) {
  $x++;
	if($x == 10){
		$status = false;
	}
  echo $x."<br>";
} 
