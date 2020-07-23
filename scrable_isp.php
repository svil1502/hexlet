<?php
/*
 * Реализуйте функцию scrabble, которая принимает на вход два параметра:
 *  набор символов (строку) и слово, и проверяет,
 *  можно ли из переданного набора составить это слово.
 *  В результате вызова функция возвращает true или false.

При проверке учитывается количество символов, нужных для составления слова,
 и не учитывается их регистр.

Примеры
<?php

use function App\Solution\scrabble;

scrabble('rkqodlw', 'world'); // true
scrabble('avj', 'java'); // false
scrabble('avjafff', 'java'); // true
scrabble('', 'hexlet'); // false
scrabble('scriptingjava', 'JavaScript'); // true
 */

function scrabble($line, $word)
{
    $result = true;
    $line_m = str_split(mb_strtolower($line));
    $word_m = str_split(mb_strtolower($word));
    foreach($word_m as $value)
    {
            $l =substr_count($line, $value);
            $w =substr_count($word, $value);
            if ($l<$w) {
                $result = false;
                break;
            }
    }
    return $result;
}


echo scrabble('scriptjavest', 'javascript');
$text ='scriptjavest';
$letter = 'a';
echo substr_count($text, $letter);