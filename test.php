<?php
echo "<meta charset = 'utf-8'>";

function myStrrev($str,$encoding='utf-8'){

$newstr = '';

$len = mb_strlen($str);

for($i=$len-1; $i>=0; $i--){

$newstr .= mb_substr($str,$i,1,$encoding);

}

return $newstr;

}

$string = '相信women是正确的。';

echo $string;

echo '<br />';

echo myStrrev($string); // '的。的确正是nemow信相'