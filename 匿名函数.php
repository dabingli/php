<?php
/*
普通函数
function funname($a, $b, $c){
	return $a + $b + $c;
}
$var = "funname";
echo $var(1,2,3);


*/

$var = function(){
	echo "11111";
};
$var(1, 2, 3);
var_dump($var);