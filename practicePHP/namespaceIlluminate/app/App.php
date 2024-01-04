<?php

namespace App;

use Illuminate\Hello;

class Main
{
	function __construct()
	{
		$obj = new Hello;
		$obj->say();
	}
}

?>