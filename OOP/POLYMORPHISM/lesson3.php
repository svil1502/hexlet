<?php
function fn($user)
{

}
$mapping = [
    'female' =>
        fn($user) => $user->maidenName,
    'male' =>
        fn($user) => $user->lastName,
];
$lastNames = array_map(function ($user) {
    if ($user->gender === 'female') {
        return $user->maidenName;
    }
    return $user->lastName;
}, $users);