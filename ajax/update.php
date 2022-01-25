<?php

//Подключение класса
require_once('../class/CProducts.php');
// Обновление видимости товаров в таблице
$CProducts = new CProducts();

if (isset($_POST['btnId'])) {
    if ($CProducts->hide($_POST['btnId'])) {
        echo "ok";
    } else {
        echo "error";
    }
}

if (isset($_POST['quantity'], $_POST['id'])) {
    if ($CProducts->changeQuantity($_POST['quantity'], $_POST['id'])) {
        echo "ok";
    } else {
        echo "error";
    }
}





