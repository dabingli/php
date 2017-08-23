<?php
	$arr = array(0,1,2,3,4,5,6,7,8,9);
	function mysort(&$arr){
		$len = count($arr);
		for($i=0;$i<$len-1;$i++){
			for($j=0;$j<$len-$i-1;$j++){
				if($arr[$j]<$arr[$j+1]){
					$tmp = $arr[$j];
					$arr[$j] = $arr[$j+1];
					$arr[$j+1] = $tmp;
				}
			}
		}
	}

	print_r($arr);
	echo "<br>";
	
	mysort($arr);
	print_r($arr);
