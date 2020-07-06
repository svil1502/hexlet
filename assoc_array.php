<?php
/*
 * Реализуйте функцию getIn, которая извлекает из массива (который может быть любой глубины вложенности) значение по указанным ключам. Аргументы:

Исходный массив
Массив ключей, по которым ведется поиск значения
В случае, когда добраться до значения невозможно, возвращается null.
 */

function getIn(array $data, array $keys)
{
    $current = $data;
    foreach ($keys as $key) {
        if (!isset($current[$key])) {
            return null;
        }
        $current = $current[$key];
    }

    return $current;
}

$data = [
    'user' => 'ubuntu',
    'hosts' => [
        ['name' => 'web1'],
        ['name' => 'web2', null => 3, 'active' => false]
    ]
];

getIn($data, ['undefined']); // null
getIn($data, ['user']); // 'ubuntu'
getIn($data, ['user', 'ubuntu']); // null
getIn($data, ['hosts', 1, 'name']); // 'web2'
getIn($data, ['hosts', 0]); // ['name' => 'web1']
getIn($data, ['hosts', 1, null]); // 3
getIn($data, ['hosts', 1, 'active']); // false