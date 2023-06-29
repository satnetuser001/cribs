<?php
/*Пример использования статического свойства класса в его наследниках и объектах.
Статическое свойство класса доступно без объявления объекта, в наследниках класса, а так-же в объектах класса и сохраняет своё значение на протяжении всего времени работы программы
*/

class StaticExemple{
	static public $num = 0;

	public function getnum(){
		print self::$num;
	}

	public function setnum($e){
		self::$num = $e;
	}
}

print 'Первоначальное состояние статической переменной $num' . "\n" . '$num = ' . StaticExemple::$num . "\n";

class FirstСhild extends StaticExemple{
	public function __construct(){
		self::$num = 5;//х.з. правильно так или нужно делать через статический set-тер класса StaticExemple
		print 'Устанавливаем значение переменной $num = 5 в FirstСhild' . "\n" . '$num = ' . self::$num . "\n";
	}
}

class SecondСhild extends StaticExemple{
	public function __construct(){
		self::$num++;
		print 'Прибавляем 1 к переменной $num в SecondСhild' . "\n" . '$num = ' . self::$num . "\n";
	}
}


$objFirstChild = new FirstСhild();
$objSecondChild = new SecondСhild();

$firstObjStaticExemple = new StaticExemple();
$secondObjStaticExemple = new StaticExemple();

print 'Доступ к свойству класса StaticExemple из объекта $firstObjStaticExemple' . "\n" . '$num = ';
$firstObjStaticExemple->getnum();
print "\n";

print 'Доступ к свойству класса StaticExemple из объекта $secondObjStaticExemple' . "\n" . '$num = ';
$secondObjStaticExemple->getnum();
print "\n";

print 'Устанавливаем значение статического свойства $num = 10 класса StaticExemple из объекта $firstObjStaticExemple' . "\n";
$firstObjStaticExemple->setnum(10);
print '$num = ';
$firstObjStaticExemple->getnum();
print "\n";

print 'Читаем статическое свойство $num класса StaticExemple из объекта $secondObjStaticExemple' . "\n" . '$num = ';
$secondObjStaticExemple->getnum();
print "\n";
?>