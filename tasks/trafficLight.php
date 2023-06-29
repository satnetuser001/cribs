<?php
/*
ЗАДАНИЕ: Работа светофора запрограммирована таким образом: с начала каждого часа, в течении трех минут горит зеленый сигнал, следующие две минуты горит красный,
дальше в течении трех минут - зеленый и т. д. Вам нужно разработать программу, которая по введенному числу определяла какого цвета сейчас горит сигнал.
*/
/*
class DataRequestToUser примет на вход $NamePar - имя параметра, $MinPar, $MaxPar - минимальное и максимальное значение параметра и будет спрашивать
у пользователя, пока он не ответит в пределах(число).
*/

class DataRequestToUser{
	protected $NamePar;
	protected $MinPar;
	protected $MaxPar;
	public $DataUser;

	public function __construct($NamePar, $MinPar, $MaxPar){
		$this -> NamePar = $NamePar;
		$this -> MinPar = $MinPar;
		$this -> MaxPar = $MaxPar;
		do {
			$this -> Request();
		} while (is_numeric($this -> DataUser) === false or $this -> DataUser < $this -> MinPar or $this -> DataUser > $this -> MaxPar);
	}

	protected function Request(){
		if ($this -> DataUser === null) {//первый запрос
			$this -> Ask();
		} else {//в предыдущем запросе введено вне параметров
			echo "Введеные данные за пределами парраметров\n";
			$this -> Ask();
		}
	}

	protected function Ask(){// сам вопрос
		$this -> DataUser = readline("Введите значение $this->NamePar от $this->MinPar до $this->MaxPar: ");
	}
}

class Сalculations{// просчитает какой горит свет
	protected $Date;

	public function __construct($Date){
		$this -> Date = $Date;

		while ($this -> Date > 5) {
			$this -> Date -= 5;
		}
		if ($this -> Date <= 3) {
			echo "Горит ЗЕЛЁНЫЙ\n";
		}
		elseif ($this -> Date <= 5) {
			echo "Горит КРАСНЫЙ\n";
		}
	}
}

class Main{// организовывает работу объектов
	public function __construct(){
		$objDataRequestToUser = new DataRequestToUser("минут", 0, 60);
		$objСalculations = new Сalculations($objDataRequestToUser -> DataUser);
	}
}

$objMain = new Main();
?>
