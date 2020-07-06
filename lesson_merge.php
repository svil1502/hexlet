<?php
/*
Реализуйте функцию genDiff, которая сравнивает два ассоциативных массива и возвращает результат сравнения в виде ассоциативного массива. Ключами результирующего массива будут все ключи из двух входящих массивов, каждому из которых должно соответствовать одно из четырёх значений: added, deleted, changed или unchanged.

Аргументы:

Ассоциативный массив
Ассоциативный массив
Расшифровка:

added — ключ отсутствовал в первом массиве, но был добавлен во второй
deleted — ключ был в первом массиве, но отсутствует во втором
changed — ключ присутствовал и в первом и во втором массиве, но значения отличаются
unchanged — ключ присутствовал и в первом и во втором массиве с одинаковыми значениями
*/

function union(array $data1, array $data2)
{
    return array_unique(array_merge($data1, $data2));
}


function genDiff( array $data1, array $data2)
{
    $merg_arr = union($data1, $data2);
    $current = [];
    foreach ($merg_arr as $key=>$value) {

        if (!array_key_exists($key, $data1) and array_key_exists($key, $data2))
        {
            $current[$key] = "added";

        }
        if (array_key_exists($key, $data1) and !array_key_exists($key, $data2))
        {
            $current[$key] = "deleted";
        }
        if (array_key_exists($key, $data1) and array_key_exists($key, $data2) and $data1[$key] !== $data2[$key])
        {
            $current[$key] = "changed";
        }
        if (array_key_exists($key, $data1) and array_key_exists($key, $data2) and $data1[$key] === $data2[$key])
        {
            $current[$key] = "unchanged";
        }

    }

    return $current;
}


$data1 = ['one' => 'eon', 'two' => 'two', 'four' => true];
$data2 = ['two' => 'own', 'zero' => 4, 'four' => true];
print_r(union(['one' => 'eon', 'two' => 'two', 'four' => true],
    ['two' => 'own', 'zero' => 4, 'four' => true]));

print_r(genDiff($data1, $data2));

// => [
//     'one' => 'deleted',
//     'two' => 'changed'
//     'zero' => 'added',
//     'four' => 'unchanged',
// ];