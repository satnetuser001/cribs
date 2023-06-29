<?php

/*Найти сумму цифр числа 345*/

$int = 345;
echo '$int = ' . $int . "\n";
echo '$int type is: ' . gettype($int) . "\n";

/*str_split — Преобразует СТРОКУ в массив. Работает и с целочисленным,
но по идеи правильнее функции передать именно строку, для чего необходимо
сначало изменить тип двнных переменной*/

$mustBeArr = str_split($int);
echo '$mustBeArr type is: ' . gettype($mustBeArr) . "\n";

//меняем тип данных на строку
$str = (string) $int;
echo '$str type is: ' . gettype($str) . "\n";

$arr = str_split($str);
echo '$arr type is: ' . gettype($arr) . "\n";

echo 'var_dump($arr):' . "\n";
var_dump($arr);

$sum = 0;
foreach ($arr as $v) {
	$sum += $v;
}
echo '$sum type is: ' . gettype($sum) . "\n";
echo 'the sum of the digits is: ' . $sum . "\n";

?>