<?php
//переберает все варианты бинарного числа заданной длинны
//settings
$initialNumberOfZeros = 8;
$finalBinaryState = 11111111;

$dec = 0;
$binStr = 0;
while ($binStr < $finalBinaryState) {
    echo 'dec ' . $dec . "\n";

    $binStr = sprintf("%0" . $initialNumberOfZeros . "b",   $dec);
    echo 'binStr ' . $binStr . "\n";

    $arr = str_split($binStr);
    var_dump($arr);

    $dec ++;
}

/*
//from briefNews RubricsCombinationSeeder
//settings
$columnsCount = 8;

$dec = 0;
while ($dec < pow( 2, $columnsCount)) {
    $binStr = sprintf("%0" . $columnsCount . "b",   $dec);
    $arr = str_split($binStr);
    RubricsCombination::create([
        'policy' => $arr[0],
        'economy' => $arr[1],
        'science' => $arr[2],
        'technologies' => $arr[3],
        'sport' => $arr[4],
        'other' => $arr[5],
        'world' => $arr[6],
        'local' => $arr[7],
    ]);
    $dec ++;
}
*/
?>