<?php
/*
 * Реализуйте функцию fromPairs, которая принимает на вход массив,
 *  состоящий из массивов-пар, и возвращает ассоциативный массив, полученный из этих пар.

Примечания
Если при конструировании объекта попадаются совпадающие ключи,
то берётся значение из последнего массива-пары:
<?php

fromPairs([['cat', 5], ['dog', 6], ['cat', 11]]);
// ['cat' => 11, 'dog' => 6]
Примеры
<?php

fromPairs([['fred', 30], ['barney', 40]]);
// ['fred' => 30, 'barney' => 40]
 */
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function fromPairs(array $data)
{
    $result = [];
    foreach ($data as [$key, $value]) {
        $result[$key] = $value;
    }

    return $result;
}

debug(fromPairs([['fred', 30], ['barney', 40]]));