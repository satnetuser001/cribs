<?php
/*
https://php720.com/task/4
Ваше задание — создать массив, наполнить его случайными значениями (можно использовать функцию rand), найти максимальное и минимальное значение массива и поменять их местами.
*/
//делаем рандомный массив
$Arr = array();
$RandMax = 1000;//Максимально возможное значение элемента массива
$NumbOfArrElements = 10;//Количество элементов массива
for ($i=0; $i < $NumbOfArrElements; $i++) {
	$Variable = rand(0, $RandMax);
	$Arr[] = $Variable;
}
echo "Количество элементов массива = $NumbOfArrElements\nМаксимально возможное значение элемента массива = $RandMax\nПервоначальный массив\n";
print_r($Arr);

//определяем максимальное и минимальное значение в массиве
$KeyMax = 0;
$ValueMax = 0;
$KeyMin = 0;
$ValueMin = $RandMax;
foreach ($Arr as $key => $value) {

	if ($ValueMax < $value) {
		$KeyMax = $key;
		$ValueMax = $value;
	}
	elseif ($ValueMin > $value) {
		$KeyMin = $key;
		$ValueMin = $value;
	}
}

//перезаписываем (модифицируем) элементы массива
$Arr[$KeyMin] = $ValueMax;
$Arr[$KeyMax] = $ValueMin;

echo "Модифицированный массив (KeyMax = $KeyMax, KeyMin = $KeyMin)\n";
print_r($Arr);
?>
