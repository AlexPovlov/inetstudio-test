<?php

$array = [
  ["id" => 1, "date" => "12.01.2020", "name" => "test1"],
  ["id" => 2, "date" => "02.05.2020", "name" => "test2"],
  ["id" => 4, "date" => "08.03.2020", "name" => "test4"],
  ["id" => 1, "date" => "22.01.2020", "name" => "test1"],
  ["id" => 2, "date" => "11.11.2020", "name" => "test4"],
  ["id" => 3, "date" => "06.06.2020", "name" => "test3"],
];


$uniqueArray = array_reduce($array, function ($carry, $item) {
    $id = $item['id'];
    if (!isset($carry[$id])) {
        $carry[$id] = $item;
    }
    return $carry;
}, []);

echo "<pre>";
var_dump($uniqueArray);
echo "</pre>";
