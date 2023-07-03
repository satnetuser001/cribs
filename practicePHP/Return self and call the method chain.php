<?php

class ReturnSelf
{
	static protected $var;

	static public function one(){
		self::$var = 'one';
		echo self::$var . "\n";
		//return ReturnSelf::class;
		return new ReturnSelf();
	}

	static public function two(){
		self::$var = 'two';
		echo self::$var . "\n";
		//return ReturnSelf::class;
		return new ReturnSelf();
	}

	static public function three(){
		self::$var = 'three';
		echo self::$var . "\n";
		//return ReturnSelf::class;
		return new ReturnSelf();
	}
}

//$obj = ReturnSelf::one()::two()::three()::one();
ReturnSelf::one()->two()->three()->one();


class Returnable
{
	public $var = 'default';

	public function say(){
		echo $this->var . "\n";
		return $this;
	}

	public function one(){
		$this->var = 'one';
		return $this;
	}

	public function two(){
		$this->var = 'two';
		return $this;
	}
}

$obj = (new Returnable())->say()->one()->say()->two()->say();
/*
$obj = new Returnable();
$obj->say()->one()->say()->two()->say();
*/
?>