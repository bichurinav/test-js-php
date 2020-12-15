<?php
include "./loadData.php";
// Отправка ответа 
echo json_encode($arResult, JSON_UNESCAPED_UNICODE);