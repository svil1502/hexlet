<?php
$userNames = ['petya', 'vasya', 'evgeny'];

foreach ($userNames as $name) {
    print_r("{$name}\n");
}

foreach ($userNames as $index => $name) {
    print_r("{$index}: {$name}\n");
}
/*
Реализуйте функцию addPrefix, которая добавляет к каждому элементу массива переданный префикс и возвращает получившийся массив. Функция предназначена для работы со строковыми элементами. Аргументы:

Массив
Префикс
После префикса автоматически добавляется пробел.
$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];
Подсказки
Не меняйте исходный массив
*/

function addPrefix(array $arr, $stroka)
{
    $new_arr = [];
    foreach ($arr as $value) {
        $new_arr[] = $stroka . ' ' . $value;
    }
    return $new_arr;
}
$names = ['john', 'smith', 'karl'];

$newNames = addPrefix($names, 'Mr');
print_r($newNames);
// => ['Mr john', 'Mr smith', 'Mr karl'];
function addPrefix2($names, $Mr)
{
    for($i=0; $i<count($names); $i ++)
    {
        $names[$i] = $Mr . ' ' . $names[$i];

    }
    return $names;
}
$newNames = addPrefix2($names, 'Mr');
print_r($newNames);
