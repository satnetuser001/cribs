<?php
/*
https://php720.com/task/2

Вам нужно разработать программу, которая считала бы количество вхождений какой-нибуть выбранной вами цифры в выбранном вами числе. Например: цифра 5 в числе 442158755745 встречается 4 раза
*/

$UserNumb = 5;
$Numb = 442158755745;

function Comparation($un, $n)
{
	$NumbOfComparation = 0;
	$StrToArr = str_split($n);
	foreach ($StrToArr as $key => $value) {
		if ($value == $un) {
			$NumbOfComparation ++;
		}
	}
	return $NumbOfComparation;
}

echo Comparation($UserNumb, $Numb);

?>
