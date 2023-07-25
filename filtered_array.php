<?php

$array = [
    ["id" => 1, "date" => "12.01.2020", "name" => "test1"],
    ["id" => 2, "date" => "02.05.2020", "name" => "test2"],
    ["id" => 4, "date" => "08.03.2020", "name" => "test4"],
    ["id" => 1, "date" => "22.01.2020", "name" => "test1"],
    ["id" => 2, "date" => "11.11.2020", "name" => "test4"],
    ["id" => 3, "date" => "06.06.2020", "name" => "test3"],
];

// Вернуть элементы с определенным id (например, id = 2)
$filteredArray = array_filter($array, function($element) {
    return $element['id'] == 2;
});

echo "<pre>";
var_dump($filteredArray);
echo "</pre>";