<?php
//Диспетчеризация по ключу данные
function getLinks($tags)
{
    $mapping = [
        'a' => 'href',
        'img' => 'src',
        'link' => 'href'
    ];

    $filteredTags = array_filter($tags, function ($tag) use ($mapping) {
        return array_key_exists($tag['name'], $mapping);
    });

    $paths = array_map(function ($tag) use ($mapping) {
        $attributeName = $mapping[$tag['name']];
        return $tag[$attributeName];
    }, $filteredTags);
    return array_values($paths);
}
/*
 * src\HTML.php
Реализуйте функцию getLinks($tags), которая принимает на вход список тегов,
 находит среди них теги a, link и img, а затем извлекает ссылки
и возвращает список ссылок. Теги подаются на вход в виде массива,
 где каждый элемент это тег. Тег имеет следующую структуру:

name - имя тега.
href или src - атрибуты. Атрибуты зависят от тега: img - src, a - href,
 link - href.
<?php

use function App\HTML\getLinks;

$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];
$links = getLinks($tags);
// [
//     'hexlet.io/assets/logo.png',
//     'hexlet.io/assets/style.css'
// ];
 */
/*
 * $username = $_GET['user'] ?? 'nobody';
// Это идентично следующему коду:
$username = isset($_GET['user']) ? $_GET['user'] : 'nobody';
 */
function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}
$databaseSettingsByEnv = [
    'development' => [
        'adapter' => 'sqlite',
    ],
    'production' => [
        'adapter' => 'postgresql',
    ],
];

$databaseConfiguration = $databaseSettingsByEnv[$env];

$databaseConfiguration = $databaseSettingsByEnv[$env] ?? [ 'adapter' => 'memory' ];
debug($databaseConfiguration);
$tags = [
    ['name' => 'img', 'src' => 'hexlet.io/assets/logo.png'],
    ['name' => 'div'],
    ['name' => 'link', 'href' => 'hexlet.io/assets/style.css'],
    ['name' => 'h1']
];

$databaseConfiguration2 = $tags[$env];

$databaseConfiguration2 = $databaseSettingsByEnv2[$env] ?? ['src' => 'hexlet.io/assets/logo.png' ];
//debug($databaseConfiguration2);
//echo $databaseConfiguration2['src'];


$databaseConfiguration2 = $tags[$env] ?? ['name' => 'img'];
debug($databaseConfiguration2);
$link_src = array_key_exists('src',$databaseConfiguration2) ? $databaseConfiguration2['src']: false;
$link_href = array_key_exists('href',$databaseConfiguration2) ? $databaseConfiguration2['href']: false;

echo $link_src;
$l = in_array('src',$tags) ?? $tags['src'];
debug($l);

//debug(getLinks($tags));
debug($tags);
$mapping = [
    'a' => 'href',
    'img' => 'src',
    'link' => 'href'
];
debug($mapping);
$filteredTags = array_filter($tags, function ($tag) use ($mapping) {
    return array_key_exists($tag['name'], $mapping);
});
debug($filteredTags);

$paths = array_map(function ($tag) use ($mapping) {
    $attributeName = $mapping[$tag['name']];
    return $tag[$attributeName];
}, $filteredTags);
debug($paths);
debug(array_values($paths));