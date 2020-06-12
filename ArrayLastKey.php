<?php
//Pega a última key do array. (PHP 7 < 7.3.0)

$arr = [44,32,34,87];
end($arr);

$a = key($arr);
//$a = int(3)

echo $arr[$a];
//87
