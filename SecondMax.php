<?php 
$arr = [5, 5, 1, 6, 4, 3];
$max = max($arr);
foreach ($arr as $val) {
	if ($val<$max) {
	 $arr2[$val] = $val;	
	}
}
echo max($arr2);
 ?>