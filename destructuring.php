<?php


//Реализуйте функцию getSortedNames, которая принимает на вход список пользователей, извлекает их имена, сортирует и возвращает отсортированный список имен.


$users = [
    ['name' => 'Bronn', 'gender' => 'male', 'birthday' => '1973-03-23'],
    ['name' => 'Reigar', 'gender' => 'male', 'birthday' => '1973-11-03'],
    ['name' => 'Eiegon',  'gender' => 'male', 'birthday' => '1963-11-03'],
    ['name' => 'Sansa', 'gender' => 'female', 'birthday' => '2012-11-03']
];



function getSortedNames($users)
{
    $arr = [];
    foreach ($users as ['name' => $name_]) {
        $arr[] = $name_;
    }
    sort($arr);
    return $arr;
}


print_r(getSortedNames($users)); // ['Bronn', 'Eiegon', 'Reigar', 'Sansa']