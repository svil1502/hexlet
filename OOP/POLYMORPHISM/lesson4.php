<?php
require_once '../../vendor/autoload.php';

function debug($arr)
{
    echo '<pre>' . print_r($arr, true) . '</pre>';
}

$collection = collect(['name' => 'taylor', 'languages' => ['php', 'javascript']]);
debug($collection);
// flatten() «распрямляет» массивы, вытаскивая элементы
// из вложенных массивов на верхний уровень.
$flattened = $collection->flatten();

// Извлечение массива
debug($flattened->all()); // ['taylor', 'php', 'javascript'];


$tag = ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];

$flattened =  collect($tag)->flatten();
//// <hr class="px-3" id="myid">
debug($flattened->all());

debug(buildAttrs($tag));
function buildAttrs(array $tag)
{
    return collect($tag)
        ->except(['name', 'tagType', 'body'])
        ->map(fn($value, $key) => " {$key}=\"{$value}\"")
        ->join('');
}

function stringify($tag)
{
    $attrs = buildAttrs($tag);

    $mapping = [
        'single' =>
            fn($tag) => "<{$tag['name']}{$attrs}>",
        'pair' =>
            fn($tag) => "<{$tag['name']}{$attrs}>{$tag['body']}</{$tag['name']}>"
    ];


    return $mapping[$tag['tagType']]($tag);
}


// ['name' => 'hr', 'class' => 'px-3', 'id' => 'myid', 'tagType' => 'single'];
debug(stringify($tag));
echo stringify($tag);
stringify($tag);
print_r(stringify($tag));

//парсинг данных в зависимости от их типа
function parse($type, $data)
{
    $mapping = [
        'yml' =>
            fn($rawData) => Yaml::parse($rawData),
        'json' =>
            fn($rawData) => json_decode($rawData),
    ];

    return $mapping[$type]($data);
}
