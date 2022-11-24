<?php
// Удаляет первое значение 401 в массиве

$colors = array(312, 401, 1599, 3, 401 , 5 , 401);

if (($key = array_search("401", $colors)) !== false) {
    unset($colors[$key]);
}

print_r($colors);

// Удаляет все значения 401 из массива если имеються дупликаты
function array_remove_by_value($array, $value)
{
    return array_values(array_diff($array, array($value)));
}

$array = array(312, 401, 1599, 3, 401 , 5 , 401);

$newarray = array_remove_by_value($array, 401);

print_r($newarray);




