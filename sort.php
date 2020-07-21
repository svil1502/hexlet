<?php
/*
 * Query String (строка запроса) — часть адреса страницы в интернете содержащая константы и их значения. Она начинается после вопросительного знака и идет до конца адреса. Пример:

# query string: page=5
https://ru.hexlet.io/blog?page=5
Если параметров несколько, то они отделяются амперсандом &:

# query string: page=5&per=10
https://ru.hexlet.io/blog?per=10&page=5
src/AssociativeArrays.php
Реализуйте функцию buildQueryString, которая принимает на вход список параметров и возвращает сформированный query string из этих параметров:

Примеры
<?php

buildQueryString(['per' => 10, 'page' => 1 ]);
// → page=1&per=10
Имена параметров в выходной строке должны располагаться в алфавитном порядке (то есть их нужно отсортировать).
 */

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}


function buildQueryString(array $arr)
{

    ksort($arr);
    $stroka = "";
    $key_last =end(array_keys($arr));
  //  echo $key_last;
    foreach($arr as $key=>$value)
    {

        if ($key == $key_last)
        {

        $stroka .= $key."=".$value;
        echo "$key"."==".$key_last.">".$stroka."<br/>";
        }
        else  $stroka .= $key."=".$value."&";
        echo "$key"."<>".$key_last.">".$stroka."<br/>";
    }
    return $stroka;
}
$fruits = array("d"=>"lemon", "a"=>"orange", "b"=>"banana", "c"=>"apple");

echo( buildQueryString(['a' => 10, 's' => 'Wow', 'd' => 3.2, 'z' => '89']));
//za=10&d=3.2&s=Wow&z=89

