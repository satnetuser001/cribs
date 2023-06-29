<?php
/*
В единственной строке входного файла INPUT.TXT записаны два натуральных числа через пробел. Значения чисел не превышают 10^9.
В единственную строку выходного файла OUTPUT.TXT нужно вывести одно целое число — сумму чисел А и В.
*/

/*
$sum = 0;
$arr = explode(' ', file_get_contents('INPUT.TXT'));

//проверка, что числа не превышают 10^9(по условию задачи проверка не требуется, не сразу дочитал) 
// foreach ($arr as $key => $value) {
// 	if ($value > 1000000000) {
// 		echo "число " . $key+1 . " больше 10^9\n";
// 		//exit;
// 	}
// }

foreach ($arr as $key => $value) {
	$sum += $value;
}

file_put_contents('OUTPUT.TXT', $sum);
*/

class FileReadWrite
{
	public function Read ($fileName)
	{
		return file_get_contents($fileName);
	}

	public function Write ($fileName, $sum)
	{
		file_put_contents($fileName, $sum);
	}
}

class Converter
{
	public function StrToArr($str)
	{
		return explode(' ', $str);
	}
}

// !!! Внимаие, до PHP 8 Класс и его метод не могут иметь одинаковые имена !!!
class Plus
{
	public function Plus($arr)
	{
		$sum = 0;
		foreach ($arr as $key => $value)
		{
			$sum += $value;
		}
		return $sum;
	}
}

class Main
{
	protected const INPUT = 'INPUT.TXT';
	protected const OUTPUT = 'OUTPUT.TXT';

	protected $objFileReadWrite;
	protected $objConverter;
	protected $objPlus;

	protected $readStr;
	protected $readArr;
	protected $sum;
	
	function __construct()
	{
		$this->objFileReadWrite = new FileReadWrite();
		$this->objConverter = new Converter();
		$this->objPlus = new Plus();

		$this->readStr = $this->objFileReadWrite->Read(self::INPUT);
		$this->readArr = $this->objConverter->StrToArr($this->readStr);
		$this->sum = $this->objPlus->Plus($this->readArr);
		$this->objFileReadWrite->Write(self::OUTPUT, $this->sum);
	}
}

$main = new Main();
?>
