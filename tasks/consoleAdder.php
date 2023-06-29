<?php
/*Написать консольную программу в ООП стиле, которая просуммирует числа введенные пользователем*/

class userInputCalculator{

	//Метод-перехватчик. Если в классе будет вызыватся несуществующий метод, то __call вернет "метод не существует".
	public function __call($method, $arguments){
		if (method_exists($this, $method)){
			return $this->$method($arguments);
		}
		else{
			return "метод $method не существует";
		}
	}

	public function main(){
		$arrNumbers = [];
		$lastUserAnswer;
		$quantity = 0;//функция array_push вернет количество элементов в массиве
		do {
			$lastUserAnswer = $this->userAnswerValidation($quantity + 1);
			if (is_numeric($lastUserAnswer)) {
				$quantity = array_push($arrNumbers, $lastUserAnswer);
			}
		} while ($lastUserAnswer != '=');
		return "Сумма чисел: " . $this->arrToStr($arrNumbers) . " = " . $this->calculation($arrNumbers);
	}

	protected function ask ($num){
		//в PHP 8.0 функция readline не может выводить сообщения на русском языке, выводится сообщение: Ошибка сегментирования (стек памяти сброшен на диск)

		return readline("введите число № $num или \"=\" для суммирования: ");//for PHP 7
		//return readline("enter the number N $num or \"=\" for summation: ");//for PHP 8
	}

	protected function userAnswerValidation($num){
		$answer = $this->ask($num);
		while ($answer !== '=' and is_numeric($answer) === false) {
			echo "неверный формат числа\n";
			$answer = $this->ask($num);
		}
		return $answer;
	}

	protected function calculation($arr){
		return array_sum($arr);
	}

	protected function arrToStr ($arr){
		return implode(" + ", $arr);
	}
}

$obj = new userInputCalculator();
echo $obj->main() . "\n";

//echo $obj->main1() . "\n";//проверка метода-перехватчика __call
?>