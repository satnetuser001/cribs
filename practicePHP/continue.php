<?php
	//doc https://www.php.net/manual/ru/control-structures.continue.php

	$arr = ['ноль', 'один', 'два', 'три', 'четыре', 'пять', 'шесть'];
	foreach ($arr as $key => $value) {
	    if (0 === ($key % 2)) { // пропуск чётных чисел
	        continue;
	    }
	    echo $value . "\n";
	}
?>