<?php
/*
 *
 * Реализуйте функцию pick, которая извлекает из переданного массива все элементы по указанным ключам и возвращает новый массив. Аргументы:

Исходный массив
Массив ключей, по которым должны быть выбраны элементы (ключ и значение) из исходного массива, и на основе выбранных данных сформирован новый массив

 *
 */

function pick(Array $data, Array $keys)
{
    $temp =[];

    foreach($keys as $key_ => $value_)
    {
        foreach($data as $key => $value)
        {
            if ($value_ === $key)
            {
                $temp[$key] = $data[$key];
            }
        }
    }
    return $temp;
}

$data = [
    'user' => 'ubuntu',
    'cores' => 4,
    'os' => 'linux',
    'null' => null
];

pick($data, ['user']);       // → ['user' => 'ubuntu']
pick($data, ['user', 'os']); // → ['user' => 'ubuntu', 'os' => 'linux']
pick($data, []);             // → []
pick($data, ['none']);       // → []
pick($data, ['null']);        // → ['null' => null]