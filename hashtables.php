<?php
/*
 * src/Map.php
Реализуйте набор функций, для работы со словарём, построенным на хеш-таблице. Для простоты, наша реализация не поддерживает разрешение коллизий.

По сути в этом задании надо реализовать ассоциативный массив. По понятным причинам использовать ассоциативные массивы для их создания нельзя. Представьте что в языке ассоциативных массивов нет и мы их хотим добавить.

make() — создаёт новый словарь
set($map, $key, $value) — устанавливает в словарь значение по ключу. Работает и для создания и для изменения. Функция возвращает true, если удалось установить значение. При возникновении коллизии, функция никак не меняет словарь и возвращает false.
get($map, $key, $defaultValue = null) — читает в словаре значение по ключу и возвращает его. Параметр $defaultValue — значение, которое функция возвращает, если в словаре нет ключа (по умолчанию равно null). При возникновении коллизии функция также возвращает значение по умолчанию.
Функции set() и get() принимают первым параметром словарь. Передача идет по ссылке, поэтому set() может изменить его напрямую.

Для полноценного погружения в тему, считаем, что массив в PHP может использоваться только как индексированный массив.

Примеры
<?php

$map = Map\make();
$result = Map\get($map, 'key');
print_r($result); // => null

$result = Map\get($map, 'key', 'value');
print_r($result); // => value

Map\set($map, 'key2', 'value2');
$result = Map\get($map, 'key2');
print_r($result); // => value2
Подсказки
crc32 — хеш-функция
Индекс по которому будет храниться значение во внутреннем массиве вычисляется так: crc32($key) % 1000. То есть к ключу применяется хеш-функция и берется остаток от деления на тысячу. Это нужно для ограничения размера массива в разумных рамках.
При решении задачи опирайтесь на материал из теоретической части.
 */
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

function make()
{
    $arr = [];
    return $arr;
}

function get(&$map, $key, $defaultValue = null)
{
    $hash = crc32($key);
    $index = $hash % 1000;
    echo "get:".$index."<br/>";
    $k = 0;
    foreach ($map as $key2=>$value){
        if ($index == $key2 && $value[0] == $key)
        {
            $k++;
        }

    }
    if  ($k == 1)
    {
        [, $defaultValue] = $map[$index];
    }
    return  $defaultValue;
}


function set(&$map, $key, $value) {
    $flag = false;
    $hash = crc32($key);
    $index = $hash % 1000;
    echo "set:".$index."<br/>";
    $k = 0;
    foreach ($map as $key2=>$value2){
        echo $key2."-".$value2[0];
        if ($index == $key2)
        {
            $k++;
        }

    }
    if  ($k == 0)
    {
        $map[$index] = [$key, $value];
        $flag = true;
    }
    if ($k >0 && $value2[0] == $key){
        $map[$index] = [$key, $value];
        $flag = true;
    }
    else if ($k >0  && $value2[0] != $key){
        $flag = false;
    }
    return $flag;
}


$map = make();
$result = get($map, 'key');
//$this->assertNull($result);
echo $result;
echo "<br/>";
$result = get($map, 'key', 'value');
//$this->assertEquals('value', $result);
echo $result;
echo "<br/>";
set($map, 'key2', 'value2');
$result = get($map, 'key2');
//$this->assertEquals('value2', $result);
echo $result;
echo "<br/>";
set($map, 'key2', 'another value');
$result = get($map, 'key2');
echo $result;
echo "<br/>";
//$this->assertEquals('another value', $result);
$map = make();
debug($map);
echo "<br/>";
set($map, 'aaaaa0.462031558722291', 'vvv');
debug($map);
echo "<br/>";
set($map, 'aaaaa0.0585754039730588', 'boom!');
debug($map);
echo "<br/>";
$result = get($map, 'aaaaa0.462031558722291');
//$this->assertEquals('vvv', $result);
echo $result;
echo "<br/>";
$result = get($map, 'aaaaa0.0585754039730588');
//$this->assertNull($result);
echo $result;
echo "<br/>";