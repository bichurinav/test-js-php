<?php

$flag = file_get_contents("php://input");

$jsonCars = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/data_cars.json");
$jsonAttempts = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/data_attempts.json");


function debuger($arr) {
    echo "<pre>";print_r($arr);echo"</pre>";
}

$arrCars = json_decode($jsonCars, true)["data"];
$arrAttempts = json_decode($jsonAttempts, true)["data"];
// участники и их попытки
$attempts = [];
$countAttempts = [];
foreach ($arrAttempts as $item) {
    $attempts[$item["id"]][] = $item["result"];
    $countAttempts[] = $item["id"];
};
// всего попыток
$countAttempts = array_count_values($countAttempts);

function sum($carry, $item) {
    $carry += $item;
    return $carry;
};

function sorterPoints($key) {
    return function ($a, $b) use ($key) {
        if ($a[$key] == $b[$key]) return 0;
        return ($a[$key] > $b[$key]) ? -1 : 1;
    };
}

$arResult = [];
foreach ($arrCars as $key => $item) {
    $arResult[$item["id"]] = array(
        "id" => $key,
        "position" => '',
        "name" => $item["name"],
        "city" => $item["city"],
        "car" => $item["car"],
        "attempts" => $countAttempts[$item["id"]],
        "points" => ($flag != '') ? $attempts[$item["id"]][$flag] : array_reduce($attempts[$item["id"]], "sum"),
    );
}
usort($arResult, sorterPoints("points"));


?>