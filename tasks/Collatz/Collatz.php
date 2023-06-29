<?php
/*
Для объяснения сути гипотезы рассмотрим следующую последовательность чисел, называемую сираку́зской после́довательностью. Берём любое натуральное число n.
Если оно чётное, то делим его на 2, а если нечётное, то умножаем на 3 и прибавляем 1 (получаем 3n + 1). Над полученным числом выполняем те же самые действия,
и так далее.
Гипотеза Коллатца заключается в том, что какое бы начальное число n мы ни взяли, рано или поздно мы получим повторяющийся цикл 4 2 1.

Задача.
Разработать консольную программу, которая будет расчитывать "сираку́зскую после́довательность" для числа введенного пользователем и записывать результат в txt файл.
У программы должна быть проверка на целочисленность введенного пользователем числа. Программа должна иметь функцию расчета "сираку́зской после́довательности" для
чисел от нуля до бесконечности в автоматическом режиме и записи результатов расчета каждого числа в отдельный файл.

Рядом с файлом должна быть папка "results"
*/

class Collatz
{
	protected $_userChoice;
	protected $_userNumber = 0;
	protected $_resultArr = [];

	function __construct()
	{
		echo "Гипотеза Лотара Коллатца\n";
		$this->_userChoice = $this->_userChoiceWithValidation();
		$this->_cycleSelector();
	}

	protected function _cycleSelector()
	{
		if ($this->_userChoice == 8)//если пользователь выбрал расчет от 0 до бесконечности
		{
			while (true)//бесконечный цикл по Коллатцу
			{
				$this->_resultArr = [];//очищаем массив перед началом цикла
				$this->_userNumber ++;//пишем текущее "стартовое" значение в переменную неиспользуемую в данном сценарии
				$this->_main();
			}
		}
		else//если пользователь выбрал расчет одного числа
		{
			$this->_userNumber = $this->_userNumberWithVavidation();//спрашиваем и пишем "стартовое" значение в $_userNumber
			$this->_main();
		}
	}

	protected function _main()
	{
		$this->_resultArr[] = $this->_userNumber;//пишем в результирующий массив "стартовое" значение для вычисления Коллатца
		$arrCount = 0;
		$last3num = 0;
		while ($last3num != 421)
		{
			$arrCount = count($this->_resultArr);
			if ($arrCount >= 3)//если в массиве $_resultArr элементов >=3 записываем в $last3num последние 3 элемента 
			{
				$temp = $this->_evenUneven(end($this->_resultArr));//последний элемент массива $_resultArr передаем методу "чётноеНечётное"
				echo $temp . "\n";
				$this->_resultArr[] = $temp;//результат вычислений дописываем в конец массива $_resultArr
				$last3num = $this->_resultArr[$arrCount - 2] . $this->_resultArr[$arrCount - 1] . $this->_resultArr[$arrCount];
			}
			else//если в массиве $_resultArr элементов < 3
			{
				$temp = $this->_evenUneven(end($this->_resultArr));
				echo $temp . "\n";
				$this->_resultArr[] = $temp;
			}
		}
		//когда расчет входит в конечный цикл 421, пишем в файл результирующий массив $_resultArr
		$this->_writeFile($this->_userNumber, $this->_resultArr);
	}

	protected function _userChoiceWithValidation()//выбор пользователя: 1-расчитать одно число; 8-расчитать от 1 до бесконечности
	{
		$question = 'Введите "1" для расчета одного числа или' . "\n" . 'введите "8" для автоматического расчета от +1 до +бесконечности:' . "\n";
		echo $question;
		$answer = readline();
		while ($answer != 1 and $answer != 8)
		{
			echo "Выбор сделан неверно\n" . $question;
			$answer = readline();
		}
		return $answer;
	}

	protected function _userNumberWithVavidation()//выбор пользователя, какое число расчитать
	{
		$question = "Введите любое целое (пока что только положительное) число отличное от нуля\n";
		echo $question;
		$answer = readline();
		while (filter_var($answer, FILTER_VALIDATE_INT) == false or $answer == 0)
		{
			echo "Неверный формат числа\n" . $question;
			$answer = readline();
		}
		return $answer;
	}

	protected function _evenUneven ($number)//расчет чётногоНечётного числа по Коллатцу
	{
		if ($number % 2 == 0)
		{
			return $number / 2;
		}
		else
		{
			return $number * 3 + 1;
		}
	}

	protected function _writeFile ($number, $arr)//запись результирующего массива в файл
	{
		$fp = fopen("results/" . $number . '.txt', 'w');
		foreach ($arr as $key => $value)
		{
			fwrite($fp, $value . "\n");
		}
		fclose($fp);
	}
}

$obj = new Collatz();
?>
