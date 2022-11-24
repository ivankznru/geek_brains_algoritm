<?php


function linearSearch ($myArray, $num) {

    $arrCount = count($myArray);

    for ($i = 0; $i < $arrCount; $i++) {
        $n++;
        echo "Проверяется число с индексом: $i".PHP_EOL;

        if($myArray[$i] == $num) {
            echo "ЧИСЛО НАЙДЕНО! Индекс $i".PHP_EOL;
            echo "Количество итераций: $n искомого числа $num под индексом $i" . PHP_EOL;
            return $i;
        }

        elseif ($myArray[$i] > $num) {
            return null;
        }
    }
}
