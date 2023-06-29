<?php
/*
Написать программу для игры в слова. Программа должна спросить количество игроков и имя каждого игрока. Игроки по очереди говорят слова. Первая буква слова игрока должна совподать с последней буквой слова предыдущего игрока. Если слово заканчивается на "Ъ, ь, Ы" программа должна ориентироватся на предыдущую букву. После слова последнего игрока, ход переходит к первому. Слова не должны повторятся. Игра продолжается пока не сдадутся все игроки кроме одного.
*/

class Player{
	public $Name;
	public $Number;
	public $Status = 'Active';

	function __construct($number){
		$this -> Number = $number;
		$this -> Name = readline("Введите имя игрока № $this->Number : ");
		echo "Игрок № $this->Number с именем $this->Name\n";
	}

	public function AskWord(){
		//$this -> temp = readline("Введите : ");
		$objGame->ArrWords[] = readline("Введите слово, которое начинается на Х: ");
	}
}
//$obj = new Player(1);

Class Tour{
	function __construct(){
		foreach ($this->ArrObjPlayers as $key) {
			$key->AskWord();
		}
	}
}
/*
Class Winer{

}
*/
class Game{
	public $NumberOfPlayers;
	public $ArrObjPlayers = array();
	public $ArrWords = array();
	public $Winer = "no";

	function __construct(){
		//Создаем массив игроков
		$this->NumberOfPlayers = readline("Введите количество играков: ");
		for ($i=1; $i <= $this->NumberOfPlayers; $i++) { 
			$this->ArrObjPlayers["Player$i"] = new Player($i);
		}
		print_r($this->ArrObjPlayers);
		/*
		//начинаем игру
		do {
			$objTour = new Tour();

		} while ($this->Winer == "no");
		*/
	}
}


$objGame = new Game();
//print_r($objGame->ArrObjPlayers);

/*массив игроков
Array
(
    [Player1] => Player Object
        (
            [Number] => 1
            [Name] => Саша
            [Status] => Active
        )
)

foreach ($objGame->ArrObjPlayers as $key) {
	echo "$key->Status\n";
}
*/

//$objTour = new Tour();
//print_r($objGame->ArrWords);
?>
